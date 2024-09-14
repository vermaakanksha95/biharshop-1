@extends('layout')

@section('content')
<div class="flex px-[5%] gap-5">
    <div class="flex-1">
        <img src="/image/{{$product->featured_image}}"  class="w-full ">
    </div>
    <div class="flex-1 gap-5 p-5">
        <h1 class="text-4xl font-semibold ">{{$product->name}}</h1>
        <p class="text-xl font-light">category: {{$product->category->cat_title}}</p>
       <div class="flex flex-1 gap-10">
       <div class="flex divide-x my-5 flex-col">
            
            <h1 class="text-4xl">{{$product->discount_price}}</h1>
            <p class="text-xs text-slate-300 justify-center">all tax included</p>
        </div>
        <div class="flex divide-x my-5 flex-col">
            
            <h1 class="text-4xl">{{$product->price}}</h1>
            <p class="text-xs text-green-300 justify-center">10% saved</p>
        </div>
       </div>



        <div  class="flex flex-1 items-start gap-5">
        <a href="{{route('addToCart',$product->slug)}}" class=" text-xl bg-teal-600 text-white px-3 py-2">Add to cart</a>
        <a href="" class="bg-orange-600 text-white text-xl px-3 py-2">Buy now</a>
        </div>

    </div>
</div>
@endsection