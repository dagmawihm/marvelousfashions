<?php
function imagemanipulator($location, $filename, $extention)
{
    $image = "";
    switch ($extention) {
        case '.jpg':
        case '.jpeg':
        case 'jpg':
        case 'jpeg':
            $image = imagecreatefromjpeg($location);
            break;
        case '.png':
            // Check if the PNG image is paletted
            $tempImage = imagecreatefrompng($location);

            // Check if the PNG image is paletted
            $paletted = imageistruecolor($tempImage);

            if (!$paletted) {
                // Convert paletted PNG to truecolor
                $image = imagecreatetruecolor(imagesx($tempImage), imagesy($tempImage));
                imagecopy($image, $tempImage, 0, 0, 0, 0, imagesx($tempImage), imagesy($tempImage));
                imagedestroy($tempImage);
            } else {
                $image = $tempImage;
            }
            break;
        case '.webp':
            $image = imagecreatefromwebp($location);
            break;
        default:
            die("wtf is this extension??");
    }

    $x = imagesx($image);
    $y = imagesy($image);
    $newy = ($x / 4) * 5;

    if (($y >= $newy - 15) && ($y <= $newy + 15)) {
        imagewebp($image, "../assets/products-img/" . str_replace($extention, '.webp', $filename));
        imagedestroy($image);
        unlink($location);
    } elseif ($y > $newy) {
        $starty = ($y - $newy) / 2;
        $im2 = imagecrop($image, ['x' => 0, 'y' => $starty, 'width' => $x, 'height' => $newy]);
        if ($im2 !== FALSE) {
            imagewebp($im2, "../assets/products-img/" . str_replace($extention, '.webp', $filename));
            imagedestroy($im2);
        }
        imagedestroy($image);
        unlink($location);
    } else {
        $newx = ($y / 5) * 4;
        $startx = ($x - $newx) / 2;
        $im2 = imagecrop($image, ['x' => $startx, 'y' => 0, 'width' => $newx, 'height' => $y]);
        if ($im2 !== FALSE) {
            imagewebp($im2, "../assets/products-img/" . str_replace($extention, '.webp', $filename));
            imagedestroy($im2);
        }
        imagedestroy($image);
        unlink($location);
    }
}
