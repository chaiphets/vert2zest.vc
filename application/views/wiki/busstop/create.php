<link href="<?= base_url('lib/css/sidebar.css') ?>" rel="stylesheet">
<link href="<?= base_url('lib/css/table.css') ?>" rel="stylesheet">

<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="<?=site_url('authen/login')?>"><img class="logo_top" src="<?= base_url('images/logo_nobg.png')?>" alt=""></a>
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
                <li><a href="<?=site_url('wiki/bus')?>">Bus Information</a>
                </li>
            </ul>
        </div>

	<!-- Page content -->
	<div id="page-content-wrapper">
		<div class="content-header">
			<h1><a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a> New </h1>
		</div>
		<!-- Keep all page content within the page-content inset div! -->
		<div class="page-content inset">
			<div class="row" style="margin-left: auto;margin-right: auto;">
				<div class="col-md-12">
					<form class="form-horizontal" role="form" method="post">
						<div class="form-group">
							<label class="col-sm-3 control-label">Bus Stop Name</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_name" name="busstop_name" placeholder="Bus Stop Name" value="<?=$busStop['busstop_name']?>">
							</div>
							<label class="col-sm-3 control-label">Bus Stop New Name</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_newName" name="busstop_new_name" placeholder="Bus Stop New Name" value="<?=$busStop['busstop_new_name']?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Bus Stop Thai Name</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_th_Name" name="busstop_th_name" placeholder="Bus Stop Thai Name" value="<?=$busStop['busstop_th_name']?>">
							</div>
							<label class="col-sm-3 control-label">Road Name</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_rdName" name="road_name" placeholder="Road Name" value="<?=$busStop['road_name']?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Latitude</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_lat" name="latitude" placeholder="Latitude" value="<?=$busStop['latitude']?>">
							</div>
							<label class="col-sm-3 control-label">Longtitude</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_long" name="longtitude" placeholder="Longtitude" value="<?=$busStop['longtitude']?>">
							</div>
						</div>
						<br/>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-4">
								<button type="submit" class="btn btn-default">
									Save
								</button>
								<button type="reset" class="btn btn-default">
									Reset
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Custom JavaScript for the Menu Toggle -->
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("active");
	});
	$(document).ready(function() {
		$("#no-more-tables").slideDown(1000);
	}); 
</script>
