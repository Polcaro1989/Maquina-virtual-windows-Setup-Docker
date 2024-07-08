<?php 
$rr = mysqli_query($con, "SELECT * FROM static");
if ($rr) {
    $r = mysqli_fetch_row($rr);
    $stitle = $r[1];
    $stext = $r[2];
    $ufile = $r[3];
    
} else {
    // Lidere com erros na consulta SQL
}
//var_dump($r);
