<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with(['user'])->get()->toArray();
        return view('Post.index')->with('posts', $posts);
    }

    public function mypost(Request $request)
    {
        $user_id = session()->get('user.id');
        $posts = Post::with(['user'])->where(['user_id' => $user_id])->get()->toArray();
        return view('Post.mypost')->with('posts', $posts);
    }

    public function addPost(Request $request, $id=null)
    {
        $user_id = session()->get('user.id');
        if($id){
            $res = Post::find($request->id)->where('user_id',$user_id)->get()->first();
        } else {
            $res = new Post;
        }

        if($res){
            $res->title = $request->input('title');
            $res->description = $request->input('description');
            $file = $request->file('file');
            if(isset($file)){
                $destinationPath = 'images';
                //Delete old file
                if($res->image){
                    File::delete('images/'.$res->image);
                }
                $filename = time().'_'.$file->getClientOriginalName();
                $file->move($destinationPath,$filename);
                $res->image = $filename;
            }
            $res->user_id = $user_id;
            if($res->save()){
                $request->session()->flash('msg', 'Post has been saved successfully');
            } else {
                $request->session()->flash('msg', 'Post cannot be saved. Please try again later...');
            }
        } else {
            $request->session()->flash('msg', 'Post cannot be found. Please try again later...');
        }
        return redirect('/mypost');
    }

    public function edit($id){
        $user_id = session()->get('user.id');
        if($id){
            $post = Post::with(['user'])->where(['user_id' => $user_id])->get()->first();
            if($post){
                return view('Post.add')->with('post', $post->toArray());
            } else {
                return redirect('/');
            }
        }
    }

    public function delete(Request $request, $id)
    {
        $user_id = session()->get('user.id');
        $post = Post::with(['user'])->where(['user_id' => $user_id])->get()->first();
        if($post){
            $post->delete();
            File::delete('images/'.$post->image);
            $request->session()->flash('msg', 'Post has been delete.');
        } else {
            $request->session()->flash('msg', 'Post cannot be delete.');
        }
        return redirect('/mypost');
    }
}
