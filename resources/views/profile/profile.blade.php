<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">



                    <x-validation-errors class="mb-4" :errors="$errors" />
                    <x-success-message />

                   <form action="{{route("profile.update")}}" method="post" enctype="multipart/form-data">
                       @method('PUT')
                       @csrf
                                <div class="grid grid-cols-2 gap-6">
                                    <div div class="grid grid-rows-2 gap-6">

                                        <div class="flex">
                                            <x-label for="image" :value="__('Avatar')" class="self-center mr-2.5"></x-label>
                                            <img src="{{asset($image)}}" alt="image" class="inline object-cover w-16 h-16 mr-2 rounded-full">

                                            <!--seleccionar archivo para cambiar foto-->
                                            <x-input class="block mt-1 w-full self-center" type="file" autofocus name="image">
                                            </x-input>

                                        </div>

                                        <div>
                                            <x-label for="name" :value="__('Name')"></x-label>
                                            <x-input class="block mt-1 w-full" type="text" value="{{auth()->user()->name}}" autofocus name="name">
                                            </x-input>
                                        </div>


                                        <div>
                                            <x-label for="surname" :value="__('Surname')"></x-label>
                                            <x-input class="block mt-1 w-full" type="text" value="{{auth()->user()->surname}}" autofocus name="surname">
                                            </x-input>
                                        </div>



                                        <div>
                                            <x-label for="nick" :value="__('Nick')"></x-label>
                                            <x-input class="block mt-1 w-full" type="text" value="{{auth()->user()->nick}}" autofocus name="nick">
                                            </x-input>
                                        </div>


                                    </div>

                                    <div class="grid grid-rows-2 gap-6">

                                        <div>
                                            <x-label for="email" :value="__('Email')"></x-label>
                                            <x-input class="block mt-1 w-full" type="email" value="{{auth()->user()->email}}" autofocus name="email">
                                            </x-input>
                                        </div>

                                        <div>
                                            <x-label for="password" :value="__('New password')"></x-label>
                                            <x-input class="block mt-1 w-full" type="password" autofocus autocomplete="new-password" name="password">
                                            </x-input>
                                        </div>

                                    <div>
                                        <x-label for="password_confirmation" :value="__('Confirm password')"></x-label>
                                        <x-input class="block mt-1 w-full" type="password" autofocus name="password-confirmation">
                                        </x-input>
                                    </div>



                                    </div>
                                </div>


                                 <div class="flex items-center justify-end mt-4">
                                     <x-button class="ml-3">
                                         UPDATE
                                     </x-button>
                                 </div>


                   </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
