<?= $this->extend('layout/admin/headers') ?>

<?= $this->section('title') ?>
GSI - HomeAdmin
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Home Section -->
<div class="relative min-h-screen flex items-center justify-center">
      <!-- Background Image -->
      <div class="absolute inset-0">
      <img src="<?= base_url('img/Contoh Gambar.png') ?>" alt="Background" class="w-full h-full object-cover opacity-50" />
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
            <?php
            // Ambil video dari database
            $settingsModel = new \App\Models\SettingsModel();
            $settings = $settingsModel->first();
            $videoUrl = !empty($settings['main_video']) ? $settings['main_video'] : 'https://www.youtube.com/embed/zVaZhFskbEc';
            ?>
            <!-- Video Container -->
            <div class="relative w-full max-w-3xl mx-auto">
                <button id="openModalBtn" class="absolute top-2 left-2 bg-yellow-500 text-black px-3 py-1 text-xs font-semibold rounded-full hover:bg-yellow-400 transition">
                    ✎ Edit
                </button>

                <!-- YouTube Video -->
                <iframe id="youtubeVideo" class="w-full h-48 md:h-64 lg:h-96 rounded-lg" src="<?= esc($videoUrl) ?>" title="Event Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <!-- Modal Form -->
            <div id="youtubeModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg w-80">
                    <h2 class="text-lg font-bold mb-3 text-black">Change Video</h2>

                    <!-- Pratinjau Video -->
                    <div class="mb-3">
                        <iframe id="videoPreview" class="w-full h-40 rounded-lg hidden" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>

                    <!-- Form untuk update video -->
                    <form id="updateVideoForm" action="<?= site_url('/admin/update-video') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="text" name="main_video" id="youtubeLink" class="w-full border border-gray-400 px-4 py-2 rounded-lg text-black placeholder-gray-500 focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500" placeholder="Paste YouTube Link" required />
                        
                        <div class="flex justify-end gap-3 mt-4">
                            <button type="button" id="closeModalBtn" class="px-4 py-2 bg-gray-300 text-black rounded-lg hover:bg-gray-400">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-400">Change</button>
                        </div>
                    </form>
                </div>
            </div>

               <!-- Image Gallery -->
            <div class="mt-4 flex justify-center">
                <button id="openGalleryModal" class="px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-400">Add Image to Gallery</button>
            </div>

            <div id="adminGallerySwiper" class="gallery-swiper hidden md:block mt-[25px] swiper relative w-full max-w-3xl">
              <div class="swiper-wrapper">
                  <?php if (!empty($gallery)): ?>
                      <?php foreach ($gallery as $image): ?>
                          <div class="swiper-slide relative">
                              <img src="<?= base_url('uploads/gallery/' . $image['image']) ?>" class="rounded-lg shadow-lg w-full h-32 md:h-48 lg:h-64 object-cover" alt="Gallery Image" />
                              <form action="<?= site_url('/admin/delete-gallery/' . $image['id']) ?>" method="post" class="absolute top-2 right-2">
                                  <?= csrf_field() ?>
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button type="submit" class="bg-red-500 text-white p-2 rounded-full shadow-lg hover:bg-red-600 transition" onclick="return confirm('Are you sure you want to delete this image?');">🗑️</button>
                              </form>
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

<!-- Modal for Adding Image to Gallery -->
<div id="galleryModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-80">
        <h2 class="text-lg font-bold mb-3 text-black">Add New Image to Gallery</h2>
        <form action="<?= site_url('/admin/upload-gallery') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="file" name="image" accept="image/*" required class="w-full border border-gray-400 px-4 py-2 rounded-lg text-black focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500" />
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" id="closeGalleryModal" class="px-4 py-2 bg-gray-300 text-black rounded-lg hover:bg-gray-400">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-400">Upload</button>
            </div>
        </form>
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

<!-- Our Team Section -->
<div class="bg-black text-white flex justify-center items-center min-h-screen">
    <section class="container mx-auto text-center py-16">
        <!-- Our Team Button -->
        <div class="mb-6">
            <button id="openTeamModal" class="px-6 py-2 border-2 border-yellow-400 text-white font-semibold rounded-full hover:bg-yellow-400 hover:text-black transition">
                Add Team Member
            </button>
        </div>

        <!-- Section Title -->
        <h2 class="text-3xl md:text-4xl font-bold mb-10">
            Who We Are : The Minds <br />
            Behind Memorable Events
        </h2>

        <!-- Team Members -->
        <div class="swiper team-swiper max-w-5xl mx-[25px]">
            <div class="swiper-wrapper">
                <?php if (!empty($team)): ?>
                    <?php foreach ($team as $member): ?>
                        <div class="swiper-slide flex justify-center items-center relative">
                            <div class="relative group w-60 md:w-80">
                                <img src="<?= base_url('uploads/team/' . $member['photo']) ?>" alt="<?= esc($member['name']) ?>" class="w-full rounded-lg" />
                                <div class="absolute inset-0 bg-black/40 rounded-lg group-hover:opacity-70 transition"></div>
                                <div class="absolute bottom-6 left-6 text-left">
                                    <p class="text-white text-2xl md:text-3xl font-bold"><?= esc($member['name']) ?></p>
                                    <p class="text-gray-400 text-base md:text-lg uppercase tracking-wide"><?= esc($member['position']) ?></p>
                                </div>
                                <form action="<?= site_url('/admin/delete-team/' . $member['id']) ?>" method="post" class="absolute top-2 right-2">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="bg-red-500 text-white p-2 rounded-full shadow-lg hover:bg-red-600 transition" onclick="return confirm('Are you sure you want to delete this team member?');">🗑️</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center text-gray-500">No team members found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>

<!-- Modal for Adding Team Member -->
<div id="teamModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-80" onclick="event.stopPropagation();">
        <h2 class="text-lg font-bold mb-3 text-black">Add New Team Member</h2>
        <form id="teamForm" action="<?= site_url('/admin/upload-team') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="file" name="photo" id="photoInput" accept="image/*" required class="w-full border border-gray-400 px-4 py-2 rounded-lg text-black focus:outline-none focus:border-yellow-500 focus:ring-1 focus:ring-yellow-500" />
            <input type="text" name="name" placeholder="Enter Name" required class="w-full mt-3 border border-gray-400 px-4 py-2 rounded-lg text-black focus:outline-none" />
            <input type="text" name="position" placeholder="Enter Position" required class="w-full mt-3 border border-gray-400 px-4 py-2 rounded-lg text-black focus:outline-none" />
            <textarea name="bio" placeholder="Enter Biography" required class="w-full mt-3 border border-gray-400 px-4 py-2 rounded-lg text-black focus:outline-none h-20"></textarea>
            <div class="flex justify-end gap-3 mt-4">
                <button type="button" id="closeTeamModal" class="px-4 py-2 bg-gray-300 text-black rounded-lg hover:bg-gray-400">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-400">Add</button>
            </div>
        </form>
    </div>
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
              <h3 class="text-xl font-bold">Corporate Events</h3>
              <p class="text-gray-300 text-sm mt-2">
                Sit aliquam elementum cras dui. Massa pellentesque adipiscing pretium.
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">Corporate Events</h3>
              <p class="text-gray-300 text-sm mt-2">
                Sit aliquam elementum cras dui. Massa pellentesque adipiscing pretium.
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">Corporate Events</h3>
              <p class="text-gray-300 text-sm mt-2">
                Sit aliquam elementum cras dui. Massa pellentesque adipiscing pretium.
              </p>
            </div>
          </div>
        </div>

        <div class="swiper-slide">
          <div class="bg-gray-900 rounded-lg overflow-hidden shadow-lg">
            <img src="img/service.jpg" alt="Corporate Events" class="w-full h-48 object-cover" />
            <div class="p-6">
              <h3 class="text-xl font-bold">Corporate Events</h3>
              <p class="text-gray-300 text-sm mt-2">
                Sit aliquam elementum cras dui. Massa pellentesque adipiscing pretium.
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

<script>
document.getElementById("youtubeLink").addEventListener("input", function () {
    let inputUrl = this.value;
    let embedUrl = convertToEmbedUrl(inputUrl);
    
    if (embedUrl) {
        document.getElementById("videoPreview").src = embedUrl;
        document.getElementById("videoPreview").classList.remove("hidden");
    } else {
        document.getElementById("videoPreview").classList.add("hidden");
    }
});

function convertToEmbedUrl(url) {
    let videoId = "";

    // Jika URL dalam format normal (https://www.youtube.com/watch?v=VIDEO_ID)
    if (url.includes("youtube.com/watch?v=")) {
        videoId = url.split("v=")[1].split("&")[0];
    } 
    // Jika URL dalam format share (https://youtu.be/VIDEO_ID)
    else if (url.includes("youtu.be/")) {
        videoId = url.split("youtu.be/")[1].split("?")[0];
    }

    // Jika videoId ditemukan, kembalikan URL embed
    return videoId ? `https://www.youtube.com/embed/${videoId}` : "";
}

// Modal for Gallery
document.getElementById("openGalleryModal").addEventListener("click", function() {
    document.getElementById("galleryModal").classList.remove("hidden");
});

document.getElementById("closeGalleryModal").addEventListener("click", function() {
    document.getElementById("galleryModal").classList.add("hidden");
});

// Close modal when clicking outside of it
document.getElementById("galleryModal").addEventListener("click", function(event) {
    if (event.target === this) {
        this.classList.add("hidden");
    }
});

// Modal for Team
document.getElementById("openTeamModal").addEventListener("click", function() {
    document.getElementById("teamModal").classList.remove("hidden");
});

document.getElementById("closeTeamModal").addEventListener("click", function() {
    document.getElementById("teamModal").classList.add("hidden");
});

// Close modal when clicking outside of it
document.getElementById("teamModal").addEventListener("click", function(event) {
    if (event.target === this) {
        this.classList.add("hidden");
    }
});
</script>
<?= $this->endSection() ?>