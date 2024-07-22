@extends('layouts.store')

@section("content")

@php
    $total = 0 ;
@endphp
<ul class="divide-y divide-gray-1">

    @forelse ($paniers as $panier )
    @php
        $total =$total+($panier->product->price * $panier->quantite);
    @endphp
        
    
    <li class="flexjustify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
            <img src="https://psblog.fr/wp-content/uploads/2020/07/marvels-spider-man-ps5-jaquette-789x1024.jpg" alt="" class="h-12 w-12 flex-none rounded-full bg-gray-50">
     
            <div class="min-w-0 flex-auto">
                <p class= "text-sm.font-semibold leading-6 text-gray-900">{{$panier->product->name}}</p>
        
            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flew-col sm:items-end">
            <p class="text-sm leading-6text-gray-500">{{$panier->product->price}} x {{$panier->quantite}}</p>
            <p class= "text-sm.font-semibold leading-6 text-gray-900"><a href="{{route('panier.moins' , $panier)}}">-</a> <a href="{{route('panier.ajouter' , $panier->product)}}">+</a></p>
        </div>

        <div class="hidden shrink-0 sm:flex sm:flew-col sm:items-end">
            <p class="text-sm leading-6 text-gray-800">{{$panier->product->price * $panier->quantite}}</p>
            <p class= "text-sm.font-semibold leading-6 text-gray-900"><a href="{{route('panier.remove' , $panier)}}"> supp </a></p>
        </div>

    </li>
    @empty
Panier vide......
@endforelse

<li class="flexjustify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
        {{-- <img src="" alt="" class="h-12 w-12 flex-none rounded-full bg-gray-50"> --}}
        <div class="min-w-0 flex-auto">
            <p class= "text-sm.font-semibold leading-6 text-gray-900"></p>
    
        </div>
    </div>
    <div class="hidden shrink-0 sm:flex sm:flew-col sm:items-end">
        <p class="text-sm leading-6 text-gray-500"></p>
    </div>

    <div class="hidden shrink-0 sm:flex sm:flew-col sm:items-end">
        <p class="text-sm leading-6 text-gray-900">total     {{$total}}</p>
        
        
        <a href="{{route('commande.create')}}" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Commander</a>
    </div>

</li>
</ul>
@endsection



