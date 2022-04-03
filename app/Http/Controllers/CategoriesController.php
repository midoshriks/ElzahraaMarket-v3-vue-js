<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExportt;
use App\Imports\CategoryImport;
use App\Models\Category;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
// use Excel;/

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cateogries = Category::orderby('created_at','DESC')->get();
        // dd($cateogries);
        return view('categories.index', compact('cateogries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required|min:2|max:50|unique:categories,cat_name,',
            'short_code' => 'required|min:2|max:50|',
        ]);

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->short_code = $request->short_code;
        $category->cat_details = $request->cat_details;

        if($request->hasFile('cat_cover')){
            $request->file('cat_cover')->move('cat_cover/',$request->file('cat_cover')->getClientOriginalName());
            $category->cat_cover  = $request->file('cat_cover')->getClientOriginalName();
        } else {
            $category->cat_cover = 'none_img.png';
        }

        $category->save();

        // dd($category);

        flash('Category create success')->success();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        // dd($category);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'cat_name' => 'required|min:2|max:50|unique:categories,cat_name,' . $category->id,
        ]);

        $category = Category::find($category->id);
        $category->cat_name = $request->cat_name;
        $category->short_code = $request->short_code;
        $category->cat_details = $request->cat_details;

        $img_cat = $category->cat_cover;
        // dd($img_cat);

        if($request->hasFile('cat_cover')){
            $request->file('cat_cover')->move('cat_cover/',$request->file('cat_cover')->getClientOriginalName());
            $category->cat_cover  = $request->file('cat_cover')->getClientOriginalName();
        } else {
            $category->cat_cover = $img_cat;
        }

        // var_dump($category);
        // exit;
        $category->update();
        // dd($category);

        flash('Category updated success')->success();
        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();

        flash('Category deleted success')->success();
        return redirect()->route('categories.index');
    }

    public function export()
    {
        flash('Category Export success')->success();
        // return Excel::download(new CategoryExport, 'category.xlsx');
        return Excel::download(new CategoryExportt, 'cat.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namefile = $data->getClientOriginalName();
        $data->move('cat', $namefile);

        Excel::import(new CategoryImport, \public_path('/cat/'.$namefile));
        return redirect()->back()->with('success', 'Data has been Insert SuccessFully');

    }

}
