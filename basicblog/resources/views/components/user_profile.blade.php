
<x-layout>

    @include('nav_guest')

    <div
        class="container-fluid justify-content-center py-md-5"
        style="max-width: 800px"
    >

    <div class="container py-md-5 container--narrow">
        <h2>
            <img class="avatar-small" src="{{$avatar}}" />
                {{$username}}

            @auth

            @if(!$checkIsFollowing AND auth()->user()->username != $username)
            <form class="ml-2 d-inline" action="/follow/{{$username}}" method="POST">
                @csrf
                <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>


            </form>
            @endif

            @if($checkIsFollowing)
            <form class="ml-2 d-inline" action="/unfollow/{{$username}}" method="POST">
                @csrf

                <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
            </form>

            @endif
            <!-- Avatar Button -->
            @if(auth()->user()->username == $username)
            <a href="/user/avatar/manage" class="btn btn-secondary btn-sm">
                Manage Avatar
            </a>
            @endif
            @endauth

        </h2>

        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{$currentUserPostsCount}}</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a>
        </div>

        <div class="profile-slot-content">
            {{$slot}}
        </div>


    </div>
    </div>
</x-layout>


