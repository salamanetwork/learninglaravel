
{{-- <x-user_profile
    :avatar="$avatar"
    :username="$username"
    :checkIsFollowing="$checkIsFollowing"
    :currentUserPostsCount="$currentUserPostsCount"
> --}}
<x-user_profile :sharedData="$sharedData">
    @include('profile_posts_only')
    <!-- Pagination -->
<div class="mt-4">
    {{ $currentUserPosts->links() }}
</div>
</x-user_profile>

