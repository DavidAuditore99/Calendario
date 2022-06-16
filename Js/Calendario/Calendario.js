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
    console.log(info)
    var modal = new bootstrap.Modal(document.getElementById("staticBackdrop"));
    document.getElementById("NombreEvt").innerHTML=info.event.title;
    document.getElementById("ContactoEvt").innerHTML=info.event.extendedProps.contacto;
    document.getElementById("HorarioEvt").innerHTML=info.event.extendedProps.horario;
    var date = new Date(info.event.start);
    date.setDate(date.getDate() +1);
    document.getElementById("FechaEvt").innerHTML=date.toLocaleDateString('mx-ES', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    document.getElementById("DetallesEvt").innerHTML=info.event.extendedProps.decripcion;
    document.getElementById("borrarEvt").onclick = ()=>EliminarEvento(info.event.id)
    console.log(info.event.id)
    modal.show();
}
function EliminarEvento(IdEvt) {
    $.post("./Php/EliminarEvento.php",{id : IdEvt}, (info)=>{
        console.log(IdEvt)
        if(info==="Exito"){
            alert("Se ha eliminado el evento del calendario");
            document.location.reload(true);
        }else{
            alert("Hubo un error al eliminar el evento, intente mas tarde " + info)
            var modal = new bootstrap.Modal(document.getElementById("staticBackdrop"));
            modal.show();
        }
        })
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
              document.location.reload(true);
        })
    }
    
}
function AgregarUsuario(){
    var usuario ={
        Nombre: document.getElementById("Nombre").value,
        ApPat:document.getElementById("ApPat").value,
        ApMat:document.getElementById("ApMat").value,
        Email:document.getElementById("email").value,
        Password:document.getElementById("password").value
    }
    $.post("./Php/AgregarUsuario.php",usuario,(response)=>{
        console.log(response)
    })
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
                id: data2[index].Id, 
              })
        }
    })
}