<?php
                $q = "SELECT * FROM  testimony ORDER BY id DESC LIMIT 6";
                $r123 = mysqli_query($con, $q);
                while ($ro = mysqli_fetch_array($r123)) {
                    $name = "$ro[name]";
                    $position = "$ro[position]";
                    $message = "$ro[message]";
                    $ufile = "$ro[ufile]";

                    print "

<div class='single-review p-5'>
<!-- Review Content -->
<div class='review-content'>
    <!-- Review Text -->
    <div class='review-text'>
        <p>$message</p>
    </div>
    <!-- Quotation Icon -->

</div>
<!-- Reviewer -->
<div class='reviewer media mt-3'>
    <!-- Reviewer Thumb -->
    <div class='reviewer-thumb'>
        <img class='avatar-lg radius-100' src='./dashboard/uploads/testimony/$ufile' alt='img'>
    </div>
    <!-- Reviewer Media -->
    <div class='reviewer-meta media-body align-self-center ml-4'>
        <h5 class='reviewer-name color-primary mb-2'>$name</h5>
        <h6 class='text-secondary fw-6'>$position</h6>
    </div>
</div>
</div>


";
                }
                ?>