<div class="flex flex-1 overflow-x-scroll w-full px-[10px] gap-3 my-5">
   @foreach($categories as $cat)
<a href="{{route('view.filter',$cat->cat_slug)}}" class=" border px-3 py-2 rounded-full bg-teal-600  hover:bg-teal-800 hover:text-white">
        <h2 class="font-semibold">{{$cat->cat_title}}</h2>
    </a>
    @endforeach
</div>