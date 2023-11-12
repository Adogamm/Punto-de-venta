document.addEventListener('DOMContentLoaded', function () {
    cargarImagenAleatoria();
});

function cargarImagenAleatoria() {
    const contenedorImagen = document.getElementById('hero');

    // Lista de imágenes predefinida
    const imagenes = [
        'img/heroImages/1.jpg',
        'img/heroImages/2.jpg',
        'img/heroImages/3.jpg',
        'img/heroImages/4.jpg',
        'img/heroImages/5.jpg',
        'img/heroImages/6.jpg',
    ];

    const imagenAleatoria = imagenes[Math.floor(Math.random() * imagenes.length)];

    // Establecer la imagen de fondo
    contenedorImagen.style.background = `url(${imagenAleatoria}) center/cover no-repeat`;

    // Mostrar la imagen
    contenedorImagen.style.display = 'block';
}