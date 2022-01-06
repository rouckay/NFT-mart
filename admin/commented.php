<?php


// resize Image to 361 X 230
// $maxDim = 800;
// $tem_name = $_FILES['image']['tmp_name'];

// list($width, $height, $type, $attr) = getimagesize($tem_name);
// if ($width > $maxDim || $height > $maxDim) {
//     $target_filename = $tem_name;
//     $retio = $width / $height;
//     if ($retio > 1) {
//         $new_width = $maxDim;
//         $new_height = $maxDim / $retio;
//     } else {
//         $new_width = $maxDim * $retio;
//         $new_height = $maxDim;
//     }
//     $src = imagecreatefromstring(file_get_contents($tem_name));
//     $dst = imagecreatetruecolor($new_width, $new_height);
//     imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
//     imagedestroy($src);
//     imagepng($dst, $target_filename);
//     imagedestroy($dst);
// }


if ($pro_add) {
    $maxDimW = 100;
    $maxDimH = 50;
    // list($width, $height, $type, $attr) = getimagesize($_FILES['image']['tmp_name']);
    $target_filename = $_FILES['photo']['tmp_name'];
    $fn = $_FILES['photo']['tmp_name'];
    $size = getimagesize($fn);
    $ratio = $size[0] / $size[1];
    if ($ratio > 1) {
        $width = $maxDimW;
        $height = $maxDimH / $ratio;
    } else {
        $width = $maxDimW * $ratio;
        $height = $maxDimH;
    }
    $src = imagecreatefromstring(file_get_contents($fn));
    $dst = imagecreatetruecolor($width, $height);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);

    imagejpeg($dst, $target_filename);
}
