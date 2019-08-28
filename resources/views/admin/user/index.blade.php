@extends('admin.layout.masterpage')

@section('css')
{{-- css table --}}
<link rel="stylesheet" href="admin_page_asset/css/lib/datatable/dataTables.bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

{{-- css fix bug UI when open multiple modal --}}
<style>
    body{
        padding: 0 !important;
    }
    .p-5px{
        margin-bottom: 5px !important;
    }
    .my-center{
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    .my-center-65{
        width: 40%;
    }
    .my-center-85{
        width: 85%;
    }
</style>

@endsection

@section('title')
    Quản lý người dùng
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
                          <li><a href="{{route('get-user-view')}}">Quản lý người dùng</a></li>
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
                    <strong class="card-title">Bảng dữ liệu</strong>
                    <a class="btn btn-primary" href="{{route('get-user-add')}}"><i class="fa fa-plus"></i> Thêm </a>
                    @if(session('noti'))
                    <small id="success" class="alert alert-success p-2">
                        {{session('noti')}}
                    </small>
                    @endif
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ và tên</th>
                                <th>Tên tài khoản</th>
                                <th>Loại tài khoản</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getUsers as $user)
                            <tr>
                                
                                <td class="text-center">{{$stt++}}</td>
                                <td>{{$user->first_name ." ".$user->last_name}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    @if($user->role == 1)
                                        {{'Khách hàng'}}
                                    @else
                                        {{'Quản trị viên'}}
                                    @endif
                                </td>
                                <td>
                                    @if($user->active == 1)
                                        <span class="text-success">{{'Hoạt động'}}</span>
                                    @else
                                        <span class="text-warning">{{'Khóa'}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success mt-1" href="" data-toggle="modal" data-target="#myModal{{$user->id}}" data-backdrop="true">Xem</a>
                                    <a class="btn btn-warning mt-1" href="{{route('get-user-edit',['id' => $user->id])}}">Sửa</a>
                                <a class="btn btn-danger mt-1" href="" data-toggle="modal" data-target="#myModalDel{{$user->id}}" data-backdrop="true">Xóa</a>
                                </td>
                                {{-- modal --}}
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal{{$user->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Thông tin tài khoản</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="my-center my-center-65">
                                                    <img src="
                                                    @if($user->avatar == null)
                                                        {{'upload/images/default.png'}}
                                                    @else
                                                        {{'upload/images/'.$user->avatar}}
                                                    @endif    
                                                    " alt="avatar">
                                                    <h4 class="text-center mt-2">{{$user->first_name ." ".$user->last_name}}</h4>
                                                        @if ($user->active == 1)
                                                            <p class="text-center text-success">{{'Hoạt động'}}</p>
                                                        @else
                                                            <p class="text-center text-secondary">{{'Khóa'}}</p>
                                                        @endif
                                                    <hr>
                                                </div>
                                                <div class="my-center my-center-85">
                                                    <div class="row">
                                                    <p class="col-6 p-5px">Tên đăng nhập :</p><p class="col-6 p-5px text-body">{{$user->username}}</p>
                                                    </div>
                                                    <div class="row">
                                                    <p class="col-6 p-5px bg-light">Email :</p><p class="col-6 p-5px text-body bg-light">{{$user->email}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-6 p-5px">Số điện thoại :</p><p class="col-6 p-5px text-body">{{$user->phone_number}}</p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-6 p-5px bg-light">Địa chỉ :</p><p class="col-6 p-5px text-body bg-light">{{$user->address}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="user-description">
                                            <h6>Tiểu sử</h6>
                                            <p>{{$user->description}}</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                                <a class="btn btn-primary" href="{{route('get-user-edit',['id' => $user->id])}}"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="myModalDel{{$user->id}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Xác nhận tài khoản!</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <p>Bạn đồng ý xóa tài khoản <strong>{{$user->username}}</strong> này không ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" href="{{route('get-user-delete',['id' => $user->id])}}">Đồng ý</a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
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

  <script src="admin_page_asset/js/functionscript.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    });
    function hideNoti(){
        $('#success').addClass('d-none');
    }
  </script>
@endsection
