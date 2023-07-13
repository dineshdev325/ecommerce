<div x-show="register_active" x-cloak class="fixed inset-0 z-10 bg-black/40">
    <div x-show="register_active"
        class="absolute flex items-center justify-center w-screen h-screen -mt-4 register_container">
        <div @click.outside="register_active=false" x-transition:enter.duration.500ms x-transition:leave.duration.200ms
            class="box-border z-10 px-10 pb-5 mx-auto bg-white border-2 border-black justify-evenly w-[30%]">
            <div class="flex justify-end">
                <img class="inline-block mt-3 -me-5 close hover:cursor-pointer" src="../close.svg" alt=""
                    @click="register_active=false">
            </div>
            <div class="text-xl font-bold text-center uppercase ">Register</div>
            {{-- REGISTER FORM --}}
            <form wire:submit.prevent='register' >
                <div class="py-1">
                    <label for="" class="inline-block py-1">Name</label> <br>
                    <input type="text" name="name"  class="w-full p-1 border border-black outline-none" wire:model="name">
                    @error('name')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                    
                </div>
                <div class="py-1">
                    <label for="" class="inline-block py-1">Email</label> <br>
                    <input type="text" name="email" class="w-full p-1 border border-black outline-none" wire:model="email">
               @error('email')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="" class="inline-block py-1">Password</label> <br>
                    <input type="password"  name="password" class="w-full p-1 border border-black outline-none" wire:model="password">
               @error('password')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="" class="inline-block py-1">Confirm Password</label> <br>
                    <input type="password" name="confirm_password"  class="w-full p-1 border border-black outline-none"
                        wire:model='confirm_password'>
                @error('confirm_password')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                    </div>
                <input type="submit" class="block w-full p-2 mt-2 text-white bg-black" value="Register" name="register">
            </form>
        </div>
    </div>
    {{-- <div x-show='not_login' class="w-full " x-data="{
                                flash_message:'Please login to add to cart',
                              if(not_login){
                                setTimeout(()=>{
                                    this.not_login=false
                                },4000)
                              }  
                            }">
        <p x-text="flash_message" class="fixed inset-x-0 z-20 p-2 mx-auto text-white bg-black/90 w-fit bottom-4"></p>
    </div> --}}

    
</div>