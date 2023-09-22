<div class="list-group">
    @foreach($following as $follow)
        <a href="/user/profile/{{$follow->userBeingFollowed->username}}" class="list-group-item list-group-item-action">
            <img class="avatar-tiny" src="{{$follow->userBeingFollowed->avatar}}" />
            {{$follow->userBeingFollowed->username}}
            </a>
    @endforeach
</div>
