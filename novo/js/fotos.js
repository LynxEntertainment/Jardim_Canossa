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
    xmlhttp.open("GET", "requests/getGaleria.php?idioma=" + idioma+"&pagina="+pagina+"&qtd="+qtd);
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
    
}

function getGaleria(id,idioma,callback){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(xmlhttp);
        }
    };
    xmlhttp.open("GET", "requests/getGaleria.php?idioma=" + idioma+"&id="+id);
    xmlhttp.send();
}

function exibirGaleria(id,idioma){
    getGaleria(id,idioma,function(){
        var dados = JSON.parse(this.responseText);
        console.log(dados);
        var texto = "";
        $("#galeria-exibir-titulo").html(dados.galeria[0].titulo_galeria);
        $("#galeria-exibir-data").html(dados.galeria[0].data_galeria);
        $("#galeria-exibir-descricao").html(dados.galeria[0].descricao_galeria);
        
        for(var i = 0; i < dados.galeria[0].foto_galeria.length;i++){
            texto += '<img src="'+dados.galeria[0].foto_galeria[i].caminho_foto+'"/>';
        }
        $("#galeria-exibir-foto").html(texto);
        
        $("#galeria-exibir-foto").cycle({
            fx: "scrollHorz",
            paused: true
        });
    });
}

function listarGaleria(idioma,pagina,qtd) {
    getListaGaleria(idioma,pagina,qtd, function () {
        var dados = JSON.parse(this.responseText);
        console.log(dados);
        var texto = "";
        for (var i = 0; i < dados.galeria.length; i++) {
            texto += '<div class="galeria-item-lista">'
                    + '<div class="galeria-item-lista">'
                    + '<a href="?view=fotos&galeria=exibir&id=' + dados.galeria[i].id_galeria + '">'
                    + '<div class="galeria-titulo-lista">' + dados.galeria[i].titulo_galeria + '</div>'
                    + '<div class="galeria-thumbs-lista">';
            for (var j = 0; j < dados.galeria[i].foto_galeria.length || j > 5; j++) {
                texto += '<img src="' + dados.galeria[i].foto_galeria[j].caminho_foto + '"/>';
            }
            texto += '</div>'
                    + '<div class="galeria-data-lista">'
                    + dados.galeria[i].data_galeria
                    + '</div>'
                    + '</a>'
                    + '<div class="icones-controle admin">'
                    + '<a href="?view=fotos&amp;galeria=editar&amp;id=1">'
                    + '<img src="img/edit-icon.png">'
                    + '</a>'
                    + '<a href="#" onclick="excluirGaleria(1)">'
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
    });
}