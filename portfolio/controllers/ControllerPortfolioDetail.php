<?php
    $rt=mysqli_query($con,"SELECT * FROM portfolio where id='$todo'");
    $tr = mysqli_fetch_array($rt);
    $porti_title = "$tr[porti_title]";
    $porti_detail = "$tr[porti_detail]";
    $porti_desc = "$tr[porti_desc]";
    $upadated_at = "$tr[upadated_at]";
    $ufile = "$tr[ufile]";
?>

