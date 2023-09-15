<x-layout>

    <x-feeds>
        <div class="container-fluid">
            <div class="row">
                <!-- Left Column (larger) -->
                <div class="col-md-12 mt-5 mb-5">
                    <h1 class="text-center font-weight-bolder">Welcome, <strong><span style="color: darkred">{{ auth()->user()->username }}</span></strong> to my Blog!</h1>
                    <hr />

                    @unless($posts->isEmpty())

                    <div class="list-group">
                        @foreach($posts as $post)
                            <a href="/post/{{$post->id}}" class="list-group-item list-group-item-action">
                                <img class="avatar-tiny" src="{{$post->user->avatar}}" />
                                <strong>{{$post->title}}</strong> on {{date( 'd-m-Y h:m ', strtotime($post->created_at))}}
                                </a>
                        @endforeach
                    </div>

                    @else



                    <h5 class="mt-3">
                        <p class="text-center">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim totam deserunt earum magnam, quibusdam fugit cumque odio quis ad voluptas dolore tenetur harum tempora nostrum iste ratione consequuntur sapiente iure.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum fugiat iusto, et deserunt dolorem officia saepe, beatae fugit dignissimos ducimus fuga inventore dicta unde corrupti. Modi corrupti impedit expedita nesciunt?
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam qui, distinctio quo velit obcaecati iusto dolorem, ex eos explicabo at ipsam voluptatum voluptas deleniti, omnis ut maxime a laudantium error!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil, rem. Officiis totam eius voluptate animi rerum similique possimus quibusdam magnam commodi culpa doloribus facere fuga consectetur, inventore odio dicta illum.
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic autem ducimus ratione accusamus repellat. Sunt autem quia dolores facere officiis eos, adipisci maxime, pariatur hic quidem obcaecati, minima expedita? Unde?
                        </p>
                    </h5>

                    @endunless



                    <hr />

            </div>
        </div>
    </x-feeds>

</x-layout>
