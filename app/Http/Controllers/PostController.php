<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderBy('id', 'desc')->simplePaginate(5);
        return view('post.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'details' => 'required',
        ]);
        $post = new Post();
        $post->name = $request->name;
        $post->details = $request->details;
        $post->user_id = Auth::user()->id;

        $post->save();
        return back()->with('success', 'Post add successfully');
    }
    public function postDetails($id)
    {
        $post = Post::find($id);
        return view('post.details', compact('post'));
    }
    public function update(Request $request, $id = '')
    {
        $request->validate([
            'name' => 'required',
            'details' => 'required',
        ]);

        if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            $post = Post::find($id);
            $post->name = $request->name;
            $post->details = $request->details;
            $post->save();

            return back()->with('success', 'Post Upadated successfully');
        } else {
            return back()->with('error', 'You can not update this');
        }
    }
    public function list()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }
    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'nullable',
        ]);

        $user  = new User();
        $user->name  = $request->name;
        $user->email  = $request->email;
        $user->role_id  = $request->role_id;
        $user->password  = Hash::make('12345678');
        $user->save();
        return back()->with('success', 'User Created successfully');
    }
}
