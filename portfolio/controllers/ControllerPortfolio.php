
<?php include "./includes/z_db.php";

$q = "SELECT * FROM  portfolio ORDER BY id DESC LIMIT 3";
$r123 = mysqli_query($con, $q);
while ($ro = mysqli_fetch_array($r123)) {

    $id = "$ro[id]";
    $porti_title = "$ro[porti_title]";
    $porti_desc = "$ro[porti_desc]";
    $portfolio_link = $ro['portfolio_link'];
    $ufile = "$ro[ufile]";

    echo "
    <div class='col-12 col-sm-6 col-lg-4 portfolio-item' data-groups='['marketing','development']'>
    <div class='card mb-5'>
        <img class='card-img-top img-fluid' src='dashboard/uploads/portfolio/$ufile' alt='' alt='Card image cap'>
        <div class='card-body'>
            <h4 class='card-title mb-2'>$porti_title</h4>
            <p class='card-text'>$porti_desc</p>
            <div class='text-right'>
            <a class='service-btn mt-3 text-black' href='portdetail.php?id=$id'>Saiba mais</a>
            <a class='service-btn mt-3 text-black' href='$portfolio_link?id=$id'>Ver site</a>

            </div>
        </div>
    </div>
    </div>
    
    ";

}
?>




