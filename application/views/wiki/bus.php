<link href="<?= base_url('lib/css/businfo.css')?>" rel="stylesheet">
<link href="<?= base_url('lib/css/sidebar.css')?>" rel="stylesheet">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="<?=site_url('authen/login')?>"><img class="logo_top" src="<?= base_url('images/logo_nobg.png')?>" alt=""></a>
                </li>
                <li><a href="<?=site_url('wiki/busstop/')?>">Bus Stop Information</a>
                </li>
                <li class="active"><a href="<?=site_url('wiki/bus')?>">Bus Information</a>
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
                    	<div class="route">
                    		<!-- If BusStop is MainPoint then class="main_point" !-->
                    		<!--<div class="text_point">Test</div>!-->
                    		<a href="#" class="main_point"></a>
                    		<!-- If BusStop is **not MainPoint then class="sub_point" !-->
							<a href="#" class="sub_point"></a>
							<a href="#" class="sub_point"></a>
							<a href="#" class="sub_point"></a>
							<a href="#" class="main_point"></a>
							<a href="#" class="sub_point"></a>
							<!-- Route Line background must be able to extend responsively !-->
							<div class="route_line"> </div>
						</div>
					</div>
				</div>				
			</div>
		</div>
		
	</div>