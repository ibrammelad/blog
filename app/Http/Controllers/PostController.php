<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class PostController extends Controller
{
    public function index()
    {
        $posts =Post::orderBy('id', 'DESC')->paginate(10);
        return view('post/posts' ,compact('posts'));
    }
    public function show()
    {
        return view('post/Add-Post');
    }

    public function store(Request $request)
    {
        //alpha
        $validate = [
            'title' => 'required|unique:posts,title|regex:/^[a-zA-Z]+$/u',
            'image' => 'required|image|mimes:png,jpg,webp|max:2048',
            'content' => 'required|min:20|'
        ];
         $this->validate($request  , $validate);
         $input = $request->except('image');
        if ($request->hasFile('image')) {
            $image = $request->image;
            $input['image'] = uploadImage($image);
        }
         $input['author'] = auth()->id();
         $post = Post::create($input);
         return redirect()->route('allPosts');
    }

    public function edit( $id)
    {
        $post = Post::findOrFail($id);
        return view('Post/update-Post', compact('post'));
    }

    public function update(Request $request , $id)
    {
        $post = Post::findOrFail($id);
        $validate = [
            'title' =>[ 'required','regex:/^[a-zA-Z]+$/u',Rule::unique('posts')->ignore($post)],
            'image' => 'image|mimes:png,jpg,webp|max:2048',
            'content' => 'required|min:20|'
        ];
        $this->validate($request  , $validate);
        $input = $request->except('image');
        if ($request->hasFile('image')) {
            $image = $post->image;
            $imagee = public_path('images/blog/' . $image);
            if ($image != null) {
                unlink($imagee);// delete photo from directory
            }
            $image1 = $request->image;
            $input['image'] = uploadImage($image1);
        }
        $post->update($input);
        return redirect()->route('allPosts');
    }
    public function delete( $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('allPosts');
    }

}
