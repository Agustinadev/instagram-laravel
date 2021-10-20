<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">


    <!-- Modal Search -->
    <section class="modal_search" style="display:none; z-index:10; position:absolute; width:100%; height:100%; ">
    </section>





    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 justify-center items-center">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>






                <!-- Navigation Links CAMBIAR!!!!!!!!!!!!!!!!!!!!!!!-->
                <!--<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('images.create')" :active="request()->routeIs('images.create')">
                        {{ __('Images') }}
                    </x-nav-link>
                </div>-->






               <!-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                        <?xml version="1.0"?>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="42" height="42" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g><g xmlns="http://www.w3.org/2000/svg"><path d="m416 241h-145v-145c0-8.284-6.716-15-15-15s-15 6.716-15 15v145h-145c-8.284 0-15 6.716-15 15s6.716 15 15 15h145v145c0 8.284 6.716 15 15 15s15-6.716 15-15v-145h145c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="#838282" data-original="#000000" style=""/>
                            <path d="m437 0h-362c-41.355 0-75 33.645-75 75v362c0 41.355 33.645 75 75 75h362c41.355 0 75-33.645 75-75v-362c0-41.355-33.645-75-75-75zm45 437c0 24.813-20.187 45-45 45h-362c-24.813 0-45-20.187-45-45v-362c0-24.813 20.187-45 45-45h362c24.813 0 45 20.187 45 45z" fill="#838282" data-original="#000000" style=""/></g></g>
                        </svg>
                    </x-nav-link>
                </div> -->
            </div>





    <!--<div class="modal_search bg-gray-200 w-screen h-screen absolute" style="z-index:-100;"></div>-->


            <div class="relative border-2 flex flex-col justify-center items-center z-5" role="button">

                <div class="flex flex-row">
                    <img class="m-3" src="{{asset("css/lupa.png")}}" alt="">
                    <input class=" search text-gray-400 border-none focus:ring-transparent outline-none" type="text" placeholder="Buscar">
                </div>


                <span class="rhombus"></span>

                <div class="results"></div>

            </div>




            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">


                        @auth
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                           <div class="">
                               <img src="{{asset(auth()->user()->image)}}" alt="image" class="inline object-cover w-8 h-8 rounded-full mr-1">
                           </div>

                            <div>
                                {{ Auth::user()->nick}}
                            </div>



                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        @endauth


                        @guest

                             <button class="flex items-center mr-7 text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                 <a href="{{route('login')}}">Login</a>
                             </button>


                             <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                 <a href="{{route('register')}}">Register</a>
                             </button>
                        @endguest


                    </x-slot>








                    <x-slot name="content">
                        @auth

                        <x-dropdown-link href="http://instagram-laravel.test/nick/{{Auth()->user()->nick}}">
                            {{ __('My photos') }}
                        </x-dropdown-link>



                        <x-dropdown-link :href="route('images.create')">
                            {{ __('Update image') }}
                        </x-dropdown-link>

                        <!-- Authentication -->

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        @endauth
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger  RESPONSIVE-->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Index') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">

                <!-- Profile en el hamburger -->
                    <x-responsive-nav-link :href="route('profile')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>


                </form>
            </div>
        </div>
    </div>
</nav>
