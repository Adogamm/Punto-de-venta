// Obtener referencia al select y al div del input parcial
var select = document.getElementById("costo");
var contenedorCosto = document.getElementById("contenedorCosto")
var inputParcial = document.getElementById("inputParcial");


// Escuchar cambios en el select y mostrar/ocultar el input parcial
select.addEventListener("change", function() {
    if (select.value === "parcial") {
        contenedorCosto.classList.toggle("col-lg-12");
        contenedorCosto.classList.toggle("col-lg-6");
        setTimeout(function() {
            inputParcial.style.display = "block";
        }, 500);
        
    } else {
        contenedorCosto.classList.toggle("col-lg-6");
        contenedorCosto.classList.toggle("col-lg-12");
        inputParcial.style.display = "none";
        
    }
});