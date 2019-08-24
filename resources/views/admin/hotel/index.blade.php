@extends('admin.layout.masterpage')

@section('css')
{{-- css table --}}
<link rel="stylesheet" href="admin_page_asset/css/lib/datatable/dataTables.bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('title')
    Quản lý khách sạn
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
                              <li><a href="#">Quản lý khách sạn</a></li>
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
                  <strong class="card-title">Danh sách khách sạn</strong>
                  <a class="btn btn-primary btn-md" href={{route('get-hotel-create')}}><span><i class="fa fa-plus"></i></span> Thêm mới</a>
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
                            <th>Hình ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Thành phố</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if (!empty($hotels) )
                        @foreach ($hotels as $hotel)
                        <tr>
                          <td>{{$hotel->id}}</td>
                          <td>{{$hotel->name}}</td>
                          <td>{{$hotel->image}}</td>
                          <td>{{$hotel->address}}</td>
                          <td>{{$hotel->city}}</td>
                          <td>{{$hotel->main_phone_number}}</td>
                          <td>{{$hotel->company_email_address}}</td>
                          <td>
                                <a class="btn btn-success btn-sm mr-2" href="" data-toggle="modal" data-target="#myModal-{{$hotel->id}}" data-backdrop="false"> <span><i class="fa fa-eye"></i></span> Xem</a>
                          		<a class="btn btn-warning btn-sm mr-2" href="{{route('get-room-type-edit', ['id' => $hotel->id])}}"> <span><i class="fa fa-edit"></i></span> Sửa</a>
                                <form action="{{route('post-room-type-delete', ['id'=>$hotel->id])}}" method="post" class="d-inline ">
                                    {{ csrf_field('PUT')}}
                                <input type="number" value="{{$hotel->id}}" class="d-none" name="id">
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="confirm('Bạn chắc chắn muốn xoá')"><span><i class="fa fa-trash"></i></span> Xóa</button>
                                </form>
                                <div class="modal fade" id="myModal-{{$hotel->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Thông tin khách sạn</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                      <table class="table table-boderless">
                                        <tr>
                                          <th>Id: </th>
                                          <td>{{$hotel->id}}</td>
                                        </tr>
                                        <tr>
											<th>Tên khách sạn</th>
                                          <td>{{$hotel->name}}</td>
                                        </tr>
                                        <tr>
											<th>Hình ảnh</th>
                                          	<td>{{$hotel->name}}</td>
                                        </tr>
                                        <tr>
											<th>Địa chỉ</th>
                                          	<td>{{$hotel->name }}</td>
                                        </tr>
                                        <tr>
											<th>Thành phố</th>
                                          	<td>{{$hotel->name }}</td>
                                        </tr>
                                        <tr>
											<th>Số điện thoại</th>
                                          	<td>{{$hotel->name }}</td>
                                        </tr>
                                        <tr>
											<th>Email</th>
                                          	<td>{{$hotel->name }}</td>
                                        </tr>
                                      </table>
                                    </div>
                                    <div class="modal-footer">
                                      <a class="btn btn-warning" href={{route('get-room-type-edit', ['id'=>$hotel->id])}}> <span><i class="fa fa-edit"></i></span> Sửa</a>
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
