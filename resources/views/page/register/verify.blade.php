<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Xác thực tài khoản email</title>
    </head>
    <body>
        <div>
            <h4>Chào {{$name}},</h4>
        </div>
        <div>
            <p>
                Cảm ơn bạn đã đăng ký tài khoản từ website HataBooking của
                chúng tôi.
            </p>
        </div>
        <div>
            <p>
                Hãy nhấn vào đường link bên dưới để xác thực tài khoản.<br>
                <a href="{{route('get-page-verify',['code' => $code])}}">Xác thực</a>
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
