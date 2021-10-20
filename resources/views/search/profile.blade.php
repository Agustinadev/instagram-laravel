@if (isset($search) && is_object($search))
    @foreach ($search as $nick)
    <a href="http://instagram-laravel.test/nick/{{$nick->nick}}">
        <div class="user-list flex">
            <img class="inline object-cover w-12 h-12 mr-2 rounded-full" src="{{asset($nick->image)}}"></img>
            <span>
                <p class="">{{$nick->nick}}</p>
                <p class="text-gray-500">{{$nick->name}}</p>
            </span>
        </div>
    </a>
    @endforeach

@else
<div class="user-list">
    <p class="text-center text-gray-500">{{$search}}</p>
</div>
@endif
