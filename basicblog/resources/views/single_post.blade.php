@auth
    <x-layout>

        @include('nav_user')



        <div
            class="container-fluid justify-content-center py-md-5"
            style="max-width: 1000px"
        >
            <div class="container py-md-5 container--narrow">
                <div class="d-flex justify-content-between">
                <h2>{{$post->title}}</h2>
                <span class="pt-2">
                    <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil-square" style="font-size: 1rem;"></i></a>
                    <form class="delete-post-form d-inline" action="#" method="POST">
                    <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="bi bi-trash"></i></button>
                    </form>
                </span>
                </div>

                <p class="text-muted small mb-4">
                    <a href="#">
                        <img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" />
                    </a>
                    Posted by
                    <a href="#">
                        <strong>{{$post->user->username}}</strong>
                    </a>
                    on
                    <strong>
                        {{date( 'd-m-Y h:m ', strtotime($post->created_at))}}
                    </strong>
                </p>

                <div class="body-content">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </x-layout>

@else
    @include('home_guest')
@endauth
