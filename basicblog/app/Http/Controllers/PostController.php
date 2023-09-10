<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;

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

        if(auth()->user()->cannot('delete', $post))
        {
            return
                redirect("/post/{$post}")
                ->with(
                    "failure",
                    "Post ($title) cannot be deleted"
                );
        }

        $post->delete();

        return
            redirect("/user/profile/posts")
                ->with(
                    "success",
                    "Post ($title) deleted successfully"
                );
    }
}
