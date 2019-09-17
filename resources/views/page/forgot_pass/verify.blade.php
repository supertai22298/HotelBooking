<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Quên mật khẩu</title>
    </head>
    <body>
        <div>
            <h4>Chào {{$name}},</h4>
        </div>
        <div>
            <p>
                Cảm ơn bạn đã sử dụng chức năng quên mật khẩu từ website HataBooking của
                chúng tôi.
            </p>
        </div>
        <div>
            <p>
                Đây là mật khẩu mới của bạn <strong>{{$new_password}}</strong>
            </p>
            <p>
                Bạn có thể đăng nhập <a href="{{route('get-login')}}">tại đây</a>.
            </p>
            <p>
                Vì lí do bảo mật tài khoản nên mong bạn hãy sớm thay đổi mật khẩu mới.
            </p>
            <p>
                Thông tin chi tiết vui lòng theo dõi website tại địa chỉ
                <a href="{{route('get-page-view')}}">HataBooking - Website đặt phòng trực tuyến</a>
            </p>
        </div>
        <div>
            <p>
               Trân trọng
            </p>
            <p>
               Đội ngũ phát triển đồ án CDIO
               <pre>
                   <strong>
                    - Nguyễn Văn Tài
                    - Nguyễn Chiếm Hảo
                    - Phạm Anh Tài
                    </strong>
               </pre>
            </p>
        </div>
        <div>
            <p>Thư này được tạo ra tự động. Vui lòng không trả lời thư này.</p>
        </div>
    </body>
</html>
