<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use Illuminate\Http\Request;

class PanierController extends Controller
{
   
    public function index (){ 

        $paniers=Panier::where('user_id' , auth()->user()->id)->get();

    // dd($paniers);
        

        return view ('panier.liste' , compact('paniers'));
    }

    public function ajouter(Product $product){

        //dd($product->id);

        //search product in user cart(faire la requete pour trouver le produit dasn le panier)
        $existProduct = Panier::where('user_id' , '=' , auth()->user()->id)
                                        ->where('product_id' , '=' , $product->id)
                                        ->first();

        // dd($existProduct);
        //if product exist update quantities(ecrementer si il existe)
        //if($existProduct->count()>0) {
        if(isset($existProduct)){

            $existProduct->quantite = $existProduct->quantite+1;

            $existProduct->save();


        }else{

            Panier::create(['user_id' => auth()->user()->id,
            'product_id' => $product->id]);

        }

        //else add the product(sinon l'ajouter)


        // Panier::create(['user_id' => auth()->user()->id,
        //                'product_id' => $product->id]);

        return redirect()->route('panier.lister');

    }
    //fonction pour faire la suppression dans le panier pour un produit
    public function remove(Panier $panier){

        $panier->delete();


        return back();

    }

    public function moins(Panier $panier){

        if($panier->quantite == 1 ){

            $panier ->delete();
        }else{

            $panier->quantite= $panier->quantite -1;

            $panier->save();
        }



        return back();

    }

    public function commander(){


        return 'commander';

    }
}
