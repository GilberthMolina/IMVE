/**
 * Sistema para la Iglesia Manantiales de Vida Eterna
 * Desarrollado por: Gilberth Molina
 * Fecha creación: 26/10/16
 */

// Función para redireccionar pagina
function RedireccionPagina(url) {
    window.location.href = url;
}

// Función para redireccionar pagina en nueva ventana
function RedireccionPaginaNuevaVentana(url) {
    window.open(
        url
        , '_black'
    );
}

// Función que permite ingresar solamente números en un campo de texto
function SoloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode;
    return (key >= 48 && key <= 57);
}

// Función que valida el texto introducido, para que solamente sean números
function EsNumero(texto, inicioMensajeControl){
    if (isNaN(texto)){
        $.alert({
            theme: 'material'
            , animationBounce: 1.5
            , animation: 'rotate'
            , closeAnimation: 'rotate'
            , title: 'Advertencia'
            , content: inicioMensajeControl + ' debe contener solamente números, por favor verifíquelo.'
            , confirmButton: 'Aceptar'
            , confirmButtonClass: 'btn-warning'
        });

        return false;
    }
    else{

        return true;
    }
}

// Función que permite encriptar un mensaje dado mediante SHA1
function SHA1(mensaje) {
    function rotate_left(n,s) {
        var t4 = ( n<<s ) | (n>>>(32-s));
        return t4;
    };

    function lsb_hex(val) {
        var str="";
        var i;
        var vh;
        var vl;
        for( i=0; i<=6; i+=2 ) {
            vh = (val>>>(i*4+4))&0x0f;
            vl = (val>>>(i*4))&0x0f;
            str += vh.toString(16) + vl.toString(16);
        }
        return str;
    };

    function cvt_hex(val) {
        var str="";
        var i;
        var v;
        for( i=7; i>=0; i-- ) {
            v = (val>>>(i*4))&0x0f;
            str += v.toString(16);
        }
        return str;
    };

    function Utf8Encode(string) {
        string = string.replace(/\r\n/g,"\n");
        var utftext = "";
        for (var n = 0; n < string.length; n++) {
            var c = string.charCodeAt(n);
            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }
        }
        return utftext;
    };
    
    var blockstart;
    var i, j;
    var W = new Array(80);
    var H0 = 0x67452301;
    var H1 = 0xEFCDAB89;
    var H2 = 0x98BADCFE;
    var H3 = 0x10325476;
    var H4 = 0xC3D2E1F0;
    var A, B, C, D, E;
    var temp;
    mensaje = Utf8Encode(mensaje);
    var msg_len = mensaje.length;
    var word_array = new Array();
    for( i=0; i<msg_len-3; i+=4 ) {
        j = mensaje.charCodeAt(i)<<24 | mensaje.charCodeAt(i+1)<<16 |
            mensaje.charCodeAt(i+2)<<8 | mensaje.charCodeAt(i+3);
        word_array.push( j );
    }
    switch( msg_len % 4 ) {
        case 0:
            i = 0x080000000;
            break;
        case 1:
            i = mensaje.charCodeAt(msg_len-1)<<24 | 0x0800000;
            break;
        case 2:
            i = mensaje.charCodeAt(msg_len-2)<<24 | mensaje.charCodeAt(msg_len-1)<<16 | 0x08000;
            break;
        case 3:
            i = mensaje.charCodeAt(msg_len-3)<<24 | mensaje.charCodeAt(msg_len-2)<<16 | mensaje.charCodeAt(msg_len-1)<<8  | 0x80;
            break;
    }
    word_array.push( i );
    while( (word_array.length % 16) != 14 ) word_array.push( 0 );
    word_array.push( msg_len>>>29 );
    word_array.push( (msg_len<<3)&0x0ffffffff );
    for ( blockstart=0; blockstart<word_array.length; blockstart+=16 ) {
        for( i=0; i<16; i++ ) W[i] = word_array[blockstart+i];
        for( i=16; i<=79; i++ ) W[i] = rotate_left(W[i-3] ^ W[i-8] ^ W[i-14] ^ W[i-16], 1);
        A = H0;
        B = H1;
        C = H2;
        D = H3;
        E = H4;
        for( i= 0; i<=19; i++ ) {
            temp = (rotate_left(A,5) + ((B&C) | (~B&D)) + E + W[i] + 0x5A827999) & 0x0ffffffff;
            E = D;
            D = C;
            C = rotate_left(B,30);
            B = A;
            A = temp;
        }
        for( i=20; i<=39; i++ ) {
            temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0x6ED9EBA1) & 0x0ffffffff;
            E = D;
            D = C;
            C = rotate_left(B,30);
            B = A;
            A = temp;
        }
        for( i=40; i<=59; i++ ) {
            temp = (rotate_left(A,5) + ((B&C) | (B&D) | (C&D)) + E + W[i] + 0x8F1BBCDC) & 0x0ffffffff;
            E = D;
            D = C;
            C = rotate_left(B,30);
            B = A;
            A = temp;
        }
        for( i=60; i<=79; i++ ) {
            temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0xCA62C1D6) & 0x0ffffffff;
            E = D;
            D = C;
            C = rotate_left(B,30);
            B = A;
            A = temp;
        }
        H0 = (H0 + A) & 0x0ffffffff;
        H1 = (H1 + B) & 0x0ffffffff;
        H2 = (H2 + C) & 0x0ffffffff;
        H3 = (H3 + D) & 0x0ffffffff;
        H4 = (H4 + E) & 0x0ffffffff;
    }
    var temp = cvt_hex(H0) + cvt_hex(H1) + cvt_hex(H2) + cvt_hex(H3) + cvt_hex(H4);

    return temp.toLowerCase();
}

// Función que permite obtener los parámetros de la URL
function ObtenerParametroPorNombre(nombre) {
    nombre = nombre.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + nombre + "=([^&#]*)"), resultados = regex.exec(location.search);
    return resultados === null ? "" : decodeURIComponent(resultados[1].replace(/\+/g, " "));
}

// Función que obtiene el valor de un radio button por su nombre
function ObtenerValorRadioButtonPorNombre(nombre) {
    var radioButton = document.getElementsByName(nombre);
    var radioButtonSeleccionado;
    for (var i = 0; i < radioButton.length; i++) {
        if (radioButton[i].checked) {
            radioButtonSeleccionado = i;
        }
    }
    return radioButton[radioButtonSeleccionado].value;
}

// Función que suma N cantidad de días a una fecha dada
function SumarRestaFecha(cantidadDias){
    var milisegundos = parseInt(35 * 24 * 60 * 60 * 1000);
    var fecha = new Date();
    var dia = fecha.getDate();
    var mes = fecha.getMonth() + 1;
    var anno = fecha.getFullYear();
    var tiempo = fecha.getTime();
    
    milisegundos = parseInt(cantidadDias * 24 * 60 * 60 * 1000);
    total = fecha.setTime(tiempo + milisegundos);
    var dia = fecha.getDate();
    var mes = fecha.getMonth() + 1;
    var anno = fecha.getFullYear();

    dia = (dia.toString().length == 1) ? '0' + dia : dia;
    mes = (mes.toString().length == 1) ? '0' + mes : mes;
    
    var fechaFinal = anno + '-' + mes + '-' + dia;
    
    return fechaFinal;
}

// Función para comparar dos listas (original y actual) y retornar los elementos nuevos en la lista actual
function ObtenerValoresAgregados(listaInicial, listaActual) {
    var listaAgregados = [];

    if(listaActual != null){
        if(listaInicial.length > 0){
            for(var i = 0; i < listaActual.length; i++){
                var busquedaEnArregloLideresAgregados = jQuery.inArray(listaActual[i],listaInicial);
                if(busquedaEnArregloLideresAgregados == -1){
                    listaAgregados.push(listaActual[i]);
                }
            }
        }
        else
        {
            for(var i = 0; i < listaActual.length; i++){
                listaAgregados.push(listaActual[i]);
            }
        }
    }

    return listaAgregados;
}

// Función para comparar dos listas (original y actual) y retornar los elementos eliminados en la lista actual
function ObtenerValoresEliminados(listaInicial, listaActual) {
    var listaEliminados = [];

    if(listaActual != null){
        if(listaInicial.length > 0){
            for(var i = 0; i < listaInicial.length; i++){
                var busquedaEnArregloLideresEliminados = jQuery.inArray(listaInicial[i],listaActual);
                if(busquedaEnArregloLideresEliminados == -1){
                    listaEliminados.push(listaInicial[i]);
                }
            }
        }
    }

    if(listaActual == null
        && listaInicial.length > 0){
        for(var i = 0; i < listaInicial.length; i++){
            listaEliminados.push(listaInicial[i]);
        }
    }

    return listaEliminados;
}