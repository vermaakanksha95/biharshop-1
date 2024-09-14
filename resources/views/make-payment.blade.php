@extends('layout')

@section('content')

<div class="flex flex-1 gap-8 px-[5%] py-5 ">
    <div class="w-full flex items-center flex-col justify-center">
        <h2 class=" font-bold text-3xl  mb-4">make payment online $ offline</h2>

        <div class="flex flex-1 gap-5">

            <div class="flex flex-col gap-2">
                <label for="payment_method" class="text-black font-bold text-sm">payment method</label>
                <select name="payment_method" id="payment_method" class="border-2 border-gray-300 rounded px-3 py-2">
                    <option value="">select payment method</option>
                    <option value="online">online payment</option>
                    <option value="offline"> ofline payment</option>
                </select>
            </div>
        </div>

    </div>
</div>
@endsection