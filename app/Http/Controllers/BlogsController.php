<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
  /**
   * get all blog data
   * @param string $slug
   *
   * @return \Illuminate\View\View
   */
    public function getBlog($slug=null)
    {
      $tagsData = DB::table('web_tags')->where('is_deleted',0)->get();
      $recentBlogData = Blog::where('is_deleted',0)->orderBy('created_on')->paginate(2);

      if($slug){
        $viewName = 'blog.singleBlog';
        $blogData = Blog::where('slug',$slug)->orderBy('sequence')->get();
      }else{
        $viewName = 'blog.allBlogs';
        $blogData = Blog::where('is_deleted',0)->orderBy('sequence')->paginate(2);
      }

      return view($viewName, [
        'blogData' => $blogData,
        'tagsData' => $tagsData,
        'recentBlogData' => $recentBlogData,
      ]);
    }
}