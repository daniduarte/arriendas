<style type="text/css">

iframe[name='google_conversion_frame'] { 
    height: 0 !important;
    width: 0 !important; 
    line-height: 0 !important; 
    font-size: 0 !important;
    margin-top: -13px;
    float: left;
}

</style> 

<?php use_stylesheet('login.css') ?>
<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
  use_stylesheet('moviles.css');
}
?>
<script>
	function submitFrom() {
		document.forms["frm1"].submit();
	}

	function checkclear(what) {
		if (!what._haschanged) {
			what.value = ''
		};
		what._haschanged = true;
	}
</script>
<div class="group_form">
 <?php echo form_tag('main/doLogin', array('method' => 'post', 'id' => 'frm1')); ?>

<div class="login_box">
    <div class="barraSuperior"><p>INGRESAR</p></div>
	<?php if($sf_user->getFlash('show')): ?>
	<div class="error_log" >
		<?php echo html_entity_decode($sf_user -> getFlash('msg')); ?>
	</div>
	<?php endif; ?>
	
    <h2>Regístrate o Ingresa con Facebook</h2>
    <div class="login_btn_fb" style="float:center;">
        <div id="social-register" class="registration_panel">
            <a href="<?php echo url_for("main/loginFacebook")?>" id="facebook-login"><?php echo image_tag('img_login/login_btn_fb') ?></a>
        </div>
    </div>
        <div style="width: 100%;height: 15px;text-align: center;text-align:-moz-center;" class="opt_reg">
		<center>
        	<a class="nouser" style="font-size:11px;float:none;margin-left:auto;margin-right:auto;" href="<?php echo url_for('main/register')?>" >&iquest;No tienes Facebook? <span style="font-size:11px;"><b>REGISTRATE AQUÍ</b></span></a>
        </center></div>
			<div id="separadorLogin">
        <div class="lineaIzq"></div>
        <div class="letraO"><?php echo image_tag('img_login/O_Registro.png') ?></div>
        <div class="lineaDer"></div>
    </div>
    <h2 style="clear:both">Conéctate con tu usuario</h2>

   <div class="login_formulario">

        <div class="c1">
        <input type="text" placeholder="Email" id="username" name="username" value="E-mail" onfocus="checkclear(this)"/>
        </div>
        <div class="c1">
        <input type="Password" placeholder="Contraseña" id="password" name="password" value="Password" onfocus="checkclear(this)"/>
        </div>
        <button class="login_btn_conectar" onclick="submitFrom()"></button>

        <div class="opt_reg">
	    <a href="<?php echo url_for('main/forgot')?>" class="login_olvidar">&iquest;Olvidaste tu clave?</a>

		</div>
    </div>
</div>
</form>
</div>

