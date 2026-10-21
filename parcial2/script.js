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




const formulario = document.querySelector("#form-turno");
const aviso = document.querySelector("#aviso-turno");


function validarFormulario(event) {

   const nombre = document.querySelector("#nombre").value;
   const correo = document.querySelector("#correo").value;
   const mascota = document.querySelector("#mascota").value;
   
   if (nombre === "") {
       event.preventDefault();
        aviso.textContent = "Falta tu nombre para darte el turno.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    }
       else if (correo === "") {
        event.preventDefault(); 
        aviso.textContent = "Nos falta tu correo para darte el turno.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } 
    else if (correo.includes("@") === false) {
       event.preventDefault();
        aviso.textContent = "Revisa tu correo: le falta el @.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");

    } else if (mascota === "") { 
        event.preventDefault();
        aviso.textContent = "Por favor, escribe sobre tu mascota.";
        aviso.classList.add("error");
        aviso.classList.remove("exito");
    } 

     else {
        aviso.textContent = "Turno reservado - te atiende Gracia Esther Sillerico Herrera";
        aviso.classList.add("exito");
        aviso.classList.remove("error");
    }
     } 
    formulario.addEventListener("submit", validarFormulario);  