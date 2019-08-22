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
        <form action={{route('post-them-nguoi-dung')}} method="post"  class="form-horizontal">
            {{ csrf_field() }}
            <div class="row form-group">
                <div class="col col-md-3"><label for="room_type" class=" form-control-label">Loại phòng</label></div>
                <div class="col-12 col-md-9"><input type="text" name="room_type" placeholder="Loại phòng" class="form-control" required>  
                  <small class="help-block form-text">Nhập loại phòng</small></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="description" class=" form-control-label">Loại phòng</label></div>
                <div class="col-12 col-md-9">
                    <textarea name="description"  cols="30" rows="10" class="form-control" placeholder="Mô tả loại phòng"></textarea>
                </div>
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