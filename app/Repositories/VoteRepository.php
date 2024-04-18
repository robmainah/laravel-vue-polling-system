<?php

namespace App\Repositories;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Collection;

class VoteRepository
{
    public function getAll(): Collection
    {
        return Vote::all();
    }

    public function create(array $data): Vote
    {
        return Vote::create($data);
    }

    public function update(Vote $vote, array $data): Vote
    {
        $vote->update($data);
        return $vote->refresh();
    }

    public function delete(Vote $vote): void
    {
        $vote->delete();
    }
}
