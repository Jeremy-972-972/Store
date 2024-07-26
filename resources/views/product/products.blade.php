{{-- ça copie le layout --}}
@extends('layouts.shop') 
@section('content')
<x-category-list/>
<x-product-list :products="$products" />

@php
    /*                 
<ul class=" p-10 flex flex-1 gap-4">
    @foreach ($categories as $category )
    <li class="bg-slate-300 p-1 rounded">
        <a href="{{route('product.category' , $category->id)}}">{{$category->name}}</a>
        {{-- <a href="">{{$category->name}}</a> --}}
    </li>
    @endforeach
</ul>

<x-product-card :products="$products" />
<!--Lien de pagination -->
{{$products->links()}}
*/
@endphp 
@endsection