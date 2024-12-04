<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SurveyController extends Controller
{
    public function survey(Request $request){
        $search = $request->input('q');
        $data = Survey::where('title', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Survey',
            'subTitle' => null,
            'survey' => $data
        ];
        return view('app.survey.survey',  $data);
    }

    public function surveyAdd(){
        $data = [
            'title' => 'Survey',
            'subTitle' => 'Add Survey',
        ];
        return view('app.survey.add-survey',  $data);
    }

    public function surveyStore(Request $request){
        $validator = Validator::make($request->all(), [
            'thumbnail' => 'nullable|sometimes|mimes:jpeg,bmp,png,jpg,svg|max:2000',
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.survey.add')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $survey = New Survey();
        $survey->title = $request->input('title');
        if($request->has('thumbnail')){
            $survey->thumbnail_path =  $request->file('thumbnail')->store('survey', 'public');
        }
        $survey->description = $request->input('description');
        $survey->user_id = Auth::user()->id;
        if($request->is_active == 'on'){
            $survey->is_active = true;
        }else{
            $survey->is_active = false;
        }
        if($request->is_private == 'on'){
            $survey->is_private = true;
        }else{
            $survey->is_private = false;
        }
        $survey->save();

        return redirect()->route('admin.survey.create-form', $survey->id)->with('success', 'Survey has been added successfully');
    }

    public function surveyCreateForm($id){
        $data = [
            'title' => 'Survey',
            'subTitle' => 'Add Survey',
            'survey' => Survey::findOrFail($id)
        ];
        return view('app.survey.create-form-survey',  $data);
    }

    public function surveyCreateFormSubmit(Request $request, $id){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'form_build' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }
        $survey = Survey::findOrFail($id);
        $survey->question = $request->form_build;
        $survey->save();
        return redirect()->route('admin.survey')->with('success', 'Survey has been created successfully');
    }
}
