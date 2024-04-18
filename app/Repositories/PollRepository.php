<?php

namespace App\Repositories;

use App\Models\Poll;
use Illuminate\Database\Eloquent\Collection;

class PollRepository
{
    public function getAll(): Collection
    {
        return Poll::all();
    }

    public function create(array $data): Poll
    {
        return Poll::create($data);
    }

    public function findById(int $id): Poll
    {
        return Poll::findOrFail($id);
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
