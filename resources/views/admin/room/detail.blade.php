@extends('admin.layout.masterpage')
@section('css')
@endsection
@section('title')
  Chi tiết khách sạn {{ $room->name }}
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
                              <li><a href="{{ route('get-room-detail', ['id' => $room->id]) }}">Thông tin phòng</a></li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection


@section('content')
@if (!empty($room))
    <div class="bg-white p-4">
        <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <strong>Thông tin phòng</strong>
                </div>
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('errorSQL'))
                <div class="alert alert-danger">{{ session('errorSQL') }}</div>
                @endif
                <div class="card-body">
                  <div>
                    <img src="{{ asset('upload/images'). '/' . $room->image }}" height="300px" alt="...">
                  </div>
                  <div>
                    <p>
                      <strong>Phòng {{ $room->name }}</strong>
                      <strong>Khách sạn : </strong>{{ $room->hotel->name }}, {{ $room->hotel->city }}, {{ $room->hotel->country }} <br/>
                      <strong>Loại phòng : </strong>{{ $room->room_type->room_type }} <br/>
                      <strong>Tình trạng : </strong>{{ $room->room_status->room_status }} <br/>
                      <strong>Giá : </strong>{{ $room->price }} <br/>
                    </p>  
                      <a class="btn btn-warning" href="{{ route('get-room-edit', ['id' => $room->id ]) }}">Chỉnh sửa</a>
                  </div>
                </div>
              </div>
                  
              <!--utility-->
              <div class="card">
                <div class="card-header">
                  <strong> Hình ảnh</strong>
                  @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
                  @if (session('errorSQL'))
                    <div class="alert alert-danger">{{ session('errorSQL') }}</div>
                  @endif
                  <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse-{{ $room->id }}" aria-expanded="false" aria-controls="collapseExample">
                      <span><i class="fa fa-plus"></i> Thêm hình ảnh</span>
                    </button>
                  </p>
                  <div class="collapse" id="collapse-{{ $room->id }}">
                    <div class="card card-body">
                      <form action="/admin/room-image/upload-multi-image/{{ $room->id }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card">
                          <div class="card-header">
                            <label class="card-title" for="image"><strong>Hình ảnh bổ sung</strong></label><br>
                            <small class="text text-danger">Chọn tối đa 5 hình</small><br>
                            <small class="text text-danger">Hình ảnh nhỏ hơn 500kb</small>
                          </div>
                          <div class="card-body">
                              <div>
                                <input type="file" name="images[]" required multiple>
                              </div>
                              @if ($errors->has('images'))
                                <small class="form-control-feedback text text-danger">
                                  {{ $errors->first('images') }}
                                </small>
                              @endif
                          </div>
                          <div class="card-body">
                              <button type="submit" class="btn btn-primary">Xác nhận</button>
                              <button type="reset" class="btn btn-secondary">Đặt lại</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                          <tr>
                              <th>Id</th>
                              <th>Hình ảnh</th>
                              <th>Chức năng</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if (1 > 0)
                          @foreach ($room->room_images as $image)
                            <tr>
                              <td>{{ $image->id }}</td>
                              <td><img src="{{ asset('upload/images') .'/'. $image->image  }}" height="60px"> </td>
                              <td>
                                <a class="btn btn-success btn-sm mr-2" href="" data-toggle="modal" data-target="#myModal-{{$image->id}}" data-backdrop="false"> <span><i class="fa fa-eye"></i></span> Xem</a>
                                  <button class="btn btn-danger btn-sm"  data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal{{ $image->id}}"> <span><i class="fa fa-trash"></i></span> Xoá</button>
                                            
                                    <!-- model delete-->
                                    <div style="text-align: left;" id="myModal{{$image->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title alert alert-danger">Xác Nhận Xoá Hình ảnh</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{ asset('upload/images') .'/'. $image->image  }}"> 
                                                    <p>Bạn có chắc chắn muốn xóa không?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger" href="{{ route('get-room-image-delete', ['id' => $image->id]) }}">Đồng ý xoá</a>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                    <!-- end model-->

                                    <!-- Modal View -->
                                    <div class="modal fade" id="myModal-{{$image->id}}">
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
                                              <img src="{{ asset('upload/images') .'/'. $image->image  }}" alt="">
                                            </div>
                                            <table class="table table-boderless">
                                              <tr>
                                                <th>Id: </th>
                                                <td>{{$image->id}}</td>
                                              </tr>
                                             
                                            </table>
                                          </div>
                                          <div class="modal-footer">
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
