<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="http://arriendas.assets.s3.amazonaws.com/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

        <!-- Metas -->
        <!-- Al publicar en una red social un link de la página el link se publicara de la siguiente forma -->
        <meta property="og:description" content="Arriendo de autos por hora con seguro, asistencia de viaje y TAGs incluídos. Busca un auto por ubicación o por precio. Rent a car Vecino.">
        <meta property="og:title" content="Rent a car vecino. Arriendo de autos, cerca de ti - Arriendas.cl">
        <meta property="og:type" content="website">
        <meta property="og:image" content="<?php echo image_path('newDesign/logo.jpg', 'absolute=true') ?>">
        <meta property="og:url" content="http://www.arriendas.cl<?php echo sfContext::getInstance()->getController()->genUrl(sfContext::getInstance()->getRouting()->getCurrentInternalUri());?>">
        <meta property="og:site_name" content="Rent a car vecino. Arriendo de autos, cerca de ti - Arriendas.cl">

        <!-- JQuery UI -->
        <link href="/css/newDesign/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="/css/newDesign/jquery-ui/jquery-ui.structure.min.css" rel="stylesheet" type="text/css">
        <link href="/css/newDesign/jquery-ui/jquery-ui.theme.min.css" rel="stylesheet" type="text/css">
        
        <!-- Bootstrap -->
        <link href="/css/newDesign/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Font Awesome -->
        <link href="/css/newDesign/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Complementos -->
        <link href="/css/newDesign/datetimepicker/jquery.datetimepicker.css" rel="stylesheet" type="text/css">
        <link href="/css/newDesign/slick/slick.css" rel="stylesheet" type="text/css">
        <link href="/css/newDesign/raty/jquery.raty.css" rel="stylesheet" type="text/css">
        <link href="/css/newDesign/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <!-- <link href="/css/newDesign/datatablesp/jquery.dataTables_themeroller.css" rel="stylesheet" type="text/css"> -->
        <link href="/css/newDesign/datatables/dataTables.responsive.css" rel="stylesheet" type="text/css">

        <!-- Estilos para todo el proyecto -->
        <link href="/css/newDesign/arriendas.css" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Roboto:300,350,400,500,600,700,800" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700,800,400italic,700italic" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- JQuery -->
        <script src="/js/newDesign/jquery-2.1.3.min.js" type="text/javascript"></script>

        <!-- JQuery UI -->
        <script src="/js/newDesign/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
        
        <!-- Bootstrap -->
        <script src="/js/newDesign/bootstrap.min.js" type="text/javascript"></script>

        <!-- Complementos -->
        <script src="/js/newDesign/datetimepicker/jquery.datetimepicker.js" type="text/javascript"></script>
        <script src="/js/newDesign/slick/slick.min.js" type="text/javascript"></script>
        <script src="/js/newDesign/raty/jquery.raty.js" type="text/javascript"></script>
        <script src="/js/newDesign/number/jquery.number.min.js" type="text/javascript"></script>
        <script src="/js/newDesign/jquery-form/jquery.form.min.js" type="text/javascript"></script>
        <script src="/js/newDesign/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="/js/newDesign/datatables/dataTables.responsive.min.js" type="text/javascript"></script>
        <script src="/js/newDesign/formToWizard/formToWizard.js" type="text/javascript"></script>

        <!-- Utils -->
        <script src="/js/newDesign/utils.js" type="text/javascript"></script>

        <!-- Arriendas -->
        <script src="/js/newDesign/arriendas.js" type="text/javascript"></script>

        <?php include_component('main', 'header') ?>

        <?php echo $sf_content ?>
    </body>
</html>