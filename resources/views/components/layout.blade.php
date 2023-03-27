<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>Austin Freelance Gigs | Find Freelance Jobs & Projects in Austin, TX</title>
</head>

<body>
    <nav class="flex flex-col lg:flex-row justify-between lg:items-center mb-4 bg-green-800 p-6">
        <a href="/" class="flex items-center gap-2 mb-6 lg:mb-0"><img class="w-24" src="{{ asset('images/logo.png') }}" alt="" class="logo" /> <span class="text-6xl font-bold m-0 p-0">AFG</span></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <strong>Welcome {{auth()->user()->name}}</strong>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                        Manage Listings</a>
                </li>
                <li>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="Submit">Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth
                <li>
                    <a href="/listings/create" class="bg-black text-white py-4 px-8"><i class="fa-solid fa-briefcase text-white"></i> Post a Job</a>
                </li>
        </ul>
    </nav>

   <main>
    {{ $slot }}
   </main>

   <footer
   class="bg-black w-full flex items-center justify-start text-white h-24 mt-24 md:justify-center">
   <p class="ml-2">Copyright &copy; {{ now()->year }} Austin Freelance Gigs, All Rights reserved</p>

</footer>
<x-flash-message/>
</body>

</html>