@foreach ($messages as $message)
    <li class="clearfix">
        @if ($message->sender == $message->user_id)
            <div class="message-data text-right">
                <span class="message-data-time">{{$message->msg_time}}</span>
                <img src="{{ $message->profile == null ? asset('image/unknown/user.png') : $message->profile}}" alt="avatar">
            </div>
            <div class="message other-message float-right">{{$message->text}}</div>
        @else
            <div class="message-data">
                <span class="message-data-time">{{$message->msg_time}}</span>
            </div>
            <div class="message my-message">{{$message->text}}</div>
        @endif
    </li>
@endforeach
