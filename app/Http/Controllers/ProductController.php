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

        $products= Product::orderBy('id' ,'desc')->paginate(10);

            return view('product.products' ,compact('categories' , 'products'));

        // return view('product.products', compact('categories'));

        
        


}

public function show() {

    return view('product.show');
    
}

public function ProductlistByCategory() {

    return view('product.products');
}

}

