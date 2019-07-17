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
            <?php $this->load->view('template/sidebar'); ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                    <div class="page-content"  >
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head" style="display:none">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Survei
                                <small>list survei</small>
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
                    <div class="row" style="display:none">
                        <div class="col-md-12">
                            <form class="form-horizontal " action="#">
                                <div class="portlet">
                                    <div class="portlet-body">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title">
                                                <div class="caption font-dark">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject bold uppercase"> Survei </span>
                                                </div>
                                                <div  class="text-align-reverse" >
                                                                <a id="add_ruang" class="btn sbold green">
                                                                    <i class="fa fa-plus"></i> Add Survei </a>
                                                            </div>
                                            </div>
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                    <thead>
                                                        <tr>
                                                            <th> No </th>
                                                            <th> Tanggal Survei</th>
                                                            <th> Surveyor</th>
                                                            <th> Unit </th>
                                                            <th> Status </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="upcoming_table_body">
                                                        <?php 
                                                                $start = 0; 
                                                                foreach ($listsurvei as $survei) 
                                                                { 
                                                                    ?> 
                                                                    <tr> 
                                                                        <td> 
                                                                            <?php echo ++$start ?> 
                                                                        </td> 
                                                                        <td> 
                                                                            <?php echo $survei->tanggal ?> 
                                                                        </td> 
                                                                        <td> 
                                                                            <?php echo $survei->surveyor ?> 
                                                                        </td> 
                                                                        <td> 
                                                                            <?php echo $survei->unit ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $survei->status ?> 
                                                                        </td> 
                                                                    </tr> 
                                                                    <?php 
                                                                } 
                                                                ?> 
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
                    <div  id="form_detail">
                                                            <div class="portlet light bordered">
                                                                <div class="portlet-title">
                                                                    <div class="caption">
                                                                        <i class="icon-equalizer font-blue-hoki"></i>
                                                                        <span class="caption-subject font-blue-hoki bold uppercase">Detail Survei</span>
                                                                    </div>
                                                                </div>
                                                                <div class="portlet-body form">
                                                                    <!-- BEGIN FORM-->
                                                                    <form id="editform1" class="form-horizontal">
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-heading">
                                                                            <h3 class="panel-title">Info Surveyor</h3>
                                                                        </div>
                                                                        <div class="panel-body"> 
                                                                            <div class="form-group">
                                                                                <label class="col-md-1 control-label">Tanggal Survei</label>
                                                                                <div class="col-md-11">
                                                                                    <div class="input-icon right">
                                                                                        <i class="fa fa-microphone"></i>
                                                                                        <input type="text" class="form-control" placeholder="Right icon"> </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-1 control-label">Unit</label>
                                                                                <div class="col-md-11">
                                                                                    <div class="input-icon right">
                                                                                        <i class="fa fa-microphone"></i>
                                                                                        <input type="text" class="form-control" placeholder="Right icon"> </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-1 control-label">Surveyor</label>
                                                                                <div class="col-md-11">
                                                                                    <div class="input-icon right">
                                                                                        <i class="fa fa-microphone"></i>
                                                                                        <input type="text" class="form-control" placeholder="Right icon"> </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-1 control-label">Status</label>
                                                                                <div class="col-md-11">
                                                                                    <div class="input-icon right">
                                                                                        <i class="fa fa-microphone"></i>
                                                                                        <input type="text" class="form-control" placeholder="Right icon"> </div>
                                                                                </div>
                                                                            </div>
                                                                         </div>
                                                                    </div>
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
                                                                                        <span> Unit pengelola program studi/Prodi  telah melakukan analisis SWOT </span>
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
                                                                                        <span> A. Kondisi Esternal</span>
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
                                                                                        <span> Konsistensi dengan hasil analisis SWOT dan/atau analisis lain serta rencana pengembangan ke depan. </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="panel-group accordion scrollable" id="accordion1">
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading">
                                                                                    <h4 class="panel-title">
                                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1"> Sub Indikator 1 </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapse_1" class="panel-collapse in">
                                                                                    <div class="panel-body">
                                                                                        <div class="form-group">
                                                                                            <label class="col-md-6 ">Prodi mengidentifikasi kondisi lingkungan yang relevan secara komprehensif dan strategis</label>
                                                                                            <div class="col-md-6">
                                                                                                <div class="mt-radio-inline">
                                                                                                    <label class="mt-radio">
                                                                                                        <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""> Ya
                                                                                                        <span></span>
                                                                                                    </label>
                                                                                                    <label class="mt-radio">
                                                                                                        <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"> Tidak
                                                                                                        <span></span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="col-md-6 ">Prodi mengidentifikasi kondisi lingkungan yang relevan secara komprehensif dan strategis</label>
                                                                                            <div class="col-md-6">
                                                                                                <div class="mt-radio-inline">
                                                                                                    <label class="mt-radio">
                                                                                                        <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""> Ya
                                                                                                        <span></span>
                                                                                                    </label>
                                                                                                    <label class="mt-radio">
                                                                                                        <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"> Tidak
                                                                                                        <span></span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading">
                                                                                    <h4 class="panel-title">
                                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2"> Sub Indikator 2 </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapse_2" class="panel-collapse collapse">
                                                                                    <div class="panel-body" style=" overflow-y:auto;">
                                                                                        <p> Menetapkan posisi relatif program studi terhadap lingkungannya,
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading">
                                                                                    <h4 class="panel-title">
                                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3"> Sub Indikator 3 </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapse_3" class="panel-collapse collapse">
                                                                                    <div class="panel-body">
                                                                                        <p> Menggunakan hasil identifikasi dan posisi yang ditetapkan untuk melakukan analisis

                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="panel panel-default">
                                                                                <div class="panel-heading">
                                                                                    <h4 class="panel-title">
                                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4"> Sub Indikator 4 </a>
                                                                                    </h4>
                                                                                </div>
                                                                                <div id="collapse_4" class="panel-collapse collapse">
                                                                                    <div class="panel-body">
                                                                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                                                                        <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                                                                            Brunch 3 wolf moon tempor. </p>
                                                                                        <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                                                                        <p>
                                                                                            <a class="btn red" href="ui_tabs_accordions_navs.html#collapse_4" target="_blank"> Activate this section via URL </a>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" id="id_workshop" name="id_workshop" value="">
                                                                        
                                                                        <div class="modal-footer">
                                                                        <button type="button" class="btn grey-salsa btn-outline" data-dismiss="modal"  onclick="javascript:tutup()"><i class="fa fa-close">Close</i></button>
                                                                        <!-- <button type="button" class="btn green" onclick="javascript:update()" id="save_changes" name="save_changes">
                                                                            <i class="fa fa-edit">Save changes</i> -->
                                                                            <input class="btn green" type="submit" value="Save Change">
                                                                        <!-- <button type="button" class="btn green" onclick="javascript:submit()" id="addnew" name="addnew">
                                                                            <i class="fa fa-plus">Add New</i> -->
                                                                        <!-- <a href="" class="btn btn-default"> Save changes</a>  -->
                                                                        <!-- </button> -->
                                                                            <button type="button" class="btn red" onclick="javascript:delete_laporan()" id="delete_button" name="delete_button" >
                                                                                <i class="fa fa-trash"></i> Delete</button>
                                                                        </div>
                                                                    </form>
                                                                    <!-- END FORM-->
                                                                </div>
                                                            </div>
                                                        </div>
                </div>
                
                <!-- END CONTENT BODY -->
			</div>
	
        <!-- END CONTAINER -->
        <?php $this->load->view('template/footer') ?>
        <!-- BEGIN QUICK NAV -->
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <script>
                

        </script>
    </body>

</html>