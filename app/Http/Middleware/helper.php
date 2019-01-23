<?php

    function notificationMsg($type, $message){
      \Session::put($type, $message);
    }

 ?>
