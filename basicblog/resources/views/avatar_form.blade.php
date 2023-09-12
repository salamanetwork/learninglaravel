
<x-layout>

    @include('nav_guest')

    <div
        class="container-fluid justify-content-center py-md-5"
        style="max-width: 800px"
    >

    <h2>Manage Avatar</h2>
    <form method="POST" action="/user/avatar/submit" enctype="multipart/form-data">

        @csrf

        <div class="form-group mt-2">
            <input name="avatar" required type="file" class="form-control" id="avatar" placeholder="Choose an avatar file">

            @error('avatar')
                <p class="alert alert-danger small m-0 shadow-sm">
                    {{$message}}
                </p>
            @enderror

        </div>

        <div class="form-group mt-3 text-center">
            <button type="submit" class="btn btn-dark btn-lg">Save Changes</button>
        </div>
    </form>
    </div>
</x-layout>


