@extends('admin.layout.masterpage')

@section('css')
{{-- css table --}}
<link rel="stylesheet" href="admin_page_asset/css/lib/datatable/dataTables.bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('title')
    Danh sách dặt phòng
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
                              <li><a href="#">Quản lí đặt phòng</a></li>
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
                    <a class="btn btn-primary btn-sm" href="{{ route('get-roombooking-create') }}">Thêm</a>
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
                                <th>Khách sạn</th>
                                <th>Mã phòng</th>
                                <th>Tên phòng</th>
                                <th>Loại phòng</th>
                                <th>Giá</th>
                                <th>Khách đặt</th>
                                <th>Tình trạng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($booking as $bk)
                            <tr>
                                <td>{{$bk->room->hotel->name}}</td>
                                <td>{{$bk->room_id}}</td>
                                <td>{{$bk->room->name}}</td>
                                <td>{{$bk->room->room_type->room_type}}</td>
                                <td>{{$bk->room->price}}</td>
                                <td>{{$bk->user->username}}</td>
                                <td>
                                    <form id="data_status_edit" action="{{route('post-roombooking-edit-status', ['id'=>$bk->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
                                    @csrf 
                                        @if($bk->booking_status_id==1)
                                        <select name="booking_status" id="booking_status" class="form-control" data-parsley-trigger="change">                          
                                            <option value="1" selected="selected" >Đã xác nhận</option>
                                            <option value="2">Chưa xác nhận</option>
                                        </select>
                                        <button type="submit"  class="btn btn-primary">
                                            <i class="fa fa-dot-circle-o"></i> Lưu
                                        </button>
                                        <button  class="btn btn-danger"></i> Hủy</button>
                                        @else
                                        <select name="booking_status" id="booking_status" class="form-control" data-parsley-trigger="change">                          
                                            <option value="1"  >Đã xác nhận</option>
                                            <option value="2" selected="selected">Chưa xác nhận</option>
                                        </select>
                                        <button type="submit"  class="btn btn-primary">
                                            <i class="fa fa-dot-circle-o"></i> Lưu
                                        </button>
                                        <button type="reset" class="btn btn-danger"></i> Hủy</button>
                                        @endif
                                    </form>
                                </td>
                                
                                <td>
                                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal{{$bk->id}}" data-backdrop="true" > <span><i class="fa fa-eye"></i></span> Xem</a>
                                    <a class="btn btn-warning btn-sm" href="{{route('get-roombooking-edit', ['id'=>$bk->id])}}"> <span><i class="fa fa-edit"></i></span> Sửa</a>
                                    <a class="btn btn-danger btn-sm" href="{{route('get-roombooking-delete', ['id'=>$bk->id])}}"> <span><i class="fa fa-trash"></i></span> Xoá</a>
                                 </td>
                                 
                                {{-- modal --}}
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal{{$bk->id}}">
                                  <div class="modal-dialog">
                                    <div class="modal-content">

                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Thông tin đặt phòng</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>

                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        <div class="row">
                                          <div class="col-4"><img src="" alt="avatar"></div>
                                        <div class="col-8">
                                          <div>
                                            <strong>Tên phòng: {{$bk->room->name}}</strong>
                                          </div>
                                          <div>
                                            <strong>Tên khách sạn: {{$bk->room->hotel->name}}</strong>
                                          </div>
                                          <div>
                                            <strong>Loại phòng: {{$bk->room->room_type->room_type}}</strong>
                                          </div>
                                          <div>
                                            <strong>Đơn giá: {{$bk->room->price}}</strong>
                                          </div>
                                          <div>
                                            <strong>Tình trạng phòng: {{$bk->room->room_status->room_status}}</strong>
                                          </div>
                                          <div>
                                            <strong>Ngày nhận:{{$bk->date_from}}</strong>
                                          </div>
                                          <div>
                                            <strong>Ngày trả:{{$bk->date_to}}</strong>
                                          </div>
                                          <div>
                                            <strong>Tình trạng thanh toán: </strong>                                         
                                          </div>
                                          {{-- <div>
                                            <strong>Tình trạng xác nhận:{{$bk->booking_status->booking_status}} </strong>                                         
                                          </div> --}}
                                          <div>
                                            <strong>Tên khách hàng: {{$bk->customer_name}} </strong>                                         
                                          </div>
                                          <div>
                                            <strong>Số điện thoại: {{$bk->customer_phone}}  </strong>                                         
                                          </div>
                                          <div>
                                            <strong>Email: {{$bk->customer_mail}} </strong>                                         
                                          </div>
                                          <div>
                                          <a class="btn btn-primary btn-sm" href="">Chỉnh sửa</a>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="user-description">
                                          <h6>Ghi chú</h6>
                                          <p>{{$bk->description}}</p>
                                        </div>
                                      </div>

                                      <!-- Modal footer -->
                                      {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div> --}}

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
  </script>
@endsection
