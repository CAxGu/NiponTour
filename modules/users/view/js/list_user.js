function load_users() {
    var jqxhr = $.get("modules/users/controller/controller_users.class.php?load=true", function (data) {
        var json = JSON.parse(data);
        console.log(json);
        pintar_user(json);
        //alert( "success" );
    }).done(function () {
        //alert( "second success" );
    }).fail(function () {
        //alert( "error" );
    }).always(function () {
        //alert( "finished" );
    });
    jqxhr.always(function () {
        //alert( "second finished" );
    });
}

$(document).ready(function () {
    load_users();
});

function pintar_user(data) {
    //alert(data.user.avatar);
    var content = document.getElementById("content");
    var div_viaje = document.createElement("div");
    var parrafo = document.createElement("p");

    var msje = document.createElement("div");
    msje.innerHTML = "msje = ";
    msje.innerHTML += data.msje;
    
    var idviaje = document.createElement("div");
    idviaje.innerHTML = "idviaje = ";
    idviaje.innerHTML += data.travel.idviaje;
    
    var destino = document.createElement("div");
    destino.innerHTML = "destino = ";
    destino.innerHTML += data.travel.destino;
    
    var precio = document.createElement("div");
    precio.innerHTML = "precio = ";
    precio.innerHTML += data.travel.precio;

    var oferta = document.createElement("div");
    oferta.innerHTML = "oferta = ";
    oferta.innerHTML += data.travel.oferta;
    
    var tipo = document.createElement("div");
    tipo.innerHTML = "Tipo = ";
    for(var i =0;i < data.travel.tipo.length;i++){
    tipo.innerHTML += " - "+data.travel.tipo[i];

    var f_sal = document.createElement("div");
    f_sal.innerHTML = "f_sal = ";
    f_sal.innerHTML += data.travel.f_sal;
    
    var f_lleg = document.createElement("div");
    f_lleg.innerHTML = "f_lleg = ";
    f_lleg.innerHTML += data.travel.f_lleg;
    }
    
    //arreglar ruta IMATGE!!!!!
    
    var cad = data.travel.avatar;
    //console.log(cad);
    //var cad = cad.toLowerCase();
    var img = document.createElement("div");
    var html = '<img src="' + cad + '" height="75" width="75"> ';
    img.innerHTML = html;
    //alert(html);

    div_viaje.appendChild(parrafo);
    parrafo.appendChild(msje);
    parrafo.appendChild(idviaje);
    parrafo.appendChild(destino);
    parrafo.appendChild(precio);
    parrafo.appendChild(oferta);
    parrafo.appendChild(tipo);
    parrafo.appendChild(f_sal);
    parrafo.appendChild(f_lleg);
    content.appendChild(div_viaje);
    content.appendChild(img);
}