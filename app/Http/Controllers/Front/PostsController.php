<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFavouriteRequest;
use App\Models\Client;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /*
        allPosts function is responsible for return all posts with favourite posts of authenticated client.
    */
    public function allPosts(Request $request){

        $posts = Post::paginate(5);
        return view('front.posts.posts',compact('posts'));

    }

    /*
        PostShow function is responsible for return single posts with it's id to show
        also, return related posts category.
    */
    public function postShow($id){

        $post = Post::find($id);

        $related= Post::where('category_id', '=', $post->category->id)
            ->where('id', '!=', $post->id)
            ->take(5)->get();
        return view('front.posts.postShow',compact('post','related'));
    }

    /*
         FavouritePost function is responsible for favourite/un-favourite post that authenticated client like/dislike.
    */
    public function favouritePost(PostFavouriteRequest $request){

        $client = auth('client')->user();
        $client->mPosts()->toggle(
            $request->post_id
        );
        return redirect('client/favourited-posts');

    }

    /*
         FavouritedPosts function is responsible for return all favourited posts for authenticated client.
    */
    public function favouritedPosts(){

        $client = auth('client')->user();
        $posts = $client->mPosts()->paginate(3);
        return view('front.posts.favourites',compact('posts'));

    }
}
