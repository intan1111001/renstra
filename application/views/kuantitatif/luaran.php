<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>
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
        <?php //$this->load->view('template/sidebar');
        ?>
        <!-- BEGIN CONTENT -->
        <div class="page-content">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1> Luaran
                            
                        </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                    <!-- BEGIN PAGE TOOLBAR -->
                    <div class="page-toolbar">
                        <!-- BEGIN THEME PANEL -->
                        <div class="btn-group btn-theme-panel">
                            <a href="<?php echo 'assets/'; ?>javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-settings"></i>
                            </a>
                        </div>
                        <!-- END THEME PANEL -->
                    </div>
                    <!-- END PAGE TOOLBAR -->
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE BASE CONTENT -->
                <div id="form_detail_header">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-line-chart"></i>
                                <span class="caption-subject font-blue-hoki bold uppercase">Form Program Pengabdian pada Masyarakat oleh Mahasiswa</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form id="editform1" class="form-horizontal" action="<?= base_url() ?>Kuant_luaran/insert" method="POST">
                                <input type="hidden" name="id">
                                <input type="hidden" id="id_indikator" name="id_indikator" value="<?php echo $id_indikator?>">
                                <input type="hidden" id="id_survei" name="id_survei" value="<?php echo $id_survei?>">
                                <input type="hidden" id="id_next_indikator" name="id_next_indikator" value="<?php echo $id_next_indikator?>">
                                <input type="hidden" id="id_back_indikator" name="id_back_indikator" value="<?php echo $id_back_indikator?>">
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-4">
                                        <div class="mt-element-ribbon bg-grey-steel">
                                            <div class="ribbon ribbon-right ribbon-round ribbon-color-warning ribbon-shadow uppercase">Capaian</div>
                                            <p class="ribbon-content"><?php echo $capaian[0]->capaian ?></p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-4">
                                        <div class="mt-element-ribbon bg-grey-steel">
                                            <div class="ribbon ribbon-right ribbon-round ribbon-color-success ribbon-shadow uppercase">Elemen</div>
                                            <p class="ribbon-content"><?php echo $capaian[0]->jenis ?></p>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="mt-element-ribbon bg-grey-steel">
                                            <div class="ribbon ribbon-right ribbon-round ribbon-color-info ribbon-shadow uppercase">Indikator</div>
                                            <p class="ribbon-content"><?php echo $capaian[0]->indikator_jenis ?></p>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Dosen</label>
                                            <div class="col-md-8">
                                                <select class="form-control combo" style="width:100%;" name="pegawai" id="pegawai">
                                                <?php
                                                if ($masterpegawai != null) {
                                                    foreach ($masterpegawai as $pegawai) {
                                                        ?>
                                                    <option value="<?php echo $pegawai->id?>"><?php echo $pegawai->nama ?></option>
                                                        <?php
                                                    }
                                                } ?>
                                                </select>
                                            </div>
										</div>
										<div class="form-group">
									
								
									<label class="col-md-4 control-label">Unit</label>
										<div class="col-md-8">
											<div class="input-icon right">
												<i class="fa fa-certificate"></i>
												<input type="hidden" name="unit" class="form-control" id="unit" value="<?php echo $survei->unit; ?>">

												<input type="text" name="unit_name" class="form-control" id="unit_name" disabled value="<?php echo $unit_name; ?>">
											</div>
										</div>
				  
								</div>


                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Nama luaran</label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-book"></i>
                                                    <input type="text" name="nama"  class="form-control" id="nama" placeholder="Masukkan Nama luaran">
                                                </div>
                                            </div>
                                        </div>

                                           <div class="form-group">
                                            <label class="col-md-4 control-label">Judul luaran</label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-book"></i>
                                                    <input type="text" name="judul"  class="form-control" id="judul" placeholder="Masukkan Judul luaran">
                                                </div>
                                            </div>
                                        </div>
                         <div class="form-group">
                                            <label class="col-md-4 control-label">Tipe luaran</label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-book"></i>
                                                    <input type="text" name="tipe" class="form-control" id="tipe" placeholder="Masukkan Tipe luaran">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Tahun</label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-calendar"></i>
                                                    <select id="tahun" class="form-control" placeholder="Masukkan Tahun luaran" name="tahun">
                                                        <option value="2019" selected>2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Subjek luaran</label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-user"></i>
                                                    <select id='subjek' class="form-control" placeholder="Masukkan Subjek luaran" name="subjek">
                                                        <option value="1">Mahasiswa</option>
                                                        <option value="2">Dosen</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>








                                    </div>




                                </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn green" id="btn_submit" name="btn_submit" onclick="


                                        ">
                                <i class="fa fa-plus"></i> Simpan</button>
                            <button type="cancel" class="btn red" id="btn_hapus" name="btn_hapus">

                                Reset</button>
                        </div>
                    </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>

        </div>
        
        <div id="form_detail_header">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-line-chart"></i>
                        <span class="caption-subject font-blue-hoki bold uppercase">luaran Dosen</span>
                    </div>
                </div>

                <div class="portlet-body form table-responsive">
                    <!-- BEGIN Tabel-->
                    <table class="table table-striped table-bordered table-responsive table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th> Dosen </th>
                                <th> Tahun </th>
                                <th> Nama luaran </th>
                                <th> Judul luaran </th>
                                <th> Tipe luaran </th>

                                <th> Subyek </th>


                            </tr>
                        </thead>
                        <tbody id="table_body">
                            <?php
                            $start = 0;
                            foreach ($list as $model) {
                                ?>
                                <tr>

                                    <td>
                                        <button class="btn blue" href="koreksi?id=<?= $model->id ?>" id="btn_koreksi" onclick="
                        $.getJSON('<?= base_url() ?>Kuant_luaran/get?id=<?= $model->id ?>',
                        function(data){
                        $.each(data, function (i, v) {

                            $('input[name='+i+']').val(v);
                       


                });
                        }
                        );


                        "> Koreksi </button> </i>
                                     <a class="btn red" href="<?= base_url() ?>Kuant_luaran/hapus?id=<?= $model->id ?> &id_survei=<?=$id_survei ?>&id_indikator=<?=$id_indikator ?> "> <i class="fa fa-trash"></i> Hapus</a> </i> </td>


                                    <td><?= $model->pegawai ?></td>
                                    <td><?= $model->tahun ?></td>

                                    <td><?= $model->nama ?></td>
                                    <td><?= $model->judul ?></td>
                                     <td><?= $model->tipe ?></td>

                                    <td><?= $model->subjek == 1 ? 'Mahasiswa' : 'Dosen' ?></td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- END Table-->
                    <div class="modal-footer">
                                <button type="button" class="btn red"  id="close" name="close" >
                        <i class="fa fa-close"></i> Close</button>
                    <button type="button" class="btn blue"  id="back_body_detail" name="back_body_detail" >
                        <i class="fa fa-angle-left"></i> Back</button>
                    <?php if ($last_indikator == 0) {?>                     
                        <button type="button" class="btn blue"  id="next_body_detail" name="next_body_detail" >
                            <i class="fa fa-angle-right"></i> Next</button>
                            
                    <?php } ?>
                                </div>
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
                $("#pegawai").select2({
                     allowClear: false,
                     theme : 'classic',
                     width: "resolve"
                
                 });
         })
		 $('#next_body_detail').click(function(event) {
            window.location.href = "<?php echo base_url();?>Survei/indikator/" + document.getElementById("id_survei").value +"/" + document.getElementById("id_next_indikator").value +"/" + <?php echo $finish ?>;
        });
        
        $('#back_body_detail').click(function(event) {
            window.location.href = "<?php echo base_url();?>Survei/indikator/" + document.getElementById("id_survei").value +"/" + document.getElementById("id_back_indikator").value+"/" + <?php echo $finish ?>;
		});
        
        $('#close').click(function(event) {
            window.location.href = "<?php echo base_url();?>";



    </script>

</body>

</html>
