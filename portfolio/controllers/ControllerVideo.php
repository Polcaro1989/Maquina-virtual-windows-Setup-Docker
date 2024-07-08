<?php
$q = "SELECT * FROM slider ORDER BY id DESC";
$result = mysqli_query($con, $q);
$active = true;

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $slide_title = $row['slide_title'];
    $slide_text = $row['slide_text'];
    $video_file = $row['video_file']; // Atualizado para corresponder ao nome da coluna

    $activeClass = $active ? 'active' : '';
    echo "
                    <div class='carousel-item $activeClass '>
                        <div class='embed-responsive embed-responsive-16by9 '>
                            <video class='embed-responsive-item' autoplay muted loop >
                                <source src='dashboard/uploads/slider/$video_file' type='video/mp4'>
                                Seu navegador não suporta a reprodução de vídeo.
                            </video>
                        </div>
                        <div class='carousel-caption'>
                            <h5 mt-4>$slide_title</h5>
                            <p>$slide_text</p>
                        </div>
                    </div>
                    ";

    $active = false;
}
