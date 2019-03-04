<div class="card pub_image">

    <div class="card-header">

        @if($user->image_path)
        <div class="container-avatar">
            <img src="{{ route('user.avatar',['filename'=>$user->image_path]) }}" class="avatar" />
        </div>
        @endif

        <div class="data-user">
            <a href="{{route('profile',['id' =>$user->id])}}">
                {{ $user->name.' '.$user->surname .' '.$user->surname2}}
            </a>
        </div>

    </div>

   

</div>