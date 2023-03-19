<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include "../Tema/CSS.php"; ?>
        <!-- Title  -->
        <title>Home - AutoCon</title>
    </head>
    <body>
        <?php include "../Tema/Menu.php"; ?>
        <!-- ********** Hero Area Start ********** -->
        <div class="hero-area">
            <!-- Hero Slides Area -->
            <div class="hero-slides owl-carousel">
                <!-- Single Slide -->
                <div class="single-hero-slide bg-img background-overlay" style="background-image: url(../img/blog-img/bg2.jpg);"></div>
                <div class="single-hero-slide bg-img background-overlay" style="background-image: url(../img/blog-img/bg3.jpg);"></div>
                <!-- Single Slide -->
                <div class="single-hero-slide bg-img background-overlay" style="background-image: url(../img/blog-img/bg1.jpg);"></div>
            </div>
            <!-- Hero Post Slide -->
            <div class="hero-post-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-post-slide">
                                <!-- Single Slide -->
                                <div class="single-slide d-flex align-items-center">
                                    <div class="post-number">
                                        <p>1 </p>
                                    </div>
                                    <div class="post-title">
                                        <a href="../Controladores/VehiculosControlador.php">Descubre nuestros vehículos.</a>
                                    </div>
                                </div>
                                <!-- Single Slide -->
                                <div class="single-slide d-flex align-items-center">
                                    <div class="post-number">
                                        <p>2</p>
                                    </div>
                                    <div class="post-title">
                                        <a href="../Controladores/ComponentesControlador.php">¿Necesitas piezas de repuesto? Descúbrelas ahora mismo.</a>
                                    </div>
                                </div>
                                <div class="single-slide d-flex align-items-center">
                                    <div class="post-number">
                                        <p>3</p>
                                    </div>
                                    <div class="post-title">
                                        <a href="ReparacionVista.php">Repara y deja como nuevo tu vehículo con nuestros servicios.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ********** Hero Area End ********** -->
        <div class="main-content-wrapper section-padding-100">
            <center>
                <h1>Concesionario BMW AutoCon</h1>
                <p>_________________________________________________________________________________________________________________</p>
                <br>
                <p style="font-size: 25px">¡Localízanos!</p>
            </center>
            <center>  <?php if (isset($_SESSION["mensajeBD"])) {
                echo " <h6 style='color:red;'> " . $_SESSION["mensajeBD"] . "";
                unset($_SESSION["mensajeBD"]);
            } ?></h6> </center>
        </div>
        <img src="../img/blog-img/bmw.jpg" style="width: 100%;height: auto" />
        <img src="../img/blog-img/negro.jpg" style="width: 100%;height: 28px" />
        <center ><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3099.970879513495!2d-1.8841090845740516!3d39.01597777955259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd665ef7be827c67%3A0x7bc569d31447a077!2sAv.%20Gregorio%20Arcos%2C%2041%2C%2002007%20Albacete!5e0!3m2!1ses!2ses!4v1575763094365!5m2!1ses!2ses"  frameborder="0" style="border:0;width: 100%;height: 600px" allowfullscreen=""></iframe></center>
        <?php include "../Tema/Scripts.php"; ?>
    </body>
    <!--scaffolding-->
</html>