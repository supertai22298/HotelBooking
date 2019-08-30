@extends('admin.layout.masterpage')

@section('title')
    Thêm mới bài đăng
@endsection

@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
    <style>
    .ck-rounded-corners{
        min-height: 200px;
    }
    </style>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Thêm mới bài đăng
            @if(session('noti'))
            <small class="alert alert-success p-2">
                {{session('noti')}}
            </small>
            @endif
        </h4>
    </div>
    <div class="card-body card-block">
      {{-- form data --}}
    <form id="data_add" action="{{route('post-blog-store')}}" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="row form-group">
                   <div class="col col-md-3"><label for="email-input" class=" form-control-label">Tiêu đề *: </label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" id="email-input" name="title" value="" placeholder="Tiêu đề" class="form-control" data-parsley-trigger="change" required="" >
                        @if($errors->has('title'))
                        <small class="text-danger w-100">
                            {{$errors->first('title')}}
                        </small>
                  @endif
                    </div>
                </div>
                <div class="row form-group">
                   <div class="col col-md-3"><label for="email-input" class=" form-control-label">Tên tác giả: </label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" id="email-input" name="author" value="" placeholder="Tác giả" class="form-control" data-parsley-trigger="change">
                        @if($errors->has('author'))
                        <small class="text-danger w-100">
                            {{$errors->first('author')}}
                        </small>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                   <div class="col col-md-3"><label for="select" class=" form-control-label">Trạng thái</label></div>
                   <div class="col-12 col-md-9">
                        <select name="active" id="select" class="form-control" data-parsley-trigger="change">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                   </div>
                </div>
             </div>
             <div class="col-4">
                <div class="row form-group">
                    <div class="col-12"><label for="file-input" class=" form-control-label">Hình ảnh</label></div>
                    <div class="col-12">
                      <img class="my-2" id="preview_avatar" src="upload/images/default.png" alt="ảnh đại điện">
                      <input type="file" id="avatar" name="image" class="form-control-file">
                    </div>
                   @if($errors->has('image'))
                        <small class="text-danger w-100">
                            {{$errors->first('image')}}
                        </small>
                    @endif
                </div>
             </div>
            </div>
            <div class="form-group" id="text-area">
                <div class=""><label for="textarea-input" class=" form-control-label">Nội dung</label></div>
                <div class=""><textarea name="description" id="editor" rows="9" cols="9" placeholder="Nội dung..." class="form-control" data-parsley-trigger="change"></textarea></div>
                @if($errors->has('description'))
                    <small class="text-danger w-100">
                        {{$errors->first('description')}}
                    </small>
                @endif
            </div>
          <button type="submit" class="btn btn-primary">
              <i class="fa fa-dot-circle-o"></i> Lưu
          </button>
          <button type="reset" class="btn btn-danger">
              <i class="fa fa-ban"></i> Đặt lại
          </button>
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