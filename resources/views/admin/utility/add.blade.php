@extends('admin.layout.masterpage')

@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection

@section('title')
  Thêm tiện ích và hình ảnh
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
                          <li><a href="{{ route('get-admin-index') }}">Dashboard</a></li>
                          <li><a href="{{ route('get-hotel-index') }}">Khách sạn</a></li>
                          <li><a href="{{ route('get-utility', ['id' => $hotel->id]) }}">Tiện ích</a></li>
                          <li><a href="{{ route('get-utility-create', ['hotel_id' => $hotel->id] ) }}">Thêm mới</a></li>    
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
      <strong> Thêm mới tiện ích</strong>
  </div>

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if (session('errorSQL'))
    <div class="alert alert-danger">{{ session('errorSQL') }}</div>
  @endif

  <div class="card-body card-block">
          {{-- form data --}}
		<form id="data_add" action="/admin/utility/add/{{ $hotel->id }}" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-8">
          <div class="row form-group">
            <div class="col col-md-3"><label for="name" class=" form-control-label">Tên khách sạn <span class="text text-danger">*</span></label></div>
            <div class="col-12 col-md-9">
              <input type="text" name="name" placeholder="Tên khách sạn"
              value="{{ $hotel->name }}" class="form-control" data-parsley-trigger="change" disabled>
            </div>
            @if ($errors->has('name'))
              <small class="form-control-feedback text text-danger">
                {{ $errors->first('name') }}
              </small>
            @endif
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="utility" class=" form-control-label">Tên tiện ích<span class="text text-danger">*</span></label></div>
            <div class="col-12 col-md-9">
              <input type="text" name="utility" placeholder="Tên tiện ích"
              value="{{ old('utility') }}" class="form-control" data-parsley-trigger="change" required minlength="4">
            </div>
            @if ($errors->has('utility'))
              <small class="form-control-feedback text text-danger">
                {{ $errors->first('utility') }}
              </small>
            @endif
          </div>
          <div class="row form-group">
            <div class="col col-md-3"><label for="description" class=" form-control-label">Mô tả</label></div>
            <div class="col-12 col-md-9">
              <textarea name="description" placeholder="Mô tả"  class="form-control">{{ old('description') }}</textarea>
            </div>
          </div>
					<div class="row form-group">
            <div class="col col-md-3"><label for="image_link" class=" form-control-label">Link ảnh thay thế</label></div>
            <div class="col-12 col-md-9">
              <input type="url" name="image_link" placeholder="Link ảnh thay thế"
              value="{{ old('image_link') }}" class="form-control" data-parsley-trigger="change">
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="row form-group">
						<div class="col-12"><label for="image" class=" form-control-label">Hình ảnh</label></div>
						<div class="col-12">
							<img class="mt-4" id="preview_avatar" src="admin_page_asset/images/default_image.png" alt="Hình ảnh">
							<input type="file" id="image" name="image" class="form-control-file" required value="{{old('image')}}">
						</div>
						@if ($errors->has('image'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('image') }}
							</small>
						@endif
          </div>
        </div>
      </div>
          <button type="submit" class="btn btn-primary mr-3">
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
    $("#image").change(function(){
      readURL(this)
    })
    </script>

    {{-- validation with parsley js --}}
    <script src="admin_page_asset/js/validation/parsley.min.js"></script>
@endsection
