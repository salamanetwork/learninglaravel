@auth
    @include('nav_user')

    <x-layout>

        <div
            class="container-fluid justify-content-center py-md-5"
            style="max-width: 800px"
        >
            <form action="/post/submit" method="POST">
                @csrf

                <div class="form-group">
                    <label
                        for="post-title"
                        class="text-muted mb-1 mt-2"
                    >
                    <h2>Title</h2>
                    </label>
                    <input
                        required
                        autocomplete="false"
                        name="title"
                        id="post-title"
                        type="text"
                        class="form-control form-control-title form-control-lg"
                        style="max-width: 800px"
                    />
                </div>

                <div class="form-group">
                    <label
                        for="post-body"
                        class="text-muted mb-1 mt-2"
                    >
                        <h2>Body Content</h2>
                    </label>
                    <textarea
                        name="title"
                        id="post-body"
                        class="body-content form-control"
                        style="max-width: 800px"
                        rows="15"
                    >

                    </textarea>
                </div>

                <div class="form-group  mt-5 text-center">
                    <button class="btn btn-lg btn-primary">
                        Submit New Post
                    </button>
                </div>
            </form>
        </div>
    </x-layout>

@else
    @include('home_guest')
@endauth

