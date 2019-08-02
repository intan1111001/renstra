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
<head>
        <meta charset="utf-8" />
        <title>Metronic Admin Theme #4 | Tabs, Accordions & Navs</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for metronic and bootstrap custom navbars, tabs, pills, accordions and resizable tabs based on bootstrap-tabdrop plugin" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()."assets/"; ?>theme/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()."assets/"; ?>theme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()."assets/"; ?>theme/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()."assets/"; ?>theme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url()."assets/"; ?>theme/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url()."assets/"; ?>theme/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url()."assets/"; ?>theme/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()."assets/"; ?>theme/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url()."assets/"; ?>theme/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
<html lang="en">
    <!--<![endif]-->
  
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo workshop">
       
    <?php $this->load->view('template/header'); ?>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <?php $this->load->view('template/sidebar'); ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                    <div class="page-content"  >
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head" >
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Detil Survei
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
                    <div  id="form_detail_body" >
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-equalizer font-blue-hoki"></i>
                                    <span class="caption-subject font-blue-hoki bold uppercase">Detail Survei</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                            <form id="editform1" class="form-horizontal" action="<?php echo base_url()?>Survei/insert_detail" method="post">
                                <input type="hidden" id="id_indikator" name="id_indikator" value="<?php echo $id_indikator?>">
                                <input type="hidden" id="id_survei" name="id_survei" value="<?php echo $id_survei?>">
                                <input type="hidden" id="id_next_indikator" name="id_next_indikator" value="<?php echo $id_next_indikator?>">
                                <input type="hidden" id="id_back_indikator" name="id_back_indikator" value="<?php echo $id_back_indikator?>">
                                <div class="row margin-bottom-20">
                                        <div class="col-lg-4 col-md-6" >
                                            <div class="portlet light" style="background: aliceblue;">
                                                <div class="card-icon">
                                                    <i class="icon-user-follow font-red-sunglo theme-font"></i>
                                                </div>
                                                <div class="card-title">
                                                    <span> Capaian</span>
                                                </div>
                                                <div class="card-desc">
                                                    <span> <?php echo $capaian[0]->capaian?> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="portlet light" style="background: aliceblue;">
                                                <div class="card-icon">
                                                    <i class="icon-trophy font-green-haze theme-font"></i>
                                                </div>
                                                <div class="card-title">
                                                    <span> Elemen </span>
                                                </div>
                                                <div class="card-desc">
                                                    <span> <?php echo $capaian[0]->jenis ?> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="portlet light" style="background: aliceblue;">
                                                <div class="card-icon">
                                                    <i class="icon-basket font-purple-wisteria theme-font"></i>
                                                </div>
                                                <div class="card-title">
                                                    <span> Indikator </span>
                                                </div>
                                                <div class="card-desc">
                                                    <span> <?php echo $capaian[0]->indikator_jenis?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel-group accordion scrollable" id="accordion1">
                                            <?php $start = 1;
                                            foreach($subindikator as $subindikator_row){?> 
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_<?php echo $start?>"> Sub Indikator <?php echo $start?> </a>
                                                    </h4>
                                                </div>
                                            <div id="collapse_<?php echo $start?>" <?php if($start == 1){?> class="panel-collapse in" <?php } else {?> class="panel-collapse collapse" <?php }?>>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-md-6 "><?php echo $subindikator_row->jenis?></label>
                                                            <div class="col-md-6">
                                                                <div class="mt-radio-inline">
                                                                    <label class="mt-radio">
                                                                        <input type="radio" name="radio_<?php echo $subindikator_row->id?>" id="optionsRadios4" value="1" <?php if($subindikator_row->dilakukan ==1){?> checked <?php } ?>> Ya
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="mt-radio">
                                                                        <input type="radio" name="radio_<?php echo $subindikator_row->id?>" id="optionsRadios5" value="0" <?php if($subindikator_row->dilakukan ==0){?> checked <?php } ?>> Tidak
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <div class="portlet light bordered">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="icon-social-dribbble font-green"></i>
                                                                        <span class="caption-subject font-green bold uppercase">Komponen</span>
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                    <div class="table-scrollable">
                                                                        <table class="table table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th> # </th>
                                                                                    <th> Komponen </th>
                                                                                    <th> Ketersediaan </th>
                                                                                    <th> Kesesuaian </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php 
                                                                                    $startkomponen = 1;
                                                                                    foreach($komponen as $komponen_row){
                                                                                        if($komponen_row->subindikator_id == $subindikator_row->id){?> 
                                                                                    <tr>
                                                                                        <td> <?php echo $startkomponen ?></td>
                                                                                        <td> <?php echo $komponen_row->jenis ?></td>
                                                                                        <td>
                                                                                        <div class="mt-radio-inline">
                                                                                                <label class="mt-radio">
                                                                                                    <input type="radio" name="sedia_<?php echo $komponen_row->id ?>" id="sedia_ada_<?php echo $komponen_row->id ?>" value="1" <?php if($komponen_row->ketersediaan ==1){?> checked <?php } ?>> Ada
                                                                                                    <span></span>
                                                                                                </label>
                                                                                                <label class="mt-radio">
                                                                                                    <input type="radio" name="sedia_<?php echo $komponen_row->id ?>" id="sedia_tidak_<?php echo $komponen_row->jenis ?>" value="0" <?php if($komponen_row->ketersediaan ==0){?> checked <?php } ?>> Tidak
                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </div> 
                                                                                        </td>
                                                                                        <td>  <div class="mt-radio-inline">
                                                                                                <label class="mt-radio">
                                                                                                    <input type="radio" name="sesuai_<?php echo $komponen_row->id ?>" id="sesuai_ya_<?php echo $komponen_row->id ?>" value="1" <?php if($komponen_row->kesesuaian ==1){?> checked <?php } ?>> iya
                                                                                                    <span></span>
                                                                                                </label>
                                                                                                <label class="mt-radio">
                                                                                                    <input type="radio" name="sesuai_<?php echo $komponen_row->id ?>" id="sesuai_tidak_<?php echo $komponen_row->id ?>" value="0" <?php if($komponen_row->kesesuaian ==0){?> checked <?php } ?>> Tidak
                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </div> 
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php $startkomponen = $startkomponen + 1;}
                                                                            } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $start = $start + 1; } ?>
                                    </div>
                                    <div class="modal-footer">
                                <!-- <button type="button" class="btn grey-salsa"  onclick="javascript:tutup()">
                                <i class="fa fa-close">Close</i> 
                                </button>-->
                                    <button type="button" class="btn red"  id="close" name="close" >
                                        <i class="fa fa-close"></i> Close</button>
                                    <button type="button" class="btn blue"  id="back_body_detail" name="back_body_detail" >
                                        <i class="fa fa-angle-left"></i> Back</button>
                                    <?php if($finish == 0){?>    
                                        <input class="btn green" type="submit" value="Save"> 
                                    <?php }?>
                                    <?php if($last_indikator == 0){?>                     
                                        <button type="button" class="btn blue"  id="next_body_detail" name="next_body_detail" >
                                            <i class="fa fa-angle-right"></i> Next</button>
                                        </div>
                                    <?php }else{ ?>
                                        <?php if($finish == 0){?> 
                                        <input type="button"  class="btn green" id="Finish" value="Finish"> 
                                        <?php }
                                        } ?>
                                
                                </form>
		</div>
        </div>
	
        <!-- END CONTAINER -->
        <?php $this->load->view('template/footer') ?>

 <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url()."assets/" ?>theme/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()."assets/" ?>theme/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()."assets/" ?>theme/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()."assets/" ?>theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()."assets/" ?>theme/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()."assets/" ?>theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url()."assets/" ?>theme/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url()."assets/" ?>theme/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url()."assets/" ?>theme/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()."assets/" ?>theme/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()."assets/" ?>theme/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()."assets/" ?>theme/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

        <!-- BEGIN QUICK NAV -->
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <script>
                $('#next_body_detail').click(function(event) {
                    window.location.href = "<?php echo base_url();?>Survei/indikator/" + document.getElementById("id_survei").value +"/" + document.getElementById("id_next_indikator").value +"/" + <?php echo $finish ?>;
                });
                
                $('#back_body_detail').click(function(event) {
                    window.location.href = "<?php echo base_url();?>Survei/indikator/" + document.getElementById("id_survei").value +"/" + document.getElementById("id_back_indikator").value+"/" + <?php echo $finish ?>;
				});

                $('#Finish').click(function(event) {
                    window.location.href = "<?php echo base_url();?>Survei/submit/" + document.getElementById("id_survei").value;
				});
                
                $('#close').click(function(event) {
                    window.location.href = "<?php echo base_url();?>";
				});

        </script>
    </body>

</html>