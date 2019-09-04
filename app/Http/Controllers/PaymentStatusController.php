<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStatusRequest;
use Illuminate\Http\Request;
use App\PaymentStatus;

class PaymentStatusController extends Controller
{
    /**
     * Get method
     * View table payment_statuss
     * @return view admin.payment_status.index
     */
    public function view()
    {
        $paymentStatuses = PaymentStatus::all();
        return view('admin.payment_status.index', ['paymentStatuses' => $paymentStatuses]);
    }


    /**
     * Get method
     * View page add new payment_status
     * @return view admin.payment_status.add
     */
    public function create()
    {
        return view('admin.payment_status.add');
    }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view back() with success| back() with error
     */
    public function store(PaymentStatusRequest $request)
    {
        $paymentStatus = new PaymentStatus();
        try {

            $paymentStatus->create($request->all());
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'unique'))
                return back()->with('errorSQL', 'Tình trạng phòng đã tồn tại')->withInput();
            else
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }

        return redirect()->back()->with('success', 'Thêm loại phòng thành công');
    }
    /**
     * Get method
     * @param $id
     * @return view admin.payment_status.edit with infomation that owned by payment_status has that id
     */
    public function edit($id)
    { 
        $paymentStatus = PaymentStatus::find($id);
        //dd($paymentStatus);
        return view('admin.payment_status.edit', ['paymentStatus' => $paymentStatus]);
    }


    /**
     * @param $id
     * @param @param Illuminate\Http\Request
     * @return view
     */
    public function update($id, PaymentStatusRequest $request)
    {
       // dd($id, $request->all());
        try {
			$paymentStatus = PaymentStatus::find($id);
			$paymentStatus->payment_status = $request->payment_status;
			$paymentStatus->description = $request->description;
			$paymentStatus->active = $request->active;
			$paymentStatus->save();
		} catch (Exception $e) {
			if (strpos($e->getMessage(), 'unique'))
                return back()->with('errorSQL', 'Tình trạng phòng đã tồn tại')->withInput();
            else
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
		}
        
        return back()->with('success','Sửa thành công');
    }

    /**
     * Post method
     * @param Request $id
     * @return view admin.payment_status.index with success or error
     */
    public function delete($id)
    {
        try{
            $paymentStatus = PaymentStatus::where('id', $id)->delete();
        }
        catch(Exception $e)
        {
            return back()->with('errors', $e);
        }
        return back()->with('success','Thao tác thành công');
    }
}
