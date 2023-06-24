<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function store(Request $request, Question $question)
    {
        $data = $request->validate([
            'content' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);

        $answer = new Answer;
        $answer->user_id = Auth::user()->id;
        $answer->question_id = $question->id;
        $answer->content = $data['content'];

        if ($request->hasFile('gambar')) {
            $filename = uniqid('answer-') . '-' . $data['gambar']->getClientOriginalName();
            $data['gambar']->storeAs('public/foto', $filename);
            $answer->gambar = '/foto/' . $filename;
        }

        $answer->save();

        return redirect()->back()->with('success', 'Answer created successfully');
    }

    public function edit(Question $question, Answer $answer)
    {
        return view('answers.edit', compact('answer'));
    }

    public function update(Request $request, Question $question, Answer $answer)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $answer->content = $request->content;
        $answer->save();

        return redirect()->route('questions.show', $question->id)->with('success', 'Answer updated successfully');
    }

    public function destroy(Request $request, Question $question, Answer $answer)
    {
        if ($answer->gambar) {
            Storage::disk('public')->delete($answer->gambar);
        }
        
        $answer->delete();

        return redirect()->back()->with('success', 'Answer deleted successfully');
    }
}
