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
                        <h1> Penelitian dan Pengabdian pada Masyarakat
                            
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
                                <span class="caption-subject font-blue-hoki bold uppercase">Form Penelitian dan Pengabdian pada Masyarakat</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form id="editform1" class="form-horizontal" action="<?=base_url()?>Kuant_ppm/insert" method="POST">
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
                                            <label class="col-md-4 control-label">Tahun</label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-calendar"></i>
                                                    <select id="tahun" class="form-control" placeholder="Masukkan Tahun Survei" name="tahun">
                                                        <option value="2019" selected>2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Tipe PPM</label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-microscope"></i>
                                                    <select id='tipe' class="form-control" placeholder="Masukkan Jenis PPM" name="tipe">
                                                        <option value="1">Penelitian</option>
                                                        <option value="2">PKM</option>
                                                        <option value="3">Publikasi</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Jumlah Kegiatan</label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-users"></i>
                                                    <input type='number' class="form-control" placeholder="Masukkan Jumlah PPM" name="jumlah">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Sumber Pembiayaan </label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">
                                                    <i class="fa fa-handshake"></i>
                                                    <input type='text' class="form-control" placeholder="Masukkan Sumber Pembiayaan" name="jenis">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Subyek PPM</label>
                                            <div class="col-md-8">
                                                <div class="input-icon right">

                                                    <select id='subjek' class="form-control" placeholder="Masukkan  Subyek PPM" name="subjek">
                                                        <option value="1">Dosen</option>
                                                        <option value="2">Mahasiswa</option>

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
                        <span class="caption-subject font-blue-hoki bold uppercase">Penelitian dan Pengabdian pada Masyarakat</span>
                    </div>
                </div>

                <div class="portlet-body form table-responsive">
                    <!-- BEGIN Tabel-->
                    <table class="table table-striped table-bordered table-responsive table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th> Tahun </th>
                                <th> Tipe PPM </th>
                                <th> Jumlah </th>

                                <th> Sumber Pembiayaan </th>
                                <th> Subyek PPM </th>


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
                    $.getJSON('<?= base_url() ?>Kuant_ppm/get?id=<?= $model->id ?>',
                    function(data){
                    $.each(data, function (index, value) {
                    $.each(value, function (i, v) {
                        $('input[name='+i+']').val(v);
                    
                         //  $('#'+i+' option[value='+v+']').attr('selected','selected');
                    

            });
            });
                    }
                    );


                    "> Koreksi </button> </i>
                                     <a class="btn red" href="<?= base_url() ?>Kuant_ppm/hapus?id=<?= $model->id ?> &id_survei=<?=$id_survei ?>&id_indikator=<?=$id_indikator ?> "> <i class="fa fa-trash"></i> Hapus</a> </i> </td>


                                    <td><?= $model->tahun ?></td>
                                    <td><?= $model->tipe == 1 ? 'Penelitian' : ($model->tipe == 2 ? 'PKM' : 'Publikasi')  ?></td>
                                    <td><?= $model->jumlah ?></td>
                                    <td><?= $model->jenis ?></td>
                                    <td><?= $model->subjek == 1 ? 'Dosen' : 'Mahasiswa' ?></td>
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
        
        $('#next_body_detail').click(function(event) {
            window.location.href = "<?php echo base_url();?>Survei/indikator/" + document.getElementById("id_survei").value +"/" + document.getElementById("id_next_indikator").value +"/" + <?php echo $finish ?>;
        });
        
        $('#back_body_detail').click(function(event) {
            window.location.href = "<?php echo base_url();?>Survei/indikator/" + document.getElementById("id_survei").value +"/" + document.getElementById("id_back_indikator").value+"/" + <?php echo $finish ?>;
        });
        
        $('#close').click(function(event) {
            window.location.href = "<?php echo base_url();?>";
        }); 

        </script>

</body>

</html>
