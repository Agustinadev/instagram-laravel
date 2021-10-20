<?php
use App\Models\Image;
$images = Image::orderBy('id', 'desc')->get();

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">



                @foreach ($images as $image)
                <article  class="flex flex-col justify-center items-center m-10 bg-white">

                    <div class="border-gray-200 border-2">


                    <!-- HEADER//////////////////////// -->
                    <header style="max-width: 714px" class="pl-2 pr-2 flex items-center justify-between text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out mb-1">
                        <div class="pl-2 pr-2 flex items-center">
                                <img src="{{asset($image->user->image)}}" alt="image" class="inline object-cover w-8 h-8 rounded-full m-2">
                                <a href="nick/{{$image->user->nick}}">
                                    <p class="self-center m-2 font-bold text-base">{{$image->user->nick}}</p>
                                </a>
                        </div>

                        <div  id="btnModal" style="cursor:pointer;" class="">
                             <svg class="pointer-events-none" aria-label="Más opciones" class="_8-yf5 " fill="#262626" height="16" role="img" viewBox="0 0 48 48" width="16"><circle clip-rule="evenodd" cx="8" cy="24" fill-rule="evenodd" r="4.5"></circle><circle clip-rule="evenodd" cx="24" cy="24" fill-rule="evenodd" r="4.5"></circle><circle clip-rule="evenodd" cx="40" cy="24" fill-rule="evenodd" r="4.5"></circle></svg>
                             <!--ventana modal-->

                             @auth

                             @if ($image->user->id == auth()->user()->id)
                             <button id="tvesModal" class="modal-container">
                                 <div class="modal-content">
                                     <span class="close"></span>
                                     <div class="modal-box">
                                         <span class="modal-options" style="color:#c31414; font-weight: bold;" ><a href="{{route('images.delete', $image->id)}}">Eliminar publicación</a></span>
                                         <span class="modal-options">Ir a la publicación</span>
                                         <span class="modal-options">Compartir en...</span>
                                         <span class="modal-options">Copiar enlace</span>
                                         <span class="modal-options">Insertar</span>
                                         <span  class="modal-options close" style="color: #2a2a2a; font-size: 13px; font-weight: 300;">Cancelar</span>
                                        </div>
                                    </div>
                                </button>


                                @else
                                <button id="tvesModal" class="modal-container">
                                    <div class="modal-content">
                                        <span class="close"></span>
                                        <div class="modal-box">

                                            <span class="modal-options" style="color:#c31414; font-weight: bold;" >Reportar publicación</span>
                                            <span class="modal-options" style="color:#c31414; font-weight: bold;" >Dejar de seguir</span>
                                            <span class="modal-options">Ir a la publicación</span>
                                            <span class="modal-options">Compartir en...</span>
                                            <span class="modal-options">Copiar enlace</span>
                                            <span class="modal-options">Insertar</span>
                                            <span class="modal-options close" style="color: #2a2a2a; font-size: 13px; font-weight: 300;">Cancelar</span>
                                        </div>
                                    </div>
                                </button>
                                @endif
                                @endauth
                        </div>

                    </header>




                    <!--MAIN////////////////////////-->
                    <div class="w-full flex flex-col items-center" style="max-width: 714px">
                        <img class="w-full" style="max-height: 750px" src=" {{asset($image->image_path)}}" alt="">
                    </div>





                    <!--FOOTER-->
                    <div style="max-width: 714px">
                        <!--SECCIÓN DE BOTONES-->
                        <section class="pl-2 pr-2 flex justify-between">


                            <!--BOTONES INTERACTIVOS-->
                            <div class="flex items-center mt-2">
                                <button class="button-ld">
                                        @php
                                            $hasLike = false;
                                        @endphp
                                        @foreach ($image->likes as $like)
                                            @if (auth()->user())
                                                @if ($like->user_id == auth()->user()->id)
                                                    @php
                                                        $hasLike = true;
                                                    @endphp
                                                @endif
                                            @endif
                                        @endforeach


                                        @if ($hasLike)
                                            <svg class="dislike-svg svg mt-2 mb-2 mr-2" data-id="{{$image->id}}" fill="#ed4956" color="#ed4956" height="30" role="img" viewBox="0 0 48 48" width="30"><path class="pointer-events-none" d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>

                                        @elseif($hasLike == false)
                                            <svg class="like-svg svg mt-2 mb-2 mr-2" data-id="{{$image->id}}" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path class="pointer-events-none" d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>
                                        @endif

                                </button>


                                <button>
                                    <svg aria-label="Comentar" class="m-2" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z" fill-rule="evenodd"></path></svg>
                                </button>

                                <button>
                                    <svg aria-label="Compartir publicación" class="m-2" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path></svg>
                                </button>
                            </div>





                            <!--PARA GUARDAR-->
                            <div class="flex items-center mt-2">
                                @auth
                                @php
                                    $save = ifSave($image->id)
                                @endphp

                                    @if ($save == 0)
                                    <button id="save" data-id="{{$image->id}}">
                                        <svg class="mt-2 mb-2 mr-2" aria-label="Guardar" class="m-2 pointer-events-none" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z"></path></svg>
                                    </button>
                                    @else
                                    <button class="mt-2 mb-2 mr-2" id="remove_save" data-id="{{$image->id}}">
                                        <svg aria-label="Eliminar" class="m-2 pointer-events-none" color="#262626" fill="#262626" height="30" role="img" viewBox="0 0 48 48" width="30"><path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 28.9 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1z"></path></svg>
                                    </button>
                                    @endif


                                @endauth

                            </div>
                        </section>








                    <!--ME GUSTA-->
                        <section class="pl-2 pr-2">
                            <p class="font-bold mb-2 mt-1"> {{count($image->likes)}} Likes</p>
                        </section>






                            <!--DESCRIPCIÓN -->
                        <section class="pl-2 pr-2">
                           <span class="font-bold">{{$image->user->nick}}</span>
                            {{$image->description}}
                        </section>







                        <!--COMENTARIOS-->
                        @if (count($image->comments) > 0)
                        <section class="pl-2 pr-2">
                            <p class="text-gray-500"> {{(count($image->comments) > 2) ? 'See the ' . count($image->comments) . ' comments' : ''}} </p>
                        </section>
                        @endif

                        @foreach ($image->comments as $comment)
                            <section class="pl-2 pr-2 flex">
                                <p data-id="id" class="flex">
                                    <span class="font-bold text-base mr-2" >
                                    {{$comment->user->nick}}
                                    </span>
                                     {{$comment->content}}
                                </p>



                            @auth
                                @php
                                    $auth_comment = deleteComment($comment->user_id, $image->user_id);
                                @endphp

                                @if ($auth_comment)
                                <article class="pl-2 pr-2 w-full">
                                    <form class="flex  w-full" action="{{route('comments.remove')}}" method="post">
                                        @csrf
                                        <input value="eliminate" type="submit" class="ml-auto text-red-500"></input>
                                        <input type="hidden" name="image_id" value="{{$image->id}}">
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    </form>
                                </article>
                                @endif
                            @endauth

                        </section>
                        @endforeach






                            <!--TIEMPO DE LA FOTO-->
                            <section class="pl-2 pr-2">
                                @php
                                $time = PostTime($image->created_at, date_default_timezone_get());
                                @endphp
                                <p class="text-gray-500 text-xs mt-2 mb-2">
                                    {{ $time . 'AGO'  }}
                                </p>
                            </section>






                            <!--AÑADIR COMENTARIO-->
                         <section class="pl-2 pr-2 w-full">
                             <form class="flex  border-t border-gray-200 w-full" action="{{route('comments.save')}}" method="post">
                                @csrf
                                <input class="focus:ring-transparent border-none w-full" name="content" type="text" placeholder="Add comment...">
                                <input
                               class="bg-transparent" type="submit" value="Send">
                                <input type="hidden" name="image_id" value="{{$image->id}}">
                             </form>
                        </section>
                    </div>

                        </div>

                         </article>
                    @endforeach
            </div>
        </div>
    </div>
    @guest
    <p>No está registrado</p>
    @endguest
</x-app-layout>
