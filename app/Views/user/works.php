<?= $this->extend('layout/header') ?>

<?= $this->section('title') ?>
GSI - Our Works
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative">
  <div class="relative">
    <img src="<?= base_url("img/Contoh Gambar.png") ?>" alt="Event" class="w-full h-[300px] sm:h-[350px] md:h-[400px] object-cover opacity-80" />
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
  </div>

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

<!-- Search & Sort Controls -->
<section class="container mx-auto px-4 sm:px-6 md:px-12 lg:px-20 py-16">
  <div class="flex flex-col md:flex-row justify-between items-center mb-6">
    <div class="mb-4 md:mb-0">
      <label for="sortEvents" class="text-white font-semibold mr-2">Sort by:</label>
      <select id="sortEvents" class="px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-600" onchange="sortEvents()">
        <option value="DESC" <?= ($sortOrder === 'DESC') ? 'selected' : '' ?>>Newest to Oldest</option>
        <option value="ASC" <?= ($sortOrder === 'ASC') ? 'selected' : '' ?>>Oldest to Newest</option>
      </select>
    </div>

    <div class="relative w-full md:w-1/3 flex">
      <input type="text" id="searchEvents" class="w-full px-4 py-2 rounded-lg bg-gray-800 text-white border border-gray-600 focus:ring-yellow-500 focus:border-yellow-500" placeholder="Search events..." />
      <button onclick="searchEvents()" class="ml-2 px-4 py-2 bg-yellow-500 text-black rounded-lg hover:bg-yellow-400 transition">Search</button>
    </div>
  </div>

  <div id="eventContainer" class="flex flex-col space-y-6">
    <?php foreach ($works as $work) : ?>
      <div class="event-card bg-gray-900 rounded-lg overflow-hidden shadow-lg flex flex-col md:flex-row relative cursor-pointer hover:opacity-80 transition"
      onclick="openEventDetail(<?= $work['id'] ?>)">
        
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

<script>
function sortEvents() {
  const sortOrder = document.getElementById('sortEvents').value;
  window.location.href = "/works?sort=" + sortOrder;
}

function searchEvents() {
  const searchQuery = document.getElementById('searchEvents').value;
  window.location.href = "/works?search=" + searchQuery;
}

function openEventDetail(id) {
  window.location.href = "/workdetail/" + id;
}
</script>

<?= $this->endSection() ?>
