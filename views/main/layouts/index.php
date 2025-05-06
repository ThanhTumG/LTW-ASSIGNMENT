<?php
  include_once('views/main/navbar.php');
?>
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(public/assets/img/slide/banner_esports.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Chào mừng đến với <span>GARENA</span></h2>
              <p>Được thành lập vào năm 2009, Garena là nhà phát triển và phát hành trò chơi trực tuyến hàng đầu với dấu ấn toàn cầu tại hơn 160 thị trường.</p>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(public/assets/img/slide/banner_gpc.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Chơi cùng mọi người với GARENA</h2>
              <p>Nền tảng kết nối game thủ, giúp bạn sát cánh bên đồng đội để khám phá, chinh phục thử thách, và hòa mình vào những thế giới game độc đáo chỉ có trên Garena.</p>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(public/assets/img/slide/banner_aov.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Đồng hành cùng GARENA</h2>
              <p>Chúng tôi mong muốn mang đến cho bạn một nền tảng để phát triển bản thân một cách vượt trội, khai phá tiềm năng và tạo ra ảnh hưởng trong khu vực của bạn.</p>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>CHÚNG TÔI LÀM GÌ</h2>
          <!-- <p>Các lĩnh vực hoạt động của GARENA tập trung vào 4 nhóm sản phẩm chủ lực, mang đến cho người dùng những trải nghiệm phong phú và đơn giản hơn.</p> -->
        </div>
        <div class="row">
          <div class="col-lg-2 col-md-0"></div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bx-game"></i>
              </div>
              <h4><a href="#">GAME</a></h4>
              <p>Garena là đơn vị vận hành độc quyền các tựa game hàng đầu trên PC và mobile tại nhiều thị trường trên thế giới. </p>
              <br>
              <p>Với tinh thần của những game thủ đam mê và thấu hiểu người chơi, chúng tôi luôn kết nối chặt chẽ với cộng đồng để đảm bảo họ luôn được trải nghiệm những tựa game hấp dẫn, lôi cuốn trên cả PC và mobile.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bx bx-group"></i>
              </div>
              <h4><a href="#">THỂ THAO ĐIỆN TỬ</a></h4>
              <p>Garena là đơn vị tiên phong và tổ chức hàng loạt giải đấu Esports – từ các giải cộng đồng quy mô nhỏ cho đến những sự kiện chuyên nghiệp có lượng người xem thuộc hàng top thế giới. </p>
              <br>
              <p>Những giải đấu này tôn vinh kỹ năng xuất sắc của người chơi, thắt chặt mối liên kết với cộng đồng và góp phần phát triển hệ sinh thái game bền vững.</p>
            </div>
          </div>
          <div class="col-lg-2 col-md-0"></div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-2 col-md-0"></div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-pink">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bx bx-chat"></i>
              </div>
              <h4><a href="#">CỘNG ĐỒNG</a></h4>
              <p>Garena thúc đẩy những trải nghiệm giải trí và kết nối xã hội thông qua game, giúp cộng đồng người chơi tương tác và gắn kết với nhau. </p>
              <br>
              <p>Chúng tôi xây dựng các cộng đồng game thủ vững mạnh từ cấp địa phương, khu vực đến toàn cầu, đồng thời mang đến cho người chơi những chiến dịch và sự kiện thú vị, gần gũi và truyền cảm hứng.</p>
            </div>
          </div>

          <div class="col-lg-2 col-md-0"></div>
        </div>

      </div>
    </section><!-- End Services Section -->
  </main><!-- End #main -->

  <?php
include_once('views/main/footer.php');
?>