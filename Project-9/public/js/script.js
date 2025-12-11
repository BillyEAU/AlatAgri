document.addEventListener("DOMContentLoaded", () => {
    const imageInput = document.querySelector(".input-gambar");
    const previewImage = document.getElementById("preview-image");
    const fileName = document.querySelector(".file-name");

    if (!imageInput) return;

    imageInput.addEventListener("change", function (event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            fileName.textContent = file.name;

            reader.onload = function (e) {
                if (previewImage) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block";
                }
            };

            reader.readAsDataURL(file);
        } else {
            if (previewImage) previewImage.style.display = "none";
            fileName.textContent = "Tidak ada file yang dipilih";
        }
    });
});

// // popup
// const signIn = document.querySelector(".btn_signin");
// // event
// signIn.addEventListener("click", function () {
//     const pilihan = confirm("Ingin ke halaman Login?");
//     if (pilihan == false) {
//         alert("Pengguna membatalkan");
//         event.preventDefault();
//     } else {
//         console.log("Mengalihkan Anda ke halaman Login");
//     }
// });

const navList = document.querySelector("nav ul");
const serviceLink = navList.children[3];
if (serviceLink.textContent.includes("Pelayanan Kami")) {
    navList.removeChild(serviceLink);
    console.log("Tautan 'Pelayanan Kami' telah dihapus.");
}

// fungsi mengubah deskripsi sesuai waktu
function updateHeroDescriptionByTime() {
    const descriptionParagraph = document.querySelector(".hero-content p");

    // Jika elemen tidak ditemukan, maka fungsi akan dihentikan
    if (!descriptionParagraph) {
        console.error("Elemen deskripsi hero tidak ditemukan.");
        return;
    }

    const now = new Date();
    const hour = now.getHours(); // Mengambil jam

    let greeting = "";
    let newDescription = "";

    if (hour >= 5 && hour < 12) {
        greeting = "Selamat Pagi, Petani Indonesia! ☀️";
        newDescription =
            "Saatnya memulai hari dengan alat terbaik. Sewa alat pertanian dan peternakan modern untuk hasil panen yang melimpah.";
    } else if (hour >= 12 && hour < 18) {
        greeting = "Selamat Siang! 🌾";
        newDescription =
            "Maksimalkan hasil kerja Anda. Temukan pupuk, bibit, pakan, hingga rennet berkualitas yang kami sediakan.";
    } else {
        greeting = "Selamat Malam. ✨";
        newDescription =
            "Jelajahi solusi agribisnis kami untuk perencanaan musim tanam berikutnya. Semuanya ada di AlatAgri.";
    }

    descriptionParagraph.textContent = `${greeting} ${newDescription}`;

    console.log(
        `Deskripsi hero diubah menjadi: ${descriptionParagraph.textContent}`
    );
}

updateHeroDescriptionByTime();

function myFunction() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function () {
        x.className = x.className.replace("show", "");
    }, 3000);
}
