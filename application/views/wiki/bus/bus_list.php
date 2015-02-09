<!-- Sidebar -->
<div id="sidebar-wrapper">
  <ul class="sidebar-nav">
    <li class="sidebar-brand"><a href="<?=site_url('authen/login')?>"><img class="logo_top" src="<?= base_url('images/logo_nobg.png')?>" alt=""></a>
    </li>
    <li><a href="<?=site_url('wiki/busstop') ?>"><img width="32px" src="<?= base_url('images/busstop_icon.png')?>" /> Bus Stop Information</a></li>
    <li class="active"><a href="<?=site_url('wiki/bus')?>"><img width="32px" src="<?= base_url('images/bus_icon.png')?>" /> Bus Information</a>
      <ul>
        <li>
          <a href="<?=site_url('wiki/bus/create')?>">New</a>
        </li>
        <li>
          <a href="<?=site_url('wiki/bus/display')?>">Bus List</a>
        </li>
      </ul>
    </li>
  </ul>
</div>
    <!-- Page content -->
    <div id="page-content-wrapper">
        <div class="content-header">
            <h1>
                <a id="menu-toggle" href="#" class="btn btn-default btn-lg"><i class="icon-reorder"><span class="glyphicon glyphicon-align-justify"></span></i></a>
                Maintain Bus
            </h1>
        </div>

        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row" style="margin-left: auto;margin-right: auto;">
            	<!-- Search Criteria -->
            	<div class="col-md-12">
					<form class="form-horizontal" role="form" id="searchbusForm" method="post" action="<?=site_url('wiki/bus/display')?>">
						<div class="form-group">
							<label class="col-sm-3 control-label">Bus No.</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_name" name="bus_no" placeHolder="Bus No" value="<?=$filter['bus_no']?>" />
							</div>
						</div>
						<div class="form-group">
              <label class="col-sm-3 control-label">Bus Thai Name</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="txt_new_name" name="bus_name_th" placeHolder="Bus Thai Name" value="<?=$filter['bus_name_th']?>" />
              </div>
							<label class="col-sm-3 control-label">Bus English Name</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="txt_local_name" name="bus_name_eng" placeHolder="Bus Thai Name" value="<?=$filter['bus_name_eng']?>" />
							</div>
						</div>
						<div class"form-group">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-default">Search</button>
								<button type="reset" class="btn btn-default">Clear</button>
							</div>
						</div>
						<input type="hidden" name="paging_pagesize" id="paging_pagesize" value="<?=$paging->pageSize?>" />
						<input type="hidden" name="paging_currentpage" id="paging_currentpage" value="<?=$paging->currentPage?>" />
					</form>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12 pull-right">
					<div class="btn-group">
						<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
							<?=$paging->pageSize?> records per page <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<?php foreach ($paging->pageSizeList as $key => $pageSize):?>
								<li><a href="javascript:changePageSize(<?=$pageSize?>);"><?=$pageSize?></a></li>
							<?php endforeach;?>
							<li><a href="javascript:changePageSize(0);">Show All</a></li>
						</ul>
					</div>
				</div>
			</div>
			<br>
			<div class="row" style="margin-left: auto;margin-right: auto;">
				<div class="table-responsive">
                    <!--form class="form-horizontal" role="form" method="post" action="<?=site_url('wiki/bus/delete')?>"-->
                          <!-- Table -->
                          <table id="main-table" class="table table-condensed table-striped table-bordered table-hover no-margin breadcrumb">
                            <thead>
                                <th>ID</th>
                                <th>Bus No</th>
                                <th>Bus Thai Name</th>
                                <th>Bus English Name</th>
                            </thead>
                            <tbody>
                            <?php if(isset($bus)):?>
                            <?php foreach ($bus as $key => $_bus):?>
                            <tr>
                                <td>
                                  <?=$_bus['bus_id']?>
                                </td>
                                <td>
                                	<?=$_bus['bus_no']?>
                                </td>
                                <td>
                                	<a href="<?=site_url('wiki/bus/show/'.$_bus['bus_no'])?>" target="_blank">
                                	<?=$_bus['bus_name_th']?>
                                	</a>
                                </td>
                                <td><?=$_bus['bus_name_eng']?></td>
                                <!--<td>
								  	<div class="checkboxFive">
								  		<input type="checkbox" value="<?=$bus['bus_no']?>" name="bus_no[]" />
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
                            </tr>
                          	</tbody>
                          </table>
                   	 <!--/form-->
				</div>
			</div>
			<div clas="row">
				<div class="col-md-12 text-center">
					<ul id="pagination-demo" class="pagination-sm" style="margin: auto;"></ul>
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
									<td data-title="Bus Stop ID"><?=$row['bus_no'] ?></td>
									<td data-title="Bus Stop Name"><?=$row['bus_name'] ?></td>
									<td data-title="Bus Stop New Name"><?=$row['bus_new_name'] ?></td>
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
		function changePageSize(pageSize){
			$('#paging_pagesize').val(pageSize);
			$('#paging_currentpage').val(1);
			$('#searchbusForm').submit();
		}
		$(function(){
			$('#pagination-demo').twbsPagination({
				totalPages: <?=$paging->totalPage?>,
				startPage: <?=$paging->currentPage?>,
		        // visiblePages: 7,
		        onPageClick: function (event, page) {
		        	$('#paging_currentpage').val(page);
		        	$('#searchbusForm').submit();
		        }
		    });
		});
	</script>
