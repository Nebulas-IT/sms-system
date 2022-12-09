<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
    <div class="messaging">
                <div class="inbox_msg">
                    <div class="mesgs">
                        <div class="msg_history">
                           
                        </div>
                        <form action="" method="post">
                            <div class="type_msg">
                                <div class="input_msg_write">
                                    <input type="hidden" name="" id="getMobile" value="+8801924198048">
                                    <input type="text" class="write_msg" name="message" placeholder="Type a message"/>
                                    <button class="msg_send_btn" type="submit" name="submit" id="btnSave" value="submit"><i class="fa fa-paper-plane-o"
                                                                                                aria-hidden="true"></i> Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
    <script src="assets/js/jquery/3.1.0/jquery.min.js"></script>
   <script type="text/javascript">
    $(document).ready(function () {
        /*setInterval(function () {
            $('#getData').load('chatbox_without_refresh.php')
        },2000);*/


        $('#btnSave').click(function(event){
            var url = 'chatbox_without_refresh.php';
            event.preventDefault();
            var number = $('#getMobile').val();
            alert('hi');
            $.ajax({
                type: 'ajax',
                method:'post',
                url: url,
                data: {
                    number: number
                },
                //async: false,
                dataType: 'html',
                success: function(response){
                    //alert(response);
                    $('.msg_history').html(response);
                }
            });
        });
    });
    
</script>

</body>
</html>