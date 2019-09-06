@extends('admin.layout.masterpage')
@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
    <style>
    .ck-rounded-corners{
        min-height: 588px;
    }
    </style>

@endsection
@section('title')
  Chỉnh sửa bài đăng
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
                          <li><a href="{{route('get-blog-edit',['id' => $post->id])}}">Chỉnh sửa bài đăng</a></li>
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
            Chỉnh sửa bài đăng : <strong>{{$post->title}}</strong>
            @if(session('noti'))
                <small class="alert alert-success p-2">
                    {{session('noti')}}
                </small>
            @endif
            {{-- error arr --}}
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>
        <div class="card-body card-block">
          {{-- form data --}}
            <form id="data_add" action="{{route('post-blog-update',['id' => $post->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
                @csrf
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <div class=""><label for="textarea-input" class=" form-control-label">Nội dung *:</label></div>
                            <div class="">
                                <textarea name="description" id="editor" rows="9" placeholder="Nội dung..." class="form-control" data-parsley-trigger="" required="">{{$post->description}}</textarea>
                            </div>
                        </div>
                    </div>
                     <div class="col-4">
                         <input type="hidden" id="text-input" name="id" value="{{$post->id}}">
                        <div class=" form-group">
                           <div class=""><label for="email-input" class=" form-control-label">Tiêu đề *: </label></div>
                           <div class="">
                              <input type="text" id="email-input" name="title" value="{{$post->title}}" placeholder="Tiêu đề" class="form-control" data-parsley-trigger="change" required="" >
                           </div>
                           @if($errors->has('title'))
                                <small class="text-danger w-100">
                                    {{$errors->first('title')}}
                                </small>
                            @endif
                        </div>
                        <div class="form-group">
                           <div class=""><label for="email-input" class=" form-control-label">Tên tác giả *: </label></div>
                           <div class="">
                              <input type="text" id="email-input" name="author" value="{{$post->author}}" placeholder="Tác giả" class="form-control" data-parsley-trigger="change" required="">
                           </div>
                           @if($errors->has('author'))
                                <small class="text-danger w-100">
                                    {{$errors->first('author')}}
                                </small>
                            @endif
                        </div>
                        <div class="row form-group">
                            <div class="col-12"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                            <div class="col-12">
                                <img class="my-2" id="preview_avatar" src="
                                @if ($post->avatar == null)
                                    {{'upload/images/default.png'}}
                                @else
                                    {{'upload/images/' . $post->avatar}}
                                @endif
                                
                                " alt="ảnh đại điện">
                                <input type="file" id="avatar" name="image" class="form-control-file">
                            </div>
                           @if($errors->has('image'))
                                <small class="text-danger w-100">
                                    {{$errors->first('image')}}
                                </small>
                            @endif
                        </div>
                        <div class=" form-group">
                           <div class=""><label for="select" class=" form-control-label">Trạng thái</label></div>
                           <div class="">
                                <select name="active" id="select" class="form-control" data-parsley-trigger="change">
                                    @if ($post->active == 1)
                                    <option value="0">Ẩn</option>
                                    <option value="1" selected>Hiển thị</option>
                                    @else
                                    <option value="0" selected>Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    @endif
                                </select>
                                 @if($errors->has('active'))
                                <small class="text-danger w-100">
                                    {{$errors->first('active')}}
                                </small>
                                @endif
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-dot-circle-o"></i> Lưu
                            </button>
                            <button type="reset" class="btn btn-warning">
                                <i class="fa fa-ban"></i> Đặt lại
                            </button>
                            <a href="{{route('get-blog-view')}}" class="btn btn-danger">
                            <i class="fa fa-ban"></i> Hủy
                            </a>
                     </div>
                    </div>
                    
                  
            </form>
          {{-- end form data --}}
        </div>
    </div>
@endsection

@section('script')
    
  {{-- xem anh trc khi upload --}}
  <script src="admin_page_asset/js/validation/jquery.min.js"></script>
    <script>
    function readURL(file){
      if(file.files && file.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
          $('#preview_avatar').attr('src',e.target.result);
        }
        reader.readAsDataURL(file.files[0]);
      }
    };

    $("#avatar").change(function(){
      readURL(this)
    })
    </script>

    {{-- validation with parsley js --}}
    <script src="admin_page_asset/js/validation/parsley.min.js"></script>

    {{-- ckedittor --}}
    <script src="admin_page_asset/js/ckeditor.js"></script>
    <script>
            ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
