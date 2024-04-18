<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Repositories\PollRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\PollRequest;

class PollController extends Controller
{
    public function __construct(public readonly PollRepository $pollRepository)
    {
    }

    public function index(): JsonResponse | \Inertia\Response
    {
        if (request()->expectsJson()) {
            return response()->json($this->pollRepository->getAll());
        }

        return inertia('Polls/Index');
    }

    public function create()
    {
        return inertia('Polls/Create');
    }

    public function store(PollRequest $request): JsonResponse
    {
        $this->pollRepository->create($request->safe()->all(), auth()->user());
        return response()->json([], 201);
    }

    public function edit(Poll $poll)
    {
        return inertia('Polls/Edit', ['poll' => $poll]);
    }

    public function update(PollRequest $request, Poll $poll): Response
    {
        $this->pollRepository->update($poll, $request->safe()->all());
        return response()->json([], Response::HTTP_OK);
    }

    public function destroy(Poll $poll): Response
    {
        $this->pollRepository->delete($poll);
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
