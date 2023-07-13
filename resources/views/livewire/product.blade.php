<div>
  @if ($products)
      
    <div class="grid grid-cols-3 px-10 mt-5 product_container gap-9" >
        @foreach ($products as $product)
        {{-- STORE SIZE AND COLOR --}}
        @php
        $size=[];
        $color=[];
        @endphp
        @foreach ($product->product_detail as $detail)
        @php
        $size_count=0;
        $color_count=0;
        $size=$detail->product_size->select('size','id')->distinct()->get();
        $color=$detail->product_color->select('color','id')->distinct()->get();
        @endphp
        @endforeach
    
    
        <div class="py-5 product_item " x-data="{
        current_size:1,
        current_color:1,
        price:'',
        not_login:false,
        update(){
            
            fetch(`http://127.0.0.1:8000/price/{{$product->id}}/${this.current_size}/${this.current_color}`)
            .then(data => data.json())
            .then(data=>{
                this.price=data['0']['price']
            })
        }
       
    }" x-effect="update;livewire.emit('update_cart_count')">
            <img src="../{{$detail['image']}}" class="product_image" alt="">
            <div class="z-30 -mt-10 isolate">
                <div class="price_container p-2 flex items-center justify-between bg-[#1e2832] ">
                    <div class="font-bold text-white " 
                    x-text="'$ '+price">
                        RS.1000
                    </div>
                    {{-- ADD CART --}}
                    <div class="flex items-center gap-2 cursor-pointer" 
                    @auth
                     @click="livewire.emit('add_cart','{{$product->id}}',current_color,current_size)"
                     @else
                    
                     @click="not_login= !not_login"
                    @endauth
                    >
                    
                        <img src="../bag.svg" alt="">
                        <p class="text-white">Add Cart</p>
                    </div>
                </div>
                {{-- PRODUCT DETAILS --}}
                <div class="product_details">
                    <div class="py-2 uppercase font-[500]">{{$product->name}}</div>
                    <div class="flex items-center justify-between gap-6 py-1 ">
                        <div class="size_container ">
                            {{-- SIZE LIST --}}
                            <div class="uppercase">Size</div>
                            <div class="flex gap-2 size_list">
                                @foreach ($size as $size_item)
                                <div   class="px-2 py-1 mt-2 border border-black rounded-full cursor-pointer w-fit" 
                                
                                :style="current_size=={{$size_item->id}}? 'background-color:black;color:white' : 'background-color:white;color:black'" 
                                
                                @click="current_size={{$size_item->id}}">{{$size_item->size}}</div>
                                @php
                                $size_count++;
                                if ($size_count==4) {
                                break;
                                }
                                @endphp
                                @endforeach
                            </div>
                        </div>
                        {{-- COLOR LIST --}}
                        <div class="color_container ">  
                            <div class="uppercase">color</div>
                            <div class="flex items-center gap-2 color_list">
                                @foreach ($color as $color_item)
                                <div  class="p-1 mt-2 rounded-full cursor-pointer "
                                    style="background-color: {{$color_item->color}}"
                                   
                                    @click="current_color='{{$color_item->id}}'">
                                    <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' :stroke="current_color=={{$color_item->id}}? 'white':'none' "
                                        class='w-6 h-6'>
                                        <path stroke-linecap='round' stroke-linejoin='round' d='M4.5 12.75l6 6 9-13.5' />
                                    </svg></div>
                                @php
                                $color_count++;
                                if ($color_count==3) {
                                break;
                                }
                                @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- FLASH MESSAGE --}}
            <div x-show='not_login' class="w-full " x-data="{
                            flash_message:'Please login to add to cart',
                          if(not_login){
                            setTimeout(()=>{
                                this.not_login=false
                            },4000)
                          }  
                        }">
                <p x-text="flash_message" class="fixed inset-x-0 z-20 px-3 py-2 mx-auto text-white bg-black w-fit bottom-4"></p>
            </div>
        </div>
        @endforeach
   
        @if (session()->has('cart_exist'))
        <div>
            <p x-data="{
                show:true,
                init(){
                    setTimeout(()=>{
                        this.show=false
                    },4000)
                }
            }" x-cloak x-show="show" class="fixed inset-x-0 z-20 px-3 py-2 mx-auto text-white bg-black w-fit bottom-4">{{session('cart_exist')}}</p>
        </div>
            @endif
    </div>
    
  @endif
    
        
</div>
