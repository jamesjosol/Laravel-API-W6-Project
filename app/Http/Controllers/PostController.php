<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * All the posts from a given user (uncluding user data)
     * Route: api/user/{user}/posts
     */
    public function byUser(User $user) {
        return User::with('posts')
            ->where('id', $user->id)->get();
    }

    /**
     * A single post but will include all of its ratings
     * Route: api/posts/{post}',
     */
    public function show(Post $post) {
        return Post::with('ratings')
            ->where('id', $post->id)->get();
    }

    /**
     * All the posts including average rating of each post
     * Route: api/posts/avg-ratings
     */
    public function avgRatings() {
        return Rating::join('posts', 'posts.id', '=', 'ratings.post_id')
            ->select('posts.id', 'posts.user_id', 'posts.post', 'posts.tags', DB::raw('AVG(ratings.rating) AS average_rating'))
            ->groupBy('posts.id', 'posts.user_id', 'posts.post', 'posts.tags')
            ->get();
    }

    /**
     * All the posts whose rating is above {rt}
     * Route: api/posts/rating/{rt}
     */

    public function byAboveRating($rt) {
        return Post::join('ratings', 'posts.id', '=', 'ratings.post_id')
            ->where('ratings.rating', '>', $rt)
            ->orderBy('ratings.rating', 'DESC')
            ->get(['posts.id', 'posts.post', 'posts.tags', 'ratings.rating']);
    }

}
