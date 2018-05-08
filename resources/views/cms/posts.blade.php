@extends('layouts.adminlte3')
@section('pagestyle')
<link href="https://cdn.bootcss.com/datatables/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
      <div class="row">
        <div class="col-12">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>标题</th>
                  <th>发布时间</th>
                  <th>编辑</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->created_at}}</td>
                  <td>
                    <nobr>
                      <a class="btn btn-sm btn-warning" href="{{route('backend.cms.edit', ['post_id'=>$post->id])}}"><i class="fa fa-pencil "></i>编辑</a>
                      <a class="btn btn-sm btn-info" href="http://localhost/pyrocms/public/index.php/admin/dashboard/view/welcome"><i class="fa fa-eye "></i>查看</a>
                    </nobr>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>标题</th>
                  <th>发布时间</th>
                  <th>编辑</th>
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
