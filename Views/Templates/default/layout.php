<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= "{$title} | {$config->company_name}" ?></title>
		
        <?= $css ?>
	</head>
	<body class="hold-transition sidebar-mini">

		<div class="wrapper">
			
			<?= $this->include('IDGdashboard\Views\Templates\default\partials\navbar_top') ?>
			
			<?= $this->include('IDGdashboard\Views\Templates\default\partials\sidebar_left') ?>

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<div class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1 class="m-0"><?= $title ?></h1>
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item">
										<a href="<?= site_url('dashboard') ?>">Dashboard</a>
									</li>
									<li class="breadcrumb-item active"><?= $title ?></li>
								</ol>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- /.content-header -->
				<!-- Main content -->
				<div class="content">
					<div class="container-fluid">

						<?= $this->renderSection('content') ?>

					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<?= $this->include('IDGdashboard\Views\Templates\default\partials\sidebar_right') ?>
			
			<?= $this->include('IDGdashboard\Views\Templates\default\partials\main_footer') ?>

		</div>
		<!-- ./wrapper -->
		
        <!-- jQuery -->
		<?= $js ?>
	</body>
</html>