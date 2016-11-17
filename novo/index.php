<?php
session_start();


if (!isset($_SESSION["idioma"])) {
    $_SESSION["idioma"] = "por";
}
require_once 'model/trocaPagina.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="img/favicon.ico"/>
        <link rel="stylesheet" href="css/index.css"/>
        <link rel="stylesheet" href="css/jssor.css"/>
        <link rel="stylesheet" href="css/pagina.css"/>
        <link rel="stylesheet" href="css/fotos.css"/>
        <link rel="stylesheet" href="css/fontfaces.css"/>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript" src="js/fotos.js"></script>
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script src="js/jssor.slider-21.1.6.min.js" type="text/javascript"></script>
        <script src="js/jquery.cycle2.js" type="text/javascript"></script>
        <script>
            $(document).ready(function () {

                $(window).click(function () {
                    encolherSeletorIdioma();
                });

                $("#idioma").click(function () {
                    event.stopPropagation();
                });

                atualizarIdioma();

            });
        </script>
        <?php
        if (!isset($_SESSION['idUsuario'])) {
            echo "<style>.admin{display:none;}</style>";
        }
        ?>
        <!--Start of Tawk.to Script-->
        <!--
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/5743058639b153e4033106d3/default';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    </head>
    <body>
        <header>
            <div class="cabecalho">
                <div class="logo">
                    <a href="index.php">
                        <img src="img/logo_jardim_canossa.png"/>
                    </a>
                </div>
                <?php
                if (isset($_SESSION['idUsuario'])) {
                    include 'view/admin/userbar.php';
                }
                ?>
                <nav data-idioma="por">
                    <div class="menu-item" onmouseover="abrirDropdown(this)" onmouseout="fecharDropdown(this)">
                        <a class="dropdown-arrow" href="#">Quem somos</a>
                        <div class="sub-menu">
                            <a href="?view=associacao">A associação</a>
                            <a href="?view=jardim-canossa">Jardim Canossa</a>
                            <a href="?view=espaco-vida">Espaço Vida</a>
                            <a href="?view=obra-social">Obra Social M.C.</a>
                            <a href="?view=madalena-de-canossa">Sta. Madalena de Canossa</a>
                            <a href="?view=canossianas">Irmãs Canossianas</a>
                            <a href="?view=rina-guarnieri">Irmã Rina Guarnieri</a>
                            <a href="?view=colaboradores">Colaboradores</a>
                            <a href="?view=objetivos">Objetivos Esperados</a>
                        </div>
                    </div>
                    <div class="menu-item"><a href="?view=fotos">Fotos</a></div>
                    <div class="menu-item"><a href="?view=apoio">Apoio</a></div>
                    <div class="menu-item" onmouseover="abrirDropdown(this)" onmouseout="fecharDropdown(this)">
                        <a class="dropdown-arrow" href="#">Colabore conosco</a>
                        <div class="sub-menu">
                            <div class="sub-menu-item"><a href="?view=doe-jardim-canossa">Doe para o Jardim Canossa</a></div>
                            <div class="sub-menu-item"><a href="?view=doe-espaco-vida">Doe para o Espaço Vida</a></div>
                            <div class="sub-menu-item"><a href="?view=doe-obra-social">Doe para a Obra Social M.C.</a></div>
                            <div class="sub-menu-item"><a href="?view=apadrinhamento">Apadrinhamento</a></div>
                        </div>
                    </div>
                    <div class="menu-item"><a href="?view=contato">Contato</a></div>
                </nav>
                <nav data-idioma="eng">
                    <div class="menu-item" onmouseover="abrirDropdown(this)" onmouseout="fecharDropdown(this)">
                        <a class="dropdown-arrow" href="#">Who we are</a>
                        <div class="sub-menu">
                            <a href="?view=associacao">The Association</a>
                            <a href="?view=jardim-canossa">Jardim Canossa</a>
                            <a href="?view=espaco-vida">Espaço Vida</a>
                            <a href="?view=obra-social">M.C. Social Work</a>
                            <a href="?view=madalena-de-canossa">St. Magdalene of Canossa</a>
                            <a href="?view=canossianas">Canossian Sisters</a>
                            <a href="?view=rina-guarnieri">Sister Rina Guarnieri</a>
                            <a href="?view=colaboradores">Collaborators</a>
                            <a href="?view=objetivos">Expected Goals</a>
                        </div>
                    </div>
                    <div class="menu-item"><a href="?view=fotos">Photos</a></div>
                    <div class="menu-item"><a href="?view=apoio">Support</a></div>
                    <div class="menu-item" onmouseover="abrirDropdown(this)" onmouseout="fecharDropdown(this)">
                        <a class="dropdown-arrow" href="#">Collaborate with us</a>
                        <div class="sub-menu">
                            <div class="sub-menu-item"><a href="?view=doe-jardim-canossa">Donate to Jardim Canossa</a></div>
                            <div class="sub-menu-item"><a href="?view=doe-espaco-vida">Donate to Espaço Vida</a></div>
                            <div class="sub-menu-item"><a href="?view=doe-obra-social">Donate to M.C. Social Work</a></div>
                            <div class="sub-menu-item"><a href="?view=apadrinhamento">Child Sponsorship</a></div>
                        </div>
                    </div>
                    <div class="menu-item"><a href="?view=contato">Contact</a></div>
                </nav>
                <nav data-idioma="ita">
                    <div class="menu-item" onmouseover="abrirDropdown(this)" onmouseout="fecharDropdown(this)">
                        <a class="dropdown-arrow" href="#">Chi siamo</a>
                        <div class="sub-menu">
                            <a href="?view=associacao">L´Associazione</a>
                            <a href="?view=jardim-canossa">Jardim Canossa</a>
                            <a href="?view=espaco-vida">Espaço Vida</a>
                            <a href="?view=obra-social">Opera Sociale M.C.</a>
                            <a href="?view=madalena-de-canossa">Sta. Maddalena di Canossa</a>
                            <a href="?view=canossianas">Suore Canossiane</a>
                            <a href="?view=rina-guarnieri">Suor Rina Guarnieri</a>
                            <a href="?view=colaboradores">Collaboratori</a>
                            <a href="?view=objetivos">Obietivi</a>
                        </div>
                    </div>
                    <div class="menu-item"><a href="?view=fotos">Fotografie</a></div>
                    <div class="menu-item"><a href="?view=apoio">Supporto</a></div>
                    <div class="menu-item" onmouseover="abrirDropdown(this)" onmouseout="fecharDropdown(this)">
                        <a class="dropdown-arrow" href="#">Collaborare con noi</a>
                        <div class="sub-menu">
                            <div class="sub-menu-item"><a href="?view=doe-jardim-canossa">Donnare Jardim Canossa</a></div>
                            <div class="sub-menu-item"><a href="?view=doe-espaco-vida">Donnare Espaço Vida</a></div>
                            <div class="sub-menu-item"><a href="?view=doe-obra-social">Donnare all'Opera Sociale</a></div>
                            <div class="sub-menu-item"><a href="?view=apadrinhamento">Adozione a distanza</a></div>
                        </div>
                    </div>
                    <div class="menu-item"><a href="?view=contato">Contatto</a></div>
                </nav>
                <div id="idioma">
                    <a class="trigger" href="#" onclick="expandirSeletorIdioma()"><img></a>
                    <a value="por" class="opcao-idioma" href="#" onclick="atualizarIdioma('por')"><img src="img/icone-idioma-por.png"/></a>
                    <a value="eng" class="opcao-idioma" href="#" onclick="atualizarIdioma('eng')"><img src="img/icone-idioma-eng.png"/></a>
                    <a value="ita" class="opcao-idioma" href="#" onclick="atualizarIdioma('ita')"><img src="img/icone-idioma-ita.png"/></a>
                </div>
            </div>
        </header>
        <main>
            <?php
            $p = new trocaPagina();
            include $p->pagina;
            ?>
        </main>
        <footer>
            <div id="parceiros">
                <span data-idioma="por">Parceiros:</span>
                <span data-idioma="eng">Partners:</span>
                <span data-idioma="ita">Partner:</span>
                <script>
                    jQuery(document).ready(function ($) {

                        var jssor_1_options = {
                            $AutoPlay: true,
                            $Idle: 0,
                            $AutoPlaySteps: 4,
                            $SlideDuration: 2500,
                            $SlideEasing: $Jease$.$Linear,
                            $PauseOnHover: 4,
                            $SlideWidth: 112,
                            $Cols: 5
                        };

                        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                        /*responsive code begin*/
                        /*you can remove responsive code if you don't want the slider scales while window resizing*/
                        function ScaleSlider() {
                            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                            if (refSize) {
                                refSize = Math.min(refSize, 809);
                                jssor_1_slider.$ScaleWidth(refSize);
                            } else {
                                window.setTimeout(ScaleSlider, 30);
                            }
                        }
                        ScaleSlider();
                        $(window).bind("load", ScaleSlider);
                        $(window).bind("resize", ScaleSlider);
                        $(window).bind("orientationchange", ScaleSlider);
                        /*responsive code end*/
                    });
                </script>
                <div id="jssor_1">
                    <!-- Loading Screen -->
                    <div data-u="loading">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                    </div>
                    <div data-u="slides">
                        <div><a href="http://www.caritas-siena.it/" target="_blank"><img data-u="image" src="img/parceiros/caritas.jpg" /></a></div>
                        <div><img data-u="image" src="img/parceiros/cata-ventos.jpg" /></div>
                        <div><a href="https://www.facebook.com/pages/Faem-Federa%C3%A7%C3%A3o-De-Automobilismo-Do-Estado-Do-Maranh%C3%A3o/423132381134079?fref=ts" target="_blank"><img data-u="image" src="img/parceiros/faem.jpg" /></a></div>
                        <div><a href="http://www.gruppoindia.it/" target="_blank"><img data-u="image" src="img/parceiros/gruppo_india.jpg" /></a></div>
                        <div><img data-u="image" src="img/parceiros/imperatriz.jpg" /></div>
                        <div><img data-u="image" src="img/parceiros/pastoral_da_crianca.jpg" /></div>
                        <div><img data-u="image" src="img/parceiros/companhia-da-alegria.jpg" /></div>
                    </div>
                </div>
                <!-- #endregion Jssor Slider End -->
            </div>
            <div id="bar-rodape"></div>
            <div data-idioma="por" id="rodape">
                <div class="coluna-rodape">
                    <h1>Links Úteis</h1>
                    <a href="http://w2.vatican.va/content/vatican/pt.html" target="_blank">Vaticano</a><br>
                    <a href="http://www.cnbb.org.br/" target="_blank">CNBB</a><br>
                    <a href="http://www.dioceseitz.blogspot.com.br/" target="_blank">Diocese de Imperatriz</a><br>
                    <a href="http://www.canossian.org/en/" target="_blank">Irmãs Canossianas</a><br>
                    <a href="https://www.pastoraldacrianca.org.br/" target="_blank">Pastoral da Criança</a><br>
                    <a href="http://www.voica.org/wordpress/?page_id=1034" target="_blank">Voica Onlus</a><br>
                    <a href="http://www.fondazionecanossiana.org/en/" target="_blank">Fundação Canossiana</a><br>
                    <a href="http://canossianos.org.br/" target="_blank">Padres e Irmãos Canossianos</a><br>
                    <a href="http://www.laicican.org/" target="_blank">Leigos Canossianos</a><br>
                </div>
                <div class="coluna-rodape">
                    <h1><a href="#">Contato</a></h1>
                    <p>Tel: (99) 3526-7697 / 99192-2021<br>
                        Tel2: (99) 3527-5274<br>
                        <a href="mailto:amcjardimcanossa@gmail.com">amcjardimcanossa@gmail.com</a></p>
                    <h1>Estamos Aqui ó:</h1>
                    <p>Rua São Francisco, nº 53 - Vila São Francisco<br>
                        Imperatriz - MA</p>
                </div>
            </div>
            <div data-idioma="eng" id="rodape">
                <div class="coluna-rodape">
                    <h1>Useful Links</h1>
                    <a href="http://w2.vatican.va/content/vatican/pt.html" target="_blank">Vatican</a><br>
                    <a href="http://www.cnbb.org.br/" target="_blank">CNBB</a><br>
                    <a href="http://www.dioceseitz.blogspot.com.br/" target="_blank">Diocese of Imperatriz</a><br>
                    <a href="http://www.canossian.org/en/" target="_blank">Canossian Sisters</a><br>
                    <a href="https://www.pastoraldacrianca.org.br/" target="_blank">Pastoral da Criança</a><br>
                    <a href="http://www.voica.org/wordpress/?page_id=1034" target="_blank">Voica Onlus</a><br>
                    <a href="http://www.fondazionecanossiana.org/en/" target="_blank">Canossian Foundation</a><br>
                    <a href="http://canossianos.org.br/" target="_blank">Canossian Brothers and Fathers</a><br>
                    <a href="http://www.laicican.org/" target="_blank">Canossian Lay People</a><br>
                </div>
                <div class="coluna-rodape">
                    <h1><a href="#">Contact</a></h1>
                    <p>Tel: (99) 3526-7697 / 99192-2021<br>
                        Tel2: (99) 3527-5274<br>
                        <a href="mailto:amcjardimcanossa@gmail.com">amcjardimcanossa@gmail.com</a></p>
                    <h1>We're right here:</h1>
                    <p>Rua São Francisco, nº 53 - Vila São Francisco<br>
                        Imperatriz - MA</p>
                </div>
            </div>
            <div data-idioma="ita" id="rodape">
                <div class="coluna-rodape">
                    <h1>Link Utile</h1>
                    <a href="http://w2.vatican.va/content/vatican/pt.html" target="_blank">Vaticano</a><br>
                    <a href="http://www.cnbb.org.br/" target="_blank">CNBB</a><br>
                    <a href="http://www.dioceseitz.blogspot.com.br/" target="_blank">Diocesi di Imperatriz</a><br>
                    <a href="http://www.canossian.org/en/" target="_blank">Suore Canossiani</a><br>
                    <a href="https://www.pastoraldacrianca.org.br/" target="_blank">Pastoral da Criança</a><br>
                    <a href="http://www.voica.org/wordpress/?page_id=1034" target="_blank">Voica Onlus</a><br>
                    <a href="http://www.fondazionecanossiana.org/en/" target="_blank">Fondazione Canossiana</a><br>
                    <a href="http://canossianos.org.br/" target="_blank">Padri e Fratelli Canossiana</a><br>
                    <a href="http://www.laicican.org/" target="_blank">Laico Canossiano</a><br>
                </div>
                <div class="coluna-rodape">
                    <h1><a href="#">Contatto</a></h1>
                    <p>Tel: (99) 3526-7697 / 99192-2021<br>
                        Tel2: (99) 3527-5274<br>
                        <a href="mailto:amcjardimcanossa@gmail.com">amcjardimcanossa@gmail.com</a></p>
                    <h1>Noi siamo qui:</h1>
                    <p>Rua São Francisco, nº 53 - Vila São Francisco<br>
                        Imperatriz - MA</p>
                </div>
            </div>
        </footer>
    </body>
</html>
