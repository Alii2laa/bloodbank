<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Trait\UploadImage;


class PostsController extends Controller
{
    use UploadImage;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostRequest $request)
    {
        if($request->hasFile('image')){
            $photoName = $this->uploadImage($request->image,'images/posts');
            Post::create([
                'title' => $request->title,
                'content' => $request->content_data,
                'img' => $photoName,
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('posts.index')->with(['success' => 'تم إضافة المقالة بنجاح']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('admin.posts.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {

        $post = Post::find($id);
        if(!$post){
            return redirect()->back();
        }

        $post->update([
            'title' => $request->title,
            'content' => $request->content_data,
            'category_id' => $request->category_id
        ]);

        if($request->hasFile('image')){
            $oldImage = public_path().'/images/posts/'.$post->img;
            unlink($oldImage);
            $photoName = $this->uploadImage($request->image,'images/posts');
            $post->update([
                'img' => $photoName
            ]);
        }
        return redirect()->route('posts.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index')->with(['success' => 'تم حذف المقاله بنجاح']);
    }
}
