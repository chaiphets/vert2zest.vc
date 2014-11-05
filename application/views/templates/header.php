<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>SmartVC</title>
	
	<link href="<?=base_url('lib/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	
	<script type="text/javascript" src="<?=base_url('lib/scripts/jquery-1.11.1.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('lib/scripts/less-1.7.3.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('lib/scripts/jquery.twbsPagination.min.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('lib/bootstrap/js/bootstrap.min.js')?>"></script>
	
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmYj3D3YACcRSyTvMTTWS0XDxNp5ctObM&libraries=places"></script>
	
	<link href="<?= base_url('lib/css/sidebar.css')?>" rel="stylesheet">
	<link href="<?= base_url('lib/css/table.css')?>" rel="stylesheet">
	<link href="<?= base_url('lib/css/extra_form.css')?>" rel="stylesheet">
</head>
<body>

<div id="wrapper">

	<!-- Sidebar -->
	<div id="sidebar-wrapper">
	    <ul class="sidebar-nav">
	        <li class="sidebar-brand">
	        	<a href="<?=site_url('authen/login')?>"><img class="logo_top" src="<?= base_url('images/logo_nobg.png')?>" alt=""></a>
	        </li>
	        <li class="active"><a href="<?=site_url('wiki/busstop/')?>">Bus Stop Information</a>
	        	<ul>
	        		<li>
	        			<a href="<?=site_url('wiki/busstop/create')?>">New</a>
	        		</li>
	        		<li>
	        			<a href="<?=site_url('wiki/busstop/display')?>">Bus Stop List</a>
	        		</li>
	        	</ul>
	        </li>
	        <li>
	        	<a href="<?=site_url('wiki/bus')?>">Bus Information</a>
	        </li>
	    </ul>
	</div>