@foreach ($users as $user)
    <li class="clearfix" onclick="people_list({{$user->id}})">
        <img src="{{ $user->file == null ? asset('image/unknown/user.png') : asset($user->file) }}" alt="avatar">
        <div class="about">
            <div class="name">{{$user->name}}</div>
            <div class="status"><i class="fa fa-circle {{ $user->is_active == 1 ? "online" : "offline" }}"></i>{{ $user->is_active == 1 ? " online" :  date(' h:i A', strtotime($user->last_login)) }}</div>
        </div>
    </li>
@endforeach
