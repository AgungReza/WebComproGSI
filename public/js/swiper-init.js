// sweeper carosel atas
document.addEventListener("DOMContentLoaded", function () {
  function initSwiper() {
    // Cek apakah layar lebih besar dari 768px (tablet & desktop)
    if (window.innerWidth >= 768) {
      var swiper = new Swiper(".swiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
        },
      });
    }
  }

  // Panggil fungsi saat halaman dimuat
  initSwiper();

  // Hapus Swiper saat ukuran layar berubah ke mobile
  window.addEventListener("resize", function () {
    document.querySelectorAll(".swiper").forEach((swiper) => {
      if (swiper.swiper) {
        swiper.swiper.destroy(true, true);
      }
    });
    initSwiper(); // Re-inisialisasi Swiper jika perlu
  });
});

//   sweeper bagian team
document.addEventListener("DOMContentLoaded", function () {
  var teamSwiper = new Swiper(".team-swiper", {
    slidesPerView: 1, // Default: 1 gambar di mobile
    spaceBetween: 10,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2, // 2 gambar di tablet
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3, // 3 gambar di desktop
        spaceBetween: 30,
      },
    },
  });
});

//   carosel bagian anak perusahaan
document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper(".logoSwiper", {
    slidesPerView: 1, // Default di layar kecil
    spaceBetween: 20, // Jarak antar logo
    loop: true, // Infinite loop
    autoplay: {
      delay: 5000, // Auto-slide setiap 0.5 detik
      disableOnInteraction: false, // Tetap autoplay meskipun user menggeser
    },
    breakpoints: {
      640: {
        slidesPerView: 2, // 2 logo di layar sedang
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3, // 3 logo di layar besar
        spaceBetween: 30,
      },
    },
  });
});

// bagian our service
document.addEventListener("DOMContentLoaded", function () {
  var serviceSwiper = new Swiper(".serviceSwiper", {
    slidesPerView: 4,
    spaceBetween: 10,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });
});

//fungsi tombol edit di halaman depan video
document.addEventListener("DOMContentLoaded", function () {
  // Pastikan elemen admin ada di halaman sebelum menjalankan Swiper
  if (!document.getElementById("adminGallerySwiper")) return;

  var adminSwiper = new Swiper(".gallery-swiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      640: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });

  // Fungsi untuk re-initialize Swiper jika ada elemen baru ditambahkan
  function reinitializeAdminSwiper() {
    adminSwiper.update();
  }
});

document.addEventListener("DOMContentLoaded", function () {
  // Open Modal
  function openModal() {
    document.getElementById("youtubeModal").classList.remove("hidden");
  }

  // Close Modal
  function closeModal() {
    document.getElementById("youtubeModal").classList.add("hidden");
  }

  // Confirm Change (Show Confirmation Modal)
  function confirmChange() {
    document.getElementById("youtubeModal").classList.add("hidden");
    document.getElementById("confirmModal").classList.remove("hidden");
  }

  // Close Confirmation Modal
  function closeConfirmModal() {
    document.getElementById("confirmModal").classList.add("hidden");
  }

  // Change Video in iframe
  function changeVideo() {
    let link = document.getElementById("youtubeLink").value;
    let videoId = extractYouTubeID(link);
    if (videoId) {
      document.getElementById("youtubeVideo").src =
        "https://www.youtube.com/embed/" + videoId;
    }
    closeConfirmModal();
  }

  // Extract YouTube Video ID from URL
  function extractYouTubeID(url) {
    let regExp =
      /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/]+\/.*|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
    let match = url.match(regExp);
    return match ? match[1] : null;
  }

  // Attach Event Listeners to Buttons
  document.getElementById("openModalBtn").addEventListener("click", openModal);
  document
    .getElementById("closeModalBtn")
    .addEventListener("click", closeModal);
  document
    .getElementById("changeVideoBtn")
    .addEventListener("click", confirmChange);
  document
    .getElementById("closeConfirmBtn")
    .addEventListener("click", closeConfirmModal);
  document
    .getElementById("confirmYesBtn")
    .addEventListener("click", changeVideo);
});

//fungsi galeri gambar bawah video halaman admin

document.addEventListener("DOMContentLoaded", function () {
  // Pastikan elemen admin ada di halaman sebelum menjalankan script
  if (!document.getElementById("adminGallerySwiper")) return;

  // Fungsi untuk membuka modal tambah gambar
  function openAdminImageModal() {
    document.getElementById("adminImageModal").classList.remove("hidden");
  }

  // Fungsi untuk menutup modal tambah gambar
  function closeAdminImageModal() {
    document.getElementById("adminImageModal").classList.add("hidden");
  }

  // Event listener untuk membuka modal dari tombol "Add Image"
  const openModalBtn = document.getElementById("adminAddImageBox");
  if (openModalBtn) {
    openModalBtn.addEventListener("click", openAdminImageModal);
  }

  // Event listener untuk menutup modal dari tombol "Cancel"
  const closeModalBtn = document.getElementById("adminCloseImageModal");
  if (closeModalBtn) {
    closeModalBtn.addEventListener("click", closeAdminImageModal);
  }

  // Fungsi untuk menambahkan gambar ke dalam Swiper
  function addImageToSwiper(imageSrc) {
    const swiperWrapper = document.querySelector(".swiper-wrapper");

    // Buat elemen slide baru
    const newSlide = document.createElement("div");
    newSlide.classList.add("swiper-slide", "relative");

    // Buat elemen gambar
    const newImage = document.createElement("img");
    newImage.src = imageSrc;
    newImage.classList.add(
      "rounded-lg",
      "shadow-lg",
      "w-full",
      "h-32",
      "md:h-48",
      "lg:h-64",
      "object-cover"
    );
    newImage.alt = "Gallery Image";

    // Buat tombol hapus
    const deleteButton = document.createElement("button");
    deleteButton.classList.add(
      "absolute",
      "top-2",
      "right-2",
      "bg-red-500",
      "text-white",
      "p-2",
      "rounded-full",
      "shadow-lg",
      "hover:bg-red-600",
      "transition",
      "deleteImageBtn"
    );
    deleteButton.innerHTML = "🗑️";

    // Tambahkan event listener untuk menghapus gambar
    deleteButton.addEventListener("click", function () {
      let confirmation = confirm("Are you sure you want to delete this image?");
      if (confirmation) {
        newSlide.remove();
        if (typeof adminSwiper !== "undefined") {
          adminSwiper.update();
        }
      }
    });

    // Tambahkan elemen ke dalam slide baru
    newSlide.appendChild(newImage);
    newSlide.appendChild(deleteButton);

    // Masukkan slide baru ke dalam Swiper
    swiperWrapper.appendChild(newSlide);

    // Update Swiper setelah elemen baru ditambahkan
    if (typeof adminSwiper !== "undefined") {
      adminSwiper.update();
    }
  }

  // Event listener untuk tombol "Upload" dengan preview
  const uploadImageBtn = document.getElementById("adminUploadImageBtn");
  const imageUploadInput = document.getElementById("adminImageUpload");

  if (uploadImageBtn && imageUploadInput) {
    uploadImageBtn.addEventListener("click", function () {
      const file = imageUploadInput.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          addImageToSwiper(e.target.result);
        };
        reader.readAsDataURL(file);
        alert("Image uploaded successfully!");
        closeAdminImageModal();
      } else {
        alert("Please select an image first.");
      }
    });
  }

  // Event delegation untuk tombol hapus gambar dalam Swiper
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("deleteImageBtn")) {
      let confirmation = confirm("Are you sure you want to delete this image?");
      if (confirmation) {
        event.target.closest(".swiper-slide").remove();
        if (typeof adminSwiper !== "undefined") {
          adminSwiper.update();
        }
      }
    }
  });
});

//bagian ourteam admin
document.addEventListener("DOMContentLoaded", function () {
  // Pastikan elemen ada di halaman
  if (!document.getElementById("teamSwiperContainer")) return;

  // Fungsi membuka modal
  function openTeamImageModal() {
    document.getElementById("teamImageModal").classList.remove("hidden");
  }

  // Fungsi menutup modal
  function closeTeamImageModal() {
    document.getElementById("teamImageModal").classList.add("hidden");
  }

  // Event listener untuk tombol tambah gambar
  const addImageBtn = document.getElementById("teamAddImageBox");
  if (addImageBtn) {
    addImageBtn.addEventListener("click", openTeamImageModal);
  }

  // Event listener untuk tombol "Cancel"
  const closeModalBtn = document.getElementById("teamCloseImageModal");
  if (closeModalBtn) {
    closeModalBtn.addEventListener("click", closeTeamImageModal);
  }

  // Fungsi untuk menambahkan anggota tim ke Swiper
  function addTeamMemberToSwiper(imageSrc, name, role) {
    const swiperWrapper = document.querySelector(".swiper-wrapper");

    // Buat elemen slide baru
    const newSlide = document.createElement("div");
    newSlide.classList.add(
      "swiper-slide",
      "flex",
      "justify-center",
      "items-center"
    );

    // Buat elemen container profil
    const profileContainer = document.createElement("div");
    profileContainer.classList.add("relative", "group", "w-60", "md:w-80");

    // Buat elemen gambar
    const newImage = document.createElement("img");
    newImage.src = imageSrc;
    newImage.classList.add("w-full", "rounded-lg");
    newImage.alt = name;

    // Informasi Nama & Role
    const infoContainer = document.createElement("div");
    infoContainer.classList.add(
      "absolute",
      "bottom-6",
      "left-6",
      "text-left",
      "z-10"
    );

    const nameText = document.createElement("p");
    nameText.classList.add(
      "text-white",
      "text-2xl",
      "md:text-3xl",
      "font-bold"
    );
    nameText.innerText = name;

    const roleText = document.createElement("p");
    roleText.classList.add(
      "text-gray-400",
      "text-base",
      "md:text-lg",
      "uppercase",
      "tracking-wide"
    );
    roleText.innerText = role;

    // Tombol hapus
    const deleteButton = document.createElement("button");
    deleteButton.classList.add(
      "absolute",
      "top-2",
      "right-2",
      "bg-red-500",
      "text-white",
      "p-2",
      "rounded-full",
      "shadow-lg",
      "hover:bg-red-600",
      "transition",
      "deleteTeamImageBtn",
      "z-50"
    );
    deleteButton.innerHTML = "🗑️";

    // Event listener untuk hapus
    deleteButton.addEventListener("click", function () {
      let confirmation = confirm(
        "Are you sure you want to delete this team member?"
      );
      if (confirmation) {
        newSlide.remove();
        if (typeof teamSwiper !== "undefined") {
          teamSwiper.update();
        }
      }
    });

    // Gabungkan elemen
    infoContainer.appendChild(nameText);
    infoContainer.appendChild(roleText);
    profileContainer.appendChild(newImage);
    profileContainer.appendChild(infoContainer);
    profileContainer.appendChild(deleteButton);
    newSlide.appendChild(profileContainer);
    swiperWrapper.appendChild(newSlide);

    // Update Swiper
    if (typeof teamSwiper !== "undefined") {
      teamSwiper.update();
    }
  }

  // Event listener untuk tombol upload
  document
    .getElementById("teamUploadImageBtn")
    .addEventListener("click", function () {
      const file = document.getElementById("teamImageUpload").files[0];
      const name = document.getElementById("teamMemberName").value;
      const role = document.getElementById("teamMemberRole").value;

      if (file && name && role) {
        const reader = new FileReader();
        reader.onload = function (e) {
          addTeamMemberToSwiper(e.target.result, name, role);
        };
        reader.readAsDataURL(file);
        alert("Team member added successfully!");
        closeTeamImageModal();
      } else {
        alert("Please complete all fields.");
      }
    });

  // Event listener untuk tombol delete di elemen yang sudah ada
  document.querySelectorAll(".deleteTeamImageBtn").forEach((button) => {
    button.addEventListener("click", function (event) {
      event.stopPropagation();
      const teamCard = button.closest(".swiper-slide");

      if (confirm("Are you sure you want to delete this team member?")) {
        teamCard.remove();
        if (typeof teamSwiper !== "undefined") {
          teamSwiper.update();
        }
      }
    });
  });
});

//buat bagian Our Works
document.addEventListener("DOMContentLoaded", function () {
  const addEventBtn = document.getElementById("addEventBtn");
  const eventModal = document.getElementById("eventModal");
  const closeEventModal = document.getElementById("closeEventModal");
  const saveEventBtn = document.getElementById("saveEventBtn");

  // Membuka modal
  addEventBtn.addEventListener("click", function () {
    eventModal.classList.remove("hidden");
  });

  // Menutup modal
  closeEventModal.addEventListener("click", function () {
    eventModal.classList.add("hidden");
  });

  // Fungsi untuk menambahkan event baru
  saveEventBtn.addEventListener("click", function () {
    const title = document.getElementById("eventTitle").value;
    const video = document.getElementById("eventVideo").value;
    const institution = document.getElementById("eventInstitution").value;
    const location = document.getElementById("eventLocation").value;
    const eventDate = document.getElementById("eventDate").value;
    const description = document.getElementById("eventDescription").value;

    if (
      !title ||
      !institution ||
      !location ||
      !eventDate ||
      description.length < 1000
    ) {
      alert(
        "Please fill all required fields and ensure the description is at least 1000 characters."
      );
      return;
    }

    // Tambahkan event ke daftar
    const eventContainer = document.getElementById("eventContainer");

    const newEventCard = document.createElement("div");
    newEventCard.classList.add(
      "event-card",
      "bg-gray-900",
      "rounded-lg",
      "overflow-hidden",
      "shadow-lg",
      "flex",
      "flex-col",
      "md:flex-row"
    );
    newEventCard.setAttribute("data-date", eventDate);

    const eventImage = document.createElement("img");
    eventImage.src = "img/event.jpg";
    eventImage.classList.add(
      "w-full",
      "md:w-1/3",
      "object-cover",
      "h-48",
      "md:h-auto"
    );
    eventImage.alt = title;

    const eventDetails = document.createElement("div");
    eventDetails.classList.add("p-6", "flex", "flex-col", "justify-between");

    const eventTitle = document.createElement("h3");
    eventTitle.classList.add("text-xl", "font-bold", "event-title");
    eventTitle.innerText = title;

    const eventDesc = document.createElement("p");
    eventDesc.classList.add("text-gray-300", "text-sm", "mt-2");
    eventDesc.innerText = description.slice(0, 100) + "..."; // Potong deskripsi untuk tampilan ringkas

    const eventMeta = document.createElement("div");
    eventMeta.classList.add(
      "mt-4",
      "flex",
      "flex-wrap",
      "gap-2",
      "text-sm",
      "text-gray-400"
    );

    const eventInstitutionText = document.createElement("p");
    eventInstitutionText.classList.add("text-yellow-400", "font-semibold");
    eventInstitutionText.innerText = institution;

    const eventLocationText = document.createElement("p");
    eventLocationText.classList.add("flex", "items-center");
    eventLocationText.innerText = `📍 ${location}`;

    const eventDateText = document.createElement("p");
    eventDateText.classList.add("flex", "items-center", "event-date");
    eventDateText.innerText = `📅 ${new Date(eventDate).toLocaleDateString()}`;

    // Tambahkan elemen ke dalam event card
    eventMeta.appendChild(eventInstitutionText);
    eventMeta.appendChild(eventLocationText);
    eventMeta.appendChild(eventDateText);

    eventDetails.appendChild(eventTitle);
    eventDetails.appendChild(eventDesc);
    eventDetails.appendChild(eventMeta);

    newEventCard.appendChild(eventImage);
    newEventCard.appendChild(eventDetails);

    // Tambahkan event ke container
    eventContainer.prepend(newEventCard);

    // Tutup modal
    eventModal.classList.add("hidden");

    // Reset form
    document.getElementById("eventTitle").value = "";
    document.getElementById("eventVideo").value = "";
    document.getElementById("eventInstitution").value = "";
    document.getElementById("eventLocation").value = "";
    document.getElementById("eventDate").value = "";
    document.getElementById("eventDescription").value = "";
  });
});

//tombol deletpageadmin
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".delete-event").forEach((button) => {
    button.addEventListener("click", function () {
      if (confirm("Are you sure you want to delete this event?")) {
        this.closest(".event-card").remove();
      }
    });
  });
});

//upload ajax galeri Homeadmin
document
  .getElementById("adminUploadImageBtn")
  .addEventListener("click", function () {
    let fileInput = document.getElementById("adminImageUpload");
    let file = fileInput.files[0];

    if (!file) {
      alert("Please select an image file.");
      return;
    }

    let formData = new FormData();
    formData.append("image", file);

    fetch("/gallery/upload", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status === "success") {
          alert("Image uploaded successfully!");
          fileInput.value = ""; // Reset file input
        } else {
          alert("Failed to upload image.");
        }
      })
      .catch((error) => console.error("Error:", error));
  });

  
