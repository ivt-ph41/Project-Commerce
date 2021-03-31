<div>
    <div class="messaging " wire:poll.5000ms = 'render'>
        <div class="inbox_msg">
          <div class="inbox_people">
            <div class="headind_srch">
              <div class="recent_heading">
                <h4>Recent</h4>
              </div>
              <div class="srch_bar">
                <div class="stylish-input-group">
                  <input type="text" class="search-bar"  placeholder="Search" >
                  </div>
              </div>
            </div>
            <div class="inbox_chat scroll">
              @foreach ($users as $user)
              <?php if($select_user == $user->id){
                $active = 'active_chat';
                }else{
                    $active = '';
                }
                ?>
              <div class="chat_list {{$active}} ">
                <div class="chat_people">
                  <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                  <div class="chat_ib">
                    <label for="{{$user->id}}">{{$user->name}}</label><br>
                    <p>
                        @if ($messages_notifi != Null && $user->id == $messages_notifi->user_id)
                        <p style="color:rgb(44, 71, 226)">{{$messages_notifi->message}}</p>
                        @endif
                    </p>
                  </div>
                </div>
              </div>
                <input style="display:none"  type="radio" wire:model = 'select_user' value="{{$user->id}}" id="{{$user->id}}" name="">
              @endforeach
            </div>
          </div>
          <div class="mesgs" >
            <div class="msg_history" id="data">
              @foreach ($messages as $message)
                @if ($message->user_id == Auth::user()->id)
                <div class="outgoing_msg">
                    <div class="sent_msg">
                      @if ($message->message != NUll)
                        <p>{{$message->message}}</p>
                      @endif
                      @if ($message->image != NULL)
                        <img src="{{asset('storage/'.$message->image)}}" alt="" >
                      @endif
                      <span class="time_date">{{$message->created_at}}</span> </div>
                  </div>
                @else
                <div class="incoming_msg">
                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                    <div class="received_msg">
                    <div class="received_withd_msg">
                    @if ($message->message != NUll)
                        <p>{{$message->message}}</p>
                      @endif
                      @if ($message->image != NULL)
                        <img src="{{asset('storage/'.$message->image)}}" alt="" >
                      @endif
                        <span class="time_date">{{$message->created_at}}</span> </div>
                    </div>
                </div>
                @endif
              @endforeach
            </div>
            <div class="type_msg">
              <div class="input_msg_write">
                <form action="" wire:submit.prevent='Send_Mess' method="get">
                    <input type="text" class="write_msg" wire:model = 'message' placeholder="Type a message" />
                    <span><input class="form-control" wire:model = 'image' type="file" name=""></span>
                <button onclick="scroll_down()" class="msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
<script>
    function scroll_down() {
        window.setInterval(function() {
        var elem = document.getElementById('data');
         elem.scrollTop = elem.scrollHeight;
        }, 2000);
    }
    $(document).ready(function(){
    var item =$("input:radio:first").click();
    console.log(item);

    });
</script>

