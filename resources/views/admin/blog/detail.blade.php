@extends('admin.layout.masterpage')

@section('css')
    <style>
    .mg-15{
        margin-left: 15%;
    }
    </style>
@endsection

@section('title')
    Chi tiết bài đăng
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
                          <li><a href="{{route('get-blog-detail',['id' => $post->id])}}">Chi tiết bài đăng</a></li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="text-body">{{$post->title}}</h3>
            <p class="text-body mb-1"><span>Tác giả: </span>{{$post->author}}</p>
            <p class="text-body"><small>Ngày đăng: {{$post->created_at}}</small></p>
        </div>
        <div class="card-body">
            <div>
                @if ($post->image)
                    <img class="mg-15" width="70%" src="upload/images/{{$post->image}}" alt="">
                @else
                    @if ($post->image_link)
                        <img class="mg-15" width="70%" src="{{$post->image_link}}" alt="">
                    @endif
                @endif
            </div>
            <hr>
            <div class="p-4">
                <p class="text-body">{!!$post->description!!}</p>
            </div>
        </div>
        <div class="card-footer">
            <div class="pull-right">
                <a class="btn btn-warning mt-1" href="{{route('get-blog-edit',['id' => $post->id])}}">Chỉnh Sửa</a>
                <a class="btn btn-danger mt-1" href="" data-toggle="modal" data-target="#myModalDel{{$post->id}}" data-backdrop="true">Xóa</a>
                <a class="btn btn-primary mt-1" href="{{route('get-blog-view')}}" >Trở về</a>
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
    </div>
@endsection