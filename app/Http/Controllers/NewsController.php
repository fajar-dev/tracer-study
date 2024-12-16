<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(Request $request){
        $search = $request->input('q');
        $category = $request->input('category');
        $query = News::query();
        if (!empty($search)) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }
        if (!empty($category)) {
            $query->where('news_category_id', $category);
        }
        $query = $query->orderBy('created_at', 'desc')->paginate(10);
        $query->appends([
            'q' => $search,
            'category' => $category
        ]);
        $data = [
            'title' => 'News',
            'subTitle' => null,
            'page_id' => null,
            'news' => $query,
            'category' => NewsCategory::all()
        ];
        return view('main.news.index',  $data);
    }

    public function show($slug){
        $news = News::where('slug', $slug)->firstOrFail();
        $data = [
            'title' => 'News',
            'subTitle' => 'List',
            'page_id' => null,
            'news' => $news,
            'category' => NewsCategory::all(),
            'recentPost' => News::orderBy('created_at', 'desc')->limit(5)->get()
        ];
        return view('main.news.show',  $data);
    }

    public function news(Request $request){
        $search = $request->input('q');
        $data = News::where('title', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'News',
            'subTitle' => 'List',
            'page_id' => null,
            'news' => $data
        ];
        return view('app.news.news',  $data);
    }

    public function newsAdd(){
        $data = [
            'title' => 'News',
            'subTitle' => 'Add News',
            'page_id' => null,
            'category' => NewsCategory::all()
        ];
        return view('app.news.add-news',  $data);
    }

    public function newsStore(Request $request){
        $validator = Validator::make($request->all(), [
            'thumbnail' => 'required|image|mimes:jpeg,bmp,png,jpg,svg|max:2000',
            'category' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.news.add')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $news = New News();
        $news->title = $request->input('title');
        $news->thumbnail_path =  $request->file('thumbnail')->store('news', 'public');
        $news->news_category_id = $request->input('category');
        $news->content = $request->input('content');
        $news->user_id = Auth::user()->id;
        $news->save();

        return redirect()->route('admin.news')->with('success', 'News has been added successfully');
    }

    public function newsEdit($id){
        $data = [
            'title' => 'News',
            'subTitle' => 'Edit News',
            'page_id' => null,
            'news' => News::findOrFail($id),
            'category' => NewsCategory::all()
        ];
        return view('app.news.edit-news',  $data);
    }

    public function newsUpdate($id, Request $request){
        $validator = Validator::make($request->all(), [
            'thumbnail' => 'nullable|sometimes|image|mimes:jpeg,bmp,png,jpg,svg|max:2000',
            'category' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.news.edit', $id)->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->news_category_id = $request->input('category');
        $news->content = $request->input('content');
        if($request->has('thumbnail')){
            $news->thumbnail_path = $request->file('thumbnail')->store('news', 'public');
        }
        $news->save();

        return redirect()->route('admin.news')->with('success', 'News has been updated successfully');
    }

    public function newsDestroy($id){
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->route('admin.news')->with('success', 'News has been deleted successfully');
    }

    public function category(Request $request){
        $search = $request->input('q');
        $data = NewsCategory::where('name', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(10);
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'News',
            'subTitle' => 'Category',
            'page_id' => null,
            'category' => $data
        ];
        return view('app.news.category',  $data);
    }

    public function categoryStore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.category')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $category = New NewsCategory();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect()->route('admin.category')->with('success', 'category has been added successfully');
    }

    public function categoryUpdate($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.category')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $category = NewsCategory::findOrFail($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect()->route('admin.category')->with('success', 'category has been updated successfully');
    }

    public function categoryDestroy($id){
        $category = NewsCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category')->with('success', 'category has been deleted successfully');
    }
}
