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
    public function getBlog($blog_id=null)
    {
        if($blog_id){
          $blogData = Blog::where('id',$blog_id)->orderBy('sequence')->get();
        }else{
          $blogData = Blog::where('is_deleted',0)->orderBy('sequence')->get(); 
        } 

        return view('blog.blogs', [
            'blogData' => $blogData,
        ]);
    }

}
