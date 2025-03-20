<?= $this->extend('layout/admin/headers') ?>

<?= $this->section('title') ?>
GSI - Our Works Admin
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative">
  <!-- Background Image -->
  <div class="relative">
    <img src= <?= base_url("img/Contoh Gambar.png")?> alt="Event" class="w-full h-[300px] sm:h-[350px] md:h-[400px] object-cover opacity-80" />
    <!-- Overlay Gradient -->
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
  </div>

  <!-- Content -->
  <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
    <button class="px-6 py-2 border-2 border-yellow-400 text-white font-semibold rounded-full mb-4 hover:bg-yellow-400 hover:text-black transition">
      Our Works
    </button>
    <h2 class="text-2xl sm:text-3xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
      Successfully Organized a Series of <br class="hidden sm:block" />
      High-Quality Events
    </h2>
  </div>
</section>

<section class="container mx-auto px-4 sm:px-6 md:px-12 lg:px-20 py-16">
  <div class="flex flex-col md:flex-row justify-between items-center mb-6">
    <div class="mb-4 md:mb-0">
      <label for="sortEvents" class="text-white font-semibold mr-2">Sort by:</label>
      <select id="sortEvents" class="px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-600" onchange="sortEvents()">
        <option value="DESC">Newest to Oldest</option>
        <option value="ASC">Oldest to Newest</option>
      </select>
    </div>

    <div class="relative w-full md:w-1/3 flex">
      <input type="text" id="searchEvents" class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-600 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Search events..." />
      <button onclick="searchEvents()" class="ml-2 px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-400 transition">Search</button>
    </div>

    <button id="addEventBtn" class="bg-yellow-500 text-black px-6 py-2 rounded-lg hover:bg-yellow-400 transition">+ Add Event</button>
  </div>

  <div id="eventContainer" class="flex flex-col space-y-6">
    <?php foreach ($works as $work) : ?>
      <div class="event-card bg-gray-900 rounded-lg overflow-hidden shadow-lg flex flex-col md:flex-row relative cursor-pointer hover:opacity-80 transition"
      onclick="openEventDetail(<?= $work['id'] ?>)">
        <!-- Tombol Delete -->
        <button class="delete-event absolute top-2 right-2 bg-red-500 text-white px-2 py-1 text-xs rounded-lg hover:bg-red-600 transition" onclick="confirmDelete(<?= $work['id'] ?>)">✖</button>
        
        <!-- Gambar Event -->
        <img 
        src="<?= !empty($work['image']) ? base_url($work['image']) : base_url('img/default.png') ?>" 
        alt="<?= esc($work['title']) ?>" 
        class="w-full md:w-1/3 h-48 object-cover" 
        />

        <!-- Konten Event -->
        <div class="p-6 flex flex-col justify-between">
          <div>
            <h3 class="text-xl font-bold"><?= esc($work['title']) ?></h3>
            <p class="text-gray-300 text-sm mt-2">
              <?= esc(substr($work['description'], 0, 100)) ?><?php if (strlen($work['description']) > 100) echo '...'; ?>
            </p>
            <?php if (strlen($work['description']) > 100): ?>
            <?php endif; ?>
          </div>
          <div class="mt-4 flex flex-wrap gap-2 text-sm text-gray-400">
            <p class="text-yellow-400 font-semibold">
              <?= esc($work['institution']) ?>
            </p>
            <p class="flex items-center">📍 <?= esc($work['location']) ?></p>
            <p class="flex items-center">📅 <?= esc($work['event_date']) ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
</div>

</section>

<!-- Modal for Adding Event -->
<div id="eventModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
  <div class="bg-white p-6 rounded-lg shadow-lg w-96">
    <h2 class="text-lg font-bold mb-3 text-black">Add New Event</h2>

    <form id="eventForm" action="<?= site_url('/admin/create') ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>
      
      <input type="text" name="title" class="w-full border border-gray-400 px-4 py-2 rounded-lg text-black" placeholder="Enter Title" required />
      <input type="text" name="video" class="w-full mt-3 border border-gray-400 px-4 py-2 rounded-lg text-black" placeholder="YouTube Video Link (Optional)" />
      <input type="text" name="institution" class="w-full mt-3 border border-gray-400 px-4 py-2 rounded-lg text-black" placeholder="Enter Institution" required />
      <input type="text" name="location" class="w-full mt-3 border border-gray-400 px-4 py-2 rounded-lg text-black" placeholder="Enter Location" required />
      <input type="date" name="event_date" class="w-full mt-3 border border-gray-400 px-4 py-2 rounded-lg text-black" required />
      <textarea name="description" class="w-full mt-3 border border-gray-400 px-4 py-2 rounded-lg text-black h-40" placeholder="Enter Event Description" required></textarea>

      <!-- Input Upload Gambar -->
      <label class="block text-black mt-3 font-semibold">Upload Image (Max: 5MB)</label>
      <input type="file" name="image" id="image" class="w-full border border-gray-400 px-4 py-2 rounded-lg text-black" accept="image/*" required />

      <div class="flex justify-end gap-3 mt-4">
        <button type="button" id="closeEventModal" class="px-4 py-2 bg-gray-300 text-black rounded-lg hover:bg-gray-400">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-400">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
// Fungsi Validasi Gambar Sebelum Upload
document.getElementById("image").addEventListener("change", function () {
  const file = this.files[0];
  if (file) {
    const fileSize = file.size / 1024 / 1024; // Convert to MB
    const allowedTypes = ["image/jpeg", "image/png", "image/gif"];

    if (!allowedTypes.includes(file.type)) {
      alert("Only JPG, PNG, and GIF files are allowed.");
      this.value = ""; // Hapus file yang tidak valid
    } else if (fileSize > 5) {
      alert("File size must not exceed 5MB.");
      this.value = ""; // Hapus file yang terlalu besar
    }
  }
});

function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this event?")) {
    window.location.href = "/admin/delete/" + id;
  }
}

function sortEvents() {
  const sortOrder = document.getElementById('sortEvents').value;
  window.location.href = "/admin/works?sort=" + sortOrder;
}

function searchEvents() {
  const searchQuery = document.getElementById('searchEvents').value;
  window.location.href = "/admin/works?search=" + searchQuery;
}

document.getElementById("addEventBtn").addEventListener("click", function() {
  document.getElementById("eventModal").classList.remove("hidden");
});

document.getElementById("closeEventModal").addEventListener("click", function() {
  document.getElementById("eventModal").classList.add("hidden");
});

document.getElementById("eventForm").addEventListener("submit", function(event) {
    console.log("Form submitted!");  // Debugging
});

function openEventDetail(id) {
  window.location.href = "/content/" + id;
}
</script>

<?= $this->endSection() ?>
