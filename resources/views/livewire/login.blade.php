<div x-show="login_active" x-cloak class="fixed inset-0 z-10 bg-black/40">
    <div x-show="login_active"
        class="absolute flex items-center justify-center w-screen h-screen -mt-4 login_container">
        <div @click.outside="login_active=false" x-transition:enter.duration.500ms x-transition:leave.duration.200ms
            class="box-border z-10 px-10 pb-7 mx-auto bg-white border-2 border-black justify-evenly w-[30%]">
            <div class="flex justify-end">
                <img class="inline-block mt-3 -me-5 close hover:cursor-pointer" src="../close.svg" alt=""
                    @click="login_active=false">
            </div>
            <div class="text-xl font-bold text-center uppercase ">Login</div> 
            {{-- LOGIN FORM --}}
            <form wire:submit.prevent='login'>

                <div class="py-1">
                    <label for="" class="inline-block py-1">Email</label> <br>
                    <input type="text" name="email" class="w-full p-1 border border-black outline-none " wire:model="email">
                    @error('email')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="py-1">
                    <label for="" class="inline-block py-1">Password</label> <br>
                    <input type="password" name="password" class="w-full p-1 border border-black outline-none" wire:model="password">
                    @error('password')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
            

                <button type="submit" class="inline-block w-full px-2 py-2 mt-3 text-white bg-black"
                    name="login">Login</button>
            </form>
        </div>
    </div>
</div>