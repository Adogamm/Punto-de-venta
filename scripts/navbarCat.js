fetch('../../templates/navbarCat.html')
.then(response => response.text())
.then(data => {
    document.getElementById('navbarContainer').innerHTML = data;
});