<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * get all blog data
     *
     * @return \Illuminate\View\View
     */
    public function getBlog($slug=null)
    {
      if($slug){
        $blogData = Blog::where('slug',$slug)->orderBy('sequence')->paginate(2);
      }else{
        $blogData = Blog::where('is_deleted',0)->orderBy('sequence')->paginate(2); 
      }
      
      return view('blog.blogs', [
          'blogData' => $blogData,
      ]);
    }

}
