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
