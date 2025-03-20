<?= $this->extend('layout/header') ?>

<?= $this->section('title') ?>
<?= esc($work['title']) ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="relative">
  <div class="relative">
    <img
      src="<?= base_url($work['image']) ?>"
      alt="<?= esc($work['title']) ?>"
      class="w-full h-[450px] object-cover opacity-80"
    />
    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
  </div>

  <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 mt-[-100px]">
    <h2 class="text-5xl md:text-6xl font-bold"><?= esc($work['title']) ?></h2>
    <p class="text-lg text-gray-300 mt-2"><?= esc($work['institution']) ?></p>
  </div>
  </div>
</section>

<section class="flex flex-col items-center justify-center px-4 py-12 bg-gray-900">
  <div class="w-full max-w-5xl mt-[-150px] z-10">
    <iframe
      class="w-full rounded-lg aspect-video"
      src="<?= esc($work['video']) ?>"
      title="Event Video"
      frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
      allowfullscreen
    ></iframe>
  </div>
</section>

<section class="w-full min-h-screen bg-gray-900 flex flex-col items-center justify-center px-6 py-12">
  <div class="max-w-4xl w-full text-center text-gray-400">
    <div class="flex flex-wrap justify-center space-x-6 mb-6">
      <div class="flex items-center">
        📍 <span class="ml-1"><?= esc($work['location']) ?></span>
      </div>
      <div class="flex items-center">
        📅 <span class="ml-1"><?= esc($work['event_date']) ?></span>
      </div>
    </div>

    <div class="text-gray-300 text-left bg-gray-800/80 p-6 rounded-lg shadow-lg">
      <p><?= nl2br(esc($work['description'])) ?></p>
    </div>
  </div>
</section>


<?= $this->endSection() ?>
