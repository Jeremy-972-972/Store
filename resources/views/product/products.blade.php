{{-- ça copie le layout --}}
@extends('layouts.store') 
product
@section('content')                
<ul class="bg-red-300">
    @foreach ($categories as $category )

    <li>
        <a href="">{{$category->name}}</a>
    </li>
    @endforeach
</ul>

<x-product-card :products="$products" />
   
@endsection