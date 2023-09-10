@auth
    <x-layout>

        @include('nav_user')

        <div
            class="container-fluid justify-content-center py-md-5"
            style="max-width: 800px"
        >
            <form action="/post/{{$post->id}}/update" method="POST">

                @csrf
                @method("PUT")

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
                        value="{{old('title', $post->title)}}"
                        id="post-title"
                        type="text"
                        class="form-control form-control-title form-control-lg"
                        style="max-width: 800px"
                    />
                    @error('title')
                        <p class="m-0 small alert alert-danger shadow-sm">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label
                        for="post-body"
                        class="text-muted mb-1 mt-2"
                    >
                        <h2>Body Content</h2>
                    </label>
                    <textarea
                        name="content"
                        id="post-body"
                        class="body-content form-control"
                        style="max-width: 800px"
                        rows="15"
                    >
                    {{old('content', $post->content)}}
                    </textarea>
                    @error('content')
                        <p class="m-0 small alert alert-danger shadow-sm">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="form-group  mt-5 text-center">
                    <button class="btn btn-lg btn-primary">
                        Save Changes
                    </button>
                    <button type="reset" class="btn btn-lg btn-secondary">
                        Reset Changes
                    </button>
                    <a class="btn btn-lg btn-danger" href="/post/{{$post->id}}">
                        Cancel Changes
                    </a>
                </div>
            </form>
        </div>
    </x-layout>

@else
    @include('signup_form')
@endauth

