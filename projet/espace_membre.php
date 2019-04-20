<?php

require("auth/EtreAuthentifie.php");


if($idm->getRole() == 'admin'){
    include("admin.php");
}else{
    include("user.php");
}

?>