<?php
$rt = mysqli_query($con, "SELECT  xfile FROM logo ORDER BY id DESC LIMIT 1");
$tr = mysqli_fetch_array($rt);
$xfile = $tr['xfile'];