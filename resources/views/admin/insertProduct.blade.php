@extends('admin.adminbase');
@section('title',"Insert Product | ")
@section('content')

<div class="flex flex-1 flex-col gap-5  p-3">

    <div class="flex flex-1 justify-between items-center">
        <h2 class=" border-l-4 border-orange-600 pl-2 text-xl">Insert Products</h2>

        <a href="{{route('products.index')}}" class=" bg-teal-600 text-white px-3 py-2 rounded">View All Products</a>
    </div>

    {{--insert form here--}}

    <form action="{{route('products.store')}}" method="post" class="bg-slate-100 p-2 rounded-md"
    enctype="multipart/form-data">
        @csrf
        <div class=" grid grid-cols-2 gap-5">
            <div class="mb-1 flex flex-col gap-1">
                <label for="name">Product Title</label>
                <input type="text" id="name" name="name" value="{{old('name')}}" class=" border px-3 py-2 rounded w-full">
                @error('name')
                <p class=" text-red-500 text-sm font-light">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-1 flex flex-col gap-1">
                <label for="category_id">Category</label>
                <select id="category_id" name="category_id" value="{{old('category_id')}}" class=" border px-3 py-2 rounded w-full">
                    <option value="">Select Category</option>
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->cat_title}}</option>
                    @foreach($cat->children as $subcat)
                    <option value="{{$subcat->id}}">&nbsp; &nbsp; &nbsp;{{$subcat->cat_title}}</option>

                    @endforeach
                    @endforeach

                </select>
                @error('title')
                <p class=" text-red-500 text-sm font-light">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-3">

                <div class="mb-1 flex flex-col gap-1">
                    <label for="price">Product Price</label>
                    <input type="number" id="price" name="price" value="{{old('price')}}" class=" border px-3 py-2 rounded w-full">
                    @error('price')
                    <p class=" text-red-500 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-1 flex flex-col gap-1">
                    <label for="discount_price">Product Offer Price</label>
                    <input type="number" id="discount_price" name="discount_price" value="{{old('discount_price')}}" class=" border px-3 py-2 rounded w-full">
                    @error('discount_price')
                    <p class=" text-red-500 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-1 gap-3">
                <div class="mb-1 flex flex-col gap-1">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" onchange="preview()" name="featured_image" class="border px-3 py-2 rounded w-full">
                    @error('featured_image')
                    <p class="text-red-500 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-xs">Image Preview</p>
                    <img src="https://www.picsum.photos/150" id="demo" width="150px" height="auto">

                </div>




            </div>

            <div class=" mb-1 flex flex-col gap-1 ">
                <label for="description">Product Description</label>
                <textarea rows="10" id="description" name="description" value="{{old('description')}}" class=" border px-3 py-2 rounded w-full"></textarea>
                @error('description')
                <p class=" text-red-500 text-sm font-light">{{$message}}</p>
                @enderror
            </div>
            <div class="flex flex-col gap-5">

                <div class="mb-1 flex flex-col gap-1">
                    <label for="quantity">Product Quantity</label>
                    <input type="number" id="quantity" name="quantity" value="{{old('quantity')}}" class=" border px-3 py-2 rounded w-full">
                    @error('quantity')
                    <p class=" text-red-500 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-1 flex flex-col gap-1">
                    <label for="brand">Product Brand</label>
                    <input type="text" id="brand" name="brand" value="{{old('brand')}}" class=" border px-3 py-2 rounded w-full">
                    @error('brand')
                    <p class=" text-red-500 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-1 flex flex-col gap-1">
                    <label for="sku">Product SKU</label>
                    <input type="text" id="sku" name="sku" value="{{old('sku')}}" class=" border px-3 py-2 rounded w-full">
                    @error('sku')
                    <p class=" text-red-500 text-sm font-light">{{$message}}</p>
                    @enderror
                </div>
            </div>


        </div>
        <div class="flex flex-1">
            <input type="submit" value="Insert Product" class=" bg-teal-500 cursor-pointer text-white px-3 py-2 w-full rounded">
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    function preview () {
        const file = document.getElementById('image').files[0];
        const reader = new FileReader();
        reader.onloadend = ()=>{
            document.getElementById('demo').src = reader.result;

        }
        reader.readAsDataURL(file);
    }
</script>
@endsection