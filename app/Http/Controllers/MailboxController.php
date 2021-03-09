<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MailBox;
use App\User;
class MailboxController extends Controller
{
    public function index(){
        $data['mailbox'] = MailBox::with('receiver')->where('to', auth()->user()->id)->orderBy('created_at','desc')->get();
        return view('admin.contents.mailbox', $data);
    }

    public function compose(){
        $data['users'] = User::where('status',1)->where('id','!=',auth()->user()->id)->get();
        return view('admin.contents.mailbox_compose', $data);
    }

    public function send(Request $request){
        foreach($request->recipient as $recipient){
            $mailbox = new MailBox;
            $mailbox->to = $recipient;
            $mailbox->from = auth()->user()->id;
            $mailbox->subject = $request->subject;
            $mailbox->content = $request->content;
            $mailbox->save();
        }

        return response()->json(array('success' => true, 'msg' => 'Email Sent.'));
    }

    public function unsent(Request $request){
        foreach($request->ids as $id){
            $mailbox = Mailbox::find($id);
            $mailbox->unsent = 1;
            $mailbox->save();
        }

        return response()->json(array('success' => true, 'msg' => 'Email Deleted.'));
        
    }

    public function sent(){
        $data['mailbox'] = MailBox::with('sender')->where('from', auth()->user()->id)->where('unsent', 0)->orderBy('created_at','desc')->get();
        return view('admin.contents.mailbox_sent', $data);
    }
    public function read($id){
        $data['email'] = MailBox::with(['receiver','sender'])->where('id',$id)->first();

        return view('admin.contents.mailbox_read', $data);
    }

    public function drafts(){

    }

    public function templates(){

    }
}
