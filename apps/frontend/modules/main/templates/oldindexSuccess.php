<?php use_stylesheet('search.css?v=02062014') ?>
<?php use_stylesheet('landing.css?v=25022014') ?>
<?php use_stylesheet('registro.css?v=25022014') ?>
<?php use_stylesheet('comparaprecios.css?v=25022014') ?>

<?php use_stylesheet('demo_page.css') ?>
<?php use_stylesheet('demo_table.css') ?>

<?php use_javascript('jquery.dataTables.js') ?>

<?php use_stylesheet('jquery.lightbox-0.5.css') ?>
<?php use_javascript('jquery.lightbox-0.5.js') ?>
<?php use_javascript('jquery.lightbox-0.5.min.js') ?>
<?php use_javascript('jquery.lightbox-0.5.pack.js') ?>

l<?php
$useragent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
    use_stylesheet('moviles.css');
}
?>
<style>
    .marcadores{
        width: 30px;
        float: left;
        padding: 20px 0;
    }
    .marcadores img{

    }
    li.sep{
        margin-top: 7px;
        font-size: 11px;
    }
    a.link_user{
        color: #05a4e7;
        text-decoration: none;
        border-bottom: 1px solid #05a4e7;
    }
    .img_verificado{
        width: 14px;
        height: 15px;
    }
    .land_ultauto_item {
        margin-right:20px;
    }
    /* css for timepicker */
    .ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
    .ui-timepicker-div dl { text-align: left; }
    .ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
    .ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
    .ui-timepicker-div td { font-size: 90%; }
    .ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }


    .ui-widget { font-family: Lucida Grande, Lucida Sans, Arial, sans-serif; font-size: 0.8em; }

    .btn-busqueda{
        background-color: #ACABAB;
        border: none;
        width: 100px;
        color: white;
        height: 22px;
        cursor: pointer;
        font-size: 11px;
    }
    .btn-busqueda.active{
        background-color: #333333;
    }

    .time-picker { width:121px;}

    .comparaPrecio{
        height: 30px;
        margin-top: 10px;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        color: #ec00b8;
    }

    .img_instrucciones_2{
        cursor: pointer;
    }

    /* jQuery lightBox plugin - Gallery style */

    .gallery ul{ list-style: none; }
    .gallery ul li{ display: inline; }
    .gallery ul img{
        border: 4px solid #D1D2CA; /*A4A4A4*/
        border-width: 4px 4px 4px;
    }
    .gallery ul a:hover img{
        border: 4px solid #EC008C;
        border-width: 4px 4px 4px;
        color: #fff;
    }
    .gallery ul a:hover{ color: #fff; }
    a{text-decoration:none;}
    .posicionamiento1,.posicionamiento2,.posicionamiento3,.posicionamiento4,.posicionamiento5,.posicionamiento6{
        float: left;
    }
    .posicionamiento1{
        margin-left: 20px;
        padding-bottom: 16px;    
    }
    .posicionamiento2{
        margin-left: 36px;
        padding-top: 12px;    
    }
    .posicionamiento3{
        margin-left: 40px;
        padding-bottom: 26px;
    }
    .posicionamiento4{
        margin-left: 10px;
        padding-bottom: 26px;
    }
    .posicionamiento5{
        margin-left: 30px;
        padding-bottom: 8px;
    }
    .posicionamiento6{
        margin-left: 32px;
        padding-bottom: 23px;
    }
    #tab-lista-data-spinner{
        display: none;
        text-align: center;
        height: 500px;
    }
    #tab-lista-data-spinner img{
        margin-top: 5%;
        width: 33px;
    }
</style>

<?php

    $usuarioLog = 0;

    if (sfContext::getInstance()->getUser()->getAttribute("logged")) {
        $usuarioLog = 1;
    } else {
        $usuarioLog = 2;
    }
?>

<script type="text/javascript">

    var usuarioLogeado = "<?php echo $usuarioLog ?>";

    var map;
    var markerCluster;
    var markers = [];
    var swLat;
    var swLng;
    var neLat;
    var neLng;
    var latitud;
    var longitud;
    var geolocalizacion;
    var _data;
    var strictBounds = null;
    var lastValidCenter;
    var oTable;

    /*function localizame() {

        if (navigator.geolocation) { // Si el navegador tiene geolocalizacion
            navigator.geolocation.getCurrentPosition(coordenadas, errores);
        } else {
            alert('Oops! Tu navegador no soporta geolocalización. Bájate Chrome, que es gratis!');
        }
    }*/

    function crearMarca(position) {

        marker = new google.maps.Marker({
            position: position,
            map: map,
            draggable: true,
        });
        return marker;
    }

    /*function coordenadas(position) {

        latitud = position.coords.latitude; //Guardamos nuestra latitud
        longitud = position.coords.longitude; //Guardamos nuestra longitud

        <?php if ($sf_user->getAttribute('geolocalizacion') == true): ?>
            geolocalizacion = true;
        <?php else: ?>
            geolocalizacion = false;
        <?php endif; ?>
        
        //initialize();
    }*/

    /*function errores(err) {
        //Controlamos los posibles errores
        if (err.code == 0) {
            alert("Oops! Algo ha salido mal");
        }
        if (err.code == 1) {
            alert("Oops! No has aceptado compartir tu posición");
        }
        if (err.code == 2) {
            alert("Oops! No se puede obtener la posición actual");
        }
        if (err.code == 3) {
            alert("Oops! Hemos superado el tiempo de espera");
        }
    }*/

    google.maps.event.addDomListener(window, 'load', initialize);

    function initialize() {

        initialize2();

        <?php
            if (stripos($_SERVER['SERVER_NAME'], "arrendas") !== FALSE)
                echo "var center = new google.maps.LatLng(-34.59, -58.401604);";
            else
                echo "var center = new google.maps.LatLng(-33.436024, -70.632858);";
        ?>

        if (geolocalizacion) {
            center = new google.maps.LatLng(latitud, longitud);
        }

        <?php if (isset($_GET['ciudad']) && $_GET['ciudad'] == "arica"): ?>
            center = new google.maps.LatLng(-18.32, -70.20);
        <?php endif; ?>
        <?php if (isset($_GET['ciudad']) && $_GET['ciudad'] == "concepcion"): ?>
            center = new google.maps.LatLng(-37.00, -72.30);
        <?php endif; ?>
        <?php if (isset($_GET['ciudad']) && $_GET['ciudad'] == "laserena"): ?>
            center = new google.maps.LatLng(-29.75, -71.10);
        <?php endif; ?>
        <?php if (isset($_GET['ciudad']) && $_GET['ciudad'] == "temuco"): ?>
            center = new google.maps.LatLng(-38.45, -72.40);
        <?php endif; ?>
        <?php if (isset($_GET['ciudad']) && $_GET['ciudad'] == "valparaiso"): ?>
            center = new google.maps.LatLng(-33.2, -71.4);
        <?php endif; ?>
        <?php if (isset($_GET['ciudad']) && $_GET['ciudad'] == "viña"): ?>
            center = new google.maps.LatLng(-33.0, -71.3);
        <?php endif; ?>
        <?php if (isset($map_clat) && isset($map_clng)): ?>
            center = new google.maps.LatLng(<?= $map_clat ?>, <?= $map_clng ?>);
        <?php endif; ?>

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: center,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false
        });

        if (geolocalizacion) {
            marker = new google.maps.Marker({
                position: center,
                map: map,
                draggable: true,
            });
        }

        lastValidCenter = center;

        google.maps.event.addListener(map, 'idle', function() {
            google.maps.event.clearListeners(map, 'idle');
            searchMarkers();
        });

        google.maps.event.addListener(map, 'dragend', function() {
            if (strictBounds === null || strictBounds.contains(map.getCenter())) {
                lastValidCenter = map.getCenter();
            } else {
                map.panTo(lastValidCenter);
            }
            searchMarkers();

        });
        google.maps.event.addListener(map, 'zoom_changed', function() {
            if (strictBounds === null || strictBounds.contains(map.getCenter())) {
                lastValidCenter = map.getCenter();
            } else {
                map.panTo(lastValidCenter);
            }
            searchMarkers();
        });

        //Autocomplete
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            infowindow.close();
            marker.setVisible(false);
            input.className = '';
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // Inform the user that the place was not found and return.
                input.className = 'notfound';
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            var image = new google.maps.MarkerImage(
                    place.icon,
                    new google.maps.Size(71, 71),
                    new google.maps.Point(0, 0),
                    new google.maps.Point(17, 34),
                    new google.maps.Size(35, 35));
            marker.setIcon(image);
            marker.setPosition(place.geometry.location);

            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }

            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
            infowindow.open(map, marker);

            searchMarkers();
            //doSearch();
        });

        //Fin Autocomplete
    }

    function doReload() {

        //$("#loading").css("display","inline");
        //$("#loadingSearch").css("display","table");
    }

    function mycarousel_initCallback(carousel) {
        // Disable autoscrolling if the user clicks the prev or next button.
        carousel.buttonNext.bind('click', function() {
            carousel.startAuto(0);
        });

        carousel.buttonPrev.bind('click', function() {
            carousel.startAuto(0);
        });

        // Pause autoscrolling if the user moves with the cursor over the clip.
        carousel.clip.hover(function() {
            carousel.stopAuto();
        }, function() {
            carousel.startAuto();
        });

        if (carousel.size() < 5) {
            carousel.wrarp("first");
            carousel.scroll(5);
            carousel.stopAuto();
        }
    }

    function doSearch() {

        $('.search_arecomend_window').fadeOut('fast');
        $("#loader").fadeIn("fast");

        document.getElementById("hour_from_hidden").value = document.getElementById("hour_from").value;
        document.getElementById("hour_to_hidden").value = document.getElementById("hour_to").value;
        document.getElementById("price_hidden").value = $('input[type=radio][name=price]:radio:checked').val();
        document.getElementById("transmision_hidden").value = $('input[name=transmision]:checked').map(function() {
            return $(this).val()
        }).get().join();
        document.getElementById("tipo_hidden").value = $('input[name=tipo]:checked').map(function() {
            return $(this).val()
        }).get().join();
        document.getElementById("location_hidden").value = ""; //document.getElementById("location").value;
        document.getElementById("day_from_hidden").value = document.getElementById("day_from").value;
        document.getElementById("day_to_hidden").value = document.getElementById("day_to").value;

        //valido que hora desde sea mayor a la actual
        var current = new Date();
        if (isValidDate($('#day_from').val())) {

            if ($('#day_from').val() == '<?php echo date('d-m-Y') ?>' && isValidTime($('#hour_from').val())) {

                var dif = restarHoras(current.getHours() + ':' + current.getMinutes(), $('#hour_from').val())
                if (dif < 0) {
                    alert('La hora no puede ser menor a la actual');
                    $('#hour_from').val('Hora de inicio');
                }
            }
        }

        if (isValidDate($('#day_to').val())) {

            if ($('#day_to').val() == '<?php echo date('d-m-Y') ?>' && isValidTime($('#hour_to').val())) {

                var dif = restarHoras(current.getHours() + ':' + current.getMinutes(), $('#hour_to').val())
                if (dif < 0) {
                    alert('La hora no puede ser menor a la actual');
                    $('#hour_to').val('Hora');
                }
            }
        }
        

        //valido que reserva sea de mínimo 1 hora
        if (isValidDate($('#day_from').val()) && isValidDate($('#day_to').val()) && isValidTime($('#hour_from').val()) && isValidTime($('#hour_to').val())) {

            if ($('#day_from').val() == $('#day_to').val()) {

                var dif = restarHoras($('#hour_from').val(), $('#hour_to').val())
                if (dif < 1) {
                    alert('La reserva no puede ser menor a 1 hora');
                    $('#hour_from').val('Hora de inicio');
                    $('#hour_to').val('Hora');
                }
            }
        }

        searchMarkers();
    }

    //Valida formato fecha
    function isValidDate(date) {
        if (date.match(/^(?:(0[1-9]|[12][0-9]|3[01])[\- \/.](0[1-9]|1[012])[\- \/.](19|20)[0-9]{2})$/)) {
            return true;
        } else {
            return false;
        }
    }

    function isValidTime(time) {
        var objRegExp = /(^\d{2}:\d{2}:\d{2}$)/;

        if (time.match(objRegExp)) {
            return true;
        } else {
            return false;
        }
    }

    function restarHoras(hora_desde, hora_hasta) {

        var hora, min, seg;
        var hora2, min2, seg2;
        var arr = hora_desde.split(':');
        var arr2 = hora_hasta.split(':');
        hora = parseInt(arr[0]);
        min = parseInt(arr[1]);
        seg = parseInt(arr[2]);
        hora2 = parseInt(arr2[0]);
        min2 = parseInt(arr2[1]);
        seg2 = parseInt(arr2[2]);
        var aux = (hora * 3600) + (min * 60);
        var aux2 = (hora2 * 3600) + (min2 * 60);
        var dif = parseFloat((aux2 - aux) / 3600);

        return dif;
    }

    function searchMarkers() {

        $('.search_arecomend_window').fadeOut('fast', function() {
            $("#loader").fadeIn("fast");
        });

        // First, determine the map bounds
        var bounds = map.getBounds();

        // Then the points
        var swPoint = bounds.getSouthWest();
        var nePoint = bounds.getNorthEast();

        // Now, each individual coordinate
        swLat = swPoint.lat();
        swLng = swPoint.lng();
        neLat = nePoint.lat();
        neLng = nePoint.lng();

        var hour_from = document.getElementById("hour_from_hidden").value;
        var hour_to = document.getElementById("hour_to_hidden").value;
        var brand_hidden = encodeURIComponent(document.getElementById("brand_hidden").value);
        var location_hidden = encodeURIComponent(document.getElementById("location_hidden").value);
        var price_hidden = encodeURIComponent(document.getElementById("price_hidden").value);
        var transmision_hidden = encodeURIComponent(document.getElementById("transmision_hidden").value);
        var tipo_hidden = encodeURIComponent(document.getElementById("tipo_hidden").value);
        var model_hidden = encodeURIComponent(document.getElementById("model_hidden").value);
        var day_from_hidden = encodeURIComponent(document.getElementById("day_from_hidden").value);
        var day_to_hidden = encodeURIComponent(document.getElementById("day_to_hidden").value);

        if (price_hidden != '-') {
            precio = "&price=" + price_hidden;
        } else {
            var center = map.getCenter();
            var lat = center.lat();
            var lon = center.lng();
            var start_price = "0";
            precio = "&clat=" + lat + "&clng=" + lon + "&price=" + start_price;
        }

        var center = map.getCenter();
        var map_lat = center.lat();
        var map_lng = center.lng();
        var region = "";
        var comuna = "";

        var url = "<?php echo url_for('main/map') ?>?day_from=" + day_from_hidden + "&day_to=" + day_to_hidden + "&model=" + model_hidden + "&hour_from=" + hour_from + "&hour_to=" + hour_to + "&brand=" + brand_hidden + "&transmission=" + transmision_hidden + "&type=" + tipo_hidden + "&location=" + location_hidden + precio + "&swLat=" + swLat + "&swLng=" + swLng + "&neLat=" + neLat + "&neLng=" + neLng + "&map_clat=" + map_lat + "&map_clng=" + map_lng + "";
        if (region && region.length > 0 && region != 0) {
            url += "&region=" + region;
        }
        if (comuna && comuna.length > 0 && comuna != 0) {
            url += "&comuna=" + comuna;
        }

        //document.write(var_dump(url,'html'));

        $.getJSON(url, function(data) {

            if (markers) {
                var i = 0, l = markers.length;
                var markersLength = markers.length;
                for (i; i < l; i++) {
                    markers[i].setMap(null)
                }
                markers = [];
            }

            if (markersLength > 0) {
                markerCluster.clearMarkers();
            }
            var contador = 0;
            var nodes = '';
            for (var i = 0; i < data.cars.length; i++) {
                var dataCar = data.cars[i];


                var latLng = new google.maps.LatLng(dataCar.latitude, dataCar.longitude);
                if (dataCar.verificado) {
                    var verificado = "<img src='http://www.arriendas.cl/images/verificado.png' class='img_verificado' title='Auto Asegurado'/>";
                } else {
                    var verificado = "";
                }

                if (dataCar.cantidadCalificacionesPositivas == 0) {
                    var calificacionesPositivas = "";
                } else {
                    var calificacionesPositivas = "- " + dataCar.cantidadCalificacionesPositivas + "<img src='http://www.arriendas.cl/images/Medalla.png' class='medallita'/>";
                }

                if (dataCar.userVelocidadRespuesta == "") {
                    velocidadDeRespuesta = "<span style='font-style: italic; color:#BCBEB0;font-weight: normal;'>No tiene mensajes</span>";
                } else {
                    velocidadDeRespuesta = dataCar.userVelocidadRespuesta;
                }

                var opcionLogeado = "";
                if (usuarioLogeado == 1) {//Informacion cuando se esta logeado
                    //opcionLogeado = '<div class="detalles_user"><a target="_blank" href="http://www.arriendas.cl/profile/publicprofile/id/' + dataCar.userid + '" class="mapcar_user_titulo" title="Ir al perfil de '+dataCar.firstname +'">' + dataCar.firstname + " " + dataCar.lastname + '</a><a target="_blank" href="http://www.arriendas.cl/messages/new/id/' +dataCar.userid + '" class="mapcar_user_message" title="Env&iacute;ale un mensaje a '+ dataCar.firstname +'"></a></div><div class="datos_user"><div class="img_vel_resp"></div><p>Velocidad de Respuesta: <br><b>'+velocidadDeRespuesta+'</b></p><div class="img_reservas_resp"></div><p>Reservas Respondidas: <b>' + dataCar.reservasRespondidas + '</b></p></div>';
                    opcionLogeado = '<div class="detalles_user"><a target="_blank" href="http://www.arriendas.cl/profile/publicprofile/id/' + dataCar.userid + '" class="mapcar_user_titulo" title="Ir al perfil del dueño">Ver perfil del dueño</a><a target="_blank" href="http://www.arriendas.cl/messages/new/id/' + dataCar.userid + '" class="mapcar_user_message" title="Env&iacute;ale un mensaje al dueño"></a></div><div class="datos_user"><div class="img_vel_resp"></div><p>Velocidad de Respuesta: <br><b>' + velocidadDeRespuesta + '</b></p></div>';
                } else {//Informacion cuando NO se está logeado
                    if (dataCar.verificado) {
                        opcionLogeado = "<div class='info_car_asegurado'><p>Asegurado <span style='font-weight:normal'>(Deducible 5 UF)</span></p><div class='imagenesSeguro'><a title='Seguro contra daños'><div class='img_s1_home'></div></a><p class='sepa'>|</p><a title='Seguro destrucción total'><div class='img_s2_home'></div></a><p class='sepa'>|</p><a title='Seguro de terceros'><div class='img_s3_home'></div></a><p class='sepa'>|</p><a title='Seguro de conductor y acompañante'><div class='img_s4_home'></div></a><p class='sepa'>|</p><a title='Seguro contra robo'><div class='img_s5_home'></div></a></div></div>";
                    } else {
                        opcionLogeado = "";
                    }
                }
                var urlFotoTipo = "";
                var urlFotoThumbTipo = "";
                if (dataCar.photoType == 1) {
                    urlFotoTipo = dataCar.photo;
                    //urlFotoThumbTipo = "<?php echo url_for('main/s3thumb'); ?>?alto=84&ancho=112&urlFoto=" + dataCar.photo;
                    urlFotoThumbTipo = dataCar.photo;
                } else {
                    urlFotoTipo = "<?php echo image_path('../uploads/cars/" + dataCar.photo + "'); ?>";
                    urlFotoThumbTipo = "http://arriendas.cl/uploads/cars/" + dataCar.photo;
                    //"<?php echo image_path('../uploads/cars/thumbs/" + dataCar.photo + "'); ?>";
                }

                var contentString = '<div style="width:380px; height:165px;" class="mapcar_box" id="' + dataCar.id + '">' +
                    '<div class="mapcar_frame">' +
                    '<a href="' + urlFotoTipo + '"  class="thickbox"  ><img class="imagemark" width="112" height="84" src="http://res.cloudinary.com/arriendas-cl/image/fetch/w_112,h_84,c_fill,g_center/' + urlFotoThumbTipo + '"/></a>' +
                    '</div><div class="detalles_car"><div class="titulo"><a target="_blank" title="Ir al perfil del auto" href="<?php echo url_for('arriendo-de-autos/rent-a-car') ?>/' + dataCar.brand + dataCar.model + '/' + dataCar.comuna + '/' + dataCar.id + '">' + dataCar.brand + ' ' + dataCar.model + " " + verificado + calificacionesPositivas + '</a></div><div class="datos_car"><p>Dia: <b>$' + dataCar.price_per_day + ' CLP</b></p><p>Hora: <b>$' + dataCar.price_per_hour + ' CLP</b></p><p>Transmisión: <b>' + dataCar.typeTransmission + '</b></p></div>' + opcionLogeado + '</div><a target="_blank" href="<?php echo url_for('profile/reserve?id=') ?>' + dataCar.id + '" class="mapcar_btn_detalle"></a></div>';

                if (infowindow)
                    infowindow.close();
                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                //var image = 'images/beachflag.png';

                //var num = i+1;

                //var image = "<?php echo 'http://www.arriendas.cl/images/Home/IndicadorMapa.png'; ?>";
                if (dataCar.verificado) {
                    contador = contador + 1;
                    var image = 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=' + contador + '|05a4e7|ffffff';
                    //var image = "<?php echo image_path('Home/IcoPin.png'); ?>";
                } else {
                    var image = "<?php echo 'http://www.arriendas.cl/images/Home/circle.png'; ?>";
                    //var image = "<?php echo 'http://devel.arriendas.cl/frontend/web/images/Home/circle.png'; ?>";
                }

                var marker = new google.maps.Marker({
                    id: dataCar.id,
                    position: latLng,
                    icon: image,
                    contentString: contentString
                });


                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(this.contentString);
                    infowindow.open(map, this);

                    $('a.thickbox').click(function() {
                        var t = this.title || this.name || null;
                        var a = this.href || this.alt;
                        var g = this.rel || false;
                        tb_show(t, a, g);
                        this.blur();
                        return false;
                    });

                });


                markers.push(marker);
                //<img src="<?php echo image_path('Home/IndicadorMapa.png'); ?>"/>
                //search box
                nodes += '<div class="search_arecomend_item" id="' + dataCar.id + '">';
                nodes += '<div class="marcadores">';
                nodes += '<img src="http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=' + contador + '|05a4e7|ffffff" /></div>';
                nodes += '<div class="search_arecomend_frame" style="width: 86px;height: 59px;">';
                nodes += '<img width="80px" height="52px" src="http://res.cloudinary.com/arriendas-cl/image/fetch/w_80,h_52,c_fill,g_center/' + urlFotoThumbTipo + '" />';
                nodes += '</div>';
                nodes += '<ul class="search_arecomend_info">';
                nodes += '<input type="hidden" class="link" value="<?php echo url_for('arriendo-de-autos/rent-a-car') ?>/' + dataCar.brand + dataCar.model + '/' + dataCar.comuna + '/' + dataCar.id + '"/>';
                nodes += '<li class="search_arecomend_marca">';
                nodes += '<a target="_blank" title="Ir al perfil del auto" href="<?php echo url_for('arriendo-de-autos/rent-a-car') ?>/' + dataCar.brand + dataCar.model + '/' + dataCar.comuna + '/' + dataCar.id + '">';
                switch (dataCar.typeModel)
                {
                    case "1":
                        typeModel = 'Automóvil';
                        break;
                    case "2":
                        typeModel = 'Pick-Up';
                        break;
                    case "3":
                        typeModel = 'Station Wagon';
                        break;
                    case "39":
                        typeModel = 'SUV';
                        break;
                    case "4":
                        typeModel = 'Furgón';
                        break;
                }
                nodes += dataCar.brand + ' ' + dataCar.model + ' <span class="title_peq">(' + dataCar.year + ', ' + typeModel + ', ' + dataCar.typeTransmission + ')</span>';
                nodes += '</a>';
                nodes += '</li>';
                //nodes += '<li class="tag_comuna_city">Comuna, Ciudad</li>'
                nodes += '<li>Día: <b>$' + dataCar.price_per_day + ' - </b>';
                nodes += 'Hora: <b>$' + dataCar.price_per_hour + '</b></li>';
                //numStars = dataCar.stars por ejemplo
                var numStars = (dataCar.carPercentile); //función temporal
                //nodes +=             '<li class="stars">'+ generarBarraEstrellas(numStars) +'</li>'

                var ContestaPedidos = (((dataCar.carPercentile * 20) > 100) ? 100 : (dataCar.carPercentile * 20).toFixed(0));
                nodes += '<li><span style="font-size: 10px;">Porcentaje de Respuesta: ' + ContestaPedidos + '%</span></li>';
                <?php if (sfContext::getInstance()->getUser()->getAttribute("logged")) { ?>
                    //nodes +=            '<li class="sep">Usuario: <a target="_blank" title="Ir al perfil de '+dataCar.firstname+'" class="link_user" href="http://www.arriendas.cl/profile/publicprofile/id/'+dataCar.userid+'">'+dataCar.firstname+' '+dataCar.lastname+'</a></li>';
                <?php } ?>
                nodes += '</ul>';
                nodes += '</div>';
            }

            $('.search_arecomend_window').stop(true, true);
            $("#loader").stop(true, true);

            $("#loader").hide();
            $(".search_arecomend_window").html(nodes);
            $('.search_arecomend_window').fadeIn("fast");
            //$("#loader").fadeIn("fast");		   


            //createClickToMarker();

            var mcOptions = {maxZoom: 10};

            markerCluster = new MarkerClusterer(map, markers, mcOptions);

            //            var bounds = new google.maps.LatLngBounds();
            //            for (var i = 0, LtLgLen = markers.length; i < LtLgLen; i++) {
            //              bounds.extend(markers[i].position);
            //            }
            //            map.fitBounds(bounds);




            //            google.maps.event.addListener(map, 'idle', function() {
            //                google.maps.event.addListener(map, 'dragend', function() {
            //                    searchMarkers();
            //                });
            //                google.maps.event.addListener(map, 'zoom_changed', function() {
            //                    searchMarkers();
            //                });
            //            });
        });
    }

    function generarBarraEstrellas(num) {
        var gris = "<?php echo image_path('img_search/EstrellaGris.png'); ?>";
        var rosa = "<?php echo image_path('img_search/EstrellaRosada'); ?>";

        var cadena = "";
        for (var i = 0; i < 5; i++) {
            if (num > 0)
                cadena = cadena + '<img width="10px" height="9px" src="' + rosa + '" />';
            else
                cadena = cadena + '<img width="10px" height="9px" src="' + gris + '" />';

            num--;
        }
        return cadena;
    }

    /*
     function formatNumber(precio){
     var precioMillones = Math.floor(precio/1000000);
     var precioMiles = parseInt(precio) - (precioMillones*1000000);
     precioMiles = Math.floor(precioMiles/1000);
     var precioCientos = parseInt(precio) - (precioMiles*1000);
     var precioResultado = "";
     if(precioMillones == 0){
     if(precioMiles == 0){
     precioResultado = precioCientos;
     }else{
     if(precioCientos == 0){
     precioResultado = precioMiles + ".000";
     }else{
     cantidadDeCientos = ((precioCientos).toString()).length;
     if(cantidadDeCientos == 1) precioResultado = precioMiles + ".00" + precioCientos;
     else if(cantidadDeCientos == 2) precioResultado = precioMiles + ".0" + precioCientos;
     else precioResultado = precioMiles + "." + precioCientos;
     }
     }
     }else{
     if(precioMiles == 0){
     if(precioCientos == 0){
     precioResultado = precioMillones + ".000.000";
     }else{
     cantidadDeCientos = ((precioCientos).toString()).length;
     if(cantidadDeCientos == 1) precioResultado = precioMillones + ".000.00" + precioCientos;
     else if(cantidadDeCientos == 2) precioResultado = precioMillones + ".000.0" + precioCientos;
     else precioResultado = precioMillones + ".000." + precioCientos;
     }
     }else{
     cantidadDeMiles = ((precioMiles).toString()).length;
     cantidadDeCientos = ((precioCientos).toString()).length;
     if(cantidadDeMiles == 1){
     if(cantidadDeCientos == 1) precioResultado = precioMillones + ".00" + precioMiles + ".00" + precioCientos;
     else if(cantidadDeCientos == 2) precioResultado = precioMillones + ".00" + precioMiles + ".0" + precioCientos;
     else precioResultado = precioMillones + ".00" + precioMiles + "." + precioCientos;
     }else if(cantidadDeCientos == 2){
     if(cantidadDeCientos == 1) precioResultado = precioMillones + ".0" + precioMiles + ".00" + precioCientos;
     else if(cantidadDeCientos == 2) precioResultado = precioMillones + ".0" + precioMiles + ".0" + precioCientos;
     else precioResultado = precioMillones + ".0" + precioMiles + "." + precioCientos;
     }else{
     if(cantidadDeCientos == 1) precioResultado = precioMillones + "." + precioMiles + ".00" + precioCientos;
     else if(cantidadDeCientos == 2) precioResultado = precioMillones + "." + precioMiles + ".0" + precioCientos;
     else precioResultado = precioMillones + "." + precioMiles + "." + precioCientos;
     }
     }
     }
     return precioResultado;
     }
     */

    function createClickToMarker() {
        /*
         $(".search_arecomend_item").hover(function () {
         var currentId = $(this).attr('id');
         
         if (markers) {
         for (i in markers) {
         
         if(currentId == markers[i].id){
         
         google.maps.event.trigger(markers[i], 'click');
         }
         }
         
         }
         
         
         });
         */
    }

    function var_dump(data, addwhitespace, safety, level) {
        var rtrn = '';
        var dt, it, spaces = '';
        if (!level) {
            level = 1;
        }
        for (var i = 0; i < level; i++) {
            spaces += '   ';
        }//end for i<level
        if (typeof (data) != 'object') {
            dt = data;
            if (typeof (data) == 'string') {
                if (addwhitespace == 'html') {
                    dt = dt.replace(/&/g, '&amp;');
                    dt = dt.replace(/>/g, '&gt;');
                    dt = dt.replace(/</g, '&lt;');
                }//end if addwhitespace == html
                dt = dt.replace(/\"/g, '\"');
                dt = '"' + dt + '"';
            }//end if typeof == string
            if (typeof (data) == 'function' && addwhitespace) {
                dt = new String(dt).replace(/\n/g, "\n" + spaces);
                if (addwhitespace == 'html') {
                    dt = dt.replace(/&/g, '&amp;');
                    dt = dt.replace(/>/g, '&gt;');
                    dt = dt.replace(/</g, '&lt;');
                }//end if addwhitespace == html
            }//end if typeof == function
            if (typeof (data) == 'undefined') {
                dt = 'undefined';
            }//end if typeof == undefined
            if (addwhitespace == 'html') {
                if (typeof (dt) != 'string') {
                    dt = new String(dt);
                }//end typeof != string
                dt = dt.replace(/ /g, "&nbsp;").replace(/\n/g, "<br>");
            }//end if addwhitespace == html
            return dt;
        }//end if typeof != object && != array
        for (var x in data) {
            if (safety && (level > safety)) {
                dt = '*RECURSION*';
            } else {
                try {
                    dt = var_dump(data[x], addwhitespace, safety, level + 1);
                } catch (e) {
                    continue;
                }
            }//end if-else level > safety
            it = var_dump(x, addwhitespace, safety, level + 1);
            rtrn += it + ':' + dt + ',';
            if (addwhitespace) {
                rtrn += '\n' + spaces;
            }//end if addwhitespace
        }//end for...in
        if (addwhitespace) {
            rtrn = '{\n' + spaces + rtrn.substr(0, rtrn.length - (2 + (level * 3))) + '\n' + spaces.substr(0, spaces.length - 3) + '}';
        } else {
            rtrn = '{' + rtrn.substr(0, rtrn.length - 1) + '}';
        }//end if-else addwhitespace
        if (addwhitespace == 'html') {
            rtrn = rtrn.replace(/ /g, "&nbsp;").replace(/\n/g, "<br>");
        }//end if addwhitespace == html
        return rtrn;
    }

    function initialize2() {

        $('#video').html('	<iframe src="http://player.vimeo.com/video/45668172?title=0&byline=0&portrait=0ll" width="940" height="500" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>')

        //timerSet("#hour_from", "#hour_to");
        $("#hour_from, #hour_to").timePicker({show24Hours: false});
        $("#hour_from_lista, #hour_to_lista").timePicker({show24Hours: false});

        getModel($("#brand"), false);

        $("#brand").change(function() {
            getModel($(this), true);
        });

        $('#model').change(function() {
            //doSearch();
        });
        $(".trigger_lista").change(function() {
            updateLista();
        });

        // desde MAPA
        $('#day_from').change(function() {
            doSearch();
        });
        $('#hour_from').change(function() {
            doSearch();
            
            // impacto cambio en desde/hasta de solapa LISTA
            $('#hour_from_lista').val($(this).val());
            $('#hour_to_lista').val($('#hour_to').val());
        });

        // hasta MAPA
        $('#day_to').change(function() {
            doSearch();
        });
        $('#hour_to').change(function() {
            doSearch();
            $('#hour_to_lista').val($(this).val());
        });

        // desde LISTA
        $('#hour_from_lista').change(function() {
            doSearch();
            
            // impacto cambio en desde/hasta de solapa MAPA
            $('#hour_from').val($(this).val());
            
            updateLista();
        });

        // hasta LISTA
        $('#hour_to_lista').change(function() {
                
            doSearch();
            $('#hour_to').val($(this).val());
            updateLista();
        });


        //$('#searchTextField').keypress(function (e) {
        //  if (e.which == 13) {
        //  }
        //});

        var date = new Date();

        if (date.getMinutes() < 30) {
            var hora = date.getHours() + 1;
            suffex = (hora >= 12) ? 'PM' : 'AM';
            hora = (hora > 12) ? hora - 12 : hora;
            hora = (hora == '00') ? 12 : hora;
            //$('#hour_from').val(hora + ':00 '+suffex);
        } else {
            var hora = date.getHours() + 1;
            suffex = (hora >= 12) ? 'PM' : 'AM';
            hora = (hora > 12) ? hora - 12 : hora;
            hora = (hora == '00') ? 12 : hora;
            //$('#hour_from').val(hora+':30 '+suffex);
        }

        //fecha actual
        var dia = date.getDate();
        if (dia < 10) {
            dia = '0' + dia;
        }
        var mes = date.getMonth() + 1;
        if (mes < 10) {
            mes = '0' + mes;
        }
        var anio = date.getFullYear();

        //$('#day_from').val(dia+'-'+mes+'-'+anio);

        $('#day_from').change(function() {

            if ($('#day_to').val() == 'Dia desde' || $('#day_to').val() == '')
                $('#day_to').val($(this).val());
            
            // impacto cambio en desde/hasta de solapa LISTA
            $('#day_from_lista').val($(this).val());
            $('#day_to_lista').val($(this).val());
        });
        
        $('#day_from_lista').change(function() {

            $('#day_to_lista').val($(this).val());
            
            // impacto cambio en desde/hasta de solapa MAPA
            $('#day_from').val($(this).val());
            $('#day_to').val($(this).val());
            updateLista();
        });
        
        $('#day_to').change(function() {
            // impacto cambio en desde/hasta de solapa LISTA
            $('#day_to_lista').val($(this).val());
        });
        
        $('#day_to_lista').change(function() {
            // impacto cambio en desde/hasta de solapa MAPA
            $('#day_to').val($(this).val());
            updateLista();
        });
        
        
        /*	
         $('#day_to').change(function() {
         doSearch();
         });
         */
        $('#brand').change(function() {
            //doSearch();
        });

        $('input[type=radio][name=price]').change(function() {
            doSearch();
        });


        $('input[name=transmision]').click(function() {
            doSearch();
        });

        $('input[name=tipo]').click(function() {
            doSearch();
        });



        $("#day_from, #day_from_lista").datepicker({
            dateFormat: 'dd-mm-yy',
            buttonImageOnly: true,
            minDate: '-0d',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá']
        });



        $("#day_to, #day_to_lista").datepicker({
            dateFormat: 'dd-mm-yy',
            buttonImageOnly: true,
            minDate: '-0d',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sabado'],
            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
            dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá']
        });


        $("#chooseRegion").change(function() {
            $.getJSON("<?php echo url_for('main/getComunasSearch') ?>", {codigo: $(this).val(), ajax: 'true'}, function(j) {
                var options = '';
                for (var i = 0; i < j.length; i++) {
                    options += '<option value="' + j[i].optionValue + '" >' + j[i].optionDisplay + '</option>';
                }
                $("#chooseComuna").html(options);
            });
            updateLista();
        });

        $("#chooseComuna").change(function() {
            updateLista();
        });
        
        $('a.mapcar_btn_detalle').live('click', function(event) {

            event.preventDefault();
            obj = $(this);

            $.ajax({
                type: 'post',
                url: '<?php echo url_for('main/filtrosBusqueda') ?>',
                data: {fechainicio: $('#day_from').val(), horainicio: $('#hour_from').val(), fechatermino: $('#day_to').val(), horatermino: $('#hour_to').val()},
                success: function() {

                    top.location = obj.attr('href');
                }
            })
        })
        /*código german*/

        $("#sliderComoUsar").click(function() {

            var url1 = $(".img_instrucciones_1").attr('src');
            url1 = url1.split('/');

            var url2 = $(".img_instrucciones_2").attr('src');
            url2 = url2.split('/');

            //alert(url1[url1.length-1]);

            if (url1[url1.length - 1] == 'dueno.png') {
                url1[url1.length - 1] = 'arrendatario.png';
                url2[url2.length - 1] = 'slider1.png';
                $(".boton_ponerAutoArriendo").removeClass("botonSeleccionado");
                $(".boton_arriendaUnAuto").addClass("botonSeleccionado");
            } else {
                url1[url1.length - 1] = 'dueno.png';
                url2[url2.length - 1] = 'slider2.png';
                $(".boton_arriendaUnAuto").removeClass("botonSeleccionado");
                $(".boton_ponerAutoArriendo").addClass("botonSeleccionado");
            }

            url1 = url1.join('/');
            $(".img_instrucciones_1").attr('src', url1);

            url2 = url2.join('/');
            $(".img_instrucciones_2").attr('src', url2);

        });
        /*fin código germán*/

        /*Código Miguel*/
        $(".boton_arriendaUnAuto").click(function() {
            $(".boton_ponerAutoArriendo").removeClass("botonSeleccionado");
            $(".boton_arriendaUnAuto").addClass("botonSeleccionado");

            var url1 = $(".img_instrucciones_1").attr('src');
            url1 = url1.split('/');

            var url2 = $(".img_instrucciones_2").attr('src');
            url2 = url2.split('/');

            url1[url1.length - 1] = 'arrendatario.png';
            url2[url2.length - 1] = 'slider1.png';

            url1 = url1.join('/');
            $(".img_instrucciones_1").attr('src', url1);

            url2 = url2.join('/');
            $(".img_instrucciones_2").attr('src', url2);

        });
        $(".boton_ponerAutoArriendo").click(function() {
            $(".boton_arriendaUnAuto").removeClass("botonSeleccionado");
            $(".boton_ponerAutoArriendo").addClass("botonSeleccionado");

            var url1 = $(".img_instrucciones_1").attr('src');
            url1 = url1.split('/');

            var url2 = $(".img_instrucciones_2").attr('src');
            url2 = url2.split('/');

            url1[url1.length - 1] = 'dueno.png';
            url2[url2.length - 1] = 'slider2.png';

            url1 = url1.join('/');
            $(".img_instrucciones_1").attr('src', url1);

            url2 = url2.join('/');
            $(".img_instrucciones_2").attr('src', url2);


        });
        
        //        $('.gallery a').lightBox({
        //            imageLoading:			'images/img_gallery/lightbox-ico-loading.gif',		
        //            imageBtnPrev:			'images/img_gallery/lightbox-btn-prev.gif',			
        //            imageBtnNext:			'images/img_gallery/lightbox-btn-next.gif',			
        //            imageBtnClose:			'images/img_gallery/lightbox-btn-close.gif',		
        //            imageBlank:				'images/img_gallery/lightbox-blank.gif'	
        //        });

        /*Fin Código Miguel */

        // async load of Zendesk
        var c = document.createElement('link');
        c.rel = "stylesheet";
        c.type = "text/css";
        c.href = "//asset.zendesk.com/external/zenbox/v2.6/zenbox.css";
        var h = document.getElementsByTagName('head')[0];
        h.appendChild(c);
        $.ajax({
            url: "//asset.zendesk.com/external/zenbox/v2.6/zenbox.js",
            dataType: "script",
            cache: true,
            success: function() {
                Zenbox.init({
                    dropboxID: "20193521",
                    url: "https://arriendascl.zendesk.com",
                    tabTooltip: "Chat",
                    tabImageURL: "https://assets.zendesk.com/external/zenbox/images/tab_es_support.png",
                    tabColor: "black",
                    tabPosition: "Right"
                });
            }
        });
        //        $("#chooseRegion").val("13");
        //        updateLista();
        
        
        <?php if (isset($region) && isset($comuna)): ?>
            // viene por una URI específica para region/comuna
            var region = <?php echo $region ?>;
            var comuna = <?php echo $comuna ?>;
            listadoRegionComuna(region, comuna);
        <?php else: ?>
            $('#chooseRegion option[value=13]').prop('selected', 'selected').change();
        <?php endif; ?>
    }    
                        
    function listadoRegionComuna(region, comuna) {   
        
        $("#btn-lista").click();
        $('#chooseRegion option[value='+region+']').prop('selected', 'selected');
        
        $.getJSON("<?php echo url_for('main/getComunasSearch') ?>", {codigo: region, ajax: 'true'}, function(j) {
            var options = '';
            for (var i = 0; i < j.length; i++) {
                options += '<option value="' + j[i].optionValue + '" >' + j[i].optionDisplay + '</option>';
            }
            $("#chooseComuna").html(options);
            $('#chooseComuna option[value='+comuna+']').prop('selected', 'selected');
            updateLista();
        });     
    }

    function updateLista() {

        if (isValidDate($('#day_from_lista').val())) {

            if ($('#day_from_lista').val() == '<?php echo date('d-m-Y') ?>' && isValidTime($('#hour_from_lista').val())) {

                var dif = restarHoras(current.getHours() + ':' + current.getMinutes(), $('#hour_from_lista').val())
                if (dif < 0) {
                    alert('La hora no puede ser menor a la actual');
                    $('#hour_from_lista').val('Hora de inicio');
                }
            }
        }

        if (isValidDate($('#day_to_lista').val())) {

            if ($('#day_to_lista').val() == '<?php echo date('d-m-Y') ?>' && isValidTime($('#hour_to_lista').val())) {

                var dif = restarHoras(current.getHours() + ':' + current.getMinutes(), $('#hour_to_lista').val())
                if (dif < 0) {
                    alert('La hora no puede ser menor a la actual');
                    $('#hour_to_lista').val('Hora');
                }
            }
        }

        var url = "<?php echo url_for('main/listaAjax') ?>";
        $("#tab-lista-data").hide();
        $("#tab-lista-data-spinner").show();
        
        var dataObj = {
            "region": $("#chooseRegion").val(), 
            "comuna": $("#chooseComuna").val(),
            "day_from": $("#day_from_lista").val(),
            "hour_from": $("#hour_from_lista").val(),
            "day_to": $("#day_to_lista").val(),
            "hour_to": $("#hour_to_lista").val(),
            "transmission": $('input[name=transmision_lista]:checked').map(function() {return $(this).val()}).get().join(),
            "price": $("input[name=precio_lista]:checked").val(),
            "type": $('input[name=tipo_lista]:checked').map(function() {return $(this).val()}).get().join(),
        }
        
        $.ajax({
            "url": url,
            "data": dataObj,
            "success": function(data) {
                $("#tab-lista-data").html(data);
                $("#tab-lista-data").show();
                $('.gallery a').lightBox({
                    imageLoading:			'images/img_gallery/lightbox-ico-loading.gif',		
                    imageBtnPrev:			'images/img_gallery/lightbox-btn-prev.gif',			
                    imageBtnNext:			'images/img_gallery/lightbox-btn-next.gif',			
                    imageBtnClose:			'images/img_gallery/lightbox-btn-close.gif',		
                    imageBlank:				'images/img_gallery/lightbox-blank.gif'	
                });
                oTable = $('#example').dataTable({
                    "aaSorting": [],
                    "bDeferRender": true,
                    "bScrollInfinite": true,
                    "bScrollCollapse": true,
                    "sScrollY": "400px"
                });
            },
            "complete": function() {
                $("#tab-lista-data-spinner").hide();
            }
        });
    }

    function getModel(currentElement, reloadCars) {

        console.log('getModel');

        $("#model").html("");

        $.getJSON("<?php echo url_for('main/getModelSearch') ?>", {id: currentElement.val(), ajax: 'true'}, function(j) {
            var options = '';

            for (var i = 0; i < j.length; i++) {

                options += '<option value="' + j[i].optionValue + '" >' + j[i].optionDisplay + '</option>';

            }
            $("#model").html(options);


            if (reloadCars) {
                doSearch();
            }
            ;

        })
    }
</script>

<style type="text/css">

    #loading {
        z-index:10;
        display: none;
        position:absolute;
        width: 630px;
        height: 520px;
        background: white url(<?php echo image_path("ajax-loader.gif") ?>) no-repeat center center;
        zoom: 1;
        filter: alpha(opacity=50);
        opacity: 0.5; 
    }	  

    #loadingSearch {
        /* z-index:10;
       position:absolute;*/
        display:table;
        width: 950px;
        height: 215px;
        background: white url(<?php echo image_path("ajax-loader.gif") ?>) no-repeat center center;
        zoom: 1;
        filter: alpha(opacity=50);
        opacity: 0.5; 
    }	  



    #loading #icon {
        position:absolute;
        top: 240px;
        left: 300px;

    }

    #offers {
        width: 300px;
        height: 400px;
        float:right;
    }

    #InfoCar{
        font-size:12px;
        width:300px;
        height:150px;


    }

    #InfoCar h1{
        font-size:14px;
    }

    .imagemark
    {
        margin-bottom:10px;
        float:left;
    }



    .land_sector3{

        display:none;
    }

    #search{

    }
</style>

<input type="hidden" id="hour_from_hidden"<?php
if ($hour_from && $hour_from != '01:00') {
    echo ' value="' . $hour_from . '"';
}
?> />
<input type="hidden" id="hour_to_hidden"<?php
if ($hour_to && $hour_to != '01:00') {
    echo ' value="' . $hour_to . '"';
}
?> />
<input type="hidden" id="price_hidden" />
<input type="hidden" id="transmision_hidden" />
<input type="hidden" id="tipo_hidden" />
<input type="hidden" id="model_hidden" value="0"  />
<input type="hidden" id="brand_hidden" />
<input type="hidden" id="location_hidden" />
<input type="hidden" id="day_from_hidden" value="<?php
if ($day_from && $day_from != '12-11-2013') {
    echo $day_from;
} else {
    echo "12-11-2013";
}
?>" />
<input type="hidden" id="day_to_hidden"<?php
if ($day_to) {
    echo ' value="' . $day_to . '"';
}
?> />

<script>

    var openFilters = false;    
    
    $(document).ready(function() {

        $("#footer_search_box_2").click(function(){
            $("#btn-lista").click();
        });

        $(".btn-busqueda").click(function() {

            var tabId = $(this).attr("data-tab");
            
            $(".btn-busqueda").removeClass("active");
            $(".tab-data").hide();
            $(".tab-" + tabId).show();
            
            if(oTable && tabId == "lista"){
                oTable.fnAdjustColumnSizing();
            }

            $(this).addClass("active");
        });

        $(".btn_filtro").click(function() {
            $('#opc_filtro').toggle("slow");
        });
        $(".btn_filtro_lista, .btn_buscar_lista").click(function() {
            $('.opc_filtro_lista').toggle("slow");
        });
        
        $("#btn_buscar").click(function() {
            if (openFilters) {
                $("#btn_filtro2").click();
                openFilters = false;
            } else {
                $("#btn_filtro1").click();
                openFilters = true;
            }
        });

        $("#btn_filtro1").click(function() {
            $('#btn_filtro1').css("display", "none");
            $('#map').css("width", "509px");
            $('.search_box_1_maparea').css("width", "511px");
            $('.search_box_1_maparea').css("margin-left", "119px");
        });

        $("#btn_filtro2").click(function() {
            $('#btn_filtro1').css("display", "block");
            $('#map').css("width", "628px");
            $('.search_box_1_maparea').css("width", "630px");
            $('.search_box_1_maparea').css("margin-left", "0px");
        });

        $("#more").click(function() {

            $(".search_ext_box").slideToggle("slow");
        });

        <?php if ($sf_user->getAttribute('geolocalizacion') == true): ?>
            localizame();
        <?php endif; ?>

        $(".buton_more_options").click(function() {
            $(".search_ext_box").each(function() {
                displaying = $(this).css("display");
                if (displaying == "block") {
                    $(this).fadeOut('hide', function() {
                        $(this).css("display", "none");
                    });
                } else {
                    $(this).fadeIn('hide', function() {
                        $(this).css("display", "block");
                    });
                }
            });
        });

        <?php if ($holiday): ?>

            var tabId = "lista";
            
            $(".btn-busqueda").removeClass("active");
            $(".tab-data").hide();
            $(".tab-" + tabId).show();
            
            if(oTable && tabId == "lista"){
                oTable.fnAdjustColumnSizing();
            }

            $("#btn-mapa").hide();
            $("#btn-lista").addClass("active");
        <?php endif; ?>
    });
</script>

<div class="search_container">

    <div class="slogan">
        <div class="slogan_izq"><div class="triangulo_izq"></div></div>
        <div class="land_slogan_area" style="padding-top: 12px;height: 38px;">
            <?php
            if (stripos($_SERVER['SERVER_NAME'], "arrendas") !== FALSE)
                echo "<h2>Autos en alquiler desde 5.000 pesos la hora, cerca tuyo</h2>";
            else
                echo "<div id='tagLineArrendador'>
                    <h2>Arriendas es tu <span class='dest'>propio negocio</span>, empieza a monetizar tu auto ";
            if (sfContext::getInstance()->getUser()->isAuthenticated()) {
                echo "</h2>";
            } else {
                echo "<span class='dest'><a href='" . url_for('main/register') . "' title='Ingresa aquí para registrarte' style='color:#00AEEF;'>aquí</a></span></h2>";
            }
            echo "</div>
                <div id='tagLineArrendatario'>
                    <h1 style='font-family: Helvetica,Arial,sans-serif;font-size: 26px;
letter-spacing: -1px;
font-weight: normal;
display: block;
color: #303030;
font-style: italic;'>Arriendo de autos <span class='dest'>vecinos</span> con seguro 1000UF, asistencia y TAGs en el <span class='dest'>precio final</span></h2>

                </div>";
            ?>

        </div><!-- land_slogan_area -->
        <div class="slogan_der"><div class="triangulo_der"></div></div>
    </div><!-- slogan-->

    <div class="main_box_1_anterior">
        <div class="main_box_2_anteriorNew">
            <div class="search_sector1">      
                <!--  busqueda avanzada -->
                <div class="search_box_1_titleNew">
                    <button class="btn-busqueda active" id="btn-mapa" data-tab="mapa" >Mapa</button>
                    <button class="btn-busqueda" id="btn-lista" style="<?php if (!$holiday) echo 'margin-left: -3px' ?>" data-tab="lista" >Lista</button>
                </div>
                <div class="search_box_1_PrincipalNew">
                    <div class="search_box_1_header tab-data tab-mapa">
                        <div class="search_box1_form" style="">
                            <span style="width: 360px;" class="group_desde"><span class="numberBlue">1</span>Direcci&oacute;n |</span><span style="width: 222px;" class="group_desde"><span class="numberBlue">2</span>Desde |</span><span style="width: 227px;" class="group_hasta"><span class="numberBlue">3</span>Hasta |</span><span style="width: 51px;" class="group_hasta"><span class="numberBlue">4</span>Filtros |</span></span>
                            <input class="input_f0" id="searchTextField" style="margin-right: 5px;margin-left: 10px;width: 355px;" type="text" size="50" placeholder="Ingrese Ciudad" autocomplete="off"/>
                            <input class="input_f1" style="width: 95px;margin-right: 5px;" readonly="readonly" type="text" id="day_from" value="<?php
                            if ($day_from && $day_from != '12-11-2013') {
                                echo $day_from;
                            } else {
                                echo "Fecha desde";
                            }
                            ?>"/>
                            <input class="input_f1" style="width: 95px;margin-right: 5px;" readonly="readonly" type="text" id="hour_from" value="<?php
                            if ($hour_from && $hour_from != '01:00') {
                                echo $hour_from;
                            } else {
                                echo "Hora";
                            }
                            ?>"/>
                            <input class="input_f1" style="width: 95px;margin-right: 5px;" readonly="readonly" type="text" id="day_to" value="<?php
                            if ($day_to) {
                                echo $day_to;
                            } else {
                                echo "Fecha hasta";
                            }
                            ?>"/>
                            <input class="input_f1b" style="width: 95px;" readonly="readonly" type="text" id="hour_to" value="<?php
                                   if ($hour_to && $hour_to != '01:00') {
                                       echo $hour_to;
                                   } else {
                                       echo "Hora";
                                   }
                            ?>" />
                            <button id="btn_buscar" title="Buscar autos"></button>
                        </div>


                    </div><!-- search_box_1_header -->     
                    <div class="search_box_1_header tab-data tab-lista" style="display:none">    
                        <div class="search_box1_form">
                            <div style="width: 175px; display: inline-block" >
                                <div class="group_desde" style="width: 150px;"><span class="numberBlue">1</span>Región |</span></div>
                                <select class="input_f0 trigger_lista" id="chooseRegion" style="margin-left: 5px;width: 167px;">
                                    <option value="">Elegir región</option>
                                        <?php foreach ($regiones as $region): ?>
                                        <option value="<?= $region->getCodigo() ?>"><?= $region->getNombre() ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            <div style="width: 180px; display: inline-block">
                                <div class="group_desde" style="width: 150px;"><span class="numberBlue">2</span>Comuna |</span></div>
                                <select class="input_f0 trigger_lista" id="chooseComuna" style="margin-left: 5px;width: 167px;">
                                    <option value="">Elegir comuna</option>
                                </select>
                            </div>

                            <div style="width: 227px; display: inline-block">
                                <span style="width: 220px;" class="group_desde"><span class="numberBlue">3</span>Desde |</span>
                                <input class="input_f1 " style="width: 95px;margin-right: 5px;" readonly="readonly" type="text" id="day_from_lista" value="<?php
                                if ($day_from && $day_from != '12-11-2013') {
                                    echo $day_from;
                                } else {
                                    echo "Fecha desde";
                                }
                                ?>"/>
                                <input class="input_f1 " style="width: 95px;margin-right: 5px;" readonly="readonly" type="text" id="hour_from_lista" value="<?php
                                if ($hour_from && $hour_from != '01:00') {
                                    echo $hour_from;
                                } else {
                                    echo "Hora";
                                }
                                ?>"/>
                            </div>
                            <div style="width: 227px; display: inline-block">
                                <span style="width: 220px;" class="group_hasta"><span class="numberBlue">4</span>Hasta |</span>
                                <input class="input_f1 " style="width: 95px;margin-right: 5px;" readonly="readonly" type="text" id="day_to_lista" value="<?php
                                if ($day_to) {
                                    echo $day_to;
                                } else {
                                    echo "Fecha hasta";
                                }
                                ?>"/>
                                <input class="input_f1b " style="width: 95px;" readonly="readonly" type="text" id="hour_to_lista"  value="<?php
                                if ($hour_to && $hour_to != '01:00') {
                                    echo $hour_to;
                                } else {
                                    echo "Hora";
                                }
                                ?>" />
                            </div>
                            <div style="width: 100px; display: inline-block">
                                <span style="width: 51px;" class="group_desde"><span class="numberBlue">5</span>Filtros |</span>
                                <button id="btn_buscar" class="btn_buscar_lista" title="Buscar autos"></button>
                            </div>
                        </div>
                    </div><!-- search_box_1_header -->     
                </div><!-- search_box_1 -->

            </div><!-- search_sector1 -->
        </div>

        <div class="main_box_2_anterior" style="margin-top:15px;border-radius: 0px 0x 0px 0px;">
            <div class="search_sector1 tab-data tab-mapa" >

                <div class="search_box_1new">
                    <button id="btn_filtro1" class="btn_filtro"></button>
                    <div id="opc_filtro">
                        <button id="btn_filtro2" class="btn_filtro"><img class="flechasfiltro2" src="<?php echo image_path('img_search/FlechasFiltro.png'); ?>"/><p class="textofiltro2">ELEGIR FILTROS</p></button>
                        <div class="title_opc_filtro">Transmisión</div>
                        <div class="opc_filtro"><input type="checkbox" name="transmision" value="0" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Manual</p></div>
                        <div class="opc_filtro"><input type="checkbox" name="transmision" value="1" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Automática</p></div>
                        <div class="title_opc_filtro">Tipo</div>
                        <div class="opc_filtro"><input type="checkbox" name="tipo" value="1" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Automóvil</p></div>
                        <div class="opc_filtro"><input type="checkbox" name="tipo" value="39" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">SUV</p></div>
                        <div class="opc_filtro"><input type="checkbox" name="tipo" value="3" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Wagon Station</p></div>
                        <div class="opc_filtro"><input type="checkbox" name="tipo" value="2" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Pick Up</p></div>
                        <div class="opc_filtro"><input type="checkbox" name="tipo" value="4" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Furgón</p></div>
                        <div class="title_opc_filtro">Precio</div>
                        <div class="opc_filtro"><input type="radio" name="price"  value="0" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">De -$ a +$</p></div>
                        <div class="opc_filtro"><input type="radio" name="price"  value="1" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">De +$ a -$</p></div>
                    </div> 
                    <div class="search_box_1_maparea">   
                        <div id="loading">
                        </div>
                        <div id="map"></div>
                    </div><!-- search_box_1_maparea -->   

                    <div class="fondo_search_box_2">
                        <div class="search_box_2">
                            <div id="title_search_box_2">RESULTADO ( 35 AUTOS RECOMENDADOS )</div>

                            <div id="loader" style="display:none;margin-left: 105px;margin-top: 30px;"><?php echo image_tag("ajax-loader.gif", array("width" => "80px", "height" => "80px")); ?></div>  
                            <div class="search_arecomend_window">  

                            </div><!-- search_arecomend_window -->   


                        </div><!-- search_box_2 -->
                        <button id="footer_search_box_2" title="Ver todos los autos" >VER TODOS</button>
                    </div>
                </div><!-- search_box_1new -->

                <div class="clear"></div>

            </div>

            <div class="search_sector1 tab-data tab-lista" style="display:none" >
                <button id="btn_filtro1" class="btn_filtro_lista"></button>
                    <div id="opc_filtro" class="opc_filtro_lista">
                        <button id="btn_filtro2" class="btn_filtro_lista"><img class="flechasfiltro2" src="<?php echo image_path('img_search/FlechasFiltro.png'); ?>"/><p class="textofiltro2">ELEGIR FILTROS</p></button>
                        <div class="title_opc_filtro">Transmisión</div>
                        <div class="opc_filtro"><input type="checkbox" class="trigger_lista" name="transmision_lista" value="0" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Manual</p></div>
                        <div class="opc_filtro"><input type="checkbox" class="trigger_lista" name="transmision_lista" value="1" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Automática</p></div>
                        <div class="title_opc_filtro">Tipo</div>
                        <div class="opc_filtro"><input type="checkbox" class="trigger_lista" name="tipo_lista" value="1" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Automóvil</p></div>
                        <div class="opc_filtro"><input type="checkbox" class="trigger_lista" name="tipo_lista" value="39" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">SUV</p></div>
                        <div class="opc_filtro"><input type="checkbox" class="trigger_lista" name="tipo_lista" value="3" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Wagon Station</p></div>
                        <div class="opc_filtro"><input type="checkbox" class="trigger_lista"  name="tipo_lista" value="2" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Pick Up</p></div>
                        <div class="opc_filtro"><input type="checkbox" class="trigger_lista" name="tipo_lista" value="4" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">Furgón</p></div>
                        <div class="title_opc_filtro">Precio</div>
                        <div class="opc_filtro"><input type="radio" class="trigger_lista" name="precio_lista"  value="0" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">De -$ a +$</p></div>
                        <div class="opc_filtro"><input type="radio" class="trigger_lista" name="precio_lista"  value="1" style="margin-right:6px;"><p style="margin-top: -11px;margin-left: 18px;">De +$ a -$</p></div>
                    </div>
                <div id="tab-lista-data"></div>
                <div id="tab-lista-data-spinner">
<?php echo image_tag("ajax-loader.gif", array()) ?>
                </div>
            </div>
        </div>
        <div id="centro">


            <div id="comoUsar">
                <div class="titulos"> C&oacutemo usar Arriendas? </div>
                <div id="instrucciones_1"><?php echo image_tag("comparaprecios/arrendatario.png", array("class" => "img_instrucciones_1")) ?></div>
                <div id="sliderComoUsar"><?php echo image_tag("comparaprecios/slider1.png", array("class" => "img_instrucciones_2")) ?></div>

            </div>

            <div id="centrocentro"></div>

            <div id="tabla"> 

                <div class="titulos"> Es m&aacutes econ&oacutemico Arriendas.cl? </div>

                <div id="contenedorTabla">
<?php echo image_tag("Home/Tabla_Precios2.jpg", array("width" => "476px", "height" => "250px")) ?>
                </div>     

            </div>     

            <div id="seguro"> 

                <div class="titulos">Preguntas frecuentes (arriendo de autos)</div>

                <!--<div id="seguroContenidos">-->

                <div id="seguroContenido">

                    <div id="preguntasContenedor">
                        <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/22326617--C%C3%B3mo-arriendo-un-auto-Qu%C3%A9-papeles-debo-presentar-" target="_blank"> <p>C&oacutemo arriendo un auto?</p></a></div>
                        <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/23062448--Qu%C3%A9-es-lo-que-cubre-el-seguro-" target="_blank"> <p>Qu&eacute cubre el seguro?</p> </a></div>
                        <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/23528442-Cu%C3%A1l-es-el-precio-final-del-arriendo-" target="_blank"> <p>Cu&aacutel es el precio final del arriendo?</p></a></div>
                        <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/22573231--Qui%C3%A9n-paga-por-la-bencina-y-TAG-" target="_blank"> <p>Qui&eacuten paga la bencina y el TAG?</p></a></div>
                        <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/23546076--Qu%C3%A9-tel%C3%A9fono-contactar-en-caso-de-accidente-o-urgencia-" target="_blank"> <p>Qu&eacute tel&eacutefono contactar en caso de urgencia o retraso?</p> </a></div> 
                    </div>
                    <!--
                    <div id="preguntasContenedor2">
                    <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/23566616-Resumen-de-los-t%C3%A9rminos-y-condiciones-para-due%C3%B1os-de-autos-" target="_blank"> <p>Qué debo hacer para poner mi auto en arriendo?</p></a></div>
                     <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/23572141-Ver-el-formulario-de-entrega-y-devoluci%C3%B3n-del-auto" target="_blank"> <p>Cómo gestiono las reservas?</p> </a></div>
                     <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/23585618--Cu%C3%A1ndo-se-me-paga-por-mis-arriendos-C%C3%B3mo-se-paga-el-seguro-y-las-comision-de-Arriendas-" target="_blank"> <p>Qué cubre el seguro?</p> </a></div>
                     <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/23757242--Cu%C3%A1les-son-mis-responsabilidades-como-contribuyente- " target="_blank"> <p>Cuál es mi responsabilidad como contribuyente?</p></a></div>
                     <div class="preguntas"><a href="https://arriendascl.zendesk.com/entries/23585618--Cu%C3%A1ndo-se-me-paga-por-mis-arriendos-C%C3%B3mo-se-paga-el-seguro-y-las-comision-de-Arriendas- " target="_blank"> <p>Cuándo se me pagan los arriendos?</p></a></div>
                    </div>
                    -->

                </div>
                <!--</div>-->
            </div>

            <!-- 
            <div id="contenedorPreguntasFrecuentes2">
            <div class="titulos"> Preguntas frecuentes (si quieres arrendar un auto) <div id="sliderComoUsar" float:right;> <img id="sliderComoUsarImg" src="/Users/germanrimoldi/Desktop/slider1.png"/> </div>
            </div>
            </div>
            -->



            <div class="titulos" style="margin-left: 10px;
                 margin-top: 5px;
                 padding: 10px 0;float: left;width: 940px;"> Ver video explicativo </div>
            <div id="video">

            </div>

            <br><br>
            <div id="medios" style="display:none;">
                <div id="emol"><a href="http://www.emol.com/noticias/economia/2012/07/27/552815/emprendedor-estrenara-primer-sistema-de-arriendo-de-vehiculos-por-hora-de-chile.html" target="_blank"><?php echo image_tag("comparaprecios/mercurio.png") ?></a></div>
                <div id="LUN"><a href="http://images.lun.com/lunservercontents/NewsPaperPages/2012/oct/23/LUCPR06LU2310_800.swf" target="_blank"><?php echo image_tag("comparaprecios/LUN.png") ?></a></div>
                <div id="publimetro"><a href="http://www.tacometro.cl/prontus_tacometro/site/artic/20121030/pags/20121030152946.html" target="_blank"><?php echo image_tag("comparaprecios/publimetro.png") ?></a></div>
                <div id="latercera"><a href="http://www.lasegunda.com/Noticias/CienciaTecnologia/2012/08/774751/arriendascl-sistema-de-alquiler-de-autos-por-horas-debuta-en-septiembre" target="_blank"><?php echo image_tag("comparaprecios/latercera.png") ?></a></div>
                <!-- href="http://www.lasegunda.com/noticias/economia/2012/07/767675/emprendedor-estrenara-primer-sistema-de-arriendo-de-vehiculos-por-hora-en-chile" -->
            </div>
        </div>

    </div>
</div>
<!--</div> search_container -->
