<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Faithful</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: hidden !important;
        }
    </style>
    @livewireStyles
</head>

<body>
    <div x-data='{
      login_active:false,
      register_active:false,
    }'>
        @livewire('header')
        @livewire('search-category',['query'=>$query])
        @livewire('login')
        @livewire('register')
        @livewire('search',['query'=>$query])

        @if(session()->has('success'))
        <div class="fixed inset-x-0 z-20 px-3 py-2 mx-auto text-white bg-black w-fit bottom-4">{{session('success')}}</div>
        @endif


    </div>
    <script src="/js/app.js"></script>
    @livewireScripts
</body>

</html>