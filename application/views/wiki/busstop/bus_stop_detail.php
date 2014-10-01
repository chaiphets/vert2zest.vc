	<!-- Page content -->
	<div id="page-content-wrapper">
		<div class="content-header">
			<h1><a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a><?=($busStop['busstop_no']==null)?'Create':'Update'?> </h1>
		</div>
		<!-- Keep all page content within the page-content inset div! -->
		<div class="page-content inset">
			<div class="row" style="margin-left: auto;margin-right: auto;">
				<?php if($busStop['busstop_no'] != null):?>
				<div class="col-md-12">
					<div id="map-canvas" style="height: 400px; width: 100%;"></div>
	                <br/><br/>
				</div>
				<?php endif;?>
				<div class="col-md-12">
					<form class="form-horizontal" role="form" method="post" action="<?=site_url('wiki/busstop/save')?>">
						<input type="hidden" name="busstop_no" value="<?=$busStop['busstop_no']?>" />
						<div class="form-group">
							<label class="col-sm-2 control-label">Bus Stop Name</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_name" name="busstop_name" placeholder="Bus Stop Name" value="<?=$busStop['busstop_name']?>">
							</div>
							<label class="col-sm-2 control-label">Bus Stop New Name</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_newName" name="busstop_new_name" placeholder="Bus Stop New Name" value="<?=$busStop['busstop_new_name']?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Bus Stop Thai Name</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_th_Name" name="busstop_th_name" placeholder="Bus Stop Thai Name" value="<?=$busStop['busstop_th_name']?>">
							</div>
							<label class="col-sm-2 control-label">Road Name</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_rdName" name="road_name" placeholder="Road Name" value="<?=$busStop['road_name']?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Latitude</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_lat" name="latitude" placeholder="Latitude" value="<?=$busStop['latitude']?>">
							</div>
							<label class="col-sm-2 control-label">Longtitude</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="txt_long" name="longtitude" placeholder="Longtitude" value="<?=$busStop['longtitude']?>">
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Interchange</label>
							<div class="col-md-10">
								<div class="btn-group" data-toggle="buttons">
								  <!--label class="btn btn-primary">
								    <input id="chk_bts" type="checkbox" value="<?=$busStop['bts']?>"> BTS
								  </label>
								  <label class="btn btn-primary">
								    <input id="chk_mrt" type="checkbox"> MRT
								  </label>
								  <label class="btn btn-primary">
								    <input id="chk_ship" type="checkbox"> SHIP
								  </label>
								  <label class="btn btn-primary">
								    <input id="chk_airlink" type="checkbox"> Airport Link
								  </label>
								  <label class="btn btn-primary">
								    <input id="chk_brt" type="checkbox"> BRT
								  </label-->
									<button type="button" class="btn btn-primary bit-checkbox <?=($busStop['bts']==1)?"active":""?>">
										BTS<input type="hidden" name="bts" value="<?=$busStop['bts']?>" />
									</button>
									<button type="button" class="btn btn-primary bit-checkbox <?=($busStop['mrt']==1)?"active":""?>">
										MRT<input type="hidden" name="mrt" value="<?=$busStop['mrt']?>" />
									</button>
									<button type="button" class="btn btn-primary bit-checkbox <?=($busStop['ship']==1)?"active":""?>">
										SHIP<input type="hidden" name="ship" value="<?=$busStop['ship']?>" />
									</button>
									<button type="button" class="btn btn-primary bit-checkbox <?=($busStop['airlink']==1)?"active":""?>">
										Airport Link<input type="hidden" name="airlink" value="<?=$busStop['airlink']?>" />
									</button>
									<button type="button" class="btn btn-primary bit-checkbox <?=($busStop['brt']==1)?"active":""?>">
										BRT<input type="hidden" name="brt" value="<?=$busStop['brt']?>" />
									</button>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Interchange</label>
							<div class="col-md-10">
								<div class="btn-group" data-toggle="buttons">
								  <!--label class="btn btn-primary">
								    <input id="chk_oneside" type="checkbox"> One Side
								  </label-->
									<button type="button" class="btn btn-primary bit-checkbox <?=($busStop['one_side']==1)?"active":""?>">
										One Side<input type="hidden" name="one_side" value="<?=$busStop['one_side']?>" />
									</button>
								</div>
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
	
	<script>
		$('button.bit-checkbox').click(function(){
			if($(this).hasClass('active')){
				$('input',this).val('0');
			} else {
				$('input',this).val('1');
			}
		});
	</script>
	
    <?php if($busStop['busstop_no'] != null):?>
    <script language="JavaScript"  type="application/javascript">
			google.maps.event.addDomListener(window, 'load', function(){
			var map = new google.maps.Map(document.getElementById("map-canvas"));
			map.setMapTypeId(google.maps.MapTypeId.HYBRID);
			var latlngbounds = new google.maps.LatLngBounds();
				latlngbounds.extend(new google.maps.LatLng(<?=$busStop['latitude']?>,<?=$busStop['longtitude']?>));
				new google.maps.Marker({
					position: new google.maps.LatLng(<?=$busStop['latitude']?>,<?=$busStop['longtitude']?>),
					map: map
			  });
			map.setCenter(latlngbounds.getCenter());
			map.fitBounds(latlngbounds);
		});
    </script>
    <?php endif;?>