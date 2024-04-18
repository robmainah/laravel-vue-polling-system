<?php

namespace App\Repositories;

use App\Models\Poll;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;

class PollRepository
{
    public function getAll(): Collection
    {
        return Poll::latest()->get();
    }

    public function totalCount(): int
    {
        return Poll::count();
    }

    public function create(array $data, User $user): Poll
    {
        return $user->polls()->create($data);
    }

    public function update(Poll $poll, array $data): Poll
    {
        $poll->update($data);
        return $poll->refresh();
    }

    public function delete(Poll $poll): void
    {
        $poll->delete();
    }
}
