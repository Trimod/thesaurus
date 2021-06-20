<?php

namespace App\Http\Controllers;

use App\Interfaces\Thesaurus;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller;

class ThesaurusController extends Controller
{
    use ApiResponser;

    protected $manager;

    /**
     * ThesaurusController constructor.
     *
     * @param Thesaurus $manager
     */
    public function __construct(Thesaurus $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->successResponse($this->manager->getWords());
    }

    /**
     * @param $word
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($word): \Illuminate\Http\JsonResponse
    {
        return $this->successResponse($this->manager->getSynonyms($word));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->validate($request, [
            'words'   => 'required|array|min:2|max:15',
            'words.*' => 'required|string|min:2|max:50'
        ]);

        $words = $request->all()['words'];

        $this->manager->addSynonyms($words);

        return $this->successResponse($words, Response::HTTP_CREATED);
    }
}
