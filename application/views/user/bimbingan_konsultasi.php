<!DOCTYPE html>
<html>

<!-- Head PHP -->
<?php $this->load->view('user/_partials/header.php'); ?>

<body class="g-sidenav-hidden">
<!-- Sidenav PHP-->
<?php $this->load->view('user/_partials/sidenav.php'); ?>
<!-- Main content -->
<div class="main-content" id="panel">
	<!-- Topnav PHP-->
	<?php $this->load->view('user/_partials/topnav.php');
	?>
	<!-- Header -->
	<!-- BreadCrumb PHP -->
	<?php $this->load->view('user/_partials/breadcrumb.php'); ?>
	<!-- Page content -->
	<div class="container-fluid mt--6">
		<!-- Card -->
		<div class="header-body">
			<!-- Card stats -->
			<div class="row">
				<div class="col">
					<div class="card card-calendar">
						<div class="card-header">
							<!-- Title -->
							<div class="row">
								<div class="col-md-8 col-sm-8">
									<h5 class="h3 mb-0">Kalender Konsutasi</h5>
									<h6 class="h5 d-inline-block mb-0" id="fullcalendar-title"></h6>
								</div>
								<div class="col-md-4 col-sm-4 text-right">
									<a href="#" class="fullcalendar-btn-prev btn btn-sm btn-primary">
										<i class="fas fa-angle-left"></i>&nbsp;Previous
									</a>
									<a href="#" class="fullcalendar-btn-next btn btn-sm btn-primary">
										Next&nbsp;<i class="fas fa-angle-right"></i>
									</a>
								</div>
							</div>


						</div>
						<div class="card-body p-0">
							<div class="calendar" id="calendar" data-toggle="calendar-konsultasi"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer PHP -->
		<?php $this->load->view('user/_partials/footer.php'); ?>

	</div>
	<?php $this->load->view('user/_partials/modal_add_event.php') ?>
	<?php $this->load->view('user/_partials/modal_edit_event.php') ?>
</div>
<!-- Scripts PHP-->
<?php $this->load->view('user/_partials/js.php'); ?>
<script src="<?php echo base_url('aset/vendor/fullcalendar/fullcalendar.min.js') ?>"></script>
<script src="<?php echo base_url('aset/vendor/fullcalendar/locale-all.js') ?>"></script>

<script>
    var Fullcalendar = (function () {

        // Variables

        var $calendar = $('[data-toggle="calendar-konsultasi"]');

        //
        // Methods
        //

        // Init
        function init($this) {

            // Calendar events

                // Full calendar options
                // For more options read the official docs: https://fullcalendar.io/docs

                options = {
                    locale: 'id',
                    header: {
                        right: '',
                        center: '',
                        left: ''
                    },
                    buttonIcons: {
                        prev: 'calendar--prev',
                        next: 'calendar--next'
                    },
                    theme: false,
                    selectable: true,
                    selectHelper: true,
                    editable: true,
					events: {
						url: "<?php echo site_url('bimbingan?m=konsultasi') ?>",
						cache: true,
						type:"POST",
						data:{events:true},
						error:function(){
						    alert('Gagal akses data bimbingan');
						}
					},
                    //events: async function () {
                    //    let res = await $.ajax({
                    //        url: "<?php //site_url('bimbingan?m=konsultasi') ?>//",
                    //        method: "POST",
                    //        data: {events: true}
                    //    });
                    //    console.log(JSON.parse(res))
                    //    return JSON.parse(res);
                    //},

                    dayClick: function (date) {
                        var isoDate = moment(date).toISOString();
                        $('#new-event').modal('show');
                        $('.new-event--title').val('');
                        $('#add-masalah').val('');
                        $('#add-solusi').val('');
                        $('.new-event--start').val(isoDate);
                        $('.new-event--end').val(isoDate);
                    },

                    viewRender: function (view) {
                        var calendarDate = $this.fullCalendar('getDate');
                        var calendarMonth = calendarDate.month();

                        //Set data attribute for header. This is used to switch header images using css
                        // $this.find('.fc-toolbar').attr('data-calendar-month', calendarMonth);

                        //Set title in page header
                        $('#fullcalendar-title').text(view.title);
                    },

                    // Edit calendar event action

                    eventClick: function (event, element) {
                        console.log(event);
                        $('#edit-event input[value=' + event.tag + ']').prop('checked', true);
                        $('#edit-event').modal('show');
                        $('.edit-event--id').val(event.id);
                        $('.edit-event--title').val(event.title);
                        $('.edit-event--masalah').val(event.masalah);
                        $('.edit-event--solusi').val(event.solusi);
                    }
                };

            // Initalize the calendar plugin
            $this.fullCalendar(options);


            //
            // Calendar actions
            //


            //Add new Event

            $('body').on('click', '.new-event--add', function () {
                let eventTitle = $('.new-event--title').val();
                let eventProblem = $('#add-masalah').val();

                // Generate ID
                let GenRandom = {
                    Stored: [],
                    /**
                     * @return {string}
                     */
                    Job: function () {
                        let newId = Date.now().toString().substr(6); // or use any method that you want to achieve this string

                        if (!this.Check(newId)) {
                            this.Stored.push(newId);
                            return newId;
                        }
                        return this.Job();
                    },
                    /**
                     * @return {boolean}
                     */
                    Check: function (id) {
                        for (let i = 0; i < this.Stored.length; i++) {
                            if (this.Stored[i] === id) return true;
                        }
                        return false;
                    }
                };

                if (eventTitle !== '' && eventProblem !== '') {
                    let createdEvent = {
                        id: GenRandom.Job(),
                        title: eventTitle,
                        id_dosen_bimbingan:$('[name="id_dosen_bimbingan"]').val(),
                        start: $('.new-event--start').val(),
                        end: $('.new-event--end').val(),
                        masalah: $('#add-masalah').val(),
                        solusi: $('#solusi').val(),
                        allDay: true,
                        tag: $('.event-tag input:checked').val()
                    };
                    //render event to calendar
                    $this.fullCalendar('renderEvent',createdEvent , true);
					//push to database
					$.ajax({
						url:"<?php echo site_url('bimbingan?m=konsultasi&q=i')?>",
						method:"POST",
						data:createdEvent,
						success:function(){
                            swal({
                                title: 'Success',
                                text: 'Konsultasi berhasil disimpan',
                                type: 'success',
                                buttonsStyling: false,
                                confirmButtonClass: 'btn btn-primary btn-sm'
                            });
						},
						error:function(){
                            swal({
                                title: 'Error',
                                text: 'Konsultasi Gagal disimpan',
                                type: 'error',
                                buttonsStyling: false,
                                confirmButtonClass: 'btn btn-primary btn-sm'
                            });
						}
					});
                    $('.new-event--form')[0].reset();
                    $('.new-event--title').closest('.form-group').removeClass('has-danger');
                    $('#new-event').modal('hide');
                }
                else if(eventTitle !== '' && eventProblem === '' ){
                    $('#add-masalah').closest('.form-group').addClass('has-danger').focus();
				}
                else {
                    $('.new-event--title').closest('.form-group').addClass('has-danger').focus();
                }
            });


            //Update/Delete an Event
            $('body').on('click', '[data-calendar]', function () {
                let calendarAction = $(this).data('calendar');
                let currentId = $('.edit-event--id').val();
                let currentTitle = $('.edit-event--title').val();
                let currentMasalah = $('.edit-event--masalah').val();
                let currentSolusi = $('.edit-event--solusi').val();
                let currentClass = $('#edit-event .event-tag input:checked').val();
                let currentEvent = $this.fullCalendar('clientEvents', currentId);

                //title: eventTitle,
				//id_dosen_bimbingan:$('[name="id_dosen_bimbingan"]').val(),
				//start: $('.new-event--start').val(),
				//end: $('.new-event--end').val(),
				//masalah: $('#add-masalah').val(),
				//solusi: $('#solusi').val(),
				//allDay: true,
				//tag: $('.event-tag input:checked').val()
                //Update
                if (calendarAction === 'update') {
                    if (currentTitle !== '') {
                        currentEvent[0].title = currentTitle;
                        currentEvent[0].masalah = currentMasalah;
                        currentEvent[0].solusi = currentSolusi;
                        currentEvent[0].tag = [currentClass];
                        //update rendered item
                        $this.fullCalendar('updateEvent', currentEvent[0]);
                        //push to database
						$.ajax({
							url:"<?php echo site_url('bimbingan?m=konsultasi&q=u')?>",
							method:"POST",
							data:{
							    id:currentId,
                                title:currentTitle,
                                id_dosen_bimbingan:$('[name="id_dosen_bimbingan"]').val(),
                                masalah:currentMasalah,
                                solusi:currentSolusi,
                                allDay:true,
                                tag:currentClass,
							},
							success:function(res){
							    console.log(res);
                                swal({
                                    title: 'Success',
                                    text: 'Konsultasi berhasil diubah',
                                    type: 'success',
                                    buttonsStyling: false,
                                    confirmButtonClass: 'btn btn-primary btn-sm'
                                });
							},
							error:function(err){
                                console.log(err);
                                swal({
                                    title: 'Gagal',
                                    text: 'Konsultasi gagal diubah',
                                    type: 'error',
                                    buttonsStyling: false,
                                    confirmButtonClass: 'btn btn-danger btn-sm'
                                });
							}
						});
                        $('#edit-event').modal('hide');
                    } else {
                        $('.edit-event--title').closest('.form-group').addClass('has-error').focus();
                    }
                }

                //Delete
                if (calendarAction === 'delete') {
                    $('#edit-event').modal('hide');

                    // Show confirm dialog
                    setTimeout(function () {
                        swal({
                            title: 'Apakah anda yakin menghapus ini?',
                            text: "Konsultasi yang sudah hapus tidak bisa dikembalikan lagi",
                            type: 'warning',
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonClass: 'btn btn-danger btn-sm',
                            confirmButtonText: 'Yes, hapus!',
                            cancelButtonClass: 'btn btn-secondary btn-sm'
                        }).then((result) => {
                            if (result.value) {
                                // Delete event
                                $this.fullCalendar('removeEvents', currentId);
                                console.log(currentId);

								// Delete from database
                                $.ajax({
                                    url:"<?php echo site_url('bimbingan?m=konsultasi&q=d')?>",
                                    method:"POST",
                                    data:{id:currentId},
                                    success:function(res){
                                        console.log(res);
                                        swal({
                                            title: 'Success',
                                            text: 'Konsultasi berhasil dihapus',
                                            type: 'success',
                                            buttonsStyling: false,
                                            confirmButtonClass: 'btn btn-primary btn-sm'
                                        });
                                    },
                                    error:function(){
                                        swal({
                                            title: 'Error',
                                            text: 'Konsultasi Gagal dihapus',
                                            type: 'error',
                                            buttonsStyling: false,
                                            confirmButtonClass: 'btn btn-primary btn-sm'
                                        });
                                    }
                                })
                                // Show confirmation
                                // swal({
                                //     title: 'Deleted!',
                                //     text: 'The event has been deleted.',
                                //     type: 'success',
                                //     buttonsStyling: false,
                                //     confirmButtonClass: 'btn btn-primary btn-sm'
                                // });
                            }
                        })
                    }, 200);
                }
            });


            //Calendar views switch
            $('body').on('click', '[data-calendar-view]', function (e) {
                e.preventDefault();

                $('[data-calendar-view]').removeClass('active');
                $(this).addClass('active');

                var calendarView = $(this).attr('data-calendar-view');
                $this.fullCalendar('changeView', calendarView);
            });


            //Calendar Next
            $('body').on('click', '.fullcalendar-btn-next', function (e) {
                e.preventDefault();
                $this.fullCalendar('next');
            });


            //Calendar Prev
            $('body').on('click', '.fullcalendar-btn-prev', function (e) {
                e.preventDefault();
                $this.fullCalendar('prev');
            });
        }


        //
        // Events
        //

        // Init
        if ($calendar.length) {
            init($calendar);
        }

    })();
</script>
<!-- Demo JS - remove this in your project -->
<!-- <script src="../aset/js/demo.min.js"></script> -->
</body>

</html>