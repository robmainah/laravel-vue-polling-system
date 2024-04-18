<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function __construct(public readonly QuestionRepository $questionRepository)
    {
    }

    public function index()
    {
        $questions = $this->questionRepository->getAll();
        return inertia('Questions/Index', ['questions' => $questions]);
    }

    public function create()
    {
        return inertia('Questions/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->questionRepository->create($request->all());
        return redirect()->route('questions.index');
    }

    public function show(Question $question)
    {
        return inertia('Questions/Show', ['question$question' => $question]);
    }

    public function edit(Question $question)
    {
        return inertia('Questions/Edit', ['question$question' => $question]);
    }

    public function update(Request $request, Question $question): RedirectResponse
    {
        $this->questionRepository->update($question, $request->all());
        return redirect()->route('questions.index');
    }

    public function destroy(Question $question): RedirectResponse
    {
        $this->questionRepository->delete($question);
        return redirect()->route('questions.index');
    }
}
