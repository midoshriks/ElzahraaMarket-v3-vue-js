<?php

namespace App\Http\Controllers;

use App\Exports\BrandExportt;
use App\Imports\BrandImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $brands = Brand::orderBy('created_at','DESC')->get();
        $brands = Brand::with('category')->get();
        return view('brands.index', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoty_brands = Category::all();
        return view('brands.create', compact('categoty_brands'));
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
            'brand_name' => 'required|min:2',
            'brand_code' => 'required|min:2',
        ]);

        $brands = new Brand();
        $brands->brand_name = $request->brand_name;
        $brands->brand_code = $request->brand_code;
        $brands->brand_details = $request->brand_details;
        $brands->category_brand = $request->category_brand;
        $brands->brand_size = $request->brand_size;
        $brands->brand_price = $request->brand_price;

        // dd($brands);

        $brands->save();

        flash('Brands create success')->success();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $brand = Brand::find($brand->id);
        $categoty_brands = Category::all();
        // dd($brand);
        return view('brands.edit', compact('brand', 'categoty_brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand_name' => 'required|min:2',
            'brand_code' => 'required|min:2',
        ]);

        $brands = Brand::find($brand->id);
        $brands->brand_name = $request->brand_name;
        $brands->brand_code = $request->brand_code;
        $brands->brand_details = $request->brand_details;
        $brands->category_brand = $request->category_brand;
        $brands->brand_size = $request->brand_size;
        $brands->brand_price = $request->brand_price;

        // dd($brands);

        $brands->update();

        flash('Brand updated success')->success();
        return redirect()->route('brands.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand = Brand::find($brand->id);
        $brand->delete();

        flash('Brand deleted success')->success();
        return redirect()->route('brands.index');
    }

    public function export(){
        flash('Brand Export success')->success();
        return Excel::download(new BrandExportt, 'brand.xlsx');
    }

    public function importexcel(Request $request){
        
        $data = $request->file('file');

        $namefile = $data->getClientOriginalName();
        $data->move('brand', $namefile);

        Excel::import(new BrandImport, \public_path('/brand/'.$namefile));
        return redirect()->back()->with('success', 'Data has been Insert SuccessFully');
    }
}
