<div>

    <div class="flex items-center px-10 mt-3 border-black category_container border-y">
        <div class="flex categories">
            @foreach ($categories as $category)
            <a href="{{$category->name}}" @click="current_category='{{$category->name}}'"
                :style="current_category=='{{$category->name}}'?'background:black;color:white':''">
                <div class="px-4 py-2 border-black w-fit border-s">{{Str::upper($category->name)}}</div>
            </a>

            @endforeach
        </div>
        <div class="flex gap-10">

            <div x-data="{
                    query:'',
                    change(){
                        if(this.query){

                            window.location.href='/search/'+this.query
                        }                    }
                }" class="flex items-center gap-2 search_container">
                
                <input required @keyup.enter="change" x-model='query' type="search" placeholder="SEARCH"
                    class="p-2 border-black outline-none border-s search focus:border-e w-60">
               <img @click="change" class="cursor-pointer" src="../search.svg" alt="">
            </div>
            <div class="flex items-center gap-2 px-3 border-black cursor-pointer border-e cart_container">
                <p>CART</p>
                <div class="flex ">
                    <img src="../cart.svg" alt="">
                    <sup class="py-[0.6rem] text-white bg-black rounded-full px-[0.4rem]">{{$cart_count}}</sup>

                </div>
            </div>
        </div>
    </div>
</div>