<form action="/user/signin" method="POST" class="form-inline">

    @csrf

    <div class="input-group">
        <input name="username" value="{{old('username')}}" type="text" class="form-control" placeholder="Username" >
        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <div class="input-group-append">
            <button class="btn btn-light" type="submit">Login</button>
        </div>
    </div>
</form>
