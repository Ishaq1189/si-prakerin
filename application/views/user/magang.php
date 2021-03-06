<!DOCTYPE html>
<html>

<!-- Head PHP -->
<?php  $this->load->view('user/_partials/header.php');?>

<body class="g-sidenav-hidden">
	<!-- Sidenav PHP-->
	<?php $this->load->view('user/_partials/sidenav.php');?>
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

					<?php foreach($menus as $menu): ?>
					<div class="col-xl-4 col-lg-6">
						<div class="card card-stats mb-4 mb-xl-0 my-3" data-step="<?php echo $menu['step_intro'] ?>" data-intro="<?php echo $menu['message_intro'] ?>">
							<a href="<?php echo $menu['href'] ?>">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">
												<?php echo $this->session->userdata('level') ?></h5>
											<span class="h2 font-weight-bold mb-0"><?php echo $menu['name'] ?></span>
										</div>
										<div class="col-auto">
											<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
												<i class="<?php echo $menu['icon'] ?>"></i>
											</div>
										</div>
									</div>
									<p class="mt-3 mb-0 text-muted text-sm">
										<span class="text-wrap"><?php echo $menu['desc'] ?></span>
									</p>
								</div>
							</a>
						</div>
					</div>
					<?php endforeach; ?>
				</div>

			</div>
			<!-- Footer PHP -->
			<?php $this->load->view('user/_partials/footer.php');?>
		</div>

	</div>
	<!-- Scripts PHP-->
	<?php $this->load->view('user/_partials/modal.php');?>
	<?php $this->load->view('user/_partials/js.php');?>
	<!-- Demo JS - remove this in your project -->
	<script>
        $(document).ready(function () {
            if (!localStorage.getItem('menu_magang')) {
                introJs().start().oncomplete(function () {
                    localStorage.setItem('menu_magang', 'yes')
                }).onexit(function () {
                    localStorage.setItem('menu_magang', 'yes')
                })
            }
        })
	</script>
</body>

</html>
