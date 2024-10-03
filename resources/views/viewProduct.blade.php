@extends('layout')
@section('content')
<div class=" flex px-[10%] mt-10 gap-5">
    <div class="flex-[0.4]">
        <img src="/images/{{$product->featured_image}}" class=" w-full" alt="">
    </div>
    <div class="flex-[1.4] flex flex-col gap-3">
        <h1 class=" text-2xl font-semibold">{{$product->name}}</h1>
        <p>Category:{{$product->category->cat_title}}</p>

        <div class="flex divide-x my-3">
            <div class="flex flex-1 flex-col justify-center gap-3 p-3">
                <h1 class="text-4xl">₹{{$product->discount_price}}</h1>
                <p class=" text-xs text-slate-600">All Tax Included</p>
            </div>
            <div class="flex flex-1  flex-col justify-center gap-3 p-3">
                <h1 class="text-xl text-red-500">MRP:<del>₹{{$product->price}}</del></h1>
                <p class=" text-lg text-green-600 font-semibold">10% Saved</p>
            </div>
        </div>

        <div class=" flex flex-1 gap-3 items-start">
            <a href="{{route('addToCart',$product->slug)}}" class=" bg-teal-500 text-white px-3 py-2 text-2xl font-semibold">Add to Cart</a>
            <a href="" class=" bg-orange-500 text-white px-3 py-2 text-2xl font-semibold">Buy Now</a>

        </div>
    </div>
</div>
@endsection