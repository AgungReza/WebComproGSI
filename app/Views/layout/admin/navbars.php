<nav class="relative flex justify-between items-center p-6 bg-black border-b border-yellow-500">
  <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold pl-4 md:pl-[50px] lg:pl-[250px]">GSI</h1>
  
  <!-- Menu for Desktop and Tablet (Centered) -->
  <div class="hidden md:flex flex-1 justify-center">
    <ul class="flex space-x-6 lg:space-x-[50px]">
      <li><a href="<?= site_url('admin/dashboard') ?>" class="font-bold hover:text-yellow-400">Home</a></li>
      <li><a href="<?= site_url('admin/works') ?>" class="font-bold hover:text-yellow-400">Works</a></li>
    </ul>
  </div>
  
  <!-- Contact Button for Desktop and Tablet -->
  <a href="<?= site_url('admin/logout') ?>" 
    class="hidden md:block bg-yellow-400 text-black mr-[280px] px-4 py-2 rounded hover:text-white hover:bg-black border-2 border-yellow-400">
    logout
  </a>
  
  <!-- Burger Menu for Mobile (Visible on Mobile Only) -->
  <div class="md:hidden">
    <button id="burger-menu" class="text-white text-3xl focus:outline-none">
      &#9776;
    </button>
  </div>
</nav>

<!-- Dropdown Menu for Mobile -->
<div id="mobile-menu" class="hidden bg-black text-white p-4 absolute top-20 left-0 w-full border-t border-yellow-500 shadow-lg z-50">
  <ul class="flex flex-col space-y-4 text-center">
    <li><a href="admin/homeadmin" class="block py-2 font-bold hover:text-yellow-400">Home</a></li>
    <li><a href="admin/works" class="block py-2 font-bold hover:text-yellow-400">Works</a></li>
    <li><a href="admin/logout" class="block py-2 font-bold bg-yellow-400 text-black px-4 py-2 rounded hover:text-white hover:bg-black border-2 border-yellow-400">logout</a></li>
  </ul>
</div>

<!-- JavaScript for Mobile Menu Toggle -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const burgerMenu = document.getElementById("burger-menu");
    const mobileMenu = document.getElementById("mobile-menu");

    burgerMenu.addEventListener("click", function (event) {
      event.stopPropagation(); // Mencegah event klik dari merambat ke document
      mobileMenu.classList.toggle("hidden");
    });

    // Menutup dropdown saat klik di luar
    document.addEventListener("click", function (event) {
      if (!mobileMenu.contains(event.target) && !burgerMenu.contains(event.target)) {
        mobileMenu.classList.add("hidden");
      }
    });
  });
</script>
