<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $countPage = 1; //это для пагинатора
    	$posts = Post::paginate($countPage);
        
        
        $commentsForEachPosts = DB::select("SELECT posts.id, "
                . "COUNT(comments.post_id)as countComment "
                . "from posts  "
                . "LEFT JOIN comments ON comments.post_id = posts.id "
                . "GROUP BY posts.id ORDER BY posts.id");
        

        array_unshift($commentsForEachPosts, '0');
        
        unset($commentsForEachPosts[0]);
       

        //подключается файл index из папки pages а в том файл другие файлы
    	return view('pages.index', ['countPage' => $countPage, 'commentsForEachPosts' => $commentsForEachPosts])->with('posts', $posts);
    }

    public function show($slug)
    {
    	$post = Post::where('slug', $slug)->firstOrFail();
        
        
        $commentsCount = DB::table('comments')->where('post_id',$post->id)->count();

        return view('pages.show', compact('post', 'commentsCount'));
        
    	
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $posts = $tag->posts()->paginate(2);

        return view('pages.list', ['posts'  =>  $posts]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $posts = $category->posts()->paginate(2);

        return view('pages.list', ['posts'  =>  $posts]);   
    }
}
