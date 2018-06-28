<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="<?php echo base_url();?>Dashboard">Dashboard</a></li>
      <li class="active">Currency</li>
   </ul>
</div>
<br>
<!-- Main charts -->
<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
         <div class="panel-heading">
            <h2 class="panel-title">Currency</h2>
            <div style="text-align:right;">
               <!--a class="btn bg-violet" href="<?php echo  base_url();?>island/newIsland"><i class="glyphicon glyphicon-plus"></i> Add </a-->
               <a href="<?php echo  base_url();?>Currency" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <div class="col-md-2"></div>
            <div class="col-md-8">
               <br>
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> New Currency Created successfully
               </div>
               <?php } ?>
               <form name="add"   method="POST" action="<?php echo  base_url();?>Currency/newCurrency" class="form-horizontal form-validate-jquery">
                  <div class="form-body">
                     <div class="form-group">
                        <label class="control-label col-md-3"><b>From Currency</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
							<select name="from_currency" class="form-control">
								<option label="-Select From Currency-"></option>
								<?php 
									$data7 = $this->db->get_where('tbl_currency',array('is_deactivate'=> 'N'))->result();
									foreach($data7 as $data7_val)
									{
								?>
									<option value="<?php echo $data7_val->Currencycode; ?>"><?php echo $data7_val->Currencycode; ?></option>
								<?php 
									}
								?>
							</select>
                           <!--input name="name" placeholder="Name" class="form-control" type="text" required=""-->
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>To Currency</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
							<input name="to_currency" class="form-control" value="MYR" type="text" readonly>
							<!--select name="to_currency" class="form-control">
								<option label="-Select To Currency-"></option>
								<?php 
									$data8 = $this->db->get('tbl_currency')->result();
									foreach($data8 as $data8_val)
									{
								?>
									<option value="<?php //echo $data8_val->Currencycode; ?>"><?php //echo $data8_val->Currencycode; ?></option>
								<?php 
									}
								?>
							</select-->
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Buyer Amount</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						   <input name="buyer_amt" placeholder="Buyer Amount" class="form-control" type="text" required="">
							<span class="help-block"></span>
                        </div>
                     </div>
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Seller Amount</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						   <input name="seller_amt" placeholder="Seller Amount" class="form-control" type="text" required="">
							<span class="help-block"></span>
                        </div>
                     </div>
                     
                  </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit" value="Add" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>

               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
