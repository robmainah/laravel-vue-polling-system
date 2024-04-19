<?php

namespace App\Repositories;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

class VoteRepository
{
    public function getAll(): Collection
    {
        return Vote::all();
    }

    public function create(User $user, array $data): Vote
    {
        return $user->votes()->create($data);
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
