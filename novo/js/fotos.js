function excluirGaleria($id) {
    window.confirm("Deseja realmente excluir essa galeria?");
}

function getListaGaleria(idioma, pagina, qtd, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(xmlhttp);
        }
    };
    xmlhttp.open("GET", "requests/getGaleria.php?idioma=" + idioma + "&pagina=" + pagina + "&qtd=" + qtd);
    xmlhttp.send();
}

function getListaFoto(galeria, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(xmlhttp);
        }
    };
    xmlhttp.open("GET", "requests/getFoto.php?galeria=" + galeria);
    xmlhttp.send();
}

function listarFoto(galeria) {
    getListaFoto(galeria, function () {
        var dados = JSON.parse(this.responseText);
        console.log(dados);
        var texto = "";
        for (var i = 0; i < dados.foto.length; i++) {
            texto += "<img src='" + dados.foto[i].caminho_foto + "'>";
        }

        $("#editar-galeria-fotos").html(texto);

        $("#editar-galeria-fotos").cycle();
    });
}

function getGaleria(id, idioma, callback) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(xmlhttp);
        }
    };
    xmlhttp.open("GET", "requests/getGaleria.php?idioma=" + idioma + "&id=" + id);
    xmlhttp.send();
}

function exibirGaleria(id, idioma) {
    getGaleria(id, idioma, function () {
        var dados = JSON.parse(this.responseText);
        console.log(dados);
        var texto = "";
        $("#galeria-exibir-titulo").html(dados.galeria[0].titulo_galeria);
        $("#galeria-exibir-data").html(dados.galeria[0].data_galeria);
        $("#galeria-exibir-descricao").html(dados.galeria[0].descricao_galeria);

        for (var i = 0; i < dados.galeria[0].foto_galeria.length; i++) {
            texto += '<img src="' + dados.galeria[0].foto_galeria[i].caminho_foto + '"/>';
        }
        $("#galeria-exibir-foto").html(texto);

        $("#galeria-exibir-foto").cycle({
            fx: "scrollHorz",
            paused: true
        });
    });
}

function listarGaleria(idioma, pagina, qtd) {
    getListaGaleria(idioma, pagina, qtd, function () {
        var dados = JSON.parse(this.responseText);
        var texto = "";
        if (dados.galeria.length > 0) {
            for (var i = 0; i < dados.galeria.length; i++) {
                texto += '<div class="galeria-item-lista">'
                        + '<div class="galeria-item-lista">'
                        + '<a href="?view=fotos&galeria=exibir&id=' + dados.galeria[i].id_galeria + '">'
                        + '<div class="galeria-titulo-lista">' + dados.galeria[i].titulo_galeria + '</div>'
                        + '<div class="galeria-thumbs-lista">';
                for (var j = 0; j < dados.galeria[i].foto_galeria.length || j < 5; j++) {
                    texto += '<img src="' + dados.galeria[i].foto_galeria[j].caminho_foto + '"/>';
                }
                texto += '</div>'
                        + '<div class="galeria-data-lista">'
                        + dados.galeria[i].data_galeria
                        + '</div>'
                        + '</a>'
                        + '<div class="icones-controle admin">'
                        + '<a href="?view=fotos&amp;galeria=editar&amp;id=' + dados.galeria[i].id_galeria + '">'
                        + '<img src="img/edit-icon.png">'
                        + '</a>'
                        + '<a href="#" onclick="excluirGaleria(' + dados.galeria[i].id_galeria + ')">'
                        + '<img src="img/delete-icon.png">'
                        + '</a>'
                        + '</div>'
                        + '</div>'
                        + '</div>';
            }

            $("#galeria-lista").html(texto);

            $(".galeria-thumbs-lista").cycle({
                timeout: 2000,
                speed: 300,
                fx: "scrollHorz"
            });
        } else {
            $("#galeria-lista").html("Nenhuma galeria a ser exibida");
        }
    });

}

function inserirGaleria() {
    $.ajax({
        url: "acoes/inserirGaleria.php",
        type: "POST",
        data: {
            pasta: tmp_pasta
        },
        success: function (data) {
            $("#id-galeria").val(data);
            inserirGaleriaIdioma($('#form-inserir-galeria').serializeArray());
            window.location = "index.php?view=fotos&galeria=editar&id=" + data;
        },
        error: function (data) {
            var msg_erro = JSON.parse(data.responseText).mensagem;
            window.alert(msg_erro);
        }
    });
}

function criarFormGaleriaIdioma(id, idioma) {
    getGaleria(id, idioma, function () {
        var dados = JSON.parse(this.responseText);
        console.log(dados);
        if (dados.galeria.length > 0) {
            $("#titulo-galeria").val(dados.galeria[0].titulo_galeria);
            $("#descricao-galeria").val(dados.galeria[0].descricao_galeria);
            $("#definido").val("true");
            $("#btn-atualizar-galeria").html("Atualizar");
        } else {
            $("#titulo-galeria").val("");
            $("#descricao-galeria").val("");
            $("#titulo-galeria").attr("placeholder", "Idioma ainda não adicionado");
            $("#descricao-galeria").attr("placeholder", "Idioma ainda não adicionado");
            $("#btn-atualizar-galeria").html("Adicionar");
        }
    });
}

function inserirGaleriaIdioma(form) {

    $.ajax({
        url: "acoes/inserirGaleriaIdioma.php",
        type: "POST",
        data: {
            definido: form[0].value,
            id_galeria: form[1].value,
            idioma_galeria: form[2].value,
            titulo_galeria: form[3].value,
            descricao_galeria: form[4].value
        },
        success: function (data) {
            window.alert(data);
        },
        error: function (data) {
            var msg_erro = JSON.parse(data.responseText).mensagem;
            window.alert(msg_erro);
        }
    });
}

function excluirGaleria(id) {
    if (window.confirm("Deseja realmente excluir essa galeria? Todas as fotos serão excluídas.")) {
        $.ajax({
            url: "acoes/excluirGaleria.php",
            type: "POST",
            data: {
                id_galeria: id
            },
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                var msg_erro = JSON.parse(data.responseText).mensagem;
                window.alert(msg_erro);
            }
        });
    }
}