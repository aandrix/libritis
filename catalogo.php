<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
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
                            BIBLIOTITIS
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="home2.html">home</a></li>
                            <li><a class="active">catalogo</a></li>
                            <li class="scroll-to-section"><a href="#apply">area personale</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
        </video>
        <div class="video-overlay header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">
                            <h6>biblioteca</h6>
                            <h2>benvenuti nel catalogo della biblioteca itis mario delpozzo</h2>
                            <div class="main-button-red">
                                <div class="scroll-to-section"><a href="#contact">registrati</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <section class="upcoming-meetings" id="meetings">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>libri disponibili</h2>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-4">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <a href="programmaritiro.php?title=il%20giovane%20holden"><img src="ilgiovaneholden.jpg" alt="Il Giovane Holden"></a>
                                </div>
                                <div class="down-content">
                                    <a href="programmaritiro.php?title=il%20giovane%20holden"><h4>Il Giovane Holden</h4></a>
                                    <p>romanzo di formazione</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <a href="programmaritiro.php?title=guerra%20e%20pace"><img src="guerraepace.jpg" alt="Guerra e Pace"></a>
                                </div>
                                <div class="down-content">
                                    <a href="programmaritiro.php?title=guerra%20e%20pace"><h4>Guerra e Pace</h4></a>
                                    <p>romanzo epico</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <a href="programmaritiro.php?title=trattato%20sulla%20tolleranza"><img src="trattatosullatolleranza.jpg" alt="Trattato sulla Tolleranza"></a>
                                </div>
                                <div class="down-content">
                                    <a href="programmaritiro.php?title=trattato%20sulla%20tolleranza"><h4>Trattato sulla Tolleranza</h4></a>
                                    <p>saggio</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="meeting-item">
                                <div class="thumb">
                                    <a href="programmaritiro.php?title=lettera%20a%20un%20bambino%20mai%20nato"><img src="letteraaunbambinomainato.jpg" alt="Lettera a un Bambino Mai Nato"></a>
                                </div>
                                <div class="down-content">
                                    <a href="programmaritiro.php?title=lettera%20a%20un%20bambino%20mai%20nato"><h4>Lettera a un Bambino Mai Nato</h4></a>
                                    <p>saggio</p>
                                </div>
                            </div>
                        </div>

                    </div>
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
                    scrollTop: reqSectionPos
                }, 800);
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

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
            e.preventDefault();
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>
</body>

</html>
