<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Repositories\VoteRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class VoteController extends Controller
{
    public function __construct(public readonly VoteRepository $voteRepository)
    {
    }

    public function index()
    {
        $votes = $this->voteRepository->getAll();
        return inertia('Votes/Index', ['votes' => $votes]);
    }

    public function create()
    {
        return inertia('Votes/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->voteRepository->create($request->all());
        return redirect()->route('votes.index');
    }

    public function show(Vote $vote)
    {
        return inertia('Votes/Show', ['vote' => $vote]);
    }

    public function edit(Vote $vote)
    {
        return inertia('Votes/Edit', ['vote' => $vote]);
    }

    public function update(Request $request, Vote $vote): RedirectResponse
    {
        $this->voteRepository->update($vote, $request->all());
        return redirect()->route('votes.index');
    }

    public function destroy(Vote $vote): RedirectResponse
    {
        $this->voteRepository->delete($vote);
        return redirect()->route('votes.index');
    }
}
