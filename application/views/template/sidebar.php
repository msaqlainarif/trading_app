<div id="sidebar" class="sidebar responsive ace-save-state compact">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

		

				<ul class="nav nav-list">
					<li class="active">
						<a href="<?php echo base_url('dashboard');?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
 
					<li class="hover">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Setup Forms
							</span>

							<b class="arrow fa fa-angle-right"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                        
                        	<li class="hover">
								<a href="<?php echo base_url('common/location_types'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Location Types
								</a>

								<b class="arrow"></b>
							</li>
                    
                    		<li class="hover">
								<a href="<?php echo base_url('common/locations'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Locations
                                </a>

								<b class="arrow"></b>
							</li>
                            
                            <li class="hover">
								<a href="<?php echo base_url('common/warehouse_types'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Warehouse Types
                                </a>

								<b class="arrow"></b>
							</li>
                            
                            <li class="hover">
								<a href="<?php echo base_url('common/warehouses'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Warehouses
                                </a>

								<b class="arrow"></b>
							</li>
                            
							<li class="hover">
								<a href="<?php echo base_url('common/companies'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Companies
								</a>

								<b class="arrow"></b>
							</li>
							
                            <li class="hover">
								<a href="<?php echo base_url('common/product_groups'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Product Groups
								</a>

								<b class="arrow"></b>
							</li>
                        
                            <li class="hover">
								<a href="<?php echo base_url('common/party_types'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Party Types
								</a>

								<b class="arrow"></b>
							</li>                                                      
						</ul>
					</li>
                   
                    
             	 <li>
						<a href="<?php echo base_url('common/products');?>">
							<i class="menu-icon fa fa-product-hunt"></i>
							<span class="menu-text"> Products </span>
						</a>

						<b class="arrow"></b>
					</li>
						 
  					  <!-- SalePurchase Coding for Sidebar-->
<li class="hover">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-shopping-cart"></i>
							<span class="menu-text">
								Transactions
							</span>

							<b class="arrow fa fa-angle-right"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                        
                        	<li class="hover">
								<a href="<?php echo base_url('salepurchase/GeneratePurchaseInvoice'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									 Purchase Invoice
								</a>
								<b class="arrow"></b>
							</li>
                    
                    		
                            
                         
                                                                         
						</ul>
					</li>
                    <!-- Accounts Coding for Sidebar-->
                    
                   <li class="hover">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-file-o"></i>
							<span class="menu-text">
								Accounts
							</span>

							<b class="arrow fa fa-angle-right"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
                        
                        	<li class="hover">
								<a href="<?php echo base_url('accounts/account_types'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
										Account Types
								</a>

								<b class="arrow"></b>
							</li>
                    
                    		<li class="hover">
								<a href="<?php echo base_url('accounts/account_groups'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
										Account Groups
                                </a>

								<b class="arrow"></b>
							</li>
                            
                            <li class="hover">
								<a href="<?php echo base_url('accounts/account_heads'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Account Heads
                                </a>

								<b class="arrow"></b>
							</li>
                            
                            <li class="hover">
								<a href="<?php echo base_url('accounts/account_subheads'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Account Sub Heads
                                </a>

								<b class="arrow"></b>
							</li>
                            
							<li class="hover">
								<a href="<?php echo base_url('accounts/transaction_accounts'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
								Transaction Accounts

								</a>

								<b class="arrow"></b>
							</li>
							
                            <li class="hover">
								<a href="<?php echo base_url('accounts/parties'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Parties
								</a>

								<b class="arrow"></b>
							</li>
                                                                                 
						</ul>
					</li>
                    
					<li class="">
						<a href="<?php echo base_url('dashboard/profile_setting'); ?>">
							<i class="menu-icon fa fa-wrench"></i>
							<span class="menu-text"> Settings </span>
						</a>

						<b class="arrow"></b>
					</li>
                    
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>