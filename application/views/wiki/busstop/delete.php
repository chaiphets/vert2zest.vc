<link href="<?= base_url('lib/css/sidebar.css')?>" rel="stylesheet">
<link href="<?= base_url('lib/css/table.css')?>" rel="stylesheet">

 <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="<?=site_url('authen/login')?>"><img class="logo_top" src="<?= base_url('images/logo_nobg.png')?>" alt=""></a>
                </li>
                <li class="active"><a href="<?=site_url('wiki/busstop/')?>">Bus Stop Information</a>
                    <ul>
                        <li>
                            <a href="<?=site_url('wiki/busstop/create')?>">New</a>
                        </li>
                        <li>
                            <a href="<?=site_url('wiki/busstop/display')?>">Bus Stop List</a>
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
                    <a id="menu-toggle" href="#" class="btn btn-default btn-lg"><i class="icon-reorder"><span class="glyphicon glyphicon-align-justify"></span></i></a>
                    Delete
                </h1>
            </div>
            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row" style="margin-left: auto;margin-right: auto;">
                    <div class="table-responsive">
                        <form class="form-horizontal" role="form">
                              <!-- Table -->
                              <table class="table table-condensed table-striped table-bordered table-hover no-margin ">
                                <tr>
                                    <th>Bus Stop Number</th>
                                    <th>Bus Stop Name</th>
                                    <th>Bus Stop New Name</th>
                                    <th>Bus Stop Local Name</th>
                                    <th>Bus Stop Road Name</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Delete</th>
                                </tr>
                                <tr>
                                    <td><!-- busstop_no --></td>
                                    <td><!-- busstop_name --></td>
                                    <td><!-- busstop_new_name --></td>
                                    <td><!-- busstop_loc_name --></td>
                                    <td><!-- road_name --></td>
                                    <td><!-- latitude --></td>
                                    <td><!-- longtitude --></td>
                                    <td><button type="button" class="btn btn-danger">Delete</button></td>
                                </tr>
                              </table>
                        </form>
                    </div>
                </div>
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
    
