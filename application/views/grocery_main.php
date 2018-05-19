   <div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url('dashboard'); ?>">Home</a>
							</li>

							<li class="active"><?php echo $page_heading; ?></li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1><?php echo $page_heading; ?></h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							<?php echo $output; ?>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
	 </div>
			
<style type="text/css">

.ace-nav>li{
 min-height: 48px !important;
	line-height:36px !important;}
.navbar .navbar-brand{padding-top:5px !important;}
.container .gc-container{z-index:-1 !important;}
.form-container{overflow:hidden !important;}
</style>