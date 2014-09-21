<link href="<?= base_url('lib/css/sidebar.css')?>" rel="stylesheet">
<link href="<?= base_url('lib/css/businfo.css')?>" rel="stylesheet">

 <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="../authen/login"><img class="logo_top" src="<?= base_url('images/logo_nobg.png')?>" alt=""></a>
                </li>
                <li><a href="../wiki/busstop">Bus Stop Information</a>
                </li>
                <li class="active"><a href="#">Bus Information</a>
                </li>
            </ul>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="content-header">
                <h1>
                    <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
                    Bus Information
                </h1>
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row" style="margin-left: auto;margin-right: auto;">
                    <div class="col-md-12">
                    	<p>Sample SVG graghic</p>
                    	<!-- Generate Tag Form -->
                    	<div class="route_line">
                    	<a href="#" class="main_point"></a>
						<a href="#" class="sub_point"></a>
						</div>
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