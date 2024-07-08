<?php
$rt = mysqli_query($con, "SELECT * FROM service where id='$todo'");
$tr = mysqli_fetch_array($rt);
$service_title = "$tr[service_title]";
$service_detail = "$tr[service_detail]";
$upadated_at = "$tr[upadated_at]";
$ufile = "$tr[ufile]";
?>