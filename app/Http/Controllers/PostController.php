<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class PostController extends Controller
{
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

     

    public function all_post(){
        // flash()->addSuccess('Your feedback has been submitted.');
        $posts = Post::all();
        return view('/Backend/allpost', ['posts' => $posts]);
    }


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

    public function single_post($id, Request $request){
        $post = Post::find($id);

        if(empty($post)){
            flash()->addError('You got a wrong page');
            return redirect()->route('all-post');
        }
        return view('/Backend/singlepost', ['post' => $post]);
    }

    public function delete_post($id){
        $post = Post::findorFail($id);
        $post->delete();
        flash()->addSuccess('Post Deleted successfully');

        //return view('/Backend/allpost');
        return redirect()->route('all-post');
    }
}
