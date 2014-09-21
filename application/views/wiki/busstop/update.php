<link href="<?= base_url('lib/css/sidebar.css')?>" rel="stylesheet">
<link href="<?= base_url('lib/css/table.css')?>" rel="stylesheet">

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
                <h1>
                    <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
                    Update
                </h1>
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row" style="margin-left: auto;margin-right: auto;">
                    <div class="table-responsive">
	                    <form class="form-horizontal" role="form">
                              <!-- Table -->
                              <table class="table table-condensed table-striped table-bordered table-hover no-margin breadcrumb">
                                <tr>
                                    <th>Bus Stop Number</th>
                                    <th>Bus Stop Name</th>
                                    <th>Bus Stop New Name</th>
                                    <th>Bus Stop Local Name</th>
                                    <th>Bus Stop Road Name</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                </tr>
                                <tr>
                                    <td><!-- busstop_no -->
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Bus Stop Number">
                                        </div></td>
                                    <td><!-- busstop_name -->
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Bus Stop Name">
                                        </div></td>
                                    <td><!-- busstop_new_name -->
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Bus Stop New Name">
                                        </div></td>
                                    <td><!-- busstop_loc_name -->
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Bus Stop Local Name">
                                        </div></td>
                                    <td><!-- road_name -->
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Bus Stop Road Name">
                                        </div></td>
                                    <td><!-- latitude -->
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Latitude">
                                        </div></td>
                                    <td><!-- longtitude -->
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Longitude">
                                        </div></td>
                                </tr>
                              </table>
                            <div class="col-md-12 text-center">
                              <button type="submit" class="btn btn-default">Save</button>
                              <button type="reset" class="btn btn-default">Reset</button>
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
		$(document).ready(function(){
			$("#no-more-tables").slideDown(1000);
		});
    </script>
    
