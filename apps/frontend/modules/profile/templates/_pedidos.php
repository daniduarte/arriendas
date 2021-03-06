<?php

$mostrarReservasRealizadas = false;
$mostrarReservasRecibidas = false;
$mostrarBarra = false;

if ($reservasRealizadas) {
    foreach ($reservasRealizadas as $reserva) {
        $mostrarReservasRealizadas = true;
    }
}

if ($reservasRecibidas) {
    foreach ($reservasRecibidas as $reserva) {
        $mostrarReservasRecibidas = true;
    }
}

if (!$mostrarReservasRealizadas && !$mostrarReservasRecibidas) {
    echo "<div class='barraSuperior'><p>PEDIDOS</p></div>";
} else if ($mostrarReservasRealizadas && !$mostrarReservasRecibidas) {
    echo "<div class='barraSuperior'><p>PEDIDOS REALIZADOS</p></div>";
} else if (!$mostrarReservasRealizadas && $mostrarReservasRecibidas) {
    echo "<div class='barraSuperior'><p>PEDIDOS RECIBIDOS</p></div>";
} else {
    echo "<div class='barraSuperior'><p>PEDIDOS</p></div>";
    $mostrarBarra = true;
}
?>

<?php if ($mostrarBarra) { ?>
    <div class="barraNavegadora">
        <div id="boton1" class='oscuro'>Pedidos Realizados</div>
        <div id="intermedio" class='intOscCla'></div>
        <div id="boton2" class='claro'>Pedidos Recibidos</div>
    </div>
<?php } ?>

<div style="display:none">

    <div id="nuevo_flujo_cambiar_dialog">
        <p>Al cambiar el auto, se anulará tu reserva original y se emitirán contratos y póliza por el nuevo arriendo de auto.</p>
    </div>

    <div id='confirmarEditarHora'>
        <p>¿Desea editar la fecha y hora de todos los pedidos realizados para la fecha <span id='textoFecha'>seleccionada</span>?</p>
    </div>

    <div id='mapa'>
        <p>mapa de ubicacion <span id='ubicacion'></span></p>
        <img src="" id='googleMaps'>
    </div>

    <div id='editarHora'>
        <div class='izq'>
            <p class='titulo'>Desde</p>
            <p><label>Fecha</label>
                <input id="datefrom" name="datefrom" type="text" class="datepicker" readonly="readonly" value=""/></p>
            <p><label>Hora</label>
                <input readonly="readonly" type="text" id="hour_from" name="hour_from" readonly="readonly" value=""/></p>
        </div>

        <div class='der'>
            <p class='titulo'>Hasta</p>
            <p><label>Fecha</label>
                <input id="dateto" name="dateto" type="text" class="datepicker" readonly="readonly" value="Día de entrega"/></p>
            <p><label>Hora</label>
                <input readonly="readonly" type="text" id="hour_to" name="hour_to" value="Hora de entrega"/></p>
        </div>

    </div>

    <?php include_partial('contratosArrendatario') ?>

    <div id='confirmarContratosPropietario'>
        <input type="checkbox" name="contratoPropietario1" id="contratoPropietario1" class='checkboxContrato'><p> El <a href='' class='informeDanios' target='_blank'>Informe de daños de mi veh&iacute;culo</a> se encuentra completo.</p>
        <input type="checkbox" name="contratoPropietario2" id="contratoPropietario2" class='checkboxContrato'><p> El arrendatario se hará responsable por daños producidos por debajo del deducible de 5UF.</p>
        <input type="checkbox" name="contratoPropietario3" id="contratoPropietario3" class='checkboxContrato'><p> <span id='textoBencinaPropietario'>Si el arriendo es por menos de un día, el arrendatario me pagará en efectivo la bencina utilizada según los kilómetros manejados. Si el arriendo es por un día o más, el arrendatario me devolverá el auto con el marcador de bencina en el mismo nivel con el que lo se lo entregué.</span></p>
    </div>

    <div id='extender'>
        <p>La extensión de la reserva queda condicional a la aprobación del propietario del vehículo, en ningún caso reemplaza la reserva original ni permite la devolución del dinero pagado.</p>
        <div class='izq'>
            <p class='titulo'>Desde</p>
            <p><label>Fecha</label>
                <input id="datefrom_extender" name="datefrom_extender" type="text" readonly="readonly" value=""/></p>
            <p><label>Hora</label>
                <input readonly="readonly" type="text" id="hour_from_extender" name="hour_from_extender" readonly="readonly" value=""/></p>
        </div>

        <div class='der'>
            <p class='titulo'>Hasta</p>
            <p><label>Fecha</label>
                <input id="dateto_extender" name="dateto_extender" type="text" class="datepicker" readonly="readonly" value="Día de entrega"/></p>
            <p><label>Hora</label>
                <input readonly="readonly" type="text" id="hour_to_extender" name="hour_to_extender" value="Hora de entrega"/></p>
        </div>
    </div>
</div>

<?php if ($mostrarBarra) { ?>
    <div id="conten_opcion1">
    <?php } ?>

    <?php
    
    $checkMostrar = 0;

    //ARRENDATARIO $reservasRealizadas

    // ESTADO 5 y 6
    $mostrar = false;

    if ($reservasRealizadas) {
        foreach ($reservasRealizadas as $reserva) {
            if (isset($reserva['estado']) && ($reserva['estado'] == 5 || $reserva['estado'] == 6)) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>RESERVAS PAGADAS</h3>";
        
        $cant = 0;
        foreach ($reservasPagadas as $reserva) {
            $cant++;

            echo "<div class='bloqueEstado' id='bloque_" . $reserva['idReserve'] . "'>";
            echo "<div class='fechaReserva'>";
            echo "<div class='izq'>";
            echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
            echo "</div>";
            echo "<div class='der'>";
            echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
            echo "</div>";
            echo "<span class='comuna' >".$reserva['comuna']."</span>";
            echo "</div>";
            echo "<div class='infoUsuario ocultarWeb'>";
            echo "<div class='izq'>";
            echo "<a href='" . url_for('cars/car?id=' . $reserva['carId']) . "' title='Ver Auto'>";
                            if ($reserva['photoType'] == 0)
                                echo image_tag("../uploads/cars/thumbs/" . $reserva['fotoCar'], 'class=img_usuario');
                            else
                                echo image_tag($reserva['fotoCar'], 'class=img_usuario');
            echo "      </a>";
            echo "    </div>";
            echo "    <div class='der'>";
            echo "      <span class='textoMediano'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "</span><br><a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
            echo "    </div>";
            echo "  </div>";

            echo "  <div class='direccion'>";
            echo "    <a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
            echo image_tag('img_pedidos/IconoUbicacion.png');
            echo " " . $reserva['direccion'] . ", " . $reserva['comuna'] . ".<br>" . image_tag('img_pedidos/Telefono.png', 'class=telefono') . " +56 " . $reserva['telefono'];
            echo "  </div>";

            echo "  <div class='extender'>";
            echo "    <div class='der'>";
            echo "      <div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
            echo "      <div class='img'>" . image_tag('img_pedidos/IconoAutoAprobado.png') . "</div>";
            echo "      <span class='textoColor'>¡APROBADO!</span>";
            echo "    </div>";
            echo "    <a href='#' id='contrato_" . $reserva['idReserve'] . "_" . $reserva['carId'] . "_" . $reserva['token'] . "' class='descargarContrato'>Descargar Contratos</a>";
            echo "  </div>";

            if ($reserva['estado'] == 6) {
                echo "<div class='eventoReserva' style='width:100px;'>";
                echo "  <div class='der'>";
                echo "    <div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "    <div class='img'>" . image_tag('img_pedidos/IconoEnEspera.png') . "</div>";
                echo "    <div class='texto'>En espera de confirmaci&oacute;n</div>";
                echo "  </div>";
                echo "</div>";    
            } else {
                if ($reserva['completed']) {
                    echo "<div class='pago'>";
                    echo "  <a href='#' id='extender_" . $reserva['idReserve'] . "' class='boton_extender " . $reserva['fechaInicio'] . "_" . $reserva['horaInicio'] . "_" . $reserva['fechaTermino'] . "_" . $reserva['horaTermino'] . "'>" . image_tag('img_pedidos/BotonExtender2.png', array("style" => "margin-top: 12px")) . "</a>";
                    echo "  <div style='text-align: center; margin-top: 3px;'>";
                    echo "    <a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' style='margin: auto' >Contactar</a>";
                    echo "  </div>";
                    echo "</div>";
                } else {
                    echo "<div class='pago'>";
                    echo "  <button class='nuevo_flujo_cambiar arriendas_pink_btn arriendas_big_btn' data-reserveid='". $reserva['idReserve'] ."' style='position: initial' type='button'>Cambiar</button>";
                    echo "  <div style='text-align: center; margin-top: 3px;'><a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' style='margin: auto' >Contactar</a></div>";
                    echo "</div>";
                }
            }

            echo "</div>";

            foreach ($reserva['subReservas'] as $subReserva) {

                echo "<div class='bloqueEstado' id='bloque_" . $subReserva['idReserve'] . "'>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $subReserva['fechaInicio'] . "<br>" . $subReserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $subReserva['horaInicio'] . "<br>" . $subReserva['horaTermino'];
                echo "</div>";
                echo "<span class='comuna' >".$subReserva['comuna']."</span>";
                echo "</div>";
                echo "<div class='infoUsuario ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('cars/car?id=' . $subReserva['carId']) . "' title='Ver Auto'>";
                                if ($subReserva['photoType'] == 0)
                                    echo image_tag("../uploads/cars/thumbs/" . $subReserva['fotoCar'], 'class=img_usuario');
                                else
                                    echo image_tag($subReserva['fotoCar'], 'class=img_usuario');
                echo "      </a>";
                echo "    </div>";
                echo "    <div class='der'>";
                echo "      <span class='textoMediano'>" . $subReserva['marca'] . ", " . $subReserva['modelo'] . "</span><br><a href='" . url_for('profile/publicprofile?id=' . $subReserva['contraparteId']) . "'>" . $subReserva['nombre'] . " " . $subReserva['apellidoCorto'] . "</a>";
                echo "    </div>";
                echo "  </div>";

                echo "  <div class='direccion'>";
                echo "    <a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $subReserva['contraparteId']) . "'><span class='textoMediano'>" . $subReserva['nombre'] . " " . $subReserva['apellidoCorto'] . "</span></a>";
                echo image_tag('img_pedidos/IconoUbicacion.png');
                echo " " . $subReserva['direccion'] . ", " . $subReserva['comuna'] . ".<br>" . image_tag('img_pedidos/Telefono.png', 'class=telefono') . " +56 " . $subReserva['telefono'];
                echo "  </div>";

                echo "  <div class='extender'>";
                echo "    <div class='der'>";
                echo "      <div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "      <div class='img'>" . image_tag('img_pedidos/IconoAutoAprobado.png') . "</div>";
                echo "      <span class='textoColor'>¡APROBADO!</span>";
                echo "    </div>";
                echo "    <a href='#' id='contrato_" . $subReserva['idReserve'] . "_" . $subReserva['carId'] . "_" . $subReserva['token'] . "' class='descargarContrato'>Descargar Contratos</a>";
                echo "  </div>";

                if ($subReserva['estado'] == 6) {
                    echo "<div class='eventoReserva' style='width:100px;'>";
                    echo "  <div class='der'>";
                    echo "    <div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                    echo "    <div class='img'>" . image_tag('img_pedidos/IconoEnEspera.png') . "</div>";
                    echo "    <div class='texto'>En espera de confirmaci&oacute;n</div>";
                    echo "  </div>";
                    echo "</div>";    
                } else {
                    if ($subReserva['completed']) {
                        echo "<div class='pago'>";
                        echo "  <a href='#' id='extender_" . $subReserva['idReserve'] . "' class='boton_extender " . $subReserva['fechaInicio'] . "_" . $subReserva['horaInicio'] . "_" . $subReserva['fechaTermino'] . "_" . $subReserva['horaTermino'] . "'>" . image_tag('img_pedidos/BotonExtender2.png', array("style" => "margin-top: 12px")) . "</a>";
                        echo "  <div style='text-align: center; margin-top: 3px;'>";
                        echo "    <a href=".url_for('messages/new?id='.$subReserva['contraparteId'])." class='link-contactar' style='margin: auto' >Contactar</a>";
                        echo "  </div>";
                        echo "</div>";
                    } else {
                        echo "<div class='pago'>";
                        echo "  <button class='nuevo_flujo_cambiar arriendas_pink_btn arriendas_big_btn' data-reserveid='". $subReserva['idReserve'] ."' style='position: initial' type='button'>Cambiar</button>";
                        echo "  <div style='text-align: center; margin-top: 3px;'><a href=".url_for('messages/new?id='.$subReserva['contraparteId'])." class='link-contactar' style='margin: auto' >Contactar</a></div>";
                        echo "</div>";
                    }
                }

                echo "</div>";
            }

            if ($cant != count($reservasPagadas)) {
                echo '<div style="width:100%;padding-top:60px;float:left;"></div>';
            }
        }
    }

    // ESTADO 7
    $mostrar = false;

    if ($reservasRealizadas) {
        foreach ($reservasRealizadas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 7) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>RESERVAS EN PROCESO</h3>";
        
        foreach ($reservasRealizadas as $reserva) {

            if (isset($reserva['estado']) && $reserva['estado'] == 7) {
                echo"<div class='bloqueEstado idCar_" . $reserva['carId'] . "' id='bloque_" . $reserva['idReserve'] . "'>";
                echo "<div class='checkboxOpcion'>";
                echo "<input type='checkbox' class='checkbox checkboxResultadosRealizados' id='checkbox_" . $reserva['idReserve'] . "'>";
                echo "</div>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                echo "</div>";
                echo "<span class='comuna' >".$reserva['comuna']."</span>";
                echo "</div>";
                echo "<div class='infoUsuario ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('cars/car?id=' . $reserva['carId']) . "' title='Ver Auto'>";
                if ($reserva['photoType'] == 0)
                    echo image_tag("../uploads/cars/thumbs/" . $reserva['fotoCar'], 'class=img_usuario');
                else
                    echo image_tag($reserva['fotoCar'], 'class=img_usuario');
                echo "</a>";
                echo "</div>";
                echo "<div class='der'>";
                echo "<span class='textoMediano'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "</span><br><a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='precio'>";
                echo "<span class='textoMediano nombreMovil'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "<br></span><a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
                echo "<span class='textoGrande2'>$" . $reserva['valor'] . "</span> CLP<br>(" . $reserva['tiempoArriendo'] . " - asegurado)";
                echo "</div>";
                echo"<div class='eventoReserva'>";
                echo "<div class='der'>";
                echo "<div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "<div class='img'>" . image_tag('img_pedidos/IconoPreAprobado.png') . "</div>";
                echo "Pre aprobado<br>(Falta pago)";
                echo "</div>";
                echo"</div>";
                echo"<div class='pagoBoton' data-carid=". $reserva['carId'] .">";
                echo "<a href='#'>" . image_tag('img_pedidos/BotonPagar.png', 'class=botonPagar duracion_' . $reserva['duracion'] . ' id=pagar_' . $reserva['idReserve']) . "</a>";
                echo "</div>";
                echo "<div><a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' >Contactar</a></div>";
                echo"</div>";
            }
        }
    }

    // ESTADO 3
    $mostrar = false;

    if ($reservasRealizadas) {
        foreach ($reservasRealizadas as $reserva) {
            //echo $reserva['estado']."<br>";
            if (isset($reserva['estado']) && $reserva['estado'] == 3) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>APROBADOS (PAGADO) " . image_tag('img_pedidos/Check_PedidosDeReserva.png', 'class=imgCorrecto') . "</h3>";
        echo "<p class='textoAyuda'>Debes buscar el auto en la dirección indicada. Cualquier duda contactar al dueño</p>";

        foreach ($reservasRealizadas as $reserva) {
            //for ($i=0; $i < count($reservasRealizadas); $i++) {                

            if (isset($reserva['estado']) && $reserva['estado'] == 3) {
                echo "<div class='bloqueEstado' id='bloque_" . $reserva['idReserve'] . "'>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                echo "</div>";
                echo "<span class='comuna' >".$reserva['comuna']."</span>";
                echo "</div>";
                echo "<div class='infoUsuario ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('cars/car?id=' . $reserva['carId']) . "' title='Ver Auto'>";
                if ($reserva['photoType'] == 0)
                    echo image_tag("../uploads/cars/thumbs/" . $reserva['fotoCar'], 'class=img_usuario');
                else
                    echo image_tag($reserva['fotoCar'], 'class=img_usuario');
                echo "</a>";
                echo "</div>";
                echo "<div class='der'>";
                echo "<span class='textoMediano'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "</span><br><a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='direccion'>";
                echo "<a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo image_tag('img_pedidos/IconoUbicacion.png');
                echo " " . $reserva['direccion'] . ", " . $reserva['comuna'] . "<!-- <a href='#' class='mapa' id='" . $reserva['lat'] . "_" . $reserva['lng'] . "'>(Ver mapa)</a>-->.<br>" . image_tag('img_pedidos/Telefono.png', 'class=telefono') . " +56 " . $reserva['telefono'];
                echo "</div>";
                echo "<div class='extender'>";
                echo "  <div class='der'><div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "  <div class='img'>" . image_tag('img_pedidos/IconoAutoAprobado.png') . "</div>";
                echo "  <span class='textoColor'>¡APROBADO!</span>";
                echo "</div>";
                echo "<a href='#' id='contrato_" . $reserva['idReserve'] . "_" . $reserva['carId'] . "_" . $reserva['token'] . "' class='descargarContrato'>Descargar Contratos</a>";
                echo "</div>";
                echo "<div class='pago'>";
                echo "  <a href='#' id='extender_" . $reserva['idReserve'] . "' class='boton_extender " . $reserva['fechaInicio'] . "_" . $reserva['horaInicio'] . "_" . $reserva['fechaTermino'] . "_" . $reserva['horaTermino'] . "'>" . image_tag('img_pedidos/BotonExtender2.png', array("style" => "margin-top: 12px")) . "</a>";
                echo "  <div style='text-align: center; margin-top: 3px;'><a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' style='margin: auto' >Contactar</a></div>";
                echo "</div>";
                echo "</div>";
            }
        }

        echo"<div class='bloqueEstado'>";
        echo"<div class='herramientas'>";
        echo "</div>";
        echo"</div>";
        echo "<div class='mensajeContacto'><p>Si necesita modificar su reserva pagada, escr&iacutebanos a <i>soporte@arriendas.cl</i></p></div>";
    }

    // ESTADO 2
    $mostrar = false;

    if ($reservasRealizadas) {
        foreach ($reservasRealizadas as $reserva) {
            //if(isset($reserva['estado']) && ($reserva['estado']==1 || $reserva['estado']==2)){
            if (isset($reserva['estado']) && $reserva['estado'] == 2) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>PRE APROBADOS (PENDIENTE DE PAGO)";
        echo "<a href='#'>" . image_tag('img_pedidos/BotonCancelar.png', 'id=eliminarResultadosRealizados class=botonHerramientas') . "</a>";
        echo "</h3>";
        echo "<p class='textoAyuda'>Hasta no realizar el pago no se confirmará la reserva, ni recibirás la cobertura de seguros durante el arriendo.</p>";

        foreach ($reservasRealizadas as $reserva) {
            if (isset($reserva['idReserve']) && $reserva['estado'] == 2) {

                echo"<div class='bloqueEstado idCar_" . $reserva['carId'] . "' id='bloque_" . $reserva['idReserve'] . "'>";
                echo "<div class='checkboxOpcion'>";
                echo "<input type='checkbox' class='checkbox checkboxResultadosRealizados' id='checkbox_" . $reserva['idReserve'] . "'>";
                echo "</div>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                echo "</div>";
                echo "<span class='comuna' >".$reserva['comuna']."</span>";
                echo "</div>";
                echo "<div class='infoUsuario ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('cars/car?id=' . $reserva['carId']) . "' title='Ver Auto'>";
                if ($reserva['photoType'] == 0)
                    echo image_tag("../uploads/cars/thumbs/" . $reserva['fotoCar'], 'class=img_usuario');
                else
                    echo image_tag($reserva['fotoCar'], 'class=img_usuario');
                echo "</a>";
                echo "</div>";
                echo "<div class='der'>";
                echo "<span class='textoMediano'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "</span><br><a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='precio'>";
                echo "<span class='textoMediano nombreMovil'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "<br></span><a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
                echo "<span class='textoGrande2'>$" . $reserva['valor'] . "</span> CLP<br>(" . $reserva['tiempoArriendo'] . " - asegurado)";
                echo "</div>";
                echo"<div class='eventoReserva'>";
                echo "<div class='der'>";
                echo "<div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "<div class='img'>" . image_tag('img_pedidos/IconoPreAprobado.png') . "</div>";
                echo "Pre aprobado<br>(Falta pago)";
                echo "</div>";
                echo"</div>";
                echo"<div class='pagoBoton' data-carid=". $reserva['carId'] .">";
                echo "<a href='#'>" . image_tag('img_pedidos/BotonPagar.png', 'class=botonPagar duracion_' . $reserva['duracion'] . ' id=pagar_' . $reserva['idReserve']) . "</a>";
                echo "</div>";
                echo "<div><a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' >Contactar</a></div>";
                echo"</div>";
            }
        }

        echo"<div class='bloqueEstado'>";
        echo"<div class='herramientas'>";
        echo "</div>";
        echo"</div>";
    }

    /* oportunidades */
    $mostrarOportunidades = false;
    $cantOportunidadesVisibles = 0;
    if (count($reservasRecibidasOportunidades) > 0) {
        $mostrarOportunidades = true;
        /* compruebo que hayan oportunidades visibles */
        foreach ($reservasRecibidasOportunidades as $oportunidad) {
            if ($oportunidad['estado'] == 2) {
                $cantOportunidadesVisibles++;
            }
        }
    }

    if ($mostrarOportunidades && $cantOportunidadesVisibles > 0) {
        echo "<h3>OFERTAS DE OTROS DUEÑOS";
        echo "<a href='#'>" . image_tag('img_pedidos/BotonCancelar.png', 'id=eliminarResultadosRealizados class=botonHerramientas') . "</a>";
        echo "</h3>";
        echo "<p class='textoAyuda'>Hasta no realizar el pago no se confirmará la reserva, ni recibirás la cobertura de seguros durante el arriendo.</p>";

        foreach ($reservasRecibidasOportunidades as $reserva) {
            if (isset($reserva['idReserve']) && $reserva['estado'] == 2) {

                echo"<div class='bloqueEstado idCar_" . $reserva['carId'] . "' id='bloque_" . $reserva['idReserve'] . "'>";
                echo "<div class='checkboxOpcion'>";
                echo "<input type='checkbox' class='checkbox checkboxResultadosRealizados' id='checkbox_" . $reserva['idReserve'] . "'>";
                echo "</div>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                echo "</div>";
                echo "<span class='comuna' >".$reserva['comuna']."</span>";
                echo "</div>";
                echo "<div class='infoUsuario ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('cars/car?id=' . $reserva['carId']) . "' title='Ver Auto'>";
                if ($reserva['photoType'] == 0)
                    echo image_tag("../uploads/cars/thumbs/" . $reserva['fotoCar'], 'class=img_usuario');
                else
                    echo image_tag($reserva['fotoCar'], 'class=img_usuario');
                echo "</a>";
                echo "</div>";
                echo "<div class='der'>";
                echo "<span class='textoMediano'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "</span><br><a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='precio'>";
                echo "<span class='textoMediano nombreMovil'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "<br></span><a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
                echo "<span class='textoGrande2'>$" . $reserva['valor'] . "</span> CLP<br>(" . $reserva['tiempoArriendo'] . " - asegurado)";
                echo "</div>";
                echo"<div class='eventoReserva'>";
                echo "<div class='der'>";
                echo "<div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "<div class='img'>" . image_tag('img_pedidos/IconoPreAprobado.png') . "</div>";
                echo "Pre aprobado<br>(Falta pago)";
                echo "</div>";
                echo"</div>";
                echo"<div class='pagoBoton' data-carid=". $reserva['carId'] .">";
                echo "<a href='#'>" . image_tag('img_pedidos/BotonPagar.png', 'class=botonPagar duracion_' . $reserva['duracion'] . ' id=pagar_' . $reserva['idReserve']) . "</a>";
                echo "</div>";
                echo "<div><a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' >Contactar</a></div>";
                echo"</div>";
            }
        }

        echo"<div class='bloqueEstado'>";
        echo"<div class='herramientas'>";
        echo "</div>";
        echo"</div>";
    }

    // ESTADO 0
    $mostrar = false;

    if ($reservasRealizadas) {
        foreach ($reservasRealizadas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 0) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>EN ESPERA";
        echo "<a href='#'>" . image_tag('img_pedidos/BotonCancelar.png', 'id=eliminarEnEsperaRealizados class=botonHerramientas') . "</a>";
        echo "<a href='#'>" . image_tag('img_pedidos/BotonEditarClaro.png', 'id=editarEnEsperaRealizados class=botonHerramientas') . "</a>";
        echo "</h3>";

        echo "<p class='textoAyuda'>Realiza multiples reservas a otros autos hasta obtener la primera confirmación.</p>";
        ?>
        <div class='lineaSeparacion'></div>
        <div class="pedidosEnEspera">

            <?php
            $i = 0;

            echo "<script  type='text/javascript'>var fechasEnEsperaRealizados = new Array();</script>";
            foreach ($fechaReservasRealizadas as $fechaReserva) {
                if (isset($fechaReserva['fechaInicio'])) {
                    ?>
                    <div class="cabecera">
                        <div class="checkboxOpcion">
                            <input id="cabecera_<?php echo $i; ?>" class="checkbox checkboxCabecera checkboxEnEsperaRealizados" type="checkbox">
                        </div>
                        <div class="fechaReserva">
                            <p><?php echo "<span class='textoChico'>Desde</span> " . $fechaReserva['fechaInicio'] . " " . $fechaReserva['horaInicio'] . " - <span class='textoChico'>Hasta</span> " . $fechaReserva['fechaTermino'] . " " . $fechaReserva['horaTermino']; ?></p>
                            <p class='textoAuto'><?php
                                echo $fechaReserva['cantCar'];
                                if ($fechaReserva['cantCar'] == 1) {
                                    echo " auto";
                                } else {
                                    echo " autos";
                                }
                                ?></p>
                        </div>
                    </div>
                    <div class="block">
                        <!-- contenido del acordeón -->
                        <?php
                        foreach ($reservasRealizadas as $reserva) {
                            if ($reserva['estado'] == 0 && isset($fechaReserva['fechaInicio']) && isset($reserva['fechaInicio']) && $fechaReserva['fechaInicio'] == $reserva['fechaInicio'] && $fechaReserva['horaInicio'] == $reserva['horaInicio'] && $fechaReserva['fechaTermino'] == $reserva['fechaTermino'] && $fechaReserva['horaTermino'] == $reserva['horaTermino']) {

                                echo"<div class='bloqueEstado' id='bloque_" . $reserva['idReserve'] . "'>";
                                echo "<div class='checkboxOpcion'>";
                                echo "<input type='checkbox' class='checkbox cuerpo_" . $i . " checkboxEnEsperaRealizados checkboxCuerpo' id='checkbox_" . $reserva['idReserve'] . "'>";
                                echo "</div>";
                                echo "<div class='fechaReserva'>";
                                echo "<div class='izq'>";
                                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                                echo "</div>";
                                echo "<div class='der'>";
                                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                                echo "</div>";
                                echo "<span class='comuna' >".$reserva['comuna']."</span>";
                                echo "</div>";
                                echo "<div class='infoUsuario ocultarWeb'>";
                                echo "<div class='izq'>";
                                echo "<a href='" . url_for('cars/car?id=' . $reserva['carId']) . "' title='Ver Auto'>";
                                if ($reserva['photoType'] == 0)
                                    echo image_tag("../uploads/cars/thumbs/" . $reserva['fotoCar'], 'class=img_usuario');
                                else
                                    echo image_tag($reserva['fotoCar'], 'class=img_usuario');
                                echo "</a>";
                                echo "</div>";
                                echo "<div class='der'>";
                                echo "<span class='textoMediano'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "</span><br><a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='precio'>";
                                echo "<span class='textoMediano nombreMovil'>" . $reserva['marca'] . ", " . $reserva['modelo'] . "<br></span><a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</a>";
                                echo "<span class='textoGrande2'>$" . $reserva['valor'] . "</span> CLP<br>(" . $reserva['tiempoArriendo'] . " - asegurado)";
                                echo "</div>";
                                echo"<div class='eventoReserva'>";
                                echo "<div class='der'>";
                                echo "<div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                                echo "<div class='img'>" . image_tag('img_pedidos/IconoEnEspera.png') . "</div>";
                                echo "<div class='texto'>En espera de confirmaci&oacute;n</div>";
                                echo "</div>";
                                echo "<div><a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' >Contactar</a></div>";
                                echo"</div>";
                                echo"</div>";
                            }
                        }
                        echo "<div class='masArriendos'>" . image_tag('MasAgregar.png', 'class=img_masArriendos') . " Agrega m&aacute;s reservas</div>";
                        ?>
                        <!-- fin contenido del acordeón -->
                    </div>

            <?php
            echo "<script  type='text/javascript'>fechasEnEsperaRealizados[" . $i . "] = '" . $fechaReserva['fechaInicio'] . " " . $fechaReserva['horaInicio'] . " a " . $fechaReserva['fechaTermino'] . " " . $fechaReserva['horaTermino'] . "';</script>";
            $i++;
        }
    }
?>
        </div>

            <?php
            /*
              echo"<div class='bloqueEstadoCabecera'>";
              echo"<div class='herramientas'>";
              echo "</div>";
              echo"</div>";
             */
        } else {
            //echo "<h3>EN ESPERA</h3>";
            //echo "<p class='alerta' style='margin-bottom: 30px;'>No registra pedidos en espera de confirmaci&oacute;n";
        }

        $mostrar = false;

        if ($reservasRealizadas) {
            foreach ($reservasRealizadas as $reserva) {
                if (isset($reserva['estado']) && $reserva['estado'] == 1) {
                    $mostrar = true;
                    $checkMostrar++;
                }
            }
        }

        if ($mostrar) {

            echo "<h3>ANULADOS</h3>";

            foreach ($reservasRealizadas as $reserva) {
                if (isset($reserva['estado']) && $reserva['estado'] == 1) {

                    echo"<div class='bloqueEstado idCar_" . $reserva['carId'] . "' id='bloque_" . $reserva['idReserve'] . "'>";
                    echo "<div class='checkboxOpcion'>";
                    echo "</div>";
                    echo "<div class='fechaReserva'>";
                    echo "<div class='izq'>";
                    echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                    echo "</div>";
                    echo "<div class='der'>";
                    echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                    echo "</div>";
                    echo "<span class='comuna' >".$reserva['comuna']."</span>";
                    echo "</div>";
                    echo "<div class='infoUsuario ocultarWeb'>";
                    echo "<div class='izq'>";
                    echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "' title='Ver perfil'>";
                    if ($reserva['facebook'] != null && $reserva['facebook'] != "") {
                        echo "<img src='" . $reserva['urlFoto'] . "' class='img_usuario'/>";
                    } else {
                        if ($reserva['urlFoto'] != "") {
                            $filename = explode("/", $reserva['urlFoto']);
                            echo image_tag("users/" . $filename[Count($filename) - 1], 'class=img_usuario');
                        } else {
                            echo image_tag('img_registro/tmp_user_foto.jpg', 'class=img_usuario');
                        }
                    }
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='der'>";
                    echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='precio'>";
                    echo "<a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano nombreMovil'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                    echo "<span class='textoGrande2'>$" . $reserva['valor'] . "</span> CLP<br>(" . $reserva['tiempoArriendo'] . " - asegurado)";
                    echo "</div>";
                    echo"<div class='eventoReserva'>";
                    echo "<div class='der'>";
                    echo "<div class='img'>" . image_tag('img_pedidos/IconoRechazado.png') . "</div>";
                    echo "<div class='texto'>Anulado</div>";
                    echo "</div>";
                    echo"</div>";
                    echo"<div class='pagoCheckbox'>";
                    echo "</div>";
                    echo "<div><a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' >Contactar</a></div>";
                    echo"</div>";
                }
            }
        }

        if ($checkMostrar == 0) {
//					echo "<p class='alerta' style='margin-bottom: 30px;'>No existen pedidos de reserva.";
        };
        ?>

    <?php if ($mostrarBarra) { ?>
    </div>

    <div id="conten_opcion2">
    <?php } ?>

    <?php


    //PROPIETARIO
    //muestra la barra de pedidos recibidos solo si tiene algún pedido que mostrar


    // ESTADO 4
    $mostrar = false;

    if ($reservasRecibidas) {
        foreach ($reservasRecibidas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 4) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>RESERVAS PAGADAS " . image_tag('img_pedidos/Check_PedidosDeReserva.png', 'class=imgCorrecto') . "</h3>";
        /*echo "<p class='textoAyuda'>La reserva ha sido confirmada.</p>";*/

        foreach ($reservasRecibidas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 4) {
                echo "<div class='bloqueEstado' id='bloque_" . $reserva['idReserve'] . "'>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                echo "</div>";
                echo "</div>";
                echo "<div class='infoUsuarioPagados ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "' title='Ver perfil'>";
                if ($reserva['facebook'] != null && $reserva['facebook'] != "") {
                    echo "<img src='" . $reserva['urlFoto'] . "' class='img_usuario'/>";
                } else {
                    if ($reserva['urlFoto'] != "") {
                        $filename = explode("/", $reserva['urlFoto']);
                        echo image_tag("users/" . $filename[Count($filename) - 1], 'class=img_usuario');
                    } else {
                        echo image_tag('img_registro/tmp_user_foto.jpg', 'class=img_usuario');
                    }
                }
                echo "</a>";
                echo "</div>";
                echo "<div class='der'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='direccion'>";
                echo "<a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo image_tag('img_pedidos/IconoUbicacion.png');
                echo " " . $reserva['direccion'] . ", " . $reserva['comuna'] . "<!-- <a href='#' class='mapa' id='" . $reserva['direccion'] . "," . $reserva['comuna'] . "'>(Ver mapa)</a>-->.<br>" . image_tag('img_pedidos/Telefono.png', 'class=telefono') . " +56 " . $reserva['telefono'];
                echo "</div>";
                echo "<div class='extender'>";
                echo "<div class='der'><div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "<div class='img'>" . image_tag('img_pedidos/IconoAutoAprobado.png') . "</div>";
                echo "<span class='textoColor'>¡PAGADO!</span>";
                echo "</div>";
                echo "<a href='#' id='contrato_" . $reserva['idReserve'] . "_" . $reserva['carId'] . "_" . $reserva['token'] . "' class='descargarContrato'>Descargar Contratos</a>";
                echo "</div>";
                echo "<div class='precioPagados'>";
                if ($reserva['confirmed']) {
                    echo "  <a href='#' id='extender_" . $reserva['idReserve'] . "' class='boton_extender " . $reserva['fechaInicio'] . "_" . $reserva['horaInicio'] . "_" . $reserva['fechaTermino'] . "_" . $reserva['horaTermino'] . "'>" . image_tag('img_pedidos/BotonExtender2.png', array()) . "</a>";
                } else {
                    echo "<select class='select enEspera duracion_" . $reserva['duracion'] . "' id='select_" . $reserva['idReserve'] . "'><option name='none' selected>Acci&oacute;n</option><option name='preaprobar'>Confirmar</option><option name='rechazar'>Rechazar</option></select>";
                }
                echo "  <div style='text-align: center; margin-top: 3px;'><a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' style='margin: auto' >Contactar</a></div>";
                echo "</div>";
                echo "</div>";
            }
        }

        echo"<div class='bloqueEstado'>";
        echo"<div class='herramientas'>";
        echo "</div>";
        echo"</div>";
    }
    
    // ESTADO 3
    $mostrar = false;

    if ($reservasRecibidas) {
        foreach ($reservasRecibidas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 3) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>APROBADOS (PAGADO) " . image_tag('img_pedidos/Check_PedidosDeReserva.png', 'class=imgCorrecto') . "</h3>";
        echo "<p class='textoAyuda'>La reserva ha sido confirmada.</p>";

        foreach ($reservasRecibidas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 3) {
                echo "<div class='bloqueEstado' id='bloque_" . $reserva['idReserve'] . "'>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                echo "</div>";
                echo "</div>";
                echo "<div class='infoUsuarioPagados ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "' title='Ver perfil'>";
                if ($reserva['facebook'] != null && $reserva['facebook'] != "") {
                    echo "<img src='" . $reserva['urlFoto'] . "' class='img_usuario'/>";
                } else {
                    if ($reserva['urlFoto'] != "") {
                        $filename = explode("/", $reserva['urlFoto']);
                        echo image_tag("users/" . $filename[Count($filename) - 1], 'class=img_usuario');
                    } else {
                        echo image_tag('img_registro/tmp_user_foto.jpg', 'class=img_usuario');
                    }
                }
                echo "</a>";
                echo "</div>";
                echo "<div class='der'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='direccion'>";
                echo "<a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo image_tag('img_pedidos/IconoUbicacion.png');
                echo " " . $reserva['direccion'] . ", " . $reserva['comuna'] . "<!-- <a href='#' class='mapa' id='" . $reserva['direccion'] . "," . $reserva['comuna'] . "'>(Ver mapa)</a>-->.<br>" . image_tag('img_pedidos/Telefono.png', 'class=telefono') . " +56 " . $reserva['telefono'];
                echo "</div>";
                echo "<div class='extender'>";
                echo "<div class='der'><div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "<div class='img'>" . image_tag('img_pedidos/IconoAutoAprobado.png') . "</div>";
                echo "<span class='textoColor'>¡APROBADO!</span>";
                echo "</div>";
                echo "<a href='#' id='contrato_" . $reserva['idReserve'] . "_" . $reserva['carId'] . "_" . $reserva['token'] . "' class='descargarContrato'>Descargar Contratos</a>";
                echo "</div>";
                echo "<div class='precioPagados'>";
                echo "  <a href='#' id='extender_" . $reserva['idReserve'] . "' class='boton_extender " . $reserva['fechaInicio'] . "_" . $reserva['horaInicio'] . "_" . $reserva['fechaTermino'] . "_" . $reserva['horaTermino'] . "'>" . image_tag('img_pedidos/BotonExtender2.png', array()) . "</a>";
                echo "  <div style='text-align: center; margin-top: 3px;'><a href=".url_for('messages/new?id='.$reserva['contraparteId'])." class='link-contactar' style='margin: auto' >Contactar</a></div>";
                echo "</div>";
                echo "</div>";
            }
        }

        echo"<div class='bloqueEstado'>";
        echo"<div class='herramientas'>";
        echo "</div>";
        echo"</div>";
    }

    // ESTADO 2
    $mostrar = false;

    if ($reservasRecibidas) {
        foreach ($reservasRecibidas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 2) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>PRE APROBADOS (PENDIENTE DE PAGO)";
        echo "<a href='#'>" . image_tag('img_pedidos/BotonCancelar.png', 'id=eliminarPreaprobadosRecibidos class=botonHerramientas') . "</a>";
        echo "</h3>";
        echo "<p class='textoAyuda'>Has aprobado la reserva, no dar inicio al arriendo hasta que el usuario pague a través de Arrienda.</p>";

        foreach ($reservasRecibidas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 2) {

                echo"<div class='bloqueEstado idCar_" . $reserva['carId'] . "' id='bloque_" . $reserva['idReserve'] . "'>";
                echo "<div class='checkboxOpcion'>";
                echo "<input type='checkbox' class='checkbox checkboxEnEsperaRecibidos' id='checkbox_" . $reserva['idReserve'] . "'>";
                echo "</div>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                echo "</div>";
                echo "</div>";
                echo "<div class='infoUsuario ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "' title='Ver perfil'>";
                if ($reserva['facebook'] != null && $reserva['facebook'] != "") {
                    echo "<img src='" . $reserva['urlFoto'] . "' class='img_usuario'/>";
                } else {
                    if ($reserva['urlFoto'] != "") {
                        $filename = explode("/", $reserva['urlFoto']);
                        echo image_tag("users/" . $filename[Count($filename) - 1], 'class=img_usuario');
                    } else {
                        echo image_tag('img_registro/tmp_user_foto.jpg', 'class=img_usuario');
                    }
                }
                echo "</a>";
                echo "</div>";
                echo "<div class='der'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='precio'>";
                echo "<a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano nombreMovil'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo "<span class='textoGrande2'>$" . $reserva['valor'] . "</span> CLP<br>(" . $reserva['tiempoArriendo'] . " - asegurado)";
                echo "</div>";
                echo"<div class='eventoReserva'>";
                echo "<div class='der'>";
                echo "<div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "<div class='img'>" . image_tag('img_pedidos/IconoPreAprobado.png') . "</div>";
                echo "<div class='texto'>Pre aprobado<br>(Falta pago)</div>";
                echo "</div>";
                echo"</div>";
                echo"<div class='pagoCheckbox'>";
                echo "<select class='select duracion_" . $reserva['duracion'] . "' id='select_" . $reserva['idReserve'] . "'><option name='preaprobar' selected>Pre aprobar</option><option name='rechazar'>Rechazar</option></select>";
                echo "</div>";
                echo"</div>";
            }
        }

        echo"<div class='bloqueEstado'>";
        echo"<div class='herramientas'>";
        echo "</div>";
        echo"</div>";
    }

    // ---------------------- BLOQUE  EN ESPERA ----------------------

    // ESTADO 0
    $mostrar = false;

    if ($reservasRecibidas) {
        foreach ($reservasRecibidas as $reserva) {
            //if(isset($reserva['estado']) && ($reserva['estado']==0 || $reserva['estado']==1)){
            if (isset($reserva['estado']) && ($reserva['estado'] == 0)) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>EN ESPERA";
        echo "<a href='#'>" . image_tag('img_pedidos/BotonCancelar.png', 'id=eliminarEnEsperaRecibidos class=botonHerramientas') . "</a>";
        echo "</h3>";
        echo "<p class='textoAyuda'>Has recibido un pedido de reserva. Perderás el arriendo si tardas más de 48 horas en contestar o si un competidor tuyo lo aprueba antes.</p>";

        foreach ($reservasRecibidas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 0) {

                echo"<div class='bloqueEstado idCar_" . $reserva['carId'] . "' id='bloque_" . $reserva['idReserve'] . "'>";
                echo "<div class='checkboxOpcion'>";
                echo "<input type='checkbox' class='checkbox checkboxEnEsperaRecibidos' id='checkbox_" . $reserva['idReserve'] . "'>";
                echo "</div>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                echo "</div>";
                echo "</div>";
                echo "<div class='infoUsuario ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "' title='Ver perfil'>";
                if ($reserva['facebook'] != null && $reserva['facebook'] != "") {
                    echo "<img src='" . $reserva['urlFoto'] . "' class='img_usuario'/>";
                } else {
                    if ($reserva['urlFoto'] != "") {
                        $filename = explode("/", $reserva['urlFoto']);
                        echo image_tag("users/" . $filename[Count($filename) - 1], 'class=img_usuario');
                    } else {
                        echo image_tag('img_registro/tmp_user_foto.jpg', 'class=img_usuario');
                    }
                }
                echo "</a>";
                echo "</div>";
                echo "<div class='der'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='precio'>";
                echo "<a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano nombreMovil'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo "<span class='textoGrande2'>$" . $reserva['valor'] . "</span> CLP<br>(" . $reserva['tiempoArriendo'] . " - asegurado)";
                echo "</div>";
                echo"<div class='eventoReserva'>";
                echo "<div class='der'>";
                echo "<div class='cargando'>" . image_tag('../images/ajax-loader.gif') . "</div>";
                echo "<div class='img'>" . image_tag('img_pedidos/IconoEnEspera.png') . "</div>";
                echo "<div class='texto'>En espera de confirmaci&oacute;n</div>";
                echo "</div>";
                echo"</div>";
                echo"<div class='pagoCheckbox'>";
                echo "<select class='select enEspera duracion_" . $reserva['duracion'] . "' id='select_" . $reserva['idReserve'] . "'><option name='none' selected>Acci&oacute;n</option><option name='preaprobar'>Pre aprobar</option><option name='rechazar'>Rechazar</option></select>";
                echo "</div>";
                echo"</div>";
            }
        }
        /*
          foreach ($reservasRecibidas as $reserva) {
          if(isset($reserva['estado']) && $reserva['estado']==1){

          echo"<div class='bloqueEstado' id='bloque_".$reserva['idReserve']."'>";
          echo "<div class='checkboxOpcion'>";
          echo "<input type='checkbox' class='checkbox checkboxEnEsperaRecibidos' id='checkbox_".$reserva['idReserve']."'>";
          echo "</div>";
          echo "<div class='fechaReserva'>";
          echo "<div class='izq'>";
          echo $reserva['fechaInicio']."<br>".$reserva['fechaTermino'];
          echo "</div>";
          echo "<div class='der'>";
          echo $reserva['horaInicio']."<br>".$reserva['horaTermino'];
          echo "</div>";
          echo "</div>";
          echo "<div class='infoUsuario'>";
          echo "<div class='izq'>";
          echo "<a href='".url_for('profile/publicprofile?id='.$reserva['contraparteId'])."' title='Ver perfil'>";
          if($reserva['facebook']!=null && $reserva['facebook']!=""){
          echo "<img src='".$reserva['urlFoto']."' class='img_usuario'/>";
          }else{
          if($reserva['urlFoto']!=""){
          $filename = explode("/", $reserva['urlFoto']);
          echo image_tag("users/".$filename[Count($filename) - 1], 'class=img_usuario');
          }else{
          echo image_tag('img_registro/tmp_user_foto.jpg', 'class=img_usuario');
          }
          }
          echo "</a>";
          echo "</div>";
          echo "<div class='der'>";
          echo "<a href='".url_for('profile/publicprofile?id='.$reserva['contraparteId'])."'><span class='textoMediano'>".$reserva['nombre']." ".$reserva['apellidoCorto']."</span></a>";
          echo "</div>";
          echo "</div>";
          echo "<div class='precio'>";
          echo "<span class='textoGrande2'>$".$reserva['valor']."</span> CLP<br>(".$reserva['tiempoArriendo']." - asegurado)";
          echo "</div>";
          echo"<div class='eventoReserva'>";
          echo "<div class='der'>";
          echo "<div class='cargando'>".image_tag('../images/ajax-loader.gif')."</div>";
          echo "<div class='img'>".image_tag('img_pedidos/IconoRechazado.png')."</div>";
          echo "<div class='texto'>Rechazado</div>";
          echo "</div>";
          echo"</div>";
          echo"<div class='pagoCheckbox'>";
          echo "<select class='select' id='select_".$reserva['idReserve']."'><option name='preaprobar'>Pre aprobar</option><option name='rechazar' selected>Rechazar</option></select>";
          echo "</div>";
          echo"</div>";

          }
          }
         */

        echo"<div class='bloqueEstado'>";
        echo"<div class='herramientas'>";
        echo "</div>";
        echo"</div>";
    }

    // ESTADO 1
    $mostrar = false;

    if ($reservasRecibidas) {
        foreach ($reservasRecibidas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 1) {
                $mostrar = true;
                $checkMostrar++;
            }
        }
    }

    if ($mostrar) {

        echo "<h3>ANULADOS</h3>";

        foreach ($reservasRecibidas as $reserva) {
            if (isset($reserva['estado']) && $reserva['estado'] == 1) {

                echo"<div class='bloqueEstado idCar_" . $reserva['carId'] . "' id='bloque_" . $reserva['idReserve'] . "'>";
                echo "<div class='checkboxOpcion'>";
                echo "</div>";
                echo "<div class='fechaReserva'>";
                echo "<div class='izq'>";
                echo $reserva['fechaInicio'] . "<br>" . $reserva['fechaTermino'];
                echo "</div>";
                echo "<div class='der'>";
                echo $reserva['horaInicio'] . "<br>" . $reserva['horaTermino'];
                echo "</div>";
                echo "</div>";
                echo "<div class='infoUsuario ocultarWeb'>";
                echo "<div class='izq'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "' title='Ver perfil'>";
                if ($reserva['facebook'] != null && $reserva['facebook'] != "") {
                    echo "<img src='" . $reserva['urlFoto'] . "' class='img_usuario'/>";
                } else {
                    if ($reserva['urlFoto'] != "") {
                        $filename = explode("/", $reserva['urlFoto']);
                        echo image_tag("users/" . $filename[Count($filename) - 1], 'class=img_usuario');
                    } else {
                        echo image_tag('img_registro/tmp_user_foto.jpg', 'class=img_usuario');
                    }
                }
                echo "</a>";
                echo "</div>";
                echo "<div class='der'>";
                echo "<a href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo "</div>";
                echo "</div>";
                echo "<div class='precio'>";
                echo "<a class='nombreMovil' href='" . url_for('profile/publicprofile?id=' . $reserva['contraparteId']) . "'><span class='textoMediano nombreMovil'>" . $reserva['nombre'] . " " . $reserva['apellidoCorto'] . "</span></a>";
                echo "<span class='textoGrande2'>$" . $reserva['valor'] . "</span> CLP<br>(" . $reserva['tiempoArriendo'] . " - asegurado)";
                echo "</div>";
                echo"<div class='eventoReserva'>";
                echo "<div class='der'>";
                echo "<div class='img'>" . image_tag('img_pedidos/IconoRechazado.png') . "</div>";
                echo "<div class='texto'>Anulado</div>";
                echo "</div>";
                echo"</div>";
                echo"<div class='pagoCheckbox'>";
                echo "</div>";
                echo"</div>";
            }
        }

        echo"<div class='bloqueEstado'>";
        echo"<div class='herramientas'>";
        echo "</div>";
        echo"</div>";
    }

    if ($checkMostrar == 0) {
        echo "<p class='alerta' style='margin-bottom: 30px;'>No existen pedidos de reserva.";
    };
    ?>

    <?php if ($mostrarBarra) { ?>
    </div>
    <?php } ?>