@extends('admin.layout.masterpage')

@section('css')
{{-- css table --}}
<link rel="stylesheet" href="admin_page_asset/css/lib/datatable/dataTables.bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('title')
    Quản lý loại phòng
@endsection

@section('breadcrumbs')
  <div class="breadcrumbs">
      <div class="breadcrumbs-inner">
          <div class="row m-0">
              <div class="col-sm-4">
                  <div class="page-header float-left">
                      <div class="page-title">
                          <h1>Dashboard</h1>
                      </div>
                  </div>
              </div>
              <div class="col-sm-8">
                  <div class="page-header float-right">
                      <div class="page-title">
                          <ol class="breadcrumb text-right">
                          <li><a href="">Dashboard</a></li>
                              <li><a href="#">Quản lý loại phòng</a></li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('content')
<div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <strong class="card-title">Loại phòng</strong>
                  <a class="btn btn-primary btn-md" href={{route('get-room-type-create')}}><span><i class="fa fa-plus"></i></span> Thêm mới</a>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
              </div>
              <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Loại phòng</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if (!empty($roomTypes) )
                        @foreach ($roomTypes as $roomType)
                        <tr>
                          <td>{{$roomType->id}}</td>
                          <td>{{$roomType->room_type}}</td>
                          <td><p>{{$roomType->description}}</p></td>
                          <td><p class="text text-success">{{$roomType->active == 1 ? 'Đang hoạt động': 'Không hoạt động'}}</p></td>
                          <td>
                                <a class="btn btn-success btn-sm mr-2" href="" data-toggle="modal" data-target="#myModal-{{$roomType->id}}" data-backdrop="false"> <span><i class="fa fa-eye"></i></span> Xem</a>
                          		<a class="btn btn-warning btn-sm mr-2" href="{{route('get-room-type-edit', ['id' => $roomType->id])}}"> <span><i class="fa fa-edit"></i></span> Sửa</a>
                                <form action="{{route('post-room-type-delete', ['id'=>$roomType->id])}}" method="post" class="d-inline ">
                                    {{ csrf_field('PUT')}}
                                <input type="number" value="{{$roomType->id}}" class="d-none" name="id">
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="confirm('Bạn chắc chắn muốn xoá')"><span><i class="fa fa-trash"></i></span> Xóa</button>
                                </form>
                                <div class="modal fade" id="myModal-{{$roomType->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Thông tin loại phòng</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <table class="table table-boderless">
                                        <tr>
                                          <th>Id: </th>
                                          <td>{{$roomType->id}}</td>
                                        </tr>
                                        <tr>
                                          <th>Loại phòng: </th>
                                          <td>{{$roomType->room_type}}</td>
                                        </tr>
                                        <tr>
                                          <th>Mô tả: </th>
                                          <td>{{$roomType->description}}</td>
                                        </tr>
                                        <tr>
                                          <th>Trạng thái: </th>
                                          <td>{{$roomType->active == 1 ? 'Đang hoạt động': 'Không hoạt động'}}</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-warning" href={{route('get-room-type-edit', ['id'=>$roomType->id])}}> <span><i class="fa fa-edit"></i></span> Sửa</a>
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </td>
                            {{-- modal --}}
                            <!-- The Modal -->
                        </tr>
                        @endforeach
                      @endif
                              {{-- end modal --}}
                    </tbody>
                </table>
              </div>
          </div>
      </div>


    </div>
</div><!-- .animated -->
@endsection

@section('script')
  {{-- scrip data table --}}
  <script src="admin_page_asset/js/lib/data-table/datatables.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/dataTables.bootstrap.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/dataTables.buttons.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/buttons.bootstrap.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/jszip.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/vfs_fonts.js"></script>
  <script src="admin_page_asset/js/lib/data-table/buttons.html5.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/buttons.print.min.js"></script>
  <script src="admin_page_asset/js/lib/data-table/buttons.colVis.min.js"></script>
  <script src="admin_page_asset/js/init/datatables-init.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    });
  </script>
@endsection
