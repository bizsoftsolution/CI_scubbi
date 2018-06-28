
    	<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/bookingcalendar/media/layout.css" />
 <script src="<?php echo base_url(); ?>assets/bookingcalendar/js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
        <?php
            // check the input
           
        ?>
        <form id="f" action="<?php echo base_url();?>/DCavailabiltycalendar/updateDateType" style="padding:20px;">
           
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
				<input type="hidden" name="start" value="<?php echo $start; ?>">
				<input type="hidden" name="end" value="<?php echo $end; ?>">
				<input type="hidden" name="prod" value="<?php echo $res; ?>">
			   <select class="form-control" id="type" name="dtype">
					<option value="0">--unassigned--</option>
					<option value="NM">Normal</option>
					<option value="WE">Weekend</option>
					<option value="PK">Peak</option>
					<option value="SP">Superpeak</option>
					<option value="NA">Not Available</option>
					
					
			   
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
   