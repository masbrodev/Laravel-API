<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Transformers\PostTransformer;
use Auth;

class Post_C extends Controller
{
    public function add(Request $request, Post $post){
        $this->validate($request, [
            'content'       => 'required|min:10',
        ]);

        $post = $post->create([
            'user_id'       => Auth::user()->id,
            'content'       => $request->content,
        ]);

        $response = fractal()
            ->item($post)
            ->transformWith(new PostTransformer)
            ->toArray();

            return response()->json($response, 201);
    }

    // public function showall(Post $all){

    //     $posts = $all->all();

    //     return fractal()
    //         ->collection($posts)
    //         ->transformWith(new PostTransformer)
    //         ->toArray();
    // }
}
