<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function report(Request $request){
        $search = $request->input('q');
        $data = Report::where('title', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Report',
            'subTitle' => null,
            'page_id' => null,
            'report' => $data
        ];
        return view('app.report.report',  $data);
    }

    public function reportAdd(){
        $data = [
            'title' => 'Report',
            'subTitle' => 'Add Report',
            'page_id' => null,
        ];
        return view('app.report.add-report',  $data);
    }

    public function reportStore(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,bmp,png,jpg,svg,pdf,doc,docx,ppt,pptx,xls,xlsx',
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.report.add')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $report = New Report();
        $report->title = $request->input('title');
        $report->file_path =  $request->file('file')->store('report', 'public');
        $report->content = $request->input('content');
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect()->route('admin.report')->with('success', 'Report has been added successfully');
    }

    public function reportEdit($id){
        $data = [
            'title' => 'Report',
            'subTitle' => 'Edit Report',
            'page_id' => null,
            'report' => Report::findOrFail($id),
        ];
        return view('app.report.edit-report',  $data);
    }

    public function reportUpdate($id, Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'nullable|sometimes|image|mimes:jpeg,bmp,png,jpg,svg|max:2000',
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.report.edit', $id)->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $report = Report::findOrFail($id);
        $report->title = $request->input('title');
        $report->content = $request->input('content');
        if($request->has('file')){
            $report->file_path =  $request->file('file')->store('report', 'public');
        }
        $report->save();

        return redirect()->route('admin.report')->with('success', 'Report has been updated successfully');
    }

    public function reportDestroy($id){
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->route('admin.report')->with('success', 'Report has been deleted successfully');
    }
}
