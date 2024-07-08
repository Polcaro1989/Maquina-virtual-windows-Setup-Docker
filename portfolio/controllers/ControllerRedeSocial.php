<?php
$q = "SELECT * FROM  social ORDER BY id DESC LIMIT 5";
$r123 = mysqli_query($con, $q);

while ($ro = mysqli_fetch_array($r123)) {

    $id = "$ro[id]";
    $fa = "$ro[fa]";
    $social_link = "$ro[social_link]";

    print "
<li class='nav-item social'>
<a href='$social_link' class='nav-link'><i class='fab $fa'></i></a>
</li>
";
}
