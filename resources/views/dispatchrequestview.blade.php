<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "orange",
                        },
                    },
                },
            };
        </script>
        <title>Dispatch Requests</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="index.html"
                ><img class="w-24" src="images/skynet.png" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
               @auth
               <li>
                <a href="/profile" class="hover:text-laravel"
                    ><i class="fa-solid fa-user"></i>
                   Welcome {{auth()->user()->name}}</a
                >
            </li>
               <li>
                <a href="/dispatchrequest" class="hover:text-laravel"
                    ><i class="fa-solid fa-gear"></i>
                    Manage Requests</a
                >
            </li>
            <li>
                <form method="POST" action ="/logoutuser" class="hover:text-laravel">
                    @csrf
                    <i class="fa-solid fa-door-open"></i>
                    <button type ="submit"> Logout </button>
                </form>
            </li>
      @else
                <li>
                    <a href="/registeruser" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="/" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a
                    >
                </li>     
            </ul>
            @endauth
        </nav>
        
        @if(Session()->has('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3"> 
            <p>{{session('message')}}</p>
       </div>
      @endif

        <!-- Hero -->
        <section
            class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
        >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('images/skynet.png')"
            ></div>

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                    Dispatch<span class="text-black">Requests</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                Customer Dispatch Requests List 
                </p>
                <div>
                    <a
                        href="register.html"
                        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                        >Sign Up to request a Dispatch rider</a
                    >
                </div>
            </div>
        </section>

        <main>
            <!-- Search -->
            <form action="/homepage">
                <div class="relative border-2 border-blue-100 m-4 rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i
                            class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                        ></i>
                    </div>
                    <input
                        type="text"
                        name="search"
                        class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                        placeholder="Search for jobs that meets your designation..."
                    />
                    <div class="absolute top-2 right-2">
                        <button
                            type="submit"
                            class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </form>

            <div
            
                class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
                <?php foreach($dispatchrequestlists as $dispatchrequestlist): ?>

<div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <img
                            class="hidden w-48 mr-6 md:block"
                            src=""
                            alt=""
                        />
                        <div>
                        <h2><a href="/singlejob/{{$dispatchrequestlist['id']}}"> <?//php echo $job_listing['id']; ?> </a></h2>
                            <div class="text-xl font-bold mb-4"><h2><a href="/singlejob/{{$dispatchrequestlist['id']}}">
                                <?php echo $dispatchrequestlist['pickup_request_details']; ?></a></div>
                            <ul class="flex">
                                
                                
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >   
                                 
                                    <?php echo  $dispatchrequestlist['item_pickup']; ?>
                                    
                                </li>
                                 
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <?php echo $dispatchrequestlist['recipient_name']; ?>
                                </li>
                               
                            </ul>
                        </div>
                        
                    </div>
                    @auth
    
                @endauth
                
                   <a href="acceptrequest/{{$dispatchrequestlist->dispatchrequest_id}}">
                       <button
                            type="submit"
                            class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600" >
                            Accept
                        </button>
                    </a>
                </div>
<?//php var_dump($job_listing)?>



<?php endforeach; ?>
{{$dispatchrequestlists->links()}}

<footer
            >
            <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>
     @auth
    
           
            @endauth
            <a
            href="#"
            class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
            >Submit Request</a>
        </footer>
    </body>
</html>
