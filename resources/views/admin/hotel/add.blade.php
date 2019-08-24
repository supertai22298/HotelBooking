@extends('admin.layout.masterpage')

@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection

@section('title')
Thêm khách sạn mới
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Thêm mới khách sạn
        </div>
        <div class="card-body card-block">
          {{-- form data --}}
		<form id="data_add" action="{{ route('post-hotel-store') }}" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
            {{ csrf_field() }}
            <div class="row">
              	<div class="col-8">
					<div class="row form-group">
						<div class="col col-md-3"><label for="name" class=" form-control-label">Tên khách sạn <span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="name" placeholder="Tên khách sạn" class="form-control" data-parsley-trigger="change" required minlength="4" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="hotel_star" class=" form-control-label">Số sao</label></div>
						<div class="col-12 col-md-9">
							<input type="number" name="hotel_star" placeholder="Số sao" class="form-control" data-parsley-trigger="change" required min="1" max="5" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="motto" class=" form-control-label">Châm ngôn</label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="motto" placeholder="Châm ngôn" class="form-control" data-parsley-trigger="change" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="address" class=" form-control-label">Địa chỉ<span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="address" placeholder="Địa chỉ" class="form-control" data-parsley-trigger="change" required minlength="6">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="address_2" class=" form-control-label">Địa chỉ 2</label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="address_2" placeholder="Địa chỉ 2" class="form-control" data-parsley-trigger="change">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="city" class=" form-control-label">Thành phố <span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="city" placeholder="Thành phố" class="form-control" data-parsley-trigger="change" required minlength="3">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="country" class=" form-control-label">Quốc gia <span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="country" placeholder="Quốc gia" class="form-control" data-parsley-trigger="change" required minlength="3">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="main_phone_number" class=" form-control-label">Số điện thoại chính<span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="main_phone_number" placeholder="Số điện thoại chính" class="form-control" data-parsley-trigger="change" required minlength="6" maxlength="15">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="toll_free_number" class=" form-control-label">Số điện thoại miễn cước</label></div>
						<div class="col-12 col-md-9">
							<input type="text" name="toll_free_number" placeholder="Số điện thoại miễn cước" class="form-control" data-parsley-trigger="change" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="company_email_address" class=" form-control-label">Email<span class="text text-danger">*</span></label></div>
						<div class="col-12 col-md-9">
							<input type="email" name="company_email_address" placeholder="Email" class="form-control" data-parsley-trigger="change" required minlength="8">
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="website_address" class=" form-control-label">Địa chỉ trang web</label></div>
						<div class="col-12 col-md-9">
							<input type="url" name="website_address" placeholder="Địa chỉ trang web" class="form-control" data-parsley-trigger="change" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3"><label for="image_link" class=" form-control-label">Link ảnh thay thế</label></div>
						<div class="col-12 col-md-9">
							<input type="url" name="image_link" placeholder="Link ảnh thay thế" class="form-control" data-parsley-trigger="change">
						</div>
					</div>
              	</div>
              	<div class="col-4">
                  	<div class="row form-group">
						<div class="col-12"><label for="image" class=" form-control-label">Hình ảnh</label></div>
						<div class="col-12">
							<img class="mt-4" id="preview_avatar" src="admin_page_asset/images/default.png" alt="ảnh đại điện">
							<input type="file" id="image" name="image" class="form-control-file" required>
						</div>
                  	</div>
                </div>
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
    $("#image").change(function(){
      readURL(this)
    })
    </script>

    {{-- validation with parsley js --}}
    <script src="admin_page_asset/js/validation/parsley.min.js"></script>
@endsection
