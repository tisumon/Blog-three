<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Session;

class BiztroxController extends Controller
{
    private $blog;
    private $blogs;
    private $category;
    private $categories;
    private $recentBlogs;
    private $comment;

    public function index()
    {
        $this->recentBlogs = Blog::where('status', 1)->orderBy('id', 'desc')->take('3')->get();
        return view('website.home.home', ['recent_blogs' => $this->recentBlogs]);
    }
    public function contact()
    {
        return view('website.contact.contact');
    }

    public function category($id)
    {
        $this->blogs= Blog::where('category_id',$id)->where('status', 1)->orderBy('id','desc')->get();
        return view('website.category.category',['blogs'=>$this->blogs]);
    }

    public function detail($id)
    {
        $this->blog = Blog::find($id);
        $this->category = Category::all();
        return view('website.detail.detail', ['blog' => $this->blog, 'category' => $this->category]);
    }
    public function newComment(Request $request,$id)
    {
        $this->comment = new Comment();
        $this->comment->blog_id = $id;
        $this->comment->front_user_id = Session::get('user_id');
        $this->comment->comment = $request->comment;

       $lastBlogComment = Comment::where('blog_id',$id)->orderBy('id','desc')->first();
       if($this->lastBlogComment)
       {
           $this->commentCount = $this->lastBlogComment->comment_count +1;
       }
       else
       {
          $this->commentCount = 1;
       }
       $this->comment->comment_count = $this->commentCount;
       $this->comment->save();
       return redirect('/blog-detail/'.$id)->with('message','Your comment post successfully');



    }
}
