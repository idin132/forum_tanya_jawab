<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Question;
use App\Models\Category;

class QuestionController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::all();

        $questions = Question::with('user', 'category');
        $selectedCategory = $request->query('category');

        if ($selectedCategory) {
            $questions->whereHas('category', function ($query) use ($selectedCategory) {
                $query->where('id', $selectedCategory);
            });
        }

        $questions = $questions->get();

        return view('questions.index', compact('questions', 'categories', 'selectedCategory'));
    }



    public function create()
    {
        $categories = Category::all();
        return view('questions.create', compact('categories'));
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10000',
        ]);

        $question = new Question;
        $question->user_id = $request->user()->id;
        $question->category_id = $request->category;
        $question->title = $request->title;
        $question->content = $request->content;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/foto');
            $question->gambar = Storage::url($path); // Menggunakan Storage::url() untuk mendapatkan tautan file gambar
        }

        $question->save();

        return redirect()->route('questions.index')->with('success', 'Question created successfully');
    }



    public function edit(Question $question)
    {
        $categories = Category::all();
        return view('questions.edit', compact('question', 'categories'));
    }

    public function update(Request $request, Question $question)
    {
        $question->category_id = $request->category;
        $question->title = $request->title;
        $question->content = $request->content;
        $question->save();

        return redirect()->route('questions.index')->with('success', 'Question updated successfully');
    }

    public function destroy(Question $question)
    {

        if ($question->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to delete this question.');
        }

        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }

    // ...
}
