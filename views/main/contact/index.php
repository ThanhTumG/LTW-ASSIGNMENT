<?php
include_once('views/main/navbar.php');
?>
  <main id='main'>
     <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h1 style="color: white;"><strong>KẾT NỐI</strong></h1>
          <ol>
            <li><a href="index.php?page=main&controller=layouts&action=index">Trang chủ</a></li>
            <li><a href="index.php?page=main&controller=contact&action=index">Kết nối</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
    <iframe  style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0236471701214!2d105.81396439999999!3d21.0317398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab2d1e94f373%3A0x16fecba22edb8121!2sCapital%20Place!5e0!3m2!1svi!2s!4v1746453832548!5m2!1svi!2s" frameborder="0" allowfullscreen></iframe>
    </div>

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">
          <?php
          foreach ($companies as $company)
          {
            echo '
            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-6 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>CHI NHÁNH</h4>
                  <p>' . $company->name . '</p>
                </div>

                <div class="col-lg-6 info mt-4 mt-lg-0">
                  <i class="bi bi-map"></i>
                  <h4>ĐỊA CHỈ</h4>
                  <p>' . $company->address . '</p>
                </div>
              </div>
            </div>
            ';
          }
          ?>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<?php
include_once('views/main/footer.php');
?>