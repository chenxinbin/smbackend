@extends('layouts.adminlte3')

@section('pagestyle')
<link href="https://cdn.bootcss.com/datatables/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('breadcrumb')
    首页 / 文章 / 分类列表
@endsection

@section('content')
      <div class="container-fluid">
          <div id="buttons">
            <a class="btn btn-md btn-success  " href="{{route('backend.cms.category_add')}}">
               <i class="fa fa-plus "></i>
              新控制台
            </a>
          </div>
      </div>
      <div class="row">
        <div class="col-12">

              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>名称</th>
                  <th>Slug</th>
                  <th>创建时间</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorys as $category)
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->slug}}</td>
                  <td>{{$category->created_at}}</td>
                  <td>
                    <nobr>
                      <a class="btn btn-sm btn-warning" href="{{route('backend.cms.category_edit', ['category_id'=>$category->id])}}"><i class="fa fa-pencil "></i>编辑</a>
                    </nobr>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>名称</th>
                  <th>Slug</th>
                  <th>创建时间</th>
                  <th>操作</th>
                </tr>
                </tfoot>
              </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection

@section('pagescript')
<!-- DataTables -->
<script src="https://cdn.bootcss.com/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.bootcss.com/datatables/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection
