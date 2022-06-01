function IniciarSesion(){
    let email = document.getElementById("email").value
    let pass = document.getElementById("password").value
    if (!email || !pass ) {
        alert("Llene los campos antes de continuar")
    }else{
    $.get("./Php/Login.php",{Email: email, Password: pass}, (data)=>{
        if (data ==="Exito") {
            window.location.href ="Calendario.html"
        }
    })
    }
}