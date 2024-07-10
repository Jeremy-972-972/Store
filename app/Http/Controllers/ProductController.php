<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(){ // represente la page d'acceuil du site

        $categories = Category::all();
        // dd($categories);

        $products= Product::orderBy('id' ,'desc')->paginate(8);

            return view('product.products' ,compact('categories' , 'products'));

        // return view('product.products', compact('categories'));

        
        


}

public function show(Product $product) {
    //request pour les produits similaires
    $products = Product::where('category_id' , $product->category_id )
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();

// dd($products);

    return view('product.show', compact('product','products'));
    
}

public function ProductlistByCategory() {

    $categories = Category::all();
        // dd($categories);
        //request our filtrer les produits de la category $id
        $products= Product::where('category', $id)->orderBy('id' ,'desc')->paginate(4);

   

    return view('product.products' , compact('categories' , 'products'));
}

}

