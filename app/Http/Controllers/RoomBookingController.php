<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Blog;
use App\Booking;
use App\BookingStatus;
use App\Hotel;
use App\HotelUtillity;
use App\Message;
use App\Payment;
use App\PaymentStatus;
use App\PaymentType;
use App\Rate;
use App\RateType;
use App\Room;
use App\RoomImage;
use App\RoomStatus;
use App\RoomType;

class RoomBookingController extends Controller
{
    public function View()
    {
        $booking = Booking::orderBy('id','DESC')->get();
        return view('admin.roombooking.index', ['booking' => $booking]);
    }

    public function getAdd()
    {
        $hotel = Hotel::all();
        $room  = Room::all();
        return view('admin.roombooking.add', ['hotel' => $hotel, 'room' => $room]);
    }

    public function store(Request $request)
    {
        $booking = new Booking();
        try {
            $booking->customer_name = $request->customer_name;
            $booking->customer_phone = $request->customer_phone;
            $booking->customer_email = $request->customer_email;
            $booking->user_id     = 1;
            $booking->room_id    = $request->room_name;
            $booking->date_from = $request->date_from;
            $booking->date_to = $request->date_to;
            $booking->booking_status_id = 1;
            $booking->description = $request->note;

            $booking->save();
        } catch (Exception $e) {
            return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    public function delete($id)
    {
        try {
            $booking = Booking::findOrFail($id);
            $booking->delete();
        } catch (Exception $e) {
            return back()->with('errorSQL', 'Có lỗi xảy ra');
        }

        return redirect()->back()->with('success', 'Xoá thành công');
    }

    public function edit($id)
    {
        $hotel = Hotel::all();
        $room  = Room::all();
        $booking = Booking::findOrFail($id);
        return view('admin.roombooking.edit', ['booking' => $booking, 'hotel' => $hotel, 'room' => $room]);
    }

    public function update(Request $request, $id)
    {

        $booking = Booking::findOrFail($id);
        
            try {
                $booking->customer_name = $request->customer_name;
                $booking->customer_phone = $request->customer_phone;
                $booking->customer_email = $request->customer_email;
                $booking->user_id     = 1;
                $booking->room_id    = $request->room_name;
                $booking->date_from = $request->date_from;
                $booking->date_to = $request->date_to;
                $booking->booking_status_id = 1;
                $booking->description = $request->note;

                $booking->save();
            } catch (Exception $e) {
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
            }
            return redirect()->back()->with('success', 'Sửa mới thành công');
    }

    public function editStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        try {
            if ($request->booking_status == 1) {
                $booking->booking_status_id = 1;
            } elseif ($request->booking_status == 2) {
                $booking->booking_status_id = 2;
            }
            $booking->save();
        } catch (Exception $e) {
            return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }
        return redirect()->back()->with('success', 'Cập nhật tình trạng mới thành công');
    }
}
