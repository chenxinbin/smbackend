@extends('layouts.adminlte3')

@section('pagestyle')
@endsection


@section('breadcrumb')
    首页 / 文章 / 编辑分类
@endsection

@section('content')
<div class="card card-default">
  <form action="" id="post-form" method="POST">
          <div class="card-body">
            
            <div class="row">
              <div class="col-md-12">

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">名称</label>

                    <div class="col-sm-10">
                      <input type="text" name="name" value={{$category->name}} class="form-control" id="inputName" placeholder="请输入分类名称">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSlug" class="col-sm-2 control-label">Slug</label>

                    <div class="col-sm-10">
                      <input type="text" name="slug" value={{$category->slug}} class="form-control" id="inputSlug" placeholder="请输入网址SLUG">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputDesc" class="col-sm-2 control-label">描述</label>

                    <div class="col-sm-10">
                      <textarea name="description" class="form-control" id="inputDesc" >{{$category->description}}</textarea>
                    </div>
                  </div>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          
            <div class="form-buttons">
                <div class="loading-indicator-container">
                    <button type="submit" data-request="category_save_ajax" data-load-indicator="Saving..." class="btn btn-primary" data-disposable="">
                        保存                </button>
                    <span class="btn-text">
                        or <a href="{{route('backend.cms.category')}}">返回</a>
                    </span>
                </div>
            </div>
          </div>
          </form>
        </div>
@endsection



@section('pagescript')
<!-- DataTables -->
<script src="http://ueditor.baidu.com/umeditor/third-party/template.min.js"></script>
<script src="http://ueditor.baidu.com/umeditor/umeditor.config.js"></script>
<script src="http://ueditor.baidu.com/umeditor/umeditor.min.js"></script>
<script src="https://cdn.bootcss.com/mouse0270-bootstrap-notify/3.1.7/bootstrap-notify.min.js"></script>

<script src="{{asset('/js/october/framework.js')}}"></script>

<script src="{{asset('/js/october/loader.base.js')}}"></script>

<script>
  $(function () {


  });
</script>
@endsection
