@extends('layout')

@section('title')
home page
@endsection

@section('content')
<x-banner/>

<div class="w-full flex flex-1 px-[5%] py-5 flex-col">
    <div class="flex flex-1">
    <h2 class="border-l-4 border-orange-700  p-1 font-semibold text-xl">categories</h2>

    </div>


    <x-category-navbar/>
<h2 class="border-l-4 border-orange-700  p-1 font-semibold text-xl">you may also like</h2>
    <div class="grid grid-cols-4 gap-5  mt-5">
        @foreach($products as $product)
        <x-product-card :product="$product"/>
       
        @endforeach

    </div>
   
</div>
@endsection