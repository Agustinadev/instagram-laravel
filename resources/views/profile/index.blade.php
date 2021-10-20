<x-app-layout>
    <div class="py-12  mr-48 ml-48">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



                    <x-validation-errors class="mb-4" :errors="$errors" />
                    <x-success-message />





            <section>
                <!--USER INDENTIFIED-->
                @if ($nick == auth()->user()->nick)
                @foreach ($user_table as $user)
                <header class="flex">
                    <article class="rounded-full overflow-hidden mr-12 ml-12 w-48 h-48">
                        <img class="w-full h-full" src="{{asset(auth()->user()->image)}}" alt="">
                    </article>


                    <article class="flex-row flex-grow">
                        <section class="flex items-center">
                            <h2 class="text-4xl mr-8">{{auth()->user()->nick}}</h2>



                            <a class="mr-8 font-bold" style="border-radius: 4px; border:1px solid #dbdbdb; background-color: transparent; padding: 5px 9px;" href="{{route('profile')}}">Edit profile</a>

                            <svg aria-label="Opciones" class="_8-yf5" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M46.7 20.6l-2.1-1.1c-.4-.2-.7-.5-.8-1-.5-1.6-1.1-3.2-1.9-4.7-.2-.4-.3-.8-.1-1.2l.8-2.3c.2-.5 0-1.1-.4-1.5l-2.9-2.9c-.4-.4-1-.5-1.5-.4l-2.3.8c-.4.1-.8.1-1.2-.1-1.4-.8-3-1.5-4.6-1.9-.4-.1-.8-.4-1-.8l-1.1-2.2c-.3-.5-.8-.8-1.3-.8h-4.1c-.6 0-1.1.3-1.3.8l-1.1 2.2c-.2.4-.5.7-1 .8-1.6.5-3.2 1.1-4.6 1.9-.4.2-.8.3-1.2.1l-2.3-.8c-.5-.2-1.1 0-1.5.4L5.9 8.8c-.4.4-.5 1-.4 1.5l.8 2.3c.1.4.1.8-.1 1.2-.8 1.5-1.5 3-1.9 4.7-.1.4-.4.8-.8 1l-2.1 1.1c-.5.3-.8.8-.8 1.3V26c0 .6.3 1.1.8 1.3l2.1 1.1c.4.2.7.5.8 1 .5 1.6 1.1 3.2 1.9 4.7.2.4.3.8.1 1.2l-.8 2.3c-.2.5 0 1.1.4 1.5L8.8 42c.4.4 1 .5 1.5.4l2.3-.8c.4-.1.8-.1 1.2.1 1.4.8 3 1.5 4.6 1.9.4.1.8.4 1 .8l1.1 2.2c.3.5.8.8 1.3.8h4.1c.6 0 1.1-.3 1.3-.8l1.1-2.2c.2-.4.5-.7 1-.8 1.6-.5 3.2-1.1 4.6-1.9.4-.2.8-.3 1.2-.1l2.3.8c.5.2 1.1 0 1.5-.4l2.9-2.9c.4-.4.5-1 .4-1.5l-.8-2.3c-.1-.4-.1-.8.1-1.2.8-1.5 1.5-3 1.9-4.7.1-.4.4-.8.8-1l2.1-1.1c.5-.3.8-.8.8-1.3v-4.1c.4-.5.1-1.1-.4-1.3zM24 41.5c-9.7 0-17.5-7.8-17.5-17.5S14.3 6.5 24 6.5 41.5 14.3 41.5 24 33.7 41.5 24 41.5z" fill-rule="evenodd"></path></svg>
                        </section>



                        <section class="flex mt-6">
                            <p class="mr-12"><span class="font-bold">{{count($user->images)}}</span> posts</p>
                            <p class="mr-12"><span class="font-bold">{{count($user->follows)}}</span> follows</p>

                            @if (count($followed) == 0)
                            <p class="mr-12"><span class="font-bold">0</span> followed</p>
                            @else
                            <p class="mr-12"><span class="font-bold">{{count($followed)}}</span> followed</p>
                            @endif
                        </section>

                        <section class="mt-6">
                            <p class="font-bold">{{$user->name}}</p>
                            <p>Art</p>
                            <p>Description</p>
                        </section>
                    </article>
                </header>


                <section class="flex justify-center border-t-2 mt-20">
                    <div class="flex items-center m-2">
                        <svg aria-label="" class="mr-1" color="#8e8e8e" fill="#8e8e8e" height="12" role="img" viewBox="0 0 48 48" width="12"><path clip-rule="evenodd" d="M45 1.5H3c-.8 0-1.5.7-1.5 1.5v42c0 .8.7 1.5 1.5 1.5h42c.8 0 1.5-.7 1.5-1.5V3c0-.8-.7-1.5-1.5-1.5zm-40.5 3h11v11h-11v-11zm0 14h11v11h-11v-11zm11 25h-11v-11h11v11zm14 0h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11zm14 28h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11z" fill-rule="evenodd"></path></svg>
                        <p class="text-xs text-gray-500">PUBLICATIONS</p>
                    </div>
                    <div class="flex items-center m-2">
                        <svg aria-label="" class="mr-1" color="#8e8e8e" fill="#8e8e8e" height="12" role="img" viewBox="0 0 48 48" width="12"><path d="M41.5 5.5H30.4c-.5 0-1-.2-1.4-.6l-4-4c-.6-.6-1.5-.6-2.1 0l-4 4c-.4.4-.9.6-1.4.6h-11c-3.3 0-6 2.7-6 6v30c0 3.3 2.7 6 6 6h35c3.3 0 6-2.7 6-6v-30c0-3.3-2.7-6-6-6zm-29.4 39c-.6 0-1.1-.6-1-1.2.7-3.2 3.5-5.6 6.8-5.6h12c3.4 0 6.2 2.4 6.8 5.6.1.6-.4 1.2-1 1.2H12.1zm32.4-3c0 1.7-1.3 3-3 3h-.6c-.5 0-.9-.4-1-.9-.6-5-4.8-8.9-9.9-8.9H18c-5.1 0-9.4 3.9-9.9 8.9-.1.5-.5.9-1 .9h-.6c-1.7 0-3-1.3-3-3v-30c0-1.7 1.3-3 3-3h11.1c1.3 0 2.6-.5 3.5-1.5L24 4.1 26.9 7c.9.9 2.2 1.5 3.5 1.5h11.1c1.7 0 3 1.3 3 3v30zM24 12.5c-5.3 0-9.6 4.3-9.6 9.6s4.3 9.6 9.6 9.6 9.6-4.3 9.6-9.6-4.3-9.6-9.6-9.6zm0 16.1c-3.6 0-6.6-2.9-6.6-6.6 0-3.6 2.9-6.6 6.6-6.6s6.6 2.9 6.6 6.6c0 3.6-3 6.6-6.6 6.6z"></path></svg>
                        <p class="text-xs text-gray-500">TAGGED</p>
                    </div>
                </section>

                <main>
                    <section class="grid grid-cols-3 gap-4 mt-12">
                        @foreach ($user->images as $images)
                        <img class="h-72 w-72" src="{{asset($images->image_path)}}" alt="">
                        @endforeach
                    </section>
                </main>
                @endforeach







            <!--USER NO INDENTIFIED  (viendo desde el perfil autentificado a otro que no esta autentificado) -->
                @else
                @foreach ($user_table as $user)

                <header class="flex">
                    <article class="rounded-full overflow-hidden mr-12 ml-12 w-48 h-48">
                        <img class="w-full h-full" src="{{asset($user->image)}}" alt="">
                    </article>


                    <article class="flex-row flex-grow">
                        <section class="flex items-center">
                            <h2 class="text-4xl mr-8">{{$user->nick}}</h2>

                            @if ($if_follow->isEmpty())
                            <a class="mr-8 font-bold" style="border-radius: 4px; border:1px solid #dbdbdb;  background-color: transparent; padding: 5px 9px;" id="follow" data-id="{{$user->id}}">Follow</a>
                            @else
                            <a class="mr-8 font-bold" style="border-radius: 4px; border:1px solid #dbdbdb;  background-color: transparent; padding: 5px 9px;" id="unfollow" data-id="{{$user->id}}">Dejar de seguir</a>
                            @endif



                            <svg aria-label="Opciones" class="_8-yf5" color="#262626" fill="#262626" height="24" role="img" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M46.7 20.6l-2.1-1.1c-.4-.2-.7-.5-.8-1-.5-1.6-1.1-3.2-1.9-4.7-.2-.4-.3-.8-.1-1.2l.8-2.3c.2-.5 0-1.1-.4-1.5l-2.9-2.9c-.4-.4-1-.5-1.5-.4l-2.3.8c-.4.1-.8.1-1.2-.1-1.4-.8-3-1.5-4.6-1.9-.4-.1-.8-.4-1-.8l-1.1-2.2c-.3-.5-.8-.8-1.3-.8h-4.1c-.6 0-1.1.3-1.3.8l-1.1 2.2c-.2.4-.5.7-1 .8-1.6.5-3.2 1.1-4.6 1.9-.4.2-.8.3-1.2.1l-2.3-.8c-.5-.2-1.1 0-1.5.4L5.9 8.8c-.4.4-.5 1-.4 1.5l.8 2.3c.1.4.1.8-.1 1.2-.8 1.5-1.5 3-1.9 4.7-.1.4-.4.8-.8 1l-2.1 1.1c-.5.3-.8.8-.8 1.3V26c0 .6.3 1.1.8 1.3l2.1 1.1c.4.2.7.5.8 1 .5 1.6 1.1 3.2 1.9 4.7.2.4.3.8.1 1.2l-.8 2.3c-.2.5 0 1.1.4 1.5L8.8 42c.4.4 1 .5 1.5.4l2.3-.8c.4-.1.8-.1 1.2.1 1.4.8 3 1.5 4.6 1.9.4.1.8.4 1 .8l1.1 2.2c.3.5.8.8 1.3.8h4.1c.6 0 1.1-.3 1.3-.8l1.1-2.2c.2-.4.5-.7 1-.8 1.6-.5 3.2-1.1 4.6-1.9.4-.2.8-.3 1.2-.1l2.3.8c.5.2 1.1 0 1.5-.4l2.9-2.9c.4-.4.5-1 .4-1.5l-.8-2.3c-.1-.4-.1-.8.1-1.2.8-1.5 1.5-3 1.9-4.7.1-.4.4-.8.8-1l2.1-1.1c.5-.3.8-.8.8-1.3v-4.1c.4-.5.1-1.1-.4-1.3zM24 41.5c-9.7 0-17.5-7.8-17.5-17.5S14.3 6.5 24 6.5 41.5 14.3 41.5 24 33.7 41.5 24 41.5z" fill-rule="evenodd"></path></svg>
                        </section>



                        <section class="flex mt-6">
                            <p class="mr-12"><span class="font-bold">{{count($user->images)}}</span> posts</p>
                            <p class="mr-12"><span class="font-bold">{{count($user->follows)}}</span> follows</p>

                            @if (count($followed) == 0)
                            <p class="mr-12"><span class="font-bold">0</span> followed</p>
                            @else
                            <p class="mr-12"><span class="font-bold">{{count($$followed)}}</span> followed</p>
                            @endif

                        </section>

                        <section class="mt-6">
                            <p class="font-bold"></p>
                            <p>Art</p>
                            <p>Description</p>
                        </section>
                    </article>
                </header>


                <section class="flex justify-center border-t-2">
                    <div class="flex items-center m-2">
                        <svg aria-label="" class="mr-1" color="#8e8e8e" fill="#8e8e8e" height="12" role="img" viewBox="0 0 48 48" width="12"><path clip-rule="evenodd" d="M45 1.5H3c-.8 0-1.5.7-1.5 1.5v42c0 .8.7 1.5 1.5 1.5h42c.8 0 1.5-.7 1.5-1.5V3c0-.8-.7-1.5-1.5-1.5zm-40.5 3h11v11h-11v-11zm0 14h11v11h-11v-11zm11 25h-11v-11h11v11zm14 0h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11zm14 28h-11v-11h11v11zm0-14h-11v-11h11v11zm0-14h-11v-11h11v11z" fill-rule="evenodd"></path></svg>
                        <p class="text-xs text-gray-500">PUBLICATIONS</p>
                    </div>
                    <div class="flex items-center m-2">
                        <svg aria-label="" class="mr-1" color="#8e8e8e" fill="#8e8e8e" height="12" role="img" viewBox="0 0 48 48" width="12"><path d="M41.5 5.5H30.4c-.5 0-1-.2-1.4-.6l-4-4c-.6-.6-1.5-.6-2.1 0l-4 4c-.4.4-.9.6-1.4.6h-11c-3.3 0-6 2.7-6 6v30c0 3.3 2.7 6 6 6h35c3.3 0 6-2.7 6-6v-30c0-3.3-2.7-6-6-6zm-29.4 39c-.6 0-1.1-.6-1-1.2.7-3.2 3.5-5.6 6.8-5.6h12c3.4 0 6.2 2.4 6.8 5.6.1.6-.4 1.2-1 1.2H12.1zm32.4-3c0 1.7-1.3 3-3 3h-.6c-.5 0-.9-.4-1-.9-.6-5-4.8-8.9-9.9-8.9H18c-5.1 0-9.4 3.9-9.9 8.9-.1.5-.5.9-1 .9h-.6c-1.7 0-3-1.3-3-3v-30c0-1.7 1.3-3 3-3h11.1c1.3 0 2.6-.5 3.5-1.5L24 4.1 26.9 7c.9.9 2.2 1.5 3.5 1.5h11.1c1.7 0 3 1.3 3 3v30zM24 12.5c-5.3 0-9.6 4.3-9.6 9.6s4.3 9.6 9.6 9.6 9.6-4.3 9.6-9.6-4.3-9.6-9.6-9.6zm0 16.1c-3.6 0-6.6-2.9-6.6-6.6 0-3.6 2.9-6.6 6.6-6.6s6.6 2.9 6.6 6.6c0 3.6-3 6.6-6.6 6.6z"></path></svg>
                        <p class="text-xs text-gray-500">TAGGED</p>
                    </div>
                </section>

                <main>
                    <section class="grid grid-cols-3 gap-4 mt-12">
                        @foreach ($user->images as $images)
                        <img class="h-72 w-72" src="{{asset($images->image_path)}}" alt="">
                        @endforeach
                    </section>
                </main>
                @endforeach
                @endif
            </section>


        </div>
    </div>
</x-app-layout>
