<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class PostController extends Controller
{
    // this function for accepting single post data from form
    public function new_post(Request $request) {
        $request->validate([
            'title'=>'required',
            'writer'=>'required',
            'contentbody'=>'required',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->writer = $request->writer;
        $post->contentbody = $request->contentbody;
        $post->seodes = $request->seodes;
        $post->date = now();
        $post->save();
        flash()->addSuccess('Your data has been submitted.');
        return redirect()->route(route:'new-post');

    }

     
// this function for display all post into one page
    public function all_post(){
        // flash()->addSuccess('Your feedback has been submitted.');
        $posts = Post::all();
        return view('/Backend/allpost', ['posts' => $posts]);
    }

// this function for single post editing open 
    public function edit_post($id){
        $post = Post::find($id);

        if(empty($post)){
            flash()->addError('You got a wrong page');
            return redirect()->route('dashboard');
        }
        
        return view('/Backend/editpost',[
            'post' =>$post

        ]);
    }

// this function for single post update 

    public function update_post($id, Request $request){
        $post= Post::find($id);
        $request->validate([
            'title'=>'required',
            'writer'=>'required',
            'contentbody'=>'required',
        ]);
        $post->title = $request->title;
        $post->writer = $request->writer;
        $post->contentbody = $request->contentbody;
        $post->seodes = $request->seodes;
        $post->date = now();
        $post->save();
        flash()->addSuccess('Your data has been submitted.');
        return redirect()->route('all-post');
    }

// this function for single post view 
    public function single_post($id, Request $request){
        $post = Post::find($id);

        if(empty($post)){
            flash()->addError('You got a wrong page');
            return redirect()->route('all-post');
        }
        return view('/Backend/singlepost', ['post' => $post]);
    }

// this function for single post delete 

    public function delete_post($id){
        $post = Post::findorFail($id);
        $post->delete();
        flash()->addSuccess('Post Deleted successfully');

        //return view('/Backend/allpost');
        return redirect()->route('all-post');
    }
}
