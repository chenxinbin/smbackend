@extends('layouts.adminlte3')

@section('pagestyle')
<link href="http://ueditor.baidu.com/umeditor/themes/default/css/umeditor.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
<link href="http://ueditor.baidu.com/umeditor/themes/default/css/umeditor.min.css" rel="stylesheet">
<link href="https://cdn.bootcss.com/blueimp-file-upload/9.21.0/css/jquery.fileupload.min.css" rel="stylesheet">

@endsection

@section('breadcrumb')
    首页 / 文章 / 编辑
@endsection


@section('content')
<div class="card card-default">
  <form action="" id="post-form" method="POST">
          <div class="card-body">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="title" value="{{$post->title}}" class="form-control" placeholder="请输入标题">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="slug" value="{{$post->slug}}" class="form-control" placeholder="请输入SLUG，利于SEO">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">内容</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">分类</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">设置</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                      <div class="form-group">
                        <div class="col-sm-10">
                           <script type="text/plain" id="editor" style="width:100%;height:360px;">{!! $post->body !!}</script>
                        </div>
                      </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                      <div class="form-group">
                        <label for="category" class="col-sm-2 control-label">分类</label>
                        <div class="col-sm-10">
                          <select name="category" class="form-control select2">
                            @foreach($categorys as $category)
                            <option 
                              @if($post->category_id==$category->id) 
                                selected 
                              @endif 
                              value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                      <div class="form-group">
                        <label for="inputStatus" class="col-sm-2 control-label">封面图片</label>

                        <div class="col-sm-10">
                          <input type="hidden" name="featured_image" value="{{$post->featured_image}}" />
                          <span class="fileinput-button">
                              <img id="upload-files-container" src="{{$post->featured_image}}">
                              <input id="fileupload" type="file" name="upfile">
                          </span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputStatus" class="col-sm-2 control-label">状态</label>

                        <div class="col-sm-10">
                          <label>
                            <input type="radio" name="status" value="0" class="flat-red" 
                            @if($post->status==0) 
                                checked 
                            @endif > 草稿
                          </label>
                          <label>
                            <input type="radio" name="status" value="1" class="flat-red"
                            @if($post->status==1) 
                                checked 
                            @endif> 发布
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAuthor" class="col-sm-2 control-label">作者/来源</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{$post->author}}" id="inputAuthor" name="author">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">发布时间</label>
                        <div class="col-sm-10 input-group date" id="datetimepicker1"  data-target-input="nearest">
                            <input type="text"  value="{{$post->published_at}}" class="form-control datetimepicker-input" name="published_at" data-target="#datetimepicker1">
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                      </div>




                      <!-- /.form-group -->

                      <div class="form-group">
                        <label for="inputTags" class="col-sm-2 control-label">标签</label>

                        <div class="col-sm-10">
                          <input type="text" name="tags"  value="{{$post->tags}}" class="form-control" id="inputTags" placeholder="多个标签请用逗号隔开">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputExcerpt" class="col-sm-2 control-label">摘要</label>

                        <div class="col-sm-10">
                          <textarea name="excerpt" class="form-control" id="inputExcerpt" >{{$post->excerpt}}</textarea>
                        </div>
                      </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
          
            <div class="form-buttons">
                <div class="loading-indicator-container">
                    <button type="submit" data-request="edit_ajax" data-load-indicator="Saving..." class="btn btn-primary" data-disposable="">保存</button>
                    <span class="btn-text">
                        or <a href="{{route('backend.cms.index')}}">取消</a>
                    </span>
                    <button type="button" data-request="del_ajax" data-load-indicator="删除中..." class="btn btn-danger pull-right" data-disposable="">删除</button>
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
<script src="https://cdn.bootcss.com/moment.js/2.22.1/moment.min.js"></script>
<script src="https://cdn.bootcss.com/moment.js/2.22.1/locale/zh-cn.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="https://cdn.bootcss.com/blueimp-file-upload/9.21.0/js/vendor/jquery.ui.widget.min.js"></script>
<script src="https://cdn.bootcss.com/blueimp-file-upload/9.21.0/js/jquery.iframe-transport.min.js"></script>
<script src="https://cdn.bootcss.com/blueimp-file-upload/9.21.0/js/jquery.fileupload.min.js"></script>


<script src="{{asset('/js/october/framework.js')}}"></script>

<script src="{{asset('/js/october/loader.base.js')}}"></script>

<script>
  $(function () {

    $('#datetimepicker1').datetimepicker({ 
                    locale: 'zh-cn', format: 'YYYY-MM-DD HH:mm:ss'
                });

    var um = UM.getEditor('editor', {
        imageUrl: "{{route('backend.upload.ueditor')}}",
        imagePath: '',
        textarea: 'body',
        zIndex: 1200
    });

    $('#fileupload').fileupload({
        url: "{{route('backend.upload.ueditor')}}",
        dataType: 'json',
        done: function (e, data) {
            console.log(data.result);
            if(data.result.state=='SUCCESS'){
                $('input[name=featured_image]').val(data.result.url);
                $('#upload-files-container').attr('src', data.result.url);
            }else
                alert(data.result.state);
        }
    });

  });
</script>
@endsection
