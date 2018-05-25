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
							<div class="panel panel-inverse">
           
            <div class="panel-body">
                
                <div class="box box-success">
                    
                    <div class="box-body">
                        <div class="row">
                        
                        <div class="alert alert-block alert-success alert_div" style="display:none;">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
								<p class="msg_div"></p>
						</div>

                        <form id="po_form">
                        
                        <div class="col-md-6">
                                	<label for="ds">Ref. No</label>
                                 	<input type="text" class="form-control" id="ref_no" />
                                </div>
                                
                        <div class="col-md-6">
                                	<label for="ds">Purchase Date *</label>
                                 	<div class="input-group">
    									<input class="form-control date-picker required" id="po_date" type="text" data-date-format="dd-mm-yyyy" />
    									<span class="input-group-addon"> <i class="fa fa-calendar bigger-110"></i> </span> </div>
                                	</div>
                                
                        <div class="col-md-6">
                                	<label for="ds">Party *</label>
                                   <select class="form-control required" id="party_id">
                                   	<option value="">Party</option>
                                    <?php foreach($parties as $party){?>
                                    <option value="<?php echo $party['party_type_id'];?>"><?php echo $party["party_title"];?></option>
                                    <?php }?>
                                   </select>
                                </div>
                                
                               
                                
                        <br style="clear:both;" />  <br style="clear:both;" />
                             	<table id="po_table" class="table table-bordered table-hover">
                                	<thead>
                                    	<tr>
                                        	<th>Product *</th>
                                        	<th>Quantity *</th>
                                            <th>Price *</th>
                                        	<th>Discount Type</th>
                                            <th>Discount</th>
                                            <th>Value</th>
                                        	<th>&nbsp;&nbsp;</th>
                                        </tr>
                                        <tbody>
                                        	<tr id="row_1">
                                        		<td>
                                                <select class="form-control required item chosen-select">
                                                <option value="">Select Product</option>
                                                <?php foreach($products as $pro){?>
                                                <option value="<?php echo $pro['product_id'];?>"><?php echo $pro['product_name'];?></option>
                                                <?php }?>
                                                </select>
                                                </td>
                                        		<td><input onkeyup="CalculateVal(this);" id="qunatity_1" type="number" class="form-control required quantity" /></td>
                                                <td><input type="number" class="form-control required price" onkeyup="CalculateVal(this);" id="inputP_1" /></td>
                                        		<td><select onchange="calculateDiscount(this);" id="disType_1" class="form-control distype">
                                                 <option value="val">Value</option>
                                                 <option value="%">%</option>
                                                </select></td>
                                                <td><input type="number" onkeyup="calculateDiscount(this);" id="dis_1" class="form-control discount" /></td>
                                                <td><input id="input_1" type="number" readonly="readonly" class="form-control value" /></td>
                                        		<td>&nbsp;&nbsp;</td>
                                        	</tr>
                                        </tbody>
                                    </thead>
                                </table>   
                                <div class="alert alert-info col-md-12"><strong class="pull-right">Total: <span id="total"></span></strong></div>
                                 <div class="col-md-6">
                                	<label for="ds">Remarks</label>
                                 	<textarea class="form-control" id="remarks"></textarea>
                                </div>                       
          		<span><a class="btn btn-default pull-right" onclick="add_dynamic_row_purchase();">+ Add More</a></span><input type="button" style="margin-right: 5px;" value="Generate Purchase Invoice" onclick="generate_purchase_invoice('<?php echo base_url();?>');"  class="btn btn-info pull-right"></form>
               
                        </div>
                    </div>
                </div>
            </div>
        </div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			
<script type="text/javascript">
function add_dynamic_row_purchase(){
	var rowCount = $('#po_table tbody tr').length+1;
    var row = "<tr id='row_"+rowCount+"'>";
	row += "<td><select class='form-control required item chosen-select'><option value=''>Select Product</option>";
                <?php foreach($products as $item){?>
        row +="<option value='<?php echo $item['product_id'];?>'><?php echo $item['product_name'];?></option>";
                <?php }?>
		row += "</td><td><input onkeyup='CalculateVal(this);' id='qunatity_"+rowCount+"' type='number' class='form-control required quantity' /></td>";
		row += "<td><input onkeyup='CalculateVal(this);' id='inputP_"+rowCount+"'  type='number' class='form-control required price' /></td>";
		row += "<td><select onchange='calculateDiscount(this);' id='disType_"+rowCount+"' class='form-control'><option value='val'>Value</option><option value='%'>%</option></select></td>";
		row += "<td><input onkeyup='calculateDiscount(this);' type='number' id='dis_"+rowCount+"' class='form-control  disc_value' /></td>";
		row += "<td><input readonly id='input_"+rowCount+"' type='number' class='form-control  value' /></td>";
		row += "<td><span style='color:red;cursor:pointer;' onclick='deleteItem(this)' title='Remove'>X</span></td>";
		row += "</tr>"
		$("#po_table tbody").append(row);	
		$('.chosen-select').chosen({allow_single_deselect:true,  width: "100%"}); 
}
</script>