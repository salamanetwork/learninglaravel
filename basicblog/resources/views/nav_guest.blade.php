<x-guest_navbar>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="row col-lg-12">
                <!-- Brand -->
                <div class="col-lg-2 align-content-lg-start">
                    <i class="bi bi-journal-code" style="font-size: 2rem; color: cornflowerblue;"></i>
                    <a class="navbar-brand" href="#">My Blog</a>
                </div>

                <!-- Left-aligned links -->
                <div class="col-lg-5 align-content-lg-center">
                    {{-- <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/posts') }}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/archive') }}">Archive</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/help') }}">Help</a>
                        </li>
                    </ul> --}}
                </div>

                <!-- Right-aligned login form (Inline Form) -->
                <div class="col-lg-5 align-content-lg-end">

                    @auth
                        @include('user_nav')
                    @else

                        @include('signin_form')

                    @endauth

                </div>
            </div>
        </div>
    </nav>

    @include('flash')

</x-guest_navbar>
