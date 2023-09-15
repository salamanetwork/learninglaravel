
<x-layout>

    @include('nav_guest')

    <div
        class="container-fluid justify-content-center py-md-5"
        style="max-width: 800px"
    >

    <div class="container py-md-5 container--narrow">
        <h2>
            <img class="avatar-small" src="{{$sharedData['avatar']}}" />
                {{$sharedData['username']}}

            @auth

            @if(!$sharedData['checkIsFollowing'] AND auth()->user()->username != $sharedData['username'])
            <form class="ml-2 d-inline" action="/follow/{{$sharedData['username']}}" method="POST">
                @csrf
                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>


            </form>
            @endif

            @if($sharedData['checkIsFollowing'])
            <form class="ml-2 d-inline" action="/unfollow/{{$sharedData['username']}}" method="POST">
                @csrf

                <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
            </form>

            @endif
            <!-- Avatar Button -->
            @if(auth()->user()->username == $sharedData['username'])
            <a href="/user/avatar/manage" class="btn btn-secondary btn-sm">
                Manage Avatar
            </a>
            @endif
            @endauth

        </h2>

        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="/user/profile/{{$sharedData['username']}}" class="profile-nav-link nav-item nav-link {{ Request::segment(4) == "" ? "active" : "" }}">Posts: {{$sharedData['currentUserPostsCount']}}</a>
          <a href="/user/profile/{{$sharedData['username']}}/followers" class="profile-nav-link nav-item nav-link {{ Request::segment(4) == "followers" ? "active" : "" }}">Followers: {{$sharedData['followersCount']}}</a>
          <a href="/user/profile/{{$sharedData['username']}}/following" class="profile-nav-link nav-item nav-link {{ Request::segment(4) == "following" ? "active" : "" }}">Following: {{$sharedData['followingCount']}}</a>
        </div>

        <div class="profile-slot-content">
            {{$slot}}
        </div>


    </div>
    </div>
</x-layout>


