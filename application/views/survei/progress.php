<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
  
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo workshop">
       
    <?php $this->load->view('template/header'); ?>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php //$this->load->view('template/sidebar'); ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content">
                <!-- BEGIN CONTENT BODY -->
                    <div class="page-content"  >
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head" >
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Survei
                                <small>list progress survei</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            <!-- BEGIN THEME PANEL -->
                            <div class="btn-group btn-theme-panel">
                                <a href="<?php echo "assets/"; ?>javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-settings"></i>
                                </a>
                            </div>
                            <!-- END THEME PANEL -->
                        </div>
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row" id="list_survei">
                        <div class="col-md-12">
                            <form class="form-horizontal " action="#">
                                <div class="portlet">
                                    <div class="portlet-body">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption font-dark">
                                             
                                                </div>
                                             			<div class="portlet-body form table-responsive">
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                    <thead>
                                                        <tr>
                                                          <th> No.</th>
                                                            <th> Kode Unit </th>
                                                            <th> Nama Unit </th>
                                                            <?php /*
                                                        
                                                            $survei= reset($list);
                                                             for ($i=1;$i<=74;$i++ ) {
                                                                 if (array_key_exists('I'.$i,$survei))
                                                               echo "<th>Ind - $i (%)</th>";
                                                             }
                                                             */
                                                          
                                                           ?>
                                                          <th> Progress % </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="upcoming_table_body">
														<?php 
												
                                                                $start = 0; 
                                                                foreach ($list as $survei) 
                                                                { 
                                                       
                                                                    ?> 
                                                                    <tr> 
                                                                        <td> 
                                                                            <?php echo ++$start ?> 
                                                                        </td> 
                                                                       
                                                                        <td> 
                                                                            <?php echo $survei['kode_unit'] ?> 
                                                                        </td> 
                                                                        <td> 
                                                                            <?php echo $survei['nama_unit']?> 
                                                                        </td>
                                                                       <?php 
                                                                      $x = 0;
                                                                      $count = 0;
                                                             for ($i=1;$i<=74;$i++ ) {
                                                               if (array_key_exists('I'.$i,$survei)) {
                                                                   $x+=(int) $survei['I'.$i];
                                                                   $count++;
                                                                //  echo "<td>".(int) $survei['I'.$i] ."  </td>";
                                                               }  
                                                             }
                                                                  if ($count ==0) {
                                                                    $count=1;
                                                                  }
                                                           ?>
                                                                      <td> <?= round($x/$count,2);?> </td>
                                                                       
                                                                     
                                                                    </tr> 
                                                              <?php } ?>
                                                                  
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                    <div  id="form_detail_header" style="display:none;">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-equalizer font-blue-hoki"></i>
                                <span class="caption-subject font-blue-hoki bold uppercase">Detail Survei</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form id="editform1" class="form-horizontal" action="Survei/insert" method="post">
                            <input type="hidden" id="id_survei" name="id_survei" value="">
                                <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Info Surveyor</h3>
                                </div>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Tanggal Survei</label>
                                        <div class="col-md-11">
                                            <div class="input-icon right">
                                                <i class="fa fa-calendar"></i>
                                                <input class="form-control form-control-inline date-picker" size="16" type="text" value="" id = "tanggal" name = "tanggal"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Unit</label>
                                        <div class="col-md-11">
                                            <div class="input-icon right">
                                                <select class="bs-select form-control" data-live-search="true" data-size="8" id="unit" name="unit">
                                                    <?php
                                                        if($master_unit != null){
                                                        foreach ($master_unit as $master_unit_row) 
                                                            { 
                                                                ?> 
                                                                <option value="<?php echo $master_unit_row->kode_unit?>"><?php echo $master_unit_row->nama_unit ?></option>
                                                                <?php 
                                                            }
                                                        } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Surveyor</label>
                                        <div class="col-md-11">
                                            <div class="input-icon right">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" placeholder="Right icon" name="surveyor" value = "<?php echo $surveyor ?>" disabled="true"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Status</label>
                                        <div class="col-md-11">
                                            <div class="input-icon right">
                                                <i class="fa fa-check"></i>
                                                <input type="text" class="form-control" placeholder="Right icon" value="Dikerjakan" disabled="true"> </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                                
                                <div class="modal-footer">
                                    
                                    <button type="button" class="btn red"  id="close" name="close" onclick="javascript:tutup()" >
                                        <i class="fa fa-close"></i> Close</button>
                                    <input class="btn green" type="submit" value="Save" id="save">
                                    <button type="button" class="btn blue"  id="next" name="next" onclick="javascript:next_button()" >
                                        <i class="fa fa-angle-right"></i> Next</button>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>

                    
                </div>
                                                        
                </div>
                <!-- END CONTENT BODY -->
		</div>
        </div>
	
        <!-- END CONTAINER -->
        <?php $this->load->view('template/footer') ?>
        <!-- BEGIN QUICK NAV -->
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
    
    </body>

</html>

