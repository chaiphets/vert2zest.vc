    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="content-header">
            <h1>
                <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
                Maintain Bus Stop
            </h1>
        </div>
        
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row" style="margin-left: auto;margin-right: auto;">
            	<!-- Search Criteria -->
            	<div class="col-md-12">
					<form class="form-horizontal" role="form" id="searchBusStopForm" method="post" action="<?=site_url('wiki/busstop/display')?>">
						<div class="form-group">
							<label class="col-sm-3 control-label">Bus Stop Name</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_name" name="busstop_name" placeHolder="Bus Stop Name" value="<?=$filter['busstop_name']?>" />
							</div>
							<label class="col-sm-3 control-label">Bus Stop New Name</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_new_name" name="busstop_new_name" placeHolder="Bus Stop New Name" value="<?=$filter['busstop_new_name']?>" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">Bus Stop Thai Name</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_local_name" name="busstop_th_name" placeHolder="Bus Stop Thai Name" value="<?=$filter['busstop_th_name']?>" />
							</div>
							<label class="col-sm-3 control-label">Road Name</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_rd_name" name="road_name" placeHolder="Road Name" value="<?=$filter['road_name']?>" />
							</div>
						</div>
						<div class"form-group">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-default">Search</button>
								<button type="reset" class="btn btn-default">Clear</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			<br><br>
			
			<div class="row" style="margin-left: auto;margin-right: auto;">
				<div class="table-responsive">
                    <!--form class="form-horizontal" role="form" method="post" action="<?=site_url('wiki/busstop/delete')?>"-->
                          <!-- Table -->
                          <table id="main-table" class="table table-condensed table-striped table-bordered table-hover no-margin breadcrumb">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>New Name</th>
                                <th>Thai Name</th>
                                <th>Road Name</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <!--<th>Delete</th>!-->
                            </thead>
                            <tbody>
                            <?php if(isset($busStops)):?>
                            <?php foreach ($busStops as $key => $busStop):?>
                            <tr>
                                <td>
                                	<?=$busStop['busstop_no']?>
                                </td>
                                <td>
                                	<a href="<?=site_url('wiki/busstop/show/'.$busStop['busstop_no'])?>" target="_blank">
                                	<?=$busStop['busstop_name']?>
                                	</a>
                                </td>
                                <td><?=$busStop['busstop_new_name']?></td>
                                <td><?=$busStop['busstop_th_name']?></td>
                                <td><?=$busStop['road_name']?></td>
                                <td><?=$busStop['latitude']?></td>
                                <td><?=$busStop['longtitude']?></td>
                                <!--<td>
								  	<div class="checkboxFive">
								  		<input type="checkbox" value="<?=$busStop['busstop_no']?>" name="busstop_no[]" />
									  	<!--label for="checkboxFiveInput"></label-->
								  	<!--</div>
								</td>!-->
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                            <tr>
                            	<td></td>
                            	<td></td>
                            	<td></td>
                            	<td></td>
                            	<td></td>
                            	<td></td>
                            	<td></td>
                            	<!--<td><button type="submit" class="btn btn-danger" id="deleteBtn">Delete</button></td> !-->
                            </tr>
                          	</tbody>
                          </table>
                   	 <!--/form-->
				</div>
			</div>
			
			
	        <?php if(isset($result) && !empty($result)):?>
			<div class="row" style="margin-left: auto;margin-right: auto;">
	            <div class="col-md-12">
	                <!-- Search Result -->
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
									<td data-title="Bus Stop ID"><?=$row['busstop_no'] ?></td>
									<td data-title="Bus Stop Name"><?=$row['busstop_name'] ?></td>
									<td data-title="Bus Stop New Name"><?=$row['busstop_new_name'] ?></td>
									<td data-title="Road Name"><?=$row['road_name'] ?></td>
									<td data-title="Latitude"><?=$row['latitude'] ?></td>
									<td data-title="Longtitude"><?=$row['longtitude'] ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
	                </div>
				</div>
			</div>
			<?php elseif(isset($result) && empty($result)): ?>
				No Result
			<?php endif; ?>
		</div>
	</div>	
	<script>

		$(function(){
			$('#main-table').oneSimpleTablePagination({rowsPerPage: 20});
			// $('#deleteBtn').click(function(){
				// if($('input[type=checkbox]:checked').length == 0){
					// alert('No bus stop is selected');
					// return;
				// }
				// if(confirm('Confirm?')){
					// $.ajax({
						// url: '<?=site_url('wiki/busstop/delete')?>',
						// type: 'post',
						// async: true,
						// dataType: 'json',
						// data: $('input[type=checkbox]:checked'),
						// success: function(data){
							// $('#searchBusStopForm').submit();
						// }
					// });
				// }
			// });
		});
	</script>