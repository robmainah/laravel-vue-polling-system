<?php

namespace App\Http\Controllers;

use App\Repositories\VoteRepository;
use App\Services\Votes\StoreVoteService;
use Illuminate\Http\Request;
use App\Models\Poll;
use App\Repositories\QuestionRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Events\VotesUpdated;

class VoteController extends Controller
{
    public function __construct(
        public readonly VoteRepository $voteRepository,
        public readonly QuestionRepository $questionRepository,
        public readonly StoreVoteService $storeVoteService
    ) {
    }

    public function index(Poll $poll): JsonResponse | \Inertia\Response
    {
        if (request()->expectsJson()) {
            $questions = $this->questionRepository->getByPoll($poll);
            $questions->load(['choices' => function ($query) {
                $query->withCount('votes');
            }]);

            return response()->json($questions);
        }

        return inertia('Votes/Index', ['poll' => $poll]);
    }

    public function create(Poll $poll): \Inertia\Response | JsonResponse
    {
        if (request()->expectsJson()) {
            $questions = $this->questionRepository->getByPoll($poll);
            $questions->load('choices');

            return response()->json($questions);
        }

        return inertia('Votes/Create', ['poll' => $poll]);
    }

    public function store(Request $request, Poll $poll): JsonResponse
    {
        $this->storeVoteService->store(auth()->user(), $request->all());
        event(new VotesUpdated($poll));

        return response()->json([], Response::HTTP_CREATED);
    }
}
