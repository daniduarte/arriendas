<link href="/css/newDesign/inbox.css" rel="stylesheet" type="text/css">
<?php use_helper("jQuery")?>


<div id="container">
  <div class=" cont row">
    <div class="hidden-xs space-100"></div>
    <div class="visible-xs space-100"></div>
    <div class="main_box_1 col-md-offset-2 col-md-8">
      <div class="main_box_2">
        <!--  contenido de la seccion -->
        <div class="main_contenido ">
          <div id="confirmarEliminar" style="display:none;"><p>¿Está seguro de eliminar esta conversación?<p></div>
          <?php echo form_tag('messages/eliminarConversation', array('method' => 'post', 'enctype' => 'multipart/form-data', 'id' => 'frmEliminarConversacion')); ?>
          <div class="barraSuperior">
            <p>BANDEJA DE ENTRADA</p>
          </div>
          <div class="conversaciones col-xs-12 col-sm-12 col-md-12">
            <?php
            $cantidadConversaciones = count($listaConversaciones);
            $cantidadConversacionesOrdenadas = count($conversacionesOrdenadas);
            if($cantidadConversacionesOrdenadas > 0){
              for($k=0;$k<$cantidadConversacionesOrdenadas;$k++){
                $myId = $user_id;
                for($i=0;$i<$cantidadConversaciones;$i++){
                                      //si el id de la ultima conversacion es igual al id de la lista de conversaciones... entra
                  if($conversacionesOrdenadas[$k]['idConversacion'] == $listaConversaciones[$i]->getId()){
                                          //si esa id no es la propia... entra
                    if($listaConversaciones[$i]->getUserFrom()->getId() != $myId){
                      if($conversacionesOrdenadas[$k]['tipoMensaje'] == "NoLeido") {?>
                      <div class="encabezadoConversacionAmarillo col-xs-12 col-sm-12 col-md-12">
                        <?php
                      }else{
                        ?>
                        <!-- conversaciones en la que yo soy el user_from_id -->
                        <div class="encabezadoConversacion col-xs-12 col-sm-12 col-md-12">
                          <?php
                        }
                        ?>
                        <?php echo "<a href='".url_for('messages/conversation?id='.$conversacionesOrdenadas[$k]['idConversacion'])."' title='Ir a la conversación'>"; ?>
                        <div class="msg_user_frame hidden-xs col-sm-2 col-md-2">
                          <?php include_component("profile","pictureFile",array("user"=>$listaConversaciones[$i]->getUserFrom(),"params"=>"width='74px' height='74px'"));?>
                        </div>
                        <div class="costado_izquierdo col-xs-10 col-sm-8 col-md-8">
                          <div class = "row">
                            <div class="msg_user_nombre col-xs-3 col-sm-3 col-md-3">
                            <?php echo ucwords($listaConversaciones[$i]->getUserFrom()->getFirstName())." ".ucwords($listaConversaciones[$i]->getUserFrom()->getLastName());?>
                            </div>
                            <div class="indicador col-xs-1 col-sm-1 col-md-1 pull-right">
                              <?php
                              if($conversacionesOrdenadas[$k]['tipoMensaje'] == "NoLeido") echo "";
                              if($conversacionesOrdenadas[$k]['tipoMensaje'] == "Leido") echo "";
                              if($conversacionesOrdenadas[$k]['tipoMensaje'] == "Enviado") echo image_tag('Flecha.png','class=flechaEnviado');
                              ?>
                            </div>
                            <div class="body_msgInbox col-xs-5 col-sm-5 col-md-5"><p><?=$conversacionesOrdenadas[$k]['bodyMensaje'];?></p></div>
                            <div class="fecha_msg col-xs-3 col-sm-3 col-md-3"><?=$conversacionesOrdenadas[$k]['dateMensaje'];?></div>
                          </div>
                        </div>
                        <div class="eliminar_msgInbox col-xs-2 col-sm-2 col-md-2">
                          <input class="botonEliminarConversacion" name="<?=$conversacionesOrdenadas[$k]['idConversacion'];?>" value="Eliminar" type="button"></input>
                        </div>
                      </div>

                      <?php
                    }else{
                      if($conversacionesOrdenadas[$k]['tipoMensaje'] == "NoLeido") {
                        ?>
                        <div class="encabezadoConversacionAmarillo col-xs-12 col-sm-12 col-md-12">
                          <?php
                        }else{
                          ?>
                          <!-- conversaciones en la que yo soy el user_to_id -->
                          <div class="encabezadoConversacion col-xs-12 col-sm-12 col-md-12">
                            <?php
                          }
                          ?>
                          <?php echo "<a href='".url_for('messages/conversation?id='.$conversacionesOrdenadas[$k]['idConversacion'])."' title='Ir a la conversación'>"; ?>
                          <div class="msg_user_frame hidden-xs col-sm-2 col-md-2">
                            <?php include_component("profile","pictureFile",array("user"=>$listaConversaciones[$i]->getUserTo(),"params"=>"width='74px' height='74px'"));?>
                          </div>
                          <div class="costado_izquierdo col-xs-10 col-sm-8 col-md-8">
                            <div class="msg_user_nombre col-xs-3 col-sm-3 col-md-3">
                              <?php echo ucwords($listaConversaciones[$i]->getUserTo()->getFirstName())." ".ucwords($listaConversaciones[$i]->getUserTo()->getLastName());?>
                            </div>
                            <div class="indicador col-sm-1 col-sm-1 col-md-1 pull-right">
                              <?php
                              if($conversacionesOrdenadas[$k]['tipoMensaje'] == "NoLeido") echo "";
                              if($conversacionesOrdenadas[$k]['tipoMensaje'] == "Leido") echo "";
                              if($conversacionesOrdenadas[$k]['tipoMensaje'] == "Enviado") echo image_tag('Flecha.png','class=flechaEnviado');
                              ?>
                            </div>
                            <div class="body_msgInbox col-xs-5 col-sm-5 col-md-5"><p><?=$conversacionesOrdenadas[$k]['bodyMensaje'];?></p></div>
                             <div class="fecha_msg col-xs-3 col-sm-3 col-md-3"><?=$conversacionesOrdenadas[$k]['dateMensaje'];?></div>
                          </div>
                        </a>
                        <div class="eliminar_msgInbox col-xs-2 col-sm-2 col-md-2">
                          <input class="botonEliminarConversacion" name="<?=$conversacionesOrdenadas[$k]['idConversacion'];?>" value="Eliminar" type="button"></input>
                        </div>
                      </div>
                      <?php
            }//fin else
          }//fin si padre
        }//fin for hijo
    }//fin for padre
  }else{
    echo "<div class='noHay'><p>No existen conversaciones</p></div>";
  }
  ?>
</div>
<input id="opcionEliminar" type="hidden" name="opcionDelete" value="" />
</form>
</div><!-- main_contenido -->


</div><!-- main_box_2 -->
<div class="clear"></div>
</div><!-- main_box_1 -->
<div class="hidden-xs space-100"></div>
<div class="visible-xs space-100"></div>
</div>

</div>


<script language="javascript">
  function gotoConversation(id,message){
    var datos = "id="+id+"&message_id="+message;
    <?php echo jq_remote_function(array(
      "update"=>"conversation",
      "url"=>"messages/conversation",
      "with"=>"datos",
      ))?>
  }
  function deleteMessage(id){
    var datos = "id="+id;
    <?php echo jq_remote_function(array(
      "update"=>"conversation",
      "url"=>"messages/delete",
      "with"=>"datos",
      ))?>
  }

  function gotoMensajes(){
    <?php echo jq_remote_function(array(
      "update"=>"conversation",
      "url"=>"messages/inbox",
      ))?>
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".botonEliminarConversacion").click(function(){
      id = $(this).attr("name");
      $("#opcionEliminar").attr("value", id);
      $("#confirmarEliminar").dialog({
        resizable: false,
        width: 300,
        height: 120,
        modal: false,
        autoOpen: false,
        closeOnEscape: false,
        title: 'Pregunta',
        position: { my: "center", at: "center"},
        buttons: {
          Si: function() {
            $('#frmEliminarConversacion').submit();
            $(this).dialog( "close" );
          },
          No: function() {
            $(this).dialog( "close" );
          }
        }
      });
      $("#confirmarEliminar").dialog("open");
    });
  });
</script>