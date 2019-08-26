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
                            <h1>Dana
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
                                    <span class="caption-subject font-blue-hoki bold uppercase">Form Kuantitatif Dana</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="editform1" class="form-horizontal" method = "post" action="<?php echo base_url()?>kuant_dana/insert">
                                <input type="hidden" id="id" name="id" value=""/>                                 
                                    <div class="form-group">
                                    <label class="col-md-2 control-label">Tahun</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control" placeholder="Masukkan Tahun Survei" id="tahun" name="tahun"> </div>
                                        </div>
                                        <label class="col-md-2 control-label">Unit</label>
                                        <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Masukkan Unit" id="unit" name="unit"> </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jenis</label>
                                        <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Masukkan Jenis Dana" id="jenis" name="jenis"> </div>
                                        <label class="col-md-2 control-label">Nominal UPPS</label>
                                        <div class="col-md-4">
                                        <input type="number" class="form-control" placeholder="Masukkan Nominal UPPS" id="nominal_upps" name="nominal_upps"> </div>
                                      
                                    </div>
                                    <div class="form-group">                                       
                                        <label class="col-md-2 control-label">Nominal PS</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control" placeholder="Masukkan Nominal PS" id="nominal_ps" name="nominal_ps"> </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn green"  id="simpan" name="simpan" >
                                            <i class="fa fa-plus"></i> Simpan</button>
                                        <button type="button" class="btn red"  id="reset" name="reset" >
                                            <i class="fa fa-trash"></i> Reset</button>
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
                                    <span class="caption-subject font-blue-hoki bold uppercase">Tabel Kuantitatif Dana</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN Tabel-->
                                <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th> Aksi </th>
                                            <th> No </th>
                                            <th> Unit</th>
                                            <th> Tahun</th>
                                            <th> Jenis</th>
                                            <th> Nominal UPPS </th>
                                            <th> Nominal PS </th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                    <?php 
                                                                $start = 0; 
                                                                foreach ($kuant_dana as $dana) 
                                                                { 
                                                                    ?> 
                                                                    <tr> 
                                                                        <td >
                                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" onclick="javascript:showdetail('<?php echo $dana->id ?>')"> Edit
                                                                            </button> 
                                                                            <button class="btn btn-xs red dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" onclick="javascript:hapus('<?php echo $dana->id ?>')"> Hapus
                                                                            </button> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo ++$start ?> 
                                                                        </td> 
                                                                        <td> 
                                                                            <?php echo $dana->unit ?> 
                                                                        </td> 
                                                                        <td> 
                                                                            <?php echo $dana->tahun ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dana->jenis ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dana->nominal_upps ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dana->nominal_ps ?> 
                                                                        </td>
                                                                        
                                                                    </tr> 
                                                                    <?php 
                                                                } 
                                                                ?> 
                                        </tbody>
                                    </table>
                                    </div>
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
        <script>
            $(document).ready(function() {
                // $(".combo").select2({
                //     allowClear: true,
                //     width: "resolve"
                // });

                $('#reset').click(function(event) {
                    document.getElementById("id").value = "";                           
                    document.getElementById("unit").value = "";                     
                    document.getElementById("tahun").value = "";
                    document.getElementById("jenis").value = "";
                    document.getElementById("nominal_upps").value = "";
                    document.getElementById("nominal_ps").value = "";
				});

                });

                function hapus(id){
                    $.get("<?php echo base_url();?>Kuant_dana/delete/"+id, function( data ) {
                            location.reload();
                    });
                }

                function showdetail(id){
                    $.get("<?php echo base_url();?>Kuant_dana/read/"+id, function( data ) {            
                    document.getElementById("id").value = data["id"];                                
                    document.getElementById("unit").value = data["unit"];                     
                    document.getElementById("tahun").value = data["tahun"];
                    document.getElementById("jenis").value = data["jenis"];
                    document.getElementById("nominal_upps").value = data["nominal_upps"];
                    document.getElementById("nominal_ps").value = data["nominal_ps"];
                    });
                }
        </script>
    </body>

</html>