<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Repositories\ChoiceRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ChoiceController extends Controller
{
    public function __construct(public readonly ChoiceRepository $choiceRepository)
    {
    }

    public function index()
    {
        $choices = $this->choiceRepository->getAll();
        return inertia('Choices/Index', ['choices' => $choices]);
    }

    public function create()
    {
        return inertia('Choices/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->choiceRepository->create($request->all());
        return redirect()->route('choices.index');
    }

    public function show(Choice $choice)
    {
        return inertia('Choices/Show', ['choice' => $choice]);
    }

    public function edit(Choice $choice)
    {
        return inertia('Choices/Edit', ['choice' => $choice]);
    }

    public function update(Request $request, Choice $choice): RedirectResponse
    {
        $this->choiceRepository->update($choice, $request->all());
        return redirect()->route('choices.index');
    }

    public function destroy(Choice $choice): RedirectResponse
    {
        $this->choiceRepository->delete($choice);
        return redirect()->route('choices.index');
    }
}
