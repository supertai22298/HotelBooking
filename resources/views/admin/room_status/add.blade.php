@extends('admin.layout.masterpage')

@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection

@section('title')
  Thêm tình trạng phòng
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
          Thêm tình trạng phòng
        </div>
        @if (session('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
        @endif
        @if (session('errorSQL'))
            <div class="alert alert-danger">
              {{session('errorSQL')}}
            </div>
        @endif
        <div class="card-body card-block">
          {{-- form data --}}
          <form id="data_add" action={{ route('post-room-status-store')}} method="post" class="form-horizontal" data-parsley-validate="">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-8">
                <div class="row form-group">
                  <div class="col col-md-3"><label for="email-input" class="form-control-label">Tình trạng phòng <span class="text text-danger">*</span></label></div>
                  <div class="col-12 col-md-9">
                  <input type="text" name="room_status" id="room_status" placeholder="Nhập tình trạng phòng mới" value="{{old('room_status')}}"
                      class="form-control" data-parsley-trigger="change" required minlength="6" >
                      @if ($errors->has('room_status'))
                          <small class="form-control-feedback text-danger">
                            {{$errors->first('room_status')}}
                          </small>
                      @endif
                  </div>
                </div>   
                <div class="row form-group">
                  <div class="col col-md-3"><label for="description" class=" form-control-label">Mô tả</label></div>
                  <div class="col-12 col-md-9"><textarea name="description" rows="4" cols="50" placeholder="Nội dung..." class="form-control" data-parsley-trigger="change">{{old('description')}}</textarea></div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3"><label for="active" class=" form-control-label">Trạng thái <span class="text text-danger">*</span></label></div>
                  <div class="col-12 col-md-9">
                      <select name="active" class="form-control" data-parsley-trigger="change">
                          <option value="1" selected>Hoạt động</option>
                          <option value="0">Không hoạt động</option>
                      </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mr-5">
                  <i class="fa fa-dot-circle-o"></i> Lưu
                </button>
                <button type="reset" class="btn btn-danger">
                    <i class="fa fa-ban"></i> Đặt lại
                </button>
              </div>
          </form>
          {{-- end form data --}}
        </div>
    </div>
@endsection
@section('script')
    {{-- validation with parsley js --}}
    <script src="admin_page_asset/js/validation/parsley.min.js"></script>
@endsection
