<?php

namespace App\Repositories;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;

class ChoiceRepository
{
    public function getByQuestion(Question $question): Collection
    {
        return $question->choices()->latest()->get();
    }

    public function create(Question $question, array $data): Choice
    {
        return $question->choices()->create($data);
    }

    public function update(Choice $choice, array $data): Choice
    {
        $choice->update($data);
        return $choice->refresh();
    }

    public function delete(Choice $choice): void
    {
        $choice->delete();
    }
}
