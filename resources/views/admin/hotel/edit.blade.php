@extends('admin.layout.masterpage')
@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection
@section('title')
  Chỉnh sửa khách sạn {{ $hotel->name }}
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
                              <li><a href="{{ route('get-hotel-edit', ['id' => $hotel->id]) }}">Chỉnh sửa khách sạn</a></li>
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
            <strong> Chỉnh sửa khách sạn {{ $hotel->name }}</strong>
		</div>

		@if (session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@endif
		@if (session('errorSQL'))
			<div class="alert alert-danger">{{ session('errorSQL') }}</div>
		@endif

        <div class="card-body card-block">
          {{-- form data --}}
		<form id="data_add" action="{{ route('post-hotel-update', ['id' => $hotel->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
            {{ csrf_field() }}
            <div class="row">
              	<div class="col-8">
					<div class="row form-group">
						<div class="col col-md-3"><label for="name" class=" form-control-label">Tên khách sạn <span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="name" placeholder="Tên khách sạn"
							value="{{ $hotel->name }}" class="form-control" data-parsley-trigger="change" required minlength="4" >
						</div>
						@if ($errors->has('name'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('name') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="hotel_star" class=" form-control-label">Số sao</label></div>
						<div class="col-12 col-md-9">
							<input type="number" name="hotel_star" placeholder="Số sao từ 1 đến 5"
							value="{{ $hotel->hotel_star }}" class="form-control" data-parsley-trigger="change" required min="1" max="5" >
						</div>
						@if ($errors->has('hotel_star'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('hotel_star') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="motto" class=" form-control-label">Châm ngôn</label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="motto" placeholder="Châm ngôn" class="form-control" data-parsley-trigger="change" value="{{ $hotel->motto }}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="address" class=" form-control-label">Địa chỉ<span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="address" placeholder="Địa chỉ" class="form-control" data-parsley-trigger="change" required minlength="6" value="{{ $hotel->address }}">
						</div>
						@if ($errors->has('address'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('address') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="address_2" class=" form-control-label">Địa chỉ 2</label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="address_2" placeholder="Địa chỉ 2" class="form-control" data-parsley-trigger="change" value="{{ $hotel->address_2 }}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="city" class=" form-control-label">Thành phố <span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="city" placeholder="Thành phố" class="form-control" data-parsley-trigger="change" required minlength="3" value="{{ $hotel->city}}">
						</div>
						@if ($errors->has('city'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('city') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="country" class=" form-control-label">Quốc gia <span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="country" placeholder="Quốc gia" class="form-control" data-parsley-trigger="change" required minlength="3" value="{{ $hotel->city }}">
						</div>
						@if ($errors->has('country'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('country') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="main_phone_number" class=" form-control-label">Số điện thoại chính<span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="main_phone_number" placeholder="Số điện thoại chính" 
							value="{{ $hotel->main_phone_number }}" class="form-control" data-parsley-trigger="change" required minlength="6" maxlength="15" pattern="[0-9]{1,12}">
						</div>
						@if ($errors->has('main_phone_number'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('main_phone_number') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="toll_free_number" class=" form-control-label">Số điện thoại miễn cước</label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="toll_free_number" placeholder="Số điện thoại miễn cước" class="form-control" data-parsley-trigger="change" value="{{ $hotel->toll_free_number}}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="company_email_address" class=" form-control-label">Email<span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="email" name="company_email_address" placeholder="Email" class="form-control" data-parsley-trigger="change" required minlength="8" value="{{ $hotel->company_email_address}}">
						</div>
						@if ($errors->has('company_email_address'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('company_email_address') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="website_address" class=" form-control-label">Địa chỉ trang web</label></div>
						<div class="col-12 col-md-9">
							<input type="url" name="website_address" placeholder="Địa chỉ trang web" class="form-control" data-parsley-trigger="change"  value="{{ $hotel->website_address }}">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="image_link" class=" form-control-label">Link ảnh thay thế</label></div>
						<div class="col-12 col-md-9">
							<input type="url" name="image_link" placeholder="Link ảnh thay thế" class="form-control" data-parsley-trigger="change" value="{{ $hotel->image_link }}">
						</div>
					</div>
              	</div>
              	<div class="col-4">
                  	<div class="row form-group">
						<div class="col-12"><label for="image" class=" form-control-label">Hình ảnh</label></div>
						<div class="col-12">
							<img class="mt-4" id="preview_avatar" src="{{ asset('upload/images') . '/' . $hotel->image }}" alt="ảnh đại điện">
							<input type="file" id="image" name="image" class="form-control-file" value="{{old('image')}}">
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
