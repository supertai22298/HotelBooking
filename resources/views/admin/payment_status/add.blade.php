@extends('admin.layout.masterpage')

@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection

@section('title')
  Thêm tình trạng thanh toán
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
                              <li><a href="{{ route('get-payment-status-view') }}">Tình trạng thanh toán</a></li>
                              <li><a href="{{ route('get-payment-status-create') }}">Thêm mới</a></li>
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
          Thêm tình trạng thanh toán
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
          <form id="data_add" action={{ route('post-payment-status-store')}} method="post" class="form-horizontal" data-parsley-validate="">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-8">
                <div class="row form-group">
                  <div class="col col-md-3"><label for="email-input" class="form-control-label">Tình trạng thanh toán <span class="text text-danger">*</span></label></div>
                  <div class="col-12 col-md-9">
                  <input type="text" name="payment_status" id="payment_status" placeholder="Nhập tình trạng thanh toán mới" value="{{old('payment_status')}}"
                      class="form-control" data-parsley-trigger="change" required minlength="6" >
                      @if ($errors->has('payment_status'))
                          <small class="form-control-feedback text-danger">
                            {{$errors->first('payment_status')}}
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
