<?php
setcookie("cc_usrname",$row['username'],time()-3600); // no se tan cookie
header("Location: index.php"); // chuyen trang 

?>