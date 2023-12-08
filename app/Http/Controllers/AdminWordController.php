<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Validation\Rule;

class AdminWordController extends Controller
{
    public function index()
    {
        return view('admin.words.index', [
                'words' => Word::latest()->paginate(50)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('words.create');
    }

    public function store()
    {
        Word::create(array_merge($this->validateWord(), [
            'user_id' => request()->user()->id,
            // 'thumbnail' => request()->file('thumbnail')->store('thumbnails')
        ]));

        return redirect('/');
    }

    public function edit(Word $word)
    {
        return view('words.edit', ['word' => $word]);
    }

    public function update(Word $word)
    {
        $attributes = $this->validateWord($word);

        // if ($attributes['thumbnail'] ?? false) {
        //     $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        // }

        $word->update($attributes);

        return back()->with('success', 'Word Updated!');
    }

    public function destroy(Word $word)
    {
        $word->delete();

        return back()->with('success', 'Word Deleted!');
    }

    protected function validateWord(?Word $word = null): array
    {
        $word ??= new Word();

        return request()->validate([
            'term' => 'required',
            // 'thumbnail' => $word->exists ? ['image'] : ['required', 'image'],
            'slug' => 'required',
            'exemple' => 'nullable',
            'type' => 'nullable',
            'uses' => 'nullable',
            'tifinagh' => 'nullable|string',
            'ar_meaning' => 'nullable',
            'fr_meaning' => 'nullable',
            'en_meaning' => 'nullable',
            'slangs' => 'required|array', // Ensure slangs is an array
            // 'slang_id' => 'required',
        ]);
    }
}
