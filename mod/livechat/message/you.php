                <!-- เริ่มคนอื่น -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left" style="text-transform:capitalize "><?=$arr[chat][comment_from]?></span>
                    <span class="direct-chat-timestamp pull-right"> <?=$date = date('Y-m-d ',  $arr[chat][post_date]);?>&nbsp;<font color="#000000"><?=$date = date('h:i:s',  $arr[chat][post_date]);?></font></span>
                  </div>