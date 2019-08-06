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
						<h1> Program Pengabdian pada Masyarakat
							<small>indikator 1.1</small>
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
							<form id="editform1" class="form-horizontal" action="<?= base_url() ?>Kuant_ppm_mahasiswa/insert" method="POST">
								<input type="hidden" name="id">
								<div class="row">
									<div class="col-md-6">

										<div class="form-group">
											<label class="col-md-4 control-label">Pegawai</label>
											<div class="col-md-8">
												<select class="form-control combo" style="width:100%;" name="pegawai" id="pegawai">
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
											<label class="col-md-4 control-label">Tema</label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa fa-book"></i>
													<input type='text' class="form-control" placeholder="Masukkan Tema" name="tema">
												</div>
											</div>
										</div>


										<div class="form-group">
											<label class="col-md-4 control-label">Judul </label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa fa-book"></i>
													<input type='text' class="form-control" placeholder="Masukkan Judul" name="judul">
												</div>
											</div>
										</div>


										<div class="form-group">
											<label class="col-md-4 control-label">Mahasiswa </label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa fa-book"></i>
													<input type='text' class="form-control" placeholder="Masukkan Mahasiswa" name="mahasiswa">
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
						<span class="caption-subject font-blue-hoki bold uppercase">Program Pengabdian pada Masyarakat oleh Mahasiswa</span>
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
								<th> Tema </th>
								<th> Judul </th>

								<th> Mahasiswa </th>
								<th> Tipe PPM </th>


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
            			$.getJSON('<?= base_url() ?>Kuant_ppm_mahasiswa/get?id=<?= $model->id ?>',
            			function(data){
               			$.each(data, function (index, value) {
               			$.each(value, function (i, v) {
                   			$('input[name='+i+']').val(v);
                   	
                       			$('#'+i+' option[value='+v+']').attr('selected','selected');
                   	

    			});
    			});
            			}
             			);


            			"> Koreksi </button> </i>
										<a class="btn red" href="<?= base_url() ?>Kuant_ppm_mahasiswa/hapus?id=<?= $model->id ?>"> <i class="fa fa-trash"></i> Hapus</a> </i> </td>


									<td><?= $model->pegawai ?></td>
									<td><?= $model->tahun ?></td>
									<td><?= $model->tema ?></td>
									<td><?= $model->judul ?></td>
									<td><?= $model->mahasiswa ?></td>

									<td><?= $model->tipe == 1 ? 'Penelitian' : ($model->tipe == 2 ? 'PKM' : 'Publikasi')  ?></td>

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

	<!-- BEGIN CORE PLUGINS -->
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/global/scripts/app.min.js" type="text/javascript"></script>
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN THEME LAYOUT SCRIPTS -->
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url() . "assets/" ?>theme/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
	<!-- END THEME LAYOUT SCRIPTS -->

	<script type="text/javascript">
   $(document).ready(function(){

      $("#pegawai").select2({
         ajax: { 
           url: '<?= base_url() ?>index.php/User/getUsers',
           type: "post",
           dataType: 'json',
           delay: 250,
           data: function (params) {
              return {
                searchTerm: params.term // search term
              };
           },
           processResults: function (response) {
              return {
                 results: response
              };
           },
           cache: true
         }
     });
   });
   </script>

</body>

</html>
