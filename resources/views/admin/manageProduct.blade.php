@extends("admin.adminbase")
@section('title',"manage Products |")

@section('content')



<div class="flex flex-1 flex-col  ">
    <div class="flex flex-1 justify-between items-center p-5">
        <h2 class="border-l-4 border-orange-700  p-1 font-semibold text-xl">Manage products({{count($products)}})</h2>
        <a href="{{route('products.create')}}" class=" bg-teal-600 text-white px-3 py-2 rounded"> create product</a>
       
    </div>
   
    <div class="flex flex-1">
        @session('error')
        <div class="bg-red-500 text-white p-3 w-full rounded shadow-lg">
            {{session('error')}}
        </div>
        @endsession
        @session('success')
        <div class="bg-green-700 text-white p-3 w-full rounded shadow-lg">
            {{session('success')}}
        </div>
        @endsession
    </div>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        slug
                    </th>
                    <th scope="col" class="px-6 py-3">
                        image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Brand
                    </th>
                    <th scope="col" class="px-6 py-3">
                        category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $pro)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$pro->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$pro->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$pro->slug}}
                    </td>
                    <td class="px-6 py-4">
                       <img src="/image/{{$pro->featured_image}}" alt="" width="100px" height="auto">
                    </td>
                    <td class="px-6 py-4">
                        {{$pro->brand}}
                    </td>
                    <td class="px-6 py-4">
                        {{$pro->category->cat_title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$pro->price}}
                    </td>
                   
                    <td class="px-6 py-4 flex gap-2">

                        
                       

                        <form action="{{route('products.destroy',$pro)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-800 text-white px-3 py-2 rounded ">Delete</button>
                        </form>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>




@endsection