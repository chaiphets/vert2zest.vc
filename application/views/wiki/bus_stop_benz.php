<form action="<?=site_url('/wiki/busstop/search')?>" method="post">
	<input type="text" name="busstop_name" value="<?=isset($filter)?$filter['busstop_name']:'';?>"/>
	<input type="submit"/>
</form>

<?php if(isset($result)):?>
	<?=var_dump($result)?>

<br/><br/>

	<?=$this->table->generate($result)?>

<br/><br/>

	<table>
		<thead>
			<th>busstop_no</th>
			<th>busstop_name</th>
			<th>busstop_new_name</th>
			<th>road_name</th>
			<th>latitude</th>
			<th>longtitude</th>
		</thead>
		<tbody>
			<?php foreach($result as $row):?>
				<tr>
				<td><?=$row['busstop_no']?></td>
				<td><?=$row['busstop_name']?></td>
				<td><?=$row['busstop_new_name']?></td>
				<td><?=$row['road_name']?></td>
				<td><?=$row['latitude']?></td>
				<td><?=$row['longtitude']?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>

<br/><br/>

	<script>
		google.maps.event.addDomListener(window, 'load', function(){
			var map = new google.maps.Map(document.getElementById("map-canvas"));
			var latlngbounds = new google.maps.LatLngBounds();
			<?php foreach($result as $row):?>
				latlngbounds.extend(new google.maps.LatLng(<?=$row['latitude']?>,<?=$row['longtitude']?>));
				new google.maps.Marker({
					position: new google.maps.LatLng(<?=$row['latitude']?>,<?=$row['longtitude']?>),
					map: map
					// title: 'Hello World!'
			  });
			<?php endforeach;?>
			map.setCenter(latlngbounds.getCenter());
			map.fitBounds(latlngbounds);
		});
	</script>
	<div id="map-canvas" style="height: 400px; width: 800px;"></div>
<?php endif;?>