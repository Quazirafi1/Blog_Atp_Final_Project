<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $popular_posts = Post::withCount('comments')
            ->withCount('favorite_to_users')
            ->orderBy('view_count','desc')
            ->orderBy('comments_count','desc')
            ->orderBy('favorite_to_users_count','desc')
            ->take(5)->get();
        $total_pending_posts = Post::where('is_approved',false)->count();
        $all_views = Post::sum('view_count');
        $author_count = User::where('role_id',2)->count();
        $category_count = Category::all()->count();
        $tag_count = Tag::all()->count();

        return view('admin.dashboard',compact('posts','popular_posts','total_pending_posts','all_views','author_count','new_authors_today','active_authors','category_count','tag_count'));
    }
}
