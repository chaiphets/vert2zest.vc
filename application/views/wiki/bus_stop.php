<link href="<?= base_url('lib/css/sidebar.css')?>" rel="stylesheet">
<link href="<?= base_url('lib/css/table.css')?>" rel="stylesheet">

 <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="../authen/login"><img class="logo_top" src="<?= base_url('images/logo_nobg.png')?>" alt=""></a>
                </li>
                <li class="active"><a href="#">Bus Stop Information</a>
                	<ul>
                		<li>
                			<a href="<?=site_url('wiki/busstop/create')?>">Create</a>
                		</li>
                		<li>
                			<a href="<?=site_url('wiki/busstop/update')?>">Update</a>
                		</li>
                		<li>
                			<a href="<?=site_url('wiki/busstop/delete')?>">Delete</a>
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
                    Bus Stop Information
                </h1>
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row" style="margin-left: auto;margin-right: auto;">
                    <div class="col-md-6">
                        <!-- Search Criteria -->
                        <?=form_open('wiki/busstop/search')?>
                        <input type="hidden" name="searchBusStop" />
                        <p class="well">Search :  <input type="text" id="txt_search" name="busstop_name" value="<?=isset($filter)&&isset($filter['busstop_name'])?$filter['busstop_name']:'';?>" />  <input type="submit" /></p>
						</form>
					</div>
					<div class="col-md-6">
                        <!-- Search Criteria -->
                        <!--?=form_open('wiki/busstop/search')?>
                        
						</form-->
						<p class="well">Place :  <input type="text" id="txt_place" name="place" value="<?=isset($filter)&&isset($filter['place'])?$filter['place']:'';?>" />  <input type="submit" id="searchPlaceBtn" /></p>
					</div>
				</div>
				
				
                <?php if(isset($result) && !empty($result)):?>
				<div class="row" style="margin-left: auto;margin-right: auto;">
                    <div class="col-md-12">
		                <!-- Search Result -->
		                <p><b>Google Map</b></p>
		                <div id="map-canvas" style="height: 400px; width: 100%;"></div>
		                <br/><br/>
		                
		                <div id="no-more-tables" style="display:none;" class="table-responsive"><b>Result</b><br/><br/>
						<table class="table table-striped table-bordered table-condensed"> 
							<thead>
								<tr>
									<th>Bus Stop ID</th>
									<th>Bus Stop Name</th>
									<th>Bus Stop New Name</th>
									<th>Road Name</th>
									<th>Lat.</th>
									<th>Long.</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($result as $row):?>
									<tr>
										<td data-title="Bus Stop ID"><?=$row['busstop_no']?></td>
										<td data-title="Bus Stop Name"><?=$row['busstop_name']?></td>
										<td data-title="Bus Stop New Name"><?=$row['busstop_new_name']?></td>
										<td data-title="Road Name"><?=$row['road_name']?></td>
										<td data-title="Latitude"><?=$row['latitude']?></td>
										<td data-title="Longtitude"><?=$row['longtitude']?></td>
									</tr>
								<?php endforeach;?>
							</tbody>
						</table>
		                </div>
					</div>
				</div>
				<?php elseif(isset($result) && empty($result)):?>
					No Result
				<?php endif; ?>
					
				
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
    
    <script>
    	var input = document.getElementById("txt_place");
    	var autocomplete = new google.maps.places.Autocomplete(input);
    	
    	$("#searchPlaceBtn").click(function(){
    		var place = autocomplete.getPlace();
    		if (!place || !place.geometry) {
				return;
		    }
		    console.log(place);
    	});
    	
    	google.maps.event.addListener(autocomplete, 'place_changed', function() {
    		alert("change");
    		var place = autocomplete.getPlace();
    		if (!place.geometry) {
				return;
		    }
    	});
    </script>
    
    <?php if(isset($result) && !empty($result)):?>
    <script language="JavaScript"  type="application/javascript">
			google.maps.event.addDomListener(window, 'load', function(){
			var map = new google.maps.Map(document.getElementById("map-canvas"));
			var latlngbounds = new google.maps.LatLngBounds();
			<?php foreach($result as $row):?>
				latlngbounds.extend(new google.maps.LatLng(<?=$row['latitude']?>,<?=$row['longtitude']?>));
				new google.maps.Marker({
					position: new google.maps.LatLng(<?=$row['latitude']?>,<?=$row['longtitude']?>),
					map: map
			  });
			<?php endforeach;?>
			map.setCenter(latlngbounds.getCenter());
			map.fitBounds(latlngbounds);
		});
    </script>
    <?php endif;?>