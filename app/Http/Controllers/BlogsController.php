<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    /**
     * get all blog data
     *
     * @return \Illuminate\View\View
     */
    public function getBlog($slug=null)
    {
      $tagsData = DB::table('web_tags')->where('is_deleted',0)->get();
      $recentBlogData = Blog::where('is_deleted',0)->orderBy('created_on')->paginate(2);

      if($slug){
        $blogData = Blog::where('slug',$slug)->orderBy('sequence')->get();
        return view('blog.singleBlog', [
            'blogData' => $blogData,
            'tagsData' => $tagsData,
            'recentBlogData' => $recentBlogData,
        ]);
      }else{
        $blogData = Blog::where('is_deleted',0)->orderBy('sequence')->paginate(2); 
        return view('blog.allBlogs', [
            'blogData' => $blogData,
            'tagsData' => $tagsData,
            'recentBlogData' => $recentBlogData,
        ]);
      }
    }
}
