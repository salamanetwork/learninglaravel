<!-- Right-aligned login form (Inline Form) -->
<div class="col-lg-5 mx-auto">
    <a class="btn btn-lg">
        <i class="btn bi bi-search" style="font-size: 2rem; color: cornflowerblue;"></i>
    </a>
    <a class="btn btn-lg">
        <i class="btn bi bi-chat" style="font-size: 2rem; color: cornflowerblue;"></i>
    </a>
    <a href="/user/profile/posts">
        <img class="avatar-tiny" src="https://1.gravatar.com/avatar/5db0999f9e2116f4c1c1e8e6774c5dbf265cf503867d3b6ab9d59552e38b05b7?size=128" />
    </a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a class="btn btn-lg btn-success rounded" href="/post/create">
        Create Post
    </a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <form method="POST" action="/user/signout" class="d-inline">

        @csrf

        <button class="btn btn-lg btn-danger" type="submit">Sign Out</button>
    </form>
</div>
