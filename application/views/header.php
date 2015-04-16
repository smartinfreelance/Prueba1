<?php
	header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    date_default_timezone_set('America/Argentina/Buenos_Aires');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php //echo $map['js']; ?>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="en" />
	<meta name="robots" content="noindex,nofollow" />
    <?php 
        echo link_tag('css/bootstrap.css');
		echo link_tag('css/bootstrap-responsive.css');
		echo link_tag('css/jquery-ui-1.8.16.custom.css');
		echo link_tag('css/jquery.jqplot.css');
        echo link_tag('css/prettify.css');
		echo link_tag('css/elfinder.min.css');
		echo link_tag('css/elfinder.theme.css');
		echo link_tag('css/fullcalendar.css');
        echo link_tag('js/plupupload/jquery.plupload.queue/css/jquery.plupload.queue.css');
		echo link_tag('css/styles.css');
		echo link_tag('css/icons-sprite.css');
		echo link_tag('css/1col.css');
	?>
    <link id="themes" href="<?php echo base_url(); ?>css/themes.css" rel="stylesheet" />
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>ico/apple-touch-icon-144-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>ico/apple-touch-icon-114-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>ico/apple-touch-icon-72-precomposed.png"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>ico/apple-touch-icon-57-precomposed.png"/>
	<!--[if lte IE 6]><?php echo link_tag('<?php echo base_url(); ?>css/main-ie6.css'); ?><![endif]-->
    <?php
		echo link_tag('css/style.css');
		echo link_tag('css/mystyle.css');
		echo link_tag('css/start/jquery-ui-1.8.7.custom.css');
	?>
    <style type="text/css">
		div.ui-datepicker{
			font-size:90%;
		}
	</style>
    
    <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery-ui-1.8.16.custom.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/vaidation.jquery.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.ui.touch-punch.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.autocomplete.js"></script> 
    <script src="<?php echo base_url(); ?>js/bootstrap.js"></script> 
    <script src="<?php echo base_url(); ?>js/prettify.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery.sparkline.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery.nicescroll.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/accordion.jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/smart-wizard.jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/vaidation.jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery-dynamic-form.js"></script> 
    <script src="<?php echo base_url(); ?>js/fullcalendar.js"></script> 
    <script src="<?php echo base_url(); ?>js/raty.jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery.noty.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery.cleditor.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/data-table.jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/TableTools.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/ColVis.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/plupload.full.js"></script> 
    <script src="<?php echo base_url(); ?>js/elfinder/elfinder.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/chosen.jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/uniform.jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script> 
    <script src="<?php echo base_url(); ?>js/check-all.jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/inputmask.jquery.js"></script> 
    <script src="<?php echo base_url(); ?>../../../../bp.yahooapis.com/2.4.21/browserplus-min.js"></script> 
    <script src="<?php echo base_url(); ?>js/plupupload/jquery.plupload.queue/jquery.plupload.queue.js"></script> 
    <script src="<?php echo base_url(); ?>js/excanvas.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/jquery.jqplot.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/chart/jqplot.highlighter.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/chart/jqplot.cursor.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/chart/jqplot.dateAxisRenderer.min.js"></script> 
    <script src="<?php echo base_url(); ?>js/custom-script.js"></script> 
    
 <!--   
	<script type="text/javascript" src="<?php //echo base_url(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php //echo base_url(); ?>js/switcher.js"></script>
	<script type="text/javascript" src="<?php //echo base_url(); ?>js/toggle.js"></script>
	<script type="text/javascript" src="<?php //echo base_url(); ?>js/jquery-ui-1.8.7.custom.min.js"></script>
	<script type="text/javascript" src="<?php //echo base_url(); ?>js/ui.tabs.js"></script>
-->
    
	<script type="text/javascript">
		$(document).ready(function(){
			$(".tabs > ul").tabs();
		});
	</script>
	<title>Lista</title>
</head>

<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner top-nav">
    <div class="container">
        <ul class="nav pull-left">
            <li><?php echo anchor('start/panel/' , '<i class="icon-share-alt icon-white"></i> Lista');?></li>
        </ul>
    </div>
  </div>
</div>