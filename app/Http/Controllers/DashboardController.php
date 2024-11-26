<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Dashboard',
            'subTitle' => null,
            'page_id' => null,
        ];
        return view('app.dashboard',  $data);
    }
}
