<?php
$rt = mysqli_query($con, "SELECT * FROM cursos where id='$todo'");
$tr = mysqli_fetch_array($rt);
$curso_title = "$tr[curso_title]";
$curso_detail = "$tr[curso_detail]";
$curso_desc = "$tr[curso_desc]";
$upadated_at = "$tr[upadated_at]";
$ufile = "$tr[ufile]";
?>