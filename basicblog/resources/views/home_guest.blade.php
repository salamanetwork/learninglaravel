<x-layout>

    @include('nav_guest')

    <div class="container-fluid">
        <div class="row">
            @auth

                @include('home_user')
            @else

            <!-- Left Column (larger) -->
            <div class="col-md-10 mt-5 mb-5">
                <h1 class="font-weight-bolder">Welcome to my Blog!</h1>
                <hr />
                <h5 class="mt-3">
                    <p class="text-justify">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla ligula eu urna fermentum, nec
                        feugiat ipsum vehicula. Donec auctor felis non nibh condimentum, non bibendum orci pharetra.
                    </p>
                </h5>

                <hr />

                <div>
                    <h5 class="text-left text-danger font-weight-bolder mt-5">
                        Please, Signin or Signup.
                    </h5>
                </div>
            </div>


            <!-- Right Column (smaller) -->
            <div class="col-md-2  mt-2" style="background-color: #a1c2ab">
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



        </div>
    </div>

            @endauth


</x-layout>
