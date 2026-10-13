const cuerpo = document.querySelector("body");
const botonModo = document.querySelector("#btn-tema");
let esDeDia = false; 
function alternarModo(){
    cuerpo.classList.toggle("claro");
    esDeDia = !esDeDia;
    
    if(esDeDia){
        botonModo.textContent = " 🌙Ir a Modo Noche"; 
    } else {
        botonModo.textContent = " ☀️Ir a Modo Dia"; 
    }
}

botonModo.addEventListener("click", alternarModo);

const botonMenu = document.querySelector("#btn-menu");
const menu = document.querySelector("nav ul");

function alternarMenu(){
    menu.classList.toggle("abierto");    
}
botonMenu.addEventListener("click", alternarMenu);

const botonConfirmar = document.querySelector("#btn-confirmar");
const mensajeParrafo = document.querySelector("#mensaje");

function confirmarPedido() {
    mensajeParrafo.textContent = "Pedido confirmado - te atiende Gracia Esther Sillerico Herrera";
    mensajeParrafo.classList.remove("oculto");
}

botonConfirmar.addEventListener("click", confirmarPedido);