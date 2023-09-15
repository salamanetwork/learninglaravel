
{{-- <x-user_profile
    :avatar="$avatar"
    :username="$username"
    :checkIsFollowing="$checkIsFollowing"
    :currentUserPostsCount="$currentUserPostsCount"
> --}}
<x-user_profile :sharedData="$sharedData">
    <div class="list-group">
        @foreach($following as $follow)
            <a href="/user/profile/{{$follow->userBeingFollowed->username}}" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="{{$follow->userBeingFollowed->avatar}}" />
                {{$follow->userBeingFollowed->username}}
                </a>
        @endforeach
    </div>
</x-user_profile>
