<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Commande;
use App\Models\CommandeItem;
use Illuminate\Http\Request;

class CommandeController extends Controller
{

    public function index(){

        $commandes = Commande::where('user_id' , auth()->user()->id)->orderBy('id , desc')->get();

        return view('commande.lister' , compact('commandes'));
    }
    //creation de la commande et ajout des elements du panier dans commandeItems
    public function create(){

        //Lecture du panier
        $paniers = Panier::where('user_id', auth()->user()->id)->get();
        if(count($paniers)==0){return 'vide';}
        // dd($paniers);
        //creation de la commande
         $commande=Commande::create(['user_id'=> auth()->user()->id,
        //
                                    'numero' => 0,
                                    'total' => 0]);
//Lecture du panier
        $paniers = Panier::where('user_id', auth()->user()->id)->get();
        // dd($paniers);
$total=0;
        foreach($paniers as $panier){

            $commandeId= $commande->id ; //identifiant de la commande
            $productId= $panier->product_id ; //identifiant du produit
            $quantite= $panier->quantite ; //nombre de produit
            $price= $panier->product->id; //
            $total += $price*$quantite; //le '+=' permet d'ajouter au precedent total les nouveaux elements

            //ajout dans la table commande item
            CommandeItem::create(['commande_id' =>$commandeId,
                                  'product_id' => $productId,
                                  'quantite' => $quantite,
                                  'price' => $price]);
        }

        

        //maj de la commande
        $commande->update(['numero'=>9999 ,'total' => $total]);
        $commande->save();
        //vider le panier
        $paniers = Panier::where('user_id', auth()->user()->id)->delete();
        return 'commander';

    }
  
}
