@extends('admin.layout.masterpage')
@section('css')
@endsection
@section('title')
  Chi tiết khách sạn {{ $hotel->name }}
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
                              <li><a href="{{ route('get-hotel-view') }}">Quản lý khách sạn</a></li>
                              <li><a href="{{ route('get-hotel-detail', ['id' => $hotel->id]) }}">Thông tin khách sạn</a></li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
@section('content')
@if (!empty($hotel))
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Thông tin khách sạn</strong>
                </div>
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('errorSQL'))
                <div class="alert alert-danger">{{ session('errorSQL') }}</div>
                @endif
                <div class="card-body">
                  <div>
                    <img src="{{ asset('upload/images'). '/' . $hotel->image }}" height="300px" alt="...">
                  </div>
                  <div>
                    <p>
                      <strong >Khách sạn {{ $hotel->name }}</strong>
                      <strong>Địa chỉ : </strong>{{ $hotel->address }}, {{ $hotel->city }}, {{ $hotel->country }} <br/>
                      <strong>Số điện thoại : </strong>{{ $hotel->main_phone_number }} <br/>
                      <strong>Email : </strong>{{ $hotel->company_email_address }} <br/>
                      <strong>Số phòng hiện có : </strong>{{ count($hotel->rooms) }} <br/>
                    </p>  
                      <a class="btn btn-warning" href="{{ route('get-hotel-edit', ['id' => $hotel->id ]) }}">Chỉnh sửa</a>
                  </div>
                </div>
              </div>
                  
              <!--utility-->
              <div class="card">
                <div class="card-header">
                  <strong> Tiện ích và hình ảnh</strong>
                  <a class="btn btn-primary btn-md" href="{{ route('get-utility-create', ['id' => $hotel->id]) }}"><span><i class="fa fa-plus"></i></span> Thêm mới</a>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Tên tiện ích</th>
                              <th>Mô tả</th>
                              <th>Hình ảnh</th>
                              <th>Chức nẵng</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if (count($hotel->hotel_utilities) > 0)
                          @foreach ($hotel->hotel_utilities as $utility)
                            <tr>
                              <td>{{ $utility->id }}</td>
                              <td>{{ $utility->utility }}</td>
                              <td>{{ $utility->description }}</td>
                              <td><img src="{{ asset('upload/images') .'/'. $utility->image  }}" height="60px"> </td>
                              <td>
                                <a class="btn btn-success btn-sm mr-2" href="" data-toggle="modal" data-target="#myModal-{{$utility->id}}" data-backdrop="false"> <span><i class="fa fa-eye"></i></span> Xem</a>
                                  <a class="btn btn-warning btn-sm" href="{{ route('get-utility-edit', ['id' => $utility->id]) }}"> <span><i class="fa fa-edit"></i></span> Sửa</a>
                                  <button class="btn btn-danger btn-sm"  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{$utility->id}}"> <span><i class="fa fa-trash"></i></span> Xoá</button>
                                            
                                    <!-- model delete-->
                                    <div style="text-align: left;" id="myModal{{$utility->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title alert alert-danger">Xác Nhận Nội dung tiện tích</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>{{ $utility->utility }} của khách sạn {{ $hotel->name }}</strong></p>
                                                    <p>Bạn có chắc chắn muốn xóa không?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger" href="{{ route('get-utility-delete', ['id' => $utility->id]) }}">Đồng ý xoá</a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                    <!-- end model-->

                                    <!-- Modal View -->
                                    <div class="modal fade" id="myModal-{{$utility->id}}">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                            <h4 class="modal-title">Thông tin tiện ích</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          </div>
                                          <!-- Modal body -->
                                          <div class="modal-body">
                                            <div>
                                              <img src="{{ asset('upload/images') .'/'. $utility->image  }}" alt="">
                                            </div>
                                            <table class="table table-boderless">
                                              <tr>
                                                <th>Id: </th>
                                                <td>{{$utility->id}}</td>
                                              </tr>
                                              <tr>
                                                <th>Tiện ích: </th>
                                                <td>{{$utility->utility}}</td>
                                              </tr>
                                              <tr>
                                                <th>Mô tả: </th>
                                                <td>{{$utility->description}}</td>
                                              </tr>
                                            </table>
                                          </div>
                                          <div class="modal-footer">
                                            <a class="btn btn-warning" href={{route('get-utility-edit', ['id'=>$utility->id])}}> <span><i class="fa fa-edit"></i></span> Sửa</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- End model view -->
                              </td>
                            </tr>
                          @endforeach
                        @endif
                      </tbody>
                    </table>  
                </div>
                  
              </div>
            </div>
        </div>
    </div><!-- .animated -->
@endif
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
