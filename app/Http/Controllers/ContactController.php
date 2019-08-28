<?php

namespace App\Http\Controllers;

use App\Message;
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
        $getContact = Message::all();
        return view('admin.contact.index',['getContact' => $getContact, 'stt' => 1]);
    }

    public function delete($id)
    {
        $contact = Message::find($id);
        $contact->delete();
        return back()->with('noti','Xóa tài khoản thành công!!');
    }
}