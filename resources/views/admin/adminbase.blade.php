<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Admin Panel | {{env('APP_NAME')}}</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class=" flex flex-1 bg-slate-700 py-4 px-[10%] text-white justify-between items-center">
        <a href="{{route('admin.dashboard')}}" class="text-xl">Admin Panel</a>

        <div class=" flex ">
            <a href="" class=" bg-red-500 text-white px-3 py-2 rounded">Logout</a>

        </div>

    </div>

    <div class="flex flex-1 gap-5 h-screen">
        <div class="w-2/12 bg-slate-200 h-screen">
            <div class="flex flex-col gap-3">
                <a href="{{route('admin.dashboard')}}" class="text-slate-800 px-3 py-2 hover:bg-slate-300">Dashboard</a>
                <a href="{{route('category.index')}}" class="text-slate-800 px-3 py-2  hover:bg-slate-300">Manage Categories</a>
                <a href="{{route('products.index')}}" class="text-slate-800 px-3 py-2  hover:bg-slate-300">Manage Products</a>
                <a href="{{route('products.create')}}" class="text-slate-800 px-3 py-2  hover:bg-slate-300">Insert Products</a>
                <a href="#" class="text-slate-800 px-3 py-2  hover:bg-slate-300">Manage Orders</a>
                <a href="#" class="text-slate-800 px-3 py-2  hover:bg-slate-300">Manage Payments</a>
                <a href="" class="text-slate-800 px-3 py-2  hover:bg-slate-300">Manage Static Page</a>
                <a href="" class="text-slate-800 px-3 py-2  hover:bg-slate-300">Setting</a>
            </div>
        </div>
        <div class="w-10/12">

            @section('content')
            @show

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    @yield('js')



</body>

</html>