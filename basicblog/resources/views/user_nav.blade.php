<!-- Right-aligned login form (Inline Form) -->
<div class="col-lg-5 mx-auto">
    <a class="btn btn-lg header-search-icon">
        <i class="btn bi bi-search" style="font-size: 2rem; color: cornflowerblue;"></i>
    </a>
    <a class="btn btn-lg header-chat-icon">
        <i class="btn bi bi-chat" style="font-size: 2rem; color: cornflowerblue;"></i>
    </a>
    <a href="/user/profile/{{auth()->user()->username}}">
        <img class="avatar-tiny" src="{{auth()->user()->avatar}}" />
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
