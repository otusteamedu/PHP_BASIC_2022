<?php
$config = getConfig()['gallery'];
$imgDirMin = $config['imgdirmin'];
$imgDir = $config['imgdir'];
?>
<div class="container-light-box">
    <!-- Images used to open the lightbox -->
    <div class="row">
        <?php foreach ($images as $key => $image){
              $fileName =  $image['image_name'];
              $filePathMin = $imgDirMin . $fileName;
        ?>
              <div class="column">
                <img src="<?=$filePathMin ?>" style="width:100%; height: 100%;" onclick="openModal();currentSlide(<?=++$key ?>)" class="hover-shadow cursor">
              </div>
        <?php } ?>
    </div>
</div>



<!-- The Modal/Lightbox -->
<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">
    <?php foreach ($images as $key => $image){
        $fileName =  $image['image_name'];
        $filePath = $imgDir . $fileName;
    ?>
        <div class="mySlides">
            <div class="numbertext"><?=++$key ?> / <?=count($images) ?></div>
            <img src="<?=$filePath ?>" style="width:100%">
        </div>
    <?php } ?>
        <!-- Next/previous controls -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <!-- Caption text -->
        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <!-- Thumbnail image controls -->
    <?php foreach ($images as $key => $image){
        $fileName =  $image['image_name'];
        $filePathMin = $imgDirMin . $fileName;
    ?>
        <div class="column">
            <img class="demo" src="<?=$filePathMin ?>" onclick="currentSlide(<?=++$key ?>)" style="width:100%; height: 100%;">
        </div>
    <?php } ?>
    </div>
</div>

<script>
    // Open the Modal
    function openModal() {
      document.getElementById('myModal').style.display = "block";
      //document.getElementById('modal-content').scrollTop = document.getElementById('modal-content').scrollHeight + 1500;
    }

    // Close the Modal
    function closeModal() {
      document.getElementById('myModal').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>
