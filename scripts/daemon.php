<?php
// Make sure it's run from CLI
if(php_sapi_name() != 'cli' && !empty($_SERVER['REMOTE_ADDR'])) exit("Access Denied.");	

// Please configure this
//$url = "http://".$_SERVER['SERVER_ADDR']."/dissemination/";

//fclose(fopen($url."index.php/daemon/message_routine/", "r"));
//fclose(fopen($url."inbox/process_sms/", "r"));
fclose(fopen("http://41.93.45.109/dissemination/inbox/process_sms/", "r"));
?>
