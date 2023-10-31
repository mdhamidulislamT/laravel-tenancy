<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Mail\SendTestMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // check if data exists in cache 
        // get from cache
        // if not get from database

        // we are using redis for Cache

        $seconds = 5000;
        $posts = cache()->remember('posts', $seconds, function () {

            return Post::latest()->paginate(500);
        });

        return view('post.index', compact('posts'));
    }
    public function index2()
    {
        $posts  = Post::latest()->paginate(500);
        return view('post.index', compact('posts'));
    }


    public function sendMail()
    {
        // 1.send mail direct
        //Mail::to('hamidlive6@gmail.com')->send(new SendTestMail());


        // 2.send mail via job  (database used)
        for ($i = 0; $i < 10; $i++) {
            dispatch(new SendMailJob());
        }

        dd("send mail successfully!");
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
