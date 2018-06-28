<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
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
            <h2 class="panel-title">Currency Details</h2>
            <div style="text-align:right;">
               <a class="btn bg-violet" href="<?php echo  base_url();?>Currency/newCurrency"><i class="glyphicon glyphicon-plus"></i> Add </a>
               <a href="<?php echo  base_url();?>Currency" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a>
            </div>
            <hr/>
         </div>
         <div class="container-fluid">
            <!-- content Starts Here-->
            <div class="col-md-2"></div>
            <div class="col-md-8">
               <br>
               <?php if($message == "FAILED") { ?>
               <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Action Failed !!! </strong>
               </div>
               <?php } else if($message == "SUCCESS") {  ?>
               <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong>Success !!! </strong> New Currency Updated successfully
               </div>
               <?php } ?>
               <?php foreach($currency as $row){?>
               <form name="update"   method="POST" action="<?php echo  base_url();?>Currency/editCurrency/<?php echo $row->c_id;?>" class="form-horizontal">

                <div class="form-body">
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>From Currency</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
							<select name="from_currency" class="form-control">
								<option label="-Select From Currency-"></option>
								<?php 
									$data7 = $this->db->get_where('tbl_currency' , array('is_deactivate'=> 'N'))->result();
									foreach($data7 as $data7_val)
									{
								?>
								 <option value="<?php echo $data7_val->Currencycode; ?>" <?php if($data7_val->Currencycode==$row->from_cur){echo "selected";}?>><?php echo $data7_val->Currencycode; ?></option> 
								<?php 
									}
								?>
							</select>
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>To Currency</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
							<input name="to_currency" class="form-control" value="MYR" type="text" readonly>
						
                           <span class="help-block"></span>
                        </div>
                     </div>
					 <div class="form-group">
                        <label class="control-label col-md-3"><b>Buyer Amount</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						   <input name="buyer_amt" class="form-control" type="text" value="<?php echo $row->buyer_amt; ?>">
							<span class="help-block"></span>
                        </div>
                     </div>
					<div class="form-group">
                        <label class="control-label col-md-3"><b>Seller Amount</b> <strong style="color:red;">*</strong></label>
                        <div class="col-md-9">
						   <input name="seller_amt" class="form-control" type="text" value="<?php echo $row->seller_amt; ?>">
							<span class="help-block"></span>
                        </div>
                     </div>  
                </div>

                  <div style="text-align:center">
                     <input type="submit" name="submit" value="Update" class="btn btn-success">
                     <input type="reset" value="Reset" class="btn btn-danger">
                  </div>
               </form>
               <?php
			   }
			   ?>
               <br><br>
            </div>
         </div>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
<!-- /dashboard content -->
   