<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Email khi người dùng gửi liên hệ</title>
    </head>
    <body>
        <div>
            <h4>Chào {{ $data['name'] }},</h4>
        </div>
        <div>
            <p>
                Chúc bạn 1 ngày mới tốt lành!
                Cảm ơn bạn đã thực hiện đặt phòng tại website của chúng tôi
            </p>
        </div>
        <div>
            <p>
                {!! $data['description'] !!}
            </p>
        </div>
        <div>
            <p>
                Những thông tin mới nhất, những ưu đãi hấp dẫn cùng với những
                tính năng mới sẽ được thông báo tới bạn trong thời gian sớm nhất
            </p>
            <p>
                Thông tin chi tiết vui lòng theo dõi website tại địa chỉ
                <a href="http://localhost:8000/">HataBooking - Website đặt phòng trực tuyến</a>
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
