<?php

namespace App\Repositories;

use App\Models\Choice;
use Illuminate\Database\Eloquent\Collection;

class ChoiceRepository
{
    public function getAll(): Collection
    {
        return Choice::all();
    }

    public function create(array $data): Choice
    {
        return Choice::create($data);
    }

    public function findById(int $id): Choice
    {
        return Choice::findOrFail($id);
    }

    public function update(Choice $choice, array $data): Choice
    {
        $choice->update($data);
        return $choice;
    }

    public function delete(Choice $choice): void
    {
        $choice->delete();
    }
}
