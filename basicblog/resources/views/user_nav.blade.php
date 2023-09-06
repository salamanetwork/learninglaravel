<!-- Right-aligned login form (Inline Form) -->
<div class="col-lg-5 mx-auto">
    <a class="btn btn-lg">
        <i class="btn bi bi-search" style="font-size: 2rem; color: cornflowerblue;"></i>
    </a>
    <a class="btn btn-lg">
        <i class="btn bi bi-chat" style="font-size: 2rem; color: cornflowerblue;"></i>
    </a>
    <a href="#">
        <img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />
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
