<!-- database-connect :: start -->
<?php
    $link = @mysqli_connect("localhost","mykec","kongu@2040","mykec") or die("ERROR:Unable to connect".mysqli_connect_error());
?>
<!-- database-connect :: end -->