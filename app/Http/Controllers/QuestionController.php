<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use App\Models\Poll;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function __construct(public readonly QuestionRepository $questionRepository)
    {
    }

    public function index(Poll $poll)
    {
        if (request()->expectsJson()) {
            return response()->json($this->questionRepository->getByPoll($poll));
        }

        return inertia('Questions/Index', ['poll' => $poll]);
    }

    public function create(Poll $poll)
    {
        return inertia('Questions/Create', ['poll' => $poll]);
    }

    public function store(Request $request, Poll $poll): JsonResponse
    {
        $this->questionRepository->create($poll, $request->all());
        return response()->json([], Response::HTTP_CREATED);
    }

    public function show(Poll $poll, Question $question)
    {
        return inertia('Questions/Show', ['question$question' => $question]);
    }

    public function edit(Poll $poll, Question $question)
    {
        return inertia('Questions/Edit', [
            'poll' => $poll,
            'question' => $question
        ]);
    }

    public function update(Request $request, Poll $poll, Question $question): JsonResponse
    {
        $this->questionRepository->update($question, $request->all());
        return response()->json([], Response::HTTP_OK);
    }

    public function destroy(Poll $poll, Question $question): JsonResponse
    {
        $this->questionRepository->delete($question);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
