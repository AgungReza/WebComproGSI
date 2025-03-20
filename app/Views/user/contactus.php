<?= $this->extend('layout/header') ?>

<?= $this->section('title') ?>
GSI - Contact Us
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="bg-black text-white flex justify-center items-center min-h-screen">
    <div id="customBox" class="bg-gray-900 border-yellow-400 border-4 rounded-xl shadow-lg p-4 md:p-8 flex flex-col md:flex-row items-center w-full max-w-4xl relative overflow-visible mt-[-30px] md:mt-[-200px] mx-4">
        <!-- Fox Image - Top on Mobile, Right on Desktop -->
        <div class="relative mt-16 -top-8 mb-4 z-20 md:absolute md:right-[-10px] md:top-[-103px] md:mt-0 transition-all duration-500">
            <img src="img/fox.png" alt="Fox Mascot" class="w-64 md:w-[375px] h-auto drop-shadow-lg z-50" />
        </div>

        <!-- Left Section: Contact Info -->
        <div class="flex-1 text-left z-10 px-4 py-4 md:py-0">
            <h2 class="text-4xl md:text-8xl font-bold text-yellow-400">Contact <span class="text-white">Us</span></h2>
            <div class="mt-4 space-y-3 pl-[15px] md:pl-[25px]">
                <p class="flex items-center text-base md:text-lg"><span class="mr-3">✉️</span> gsi.eventorganizer@gmail.com</p>
                <p class="flex items-center text-base md:text-lg"><span class="mr-3">📞</span> 0817277813 / 082177777813</p>
                <p class="flex items-center text-base md:text-lg">
                    <span class="mr-3">🏠</span>Jl. Dworowati No 77, Nglarang Wedomartani,<br />
                    Ngemplak, Sleman Yogyakarta (Timur Jogja Bay)
                </p>
            </div>
            <button class="mt-6 bg-yellow-400 text-black font-semibold px-6 py-2 rounded-md hover:bg-yellow-500 transition">
                Chat Admin
            </button>
        </div>
    </div>
</div>
<?= $this->endSection() ?>