<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
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
