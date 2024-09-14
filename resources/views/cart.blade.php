@extends('layout')
@section('content')


@php
$total_amount = 0;
$total_discount =0;
$total_discount_amount =0;
$total_tax = 0;
$total_payble = 0;

@endphp

<div class="flex flex-1   px-[5%] py-5 ">
    <div class="w-9/12 ">
        <h2 class=" font-bold text-3xl  mb-4">My Cart(3)</h2>
        <div class="flex items-center gap-4 bg-slate-300 p-3 ">
            @foreach($order->OrderItems as $item)
            @php
            $total_amount += $item->qty * $item->product->price;
            $total_discount_amount = $item->qty * $item->product->discount_price;
            $total_discount = $total_amount - $total_discount_amount;
            $total_tax = $total_discount_amount * 0.18;
            $total_payble = $total_discount + $total_tax;

            if($order->coupon != Null):
            $total_payble -= $order->coupon->amount;
            endif
            @endphp

            <img class="size-32 rounded-lg" src="/image/{{$item->product->featured_image}}" alt="">
            <div class="font-medium dark:text-white flex justify-center  flex-col">
                <div class="p-2 font-semibold text-xl">{{$item->product->name}}</div>
                <div class="p-2 font-light text-xl">{{$item->product->discount_price}} <del>{{$item->product->price}}</del></div>
                <div class="text-sm text-gray-500 dark:text-gray-400 gap-2 flex items-center ml-2">
                    <a href="{{route('removeFromCart',$item->product->slug)}}" class="bg-red-600 text-white px-3 py-1 font-semibold text-lg">-</a>
                    <span>{{$item->qty}}</span>
                    <a href="{{route('addToCart',$item->product->slug)}}" class="bg-green-600 text-white px-3 py-1 font-semibold text-lg">+</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="w-3/12">
        <div class=" text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <div aria-current="true" type="button" class="w-full px-4 py-2 font-medium text-left rtl:text-right text-white bg-gray-500 border-b border-gray-200 rounded-t-lg  focus:outline-none dark:bg-gray-800 dark:border-gray-600 text-xl">
                Price Details
            </div>
            <div type="button" class="w-full px-4 py-3 font-medium text-left cursor-pointer">
                total Price
                <span class="float-end font-light">Rs:{{$total_amount}}/-</span>
            </div>
            <div type="button" class="w-full px-4 py-3 font-medium text-left bg-green-200 ">
                total Discount
                <span class="float-end font-light">Rs: {{$total_discount}}/-</span>
            </div>
            <div type="button" class="w-full px-4 py-3 font-medium text-left">
                Total TAX(GST 18%)
                <span class="float-end font-light">Rs: {{$total_tax}}/-</span>
            </div>
            @if($order->coupon_id != NULL)
            <div class="w-full px-4 py-3 font-medium bg-orange-200 text-left border-b">
                Total coupon Discount({{$order->coupon->code}})
                <span class="float-end font-normal">Rs {{$order->coupon->amount}}</span>
            </div>
            @endif

            <div type="button" class="w-full px-4 py-2 font-medium text-left bg-red-100 text-xl">
                Total payble
                <span class="float-end font-light">Rs:{{$total_payble}}/-</span>
            </div>
        </div>
        <div class="border w-full bg-white shadow-lg mt-5 p-4 ">
            @if($order->coupon_id == NULL)
            <form action="{{route('coupon.add')}}" method="post" class="flex flex-1 gap-2">
                @csrf
                <input type="text" name="coupon_code" class="border px-3 py-2 rounded-none flex-1 flex" placeholder="insert coupon code">
                <input type="submit" class="bg-orange-600 text-white px-3 py-2 rounded">
            </form>
            @else
            <p class="text-xl  p-4">
                Applied coupon : "<span class="text-green-300 p-2">{{$order->coupon->code}}</span>"
                <a href="{{route('coupon.remove')}}" class="float-end text-red-600  text-lg font-bold">x</a>
            </p>
            @endif
            @session('coupon_error')
            <div class="text-red-500 text-sm">{{session('coupon_error')}}</div>
            @endsession

            <div class="flex flex-1 justify-between p-5">
                <a href="{{route('homepage')}}" class="bg-slate-500 text-white px-3 py-2"> more shoping</a>
                <a href="{{route('checkout')}}" class="bg-orange-500 text-white px-3 py-2"> Chackout</a>

            </div>
        </div>
    </div>
</div>
@endsection