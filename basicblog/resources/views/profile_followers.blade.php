
{{-- <x-user_profile
    :avatar="$avatar"
    :username="$username"
    :checkIsFollowing="$checkIsFollowing"
    :currentUserPostsCount="$currentUserPostsCount"
> --}}
<x-user_profile :sharedData="$sharedData">
    @include('profile_followers_only')
</x-user_profile>
