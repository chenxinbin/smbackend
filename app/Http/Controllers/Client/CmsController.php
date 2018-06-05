<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Requests\SavePost;
use App\Http\Requests\SaveCategory;

class CmsController extends BaseController
{
    //分类列表
    public function listCategory()
    {
        $categorys = \App\CmsCategory::where('status', 1)->orderBy('weight')->get();

        return $this->success($categorys);
    }


    public function listPost(Request $request)
    {
        $category_id = $request->input('category_id');

        if($category_id==0)
            $posts = \App\CmsPost::orderBy('id', 'desc')->paginate(10);
        else
            $posts = \App\CmsPost::where('category_id', $category_id)->orderBy('id', 'desc')->paginate(10);

        return $this->success($posts);
    }

    public function viewPost(Request $request)
    {
        $post_id = $request->input('post_id');

        $post = \App\CmsPost::where('id', $post_id)->firstOrFail();
        $post->view_count++;
        $post->save();

        return $this->success($post);
    }
}
