@extends('admin.layout.masterpage')

@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection

@section('title')
Thêm mới phòng
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
                              <li><a href="{{ route('get-room-index') }}">Quản lý phòng</a></li>
                              <li><a href="{{ route('get-room-create') }}">Thêm mới phòng</a></li>
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
            <strong> Thêm mới phòng</strong>
		</div>

		@if (session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@endif
		@if (session('errorSQL'))
			<div class="alert alert-danger">{{ session('errorSQL') }}</div>
		@endif

        <div class="card-body card-block">
          {{-- form data --}}
		<form id="data_add" action="{{ route('post-room-store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
            {{ csrf_field() }}
            <div class="row">
              	<div class="col-8">
					<div class="row form-group">
						<div class="col col-md-3"><label for="hotel_id" class=" form-control-label">Tên khách sạn <span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<select name="hotel_id" class="form-control" data-parsley-trigger="change" required >
								@if (count($hotels) > 0)
									@foreach ($hotels as $hotel)
										<option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
									@endforeach
								@endif
							</select>
						</div>
						@if ($errors->has('hotel_id'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('hotel_id') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="room_type_id" class=" form-control-label">Loại phòng<span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<select name="room_type_id" class="form-control" data-parsley-trigger="change" required >
								@if (count($room_types) > 0)
									@foreach ($room_types as $room_type)
										<option value="{{ $room_type->id }}">{{ $room_type->room_type }}</option>
									@endforeach
								@endif
							</select>
						</div>
						@if ($errors->has('room_type_id'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('room_type_id') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="room_status_id" class=" form-control-label">Trạng thái<span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<select name="room_status_id" class="form-control" data-parsley-trigger="change" required >
								@if (count($room_statuses) > 0)
									@foreach ($room_statuses as $room_status)
										<option value="{{ $room_status->id }}">{{ $room_status->room_status }}</option>
									@endforeach
								@endif
							</select>
						</div>
						@if ($errors->has('room_status_id'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('room_status_id') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="name" class=" form-control-label">Tên phòng <span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="name" placeholder="Tên phòng"
							value="{{old('name')}}" class="form-control" data-parsley-trigger="change" required minlength="3">
						</div>
						@if ($errors->has('name'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('name') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="floor" class=" form-control-label">Tầng<span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="number" name="floor" placeholder="Tầng"
							value="{{old('floor')}}" class="form-control" data-parsley-trigger="change" required min="1">
						</div>
						@if ($errors->has('floor'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('floor') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
							<div class="col col-md-3"><label for="price" class=" form-control-label">Giá <span class="text text-danger">*</span></label></div>
							<div class="col-12 col-md-9">
								<input type="number" name="price" placeholder="Giá"
								value="{{old('price')}}" class="form-control" data-parsley-trigger="change" required>
							</div>
							@if ($errors->has('price'))
								<small class="form-control-feedback text text-danger">
									{{ $errors->first('price') }}
								</small>
							@endif
					</div>
					<div class="row form-group">
							<div class="col col-md-3"><label for="discount" class=" form-control-label">Phần trăm giảm giá <span class="text text-danger">*</span></label></div>
							<div class="col-12 col-md-9">
								<input type="number" name="discount" placeholder="Phần trăm giảm giá"
								value="{{old('discount')}}" class="form-control" data-parsley-trigger="change" required max="100">
								<small>Đơn vị: %</small>
							</div>
							@if ($errors->has('discount'))
								<small class="form-control-feedback text text-danger">
									{{ $errors->first('discount') }}
								</small>
							@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="description" class=" form-control-label">Mô tả</label></div>
						<div class="col-12 col-md-9">
							<textarea name="description" cols="55" placeholder="Mô tả"> {{ old('description') }}</textarea>
						</div>
						@if ($errors->has('description'))
							<small class="form-control-feedback text text-danger">
								{{ $errors->first('description') }}
							</small>
						@endif
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="image_link" class=" form-control-label">Link ảnh thay thế</label></div>
						<div class="col-12 col-md-9">
							<input type="url" name="image_link" placeholder="Link ảnh thay thế" class="form-control" data-parsley-trigger="change" value="{{old('image_link')}}">
						</div>
					</div>
              	</div>
              	<div class="col-4">
                  	<div class="row form-group">
						<div class="col-12">
							<label for="image" class=" form-control-label">Hình ảnh <span class="text text-danger"></span></label><br/>
							<small class="text text-primary">Đây là hình ảnh chính để hiển thị, bạn có thể bổ sung hình ảnh khác sau</small>
						</div>
						<div class="col-12">
							<img class="mt-4" id="preview_avatar" src="admin_page_asset/images/default_image.png" alt="ảnh đại điện">
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
