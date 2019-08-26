@extends('admin.layout.masterpage')

@section('css')
{{-- css validation --}}
    <link rel="stylesheet" href="admin_page_asset/css/parsley.css">
@endsection

@section('title')
  Đặt phòng
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Đặt phòng
        </div>
        <div class="card-body card-block">
          {{-- form data --}}
          <form id="data_add" action="#" method="post" enctype="multipart/form-data" class="form-horizontal" data-parsley-validate="">
            <div class="row">
              <div class="col-8">
                <div class="row form-group">
                  <div class="col col-md-3"><label for="email-input" class=" form-control-label">Họ và tên khách hàng</label></div>
                  <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="customer_name" placeholder="" class="form-control" data-parsley-trigger="change" required="" >
                  </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số điện thoại</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="hotel_name" placeholder="" class="form-control" data-parsley-trigger="change" required=""></div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                <div class="col-12 col-md-9"><input type="text" id="email-input" name="hotel_name" placeholder="" class="form-control" data-parsley-trigger="change" required=""></div>
            </div>
              <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Tên khách sạn</label></div>
                <div class="col-12 col-md-9">
                    <select name="hotel_name" id="hotel_name" class="form-control" data-parsley-trigger="change">
                        @foreach($hotel as $hote)
                    <option value="{{$hote->id}}">{{$hote->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Tên phòng</label></div>
                <div class="col-12 col-md-9">
                    <select name="room_name" id="room_name" class="form-control" data-parsley-trigger="change">
                        {{-- @foreach($room as $roo)
                    <option value="{{$roo->id}}">{{$roo->name}}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="password-input" class=" form-control-label">Ngày nhận</label></div>
                    <div class="col-12 col-md-9">
                      <input type="date" id="date-input" name="date_from" placeholder="" class="form-control" data-parsley-trigger="change" required="">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ngày trả</label></div>
                    <div class="col-12 col-md-9">
                      <input type="date" id="date-input" name="" placeholder="Số điện thoại" class="form-control" data-parsley-trigger="change" required="">
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
              <div class="col col-md-2"><label for="textarea-input" class=" form-control-label">Ghi chú</label></div>
              <div class="col-12 col-md-10"><textarea name="note" id="textarea-input" rows="9" placeholder="Nội dung..." class="form-control" data-parsley-trigger="change"></textarea></div>
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
    {{-- Xử lí ajax cho phòng và khách sạn --}}
    <script>
            $(document).ready(function(){               //Mỗi khi f5 trang thì sẽ thực hiện
                $("#hotel_name").change(function(){        //mỗi khi id="Hotel" có sự thay đổi thì thực hiện
                    var idHotel=$(this).val();        //lấy idHotel = chính id Hotel đc chọn 
                    $.get("index.php/admin/ajax/room/"+idHotel,function(data){ //Gọi trang ajax lên và tạo một function, truyền dữ liệu vô biến data
                    //   alert(data);
                        $("#room_name").html(data);       //truyền dữ liệu lên <select id="Room">
    
    
                    });                                          
                });
                      //mỗi khi id="Hotel" có sự thay đổi thì thực hiện
                    var idHotel=$("#hotel_name").val();        //lấy idTheLoai = chính id Hotel đc chọn 
                    $.get("index.php/admin/ajax/room/"+idHotel,function(data){ //Gọi trang ajax lên và tạo một function, truyền dữ liệu vô biến data
                      //  alert(data);
                        $("#room_name").html(data);       //truyền dữ liệu lên <select id="Room_name">
    
    
                                                          
                });
            });
        </script>

    {{-- validation with parsley js --}}
    <script src="admin_page_asset/js/validation/parsley.min.js"></script>
@endsection
