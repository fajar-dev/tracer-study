<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Report;
use App\Models\Survey;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Dashboard',
            'subTitle' => null,
            'page_id' => null,
            'news' => News::orderby('created_at', 'desc')->limit(5)->get(),
            'survey' => Survey::orderby('created_at', 'desc')->limit(4)->get(),
            'report' => Report::orderby('created_at', 'desc')->limit(4)->get(),
        ];

        return view('main.index',  $data);
    }
}
