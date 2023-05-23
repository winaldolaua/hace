<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){
    //     $this->middleware('auth:sanctum');
    // }
    public function index(){
        $product = Product::all();
        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'status'=> 'required',
            'id_reg'=> 'required',
            'reg_number'=> 'required',
            'name' => 'required',
            'address' => 'required',
            'product_type' => 'required',
            'brand_name' => 'required'
        ]);
        $product = Product::create($validatedData);
        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'status' => 'required',
            'id_reg' => 'required',
            'reg_number' => 'required',
            'name' => 'required',
            'address' => 'required',
            'product_type' => 'required',
            'brand_name' => 'required'
        ];
        $validatedData = $request->validate($rule);
        $product = Product::where('id',$id)->update($validatedData);
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Product::destroy($id);
        return response()->json([
            'success' => true,
            'product_delete' => $product
        ]);
    }

    public function list(Request $request){
        $products = Product::query();
        $products
        ->when($request->filled('name'),function($query) use ($request) {
            $name_collections = collect(explode(',',$request->input('name')));
            foreach($name_collections as $name) $query->orWhere('name','like','%'.$name.'%');
        })
        ->when($request->filled('order_by'),function($query) use ($request){
            if($request->filled('sort')) $query->orderBy($request->input('order_by'),$request->input('sort'));
            else $query->orderBy($request->input('order_by'));
        })
        ->when($request->filled('sort'),function($query) use ($request){
            if(!$request->filled('order_by'))$query->orderBy('id',$request->input('sort'));
        })
        ->when($request->filled('date'),function($query) use ($request){
            $date = explode(',',$request->input('date'));
            $start_date = $date[0];
            $end_date = $date[1];
            $query->where('created_at','>=',$start_date);
            $query->where('created_at','<=',$end_date);
        });
        $result = $products->get();
        return response()->json([
            'success' => true,
            'product' => $result
        ]);
    }
}
