<?php
$rt = mysqli_query($con, "SELECT ufile, ux_file FROM logo ORDER BY id DESC LIMIT 2");
$tr = mysqli_fetch_array($rt);
$ufile = $tr['ufile'];
$ux_file = $tr['ux_file'];