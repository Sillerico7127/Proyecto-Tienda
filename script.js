const cuerpo = document.querySelector("body");
const botonModo = document.querySelector("#btn-tema");
let esDeDia = false; 
function alternarModo(){
    cuerpo.classList.toggle("claro");
    esDeDia = !esDeDia;
    
    if(esDeDia){
        botonModo.textContent = " ☀️Modo Dia"; 
    } else {
        botonModo.textContent = " 🌙 Modo Noche"; 
    }
}
botonModo.addEventListener("click", alternarModo);




const botonMenu = document.querySelector("#btn-menu");
const menu = document.querySelector("nav ul");

function alternarMenu(){
    menu.classList.toggle("abierto");    
}
botonMenu.addEventListener("click", alternarMenu);
