
<x-layout>

    @include('nav_guest')

    <div
        class="container-fluid justify-content-center py-md-5"
        style="max-width: 800px"
    >

    <h2>Sign Up</h2>
    <form method="POST" action="/user/signup">

        @csrf

        <div class="form-group mt-2">
            <label for="username">Username</label>
            <input name="username" value="{{old('username')}}" type="text" class="form-control" id="username" placeholder="Choose a username">

            @error('username')
                <p class="alert alert-danger small m-0 shadow-sm">
                    {{$message}}
                </p>
            @enderror

        </div>
        <div class="form-group mt-2">
            <label for="email">Email</label>
            <input name="email" value="{{old('email')}}" type="email" class="form-control" id="email" placeholder="Enter your email">

            @error('email')
                <p class="alert alert-danger small m-0 shadow-sm">
                    {{$message}}
                </p>
            @enderror

        </div>
        <div class="form-group mt-2">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password">


            @error('password')
                <p class="alert alert-danger small m-0 shadow-sm">
                    {{$message}}
                </p>
            @enderror

        </div>
        <div class="form-group mt-2">
            <label for="confirmPassword">Confirm Password</label>
            <input name="password_confirmation" type="password" class="form-control" id="confirmPassword" placeholder="Confirm your password">


            @error('password_confirmation')
                <p class="alert alert-danger small m-0 shadow-sm">
                    {{$message}}
                </p>
            @enderror

        </div>
        <div class="form-group mt-3 text-center">
            <button type="submit" class="btn btn-dark btn-lg">Signup</button>
        </div>
    </form>
    </div>
</x-layout>


