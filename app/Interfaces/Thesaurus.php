<?php

namespace App\Interfaces;

interface Thesaurus
{
    /**
     * Adds the given words as synonyms to each other
     *
     * @param array $synonyms
     */
    public function addSynonyms(array $synonyms): void;

    /**
     * Returns an array with all the synonyms for a word
     *
     * @param string $word
     *
     * @return array
     */
    public function getSynonyms(string $word): array;

    /**
     * Returns an array with all words that are stored in thesaurus
     *
     * @return array
     */
    public function getWords(): array;
}
