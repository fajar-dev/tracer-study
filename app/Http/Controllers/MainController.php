<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\News;
use App\Models\Report;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
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
        $report->message = $request->input('message');
        $report->save();

        return redirect()->route('home')->with('success', 'Message has been sent successfully');
    }
    public function index(){
        $data = [
            'title' => 'Home',
            'subTitle' => null,
            'page_id' => null,
            'news' => News::orderby('created_at', 'desc')->limit(5)->get(),
            'survey' => Survey::where('is_private', false)->where('is_active', true)->whereNotNull('question')->orderby('created_at', 'desc')->limit(4)->get(),
            'report' => Report::orderby('created_at', 'desc')->limit(4)->get(),
        ];

        return view('main.index',  $data);
    }
}
