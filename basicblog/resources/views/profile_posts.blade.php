
{{-- <x-user_profile
    :avatar="$avatar"
    :username="$username"
    :checkIsFollowing="$checkIsFollowing"
    :currentUserPostsCount="$currentUserPostsCount"
> --}}
<x-user_profile :sharedData="$sharedData">
    <div class="list-group">
        @foreach($currentUserPosts as $post)
            <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
                <img class="avatar-tiny" src="{{$sharedData['avatar']}}" />
                <strong>{{$post->title}}</strong> on {{date( 'd-m-Y h:m ', strtotime($post->created_at))}}
                </a>
        @endforeach
    </div>
</x-user_profile>

