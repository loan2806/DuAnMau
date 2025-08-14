<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Slideshow Ảnh</title>
    <style>
        /* CSS cho slideshow */
        .slideshow-container {
            height: 90svh;
            width: 100%;
         
            overflow: hidden;
        }

        .mySlides {
            display: none;
            width: 100%;
            height: 100%;
        }

        .mySlides img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }
    </style>
</head>
<body>

<?php
// Mảng chứa các đường dẫn tới ảnh của bạn
// Bạn có thể thêm, bớt hoặc thay đổi các đường dẫn này
$images = [
  'https://theme.hstatic.net/200000377165/1001286359/14/slide_1_img_2048x2048.jpg?v=244',
  "https://theme.hstatic.net/200000377165/1001286359/14/slide_3_img.jpg?v=244",
  "https://theme.hstatic.net/200000377165/1001286359/14/slide_4_img.jpg?v=244"
];
?>

<div class="slideshow-container">
    <?php foreach ($images as $image): ?>
        <div class="mySlides fade">
            <img src="<?= htmlspecialchars($image); ?>" alt="Ảnh Slideshow">
        </div>
    <?php endforeach; ?>
</div>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        slides[slideIndex-1].style.display = "block";  
        setTimeout(showSlides, 3000); // Tự động chuyển đổi sau 3 giây
    }
</script>

</body>
</html>