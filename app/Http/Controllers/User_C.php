<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Transformers\UserTransformer;

class User_C extends Controller
{
    public function users(User $user){
        $users = $user->all();

        return fractal()
            ->collection($users)
            ->transformWith(new UserTransformer)
            ->toArray();
    }
    public function profile(User $user){
        $user = $user->find(Auth::user()->id);

        return fractal()
            ->item($user)
            ->transformWith(new UserTransformer)
            ->includePosts()
            ->toArray();
    }
}
