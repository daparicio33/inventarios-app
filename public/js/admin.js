//Campos tipo Password
function mostrarContrasena(){
    var tipo = document.getElementById("password");
    var btn = document.getElementById("iconpassword");
    if(tipo.type == "password"){
        tipo.type = "text";
        btn.removeAttribute('class');
        btn.setAttribute('class','far fa-eye-slash')
    }else{
        tipo.type = "password";
        btn.removeAttribute('class');
        btn.setAttribute('class','far fa-eye')
    }
}
function cambiartipo(id){
    var tipo = document.getElementById("tipo"+id).value;
    var url = document.getElementById("url"+id);
    if(tipo == "imagen"){
        //cambiar los atributos del objeto
        url.removeAttribute('type');
        url.setAttribute('type','file')
    }
    if(tipo == "video"){
        //cambiar los atributos del objeto
        url.removeAttribute('type');
        url.setAttribute('type','text')
        url.setAttribute('placeholder','ingrese url del video');
    }
    if(tipo == "archivo"){
        //cambiar los atributos del objeto
        url.removeAttribute('type');
        url.setAttribute('type','file')
    }
}
//Mensages de Confirmacion
$(document).ready(function(){
    setTimeout(() => {
        $("#info").hide();
    }, 12000);
    });
    $(document).ready(function(){
        setTimeout(() => {
        $("#error").hide();
    }, 12000);
});
//Desactivar los botones luego del envio de informacion
$('#frm').submit(function(event){
    $("#btn").attr("disabled",true);
});
//imagen preview
function previewimage(event,querySelector){
    const input = event.target;
    $imgPreview = document.querySelector(querySelector);
    if(!input.files.length) return
    file = input.files[0];
    objectURL = URL.createObjectURL(file);
    $imgPreview.src = objectURL;
}