<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Commande;
use App\Models\CommandeItem;
use Illuminate\Http\Request;
use Illuminate\Container\Attributes\Config;

class CommandeController extends Controller
{

    public function index(){

        $commandes = Commande::where('user_id' , auth()->user()->id)->orderBy('id' , 'desc')->get();

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
        //s$paniers = Panier::where('user_id', auth()->user()->id)->delete();

        $urlPaiement = $this->stripeCheckout($total, $commande->id);
        
        return redirect($urlPaiement);

    }

    public function stripeCheckout($total, $commandeId)
    {
        //parametrage de l'api
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        //url de confirmation de paiement
        $redirectUrl = route('commande.success') . '?session_id={CHECKOUT_SESSION_ID}';
        //creation de la session de paiement stripe
        $response =  $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'payment_method_types' => ['link', 'card'],
            'customer_email' => auth()->user()->email,
            'client_reference_id' => $commandeId,
            'line_items' => [
                [
                    'price_data'  => [
                        'product_data' => [
                            'name' => $commandeId,
                        ],
                        'unit_amount'  => 100 * $total,
                        'currency'     => 'USD',
                    ],
                    'quantity'    => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => false
        ]);
        //generation de l'url de paiement
        return $response['url'];
    }

    //controlle et confirmation du paiement
    public function success(Request $request){
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $session = $stripe->checkout->session->retrieve($request->session_id);
        //dd(info($session));

        //info($session->payment_intent);
        $commande=Commande::find($session->client_reference_id);
        $commande->update(['numero'=> $session->payment_intent]);

        return redirect(route('commande.lister'));
    }

    public function webhook(){
        //dd($request);

        if($request->objet =="checkout.session" &&
            $request->payment_statues === 'paid' &&
            $request->status ==='complete'){

            $commande=update(['numero'=> $requet->data["object"]]);

        return'ok';
    }
  
}

}
