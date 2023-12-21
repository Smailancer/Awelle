<?php

namespace App\Http\Controllers;


use App\Models\Word;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use App\Models\CorrectionSuggestion;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorewordRequest;
use App\Http\Requests\UpdatewordRequest;
use Symfony\Polyfill\Intl\Normalizer\Normalizer;


class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('words.index', [
            'words' => Word::latest()->filter(
                        request(['search', 'slang', 'author','type'])
                    )->paginate(12)->withQueryString()
        ]);
    }



    public function show(Word $word)
    {
        $wordsWithSameTerm = Word::where('term', $word->term)->get();

        $correctionSuggestions = CorrectionSuggestion::where('word_id', $word->id)
            ->where('status', 'pending') // You might want to adjust this based on your workflow
            ->get();

        return view('words.show', [
            'word' => $word,
            'wordsWithSameTerm' => $wordsWithSameTerm,
            'correctionSuggestions' => $correctionSuggestions,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            // Redirect to the login page with a message
            return redirect()->route('login', ['redirect' => 'words.create'])->with('info', 'Log in to create a new word.');
        }
        return view('words.create');
    }



    public function store()
{
    if (!Auth::check()) {
        // Redirect to the login page with a message
        return redirect()->route('login', ['redirect' => 'words.create'])->with('info', 'Log in to create a new word.');
    }

    $attributes = $this->validateWord();
    $attributes['user_id'] = request()->user()->id;

    // Create an instance of the Word model
    $wordModel = new Word();

    // Remove diacritics and أ from the term before storing
    $attributes['standard'] = $wordModel->removeDiacriticsAndAlef($attributes['term']);

    // Create the word without the slangs
    $word = Word::create(Arr::except($attributes, 'slangs'));

    // Attach selected slangs to the word
    $word->slang()->attach(request('slangs'));

    return redirect(route('home'))->with('success', 'Word Created!');
}



    public function edit(Word $word)
    {
        if (!Auth::check()) {
            // Redirect to the login page with a message
            return redirect()->route('login', ['redirect' => 'words.create'])->with('info', 'Log in to create a new word.');
        }
        return view('words.edit', ['word' => $word]);
    }

    public function update(Word $word)
    {
        // if (!Auth::check()) {
        //     // Redirect to the login page with a message
        //     return redirect()->route('login', ['redirect' => 'words.create'])->with('info', 'Log in to create a new word.');
        // }
        $attributes = $this->validateWord($word);

        // Update the word without updating the slangs
        $word->update(Arr::except($attributes, 'slangs'));

        // Sync selected slangs to the word
        $word->slang()->sync(request('slangs'));

        // return back()->with('success', 'Word Updated!');

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


    public function suggestCorrection(Word $word)
    {
        if (!Auth::check()) {
            // Redirect to the login page with a message
            return redirect()->route('login', ['redirect' => 'words.show', 'word' => $word->id])
                ->with('info', 'Log in to suggest a correction.');
        }

        return view('words.suggest-correction', ['word' => $word]);
    }

    public function storeCorrectionSuggestion(Word $word)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login', ['redirect' => 'words.show', 'word' => $word->id])
                ->with('info', 'Log in to suggest a correction.');
        }

        // Validate the input using the validateWord method with only necessary fields
        $attributes = $this->validateWord($word);
        $attributes['user_id'] = request()->user()->id;
        $attributes['word_id'] = $word->id;

        // Create an instance of the CorrectionSuggestion model
        $wordModel = new CorrectionSuggestion();

        // Remove diacritics and أ from the term before storing
        $attributes['standard'] = $wordModel->removeDiacriticsAndAlef($attributes['term']);

        // Convert slang_ids to JSON before storing
        $attributes['slangs'] = json_encode(request('slangs'));

        // Create the correction suggestion
        $correction = CorrectionSuggestion::create($attributes);

        // Redirect to the word show page with a success message
        return redirect()->route('words.show', $word)->with('success', 'Correction suggestion submitted.');
    }





    protected function validateWord(?Word $word = null): array
    {
        $word ??= new Word();

        return request()->validate([
            'term' => 'required',
            // 'thumbnail' => $word->exists ? ['image'] : ['required', 'image'],
            'spell' => 'required',
            'tifinagh' => 'nullable|string',
            'type' => 'nullable',
            'slangs' => 'required|array', // Ensure slangs is an array
            'ar_meaning' => 'nullable',
            'fr_meaning' => 'nullable',
            'en_meaning' => 'nullable',
            'uses' => 'nullable',
            'exemple' => 'nullable',
        ]);
    }
}
