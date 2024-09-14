@extends('layout')

@section('content')

<div class="flex flex-1 gap-8 px-[5%] py-5 ">

    <div class="w-9/12">
        <div class="w-full">
            <h2 class=" font-bold text-3xl  mb-4">checkout your order</h2>
        </div>
        <form action="{{route('address.store')}}" method="post" class="grid grid-cols-2 gap-5">
            @csrf
            <div class="mb-3">
                <label for="full_name" class="block text-sm font-bold text-gray-700">name</label>
                <input type="text" id="full_name" name="full_name" class="w-full px-3 py-2 text-gray-700 rounded">
                @error('full_name')
                <p class="text-xs font-semibold text-red-700">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact" class="block text-sm font-bold text-gray-700">contact</label>
                <input type="text" id="contact" name="contact" class="w-full px-3 py-2 text-gray-700 rounded">
                @error('contact')
                <p class="text-xs font-semibold text-red-700">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="street" class="block text-sm font-bold text-gray-700">street</label>
                <input type="text" id="street" name="street" class="w-full px-3 py-2 text-gray-700 rounded">
                @error('street')
                <p class="text-xs font-semibold text-red-700">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="area" class="block text-sm font-bold text-gray-700">area</label>
                <input type="text" id="area" name="area" class="w-full px-3 py-2 text-gray-700 rounded">
                @error('area')
                <p class="text-xs font-semibold text-red-700">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="landmark" class="block text-sm font-bold text-gray-700">landmark</label>
                <input type="text" id="landmark" name="landmark" class="w-full px-3 py-2 text-gray-700 rounded">
                @error('landmark')
                <p class="text-xs font-semibold text-red-700">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city" class="block text-sm font-bold text-gray-700">city</label>
                <input type="text" id="city" name="city" class=" w-full px-3 py-2 text-gray-700 rounded">
                @error('city')
                <p class="text-xs font-semibold text-red-700">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="state" class="block text-sm font-bold text-gray-700">state</label>
                <input type="text" id="state" name="state" class="w-full px-3 py-2 text-gray-700 rounded">
                @error('state')
                <p class="text-xs font-semibold text-red-700">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pincode" class="block text-sm font-bold text-gray-700">pincode</label>
                <input type="text" id="pincode" name="pincode" class="w-full px-3 py-2 text-gray-700 rounded">
                @error('pincode')
                <p class="text-xs font-semibold text-red-700">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="block text-sm font-bold text-gray-700">type</label>
                <select name="type" id="type" class="w-full px-3 py-2 text-gray-700 rounded" required>
                    <option value="" selected disabled> select type</option>
                    <option value="office">office</option>
                    <option value="home">home</option>
                    @error('type')
                    <p class="text-xs font-semibold text-red-700">{{$message}}</p>
                    @enderror
                </select>

            </div>
            <div class="my-5">

                <input type="submit" class="w-full px-3 py-2 bg-teal-700 rounded text-white " value="create new address">

            </div>

        </form>
    </div>
    <div class="w-3/12 ">
        <form action="{{route('order.addAddress')}}" method="post" class="flex flex-col gap-3">
            @csrf
            @foreach($addresses as $address)

            <label class=" block border p-4 rounded-lg cursor-pointer transition-transform ">
                <input type="radio" onchange="this.form.submit()" name="selected_address" value="{{$address->id}}"  class="hidden">
            <div class="border p-4   rounded-lg mb-2  hover:border-4 hover:border-orange-700">
                <p class="text-capitelies font-semibold">{{$address->full_name}}</p>
                <p>{{$address->contact}}</p>
                <p>{{$address->street}}</p>
                <p>{{$address->area}} , {{$address->landmark}} , {{$address->city}}
                <p>{{$address->state}}</p>
                <p>{{$address->pincode}}</p>
                <p>{{$address->type}}</p>
                </p>

            </div>
            </label>


            @endforeach
        </form>

    </div>

</div>
@endsection