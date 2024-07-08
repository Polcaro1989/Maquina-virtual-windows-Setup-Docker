<?php 
$q = "SELECT * FROM siteconfig ORDER BY id DESC LIMIT 5";
$result = mysqli_query($con, $q);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $site_footer = $row['site_footer'];
    $site_keyword = $row['site_keyword'];
    $follow_text = $row['follow_text'];
    $site_desc = $row['site_desc'];
    $site_url = $row['site_url'];
    $site_about = $row['site_about'];
}

mysqli_free_result($result);
