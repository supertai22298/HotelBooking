@extends('admin.layout.masterpage')
@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection
@section('title')
  Chỉnh sửa loại phòng
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
          Chỉnh sửa loại phòng
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
          @if (!empty($roomType))
              
        <form id="data_add" action="/admin/room-type/edit/{{$roomType->id}}" method="POST" class="form-horizontal" data-parsley-validate="">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-8">
                <div class="row form-group">
                  <div class="col col-md-3"><label for="email-input" class="form-control-label">Loại phòng <span class="text text-danger">*</span></label></div>
                  <div class="col-12 col-md-9">
                    <input type="number" name="id" value="{{$roomType->id}}" class="d-none">
                    <input type="text" name="room_type" id="room_type" placeholder="Nhập loại phòng mới" value="{{$roomType->room_type}}"
                        class="form-control" data-parsley-trigger="change" required minlength="6" >
                        @if ($errors->has('room_type'))
                          <small class="form-control-feedback text-danger">
                            {{$errors->first('room_type')}}
                          </small>
                        @endif
                      <small id="input-room-type" class="d-none text"></small>
                  </div>
                </div>   
                <div class="row form-group">
                  <div class="col col-md-3"><label for="description" class=" form-control-label">Mô tả</label></div>
                  <div class="col-12 col-md-9"><textarea name="description" rows="4" cols="50" placeholder="Nội dung..." class="form-control" data-parsley-trigger="change">{{$roomType->description}}</textarea></div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3"><label for="active" class=" form-control-label">Trạng thái <span class="text text-danger">*</span></label></div>
                  <div class="col-12 col-md-9">
                      <select name="active" class="form-control" data-parsley-trigger="change">
                          <option value="1" {{$roomType->active == 1 ? 'selected': ''}}>Hoạt động</option>
                          <option value="0" {{$roomType->active == 0 ? 'selected': ''}}>Không hoạt động</option>
                      </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mr-5">
                  <i class="fa fa-dot-circle-o"></i> Xác nhận
                </button>
              </div>
          </form>
          {{-- end form data --}}
          @endif

        </div>
    </div>
@endsection

@section('script')
    
    {{-- validation with parsley js --}}
    <script src="admin_page_asset/js/validation/parsley.min.js"></script>
@endsection
