            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
				<!-- Brand Logo -->
				<a href="index3.html" class="brand-link">
					<img src="/dashboard-assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
					<span class="brand-text font-weight-light"><?= $config->company_name ?></span>
				</a>
				<!-- Sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel (optional) -->
					<div class="user-panel mt-3 pb-3 mb-3 d-flex">
						<div class="image">
							<?= $avatar ?>
						</div>
						<div class="info">
							<a href="#" class="d-block">
								<?= $userdata->fullname ?>
							</a>
						</div>
					</div>
					<!-- SidebarSearch Form -->
					<div class="form-inline">
						<div class="input-group" data-widget="sidebar-search">
							<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
							<div class="input-group-append">
								<button class="btn btn-sidebar">
									<i class="fas fa-search fa-fw"></i>
								</button>
							</div>
						</div>
					</div>
					<!-- Sidebar Menu -->
					
					<?php echo( $sidebarmenu )?>
					
					<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
			</aside>