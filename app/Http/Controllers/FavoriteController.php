<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Favorite;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this_user_id = Auth::id();
        // $products = Favorite::addSelect(['product_name' => Product::select('name')
        //     ->whereColumn('id', 'favorites.product_id')
        //     ->orderByDesc('id') 
        // ])
        // ->where('favorites.user_id', $this_user_id)
        // ->paginate(6);
        // ->get();;

        $this_user_id = Auth::id();
        // $products = Product::addSelect(['fav_user_id' => Favorite::select('user_id')
        //     ->whereColumn('favorites.product_id', 'products.id')
        //     ->orderByDesc('product_id') 
        // ])
        // ->where('favorites.product_id', $this_user_id)
        // ->paginate(6);

        // $products = Product::with('favorites')->where('user_id', $this_user_id)->get();
        
        // $products = Favorite::has('products')->where('user_id', $this_user_id)->get();
        // $products = Product::has('posts')->get();

        // $products = Product::whereHas('favorites', function($q){
        //     $this_user_id = Auth::id();
        //     $q->orderBy('favorites.created_at')->where('user_id', $this_user_id) ;
        // })->paginate(6);

        // $products->sortBy('created_at', [], true); // true for descending
        // $products->sortByDesc('created_at'); // true for descending
        // $products = $products->sortBy('created_at', SORT_REGULAR, true);

        $products = DB::table('products')
            ->join('favorites', function($builder) {
                $builder->on('favorites.fav_product_id', '=', 'products.id');
                // here you can add more conditions on tags table.
            })
            ->where('user_id', $this_user_id)
            ->orderByDesc('favorites.created_at')
            ->paginate(6);
        
        return view('myfavorites.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 6);

    }
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this_user_id = Auth::id();
        // dd($this_user_id);
        // print_r($request->all());
        // die();
        // dd($request->user_id);
        // dd($request->product_id);
        // die();

        // Favorite::create([
        //     'user_id' => $request->user_id,
        //     'product_id' => $request->product_id
        // ]);
        // $request->user_id = Auth::id();
        // print_r($request->product_id);
        // die();

        // Favorite::create($request->all());
        Favorite::create([
            'user_id'    => $this_user_id,
            'fav_product_id' => $request->product_id
        ]);
    
        // return redirect()->route('myfavorites.index')
        //                 ->with('success','Product added successfully to favorite list.');
        return back()->with('success','Product added successfully to favorite list.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id)
    {
        $this_user_id = Auth::id();

        $product = Product::where('id', $id)->first();
        $is_favorite = Favorite::where([['user_id', $this_user_id], ['fav_product_id', $id]])->first();
        // dd($id);
        // $product->where('id', $id);
        // dd($product);

        return view('myfavorites.show',compact('product', 'is_favorite'));
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this_user_id = Auth::id();
        Favorite::where('user_id', $this_user_id)->where('fav_product_id', $id)->delete();
        // $product->delete();
    
        // return redirect()->route('myfavorites.index')->with('success','Product removed successfully from favorite.');
        return back()->with('success','Product removed successfully from favorite.');
    }
}
