<?php

$qs = "SELECT * FROM sobre ORDER BY id DESC LIMIT 6";

$result = $con->query($qs);

while ($row = $result->fetch_assoc()) {
  $id = $row['id'];

  $sobre_stitle = isset($row['sobre_stitle']) ? $row['sobre_stitle'] : '';
  $sobre_stext = isset($row['sobre_stext']) ? $row['sobre_stext'] : '';
  $ufile = $row['ufile'];

  echo "
  <div class='col-xl-12'>
  
  <div class='card text-center'>
    <div class='card-body rounded'>
      <div class='row g-0 bg-light position-relative'>
        <div class='col-md-5'>
        <img src='dashboard/uploads/sobre/$ufile' alt='$ufile' class='rounded-start img-fluid' data-aos='fade-right' data-aos-duration='1500' alt='...'>
        </div>
        <div class='col-md-7 p-4'>
        <h1 class=' mp-3 mb-2 ml-2 text-black'>$sobre_stitle</h1>
          <h6 class='mb-3 text-black'>$sobre_stext</h6>
        </div>
      </div>
    </div>
  </div>
</div>

";
}
?>
