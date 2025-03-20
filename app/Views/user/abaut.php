<?= $this->extend('layout/header') ?>

<?= $this->section('title') ?>
GSI - About
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="relative">
    <!-- Background Image -->
    <div class="relative">
        <img
            src="<?= base_url('img/Contoh Gambar.png') ?>"
            alt="Event"
            class="w-full h-[400px] object-cover opacity-80"
        />
        <!-- Overlay Gradient -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
    </div>

    <!-- Logo in Center -->
    <div class="absolute inset-0 flex flex-col justify-center items-center">
        <h2 class="flex justify-center">
            <img
                src="<?= base_url('img/logo.png') ?>"
                alt="Grand Spartan Indonesia"
                class="w-full md:w-2/3 max-w-4xl"
            />
        </h2>
    </div>
</section>

<!-- Text Section -->
<section class="text-white text-center px-6 py-12 max-w-4xl mx-auto">
    <p class="text-2xl md:text-2xl leading-relaxed text-gray-300">
        Kami berdiri pada tahun 2010 dengan CV Spartan Indonesia, pada tahun
        2013 kami rebranding dengan nama CV Grand Spartan Indonesia (G.S.I).
        Kami berhasil mengembangkan bisnis yang berbasis Event Organizer (EO)
        yang memiliki beberapa divisi di antaranya, Event Production, Event
        Equipment, Talent Agency, Promotion dan memiliki workshop sendiri.
        Sesuai dengan pengembangan bisnis, kami secara legal tahun 2019 berubah
        menjadi
        <span class="font-bold">PT. GRANDSPARTAN INDONESIA GRUP</span>.
    </p>
</section>

<div class="bg-black text-white py-16">
    <div class="max-w-3xl mx-auto text-left px-6">
        <!-- Button Vision -->
        <button class="border-2 border-yellow-400 text-white px-6 py-2 rounded-full uppercase text-sm font-semibold mb-4">
            Vision
        </button>
        <!-- Additional Text -->
        <p class="text-lg">
            Membangun bisnis berkesinambungan dan
            membuka lapangan kerja sebanyak-banyaknya
            dibidang creative bisnis dan sosial
        </p>
    </div>
</div>


<div class="bg-black text-white py-16">
    <div class="max-w-3xl mx-auto text-left px-6">
        <button class="border-2 border-yellow-400 text-white px-6 py-2 rounded-full uppercase text-sm font-semibold mb-4">
            Mission
        </button>
        <ul class="space-y-3 text-lg">
            <li class="flex items-center">
                <span class="text-yellow-400 text-2xl mr-2">O</span> Membangun team yang kompeten
            </li>
            <li class="flex items-center">
                <span class="text-yellow-400 text-2xl mr-2">O</span> Bekerja sesuai dengan standar kualitas
            </li>
            <li class="flex items-center">
                <span class="text-yellow-400 text-2xl mr-2">O</span> Menciptakan karya/hasil kerja yang menarik
            </li>
            <li class="flex items-center">
                <span class="text-yellow-400 text-2xl mr-2">O</span> Membangun linier bisnis sebanyak-banyaknya
            </li>
            <li class="flex items-center">
                <span class="text-yellow-400 text-2xl mr-2">O</span> Menggerakkan “Gerakan Sosial Indonesia” sebagai bentuk kepedulian sosial kami
            </li>
        </ul>

    </div>
</div>
    


<?= $this->endSection() ?>