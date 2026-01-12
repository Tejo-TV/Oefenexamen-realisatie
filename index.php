<?php
//---------------------------------------------------------------------------------------------------//
// Naam script		  : index.php
// Omschrijving		  : Dit is de homepagina
// Naam ontwikkelaar  : Tejo Veldman
// Project		      : NETFISH 
// Datum		      : OefenExamen 12-1-2026
//---------------------------------------------------------------------------------------------------//
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NETFISH - HOMEPAGE</title>
    <link rel="shortcut icon" type="x-icon" href="assets/images/NETFISH-logo-klein.png">
<link rel="stylesheet" href="assets/CSS/style.css">
</head>
<body>
        <!-- Header -->
    <header>
        <a href="index.php"><img src="assets/images/NETFISH-logo.png" alt="Logo"></a>
        <nav>
            <a href="pages/videos.php">Videos</a>
            <a href="pages/beheer.php">Beheer</a>
            <a href="pages/login.php">Login</a>
        </nav>
    </header>

    <!-- Hero Section -->
<section class="home-film">
    <div class="home-content">
        <h1>Despacito</h1>
        <p class="year">2026</p>
        <p>In a vibrant city full of music and romance, two unlikely heroes discover love, secrets, and unforgettable adventures while chasing their dreams under the dazzling lights and rhythmic beats of the city.</p>
        <a href="pages/videos.php">Bekijk meer video's</a>
    </div>
    <div class="home-video">
    <iframe width="560" height="315" 
        src="https://www.youtube.com/embed/kJQP7kiw5Fk" 
        title="YouTube video player" frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
    </iframe>
</div>
</section>

<section class="carousel">
    <h2>Populaire series</h2>
    <div class="carousel-wrapper">
      <div class="slide"><img src="assets/images/film1.jpg" alt="Never"></div>
      <div class="slide"><img src="assets/images/film2.jpg" alt="GonnaGive"></div>
      <div class="slide"><img src="assets/images/film3.png" alt="You"></div>
      <div class="slide"><img src="assets/images/film4.png" alt="Up"></div>
      <div class="slide"><img src="assets/images/film5.png" alt="Justin"></div>
      <div class="slide"><img src="assets/images/film6.jpg" alt="FindingWater"></div>
      <div class="slide"><img src="assets/images/film7.png" alt="Lokihee"></div>
      <div class="slide"><img src="assets/images/film8.jpg" alt="Diddy"></div>
      <div class="slide"><img src="assets/images/film9.jpg" alt="PlayboyCarti"></div>
    </div>
  </section>
</body>


</body>
</html>