<x-guest_navbar>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark  mt-2">
        <div class="container-fluid">
            <div class="row col-lg-12 mt-2">
                <!-- Brand -->
                <div class="col-lg-2 align-content-lg-start">
                    <i class="bi bi-journal-code" style="font-size: 2rem; color: cornflowerblue;"></i>
                    <a class="navbar-brand" href="#">My Blog</a>
                </div>

                <!-- Left-aligned links -->
                <div class="col-lg-5 align-content-lg-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
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
                    </ul>
                </div>

                <!-- Right-aligned login form (Inline Form) -->
                <div class="col-lg-5 align-content-lg-end">
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Username">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <input type="password" class="form-control" placeholder="Password">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                            <div class="input-group-append">
                                <button class="btn btn-light" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>

</x-guest_navbar>
