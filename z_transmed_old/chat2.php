<?php require_once('../includes/initialize.php');
  require_once(LIB_PATH.DS.'ChatFriend.php');
    ?>
<?php  $session->confirmation_protected_page(); ?>
<?php if(!User::is_admin()){ redirect_to($Nav->path_admin.'index.php');}

?>


<?php include(HEADER_PUBLIC) ;?>
<?php include_once(NAV_PUBLIC) ?>

<?php checking(false);?>

<?php

if(isset($_GET['delid'])){
    $del_chat=ChatFriend::find_by_id($_GET['delid']);
    $del_chat->delete();

    if($del_chat->delete()){
        $session->message($del_chat->username." comment successfully deleted") ;
        $session->ok(true);
        redirect_to("chat2.php");
    } else {
        $session->message($del_chat->username." deletion failed ") ;
        redirect_to("chat2.php");
    }
}

if(request_is_post()){

}

if(isset($_POST['submit_new'])=="Send it"){
    $chatter=new ChatFriend();
    $chatter->user_id=$session->user_id;
    $chatter->message=trim($_POST['message']);
    $chatter->date=strftime("%Y-%m-%d %H:%M:%S",time());
    if(isset($_FILES['chat_image'])){
        $chatter->set_files($_FILES['chat_image']) ;
        $chatter->upload_photo();
    }


   if( $chatter->save()){
       echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'>";
//       unset($_POST);
       redirect_to(ChatFriend::$page_public);
   }


}if (isset($_POST['submit_edit'])=="Update it"){
    $chatter=ChatFriend::find_by_id($_POST['id']);
    $chatter->message=trim($_POST['message']);
    $chatter->set_files($_FILES['chat_image']) ;
    $chatter->upload_photo();

    $chatter->save();
    redirect_to(ChatFriend::$page_public);

} else {
    if(request_is_get()){
        if(isset($_GET['id'])){
            $id=$_GET['id'];

        }



    }

}

?>

<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Chat Box</title>-->
<!--</head>-->
<!--<body>-->

<?php  echo isset($valid)? $valid->form_errors():"" ?>
<?php  echo isset($valid)? $valid->form_warnings():"" ?>

<?php //echo output_message($message); ?>

<?php $chats=ChatFriend::get_chat();
?>




<div class="wrapper wrapper-content animated fadeInRight">
    
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox chat-view">



            <?php
            echo ChatFriend::img_viewer();

            echo ChatFriend::chat_title()?>


                <div class="ibox-content">

                    <div class="row">

                        
                     <?php echo ChatFriend::chat_message_wrapper() ?>

                     <?php echo ChatFriend::chat_users_wrappers()?>

                    </div>


                    <?php

                    if(isset($_GET['id'])){
                        echo ChatFriend::chat_input_form($_GET['id']);
                    } else {
                        echo ChatFriend::chat_input_form();

                    }
                    ?>


                </div>

            </div>
        </div>

    </div>


</div>

    <script>
        $(function() {
            $( document ).tooltip();
        });
    </script>



<?php
function small_chat_wrapper(){
$output="";

    $output .= "<div class=\"small-chat-box fadeInRight animated\">";
    $output .= "    <div class=\"heading\" draggable=\"true\">
        <small class=\"chat-date pull-right\">
            02.19.2015
        </small>
        Small chat
    </div>";

    $output .= "<div class=\"content\">";

    $output .= "MESSAGES HERE";
    $output .= "</div>";


    $output .= " <div class=\"form-chat\">
        <div class=\"input-group input-group-sm\">
            <input type=\"text\" class=\"form-control\">
            <span class=\"input-group-btn\"> <button
                    class=\"btn btn-primary\" type=\"button\">Send
            </button> </span>
        </div>
    </div>";

    $output .= "</div>";


    $output .= "

<div id=\"small-chat\">

    <span class=\"badge badge-warning pull-right\">5</span>
    <a class=\"open-small-chat\">
        <i class=\"fa fa-comments\"></i>

    </a>
</div>";


    return $output;

}

function small_chat($left,$author,$time,$message){
    $output = "";
//    $output.="<div class=\"content\">";

    $output .= "<div class=\"left\">
            <div class=\"author-name\">
                Monica Jackson <small class=\"chat-date\">
                    10:02 am
                </small>
            </div>
            <div class=\"chat-message active\">
                Lorem Ipsum is simply dummy text input.
            </div>
";
    $output .= " <div class=\"right\">
            <div class=\"author-name\">
                Mick Smith
                <small class=\"chat-date\">
                    11:24 am
                </small>
            </div>
            <div class=\"chat-message\">
                Lorem Ipsum is simpl.
            </div>
        </div>";

//$output.="</div>";

    return $output;

}



?>


<div class="small-chat-box fadeInRight animated">

    <div class="heading" draggable="true">
        <small class="chat-date pull-right">
            02.19.2015
        </small>
        Small chat
    </div>

    <div class="content">

        <div class="left">
            <div class="author-name">
                Monica Jackson <small class="chat-date">
                    10:02 am
                </small>
            </div>
            <div class="chat-message active">
                Lorem Ipsum is simply dummy text input.
            </div>

        </div>
        <div class="right">
            <div class="author-name">
                Mick Smith
                <small class="chat-date">
                    11:24 am
                </small>
            </div>
            <div class="chat-message">
                Lorem Ipsum is simpl.
            </div>
        </div>
        <div class="left">
            <div class="author-name">
                Alice Novak
                <small class="chat-date">
                    08:45 pm
                </small>
            </div>
            <div class="chat-message active">
                Check this stock char.
            </div>
        </div>
        <div class="right">
            <div class="author-name">
                Anna Lamson
                <small class="chat-date">
                    11:24 am
                </small>
            </div>
            <div class="chat-message">
                The standard chunk of Lorem Ipsum
            </div>
        </div>
        <div class="left">
            <div class="author-name">
                Mick Lane
                <small class="chat-date">
                    08:45 pm
                </small>
            </div>
            <div class="chat-message active">
                I belive that. Lorem Ipsum is simply dummy text.
            </div>
        </div>


    </div>
    <div class="form-chat">
        <div class="input-group input-group-sm">
            <input type="text" class="form-control">
            <span class="input-group-btn"> <button
                    class="btn btn-primary" type="button">Send
            </button> </span>
        </div>
    </div>

</div>
<div id="small-chat">

    <span class="badge badge-warning pull-right">5</span>
    <a class="open-small-chat">
        <i class="fa fa-comments"></i>

    </a>
</div>
<!---->
<!--</body>-->
<!--</html>-->

<?php include(FOOTER_PUBLIC) ;?>