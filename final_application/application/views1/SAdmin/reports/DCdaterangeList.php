<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">DC Date Range List</li>
   </ul>
</div>
<br><br>			
					<!-- Timeline -->
		<div style="padding:15px 5px;background:#fff;">
			<form class="form-inline" action="<?php echo base_url();?>SAReports/daterangeList" method="POST">
				<div class="row text-right">
				<div class="form-group">
					<label class="control-label col-md-3"></label>
						<link href="<?php echo base_url(); ?>assets/frontend/jquery-ui.css" rel="stylesheet" type="text/css" />
						<link href="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.css" rel="stylesheet" type="text/css" />
						<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery-ui.min.js"></script>
						<script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/jquery.maskedinput.min.js"></script>
						 <script src="<?php echo base_url(); ?>assets/guidedtour_datepicter/MonthPicker.min.js"></script>
					<div class="col-md-9">
						<div class="col-md-5">
							<input type="text" name="date_range_start" value="" id="dpd1" class="form-control">
						</div>
						<div class="col-md-2">&nbsp;</div>
						<div class="col-md-5">
							<input type="text" name="date_range_end" value="" id="dpd2" class="form-control">
						</div>
					</div>
					<script>
					jQuery(function($) {
  // The initial datepicker load
 // $('#datepicker').datepicker({
   // numberOfMonths: 3
 // });

 $( "#dpd1" ).datepicker({
	 showAnim:'slideDown',
	numberOfMonths:1,
	//minDate:0,
	dateFormat:'yy-mm-dd',
	
	onClose: function(selectedDate){
    /* var date = jQuery(this).datepicker('getDate');
    if (date) {
        date.setDate(date.getDate() + 1);
    } */
    jQuery('#dpd2').datepicker('option', 'minDate', selectedDate);
    jQuery('#dpd2').datepicker('show');
	}
	
	
	//inline: true
});

$( "#dpd2" ).datepicker({
	showAnim:'slideDown',
	numberOfMonths:1,
	dateFormat:'yy-mm-dd',
	onClose:function(selectedDate){
	$('#dpd1').datepicker("option", "maxDate", selectedDate);
	}
	//inline: true
});

  // We're going to "debounce" the resize, to prevent the datePicker
  // from being called a thousand times.  This will help performance
  // and ensure the datepicker change is only called once (ideally)
  // when the resize is OVER
  var debounce;
  // Your window resize function
  $(window).resize(function() {
    // Clear the last timeout we set up.
    clearTimeout(debounce);
    // Your if statement
    if ($(window).width() < 768) {
      // Assign the debounce to a small timeout to "wait" until resize is over
      debounce = setTimeout(function() {
        // Here we're calling with the number of months you want - 1
        debounceDatepicker(1);
      }, 250);
    // Presumably you want it to go BACK to 2 or 3 months if big enough
    // So set up an "else" condition
    } else {
      debounce = setTimeout(function() {
        // Here we're calling with the number of months you want - 3?
        debounceDatepicker(2)
      }, 250);
    }
  // To be sure it's the right size on load, chain a "trigger" to the
  // window resize to cause the above code to run onload
  }).trigger('resize');

  // our function we call to resize the datepicker
  function debounceDatepicker(no) {
    $("#dpd1").datepicker("option", "numberOfMonths", no);
  }
  
  
  
  var debounce1;
  // Your window resize function
  $(window).resize(function() {
    // Clear the last timeout we set up.
    clearTimeout(debounce1);
    // Your if statement
    if ($(window).width() < 768) {
      // Assign the debounce to a small timeout to "wait" until resize is over
      debounce1 = setTimeout(function() {
        // Here we're calling with the number of months you want - 1
        debounceDatepicker1(1);
      }, 250);
    // Presumably you want it to go BACK to 2 or 3 months if big enough
    // So set up an "else" condition
    } else {
      debounce1 = setTimeout(function() {
        // Here we're calling with the number of months you want - 3?
        debounceDatepicker1(2)
      }, 250);
    }
  // To be sure it's the right size on load, chain a "trigger" to the
  // window resize to cause the above code to run onload
  }).trigger('resize');

  // our function we call to resize the datepicker
  function debounceDatepicker1(no) {
    $("#dpd2").datepicker("option", "numberOfMonths", no);
  }
  

});
					</script>
				 </div>	
				<input type="submit" class="btn btn-primary legitRipple icon-arrow-right14 position-right" value="Search" style="margin:0 20px 0 0;" name="submit_daterangedetails">
				</div>
				
			</form>
			
		</div>
<br><br>	
	<div class="row">
   <div class="col-lg-12">
      <!-- Traffic sources -->
      <div class="panel panel-flat">
        <div class="panel-heading">
           <h2 class="panel-title">Sales List</h2>
           <div style="text-align:right;">
              <!--a class="btn bg-purple" href="<?php echo  base_url();?>SAbecomeapartner/addNew"><i class="glyphicon glyphicon-plus"></i> Add </a-->
              <!--a href="<?php echo  base_url();?>SAslider" class="btn bg-pink"><i class="glyphicon glyphicon-refresh"></i> List</a-->
           </div>
           <hr/>
        </div>
         <table class="table datatable-button-print-columns">
            <thead>
               <tr>

                 <th>Sno</th>
                 <th>Dive Center</th>
                 <th>Transaction ID</th>
				 <th>Date</th>
                 <th>Amount</th>
                 <th>action</th>

               </tr>
            </thead>
            <tbody>
            <?php
			$i=1;
			//$data = $this->db->get('tbl_booking')->result();
			//if($daterangeList != "")
			//{
              foreach($daterangeList as $row) 
			  {
            ?>
              <tr>
              <td><?php echo $i; ?></td>
              
              <td><?php echo $row->dcname; ?>
              </td>
			 <td><?php echo $row->pg_transid; ?></td>
              <td>
			<?php 
				$date_create = date('d M Y', strtotime($row->created));
				echo $date_create; 
			?>
			  </td>
			 
			  
              <td><?php echo $row->grand_total; ?></td>
              <td><?php echo $row->id; ?></td>
              
              </tr>
			<?php        
			$i++;
				}
			//}
			?>      

            </tbody>
         </table>
      </div>
      <!-- /traffic sources -->
   </div>
</div>
		
		<!-- /timeline -->