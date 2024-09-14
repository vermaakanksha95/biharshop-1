@extends('admin.adminbase');

@section('title', "insert product | ")

@section('content')
<div class="flex flex-1 flex-col gap-5 p-5">
    <div class="flex flex-1 justify-between items-center p-5">
        <h2 class="border-l-4 border-orange-700  p-1 font-semibold text-xl">insert products</h2>
        <a href="{{route('products.index')}}" class=" bg-teal-600 text-white px-3 py-2 rounded"> view all products</a>

    </div>

    {{---insert form here---}}

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="garid grid-cols-2 gap-3 ">
            <div class="flex gap-3 flex-1">
                <div class="mb-3 flex flex-1 flex-col">
                    <label for="Name">Product Name</label>
                    <input type="text" id="Name" name="name" value="{{old('name')}}" class="border px-3 py-2 rounded w-full">
                    @error('name')
                    <p class="text-red-600 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3 flex flex-col flex-1">
                    <label for="category_id">category id</label>
                    <select type="text" id="category_id" name="category_id" value="{{old('category_id')}}" class="border px-3 py-2 rounded w-full">
                        <option value="">select category</option>
                        @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                        @foreach($cat->children as $subcat)
                        <option value="{{$subcat->id}}"> &nbsp; {{$subcat->cat_title}}</option>
                        @endforeach
                        @endforeach
                    </select>
                    @error('category_id')
                    <p class="text-red-600 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex gap-3 flex-1">
                <div class="mb-3 flex flex-col flex-1">
                    <label for="price">Product price</label>
                    <input type="number" id="price" name="price" value="{{old('price')}}" class="border px-3 py-2 rounded w-full">
                    @error('price')
                    <p class="text-red-600 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3 flex flex-col flex-1">
                    <label for=" discount_price"> product offer price</label>
                    <input type="number" id="discount_price" name="discount_price" value="{{old('discount_price')}}" class="border px-3 py-2 rounded w-full">
                    @error('discount_price')
                    <p class="text-red-600 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex gap-5 flex-1">
                <div class="mb-3 flex flex-col flex-1 ">
                    <label for=" description"> product description</label>
                    <textarea rows="5" id=" description" name="description" value="{{old('description')}}" class="border px-3 py-2 rounded w-full"></textarea>
                    @error('description')
                    <p class="text-red-600 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3 flex flex-col flex-1">
                    <label for="featured_image"> product image</label>
                    <input type="file" id="featured_image" onchange="preview()" name="featured_image" value="{{old('featured_image')}}" class="border px-3 py-2 rounded w-full">
                    @error('featured_image')
                    <p class="text-red-600 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-1">
                    <p class="text-xs">image preview</p>
                    <img src="https://www.picsum.photos/150" alt="" id="demo" width="150px" height="auto">
                </div>
            </div>
            <div class="mb-3 flex flex-col">
                <label for=""> product quantity</label>
                <input type="number" id="quantity" name="quantity" value="{{old('quantity')}}" class="border px-3 py-2 rounded w-full">
                @error('quantity')
                <p class="text-red-600 text-sm font-light">{{$message}}</p>
                @enderror
            </div>
            <div class="flex gap-3 mb-3">
                <div class="mb-3 flex flex-col flex-1">
                    <label for="brand"> product Brand</label>
                    <input type="text" id="brand" name="brand" value="{{old('brand')}}" class="border px-3 py-2 rounded w-full">
                    @error('brand')
                    <p class="text-red-600 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3 flex flex-col flex-1">
                    <label for="sku">product sku</label>
                    <input type="text" id="sku" name="sku" value="{{old('sku')}}" class="border px-3 py-2 rounded w-full">
                    @error('sku')
                    <p class="text-red-600 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>


            </div>
        </div>
        <div class="flex flex-1">
            <input type="submit" value="insert product" class="bg-green-700 text-white px-3 py-2 rounded w-full cursor-pointer">
        </div>


    </form>
</div>


@endsection
@section('js')
<script>
    function preview() {
        const file = document.getElementById('featured_image').files[0];
        const reader = new FileReader();
        reader.onload = () => {
            document.getElementById('demo').src = reader.result;
        }
        reader.readAsDataURL(file);
    }
</script>
@endsection