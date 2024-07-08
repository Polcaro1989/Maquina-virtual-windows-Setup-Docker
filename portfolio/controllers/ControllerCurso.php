<?php
$qs = "SELECT * FROM cursos ORDER BY id DESC LIMIT 3";

$r1 = mysqli_query($con, $qs);

while ($rod = mysqli_fetch_array($r1)) {
    $id = $rod['id'];
    $curso_title = $rod['curso_title'];
    $curso_desc = $rod['curso_desc'];
    $curso_detail = $rod['curso_detail'];
    $ufile = $rod['ufile'];

    echo "
    <div class='col-xxl-6'>
    <div class='card'>
        <div class='row g-0'>
            <div class='col-md-4'>
            <img class='rounded-start img-fluid h-100 object-fit-cover' src='dashboard/uploads/cursos/$ufile' alt='<?php echo $ufile; ?>'>

            </div>
            <div class='col-md-8'>
                <div class='card-body'>
                    <h2 class='card-title mb-2'>$curso_title</h2>
                    <h4 class='card-title mb-2'>$curso_desc</h4>
                </div>
                <div class='card-footer'>
                <h5 class='card-title mb-2'>$curso_detail</he>
                <div class='text-right'>
                <a class='service-btn mt-3 text-black' href='cursodetail.php?id=$id'>Saiba mais</a>
                </div>
            </div>
        </div>
    
    </div><!-- end card -->
</div>
<br>
";
}
