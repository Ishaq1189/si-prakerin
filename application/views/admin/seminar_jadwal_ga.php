<?php $section = isset($_GET['section']) ? $_GET['section'] : null ?>
<!DOCTYPE html>
<html>

<!-- Head PHP -->
<?php $this->load->view('admin/_partials/header.php'); ?>

<body>
<!-- Sidenav PHP-->
<?php $this->load->view('admin/_partials/sidenav.php'); ?>
<!-- Main content -->
<div class="main-content" id="panel">
	<!-- Topnav PHP-->
	<?php $this->load->view('admin/_partials/topnav.php');
	?>
	<!-- Header -->
	<!-- BreadCrumb PHP -->
	<?php $this->load->view('admin/_partials/breadcrumb.php');
	?>
	<!-- Page content -->
	<div class="container-fluid mt--6">
		<!-- Card -->
		<div class="header-body">
			<!-- Card stats -->
			<div class="row">
				<div class="col-md-12 col-lg-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<ul class="nav nav-pills">
								<li class="nav-item">
									<a href="<?php echo site_url('seminar?m=kelola&section=tempat') ?>"
									   class="nav-link <?php echo $section == 'tempat' ? 'active' : null ?>">Tempat</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo site_url('seminar?m=kelola&section=waktu') ?>"
									   class="nav-link <?php echo $section == 'waktu' ? 'active' : null ?>">Waktu</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo site_url('seminar?m=kelola&section=penguji') ?>"
									   class="nav-link <?php echo $section == 'penguji' ? 'active' : null ?>">Penguji</a>
								</li>
								<!--								<li class="nav-item">-->
								<!--									<a href="-->
								<?php //echo site_url('seminar?m=kelola&section=generate') ?><!--"-->
								<!--									   class="nav-link -->
								<?php //echo $section == 'generate' ? 'active' : null ?><!--">Generate-->
								<!--										Penguji dan tempat</a>-->
								<!--								</li>-->
								<li class="nav-item">
									<a href="<?php echo site_url('seminar?m=kelola&section=jadwal') ?>"
									   class="nav-link <?php echo $section == 'jadwal' ? 'active' : null ?>">Buat Jadwal
										Sidang</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<?php if (isset($section)): ?>
							<?php switch ($section):
							case 'tempat': ?>
								<div class="row">
									<div class="col-12 d-flex justify-content-between">
										<h3 class="m-0 p-0 text-primary">Kelola Tempat Seminar</h3>
										<button id="button-tempat" class="btn btn-sm btn-primary"
												data-toggle="collapse" data-target="#form-ruangan"
												aria-expanded="false" aria-controls="form-ruangan">Tambah
										</button>
									</div>
								</div>
								<div class="row d-flex justify-content-end mt-3">
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group collapse" id="form-ruangan">
											<input class="form-control form-control-sm" name="ruangan" value=""
												   placeholder="Masukkan Nama Ruangan"/>
										</div>
									</div>
								</div>
								<div class="table-responsive py-4">
									<table class="table table-flush" id="datatable-tempat">
										<thead class="thead-light">
										<tr role="row">
											<th>No</th>
											<th>Ruangan</th>
											<th>Aksi</th>
										</tr>
										</thead>
										<tfoot>
										<tr>
											<th>No</th>
											<th>Ruangan</th>
											<th>Aksi</th>
										</tr>
										</tfoot>
										<tbody>

										</tbody>
									</table>
								</div>
								<?php break ?>
							<?php
							case 'waktu': ?>
								<h3 class="m-0 p-0 text-primary">Kelola Waktu Seminar</h3>
								<div class="row">
									<div class="col-12 d-flex justify-content-between">
										<h5>Tanggal dan Hari</h5>
										<button id="button-tanggal" data-target="#form-tanggal"
												data-toggle="collapse" aria-expanded="false"
												aria-controls="form-tanggal" class="btn btn-sm btn-success">
											Tambah
										</button>
									</div>
								</div>
								<div class="row d-flex justify-content-end mt-3">
									<div class="col-lg-4 col-md-4 col-sm-12">
										<div class="form-group collapse" id="form-tanggal">
											<div class="row">
												<div class="col-4">
													<input class="form-control form-control-sm" name="hari"
														   value=""/>
												</div>
												<div class="col-auto">
													<input id="tanggal-datepicker"
														   class="form-control form-control-sm" type="text"
														   name="tanggal" value=""
														   placeholder="dd/mm/yyyy"/>
												</div>
											</div>


										</div>
									</div>
								</div>
								<div class="table-responsive py-4">
									<table class="table table-flush" id="datatable-tanggal">
										<thead class="thead-light">
										<tr role="row">
											<th>No</th>
											<th>Hari</th>
											<th>Tanggal</th>
											<th>Aksi</th>
										</tr>
										</thead>
										<tfoot>
										<tr>
											<th>No</th>
											<th>Hari</th>
											<th>Tanggal</th>
											<th>Aksi</th>
										</tr>
										</tfoot>
										<tbody>
										</tbody>
									</table>
								</div>
								<div class="row">
									<div class="col-12 d-flex justify-content-between">
										<h5>Jam pelaksanaan</h5>
										<button id="button-waktu" data-target="#form-waktu1,#form-waktu2"
												data-toggle="collapse" aria-expanded="false"
												aria-controls="form-waktu" class="btn btn-sm btn-success">Tambah
										</button>
									</div>
								</div>
								<div class="row d-flex justify-content-end mt-3">
									<div class="col-lg-3 col-md-3 col-sm-12">
										<div class="form-group collapse" id="form-waktu1">
											<label for="" class="form-label">Waktu Mulai</label>
											<input class="form-control form-control-sm" type="time"
												   name="waktu1"
												   value=""
												   placeholder="Masukkan Mulai"/>
										</div>
										<p></p>
										<div class="form-group collapse" id="form-waktu2">
											<label for="" class="form-label">Waktu Selesai</label>
											<input class="form-control form-control-sm" type="time"
												   name="waktu2"
												   value=""
												   placeholder="Masukkan Selesai"/>
										</div>
									</div>
								</div>
								<div class="table-responsive py-4">
									<table class="table table-flush" id="datatable-waktu">
										<thead class="thead-light">
										<tr role="row">
											<th>No</th>
											<th>Waktu</th>
											<th>Aksi</th>
										</tr>
										</thead>
										<tfoot>
										<tr>
											<th>No</th>
											<th>Waktu</th>
											<th>Aksi</th>
										</tr>
										</tfoot>
										<tbody>

										</tbody>
									</table>
								</div>
								<?php break ?>

							<?php case 'penguji': ?>
								<h3 class="m-0 p-0 text-primary mb-2">Kelola Dosen Penguji</h3>
								<ul class="nav nav-tabs">
									<?php if (isset($prodies)):
										foreach ($prodies as $prody):
											?>
											<li class="nav-item">
												<a href="<?php echo site_url("seminar?m=kelola&section=penguji&prodi=$prody->id_program_studi") ?>"
												   class="nav-link <?php echo isset($_GET['prodi']) && $_GET['prodi'] == $prody->id_program_studi ? 'active' : null ?>"><?php echo $prody->nama_program_studi ?></a>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
								<?php if (isset($_GET['prodi'])): ?>
									<div class="table-responsive">
										<table class="table" id="table-penguji">
											<thead>
											<tr>
												<th>Nama Dosen</th>
												<th>Penguji 1</th>
												<th>Penguji 2</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td></td>
												<td class="p-0">
													<div class="custom-control custom-checkbox mt-1">
														<input class="custom-control-input" id="check-all-p1"
															   type="checkbox">
														<label class="custom-control-label" for="check-all-p1">Pilih
															Semua</label>
													</div>
												</td>
												<td class="p-0">
													<div class="custom-control custom-checkbox mt-1">
														<input class="custom-control-input" id="check-all-p2"
															   type="checkbox">
														<label class="custom-control-label" for="check-all-p2">Pilih
															Semua</label>
													</div>
												</td>
											</tr>
											<?php if (isset($dosens)): ?>
												<?php foreach ($dosens[$_GET['prodi']] as $dosen): ?>
													<tr>
														<td><?php echo $dosen->nama_pegawai; ?></td>
														<?php
														$penguji = isset($penguji) ? $penguji : array();
														$pengujis = $penguji[$dosen->id] ? $penguji[$dosen->id] : array();
														$keys_penguji = array('p1', 'p2');
														if (count($pengujis) == 1 and isset($pengujis[0]->status)) {
															$status = $pengujis[0]->status;
															if ($status == 'p2') {
																array_unshift($pengujis, (object)array("id" => null, 'status' => null));
															} else {
																array_push($pengujis, (object)array("id" => null, 'status' => null));
															}
														}
														foreach ($keys_penguji as $key => $peng):?>
															<td id="checkbox-<?php echo $peng ?>">
																<label
																	class="custom-toggle custom-toggle-primary">
																	<input class="checkbox-<?php echo $peng ?>"
																		   type="checkbox"
																		   data-id="<?php echo $dosen->id ?>"
																		   id="<?php echo isset($pengujis[$key]->id) ? $pengujis[$key]->id : null ?>" <?php echo (isset($pengujis[$key]->status) and $pengujis[$key]->status != null) ? 'checked' : null ?>
																		   data-mode="<?php echo $peng ?>">
																	<span
																		class="custom-toggle-slider rounded-circle"
																		data-label-off="No"
																		data-label-on="Yes"></span>
																</label>
															</td>
														<?php endforeach; ?>
													</tr>
												<?php endforeach; ?>
											<?php endif; ?>
											</tbody>
										</table>
									</div>
								<?php endif; ?>
								<?php break ?>
							<?php case "jadwal" : ?>
							<div>
								<h4>Overview</h4>
								<div class="row">
									<div class="col-sm-12 col-md-3">
										<div class="card bg-primary text-white">
											<div class="card-body">Jumlah tempat
												= <?php echo isset($tempat) ? $tempat->jumlah : null ?></div>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="card bg-warning text-white">
											<div class="card-body">Jumlah Waktu
												= <?php echo isset($waktu) ? $waktu->jumlah : null ?></div>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="card bg-default text-white">
											<div class="card-body">Jumlah Penguji 1
												= <?php echo isset($penguji_1) ? $penguji_1->jumlah : null ?></div>
										</div>
									</div>
									<div class="col-sm-12 col-md-3">
										<div class="card bg-success text-white">
											<div class="card-body">Jumlah Penguji 2
												= <?php echo isset($penguji_2) ? $penguji_2->jumlah : null ?></div>
										</div>
									</div>
								</div>
								<div id="scheduler"></div>
							</div>
						</div>
						<?php break; ?>
						<!--									--><?php //case 'generate': ?>
						<!--										<div>-->
						<!--											<h4>Overview</h4>-->
						<!--											<div class="row">-->
						<!--												<div class="col-sm-12 col-md-3">-->
						<!--													<div class="card bg-primary text-white">-->
						<!--														<div class="card-body">Jumlah tempat-->
						<!--															= -->
						<?php //echo isset($tempat) ? $tempat->jumlah : null ?><!--</div>-->
						<!--													</div>-->
						<!--												</div>-->
						<!--												<div class="col-sm-12 col-md-3">-->
						<!--													<div class="card bg-warning text-white">-->
						<!--														<div class="card-body">Jumlah Waktu-->
						<!--															= -->
						<?php //echo isset($waktu) ? $waktu->jumlah : null ?><!--</div>-->
						<!--													</div>-->
						<!--												</div>-->
						<!--												<div class="col-sm-12 col-md-3">-->
						<!--													<div class="card bg-default text-white">-->
						<!--														<div class="card-body">Jumlah Penguji 1-->
						<!--															= -->
						<?php //echo isset($penguji_1) ? $penguji_1->jumlah : null ?><!--</div>-->
						<!--													</div>-->
						<!--												</div>-->
						<!--												<div class="col-sm-12 col-md-3">-->
						<!--													<div class="card bg-success text-white">-->
						<!--														<div class="card-body">Jumlah Penguji 2-->
						<!--															= -->
						<?php //echo isset($penguji_2) ? $penguji_2->jumlah : null ?><!--</div>-->
						<!--													</div>-->
						<!--												</div>-->
						<!--											</div>-->
						<!--										</div>-->
						<!--										<div>-->
						<!--											<h4>Generate Jadwal Sidang</h4>-->
						<!--											<form class="form">-->
						<!--												<div class="row">-->
						<!--													<div class="col-md-6 col-sm-12 col-xs-12">-->
						<!--														<div class="form-group">-->
						<!--															<label for="population-input">Populasi Individu</label>-->
						<!--															<input type="text"-->
						<!--																   class="form-control" name="population" id="population-input"-->
						<!--																   aria-describedby="helpId"-->
						<!--																   placeholder="Masukkan angka populasi">-->
						<!--															<small id="helpId" class="form-text text-muted">Masukkan sekitar 50-->
						<!--																- 100 indivudu perpopulasi untuk mendapatkan hasil yang-->
						<!--																maksimal</small>-->
						<!--														</div>-->
						<!--													</div>-->
						<!--													<div class="col-md-6 col-sm-12 col-xs-12">-->
						<!--														<div class="form-group">-->
						<!--															<label for="generation-input">Batasan Generasi</label>-->
						<!--															<input type="text"-->
						<!--																   class="form-control" name="generation" id="generation-input"-->
						<!--																   aria-describedby="helpId"-->
						<!--																   placeholder="Masukkan angka generasi" value="0">-->
						<!--															<small id="helpId" class="form-text text-muted">Masukkan berapa-->
						<!--																generasi untuk membatasi generasi yang di hasilkan</small>-->
						<!--														</div>-->
						<!--													</div>-->
						<!--												</div>-->
						<!--												<div class="row">-->
						<!--													<div class="col-12">-->
						<!--														<button type="submit" class="btn btn-primary float-right">Generate</button>-->
						<!--													</div>-->
						<!--												</div>-->
						<!--											</form>-->
						<!---->
						<!--										</div>-->
						<!--										--><?php //break ?>
						<!---->
						<?php default:
							redirect('seminar?m=kelola'); ?>
						<?php endswitch; ?>
						<?php else: ?>
							<p>Silahkan pilih menu diatas</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer PHP -->
	<?php $this->load->view('admin/_partials/footer.php'); ?>
</div>
</div>
<!-- Scripts PHP-->
<?php $this->load->view('admin/_partials/modal.php'); ?>
<?php $this->load->view('admin/_partials/js.php'); ?>
<?php
//	require APPPATH."libraries/hotreloader.php";
//	$reloader = new HotReloader();
//	$reloader->setRoot(__DIR__);
//	$reloader->currentConfig();
//	$reloader->init();
?>
<?php if ($section == 'jadwal'): ?>
	<script src="https://cdn3.devexpress.com/jslib/19.2.4/js/dx.all.js"></script>
	<script>
        var resourcesData = [
            {
                text: "Samantha Bright",
                id: 1,
                color: "#cb6bb2"
            }, {
                text: "John Heart",
                id: 2,
                color: "#56ca85"
            }, {
                text: "Todd Hoffman",
                id: 3,
                color: "#1e90ff"
            }, {
                text: "Sandra Johnson",
                id: 4,
                color: "#ff9747"
            }
        ];

        var penguji1 = [];
        var penguji2 = [];
        var ruanganData = [];

        function cbPenguji1(response) {
            penguji1 = response.data;
        }

        function cbPenguji2(response) {
            penguji2 = response.data;
        }

        function cbRuangan(response) {
            ruanganData = response.data;
        }

        $.ajax({
            url: '<?php echo site_url("seminar?m=tempat") ?>',
            async: false,
            method: "GET",
            dataType: 'json',
            success: function (res) {
                cbRuangan(res)
            }
        });
        $.ajax({
            url: '<?php echo site_url("seminar?m=penguji&status=p1") ?>',
            async: false,
            method: "GET",
            dataType: 'json',
            success: function (res) {
                cbPenguji1(res);
            }
        })
        $.ajax({
            url: '<?php echo site_url("seminar?m=penguji&status=p2") ?>',
            async: false,
            method: "GET",
            dataType: 'json',
            success: function (res) {
                cbPenguji2(res);
            }
        })

        var data = [{
            "text": "Staff Productivity Report",
            "penguji1": 4,
            "penguji2": 4,
            "startDate": new Date(2017, 4, 26, 16, 15),
            "endDate": new Date(2017, 4, 26, 19, 30),
            "ruangan": 2
        }];
        $(function () {
            $("#scheduler").dxScheduler({
                dataSource: data,
                showAllDayPanel: false,
                views: ["timelineDay", "timelineWeek", "timelineWorkWeek", "timelineMonth"],
                currentView: "timelineMonth",
                currentDate: new Date(),
                firstDayOfWeek: 0,
                startDayHour: 8,
                endDayHour: 20,
                cellDuration: 60,
                groups: ["ruangan"],
                resources: [{
                    fieldExpr: "penguji1",
                    allowMultiple: false,
                    displayExpr: "nama_pegawai",
                    dataSource: penguji1,
                    label: "Penguji 1",
                    useColorAsDefault: true
                }, {
                    fieldExpr: "penguji2",
                    allowMultiple: false,
                    displayExpr: "nama_pegawai",
                    dataSource: penguji2,
                    label: "Penguji 2",
                    useColorAsDefault: true
                }, {
                    fieldExpr: "ruangan",
                    displayExpr: "nama",
                    useColorAsDefault: true,
                    allowMultiple: false,
                    dataSource: ruanganData,
                    label: "Ruangan",
                }],
                onAppointmentFormOpening: function (data) {
                    var form = data.form,
                        movieInfo = {},
                        startDate = data.appointmentData.startDate;

                    form.option("items", [{
                        label: {
                            text: "Mahasiswa"
                        },
                        editorType: "dxSelectBox",
                        dataField: "id",
                        editorOptions: {
                            items: [],
                            displayExpr: "text",
                            valueExpr: "id",
                            onValueChanged: function (args) {
                                // movieInfo = getMovieById(args.value);
                                // form.getEditor("director")
                                //     .option("value", "movieInfo.director");
                                // form.getEditor("endDate")
                                //     .option("value", new Date (startDate.getTime() +
                                //         60 * 1000 * "movieInfo.duration"));
                            }
                        },
                    }, {
                        label: {
                            text: "Director"
                        },
                        name: "director",
                        editorType: "dxTextBox",
                        editorOptions: {
                            value: movieInfo.director,
                            readOnly: true
                        }
                    }, {
                        dataField: "startDate",
                        editorType: "dxDateBox",
                        editorOptions: {
                            width: "100%",
                            type: "datetime",
                            onValueChanged: function (args) {
                                startDate = args.value;
                                form.getEditor("endDate")
                                    .option("value", new Date(startDate.getTime() +
                                        60 * 1000 * movieInfo.duration));
                            }
                        }
                    }, {
                        name: "endDate",
                        dataField: "endDate",
                        editorType: "dxDateBox",
                        editorOptions: {
                            width: "100%",
                            type: "datetime",
                            readOnly: true
                        }
                    },
                        {
                            name: "endDate",
                            dataField: "endDate",
                            editorType: "dxDateBox",
                            editorOptions: {
                                width: "100%",
                                type: "datetime",
                                readOnly: true
                            }
                        }, {
                            dataField: "price",
                            editorType: "dxRadioGroup",
                            editorOptions: {
                                dataSource: [5, 10, 15, 20],
                                itemTemplate: function (itemData) {
                                    return "$" + itemData;
                                }
                            }
                        }
                    ]);
                },
                height: 580
            });
        });
	</script>
<?php endif ?>
<script>
	<?php if($section == 'tempat'):?>
    function data_tempat() {
        $('#datatable-tempat').dataTable({
            ajax: '<?php echo site_url('seminar?m=tempat') ?>',
            columns: [
                {'data': 'id'},
                {'data': 'nama'},
                {
                    "data": null,
                    "defaultContent": '' +
                        '<div class="btn-group">' +
                        '<button id="btn-tempat-edit" class="btn btn-sm btn-primary">Edit</button>' +
                        '<button id="btn-tempat-delete" class="btn btn-sm btn-danger">Delete</button>' +
                        '</div>'
                }
            ],
        })
    }
	<?php endif?>
	<?php if($section == 'waktu'):?>
    function data_waktu() {
        $('#datatable-waktu').dataTable({
            ajax: '<?php echo site_url('seminar?m=waktu') ?>',
            columns: [
                {'data': 'id'},
                {'data': 'jam'},
                {
                    "data": null,
                    "defaultContent": '' +
                        '<div class="btn-group">' +
                        '<button id="btn-waktu-edit" class="btn btn-sm btn-primary">Edit</button>' +
                        '<button id="btn-waktu-delete" class="btn btn-sm btn-danger">Delete</button>' +
                        '</div>'
                }
            ],
        })
        $('#datatable-tanggal').dataTable({
            ajax: '<?php echo site_url('seminar?m=tanggal') ?>',
            columns: [
                {'data': 'id'},
                {'data': 'hari'},
                {'data': 'tanggal'},
                {
                    "data": null,
                    "defaultContent": '' +
                        '<div class="btn-group">' +
                        '<button id="btn-tanggal-edit" class="btn btn-sm btn-primary">Edit</button>' +
                        '<button id="btn-tanggal-delete" class="btn btn-sm btn-danger">Delete</button>' +
                        '</div>'
                }
            ],
        })
    }
	<?php endif?>

    $(document).ready(function () {
        //tempat
		<?php if($section == 'tempat'):?>
        data_tempat();
        $('#button-tempat').on('click', function () {
            let isCollapse = $(this).attr('aria-expanded');
            if (isCollapse === "false") {
                //it mean expand
                $(this).text('Simpan').removeClass('btn-primary').removeClass('btn-danger').addClass('btn-success');
            } else {
                let inputValue = $('input[name="ruangan"]').val();
                if (inputValue !== '') {
                    let buttonName = $(this).text();
                    switch (buttonName) {
                        case 'Simpan':
                            $.ajax({
                                url: '<?php echo site_url('seminar?m=tempat&q=i') ?>',
                                data: {tempat: inputValue},
                                method: "POST",
                                success: function (res) {
                                    alert('Tempat telah disimpan');
                                    window.location.reload();
                                }
                            })
                            $(this).text('Tambah').removeClass('btn-success').addClass('btn-primary');
                            break;
                        case 'Edit':
                            let idInput = $('input[name="ruangan"]').data('id');
                            $.ajax({
                                url: '<?php echo site_url('seminar?m=tempat&q=u') ?>',
                                data: {tempat: inputValue, id: idInput},
                                method: "POST",
                                success: function (res) {
                                    alert('Tempat telah update');
                                    window.location.reload();
                                }
                            })
                            $(this).text('Tambah').removeClass('btn-success').addClass('btn-primary');
                            break;
                        default:
                            return;
                    }

                } else {
                    $(this).text('Error').removeClass('btn-success').addClass('btn-danger');
                }

            }
        })
        $(document).on('click', '#btn-tempat-edit', function () {
            let row = $(this).parents('tr');
            let id = $(row).children('td.sorting_1').text();
            let name = $(row).children('td:nth-child(2)').text();
            $('#form-ruangan').collapse('show');
            $('input[name="ruangan"]').val(name).data('id', id);
            $('#button-tempat').text('Edit').removeClass('btn-primary').addClass('btn-success');
        })
        $(document).on('click', '#btn-tempat-delete', function () {
            if (confirm('Apakah yakin ingin menghapus data ini?')) {
                let row = $(this).parents('tr');
                let id = $(row).children('td.sorting_1').text();
                $.ajax({
                    url: '<?php echo site_url('seminar?m=tempat&q=d') ?>',
                    data: {id: id},
                    method: "POST",
                    success: function (res) {
                        alert('Data berhasil di hapus');
                        window.location.reload();
                    }
                })
            }

        })
		<?php endif?>
        //waktu
		<?php if($section == 'waktu'):?>
        data_waktu();
        $('#button-waktu').on('click', function () {
            let isCollapse = $(this).attr('aria-expanded');
            if (isCollapse === "false") {
                //it mean expand
                $(this).text('Simpan').removeClass('btn-primary').removeClass('btn-danger').addClass('btn-success');
            } else {
                let inputValue = $('input[name="waktu1"]').val() + " - " + $('input[name="waktu2"]').val();
                if (inputValue !== ' - ') {
                    let buttonName = $(this).text();
                    switch (buttonName) {
                        case 'Simpan':
                            $.ajax({
                                url: '<?php echo site_url('seminar?m=waktu&q=i') ?>',
                                data: {jam: inputValue},
                                method: "POST",
                                success: function (res) {
                                    alert('Waktu telah disimpan');
                                    window.location.reload();
                                }
                            })
                            $(this).text('Tambah').removeClass('btn-success').addClass('btn-primary');
                            break;
                        case 'Edit':
                            let idInput = $('input[name="waktu1"]').data('id');
                            $.ajax({
                                url: '<?php echo site_url('seminar?m=waktu&q=u') ?>',
                                data: {jam: inputValue, id: idInput},
                                method: "POST",
                                success: function (res) {
                                    alert('Waktu telah update');
                                    window.location.reload();
                                }
                            })
                            $(this).text('Tambah').removeClass('btn-success').addClass('btn-primary');
                            break;
                        default:
                            return;
                    }

                } else {
                    $(this).text('Error').removeClass('btn-success').addClass('btn-danger');
                }

            }
        })
        $(document).on('click', '#btn-waktu-edit', function () {
            let row = $(this).parents('tr');
            let id = $(row).children('td.sorting_1').text();
            let jam = $(row).children('td:nth-child(2)').text();
            console.log(jam);
            let splitedJam = jam.split(' - ');
            $('#form-waktu1').collapse('show');
            $('#form-waktu2').collapse('show');
            $('input[name="waktu1"]').val(splitedJam[0]).data('id', id);
            $('input[name="waktu2"]').val(splitedJam[1]);
            $('#button-waktu').text('Edit').removeClass('btn-primary').addClass('btn-success');
        })
        $(document).on('click', '#btn-waktu-delete', function () {
            if (confirm('Apakah yakin ingin menghapus data ini?')) {
                let row = $(this).parents('tr');
                let id = $(row).children('td.sorting_1').text();
                $.ajax({
                    url: '<?php echo site_url('seminar?m=waktu&q=d') ?>',
                    data: {id: id},
                    method: "POST",
                    success: function (res) {
                        alert('Waktu berhasil di hapus');
                        window.location.reload();
                    }
                })
            }

        })
        //tanggal
        $('#button-tanggal').on('click', function () {
            let isCollapse = $(this).attr('aria-expanded');
            if (isCollapse === "false") {
                //it mean expand
                $(this).text('Simpan').removeClass('btn-primary').removeClass('btn-danger').addClass('btn-success');
            } else {
                let inputValue = $('input[name="tanggal"]').val();
                let inputHari = $('input[name="hari"]').val();
                if (inputValue !== '') {
                    let buttonName = $(this).text();
                    switch (buttonName) {
                        case 'Simpan':
                            $.ajax({
                                url: '<?php echo site_url('seminar?m=tanggal&q=i') ?>',
                                data: {tanggal: inputValue, hari: inputHari},
                                method: "POST",
                                success: function (res) {
                                    alert('Tanggal telah disimpan');
                                    window.location.reload();
                                }
                            })
                            $(this).text('Tambah').removeClass('btn-success').addClass('btn-primary');
                            break;
                        case 'Edit':
                            let idInput = $('input[name="tanggal"]').data('id');
                            $.ajax({
                                url: '<?php echo site_url('seminar?m=tanggal&q=u') ?>',
                                data: {tanggal: inputValue, hari: inputHari, id: idInput},
                                method: "POST",
                                success: function (res) {
                                    alert('Tanggal telah update');
                                    window.location.reload();
                                }
                            })
                            $(this).text('Tambah').removeClass('btn-success').addClass('btn-primary');
                            break;
                        default:
                            return;
                    }

                } else {
                    $(this).text('Error').removeClass('btn-success').addClass('btn-danger');
                }

            }
        })
        $(document).on('click', '#btn-tanggal-edit', function () {
            let row = $(this).parents('tr');
            let id = $(row).children('td.sorting_1').text();
            let hari = $(row).children('td:nth-child(2)').text();
            let tanggal = $(row).children('td:nth-child(3)').text();
            $('#form-tanggal').collapse('show');
            $('input[name="hari"]').val(hari);
            $('input[name="tanggal"]').val(tanggal).data('id', id);
            $('#button-tanggal').text('Edit').removeClass('btn-primary').addClass('btn-success');
        })
        $(document).on('click', '#btn-tanggal-delete', function () {
            if (confirm('Apakah yakin ingin menghapus data ini?')) {
                let row = $(this).parents('tr');
                let id = $(row).children('td.sorting_1').text();
                $.ajax({
                    url: '<?php echo site_url('seminar?m=tanggal&q=d') ?>',
                    data: {id: id},
                    method: "POST",
                    success: function (res) {
                        alert('Tanggal berhasil di hapus');
                        window.location.reload();
                    }
                })
            }

        })
        $('#tanggal-datepicker').datepicker({
            startDate: "-60y",
            format: "yyyy-mm-dd",
        }).on('changeDate', function (e) {
            var dayName = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Minggu'];
            $('input[name="hari"]').val(dayName[e.date.getDay()])
        })
		<?php endif?>
		<?php if($section == 'penguji'): ?>
        if ($('input.checkbox-p1').not(':checked').length === 0) {
            $('#check-all-p1').prop('checked', true);
        }
        if ($('input.checkbox-p2').not(':checked').length === 0) {
            $('#check-all-p2').prop('checked', true);
        }
        $(document).on('change', 'input[type="checkbox"]', function () {
            //mean that user select one by one;
            let data_bulk = [];
            let mode = '';
            let query = '';
            let input_checked = '';
            switch (this.id) {
                case "check-all-p1":
                    input_checked = $('input.checkbox-p1');
                    mode = 'p1';
                    let not_checked = $('input.checkbox-p1').not(':checked');
                    let are_checked = $('input.checkbox-p1:checked');
                    if (!not_checked.length || !are_checked.length) {
                        input_checked.map(function () {
                            if (this.checked) {
                                this.checked = false;
                                data_bulk.push(this.id);
                                query = 'd_bulk';
                            } else {
                                this.checked = true;
                                data_bulk.push($(this).data('id'));
                                query = 'i_bulk';
                            }
                        });
                    } else {
                        if (this.checked) {
                            not_checked.prop('checked', true);
                            data_bulk.push($(not_checked).data('id'));
                            query = 'i_bulk';
                        }
                    }
                    console.log(data_bulk);
                    $.ajax({
                        url: '<?php echo site_url('seminar?m=penguji&q=') ?>' + query,
                        method: "POST",
                        data: {mode: mode, ids: data_bulk},
                        dataType: 'json',
                        success: function (res) {
                            console.log(res)
                        }
                    })
                    break;
                case "check-all-p2":
                    input_checked = $('input.checkbox-p2');
                    mode = 'p2';
                    input_checked.map(function () {
                        if (this.checked) {
                            this.checked = false;
                            query = 'd_bulk';
                            data_bulk.push(this.id);
                        } else {
                            this.checked = true;
                            query = 'i_bulk';
                            data_bulk.push($(this).data('id'));
                        }
                    });
                    $.ajax({
                        url: '<?php echo site_url('seminar?m=penguji&q=') ?>' + query,
                        method: "POST",
                        data: {mode: mode, ids: data_bulk},
                        dataType: 'json',
                        success: function (res) {
                            console.log(res)
                        }
                    })
                    break;
                default:
                    if (!this.checked) {
                        let id = this.id;
                        let query = 'd';
                        $.ajax({
                            url: '<?php echo site_url('seminar?m=penguji&q=') ?>' + query,
                            method: "POST",
                            data: {id: id},
                            dataType: 'json',
                            success: function (res) {
                                console.log(res)
                            }
                        })
                    } else {
                        let id = $(this).data('id');
                        let query = 'i';
                        let mode = $(this).data('mode');
                        $.ajax({
                            url: '<?php echo site_url('seminar?m=penguji&q=') ?>' + query,
                            method: "POST",
                            data: {id: id, mode: mode},
                            dataType: 'json',
                            success: function (res) {
                                console.log(res)
                            }
                        })
                    }
                    break;

            }
        })
		<?php endif; ?>
    })

</script>
<!-- Demo JS - remove this in your project -->
<!-- <script src="../aset/js/demo.min.js"></script> -->
</body>

</html>
