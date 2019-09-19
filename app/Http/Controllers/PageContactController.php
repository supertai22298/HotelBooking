<?php

namespace App\Http\Controllers;

use App\Events\Test2Event;
use App\Events\TestEvent;
use App\Jobs\SendMailWhenSendContact;
use App\Message;
use Exception;
use Illuminate\Http\Request;

class PageContactController extends Controller
{
    //
    public function subscribeEmail(Request $request){
        try {
            $message = new Message();
            $message->name = 'Khách vãng lại';
            $message->email = request('email');
            $message->subject = 'Đăng ký nhận thông tin';
            $message->message = 'Khách đăng ký nhận thông tin qua email';
            $message->is_received_news = 1;
            $message->save();

            //tạo data
            $data = array(
                'email' =>  $message->email,
                'subject' => 'Đăng ký nhận thông tin',
                'name' => $message->name,
            );
            //send realtime notification
            event(new Test2Event($data));


            //send mail
            $job = new SendMailWhenSendContact($data);
            $this->dispatch($job);

        } catch (Exception $e) {
            return response()->json(['msg'=>$e->getMessage()]);
        }
        return response()->json(['msg'=>'Đăng ký nhận thông tin thành công']);
    }

    public function contact(){
        return view('page.contact_us');
    }

    public function storeContact(Request $request){

        try {
            $message = new Message();
            $message->name = request('name');
            $message->email = request('email');
            $message->subject = request('subject');
            $message->message = request('message');
            $message->is_received_news = request('is_received_news');
            $message->save();

            //tạo dữ liệu để truyền đi
            $data = array(
                'email' =>  $message->email,
                'subject' => 'Đăng ký nhận thông tin',
                'name' => $message->name,
            );
            //gọi event
            event(new TestEvent($data));

            //gửi mail
            if ($message->is_received_news == 1) {
                $job = new SendMailWhenSendContact($data);
                $this->dispatch($job);
            }

        } catch (Exception $e) {
            return response()->json([
                'msg'=>$e->getMessage(),
                'class'=>'alert alert-danger'
            ]);
        }
        return response()->json([
            'msg'=>'Gửi tin nhắn thành công',
            'class'=>'alert alert-success'
        ]);
    }
}
