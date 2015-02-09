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
		<h1><a id="menu-toggle" href="#" class="btn btn-default btn-lg"><i class="icon-reorder"><span class="glyphicon glyphicon-align-justify"></span></i></a>
			<?=($bus['bus_id'] == null) ? "Create" : "Update" ?>
		</h1>
	</div>
	<!-- Keep all page content within the page-content inset div! -->
	<div class="page-content inset">
		<div class="row" style="margin-left: auto;margin-right: auto;">
			<?php if($bus['bus_id'] != null):
			?>
			<div class="col-md-12">
				<!-- Bus Stop Mapping -->
			</div>
			<?php endif; ?>
			<div class="col-md-12">
				<form class="form-horizontal" role="form" method="post" action="<?=site_url('wiki/bus/save') ?>">
					<input type="hidden" name="bus_id" value="<?=$bus['bus_id'] ?>" />
					<div class="form-group">
						<label class="col-sm-2 control-label">Bus No.</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_no" name="bus_no" placeholder="Bus no" value="<?=$bus['bus_no'] ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Bus Name</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_name" name="bus_name_th" placeholder="Bus Name" value="<?=$bus['bus_name_th'] ?>">
						</div>
						<label class="col-sm-2 control-label">Bus English Name</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="txt_newName" name="bus_name_eng" placeholder="Bus English Name" value="<?=$bus['bus_name_eng'] ?>">
						</div>
					</div>
          <br/>
          <div class="table-responsive">
            <table class="table">
              <tr>
              <th>No.</th>
              <th>Bus Stop No.</th>
              <th>Bus Stop Name</th>
              <th>Bus Stop Thai Name</th>
              <th></th>
            </tr>
            <tr>
              <td colspan="4"></td>
              <td><button type="button" class="btn btn-success btn-sm">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
              </button></td>
            </tr>
            </table>
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
	$('label.bit-checkbox').click(function() {
		if ($(this).hasClass('active')) {
			$('input', this).val('0');
		} else {
			$('input', this).val('1');
		}
	});
</script>

<?php if($bus['bus_no'] != null):
?>
<script language="JavaScript"  type="application/javascript">
	google.maps.event.addDomListener(window, 'load', function(){
var map = new google.maps.Map(document.getElementById("map-canvas"));
map.setMapTypeId(google.maps.MapTypeId.HYBRID);
var latlngbounds = new google.maps.LatLngBounds();
latlngbounds.extend(new google.maps.LatLng(<?=$bus['latitude'] ?>,<?=$bus['longtitude'] ?>));
new google.maps.Marker({
position: new google.maps.LatLng(<?=$bus['latitude'] ?>,<?=$bus['longtitude'] ?>
	), map: map
	});
	map.setCenter(latlngbounds.getCenter());
	map.fitBounds(latlngbounds);
	});
	function trigger(element) {
		var txtExchange = document.getElementById(element).value;
		if (txtExchange == '0')
			document.getElementById(element).value = 1;
		else
			document.getElementById(element).value = 0;
	}
</script>
<?php endif; ?>
