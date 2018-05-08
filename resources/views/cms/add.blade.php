@extends('layouts.adminlte3')

@section('pagestyle')
<link href="http://ueditor.baidu.com/umeditor/themes/default/css/umeditor.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
<link href="http://ueditor.baidu.com/umeditor/themes/default/css/umeditor.min.css" rel="stylesheet">
<style type="text/css">

</style>
@endsection

@section('breadcrumb')
    首页 / 文章 / 发表
@endsection

@section('content')
<div class="card card-default">
  <form action="" id="post-form" method="POST">
          <div class="card-body">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="title" class="form-control" placeholder="请输入标题">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="slug" class="form-control" placeholder="请输入SLUG，利于SEO">
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
                           <script type="text/plain" id="editor" style="width:100%;height:360px;"></script>
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
                            <option value="{{$category->id}}">{{$category->name}}</option>
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
    <!-- Upload Button -->
    <a href="javascript:;" class="upload-button">
        <span class="upload-button-icon oc-icon-upload"></span>
    </a>

    <!-- Existing files -->
    <div class="upload-files-container">
            </div>
                          <input id="fileupload" type="file" name="attachment" data-url="ajax_file_upload" class="form-control"  multiple>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputStatus" class="col-sm-2 control-label">状态</label>

                        <div class="col-sm-10">
                          <label>
                            <input type="radio" name="status" value="0" class="flat-red" checked> 草稿
                          </label>
                          <label>
                            <input type="radio" name="status" value="1" class="flat-red"> 发布
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAuthor" class="col-sm-2 control-label">作者/来源</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputAuthor" name="author">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">发布时间</label>
                        <div class="col-sm-10 input-group date" id="datetimepicker1"  data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="published_at" data-target="#datetimepicker1">
                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                          </div>
                      </div>




                      <!-- /.form-group -->

                      <div class="form-group">
                        <label for="inputTags" class="col-sm-2 control-label">标签</label>

                        <div class="col-sm-10">
                          <input type="text" name="tags" class="form-control" id="inputTags" placeholder="多个标签请用逗号隔开">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputExcerpt" class="col-sm-2 control-label">摘要</label>

                        <div class="col-sm-10">
                          <textarea name="excerpt" class="form-control" id="inputExcerpt" ></textarea>
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
                    <button type="submit" data-request="add_ajax" data-load-indicator="Saving..." class="btn btn-primary" data-disposable="">
                        Create                </button>
                    <span class="btn-text">
                        or <a href="{{route('backend.cms.index')}}">Cancel</a>
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

    var serverPath = '/server/umeditor/',
    um = UM.getEditor('editor', {
        imageUrl:serverPath + "imageUp.php",
        imagePath:serverPath,
        textarea: 'body'
    });

    $('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
            console.log(data.result);
            if(data.result.status){
                $('#attachment_path').val(data.result.path);
                $("#fileupload_container").html("已上传，重命名为<a href='"+data.result.url+"' target='_blank'>"+data.result.path+"</a>");
            }else
                alert(data.result.message);
        }
    });

  });
</script>
@endsection
