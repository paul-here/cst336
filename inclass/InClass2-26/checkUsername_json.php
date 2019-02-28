<?php

$usernames = array("eeny", "meeny", "miny", "maria", "john");

$username = array();

if(in_array(strtolower($_GET['username']), $usernames)){
    
    $username['available'] = false;
} else {
    $username['available'] = true;
}

echo json_encode($username); // and now we can access it with json from our html

?>