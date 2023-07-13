<div>
   {{-- px-10 py-2 --}}
    {{-- HEADER --}}
    <div class="flex justify-between px-10 pt-5 header_container">
        <img src="../logo.svg" alt="">
        <h1 class="text-2xl font-bold uppercase ms-36">faithful brand</h1>
        <div class="flex items-center border border-black login_button_container">
        @auth
    <div class="px-4 py-2 text-sm hover:cursor-pointer" >{{auth()->user()['name']}}</div>
        <div class="w-0 h-4 border-black border-s"></div>
                    <div class="px-4 py-2 text-sm hover:cursor-pointer" wire:click='logout'>Logout</div>
            @else
            <div class="px-4 py-2 text-sm hover:cursor-pointer" @click="login_active=!login_active">Login</div>
            <div class="w-0 h-4 border-black border-s"></div>
            <div class="px-4 py-2 text-sm hover:cursor-pointer" @click="register_active=!register_active">Register</div>
            @endauth
        </div>
    </div>
</div>
