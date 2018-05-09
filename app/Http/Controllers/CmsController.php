<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SavePost;
use App\Http\Requests\SaveCategory;

class CmsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ajax.handler');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\CmsPost::orderBy('id', 'desc')->get();

        return view('cms/posts', compact('posts'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        $categorys = \App\CmsCategory::all();
        return view('cms/add', compact('categorys'));
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_ajax(SavePost $request)
    {
        $post = new \App\CmsPost;
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->featured_image = $request->input('featured_image');
        $post->category_id = $request->input('category');
        $post->status = $request->input('status');
        $post->author = $request->input('author');
        $post->published_at = $request->input('published_at');
        $post->tags = $request->input('tags');
        $post->excerpt = $request->input('excerpt');
        if($post->save())
        {
            return ['X_SM_STATUS'=>'SUCCESS', 'MESSAGE'=>'保存成功'];
        }
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $post_id)
    {
        $post = \App\CmsPost::findOrFail($post_id);
        $categorys = \App\CmsCategory::all();

        return view('cms/edit', compact('post', 'categorys'));
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit_ajax(SavePost $request, $post_id)
    {
        $post = \App\CmsPost::findOrFail($post_id);
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category');
        $post->status = $request->input('status');
        $post->body = $request->input('body');
        $post->featured_image = $request->input('featured_image');
        $post->author = $request->input('author');
        $post->published_at = $request->input('published_at');
        $post->tags = $request->input('tags');
        $post->excerpt = $request->input('excerpt');
        if($post->save())
        {
            return ['X_SM_STATUS'=>'SUCCESS', 'MESSAGE'=>'保存成功'];
        }
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        $categorys = \App\CmsCategory::all();

        return view('cms/category', compact('categorys'));
    }

    public function category_add()
    {
        return view('cms/category_add');
    }

    public function category_edit($category_id)
    {
        $category = \App\CmsCategory::findOrFail($category_id) ;

        return view('cms/category_edit', compact('category'));
    }

    public function category_save_ajax(SaveCategory $request, $category_id=0)
    {

        $category = $category_id ? \App\CmsCategory::find($category_id) : new \App\CmsCategory;
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        if($category->save())
        {
            return ['X_SM_STATUS'=>'SUCCESS', 'MESSAGE'=>'保存成功'];
        }

        
    }

}
