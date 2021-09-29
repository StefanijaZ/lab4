<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->take(3)->get();
        return view('welcome', ['posts' => $posts]);
    }

    public function createBlogGet()
    {
        return view('create-blog');
    }

    public function createBlogPost(Request $request)
    {
        // dd($request->file('post_image'));
        if(isset($request->title) && isset($request->content) && $request->file('postImage') != null){

            $postImage = time().'.'.$request->file('postImage')->getClientOriginalExtension(); 
            $request['postImage']->move(public_path('images'), $postImage);


            $form = [
                'title' => $request->title,
                'content' => $request->content,
                'image' => $postImage
            ];
            Post::create($form);
            return redirect('/all');
        }
        else{
            return redirect('/create-blog');
        }
    }

    public function allPosts(){
        $posts = Post::orderByDesc('created_at')->get();
        return view('all-blogs', ['posts' => $posts]);
    }
}
