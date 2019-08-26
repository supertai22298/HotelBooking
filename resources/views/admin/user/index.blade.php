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
                          <li><a href="{{route('allUsers')}}">Quản lý người dùng</a></li>
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
                    <a class="btn btn-primary btn-sm" href="{{route('addUser')}}">Thêm </a>
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
                                <th>Option</th>
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
                                        {{'Quanr trị viên'}}
                                    @endif
                                </td>
                                <td>
                                    @if($user->active == 1)
                                        <span class="text-success">{{'Bình thường'}}</span>
                                    @else
                                        <span class="text-warning">{{'Khóa'}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success mt-1" href="" data-toggle="modal" data-target="#myModal{{$user->id}}" data-backdrop="true">Xem</a>
                                    <a class="btn btn-warning mt-1" href="{{route('editUser',['id' => $user->id])}}">Sửa</a>
                                <a class="btn btn-danger mt-1" href="{{route('deleteUser',['id' => $user->id])}}" onclick="funccheck()">Xóa</a>
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
                                          <div class="col-4"><img src="
                                            @if($user->avatar == null)
                                                {{'admin_page_asset/images/default.png'}}
                                            @else
                                                {{'uploads/images/'.$user->avatar}}
                                            @endif    
                                            " alt="avatar"></div>
                                        <div class="col-8">
                                            <div>
                                              <strong>Họ và tên :</strong> {{$user->first_name ." ".$user->last_name}}
                                            </div>
                                            <div>
                                            <strong>Tên đăng nhập :</strong> {{$user->username}}
                                            </div>
                                            <div>
                                                <strong>Email :</strong> {{$user->username}}
                                            </div>
                                            <div>
                                                <strong>Số điện thoại :</strong> {{$user->phone_number}}
                                            </div>
                                            <div>
                                                <strong>Địa chỉ :</strong> {{$user->address}}
                                            </div>
                                            <div>
                                            <a class="btn btn-primary btn-sm" href="{{route('editUser',['id' => $user->id])}}">Chỉnh sửa</a>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="user-description">
                                          <h6>Tiểu sử</h6>
                                          <p>{{$user->description}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  {{-- end modal --}}

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
