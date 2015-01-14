    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="content-header">
            <h1>
                <a id="menu-toggle" href="#" class="btn btn-default btn-lg"><i class="icon-reorder"><span class="glyphicon glyphicon-align-justify"></span></i></a>
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
                    <p class="well"><label class="control-label">Bus Stop</label><input type="text" id="txt_search" name="busstop_name" value="<?=isset($filter)&&isset($filter['busstop_name'])?$filter['busstop_name']:'';?>" placeHolder="ชื่อป้าย" required class="form-control" />  <input type="submit" value="Search" class="btn btn-default" /></p>
					</form>
				</div>
				<div class="col-md-6">
                    <!-- Search Criteria -->
                    <!--?=form_open('wiki/busstop/search')?>
                    
					</form-->
					<p class="well"><label class="control-label">Place</label><input type="text" id="txt_place" name="place" value="<?=isset($filter)&&isset($filter['place'])?$filter['place']:'';?>" required class="form-control" />  <input type="submit" id="searchPlaceBtn" value="Search" class="btn btn-default" /></p>
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