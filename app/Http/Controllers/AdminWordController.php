<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Validation\Rule;

class AdminWordController extends Controller
{
    public function index()
    {
        return view('admin.words.index', [
            'words' => Word::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.words.create');
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
        return view('admin.words.edit', ['word' => $word]);
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
            'slug' => ['required', Rule::unique('words', 'slug')->ignore($word)],
            'exemple' => 'required',
            'meaning' => 'required',
            'slang_id' => ['required', Rule::exists('slangs', 'id')]
        ]);
    }
}
