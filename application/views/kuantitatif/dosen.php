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
                            <h1>Dosen
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
                                    <span class="caption-subject font-blue-hoki bold uppercase">Form Kuantitatif Dosen</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form id="editform1" class="form-horizontal" method = "post" action="<?php echo base_url()?>kuant_dosen/insert">
                                <input type="hidden" id="id" name="id" value=""/>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Pegawai</label>
                                        <div class="col-md-4">
                                        <select class="form-control combo select2" style="width:100%;" name = "pegawai" id = "pegawai" onchange="javascript:show_detail_pegawai()">
                                        <?php
                                            if($masterpegawai != null){
                                            foreach ($masterpegawai as $pegawai) 
                                                { 
                                                    ?> 
                                                    <option value="<?php echo $pegawai->id?>"><?php echo $pegawai->nama ?></option>
                                                    <?php 
                                                }
                                            } ?>
                                        </select>
                                        </div>
                                        <label class="col-md-2 control-label">Jabatan</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control" placeholder="Masukkan Jabatan Dosen" name="jabatan" id="jabatan"> </div>
                                        </div>
                                       
                                    </div>                                    
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
                                        <label class="col-md-2 control-label">S2</label>
                                        <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Masukkan Pendidikan S2" id="s2" name="s2"> </div>
                                        <label class="col-md-2 control-label">S3</label>
                                        <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Masukkan Pendidikan S3" id="s3" name="s3"> </div>
                                      
                                    </div>
                                    <div class="form-group">                                       
                                        <label class="col-md-2 control-label">Serdos</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control" placeholder="Masukkan Serdos Dosen" id="serdos" name="serdos"> </div>
                                        </div>
                                        <label class="col-md-2 control-label">Sertifikat</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control" placeholder="Masukkan Sertifikat Dosen" id="sertifikat" name="sertifikat"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                      
                                        <label class="col-md-2 control-label">Mata Kuliah Diampu(PS)</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <textarea class="form-control" rows="5" cols="40" id="mk_diampu_ps" name="mk_diampu_ps"></textarea>
                                                </div>
                                        </div>
                                        <label class="col-md-2 control-label">Mata Kuliah Diampu(Non PS)</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                
                                            <textarea class="form-control" rows="5" cols="40" id="mk_diampu_nonps" name="mk_diampu_nonps"></textarea> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label">SKS Penelitian</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="number" class="form-control" placeholder="Masukkan jumlah SKS Penelitian " id="penelitian" name="penelitian"> </div>
                                        </div>
                                        <label class="col-md-2 control-label">SKS Pendidikan</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="number" class="form-control" placeholder="Masukkan Jumlah SKS Pendidikan" id="pendidikan" name="pendidikan"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">SKS Pengabdian</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="number" class="form-control" placeholder="Masukkan jumlah SKS Pengabdian" id="pengabdian" name="pengabdian"> </div>
                                        </div>
                                        
                                        <label class="col-md-2 control-label">SKS Tugas Tambahan</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="number" class="form-control" placeholder="Masukkan Jumlah SKS Tugas Tambahan" id="tugastambahan" name="tugastambahan"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <label class="col-md-2 control-label">Keahlian</label>
                                        <div class="col-md-4">
                                        <input type="text" class="form-control" placeholder="Masukkan Keahlian Dosen" id="keahlian" name="keahlian"> </div>

                                        <label class="col-md-2 control-label">Jumlah Artikel</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="number" class="form-control" placeholder="Masukkan Artikel Dosen" id="artikel" name="artikel"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jumlah Sitasi</label>
                                        <div class="col-md-4">
                                            <div class="input-icon right">
                                                <input type="number" class="form-control" placeholder="Masukkan Sitasi" id="sitasi" name="sitasi"> </div>
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
                                    <span class="caption-subject font-blue-hoki bold uppercase">Tabel Kuantitatif Dosen</span>
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
                                            <th> Pegawai</th>
                                            <th> Unit</th>
                                            <th> Tahun</th>
                                            <th> S2</th>
                                            <th> S3 </th>
                                            <th> keahlian </th>
                                            <th> Jabatan </th>
                                            <th> Serdos </th>
                                            <th> Sertifikat </th>
                                            <th> MK Diampu(PNS) </th>
                                            <th> MK Diampu(Non PNS) </th>
                                            <th> Pendidikan(SKS) </th>
                                            <th> Penelitian(SKS) </th>
                                            <th> Pengabdian(SKS) </th>
                                            <th> Tugas Tambahan(SKS) </th>
                                            <th> Artikel </th>
                                            <th> Sitasi </th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body">
                                    <?php 
                                                                $start = 0; 
                                                                foreach ($kuant_dosen as $dosen) 
                                                                { 
                                                                    ?> 
                                                                    <tr> 
                                                                        <td >
                                                                            <button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" onclick="javascript:showdetail('<?php echo $dosen->id ?>')"> Edit
                                                                            </button> 
                                                                            <button class="btn btn-xs red dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" onclick="javascript:hapus('<?php echo $dosen->id ?>')"> Hapus
                                                                            </button> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo ++$start ?> 
                                                                        </td> 
                                                                        <td> 
                                                                            <?php echo $dosen->pegawai ?> 
                                                                        </td> 
                                                                        <td> 
                                                                            <?php echo $dosen->unit ?> 
                                                                        </td> 
                                                                        <td> 
                                                                            <?php echo $dosen->tahun ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->s2 ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->s3 ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->keahlian ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->jabatan ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->serdos ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->sertifikat ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->mk_diampu_ps ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->mk_diampu_nonps ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->pendidikan ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->penelitian ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->pengabdian ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->tugastambahan ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->artikel ?> 
                                                                        </td>
                                                                        <td> 
                                                                            <?php echo $dosen->sitasi ?> 
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
                $("#pegawai").select2({
					 allowClear: false,
					 theme : 'classic',
                     width: "resolve"
                 });

                $('#reset').click(function(event) {
                    document.getElementById("id").value = "";                        
                    document.getElementById("pegawai").value = "";                      
                    document.getElementById("unit").value = "";                     
                    document.getElementById("tahun").value = "";
                    document.getElementById("s2").value = "";
                    document.getElementById("s3").value = "";
                    document.getElementById("keahlian").value = "";
                    document.getElementById("jabatan").value = "";
                    document.getElementById("serdos").value = "";
                    document.getElementById("sertifikat").value = "";
                    document.getElementById("mk_diampu_ps").value = "";
                    document.getElementById("mk_diampu_nonps").value = "";
                    document.getElementById("pendidikan").value = "";
                    document.getElementById("penelitian").value = "";
                    document.getElementById("pengabdian").value = "";
                    document.getElementById("tugastambahan").value = "";
                    document.getElementById("artikel").value = "";
                    document.getElementById("sitasi").value = "";
				});

                });

                function show_detail_pegawai(){
                    $.get("<?php echo base_url();?>Kuant_dosen/readpegawai_byid/"+document.getElementById("pegawai").value, function( data ) {
                        document.getElementById("jabatan").value = data[0]["nama_jafung"];
                    });
                }

                function hapus(id){
                    $.get("<?php echo base_url();?>Kuant_dosen/delete/"+id, function( data ) {
                            location.reload();
                    });
                }

                function showdetail(id){
                    $.get("<?php echo base_url();?>Kuant_dosen/read/"+id, function( data ) {            
                    document.getElementById("id").value = data["id"];                        
                    document.getElementById("pegawai").value = data["pegawai"];                      
                    document.getElementById("unit").value = data["unit"];                     
                    document.getElementById("tahun").value = data["tahun"];
                    document.getElementById("s2").value = data["s2"];
                    document.getElementById("s3").value = data["s3"];
                    document.getElementById("keahlian").value = data["keahlian"];
                    document.getElementById("jabatan").value = data["jabatan"];
                    document.getElementById("serdos").value = data["serdos"];
                    document.getElementById("sertifikat").value = data["sertifikat"];
                    document.getElementById("mk_diampu_ps").value = data["mk_diampu_ps"];
                    document.getElementById("mk_diampu_nonps").value = data["mk_diampu_nonps"];
                    document.getElementById("pendidikan").value = data["pendidikan"];
                    document.getElementById("penelitian").value = data["penelitian"];
                    document.getElementById("pengabdian").value = data["pengabdian"];
                    document.getElementById("tugastambahan").value = data["tugastambahan"];
                    document.getElementById("artikel").value = data["artikel"];
                    document.getElementById("sitasi").value = data["sitasi"];
                    });
                }
        </script>
    </body>

</html>
