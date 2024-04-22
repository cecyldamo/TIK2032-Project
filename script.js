//Animasi saat Halaman Dimuat
document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('section');
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
    });
    
    setTimeout(() => {
        sections.forEach(section => {
            section.style.transition = 'opacity 0.3s, transform 0.3s';
            section.style.opacity = '1';
            section.style.transform = 'translateY(0)';
        });
    }, 200);

// Membuat efek Parallax pada header
window.addEventListener('scroll', function(){
    const header = document.querySelector('header');
    header.style.backgroundPositionY = -window.scrollY / 2 + 'px';
});

//javascript untuk blog page
// Efek hover pada artikel
const articles = document.querySelectorAll('.blog > article');

articles.forEach(article => {
    article.addEventListener('mouseover', () => {
        article.style.transform = 'scale(1.02)';
        article.style.transition = 'transform 0.3s ease';
    });

    article.addEventListener('mouseout', () => {
        article.style.transform = 'scale(1)';
        article.style.transition = 'transform 0.3s ease';
    });
});

//javascript untuk gallery page
// Menambahkan efek modal pada gambar
const images = document.querySelectorAll('.gallery img');
images.forEach(img => {
    img.addEventListener('click', function(){
        const modal = document.createElement('div');
        modal.classList.add('modal');
        const imgModal = document.createElement('img');
        imgModal.src = this.src;
        modal.appendChild(imgModal);
        document.body.appendChild(modal);
        modal.addEventListener('click', function(){
            this.remove();
        });
    });
});

//javascript untuk index page
// Animasi foto profil saat dihover
var noteButton = document.querySelector("#popup");
if (noteButton) { //memeriksa apakah tombol ada di page
    noteButton.addEventListener("click", function() {
        notefromme();
    });
}
function notefromme() {
    alert("Hello there!❤ Thank you for visiting My Website! May this message✉ add a touch of brightness to your day🥰");
}

const fotoProfil = document.querySelector('.foto_profil img');
fotoProfil.addEventListener('mouseover', () => {
    fotoProfil.style.transform = 'translateX(-10px)';
});
fotoProfil.addEventListener('mouseout', () => {
    fotoProfil.style.transform = 'translateX(0)';
});

const text = "Welcome to My Page!";
let index = 0;

function typeWriter() {
    if (index < text.length) {
        document.getElementById("typing-text").innerHTML += text.charAt(index);
        index++;
        setTimeout(typeWriter, 90); // Waktu delay (ms)
    }
}

typeWriter();

});