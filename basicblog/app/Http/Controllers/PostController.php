<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewPostEmail;
use App\Models\Post;
// use App\Mail\NewPostEmail;

use Illuminate\Support\Str;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    // Show Create post form
    public function create()
    {

        return view('create_post_form');
    }

    // submit form
    public function submit(Request $request)
    {
        // Validate the incoming data from request
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Apply modifications on the data
        $data['title'] = strip_tags($data['title']);
        $data['content'] = strip_tags($data['content']);

        // Add Dynamic User ID from the current user session
        $data['user_id'] = auth()->id();

        // Store in database
        // Using 'Post' model to store the data
        // Remember to set the $fillable property in the Post Model
        $submitedData = Post::create($data);

        // Dispatch a job <=> async
        dispatch(new SendNewPostEmail([
            'sendTo' => auth()->user()->email,
            'name' => auth()->user()->username,
            'title' => $submitedData->title,
        ]));


        // Sending Email to the user
        // Mail::to(auth()->user()->email)->send(new NewPostEmail(
        //     [
        //         'name' => auth()->user()->username,
        //         'title' => $submitedData->title,
        //     ]
        // ));

        // Redirect to the submited post page
        // last post id page
        return redirect("/post/{$submitedData->id}");
    }

    // Using Type Hint to fetch the data from the database
    public function showSinglePost(Post $post)
    {
        // Support Markdown
        $post['content'] = Str::markdown($post->content);

        // Passing the post to the blade template
        return view('single_post', ['post' => $post]);
    }

    // delete post from the database
    public function deletePost(Post $post)
    {
        $title = $post->title;

        // We Used Middleware "can:delete,post" instead.
        // if(auth()->user()->cannot('delete', $post))
        // {
        //     return
        //         redirect("/post/{$post}")
        //         ->with(
        //             "failure",
        //             "Post ($title) cannot be deleted"
        //         );
        // }


        // You must provide middleware in web.php
        // "can:delete,post" middleware
        $post->delete();

        return
            redirect("/user/profile/posts")
                ->with(
                    "success",
                    "Post ($title) deleted successfully"
                );
    }

     // Show edit post form
     public function edit(Post $post)
     {

         return view('edit_post_form', ['post' => $post]);
     }

     // Update post form
     public function update(Post $post, Request $request)
     {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['content'] = strip_tags($data['content']);

        $post->update($data);

        return
            redirect("/post/{$post->id}")
                ->with(
                    "success",
                    "Successfully updated"
                );
     }

     // search function
     public function search($term)
     {
        // return
        //     Post::where('title', 'LIKE', '%' . $term .'%')
        //         ->orWhere('content', 'LIKE', '%' . $term .'%')
        //             ->with('user:id,username,avatar')->get();


        // Using Scout Package
        $posts = Post::search($term)->get();

        // Using load to get user information
        $posts->load('user:id,username,avatar');

        return $posts;
     }

     // API
     public function createPostAPI(Request $request)
     {
        // Validate the incoming data from request
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Apply modifications on the data
        $data['title'] = strip_tags($data['title']);
        $data['content'] = strip_tags($data['content']);

        // Add Dynamic User ID from the current user session
        $data['user_id'] = auth()->id();

        // Store in database
        // Using 'Post' model to store the data
        // Remember to set the $fillable property in the Post Model
        $submitedData = Post::create($data);

        // Dispatch a job <=> async
        dispatch(new SendNewPostEmail([
            'sendTo' => auth()->user()->email,
            'name' => auth()->user()->username,
            'title' => $submitedData->title,
        ]));

        // last post id page
        return "Post " . $submitedData->title . " Created With Id: " . $submitedData->id;

    }

    // delete post from the database
    public function deletePostAPI(Post $post)
    {
        $title = $post->title;

        $post->delete();

        return "Post ($title) deleted successfully";
    }

}
