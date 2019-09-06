@extends('admin.layout.masterpage')

@section('css')
{{-- css table --}}
<link rel="stylesheet" href="admin_page_asset/css/lib/datatable/dataTables.bootstrap.min.css">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<style>
    /* css fix bug UI when open multiple modal */
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
    Quản lý bài đăng
@endsection

@section('breadcrumbs')
  <div class="breadcrumbs">
      <div class="breadcrumbs-inner">
          <div class="row m-0">
              <div class="col-sm-4">
                  <div class="page-header float-left">
                      <div class="page-title">
                          <h1>Bảng điều khiển</h1>
                      </div>
                  </div>
              </div>
              <div class="col-sm-8">
                  <div class="page-header float-right">
                      <div class="page-title">
                          <ol class="breadcrumb text-right">
                          <li><a href="{{'/admin'}}">Bảng điều khiển</a></li>
                          <li><a href="{{route('get-blog-view')}}">Quản lý bài đăng</a></li>
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
                    <strong class="card-title mr-2">Bài đăng</strong>
                    <a class="btn btn-primary" href="{{route('get-blog-add')}}"><i class="fa fa-plus"></i> Thêm </a>
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
                                <th style="width: 180px !important;">Tiêu đề</th>
                                <th>Tác giả</th>
                                <th>Hình ảnh</th>
                                <th style="width: 57px !important;">Trạng thái</th>
                                <th style="width: 159px !important;">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getPosts as $post)
                            <tr>
                                <td class="text-center">{{$stt++}}</td>
                                <td>
                                    @if (strlen($post->title) >50)
                                        {!!str_limit($post->title,50)!!}
                                    @else
                                        {!!$post->title!!}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($post->image)
                                    <img width="120px" src="upload/images/{{$post->image}}" alt="">
                                    @else
                                        @if ($post->image_link)
                                        <img width="120px" src="{{$post->image_link}}" alt="">
                                        @else
                                        Trống
                                        @endif
                                    @endif
                                </td>
                                <td>{{$post->author}}</td>
                                <td>
                                    @if ($post->active)
                                        <span class="text-success">{{'Hiển thị'}}</span>
                                    @else
                                        <span class="text-secondary">{{'Ẩn'}}</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success mt-1" href="" data-toggle="modal" data-target="#myModal{{$post->id}}" data-backdrop="true">Xem</a>
                                    <a class="btn btn-warning mt-1" href="{{route('get-blog-edit',['id' => $post->id])}}">Sửa</a>
                                    <a class="btn btn-danger mt-1" href="" data-toggle="modal" data-target="#myModalDel{{$post->id}}" data-backdrop="true">Xóa</a>
                                </td>
                                {{-- modal --}}
                                <!-- The Modal -->
                                <div class="modal fade" id="myModal{{$post->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Thông tin bài đăng</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <h6>Tiêu đề:</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="text-body">{!!$post->title!!}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <h6>Tác giả</h6>
                                                </div>
                                                <div class="col-9">
                                                    <p class="text-body">{{$post->author}}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <h6>Hình ảnh</h6>
                                                </div>
                                                <div class="col-9">
                                                    @if ($post->image)
                                                        <img width="120px" src="upload/images/{{$post->image}}" alt="">
                                                    @else
                                                        @if ($post->image_link)
                                                            <img width="120px" src="{{$post->image_link}}" alt="">
                                                        @else
                                                            Trống
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <h6>Nội dung:</h6>
                                                <hr>
                                                <div class="text-body pl-3" style="font-size: 13px;">
                                                    @if (strlen($post->description) >150)
                                                        {!!str_limit($post->description,150)!!}
                                                    @else
                                                        {!!$post->description!!}
                                                    @endif
                                                </div>
                                                @if (strlen($post->description) >150)
                                                    <a href="{{route('get-blog-detail',['id' => $post->id])}}" class="text-primary pl-1" style="font-size: 13px;">..xem thêm</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                                <a class="btn btn-primary" href="{{route('get-blog-edit',['id' => $post->id])}}"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="myModalDel{{$post->id}}">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Xác nhận bài đăng!</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <p>Bạn đồng ý xóa bài đăng <strong>{{$post->title}}</strong> này không ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" href="{{route('get-blog-delete',['id' => $post->id])}}">Đồng ý</a>
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
  <script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    });
  </script>
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
@endsection
