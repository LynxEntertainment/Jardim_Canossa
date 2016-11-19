

$(document).ready(function () {
    tmp_pasta = (Math.random() * 0xFFFFFF << 0).toString(16)
    $('#filer_input').filer({
        fileMaxSIze: 2,
        showThumbs: true,
        theme: "dragdropbox",
        changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="icon-jfi-cloud-up-o"></i></div><div class="jFiler-input-text"><h3>Arraste e solte arquivos aqui</h3> <span style="display:inline-block; margin: 15px 0">ou</span></div><a class="jFiler-input-choose-btn blue">Procurar</a></div></div>',
        templates: {
            box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
            item: '<li class="jFiler-item">\
                                                <div class="jFiler-item-container">\
                                                        <div class="jFiler-item-inner">\
                                                                <div class="jFiler-item-thumb">\
                                                                        <div class="jFiler-item-status"></div>\
                                                                        <div class="jFiler-item-thumb-overlay">\
                                                                                <div class="jFiler-item-info">\
                                                                                        <div style="display:table-cell;vertical-align: middle;">\
                                                                                                <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
                                                                                                <span class="jFiler-item-others">{{fi-size2}}</span>\
                                                                                        </div>\
                                                                                </div>\
                                                                        </div>\
                                                                        {{fi-image}}\
                                                                </div>\
                                                                <div class="jFiler-item-assets jFiler-row">\
                                                                        <ul class="list-inline pull-left">\
                                                                                <li>{{fi-progressBar}}</li>\
                                                                        </ul>\
                                                                        <ul class="list-inline pull-right">\
                                                                                <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                                                        </ul>\
                                                                </div>\
                                                        </div>\
                                                </div>\
                                        </li>',
            itemAppend: '<li class="jFiler-item">\
                                                        <div class="jFiler-item-container">\
                                                                <div class="jFiler-item-inner">\
                                                                        <div class="jFiler-item-thumb">\
                                                                                <div class="jFiler-item-status"></div>\
                                                                                <div class="jFiler-item-thumb-overlay">\
                                                                                        <div class="jFiler-item-info">\
                                                                                                <div style="display:table-cell;vertical-align: middle;">\
                                                                                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name}}</b></span>\
                                                                                                        <span class="jFiler-item-others">{{fi-size2}}</span>\
                                                                                                </div>\
                                                                                        </div>\
                                                                                </div>\
                                                                                {{fi-image}}\
                                                                        </div>\
                                                                        <div class="jFiler-item-assets jFiler-row">\
                                                                                <ul class="list-inline pull-left">\
                                                                                        <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                                                                </ul>\
                                                                                <ul class="list-inline pull-right">\
                                                                                        <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                                                                </ul>\
                                                                        </div>\
                                                                </div>\
                                                        </div>\
                                                </li>',
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: false,
            canvasImage: true,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },
        extensions: ["jpg", "png", "gif"],
        uploadFile: {
            url: "acoes/uploadFotos.php",
            data: {
                pasta: tmp_pasta
            },
            type: 'POST',
            enctype: 'multipart/form-data',
            success: function (data, itemEl, listEl, boxEl, newInputEl, inputEl, id, nome_arquivo) {
                console.log(data);
                var parent = itemEl.find(".jFiler-jProgressBar").parent(),
                        new_file_name = data,
                        filerKit = inputEl.prop("jFiler");
                filerKit.files_list[id].name = new_file_name;

                itemEl.find(".jFiler-jProgressBar").fadeOut("slow", function () {
                    $("<div class=\"jFiler-item-others text-success\"><i class=\"icon-jfi-check-circle\"></i> Success</div>").hide().appendTo(parent).fadeIn("slow");
                });
            },
            statusCode: null,
            onProgress: null,
            onComplete: null
        },
        dragDrop: {
            dragEnter: null,
            dragLeave: null,
            drop: null,
            dragContainer: null
        },
        captions: {
            button: "Procurar arquivos",
            feedback: "Selecione arquivos para enviar",
            feedback2: "arquivos selecionados",
            drop: "Arraste e solte aqui para enviar",
            removeConfirmation: "Tem certeza que deseja remover este arquivo?"
        },
        onRemove: function (itemEl, file, id, listEl, boxEl, newInputEl, inputEl) {
            var filerKit = inputEl.prop("jFiler"),
                    file_name = filerKit.files_list[id].name;
            $.post('./acoes/removerFoto.php', {arquivo: file_name,pasta: tmp_pasta});
        }
    });
});