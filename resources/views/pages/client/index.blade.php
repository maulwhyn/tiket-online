<x-client::layout title="Profil Guci Tegal">
    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
          <img src="client-template/img/hero-carousel/hero-carousel-3.svg" class="img-fluid animated">
          <h2>Welcome to <span>GuciTegal</span></h2>
          <p>Kawasan Guci Tegal, Jawa Tengah menarik di Kunjungi saat-saat Liburan.</p>
          <div class="d-flex">
            <a href="/#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
      </section>
    
      <main id="main">
    
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
          <div class="container" data-aos="fade-up">
    
            <div class="section-header">
              <h2>About Us</h2>
              <p>Wisata Guci merupakan taman wisata air panas yang ada di daerah Tegal. Kawasan berada di hamparan bukit berada mengelilingi taman wisata Guci dan mengelilingi Gunung Slamet yang menjulang tinggi di hadapan mata sehingga membuat suasana semakin nyaman. Taman wisata air panas yang asri dan sejuk serta air terjun di sana mengubah pemandangan jadi semakin indah. Selain itu, profil wisata Guci memiliki tanah lapang yang bisa digunakan untuk berkemah. Pemandian air panas dan air terjun Guci memiliki tawaran lain seperti menunggang kuda mengelilingi taman wisata Guci dan pernak-pernik khas yang dibuat oleh tangan kreatif warga di sekitar taman wisata. </p>
            </div>
    
            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
    
              <div class="col-lg-5">
                <div class="about-img">
                  <img src="client-template/img/about-guci.jpg" class="img-fluid" alt="">
                </div>
              </div>
    
              <div class="col-lg-7">
                <h3 class="pt-0 pt-lg-5">
                  Objek wisata Guci Tegal</h3>
    
                <!-- Tab Content -->
                <div class="tab-content">
    
                  <div class="tab-pane fade show active" id="tab1">
    
                    <p class="fst-italic">
                      Untuk mengenal objek wisata Guci, berikut informasi mengenai destinasi wisata Tegal ini. </p>
    
                    <div class="d-flex align-items-center mt-4">
                      <i class="bi bi-check2"></i>
                      <h4>Lokasi Wisata Guci Tegal</h4>
                    </div>
                    <p>
                      Wisata Guci Tegal terletak di Kaki Gunung Slamet. Alamatnya berada di Desa Guci, Kecamatan Bumijawa, Kabupaten Tegal, Jawa Tengah. Jarak wisata Guci Tegal dari alun-alun Kabupaten ada sekitar 43 kilometer dengan 
                     jarak tempuh 1 jam 39 menit. </p>
    
                    <div class="d-flex align-items-center mt-4">
                      <i class="bi bi-check2"></i>
                      <h4>Harga Tiket Masuk Wisata Guci Tegal</h4>
                    </div>
                    <p>
                      <ul>
                        <li>Tiket masuk ke Hot Guci Waterboom atau pemandian air panas Rp. 40.000 per orang</li>
                        <li>Tiket masuk naik jembatan kaca Rp. 10.000 per orang Tiket masuk ke 
                          Pancuran 13 Rp. 4.000 per orang</li>
                        <li>Tiket masuk ke Baron Hill Rp. 15.000 per orang</li>
                      </ul>
    
                    <div class="d-flex align-items-center mt-4">
                      <i class="bi bi-check2"></i>
                      <h4>Jam Buka Wisata Guci Tegal</h4>
                    </div>
                    <p>Jam buka wisata di Guci berbeda-beda. Rata-rata mulai buka
                      pukul 08.00-17.00. Kecuali untuk kawasan penginapan dan area camping. Untuk kondisi normal, wisata Guci Tegal buka setiap hari selama 1 minggu.</p>

                    <div class="d-flex align-items-center mt-4">
                      <i class="bi bi-check2"></i>
                      <h4>Fasilitas Wisata Guci Tegal</h4>
                    </div>
                    <p>Kantin warung, makanan dan minuman, Penjual baju dan souvenir, Area parkir Toilet Mushola, Spot selfie, Penjual kelinci, Area camping dan outbound, Wahana permainan, Penyewaan kuda, dan  penginapan atau villa. </p>
                    
    
                  </div><!-- End Tab 1 Content -->
    
                </div>
    
              </div>
    
            </div>
    
          </div>
        </section><!-- End About Section -->
    
    
        <!-- ======= Services Section ======= -->
        <section id="tiket" class="services">
          <div class="container" data-aos="fade-up">
    
            <div class="section-header">
              <h2>Our Ticket</h2>
              <p>berbagai wisata dan wahana yang ditampilkan, anda juga bisa melakukan pemesanan tiket secara online.</p>
            </div>
    
            <div class="row gy-5">
              @foreach ($tiket as $item)
                  
              <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="700">
                <div class="menu-item position-relative">
                  <img src="{{ asset('storage/' .$item->image) }}" class="menu-img img-fluid" alt="" >
                  <div align="center">
                    <h4>{{ $item->title }}</h4> 
                    <p>{!! $item->excerpt !!}</p>
                    <p class="price">
                      Rp. @money($item->harga)
                    </p>
                  </div>
                  @guest
                  @if (Route::has('admin.login'))
                    <a href="{{ route('admin.login') }}" class="btn btn-sm btn-primary px-5" style="border-radius:10px">Beli sekarang</a>
                  @endif
                  @else
                    <a href="{{ route('show.transaksi', $item->slug) }}" class="btn btn-sm btn-primary px-5" style="border-radius:10px">Beli sekarang</a>
                @endguest
                </div><!-- Menu Item -->
              </div><!-- End Service Item -->
              @endforeach                           
              
    
            </div>
    
          </div>
        </section><!-- End Services Section -->
    
        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
          <div class="container" data-aos="fade-up">
    
            <div class="testimonials-slider swiper">
              <div class="swiper-wrapper">
    
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="client-template/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                    <h3>Muhammmad Abbas</h3>
                    <h4>kepala Desa</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Terbangunnya Wisata Desa Guci ini sebagai alat branding dan promosi desa Guci yang diharapkan mampu meningkatkan UMKM setempat.
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->
    
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="client-template/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                    <h3>Dwi Cantika Ayu</h3>
                    <h4>Wisatawan</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Wisata guci ini sangat menarik, mulai dari keanekaragaman wisata kuliner dan fasilitas yang memadai. mantap poolll deh...
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->
    
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="client-template/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                    <h3>Sri Wahyuni</h3>
                    <h4>Pedagang</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      Wisata ini sangat bermanfaat sekali, khususnya para pedagang setempat saya merasakan sendiri bagaimana para wisatawan tiada henti berdatangan dari mana saja.
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->
    
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="client-template/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                    <h3>Vicky Rachmat</h3>
                    <h4>Wisatawan</h4>
                    <div class="stars">
                      <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      pemandangan yang indah dan suasana alam yang masih asri membuat saya ingin terus kembali kesini. fasilitas dan wisata yang menarik juga menjadi daya tarik saya sendiri.
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->
    
              </div>
              <div class="swiper-pagination"></div>
            </div>
    
          </div>
        </section><!-- End Testimonials Section -->
    
        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
          <div class="container-fluid" data-aos="fade-up">
    
            <div class="row gy-4">
    
              <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
    
                <div class="content px-xl-5">
                  <h3>Frequently Asked <strong>Questions</strong></h3>
                  <p>
                    Seputar Pertanyaan tentang wisata Guci tegal ini
                  </p>
                </div>
    
                <div class="accordion accordion-flush px-xl-5" id="faqlist">
    
                  <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                        <i class="bi bi-question-circle question-icon"></i>
                        Apakah ada akses masuk ke kawasan guci untuk bus wisata besar dengan kapasitas 80 orang?
                      </button>
                    </h3>
                    <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Sebenarnya kendaraan besar bisa saja masuk ke kawasan Guci karena jalanannya lebar dan rapih, hanya saja kondisi jalan yang berkelok2 dan menanjak menjadi tantangan tersendiri untuk mencapai ke Guci. Saya sarankan untuk menggunakan kendaraan yang medium seperti mini bus (isi 25-30 kursi).
                      </div>
                    </div>
                  </div><!-- # Faq item-->
    
                  <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                        <i class="bi bi-question-circle question-icon"></i>
                        Apakah ada hotel atau villa di sekitaran tempat wisata?
                      </button>
                    </h3>
                    <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                      </div>
                    </div>
                  </div><!-- # Faq item-->
    
                  <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                        <i class="bi bi-question-circle question-icon"></i>
                        wisata mana yang paling menarik dan sering dikunjungi?
                      </button>
                    </h3>
                    <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                      </div>
                    </div>
                  </div><!-- # Faq item-->
    
                  <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                        <i class="bi bi-question-circle question-icon"></i>
                        Apakah wisata ini bisa untuk kalangan muda dan tua?
                      </button>
                    </h3>
                    <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        <i class="bi bi-question-circle question-icon"></i>
                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                      </div>
                    </div>
                  </div><!-- # Faq item-->
    
                  <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                    <h3 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                        <i class="bi bi-question-circle question-icon"></i>
                        Apakah wisata ini benar-benar aman karena bisa saja terjadi longsor dan sebagainya?
                      </button>
                    </h3>
                    <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                      <div class="accordion-body">
                        Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                      </div>
                    </div>
                  </div><!-- # Faq item-->
    
                </div>
    
              </div>
    
              <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("client-template/img/faq.jpg");'>&nbsp;</div>
            </div>
    
          </div>
        </section><!-- End F.A.Q Section -->
    
        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="recent-blog-posts" class="recent-blog-posts">
    
          <div class="container" data-aos="fade-up">
    
            <div class="section-header">
              <h2>Blog</h2>
              <p>Recent posts form our Blog</p>
            </div>
    
            <div class="row">
    
              @foreach ($news as $item)
                  
              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="post-box">
                  <div class="post-img"><img src="{{ asset('storage/' .$item->image) }}" class="img-fluid" alt=""></div>
                  <div class="meta my-2">
                    <span class="post-date">{{ \Carbon\Carbon::parse($item->created_at)->format('D, d M Y') }} \</span>
                    <span class="post-author" style="color: blue">{{ $item->user->name }}</span>
                  </div>
                  <h3 class="post-title">{{ $item->title }}</h3>
                  <p>{{ $item->excerpt }}</p>
                  <a href="{{ route('blog.detail', $item->slug) }}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
              @endforeach
    
            </div>
    
          </div>
    
        </section><!-- End Recent Blog Posts Section -->
    
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container">
    
            <div class="section-header">
              <h2>Contact Us</h2>
              <p>Anda bisa menghubungi kami di kolom bawah ini</p>
            </div>
    
          </div>
    
          <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63331.18320502532!2d109.13174996121592!3d-7.218133500341796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f8d3974df69b7%3A0x44f89e1f16c24043!2sGuci%2C%20Kecamatan%20Bumijawa%2C%20Kabupaten%20Tegal%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1685675864001!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
          </div><!-- End Google Maps -->
    
          <div class="container">
    
            <div class="row gy-5 gx-lg-5">
    
              <div class="col-lg-4">
    
                <div class="info">
                  <h3>Get in touch</h3>
                  <p>kontak yang bisa anda hubungi.</p>
    
                  <div class="info-item d-flex">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                      <h4>Location:</h4>
                      <p>Kecamatan Bumijawa, Kabupaten Tegal Jawa Tengah</p>
                    </div>
                  </div><!-- End Info Item -->
    
                  <div class="info-item d-flex">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                      <h4>Email:</h4>
                      <p>info@gmail.com</p>
                    </div>
                  </div><!-- End Info Item -->
    
                  <div class="info-item d-flex">
                    <i class="bi bi-phone flex-shrink-0"></i>
                    <div>
                      <h4>Call:</h4>
                      <p>+1 5589 55488 55</p>
                    </div>
                  </div><!-- End Info Item -->
    
                </div>
    
              </div>
    
              <div class="col-lg-8">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div><!-- End Contact Form -->
    
            </div>
    
          </div>
        </section><!-- End Contact Section -->
    
      </main><!-- End #main -->


</x-client>
