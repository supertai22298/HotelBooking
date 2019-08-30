@extends('admin.layout.masterpage')

@section('css')
{{-- css table --}}
<link rel="stylesheet" href="admin_page_asset/css/lib/datatable/dataTables.bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('title')
    Quản lý phòng
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
                          <li><a href="{{ route('get-admin-view') }}">Dashboard</a></li>
                              <li><a href="{{ route('get-room-view') }}">Quản lý phòng</a></li>
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
                  <strong class="card-title">Danh sách phòng</strong>
                  <a class="btn btn-primary btn-md" href={{route('get-room-create')}}><span><i class="fa fa-plus"></i></span> Thêm mới</a>
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
                            <th>Tên khách sạn</th>
                            <th>Loại phòng</th>
                            <th>Số phòng</th>
                            <th>Hình ảnh</th>
                            <th>Giá</th>
                            <th>Giảm giá</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if (!empty($rooms) )
                        @foreach ($rooms as $room)
                        <tr>
                            <td>{{$room->id}}</td>
                            <td>{{$room->hotel->name}}</td>
                            <td>{{$room->room_type->room_type}}</td>
                            <td>{{$room->name}}</td>
                            <td><img src="{{ asset('upload/images/') }}/{{$room->image}}" height="60px"> </td>
                            <td>{{$room->price}}</td>
                            <td>{{$room->discount}}</td>
                            <td>{{$room->room_status->room_status}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{route('get-room-detail', ['id'=>$room->id])}}" > <span><i class="fa fa-eye"></i></span> Xem</a>
                          		<a class="btn btn-warning btn-sm" href="{{route('get-room-edit', ['id' => $room->id])}}"> <span><i class="fa fa-edit"></i></span> Sửa</a>
                                <button class="btn btn-danger btn-sm"  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$room->id}}"> <span><i class="fa fa-trash"></i></span> Xoá</button>
                                        
                                <!-- model delete-->
                                <div style="text-align: left;" id="myModal{{$room->id}}" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title alert alert-danger">Xác Nhận Xoá Phòng</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Phòng {{ $room->name }} thuộc khách sạn "{{ $room->hotel->name }}"</strong></p>
                                                <p>Bạn có chắc chắn muốn xóa phòng: "{{ $room->name }}" không?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="{{route('get-room-delete', ['id'=>$room->id])}}">Đồng ý xoá</a>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- end model-->
                            </td>
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
