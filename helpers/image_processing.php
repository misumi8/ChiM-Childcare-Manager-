<?php
function resizeImage($imageData, $maxWidth, $maxHeight) {
    // Create an image from the string data
    $src = imagecreatefromstring($imageData);
    if ($src === false) {
        return false;
    }

    // Get the original dimensions
    $width = imagesx($src);
    $height = imagesy($src);

    // Calculate the scaling ratio
    $ratio = min($maxWidth / $width, $maxHeight / $height);

    // Calculate the new dimensions
    $newWidth = (int)($width * $ratio);
    $newHeight = (int)($height * $ratio);

    // Create a new image with the new dimensions
    $dst = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    // Capture the output
    ob_start();
    imagejpeg($dst);
    $resizedImageData = ob_get_clean();

    // Free the memory
    imagedestroy($src);
    imagedestroy($dst);

    return $resizedImageData;
}
?>