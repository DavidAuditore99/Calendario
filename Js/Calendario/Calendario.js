$(document).ready(()=>{
    $.get("./Php/Calendario.php",(data)=>{
        console.log(data)
        if (!data) {
            window.location.href="index.html";
            alert("Debes iniciar sesion");
        }
    })
})

function MostrarModal(){
    var modal = new bootstrap.Modal(document.getElementById("exampleModal"));
    modal.show();
}
function OcultarModal(){
    var modal = new bootstrap.Modal(document.getElementById("exampleModal"));
    modal.hide();
}
function MostrarDetallesEvento(info){
    var modal = new bootstrap.Modal(document.getElementById("staticBackdrop"));
    document.getElementById("NombreEvt").innerHTML=info.event.title;
    document.getElementById("ContactoEvt").innerHTML=info.event.extendedProps.contacto;
    document.getElementById("HorarioEvt").innerHTML=info.event.extendedProps.horario;
    var date = new Date(info.event.start);
    date.setDate(date.getDate() +1);
    document.getElementById("FechaEvt").innerHTML=date.toLocaleDateString('mx-ES', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    document.getElementById("DetallesEvt").innerHTML=info.event.extendedProps.decripcion;
    modal.show();
}
function CrearEvento(){
    let evento={
         nombre : document.getElementById("Nombre").value,
         contacto : document.getElementById("Contacto").value,
         horario : document.getElementById("Horario").value,
         fecha : document.getElementById("fecha").value,
         detalles : document.getElementById("Detalles").value
    }
    if (!evento.nombre||!evento.contacto||!evento.horario||!evento.fecha||!evento.detalles) {
        alert("Llena todos los campos antes de continuar")
    }else{
        $.post("./Php/CrearEvento.php",evento, (data)=>{
            calendar.addEvent({ 
                title: evento.nombre, 
                start: evento.fecha,
                contacto: evento.contacto, 
                horario: evento.horario, 
                decripcion: evento.descripcion, 
              })
        })
    }
    
}
function ObtenerEventos(){
    $.post("./Php/ObtenerEventos.php", (data)=>{
        const data2 = JSON.parse(data)
        for (let index = 0; index < data2.length; index++) {
            calendar.addEvent({ 
                title: data2[index].Nombre, 
                start: data2[index].Fecha,
                contacto: data2[index].Contacto, 
                horario: data2[index].Horario, 
                decripcion: data2[index].Descripcion, 
              })
        }
    })
}