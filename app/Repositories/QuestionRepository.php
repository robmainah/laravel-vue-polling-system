<?php

namespace App\Repositories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

class QuestionRepository
{
    public function getAll(): Collection
    {
        return Question::all();
    }

    public function create(array $data): Question
    {
        return Question::create($data);
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
