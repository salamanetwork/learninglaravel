
{{-- <x-user_profile
    :avatar="$avatar"
    :username="$username"
    :checkIsFollowing="$checkIsFollowing"
    :currentUserPostsCount="$currentUserPostsCount"
> --}}
<x-user_profile :sharedData="$sharedData">
    <div class="list-group">
        @foreach($followers as $follower)
            <a href="/user/profile/{{$follower->userDoingFollowing->username}}" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="{{$follower->userDoingFollowing->avatar}}" />
                {{$follower->userDoingFollowing->username}}
                </a>
        @endforeach
    </div>
</x-user_profile>
