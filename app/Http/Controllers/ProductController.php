<?php
    
namespace App\Http\Controllers;
    
use App\Models\Product;
use Illuminate\Http\Request;
    
class ProductController extends Controller
{ 
    protected $product_atribute_required = array(
        'name'          => 'required',
        'detail'        => '',
        'harga'             => 'required|numeric|between:0,200000000',
        'prosesor'          => 'required|numeric|between:0,200',
        'kapasitas_ram'     => 'required|numeric|between:0,64',
        'kapasitas_hdd'     => 'required|numeric|between:0,5000',
        'kapasitas_ssd'     => 'required|numeric|between:0,5000',
        'kapasitas_vram'    => 'required|numeric|between:0,32',
        'kapasitas_maxram'  => 'required|numeric|between:0,64',
        'berat'             => 'required|numeric|between:0,10000',
        'ukuran_layar'      => 'required|numeric|between:5,30',
        'jenis_layar'       => 'required|numeric|between:0,5',
        'refresh_rate'      => 'required|numeric|between:0,1000',
        'resolusi_layar'    => 'required|numeric|between:0,80000000'
    );
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::latest()->paginate(6);
        $products = Product::latest()->get();
        return view('products.index',compact('products'));
        // return view('products.index',compact('products'))
        //     ->with('i', (request()->input('page', 1) - 1) * 6);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate($this->product_atribute_required);
    
        Product::create($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        request()->validate($this->product_atribute_required);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // dd($product);
        // var_dump($product);
        // print_r($product);
        // die();
        
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}