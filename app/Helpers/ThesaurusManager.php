<?php

namespace App\Helpers;

use App\Interfaces\Thesaurus;
use App\Models\Meaning;
use App\Models\Word;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ThesaurusManager implements Thesaurus
{

    /**
     * @param array $synonyms
     */
    public function addSynonyms(array $synonyms): void
    {
        //Look for words we already have
        $existing_words = Word::whereIn('spelling', $synonyms)->get()->keyBy('spelling')->toArray();

        //Check if some of the existing words have the same meaning
        $meaning_id = null;
        foreach ($existing_words as $existing_word) {
            if ($meaning_id === null) {
                $meaning_id = $existing_word['meaning_id'];
            } elseif ($meaning_id !== $existing_word['meaning_id']) {
                throw new BadRequestHttpException('It seems that some of the words from the list have different meanings');
            }
        }

        //Create meaning if none of the words already existed with one
        if ($meaning_id === null) {
            $meaning_id = Meaning::create()->id;
        }

        //Add words we don`t have in case all checks went ok
        foreach ($synonyms as $synonym) {
            if (!array_key_exists($synonym, $existing_words)) {
                Word::create(['spelling' => $synonym, 'meaning_id' => $meaning_id]);
            }
        }
    }

    /**
     * @param string $word
     *
     * @return array
     */
    public function getSynonyms(string $word): array
    {
        $word = Word::where('spelling', $word)->firstOrFail();

        return $word->meaning()->firstOrFail()->words()->pluck('spelling')->toArray();
    }

    /**
     * @return array
     */
    public function getWords(): array
    {
        return Word::orderBy('meaning_id')->pluck('spelling')->toArray();
    }
}
