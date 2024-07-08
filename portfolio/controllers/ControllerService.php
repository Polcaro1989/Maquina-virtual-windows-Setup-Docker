<?php
$qs = "SELECT id, service_title, service_desc, service_link, ufile FROM service ORDER BY id DESC LIMIT 6";
$r1 = mysqli_query($con, $qs);

while ($row = mysqli_fetch_array($r1)) {
    $id = $row['id'];
    $service_title = $row['service_title'];
    $service_desc = $row['service_desc'];
    $service_link = $row['service_link'];
    $ufile = $row['ufile'];

    // Adicione esta seção de depuração antes da imagem
    // var_dump($ufile);

    print "
    <div class='container px-sm-3'>
    <div class='col-xxl-6 mb-4 px-3'>
        <div class='card'>
            <div class='row g-0'>
                <div class='col-md-4'>
                <img class='card-img-top img-fluid' src='dashboard/uploads/services/$ufile' alt=''>
                </div>
                <div class='col-md-8'>
                    <div class='card-body'>
                        <h3 class='my-3 text-black'>$service_title</h3>
                        <p class='text-black'>$service_desc</p>
                    </div>
                </div>
            </div>
            <div class='card-footer'>
                <div class='row g-0 justify-content-between'>
                    <div class='col-auto'>
                        <p class='card-text'><small class='text-muted'></small></p>
                    </div>
                    <div class='col-auto '>
                        <a class='service-btn mt-3 text-black' href='servicedetail.php?id=$id'>Saiba mais</a>
                        <a class='service-btn mt-3 text-black' href='$service_link?id=$id'>Ver site</a>
                    </div>
                </div>
            </div>
        </div><!-- end card -->
    </div>
</div>

    ";
}
?>
