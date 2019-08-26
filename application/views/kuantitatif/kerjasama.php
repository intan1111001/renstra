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
                            <h1>Kerjasama
                                <small>indikator </small>
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
                    <div  id="form_detail_header">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-equalizer font-blue-hoki"></i>
                                    <span class="caption-subject font-blue-hoki bold uppercase">Form Kerjasama</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="editform1" class="form-horizontal">

                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Lembaga</label>
                                        <div class="col-md-11">
                                            <div class="input-icon right">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" placeholder="Masukkan lembaga yang terlibat dalam kerjasama"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Tingkat</label>
                                        <div class="col-md-11">
                                            
                                            <select class="form-control">
                                              <option value="Internasional">Internasional</option>
                                              <option value="Nasional">Nasional</option>
                                              <option value="Lokal">Lokal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Judul</label>
                                        <div class="col-md-11">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control" placeholder="Masukkan Judul Kegiatan Kerjasama"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-1 control-label">Manfaat</label>
                                        <div class="col-md-11">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control" placeholder="Masukkan Manfaat Kerjasama"> </div>
                                        </div>
                                    </div>
                                    

                                    <div class="modal-footer">
                                        <button type="button" class="btn green"  id="next_body_detail" name="next_body_detail" >
                                            <i class="fa fa-plus"></i> Tambah</button>
                                        <button type="button" class="btn red"  id="next_body_detail" name="next_body_detail" >
                                            <i class="fa fa-trash"></i> Hapus</button>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                    </div>
                    <div  id="form_detail_header">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-equalizer font-blue-hoki"></i>
                                    <span class="caption-subject font-blue-hoki bold uppercase">Tabel Kerjasama</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN Tabel-->
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th> No </th>
                                            <th> Lembaga Mitra</th>
                                            <th> Tingkat</th>
                                            <th> Judul </th>
                                            <th> Manfaat </th>
                                            <th> Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
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
                                                    <td> 
                                                        <?php echo $survei->status ?> 
                                                    </td> 
                                                </tr> 
                                                <?php 
                                            } 
                                            ?> 
                                        </tbody>
                                    </table>
                                <!-- END Table-->
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