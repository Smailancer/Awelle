<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use App\Http\Requests\StorewordRequest;
use App\Http\Requests\UpdatewordRequest;


class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('words.index', [
            'words' => Word::latest()->filter(
                        request(['search', 'slang', 'author'])
                    )->paginate(9)->withQueryString()
        ]);
    }

    public function show(Word $word)
    {
        return view('words.show', [
            'word' => $word
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('words.create');
    }

    public function store()
    {

        $attributes = array_merge($this->validateWord(), [
            'user_id' => request()->user()->id,
        ]);

        // Create the word without the slangs
        $word = Word::create(Arr::except($attributes, 'slangs'));

        // Attach selected slangs to the word
        $word->slang()->attach(request('slangs'));

        return redirect(route('home'))->with('success', 'Word Created!');

    }

    public function edit(Word $word)
    {
        return view('words.edit', ['word' => $word]);
    }

    public function update(Word $word)
    {
        // $attributes = $this->validateWord($word);

        // $word->update($attributes);

        // return back()->with('success', 'Word Updated!');

        $attributes = $this->validateWord($word);

        // Update the word without updating the slangs
        $word->update(Arr::except($attributes, 'slangs'));

        // Sync selected slangs to the word
        $word->slang()->sync(request('slangs'));

        return redirect()->route('words.show', $word)->with('success', 'Word Updated!');

    }

    public function destroy(Word $word)
    {
        $word->delete();

        return redirect(route('home'))->with('success', 'Word Deleted!');
    }

    public function lab()
    {
        return view('lab');
    }

    public function court()
    {
        return view('court');
    }
    public function academy()
    {
        return view('academy');
    }
    public function about()
    {
        return view('about');
    }


    protected function validateWord(?Word $word = null): array
    {
        $word ??= new Word();

        return request()->validate([
            'term' => 'required',
            // 'thumbnail' => $word->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('words', 'slug')->ignore($word)],
            'exemple' => 'nullable',
            'meaning' => 'required',
            'slangs' => 'required|array', // Ensure slangs is an array
        ]);
    }
}
