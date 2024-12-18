<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\News;
use App\Models\Report;
use App\Models\Survey;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Dashboard',
            'subTitle' => null,
            'page_id' => null,
            'news' => News::count(),
            'message' => Message::count(),
            'report' => Report::count(),
            'survey' => Survey::where('is_active', true)->count(),
        ];
        return view('app.dashboard',  $data);
    }
}
