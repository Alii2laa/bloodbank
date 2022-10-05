<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFavouriteRequest;
use App\Trait\ApiResponse;
use App\Models\{Post,Client};
use Illuminate\Http\Request;

class PostsController extends Controller
{
    use ApiResponse;

    /*
        allPosts function is responsible for return all posts with favourite posts of authenticated client.
    */
    public function allPosts(Request $request){

        $posts = Post::paginate(10);
        return $this->apiResponseJson($posts);

    }

    /*
        singlePost function is responsible for return single posts with it's id to show
        also, return related posts category..
    */
    public function singlePost(Request $request){

        $post = Post::find($request->post_id);

        return $this->apiResponseJson($post);

    }

    /*
         FavouritePost function is responsible for favourite/un-favourite post that authenticated clients like/dislike.
    */
    public function favouritePost(PostFavouriteRequest $request){

        $client = auth('api')->user();
        $toggle = $client->mPosts()->toggle(
            $request->post_id
        );

        return $this->apiResponseJson($toggle);

    }

    /*
         FavouritedPosts function is responsible for return all favourited posts for authenticated client.
    */
    public function favouritedPosts(){

        $client = auth('api')->user();
        $posts = $client->mPosts()->paginate(3);
        return $this->apiResponseJson($posts);

    }
}
