
<x-layout>

    @include('nav_guest')

    <div
        class="container-fluid justify-content-center py-md-5"
        style="max-width: 800px"
    >

    <div class="container py-md-5 container--narrow">
        <h2>
          <img class="avatar-small" src="https://1.gravatar.com/avatar/5db0999f9e2116f4c1c1e8e6774c5dbf265cf503867d3b6ab9d59552e38b05b7?size=128" />
          {{$username}}
          <form class="ml-2 d-inline" action="#" method="POST">
            <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
            <!-- <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button> -->
          </form>
        </h2>

        <div class="profile-nav nav nav-tabs pt-2 mb-4">
          <a href="#" class="profile-nav-link nav-item nav-link active">Posts: {{$currentUserPostsCount}}</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Followers: 3</a>
          <a href="#" class="profile-nav-link nav-item nav-link">Following: 2</a>
        </div>

        <div class="list-group">
            @foreach($currentUserPosts as $post)
                <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
                    <img class="avatar-tiny" src="https://1.gravatar.com/avatar/5db0999f9e2116f4c1c1e8e6774c5dbf265cf503867d3b6ab9d59552e38b05b7?size=128" />
                    <strong>{{$post->title}}</strong> on {{date( 'd-m-Y h:m ', strtotime($post->created_at))}}
                 </a>
            @endforeach
        </div>
      </div>
    </div>
</x-layout>


