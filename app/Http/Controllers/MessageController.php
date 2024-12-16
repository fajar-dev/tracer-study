<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('home')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $report = New Message();
        $report->name = $request->input('name');
        $report->email = $request->input('email');
        $report->content = $request->input('message');
        $report->save();

        return redirect()->route('home')->with('success', 'Message has been sent successfully');
    }
    public function message(Request $request){
        $search = $request->input('q');
        $data = Message::where('name', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Message',
            'subTitle' => null,
            'page_id' => null,
            'message' => $data
        ];
        return view('app.message.message', $data);
    }

    public function messageDestroy($id){
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.message')->with('success', 'Message has been deleted successfully');
    }
}
