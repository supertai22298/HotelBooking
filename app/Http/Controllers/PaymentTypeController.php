<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Blog;
use App\Booking;
use App\BookingStatus;
Use App\Hotel;
Use App\HotelUtillity;
Use App\Message;
Use App\Payment;
Use App\PaymentStatus;
Use App\PaymentType;
Use App\Rate;
Use App\RateType;
Use App\Room;
use App\RoomImage;
use App\RoomStatus;
use App\RoomType;

class PaymentTypeController extends Controller
{
    public function View()
    { 
        $paymenttype=PaymentType::all();
        return view('admin.payment_type.index',['paymenttype'=>$paymenttype]);
    }

    public function editActive(Request $request, $id){
        $paymenttype = PaymentType::findOrFail($id);
        try {
            if($request->payment_active==1){
                $paymenttype->active=1;
            }elseif($request->payment_active==2){
                $paymenttype->active=2;
            }
            $paymenttype->save();
        } catch (Exception $e) {
            return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }
        return redirect()->back()->with('success', 'Cập nhật tình trạng mới thành công');
    }

    public function create()
    {
        return view('admin.payment_type.add');
    }

    public function store(Request $request)
    {
        $paymenttype = new PaymentType();
        try {

            $paymenttype->payment_type = $request->payment_type;
            $paymenttype->description  = $request->description;
            $paymenttype->active       = $request->active;
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'unique'))
                return back()->with('errorSQL', 'Loại thanh toán đã tồn tại')->withInput();
            else
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }
        $paymenttype->save();
        return redirect()->back()->with('success', 'Thêm loại thanh toán thành công');
    }

    public function edit($id)
    { 
        $paymenttype = PaymentType::find($id);  
        return view('admin.payment_type.edit', ['paymenttype' => $paymenttype]);
    }

    public function update(Request $request,$id)
    {
       // dd($id, $request->all());
        try {
			$paymenttype = PaymentType::find($id);
			$paymenttype->payment_type = $request->payment_type;
			$paymenttype->description = $request->description;
			$paymenttype->active = $request->active;
			$paymenttype->save();
		} catch (Exception $e) {
			if (strpos($e->getMessage(), 'unique'))
                return back()->with('errorSQL', 'Loại phòng đã tồn tại')->withInput();
            else
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
		}
        
        return back()->with('success','Sửa thành công');
    }

    public function delete($id)
    {
        try{
            $paymenttype = PaymentType::where('id', $id)->delete();
        }
        catch(Exception $e)
        {
            return back()->with('errors', $e);
        }
        return back()->with('success','Thao tác thành công');
    }
}
