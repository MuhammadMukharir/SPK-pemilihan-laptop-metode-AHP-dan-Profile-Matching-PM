<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Favorite;
use App\Models\Product;
use Auth;

class SearchController extends Controller
{
    public function index(Request $input)
    {
        // dd($input->q);
        $search = $input->q;
        $this_user_id = Auth::id();
        // $products = Product::latest()->paginate(6);
        // $products = Product::where('name', 'LIKE', '%'.$search.'%')->latest()->paginate(6);
        // $products = Product::where('name', 'LIKE', '%'.$search.'%')->latest()->get();
        $products = Product::leftJoin('favorites','products.id','=','favorites.fav_product_id')
        // ->where(Auth::id())
        // ->where('favorites.user_id', Auth::id())
        // ->orWhere('favorites.fav_product_id', null)
        ->where('favorites.user_id', '=', $this_user_id)
        ->orWhere('favorites.fav_product_id', '=', null)
        ->where('name', 'LIKE', '%'.$search.'%')
        ->orderBy('products.created_at', 'desc')
        ->get();
        
        // dd($products[0]);

        // dd($products);

        return view('carilaptop.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 6);

        
    }

    // public function index($id)
    // {
    //     $products = Product::latest()->paginate(6);
    //     return view('carilaptop.index',compact('products'))
    //         ->with('i', (request()->input('page', 1) - 1) * 6);
    // }
    
    // store product to favorite
    public function store(Request $request)
    {
        $user = Auth::id();

        Favorite::create($request->all());
    
        return redirect()->route('carilaptop.index')
                        ->with('success','Product added successfully to favorite list.');
    }
    

    public function show(Product $product, $id)
    {
        $this_user_id = Auth::id();

        // send data to view
        $product = Product::where('id', $id)->first();
        $is_favorite = Favorite::where([['user_id', $this_user_id], ['fav_product_id', $id]])->first();

        return view('carilaptop.show',compact('product', 'is_favorite'));
    }
    
    // remove product from favorite
    public function destroy($id)
    {
        Favorite::where('product_id', $id)->delete();
    
        return redirect()->route('carilaptop.index')->with('success','Product removed successfully from favorite.');
    }
}
