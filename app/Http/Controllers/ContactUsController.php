<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function postContactUs(Request $request){
        $validation = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);
        if($validation){
            $contactUs = new ContactMessage();
            $contactUs->username = $request->username;
            $contactUs->email = $request->email;
            $contactUs->message = $request->message;
            $contactUs->save();
            return back()->with('message','Message successfully send to Admin...');
        }else{
            return back()->withErrors($validation);
        }
    }

    public function deleteMessage($id){
        ContactMessage::find($id)->delete();
        return back()->with('message','Message successfully deleted...');
    }

    public function editMessage($id){
        $message = ContactMessage::find($id);
        return view('admin.editContactMessage',compact('message'));
    }

    public function updateMessage(Request $request,$id){
        $validation = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        if($validation){
            $updateMessage = ContactMessage::find($id);
            $updateMessage->username = $request->username;
            $updateMessage->email = $request->email;
            $updateMessage->message = $request->message;
            $updateMessage->update();
            return redirect()->route('admin.contact_message')->with('message','Updated Message ...');
        }else{
            return back()->withErrors($validation);
        }

    }
}
