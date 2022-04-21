<ul class="mb-5">
    @foreach ($messages as $key=>$message)
        @if($message->sender_id == Auth::user()->id)
            <li class="clearfix">
                <div class="message-data text-right">
                    <span class="message-data-time time-sender">{{($message->created_at)->format('h:i:s a, F, Y')}}</span>
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                </div>
                <div class="message other-message float-right sender-message">{{$message->message}}</div>
            </li>
        @else
            <li class="clearfix">
                <div class="message-data receiver-side">
                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="avatar">
                    <span class="message-data-time time-receiver">{{($message->created_at)->format('h:i:s a, F, Y')}}</span>
                </div>
                <div class="message my-message receiver-message">{{$message->message}}</div>                                    
            </li>
        @endif      
    @endforeach
</ul>