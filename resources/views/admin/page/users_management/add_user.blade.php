@extends('admin.layout_admin.admin_masterpage')

@section('title')
  Them moi nguoi dung
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Thêm mới người dùng
        </div>
        <div class="card-body card-block">
          {{-- form data --}}
          <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3"><label for="email-input" class=" form-control-label">Họ và tên</label></div>
                <div class="col-12 col-md-9"><input type="email" id="email-input" name="full_name" placeholder="Họ và tên" class="form-control">  
                  <small class="help-block form-text">Vui lòng nhập họ và tên</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên đăng nhập</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="username" placeholder="Tên đăng nhập" class="form-control">
                  <small class="form-text text-muted">Vui lòng nhập tên đăng nhập</small></div>
            </div>
              <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="Email" placeholder="Email" class="form-control">
                    <small class="form-text text-muted">Vui lòng nhập email</small></div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3"><label for="password-input" class=" form-control-label">Mật khẩu</label></div>
                  <div class="col-12 col-md-9"><input type="password" id="password-input" name="password" placeholder="Mật khẩu" class="form-control">
                    <small class="help-block form-text">Vui lòng nhập mật khẩu</small></div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số điện thoại</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="phone_number" placeholder="Số điện thoại" class="form-control">
                    <small class="form-text text-muted">Vui lòng xác nhận nhập mật khẩu</small></div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3"><label for="text-input" class=" form-control-label">Địa chỉ</label></div>
                  <div class="col-12 col-md-9"><input type="text" id="text-input" name="address" placeholder="Địa chỉ" class="form-control">
                    <small class="form-text text-muted">Vui lòng địa chỉ</small></div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Tiểu sử</label></div>
                  <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Nội dung..." class="form-control"></textarea></div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3"><label for="select" class=" form-control-label">Loại người dùng</label></div>
                  <div class="col-12 col-md-9">
                      <select name="role" id="select" class="form-control">
                          <option value="0">Khách hàng</option>
                          <option value="1">Quản trị viên</option>
                      </select>
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3"><label for="file-input" class=" form-control-label">Avatar</label></div>
                  <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
              </div>
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-dot-circle-o"></i> Lưu
              </button>
              <button type="reset" class="btn btn-danger">
                  <i class="fa fa-ban"></i> Đặt lại
              </button>
          </form>
        </div>
    </div>
@endsection