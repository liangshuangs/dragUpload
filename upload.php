<?php


//5 minutes execution time
@set_time_limit(5 * 60);

// Uncomment this one to fake upload time
// usleep(5000);

// Settings
$targetDir = 'temp';
$cleanupTargetDir = true; // Remove old files
$maxFileAge = 5 * 3600; // Temp file age in seconds


// Create target dir
if (!file_exists($targetDir)) {
    @mkdir($targetDir);
}

// Get a file name
$filename = time().substr($_FILES['uploadFile']['name'], strrpos($_FILES['uploadFile']['name'],'.'));

$filePath = $targetDir . DIRECTORY_SEPARATOR . $filename;
if ($_FILES["uploadFile"]["error"] > 0)
{
    echo "Return Code: " . $_FILES["uploadFile"]["error"] . "<br />";
}
else
{
    move_uploaded_file($_FILES["uploadFile"]["tmp_name"],
        $filePath);
}