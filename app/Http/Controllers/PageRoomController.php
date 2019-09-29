<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Blog;
use App\Booking;
use App\BookingStatus;
use App\Hotel;
use App\HotelUtility;
use App\HotelUtillity;
use App\Jobs\SendMailWhenGuestBooking;
use App\Message;
use App\Notifications\TestNotification;
use App\Notification;
use Carbon\Carbon;
use App\Payment;
use App\PaymentStatus;
use App\PaymentType;
use App\Rate;
use App\RateType;
use App\Room;
use App\RoomImage;
use App\RoomStatus;
use App\RoomType;
use Illuminate\Support\Facades\Auth;
use App\Events\BookingNotiEvent;
class PageRoomController extends Controller
{
    //
    public function roomGrid()
    {
        $rooms = Room::where('room_status_id', 1)->orderBy('created_at', 'desc')->simplePaginate(6);
        // add $hotels for sort
        $citys = Hotel::select('city')->groupBy('city')->orderBy('city', 'desc')->get();
        $utilitys = HotelUtility::select('utility')->groupBy('utility')->orderBy('utility', 'desc')->get();
        $stars = Hotel::select('hotel_star')->groupBy('hotel_star')->orderBy('hotel_star', 'desc')->get();

        $sorts = ['citys' => $citys, 'utilitys' => $utilitys, 'stars' => $stars];

        return view('page.room.room_grid', ['rooms' => $rooms, 'sorts' => $sorts]);
    }
    public function roomDetail($id)
    {
        $room = Room::findOrFail($id);
        $rooms = Room::where('id', '<>', $id)->where('room_status_id', 1)->simplePaginate(3);
        $paymentTypes = PaymentType::where('active', 1)->get();
        return view('page.room.room_detail', [
            'room' => $room,
            'rooms' => $rooms,
            'paymentTypes' => $paymentTypes,
        ]);
    }

    public function roomBooking(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $rooms = Room::where('id', '<>', $id)->where('room_status_id', 1)->simplePaginate(3);
        $booking = new Booking();

        $payment = new Payment();
        $payment->booking_id = $booking->id;
        $payment->payment_status_id = 1;

        if (Auth::check()) {
            try {
                $booking->customer_name = $request->first_name . " " . $request->last_name;
                $booking->customer_phone = $request->phone_number;
                $booking->customer_email = $request->email;
                $booking->user_id     = Auth::user()->id;
                $booking->room_id    = $room->id;
                $booking->date_from = $request->date_from;
                $booking->date_to = $request->date_to;
                $booking->booking_status_id = 2;
                $payment->payment_type_id=$request->payment;
                $booking->description = "Số lượng phòng khách đặt: ".$request->room_num."\n".
                                        "Số lượng giường yêu cầu: ".$request->bed_num. "\n".
                                        "Số người lớn:".$request->adult_num."\n". 
                                        "Số trẻ em: ".$request->kid_num."\n". 
                                        "Yêu cầu của khách: ".$request->noti."\n";
                $dayfrom= strtotime($request->date_from);
                $dayto  = strtotime($request->date_to);
                if(($dayto - $dayfrom)<0){
                    return back()->with('errorSQL', 'Ngày đi phải sau ngày đến')->withInput();
                }
                $booking->save();
                   //tạo key subject
                $booking->subject = "Khách hàng ".$booking->customer_name." vừa book phòng";
                //dât của noti
                $data = array(
                    'name'      =>$booking->customer_name,
                    'subject'   =>$booking->subject,

                );
                //lưu thông báo booking
                $booking->notify(new TestNotification($booking));
                event(new BookingNotiEvent($data));
                
            } catch (Exception $e) {
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
            }
            return redirect()->back()->with('success', 'Đặt thành công');
        } else {
            return redirect('/login')->with('msg', 'Bạn cần đăng nhập để đặt phòng');
        }
    }
    public function BookingNoti($id){

        $noti = Notification::where('notifiable_id',$id)->first();
        $noti->read_at=Carbon::now()->toDateTimeString();
        $noti->save();
        //echo $noti->read_at; die();
        $booking = Booking::orderBy('id','DESC')->get();
        return view('admin.roombooking.index', ['booking' => $booking]);
    }
}
