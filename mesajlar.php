<?php 
session_start();

if (isset($_POST['sifre']) and $_POST['sifre'] == "eytd") {
	$_SESSION['yetki']=true;
}

$liste=array();
?>
<!DOCTYPE html>
<html lang="tr"><head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>Depremoloji | Deprem Çantası Hazırlama</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-eduwell-style.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 573 EduWell

https://templatemo.com/tm-573-eduwell

-->
</head>

<body>


<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
  <div class="container">
      <div class="row">
          <div class="col-12">
              <nav class="main-nav">
                  <!-- ***** Logo Start ***** -->
                  <a href="index.html" class="logo">
                      <img src="assets/images/templatemo-eduwell.png" alt="EduWell Template">
                  </a>
                  <!-- ***** Logo End ***** -->
                  <!-- ***** Menu Start ***** -->
                  <ul class="nav" style="display: none;">
                      <li><a href="index.html" class="">Ana Sayfa</a></li>
                      <li><a href="about-us.html">Hakkımızda</a></li>
                      <li class="has-sub is-open-sub">
                          <a href="index.html#courses" class="">Bilgilendirici Yazılar</a>
                          <ul class="sub-menu" style="display: block;">
                              <li><a href="deprem-nedir.html">Deprem Nedir?</a></li>
                              <li><a href="deprem-oncesi-yapilmasi-gerekenler.html">Deprem Öncesinde Yapılması Gerekenler</a></li>
                              <li><a href="deprem-aninda-yapilmasi-gerekenler.html">Deprem Anında Yapılması Gerekenler</a></li>
                              <li><a href="deprem-sonrasi-yapilmasi-gerekenler.html">Deprem Sonrasıda Yapılması Gerekenler</a></li>
                              <li><a href="deprem-cantasi-nasil-hazirlanir.html">Deprem Çantası Nasıl Hazırlanır?</a></li>
                          </ul>
                      </li>
                      <li class="has-sub is-open-sub">
                        <a href="index.html#courses" class="active">Etkinlikler</a>
                        <ul class="sub-menu" style="display: block; right: 0px; width: 400px;">
                            <li><a href="deprem-etkinlik.html">Deprem Öncesi, Deprem sonrası ve Deprem Anı Etkinliği</a></li>
                            <li><a href="canta-etkinlik.html">Deprem Çantası Hazırlama Etkinliği</a></li>
                        </ul>
                    </li>
                      <li><a href="index.html#contact-section">İletişim</a></li>
                  </ul>
                  <a class="menu-trigger">
                      <span>Menu</span>
                  </a>
                  <!-- ***** Menu End ***** -->
              </nav>
          </div>
      </div>
  </div>
</header>
<!-- ***** Header Area End ***** -->











<section class="contact-us our-office">
  <div class="container">
    <div class="row" style="margin-top: 120px;">
      <div class="col-lg-4" style="width: 100%;margin-bottom: 300px;">
        <div class="left-info">
          <div class="section-heading">
            <h4 style="text-align: center;">Mesaj <em>Kontrol</em></h4>
          </div>
          
          <?php
					if (!isset($_SESSION['yetki']) and $_SESSION['yetki'] != true) {
				
				?>
					<form action="mesajlar.php" method="POST" style="align-self: center;">
						<label for="sifre" style="align-self: center;">Şifre</label>
						<input type="password" name="sifre" id="sifre">
						<input type="submit" name="git">
					</form>
				<?php

					}
					else{

				?>

				<?php
				try {
                    $vt = new PDO("mysql:dbname=epiz_31543998_depremoloji; host=sql106.epizy.com; charset=utf8","epiz_31543998", "pzR5ahbriIQ");
                    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                  } catch (PDOException $e) {
                    echo $e->getMessage();
                  }

				  $sql ="select * from mesaj";
				  $ifade = $vt->prepare($sql);
				  $ifade->execute();

					while ($kayit = $ifade->fetch(PDO::FETCH_ASSOC)) {
						$liste[]=array($kayit["adsoyad"], $kayit["mail"], $kayit["mesaj"]);
					}



					//Bağlantıyı yok edelim...
					$vt = null;

					for ($i=0; $i < count($liste); $i++) { 

						$adimlar=explode("\r", $liste[$i][2]);

						echo "<div style=\"margin: 30px; min-width:350px; background-color: #1cdb9d; padding: 20px; border-radius: 15px; box-sizing: border-box; color: white; font-weight: bold; font-size: 18px;\">";
						
						echo "<p class='baslikp'>",$liste[$i][0],"</p><br>";

						echo "<p class='baslikp' style:'background-color: #bce9f7;'>",$liste[$i][1],"</p><br>";

						for ($j=0; $j < count($adimlar); $j++) { 
							echo "<p>", $adimlar[$j], "</p><br>";
						}

						echo "</div>";
					}
				}
			?>

        </div>
      </div>
      
      <div class="col-lg-12">
        <ul class="social-icons">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </div>
      <div class="col-lg-12">
        <p class="copyright">

        <br></p>
      </div>
    </div>
  </div>
</section>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/lightbox.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/video.js"></script>
  <script src="assets/js/slick-slider.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
      //according to loftblog tut
      $('.nav li:first').addClass('active');

      var showSection = function showSection(section, isAnimate) {
        var
        direction = section.replace(/#/, ''),
        reqSection = $('.section').filter('[data-section="' + direction + '"]'),
        reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
          $('body, html').animate({
            scrollTop: reqSectionPos },
          800);
        } else {
          $('body, html').scrollTop(reqSectionPos);
        }

      };

      var checkSection = function checkSection() {
        $('.section').each(function () {
          var
          $this = $(this),
          topEdge = $this.offset().top - 80,
          bottomEdge = topEdge + $this.height(),
          wScroll = $(window).scrollTop();
          if (topEdge < wScroll && bottomEdge > wScroll) {
            var
            currentId = $this.data('section'),
            reqLink = $('a').filter('[href*=\\#' + currentId + ']');
            reqLink.closest('li').addClass('active').
            siblings().removeClass('active');
          }
        });
      };

      $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
        e.preventDefault();
        showSection($(this).attr('href'), true);
      });

      $(window).scroll(function () {
        checkSection();
      });
  </script>
  
