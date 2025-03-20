<?= $this->extend('layout/header') ?>

<?= $this->section('title') ?>
GSI - Home
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Home Section -->
<div class="relative min-h-screen flex items-center justify-center">
      <!-- Background Image -->
      <div class="absolute inset-0">
        <img
          src="img/Contoh Gambar.png"
          alt="Background"
          class="w-full h-full object-cover opacity-50"
        />
      </div>

          <div
            class="relative container mx-auto px-6 md:px-12 lg:px-20 flex flex-col md:flex-row items-stretch gap-8"
          >
            <!-- Left Section -->
              <div class="w-full md:w-1/2 flex flex-col text-left">
                <h1 class="text-5xl sm:text-5xl md:text-3xl lg:text-7xl font-bold uppercase leading-tight text-center md:text-left">
              <span class="text-yellow-400">Sustainable</span><br />Creative
              <br />
              Empowerment
            </h1>
              <p class="mt-4 text-base md:text-lg lg:text-xl text-gray-300 max-w-md text-center md:text-left lg:text center-text-mobile">
                Membangun bisnis berkelanjutan dan membuka lapangan kerja
                sebanyak-banyaknya di bidang creative bisnis dan sosial.
              </p>

                <div class="hidden md:flex mt-10 flex items-center gap-4">
                  <img
                    src="https://randomuser.me/api/portraits/men/45.jpg"
                    alt="User"
                    class="w-10 h-10 md:w-12 md:h-12 lg:w-16 lg:h-16 rounded-full border-2 border-white"
                  />
                  <div>
                    <p class="text-base md:text-lg font-semibold">50K+</p>
                    <p class="text-sm md:text-base text-gray-300">Satisfied Customer</p>
                  </div>
                </div>

                <div class="hidden md:block mt-4 space-y-2">
                  <p class="flex items-center gap-2 text-gray-300">
                    <span class="text-yellow-400">&#x25CF;</span> Expert Event Planner
                  </p>
                  <p class="flex items-center gap-2 text-gray-300">
                    <span class="text-yellow-400">&#x25CF;</span> Creative Business
                    Coaching
                  </p>
                  <p class="flex items-center gap-2 text-gray-300">
                    <span class="text-yellow-400">&#x25CF;</span> Sustainable Development
                  </p>
                </div>
              </div>

            <!-- Right Section -->
        <div class="w-full md:w-1/2 flex flex-col items-center gap-6">
          <!-- Video Thumbnail -->
          <?php if (!empty($video)): ?>
            <iframe
                class="w-full h-48 md:h-64 lg:h-96 rounded-lg"
                src="<?= esc($video['main_video']) ?>"
                title="Event Video"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
            ></iframe>
          <?php else: ?>
              <p class="text-gray-400">No video available.</p>
          <?php endif; ?>

          <!-- Image Gallery -->
            <div id="adminGallerySwiper" class="gallery-swiper hidden md:block mt-[25px] swiper relative w-full max-w-3xl">
              <div class="swiper-wrapper">
                  <?php if (!empty($gallery)): ?>
                      <?php foreach ($gallery as $image): ?>
                          <div class="swiper-slide relative">
                              <img src="<?= base_url('uploads/gallery/' . esc($image['image'])) ?>" class="rounded-lg shadow-lg w-full h-32 md:h-48 lg:h-64 object-cover" alt="Gallery Image" />
                          </div>
                      <?php endforeach; ?>
                  <?php else: ?>
                      <p class="text-center text-gray-500">No images found in the gallery.</p>
                  <?php endif; ?>
              </div>
          </div>
        </div>
    </div>
</div>

<!-- New Section -->
<section class="bg-[#1a1a1a] py-16 px-6 md:px-12 lg:px-20">
  <div
    class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center"
  >
    <div class="flex flex-col items-center">
      <h3 class="text-xl font-semibold mt-4">Full-Service Planning</h3>
      <p class="text-gray-300 mt-2">
        Kami merencanakan semua aspek acara Anda dengan profesionalisme dan
        kreativitas.
      </p>
    </div>
    <div class="flex flex-col items-center">
      <h3 class="text-xl font-semibold mt-4">Creative Event Designs</h3>
      <p class="text-gray-300 mt-2">
        Desain acara kreatif yang inovatif dan berkesan untuk setiap klien.
      </p>
    </div>
    <div class="flex flex-col items-center">
      <h3 class="text-xl font-semibold mt-4">On time & On budget</h3>
      <p class="text-gray-300 mt-2">
        Kami memastikan acara berjalan tepat waktu dan sesuai anggaran yang
        telah disepakati.
      </p>
    </div>
  </div>
</section>

<!-- our team -->
<div class="bg-black text-white flex justify-center items-center min-h-screen">
  <section class="container mx-auto text-center py-16">
    <!-- Our Team Button -->
    <div class="mb-6">
      <button class="px-6 py-2 border-2 border-yellow-400 text-white font-semibold rounded-full hover:bg-yellow-400 hover:text-black transition">
        Our Team
      </button>
    </div>

    <!-- Section Title -->
    <h2 class="text-3xl md:text-4xl font-bold mb-10">
      Who We Are : The Minds <br />
      Behind Memorable Events
    </h2>

        <div class="swiper team-swiper max-w-5xl mx-[25px]">
        <div class="swiper-wrapper">
            <?php if (!empty($team)): ?>
                <?php foreach ($team as $member): ?>
                    <div class="swiper-slide flex justify-center items-center">
                        <div class="relative group w-60 md:w-80">
                            <img src="<?= base_url('uploads/team/' . esc($member['photo'])) ?>" alt="<?= esc($member['name']) ?>" class="w-full rounded-lg" />
                            <div class="absolute inset-0 bg-black/40 rounded-lg group-hover:opacity-70 transition"></div>
                            <div class="absolute bottom-6 left-6 text-left">
                                <p class="text-white text-2xl md:text-3xl font-bold"><?= esc($member['name']) ?></p>
                                <p class="text-gray-400 text-base md:text-lg uppercase tracking-wide"><?= esc($member['position']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-500">No team members available.</p>
            <?php endif; ?>
        </div>
    </div>

  </section>
</div>



<!-- Logo Anak Perusahaan -->
<div class="bg-black text-white flex justify-center items-center h-[200px]">
  <!-- Logo Carousel Container -->
  <section class="w-full bg-[#1a1a1a] border border-yellow-500 py-[40px] sm:py-[80px]">
    <div class="swiper logoSwiper max-w-5xl mx-auto">
      <div class="swiper-wrapper">
        <!-- Logo 1 -->
        <div class="swiper-slide flex justify-center items-center">
          <img
            src="<?= base_url('img/gerakansosial.png') ?>"
            alt="Gerakan Sosial"
            class="w-24 h-24 sm:w-32 sm:h-32 object-contain mx-auto"
          />
        </div>

        <!-- Logo 2 (GSI Event) - Fix ukuran agar tidak lebih kecil dari logo lain -->
        <div class="swiper-slide flex justify-center items-center">
          <img
            src="<?= base_url('img/ivent.png') ?>"
            alt="GSI Event"
            class="h-24 sm:h-32 w-auto max-w-[128px] sm:max-w-[160px] object-contain mx-auto"
          />
        </div>

        <!-- Logo 3 -->
        <div class="swiper-slide flex justify-center items-center">
          <img
            src="<?= base_url('img/mj.png') ?>"
            alt="MJ"
            class="w-24 h-24 sm:w-32 sm:h-32 object-contain mx-auto"
          />
        </div>
      </div>
    </div>
  </section>
</div>


<!-- Our Service -->
<div class="bg-black text-white flex justify-center items-center min-h-screen mt-[20px] sm:mt-[20px]">

  <section class="container mx-auto text-left py-16 px-6">
    <!-- Our Service Button -->
    <div class="mb-6 text-center md:text-left">
      <button
        class="px-6 py-2 border-2 border-yellow-400 text-white font-semibold rounded-full hover:bg-yellow-400 hover:text-black transition"
      >
        Our Service
      </button>
    </div>

    <!-- Section Title -->
    <h2 class="text-3xl md:text-4xl font-bold mb-10 text-center md:text-left">
      Solutions to handle your events
    </h2>

    <!-- Swiper Container for Mobile, Grid for Desktop -->
    <div class="swiper serviceSwiper md:hidden">
      <div class="swiper-wrapper">
        <!-- Cards inside Swiper (Mobile Mode) -->
        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">EVENT MANAGEMENT</h3>
              <p class="text-gray-300 text-sm mt-2">
              Product Launching,
              Gathering, Exhibition
              (MICE), Music Concert,
              Direct Selling, Campaign
              Activity, Private Party, Tour
              & Wisata
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">EVENT EQUIPMENT</h3>
              <p class="text-gray-300 text-sm mt-2">
                Sound System, Rigging,
                Stage, Genset, Barikade,
                Tent, Event & Party
                Equipments
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">PROMOSINDO</h3>
              <p class="text-gray-300 text-sm mt-2">
              ADVERTISING : Conventional
                & Unconventional Media 
                PROMOTION : Tools
                Merchandise, Stationary,
                Corporate ID, Uniform,   
                DIGITAL: Printing Outdoor &
                Indoor Print
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">PRODUCTION WORKSHOP</h3>
              <p class="text-gray-300 text-sm mt-2">
                2D & 3D Graphic Design,
                Interior Design,
                Special Booth Exhibition,
                and Other property event’s
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">TALENT AGENCY</h3>
              <p class="text-gray-300 text-sm mt-2">
                SPG, SPB, Usher, Model, LO,
                Artis, Band, MC, Dancer,
                Magician, Icon
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">MULTIMEDIA</h3>
              <p class="text-gray-300 text-sm mt-2">
                Video Recording, Editing,
                TVC, Projector, Screen,
                LCD/Plasma TV, Video Clip,
                Website, Company Profile,
                Photography
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">BUSINESS CONSULTANT</h3>
              <p class="text-gray-300 text-sm mt-2">
                Bisnis Kuliner, Cafe,
                Property & Asset
                Management
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- Pagination for Swiper -->
      <div class="swiper-pagination"></div>
    </div>
  </section>
</div>
<?= $this->endSection() ?>