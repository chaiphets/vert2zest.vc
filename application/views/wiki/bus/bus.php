        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="<?=site_url('authen/login')?>"><img class="logo_top" src="<?= base_url('images/logo_nobg.png')?>" alt=""></a>
                </li>
                <li><a href="<?=site_url('wiki/busstop/')?>">Bus Stop Information</a></li>
                <li class="active"><a href="<?=site_url('wiki/bus')?>">Bus Information</a>
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
                        <?=form_open('wiki/busstop/search')?>
                        <input type="hidden" name="searchBusStop" />
                        <p class="well">Search :  <input type="text" id="txt_search" name="busstop_name" value="<?=isset($filter)&&isset($filter['busstop_name'])?$filter['busstop_name']:'';?>" required />  <input type="submit" /></p>
    					</form>
    				</div>
    				<div class="col-md-6">
                        <!-- Search Criteria -->
                        <!--?=form_open('wiki/busstop/search')?>
                        
    					</form-->
    					<p class="well">Place :  <input type="text" id="txt_place" name="place" value="<?=isset($filter)&&isset($filter['place'])?$filter['place']:'';?>" required />  <input type="submit" id="searchPlaceBtn" /></p>
    				</div>
    		  </div>
    		</div>
        </div>
    </div>