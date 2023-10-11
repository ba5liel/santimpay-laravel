<?php

namespace SantimPay\SantimPay\Http\Controllers;

class NotifyController extends Controller
{
    public function index()
    {
        //
    }

    public function show()
    {
        //
    }

    public function store()
    {
        // Let's assume we need to be authenticated
        // to create a new post
        if (! auth()->check()) {
            abort(403, 'Only authenticated users can create new posts.');
        }

        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // Assume the authenticated user is the post's author
        $author = auth()->user();

        $post = $author->posts()->create([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect(route('posts.show', $post));
    }
}
