<?php include_once '../autoload.php';
$mentees = $mentors = array();
$error = false;

try {
  $mentees = Controller\Mentee::getAll();
  $mentors = Controller\Mentor::getAll();
} catch (\Exception $e) {
    $error = $e->getMessage();
    exit($error);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SCA Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <?php include_once 'components/header.php';?>
      <div class="site-blocks-cover overlay" style="background-image: url(images/img/banner2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
            <div class="row justify-content-center mb-4">
              <div class="col-md-8 text-center">
                <h1>We are a non-profit organization <span class="typed-words"></span></h1>
                <p class="lead mb-5"><a href="https://www.shecodeafrica.org/" target="_blank">She Code Africa SCA</a></p>
                <div><a data-fancybox data-ratio="2" href="register.php" class="btn btn-primary btn-md">Register</a></div>
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>  

  <div class="site-section" id="about-section">
      <div class="container">
        <div class="row mb-5">
          
          <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade">
            <img src="images/img/about_us.jpg" width="100%" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-6 order-md-1" data-aos="fade">

            <div class="row">

              <div class="col-12">
                <div class="text-left pb-1">
                  <h2 class="text-black h1 site-section-heading">About Us</h2>
                </div>
              </div>
              <div class="col-12 mb-4">
                <p class="lead">We are a non-profit organization focused on celebrating and empowering young Girls and Women in Technology across Africa.</p>
              </div>
             
            </div>
          </div>
          
        </div>
      </div>
    </div>
    <section class="site-section testimonial-wrap">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="text-black h1 site-section-heading text-center">Testimonials</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              
              <blockquote class="mb-5">
                <p>&ldquo;I stumbled on the SCA mentorship program and thought it wise to apply for it. Foortunately for me, I got admitted into the program, and now, I am a confident female software engineer&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/img/Aminat.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Okunuga Aminat</p>
              </figure>
            </div>
          </div>
          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Coming across SCA mentorship programme has been the best thing that has ever happened to me this year! Thank you SCA.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/img/sca_person_2.jpeg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Angelina Goodwill</p>
              </figure>
              
            </div>
          </div>

          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;I am super excited to have pased through the SCA. Thank you She Code Africa.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div><img src="images/img/sca_person_4.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>
                <p>Ikechuchwu Grace</p>
              </figure>

              
            </div>
          </div>

        </div>
    </section>

    <section class="site-section border-bottom" id="services-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center" data-aos="fade-up">
            <h2 class="text-black h1 site-section-heading text-center">What We Do</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div>
                <h3>Teamwork</h3>
                <div><img src="images/img/our_work.jpg" alt="Image" class="w-50 img-fluid mb-3"></div> 
                </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div>
                <h3>Technical Growth</h3>
                <div><img src="images/img/our_work.jpg" alt="Image" class="w-50 img-fluid mb-3"></div> 
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div>
                <h3>Visibility</h3>
                <div><img src="images/img/our_work.jpg" alt="Image" class="w-50 img-fluid mb-3"></div> 
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div>
                <h3>Leadership</h3>
                <div><img src="images/img/our_work.jpg" alt="Image" class="w-50 img-fluid mb-3"></div> 
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
             <div>
                <h3>Community</h3>
                <div><img src="images/img/our_work.jpg" alt="Image" class="w-50 img-fluid mb-3"></div> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="site-section border-bottom" id="team-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2 class="text-black h1 site-section-heading">Our Team</h2>
          </div>
        </div>
        <div class="row">
          <?php foreach($mentors as $mentor):?>
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <div class="person text-center">
              <img src="images/img/<?=$mentor['picture']?>" alt="Image" class="img-fluid rounded-circle w-50 mb-5">
              <h3><?=$mentor['f_name']. " " . $mentor['l_name']?></h3>
              <p class="position text-muted">Community Leader</p>
              <p class="mb-4">Tech Savvy.</p>
              <ul class="ul-social-circle">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <?php endforeach?>
          </div>
      </div>
    </div>

    <section class="site-section" id="blog-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center">
            <h2 class="text-black h1 site-section-heading text-center">Mentees</h2>
          </div>
        </div>

        <div class="row">
        <?php foreach($mentees as $mentee):?>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
            <div class="h-entry">
              <a href="mentee.html"><img src="images/img/<?= $mentee['picture']?>" alt="Image" class="img-fluid"></a>
              <h2 class="font-size-regular"><a href="mentee.html"><?=$mentee['f_name'] ." ". $mentee['l_name']?> </a></h2>
              <div class="meta mb-4"><?=$mentee['track_name']?><span class="mx-2">&bullet;</span> Cohort 2<span class="mx-2">&bullet;</span> <a href="#">Read more...</a></div>
            </div> 
          </div>
          <?php endforeach?>
          </div>
      </div>
    </section>
    <a href="register.php" class="bg-primary py-5 d-block">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md10"><h2 class="text-white">Let's Get Started</h2></div>
        </div>
      </div>  
    </a>
    
   <?php include_once 'components/footer.php';?>
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  <script src="js/typed.js"></script>
            <script>
            var typed = new Typed('.typed-words', {
            strings: ["focused on celebrating","  and empowering young Girls and Women"," in Technology across Africa."],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true
            });
            </script>

  <script src="js/main.js"></script>
  


  </body>
</html>