fetch('../templates/navbar.html')
.then(response => response.text())
.then(data => {
    document.getElementById('navbarContainer').innerHTML = data;
});