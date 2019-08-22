@extends('admin.layout_admin.admin_masterpage')
@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection
@section('title')
  Chỉnh sửa người dùng
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Chỉnh sửa người dùng
        </div>
        <div class="card-body card-block">
          {{-- form data --}}
          <form id="data_add" action="#" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
            <div class="row">
              <div class="col-8">
                <div class="row form-group">
                  <div class="col col-md-3"><label for="email-input" class=" form-control-label">Họ và tên *</label></div>
                  <div class="col-12 col-md-9">
                    <input type="text" id="email-input" name="full_name" placeholder="Họ và tên" class="form-control" data-parsley-trigger="change" required="" >
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên đăng nhập *</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="username" placeholder="Tên đăng nhập" class="form-control" data-parsley-trigger="change" required=""></div>
              </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email *</label></div>
                    <div class="col-12 col-md-9">
                      <input type="email" id="text-input" name="Email" placeholder="Email" class="form-control" data-parsley-trigger="change" required="">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Mật khẩu *</label></div>
                    <div class="col-12 col-md-9">
                      <input type="password" id="password-input" name="password" placeholder="Mật khẩu" class="form-control" data-parsley-trigger="change" required="">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số điện thoại</label></div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="text-input" name="phone_number" placeholder="Số điện thoại" class="form-control" data-parsley-trigger="change" required="">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Địa chỉ</label></div>
                    <div class="col-12 col-md-9">
                      <input type="text" id="text-input" name="address" placeholder="Địa chỉ" class="form-control" data-parsley-trigger="change">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Loại người dùng *</label></div>
                    <div class="col-12 col-md-9">
                        <select name="role" id="select" class="form-control" data-parsley-trigger="change">
                            <option value="0">Khách hàng</option>
                            <option value="1">Quản trị viên</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-4">
                  <div class="row form-group">
                    <div class="col-12"><label for="file-input" class=" form-control-label">Avatar</label></div>
                    <div class="col-12">
                      <img class="mt-4" id="preview_avatar" src="admin_page_asset/images/default.png" alt="ảnh đại điện">
                      <input type="file" id="avatar" name="file-input" class="form-control-file">
                    </div>
                  </div>
                </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-2"><label for="textarea-input" class=" form-control-label">Tiểu sử</label></div>
              <div class="col-12 col-md-10"><textarea name="description" id="textarea-input" rows="9" placeholder="Nội dung..." class="form-control" data-parsley-trigger="change"></textarea></div>
          </div>
            
          <input type='text' data-parsley-multiple-of='3' />

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
@endsection