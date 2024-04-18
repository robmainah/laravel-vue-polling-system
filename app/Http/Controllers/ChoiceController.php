<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Repositories\ChoiceRepository;
use App\Models\Question;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ChoiceRequest;

class ChoiceController extends Controller
{
    public function __construct(public readonly ChoiceRepository $choiceRepository)
    {
    }

    public function index(Question $question): \Inertia\Response|JsonResponse
    {
        if (request()->wantsJson()) {
            return response()->json($this->choiceRepository->getByQuestion($question));
        }

        return inertia('Choices/Index', ['question' => $question]);
    }

    public function create(Question $question): \Inertia\Response
    {
        return inertia('Choices/Create', ['question' => $question]);
    }

    public function store(ChoiceRequest $request, Question $question): JsonResponse
    {
        $this->choiceRepository->create($question, $request->all());
        return response()->json([], Response::HTTP_CREATED);
    }

    public function edit(Question $question, Choice $choice)
    {
        $choice->load('question');
        return inertia('Choices/Edit', ['choice' => $choice]);
    }

    public function update(ChoiceRequest $request, Question $question, Choice $choice): JsonResponse
    {
        $this->choiceRepository->update($choice, $request->all());
        return response()->json([], Response::HTTP_OK);
    }

    public function destroy(Question $question, Choice $choice): JsonResponse
    {
        $this->choiceRepository->delete($choice);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
