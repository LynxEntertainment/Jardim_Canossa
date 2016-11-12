

function abrirDropdown(elemento) {
    $(elemento).children(".sub-menu").addClass("dropdown-aberto");
}

function fecharDropdown(elemento) {
    $(elemento).children(".sub-menu").removeClass("dropdown-aberto");
}

function expandirSeletorIdioma() {
    $('#idioma').addClass("idioma-expand");
    $('.trigger').css("display", "none");
}

function getIdioma(callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(xmlhttp);
        }
    };
    xmlhttp.open("GET", "requests/getIdioma.php");
    xmlhttp.send();
}

function atualizarIdioma(novo) {
    if (novo !== "") {
        $.ajax({
            type: 'POST',
            url: 'acoes/trocarIdioma.php',
            data: {idioma: novo}
        });
    }

    var idioma = getIdioma(function () {
        var idioma = this.responseText;

        $("*[data-idioma]").addClass("oculto");
        $("*[data-idioma='" + idioma + "']").removeClass("oculto");
        $(".trigger").children("img").attr("src", "img/icone-idioma-" + idioma + ".png");
    });
    
    $('#idioma').removeClass("idioma-expand");
    $('.trigger').css("display", "block");
}