<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?php echo base_url("dashboard");?>" class="navbar-brand">
                    <!--<img src="<?php echo base_url(); ?>assets/images/mini_logo.png" alt="mini logo" class="pull-left" />-->
						<small>
							
							Trading App
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li>
									<a href="<?php echo base_url('dashboard/profile_setting');?>">
										<i class="ace-icon fa fa-user"></i>
										<?php echo "Admin";?>
									</a>
								</li>
                                <li>
									<a href="<?php echo base_url('dashboard/logout');?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
						
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>