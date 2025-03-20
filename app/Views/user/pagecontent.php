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

<section class="px-6 py-8 max-w-4xl mx-auto bg-gray-900 mt-[-50px]">
  <div class="flex items-center justify-center space-x-6 text-gray-400">
    <div class="flex items-center">
      📍 <span><?= esc($work['location']) ?></span>
    </div>
    <div class="flex items-center">
      📅 <span><?= esc($work['event_date']) ?></span>
    </div>
  </div>

  <div class="mt-6 text-gray-300 text-left">
    <p><?= nl2br(esc($work['description'])) ?></p>
  </div>
</section>

<?= $this->endSection() ?>
