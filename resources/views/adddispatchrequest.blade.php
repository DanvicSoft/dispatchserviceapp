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
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>Request A Dispatch Rider</title>
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center mb-4">
            <a href="/homepage"
                ><img class="w-24" src="images/skynet.png" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="manage.html" class="hover:text-laravel"
                        ><i class="fa-solid fa-gear"></i> Manage Requests</a
                    >
                </li>
                <li>
                    <form method="post"action="/createdispatchrequest">
                    
                        <button>
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>

        <main>
            <div class="mx-4">
                <div
                    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Request for a dispatch Rider
                        </h2>
                        <p class="mb-4">Make a request to find a Dispatch Rider</p>
                    </header>

                    <form method="POST" action="/createdispatchrequest">
                    @csrf
                        <div class="mb-6">
                            <label
                                for="school"
                                class="inline-block text-lg mb-2"
                                >Description of Item</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="pickup_request_details" 
                                placeholder="Enter the Item to Send" value="{{old('pickup_request_details')}}"/>
                                
                                @error('pickup_request_details')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>    
                                @enderror
                        </div>

                        <div class="mb-6">
                            <label for="pickup_address" class="inline-block text-lg mb-2">
                                Pickup Address/Location
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="pickup_address" placeholder="Enter locaion or Address"
                            />
                            @error('pickup_address')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>    
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Item to Dispatch</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="item_pickup"
                                placeholder="Example: Standing Fan" value="{{old('item_pickup')}}"/>
                                @error('item_pickup')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Reciever's Name</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="recipient_name"
                                placeholder="Enter of of Reciever" value="{{old('recipient_name')}}"
                            />
                            @error('recipient_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="recipient_phone" class="inline-block text-lg mb-2"
                                >Reciever's Contact</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="recipient_phone" placeholder="Enter Reciever's Phone Number"value="{{old('recipient_phone')}}"
                            />
                            @error('recipient_phone')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>   
                            @enderror
                        </div>


                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Recievers's Address
                            </label>
                            <input
                                class="border border-gray-200 rounded p-2 w-full"
                                name="dropoff_address" placeholder="Enter Recievers's Address"value="{{old('dropoff_address')}}"
                            >
                            @error('dropoff_address')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </input>
                        </div>

                      <!--  <div class="mb-6">
                            <label for="logo" class="inline-block text-lg mb-2">
                                Company Logo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="logo"
                            />
                        </div>
                          
                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Job Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                            ></textarea>
                        </div>
                          -->
                        <div class="mb-6">
                            <button
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Submit Request
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </div>
            </div>
        </main>

        <footer
            class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

           
        </footer>
    </body>
</html>
