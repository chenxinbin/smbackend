<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $category_id=0)
    {
        if($category_id==0)
            $posts = \App\CmsPost::orderBy('id', 'desc')->paginate(1);
        else
            $posts = \App\CmsPost::where('category_id', $category_id)->orderBy('id', 'desc')->paginate(1);

        $populars = \App\CmsPost::where('category_id', 1)->orderBy('view_count', 'desc')->limit(6)->get();

        //分类列表
        $categorys = \App\CmsCategory::all();


        //var_dump($posts);
        return view('frontend/list', compact('category_id', 'posts', 'populars', 'categorys'));
    }

    public function view(Request $request, $post_id)
    {
        $post = \App\CmsPost::where('id', $post_id)->first();
        $post->view_count++;
        $post->save();

        $preview = \App\CmsPost::where('id', '<', $post_id)->orderBy('id', 'desc')->first();
        $next = \App\CmsPost::where('id', '>', $post_id)->orderBy('id')->first();

        $populars = \App\CmsPost::where('category_id', $post->category_id)->orderBy('view_count', 'desc')->limit(6)->get();

        //var_dump($posts);
        return view('frontend/view', compact('post', 'populars', 'preview', 'next'));
    }
}
