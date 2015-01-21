        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="<?=site_url('authen/login')?>"><img class="logo_top" src="<?= base_url('images/logo_nobg.png')?>" alt=""></a>
                </li>
                <li><a href="../wiki/busstop"><img width="32px" src="<?= base_url('images/busstop_icon.png')?>" /> Bus Stop Information</a></li>
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
                    Bus Information
                </h1>
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
              <div class="row" style="margin-left: auto;margin-right: auto;">
                <div class="col-md-6">
                  <!-- Search Criteria -->
                  <?=form_open('wiki/bus/search')?>
                  <input type="hidden" name="searchBusStop" />
                  <p class="well"><label class="control-label">Bus Stop</label><input type="text" id="txt_search" name="busstop_name" value="<?=isset($filter)&&isset($filter['busstop_name'])?$filter['busstop_name']:'';?>" placeHolder="ชื่อสาย" required class="form-control" />  <input type="submit" value="Search" class="btn btn-default" /></p>
                </form>
              </div>
              <div class="col-md-6">
                <!-- Search Criteria -->
                <!--?=form_open('wiki/busstop/search')?>

                </form-->
                <p class="well"><label class="control-label">Place</label><input type="text" id="txt_place" name="place" value="<?=isset($filter)&&isset($filter['place'])?$filter['place']:'';?>" required class="form-control" />  <input type="submit" id="searchPlaceBtn" value="Search" class="btn btn-default" /></p>
              </div>
            </div>
    		</div>
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
