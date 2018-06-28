
    	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/bookingcalendar/media/layout.css" />
 <script src="<?php echo base_url(); ?>assets/bookingcalendar/js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
        <?php
            // check the input
           
        ?>
        <form id="f" action="<?php echo base_url();?>/DCavailabiltycalendar/editDateType" style="padding:20px;">
           
<!--		   
backend_update.php
<div class="form-group">
			<label class="control-label col-md-3"><b>Product Name</b> <strong style="color:red;">*</strong></label>
			<div class="col-md-9">
			   <input name="name" class="form-control" type="text"  data-popup="tooltip" title="Product Name(It is required field)" data-placement="bottom" required="">
			   <span class="help-block" ></span>
			</div>
		 </div> //-->
		 <div class="form-group">
			<label class="control-label col-md-3"><b>Assign Calendar Day Type</b> <strong style="color:red;">*</strong></label>
			<div class="col-md-9">
			   <?php 
			   $day="";
				$aa = $this->db->get_where('tbl_booking_availability',array('id' => $id))->result_array();
				foreach($aa as $row);
				$day = $row['day_type'];

			  
			   ?>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
			
			   <select class="form-control" id="type" name="dtype">
			  
					<option value="0">--unassigned--</option>
					<option value="NM" <?php if($day == 'NM') echo "selected"; ?>>Normal</option>
					<option value="WE" <?php if($day == 'WE') echo "selected"; ?>>Weekend</option>
					<option value="PK" <?php if($day == 'PK') echo "selected"; ?>>Peak</option>
					<option value="SP" <?php if($day == 'SP') echo "selected"; ?>>Superpeak</option>
					<option value="NA" <?php if($day == 'NA') echo "selected"; ?>>Not Available</option>
					
					
			   
			   </select>
			
			   <span class="help-block" ></span>
			</div>
		 </div>
		   
		   
            <div class="space"><input type="submit" value="Save" class="btn btn-success" /> <a href="javascript:close();">Cancel</a></div>
        </form>
        
        <script type="text/javascript">
       function close(result) {
            DayPilot.Modal.close(result);
        }

        $("#f").submit(function () {
            var f = $("#f");
            $.post(f.attr("action"), f.serialize(), function (result) {
                close(eval(result));
            });
            return false;
        });

        $(document).ready(function () {
            $("#type").focus();
        });
  
          /* function close(result) {
            DayPilot.Modal.close(result);
        }

        $("#f").submit(function(ev) {
            ev.preventDefault();
            var f = $("#f");
            var url = "<?php echo base_url('DCavailabiltycalendar/insertEvent');?>";
            $.post(url, f.serialize(), function (result) {
                close(eval(result));
            });            
        });

        $(document).ready(function () {
            $("#name").focus();
        }); */
        </script>
   