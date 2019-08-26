@extends('admin.layout.masterpage')
@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection
@section('title')
  Chi tiết khách sạn {{ $hotel->name }}
@endsection

@section('content')
@if (!empty($hotel))
  <div>
    <img src="{{ asset('upload/images'). '/' . $hotel->image }}" height="300px" alt="...">
  </div>
  <div>
    <p>
      <strong >Khách sạn {{ $hotel->name }}</strong>
      <strong>Địa chỉ : </strong>{{ $hotel->address }}, {{ $hotel->city }}, {{ $hotel->country }} <br/>
      <strong>Số điện thoại : </strong>{{ $hotel->main_phone_number }} <br/>
      <strong>Email : </strong>{{ $hotel->company_email_address }} <br/>
      <strong>Số phòng hiện có : </strong>{{ count($hotel->rooms) }} <br/>
    </p>  
        <a class="btn btn-warning" href="{{ route('get-hotel-edit', ['id' => $hotel->id ]) }}">Chỉnh sửa</a>
  </div>
  <div>
    <strong>Tiện ích</strong>
  </div>
@endif

@endsection

@section('script')
    
    {{-- validation with parsley js --}}
    <script src="admin_page_asset/js/validation/parsley.min.js"></script>
@endsection
