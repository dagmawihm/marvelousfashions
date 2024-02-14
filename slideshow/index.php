<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/icons/xfavicon.webp" />
    <link rel="stylesheet" href="../assets/css/slideshow.css">
    
    <title>Slideshow | Marvelous Fashions</title>

    
</head>
<body>
    <div class="gallery-container">
        <div class="upper-container">
            <a class="close" onclick="closeGallery()">&#10006;</a>

            <div class="upper-component previous-container">
                <a class="previous-button" onclick="updateSlide(-1)">&#10094;</a>
            </div>

            <div class="upper-component slides-container">
                <div class="slide-component fade">
                    <div class="image-container">
                        <img src="../assets/products-img/a.webp">
                    </div>
                </div>

                <div class="slide-component fade">
                    <div class="image-container">
                        <img src="../assets/products-img/b.webp">
                    </div>
                </div>

                <div class="slide-component fade">
                    <div class="image-container">
                        <img src="../assets/products-img/c.webp">
                    </div>
                </div>

                <div class="slide-component fade">
                    <div class="image-container">
                        <img src="../assets/products-img/d.webp">
                    </div>
                </div>

                <div class="slide-component fade">
                    <div class="image-container">
                        <img src="../assets/products-img/e.webp">
                    </div>
                </div>

                <div class="slide-component fade">
                    <div class="image-container">
                        <img src="../assets/products-img/f.webp">
                    </div>
                </div>

                <div class="slide-component fade">
                    <div class="image-container">
                        <img src="../assets/products-img/g.webp">
                    </div>
                </div>
                <div class="slide-component fade">
                    <div class="image-container">
                        <img src="../assets/products-img/h.webp">
                    </div>
                </div>
                <div class="slide-component fade">
                    <div class="image-container">
                        <img src="../assets/products-img/i.webp">
                    </div>
                </div>
            </div>

            <div class="upper-component next-container">
                <a class="next-button" onclick="updateSlide(1)">&#10095;</a>
            </div>

            <div class="clearing-component"></div>
        </div>

        <div class="lower-container">
            <div class="caption-container">
                <p id="caption"></p>
            </div>

            <div class="thumbnails-container">
                <div class="thumbnail-component">
                    <img class="thumbnail" src="../assets/products-img/a.webp" alt='👚Size 3XL 💵Price 1400birr' onclick="goToSlide(1)" >
                </div>
                <div class="thumbnail-component">
                    <img class="thumbnail" src="../assets/products-img/b.webp" alt="👚Size L 💵Price 1500birr" onclick="goToSlide(2)" >
                </div>
                <div class="thumbnail-component">
                    <img class="thumbnail" src="../assets/products-img/c.webp" alt="👚Size L 💵Price 1300birr" onclick="goToSlide(3)">
                </div>
                <div class="thumbnail-component">
                    <img class="thumbnail" src="../assets/products-img/d.webp" alt="👚Size L 💵Price 1500birr" onclick="goToSlide(4)">
                </div>
                <div class="thumbnail-component">
                    <img class="thumbnail" src="../assets/products-img/e.webp" alt="👚Size L 💵Price 1500birr" onclick="goToSlide(5)">
                </div>
                <div class="thumbnail-component">
                    <img class="thumbnail" src="../assets/products-img/f.webp" alt="👚Size L 💵Price 1500birr" onclick="goToSlide(6)">
                </div>
                <div class="thumbnail-component">
                    <img class="thumbnail" src="../assets/products-img/g.webp" alt="👚Size L 💵Price 1500birr" onclick="goToSlide(7)">
                </div>
                <div class="thumbnail-component">
                    <img class="thumbnail" src="../assets/products-img/h.webp" alt="👚Size L 💵Price 1500birr" onclick="goToSlide(8)">
                </div>
                <div class="thumbnail-component">
                    <img class="thumbnail" src="../assets/products-img/i.webp" alt="👚Size L 💵Price 1500birr" onclick="goToSlide(9)">
                </div>
                <div class="clearing-component"></div>
            </div>
        </div>
    </div>

    <script src="../assets/js/slideshow.js"></script>
</body>
</html>