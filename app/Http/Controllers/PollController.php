<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Repositories\PollRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PollController extends Controller
{
    public function __construct(public readonly PollRepository $pollRepository)
    {
    }

    public function index()
    {
        // if request is ajax, return json response
        if (request()->expectsJson()) {
            return response()->json($this->pollRepository->getAll());
        }
        return inertia('Polls/Index');
    }

    public function create()
    {
        return inertia('Polls/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->pollRepository->create($request->all());
        return redirect()->route('polls.index');
    }

    public function show(Poll $poll)
    {
        return inertia('Polls/Show', ['poll' => $poll]);
    }

    public function edit(Poll $poll)
    {
        return inertia('Polls/Edit', ['poll' => $poll]);
    }

    public function update(Request $request, Poll $poll): RedirectResponse
    {
        $this->pollRepository->update($poll, $request->all());
        return redirect()->route('polls.index');
    }

    public function destroy(Poll $poll): RedirectResponse
    {
        $this->pollRepository->delete($poll);
        return redirect()->route('polls.index');
    }
}
