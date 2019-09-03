@extends('admin.layout.masterpage')

@section('css')
{{-- css table --}}
<link rel="stylesheet" href="admin_page_asset/css/lib/datatable/dataTables.bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
@endsection

@section('title')
    Quản lý tình trạng thanh toán
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
                              <li><a href="{{ route('get-payment-status-view') }}">Tình trạng thanh toán</a></li>    
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
                  <strong class="card-title">Tình trạng thanh toán</strong>
                  <a class="btn btn-primary btn-md" href={{route('get-payment-status-create')}}><span><i class="fa fa-plus"></i></span> Thêm mới</a>
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
                            <th>Tình trạng thanh toán</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if (!empty($paymentStatuses) )
                        @foreach ($paymentStatuses as $paymentStatus)
                        <tr>
                          <td>{{$paymentStatus->id}}</td>
                          <td>{{$paymentStatus->payment_status}}</td>
                          <td><p>{{$paymentStatus->description}}</p></td>
                          <td>
                            @if ($paymentStatus->active == 1)
                              <p class="text text-success">
                                  Đang hoạt động
                              </p>
                            @else
                              <p class="text text-danger">
                                Không hoạt động
                              </p>
                            @endif
                          </td>
                          <td>
                                <a class="btn btn-success btn-sm mr-2" href="" data-toggle="modal" data-target="#myModal-{{$paymentStatus->id}}" data-backdrop="false"> <span><i class="fa fa-eye"></i></span> Xem</a>
                          		<a class="btn btn-warning btn-sm mr-2" href="{{route('get-payment-status-edit', ['id' => $paymentStatus->id])}}"> <span><i class="fa fa-edit"></i></span> Sửa</a>
                                <button class="btn btn-danger btn-sm"  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$paymentStatus->id}}"> <span><i class="fa fa-trash"></i></span> Xoá</button>
                                        
                                  <!-- model delete-->
                                  <div style="text-align: left;" id="myModal{{$paymentStatus->id}}" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button status="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title alert alert-danger">Xác Nhận</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <p>Bạn có chắc chắn muốn xóa loại thanh toán: "{{ $paymentStatus->payment_status }}" không?</p>
                                              </div>
                                              <div class="modal-footer">
                                                  <a class="btn btn-danger" href="{{route('get-payment-status-delete', ['id'=>$paymentStatus->id])}}">Đồng ý xoá</a>
                                                  <button status="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                              </div>
                                          </div>
  
                                      </div>
                                  </div>
                                  <!-- end model-->
                                <div class="modal fade" id="myModal-{{$paymentStatus->id}}">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                        <h4 class="modal-title">Thông tin loại thanh toán</h4>
                                        <button status="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <!-- Modal body -->
                                      <div class="modal-body">
                                        <table class="table table-boderless">
                                          <tr>
                                            <th>Id: </th>
                                            <td>{{$paymentStatus->id}}</td>
                                          </tr>
                                          <tr>
                                            <th>Tình trạng thanh toán: </th>
                                            <td>{{$paymentStatus->payment_status}}</td>
                                          </tr>
                                          <tr>
                                            <th>Mô tả: </th>
                                            <td>{{$paymentStatus->description}}</td>
                                          </tr>
                                          <tr>
                                            <th>Trạng thái: </th>
                                            <td>{{$paymentStatus->active == 1 ? 'Đang hoạt động': 'Không hoạt động'}}</td>
                                          </tr>
                                        </table>
                                      </div>
                                      <div class="modal-footer">
                                        <a class="btn btn-warning" href={{route('get-payment-status-edit', ['id'=>$paymentStatus->id])}}> <span><i class="fa fa-edit"></i></span> Sửa</a>
                                        <button status="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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
