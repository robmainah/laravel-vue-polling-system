<?php

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Poll;

class QuestionRepository
{
    public function getByPoll(Poll $poll): Collection
    {
        return $poll->questions()->latest()->get();
    }

    public function create(Poll $poll, array $data): Question
    {
        return $poll->questions()->create($data);
    }

    public function findById(int $id): Question
    {
        return Question::findOrFail($id);
    }

    public function update(Question $question, array $data): Question
    {
        $question->update($data);
        return $question->refresh();
    }

    public function delete(Question $question): void
    {
        $question->delete();
    }
}
