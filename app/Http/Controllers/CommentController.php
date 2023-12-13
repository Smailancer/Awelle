<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorecommentRequest;
use App\Http\Requests\UpdatecommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Word $word)
    {
        if (!Auth::check()) {
            // Redirect to the login page with a message
            return redirect()->route('login', ['redirect' => 'words.create'])->with('info', 'Log in to comment or create a new word.');
        }
        request()->validate([
            'body' => 'required'
        ]);

        $word->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        return back()->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecommentRequest $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(Request $request, $word, $commentId)
     {
         // Retrieve the comment from the database
         $comment = Comment::findOrFail($commentId);

         // Perform your deletion logic
         $comment->delete();

         // Assuming you have a relationship defined in the Comment model to get the associated word
         $word = $comment->word;

         // Redirect to the word's show route
         return redirect()->route('words.show', $word)->with('success', 'Comment deleted successfully.');
     }



}
