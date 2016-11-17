<div id='pagina-titulo' class='pagina-contato'>
    <h2 data-idioma="por">Contato</h2>
    <h2 data-idioma="eng">Contact</h2>
    <h2 data-idioma="ita">Contatto</h2>
    <h3 data-idioma="por">Entre em contato conosco</h3>
</div>
<script>
    function initMap() {
        var jardimCanossa = {lat: -5.5200961, lng: -47.4448402};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: jardimCanossa
        });
        var marker = new google.maps.Marker({
            position: jardimCanossa,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATDhyb2vOXoOKCQiA49WfbEGjwueV87RM&callback=initMap">
</script>
<div id='conteudo'>
    <div id="conteudo-coluna-1">
        <p>Rua São Francisco, nº 53 - Vila São Francisco, Imperatriz - MA </p>
        <div id="map" style="width: 500px;height:500px;"></div>
    </div>
    <div id="conteudo-coluna-2">
        <form id="form-contato">
            <input placeholder="Nome" type="text" id="contato-nome"/>
            <input placeholder="e-Mail" type="text" id="contato-email"/>
            <textarea placeholder="Mensagem..." id="contato-email"></textarea>
            <input type="submit" id="contato-enviar"/>
        </form>
    </div>
</div> 