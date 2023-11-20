window.onload = () => {
    var carga = document.getElementById('contenedor');
    carga.style.visibility = 'hidden';
    carga.style.opacity = '0';
}


$(document).ready(function(){
	var altura= $('.menu').offset().top;

	$(window).on('scroll',function(){
		if ($(window).scrollTop() > altura) {
			$('.menu').addClass('menu-fixed');
		}else{
			$('.menu').removeClass('menu-fixed');
		}
	});

});

$('#salvar').hide()

function handleFileSelect(evt) {
    //if(validar_fotografia()){
        $('#salvar').show()
        var archivos = evt.target.files;
        for (var i = 0, archivo; archivo = archivos[i]; i++) {
            if (!archivo.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();

            reader.onload = ((theFile) => {
                return (e) => {
                    $('#img_portada').css("background-image", "url("+ e.target.result+")");
                };
            })(archivo);
            reader.readAsDataURL(archivo);
        }
    //}
}
$('#portada').on('change', handleFileSelect);

$(document).ready(function(){
    if (screen.width <= 767) {
        $('#navbarNav2').css("display",""); 
        $('#desplegable').html('<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-angle-down text-white"></i></button>');      
    }else if (screen.width >=768 ) {
        $('#navbarNav2').css("display","block");  
        $('#desplegable').html('');            
    }
});

window.onresize = function(event) {

    if (screen.width <= 767) {
        $('#navbarNav2').css("display",""); 
        $('#desplegable').html('<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-angle-down text-white"></i></button>');   
    }else if (screen.width >=768 ) {
        $('#navbarNav2').css("display","block");  
        $('#desplegable').html('');            
    }
};


var x, y, w, h;

/* function validar_fotografia(){
    var foto = $('#img_alumno').val();
    var extensiones = /(.jpg|.jpeg)$/i;
    if(!extensiones.exec(foto)){
        $('#img_alumno').val("");
        swal({
            title: "Error!",
            text: "Formato de imagen no valido, solo se admiten archivos con extension '.jpg'",
            icon: "warning",
            button: "Aceptar",
        });
        return false;
    }else {
        var peso = $('#img_alumno')[0].files[0].size;
        if( peso > (2000*1024)){
            $('#img_alumno').val("");
            swal({
                title: "Error!",
                text: "El peso de la imagen no puede ser mayor 2MB!",
                icon: "warning",
                button: "Aceptar",
            });
            return false;
        }else{
            return true;
        }
    }
    
} */

function perfil(evt) {
    //if(validar_fotografia()){
        var archivos = evt.target.files;
        for (var i = 0, archivo; archivo = archivos[i]; i++) {
            if (!archivo.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();

            reader.onload = ((theFile) => {
                return (e) => {
                    mostar_area_recorte(e.target.result);
                    $("#modal").trigger("click");
                };
            })(archivo);
            reader.readAsDataURL(archivo);
        }
    //}
}
$('#perfil').on('change', perfil);

function usuario(evt) {
    //if(validar_fotografia()){
        var archivos = evt.target.files;
        for (var i = 0, archivo; archivo = archivos[i]; i++) {
            if (!archivo.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();

            reader.onload = ((theFile) => {
                return (e) => {
                    mostar_area_recorte2(e.target.result);
                    $("#modal").trigger("click");
                };
            })(archivo);
            reader.readAsDataURL(archivo);
        }
    //}
}
$('#usuario').on('change', usuario);

function limpiar_foto(){
    /* $('#input_file').css("display","block");
	$('#img_foto').html(""); */
	$('#perfil').val("");
    x = "";
    y = "";
    w = "";
    h = "";
}

function mostar_area_recorte(url){
    //$('#recorte_img').attr('src', url);
    $('#crear').html('<img src="' + url + '" name="recorte_img" id="recorte_img" alt="Foto Alumno"> ');
    recorte();
}

function mostar_area_recorte2(url){
    //$('#recorte_img').attr('src', url);
    $('#crear').html('<img src="' + url + '" name="recorte_img" id="recorte_img" alt="Foto Alumno"> ');
    recorte2();
}

function showCoords(c) {
    x = c.x;
    y = c.y;
    w = c.w;
    h = c.h;
};

function recorte() {
    $('#recorte_img').Jcrop({
        onSelect: showCoords,
        bgColor: 'black',
        bgOpacity: .4,
        aspectRatio: 20 / 32
    });
}

function recorte2() {
    $('#recorte_img').Jcrop({
        onSelect: showCoords,
        bgColor: 'black',
        bgOpacity: .4,
        aspectRatio: 16 / 16
    });
}


function recortarImagen() {
    if (parseInt(w)) {
        //console.log('x=' + x + '&y=' + y + '&w=' + w + '&h=' + h);   
        $('#coordenada').val('m' + x + 'm' + y + 'm' + w + 'm' + h);
        $("#cerrar_modal").trigger("click");
        $("#salvar_foto").trigger("click");
    }
}

$('#btn_recorte').click(()=>{
    recortarImagen();
});


