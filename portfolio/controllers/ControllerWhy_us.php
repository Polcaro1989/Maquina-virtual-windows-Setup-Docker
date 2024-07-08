<?php
$q = "SELECT * FROM  why_us ORDER BY id DESC LIMIT 3";


$r123 = mysqli_query($con, $q);

while ($ro = mysqli_fetch_array($r123)) {
    $id = $ro['id'];
    $title = $ro['title'];
    $detail = $ro['detail'];
    $ufile = $ro['ufile'];


    print "
<div class='col-12 col-md-6 col-lg-4 res-margin '>
<div class='reviewer-thumb text-center mb-4'>
        <img class=' avatar-lg radius-100'  src='dashboard/uploads/why/$ufile' alt='$ufile'>
    </div>
<!-- Single Promo -->
<div class='single-promo color-4 bg-hover hover-bottom text-center p-5 bg-white'>
    <h3 class='mb-3 text-dark'>$title</h3>
    <p class='text-dark'>$detail</p>
</div>
</div>
";
}
?>