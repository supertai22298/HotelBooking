<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyEmailRequest;
use App\Jobs\ReplyEmailJob;
use App\Jobs\SendMultiMail;
use App\Message;
use App\Notification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Get method
     * View table user
     * @return view admin.user.index
     */
    public function view()
    {
        $getContact = Message::orderBy('created_at', 'desc')->get();
        return view('admin.contact.index', ['getContact' => $getContact, 'stt' => 1]);
    }

    public function delete($id)
    {
        $contact = Message::find($id);
        $contact->delete();
        return back()->with('noti', 'Xóa liên hệ thành công!!');
    }

    public function replyEmail($id)
    {
        $contact = Message::findOrFail($id);
        return view('admin.contact.reply-email', [
            'contact' => $contact
        ]);
    }
    public function handleReplyEmail(ReplyEmailRequest $request)
    {

        $data = array(
            'description' => $request->description,
            'email' => $request->email,
            'subject' => $request->subject,
            'active' => $request->active,
            'admin_email' => 'supertai22298@gmail.com'
        );
        try {
            $job = new ReplyEmailJob($data);
            $this->dispatch($job);
        } catch (Exception $e) {
            return back()->withErrors('errorSQL', $e->getMessage());
        }
        return back()->with('noti', 'Gửi thành công');
    }

    public function sendMultiMail()
    {
      
       

        return view('admin.contact.send-multi-mail' );
    }
    public function handleSendMultiMail(Request $request)
    {

        $emails = explode(',', $request->emails);
        if($request->multiple == 1){
            $contacts = Message::select('email')->where('is_received_news', 1)->whereNotIn('email', $emails)->groupBy('email')->get();
            foreach ($contacts as $contact) { 
                array_push($emails, $contact->email);
            }
        }

        $data = [
            'emails' => $emails,
            'subject' => $request->subject,
            'description' => $request->description,
            'active' => $request->active,
            'admin_email' => 'supertai22298@gmail.com'
        ];
        try {
            $job = new SendMultiMail($data);
            $this->dispatch($job);
        } catch (Exception $e) {
            return redirect()->back()->withErrors('noti', $e->getMessage());
        }
        return redirect()->back()->with('noti', 'Gửi email thành công');
    }

    public function markAsRead(Request $request){
        try {
            $message = Message::findOrFail(request('id'));
            $message->read_at = Carbon::now();
            $message->save();

            $noti = Notification::where('notifiable_type', 'App\Message')->where('notifiable_id', $message->id)->first();
            $noti->read_at = Carbon::now();
            $noti->save();
        } catch (Exception $e) {
            return response()->json(['result' => $e->getMessage()]);
        }
        return response()->json(['result' => 'Thành công']);
       
    }
}
