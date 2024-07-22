<?php

namespace App\Http\Controllers;

use App\Models\Favoris;
use App\Models\Product;
use Illuminate\Http\Request;

class FavorisController extends Controller
{
    public function index (){ 

        $favoriss=Favoris::where('user_id' , auth()->user()->id)->get();
            // dd($favoriss);
        return view ('favoris.lister', compact('favoriss'));
        
        
    }

    public function edit (Product $product){

        $favoriss=Favoris::where('user_id' , auth()->user()->id);
                            //->where('product_id' ,$product()->id)->first(); 

            if(isset($favoriss)){
                $favoriss->delete();
            }else{
                
        
        Favoris::create(['user_id'=> auth()->user()->id,
                            'product_id' => $product->id]);

            }


        return'AddorRemove';


    }
}
