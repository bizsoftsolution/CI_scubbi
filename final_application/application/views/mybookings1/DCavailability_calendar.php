<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/bookingcalendar/media/layout.css" />
 <script src="<?php echo base_url(); ?>assets/bookingcalendar/js/daypilot/daypilot-all.min.js" type="text/javascript"></script>
<div class="content-wrapper">
<!-- Content area -->
<div class="content">
<div class="breadcrumb-line breadcrumb-line-component">
   <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
   <ul class="breadcrumb">
      <li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
      <li><a href="">Dashboard</a></li>
      <li class="active">Availability Calendar</li>
   </ul>
</div>
<br>

<div class="row">
   <div class="col-md-12">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h2 class="panel-title">Availability Calendar</h2>
			<div class="heading-elements">
				<ul class="icons-list">
					<li><a data-action="collapse"></a></li>
					<li><a data-action="reload"></a></li>
					<!-- <li><a data-action="close"></a></li> -->
				</ul>
			</div>
		</div>

		<div class="panel-body">
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-highlight">
					<li class="active" ><a href="<?php echo base_url(); ?>" >Availability Calendar</a></li>
				</ul>

				<div class="tab-content">
					<div class="active">
						<div style="float:left; width:150px;" >
							<div id="navigator"></div>
						</div>
						<div style="margin-left: 150px;" >
							<div id="scheduler"></div>
						</div> 
					</div>
				</div>
			</div>
		</div>
		<?php
			$array1="";
			if($product_id != '')
			{
				$query = $this->db->get_where('tbl_booking_availability', array('product_id' => $product_id,'table_name' =>$table));
				if($query->num_rows() > 0)
				{
					
					$result = $query->result();
					foreach($result as $row)
					{
						$booked_date = $row->bookeddate;
						$booked_dives = $row->booked_dives;
						$table_name = $row->table_name;
						$product_id1 = $row->product_id;
						$product_name = $row->product_name;
						$product_table = $this->db->get_where($table_name, array('id' => $product_id));
						$fetchProduct =  $product_table->result();
						$i=0;
						foreach ($fetchProduct as $rowProduct)
						{
							$product_max_day = $rowProduct->product_max_day;
							if($product_max_day <= $booked_dives)
							{
								$array1[] = array(
									'date' => '',
									'note' => array('')
								);
							}
							else
							{
								$array1[] = array(
									'date' => $booked_date,
									'note' => array($product_name)
								);
							}
							$i++;
						}
					}
					
				}
				else{
					$array1[] = array(
									'date' => '',
									'note' => array('')
								);
				}
				
				
			}
			else
			{
				$array1[] = array(
									'date' => '',
									'note' => array('')
								);
			}
			
			
		
		?>
		
		
			<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dncalendar-skin.css');?>">
			<form action="<?php echo base_url('DCavailabiltycalendar');?>" method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<select class="form-control" name="scountry" id="scountry"  required="">
								<option label="Select Category">Select Category</option>
								<option value="tbl_dcleisure">Leisure</option>
								<option value="tbl_dccourses">Courses</option>
								<option value="tbl_dcpackage">Packages</option>
							</select>
							
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						  <?php $cities[ '#']='Please Select' ; 
							$attr=array( 'id'=>'islands', 'class'=>'form-control', 'name'=>'islands'); ?>
							<?php echo form_dropdown($attr, 'Select Product'); ?>

						</div> 
					</div> 
					<div class="col-md-4">
						<button class="btn btn-danger" type="submit">Search</button>
					</div>
				</div>
			</form>
			
			
		<div id="dncalendar-container">
		</div>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/dncalendar.min.js');?>"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			 $('#scountry').change(function() { //any select change on the dropdown with id country trigger this code
            //	alert("dhngfdhg");
            $("#islands > option").remove(); //first of all clear select items
            var table = $('#scountry').val(); // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>DCavailabiltycalendar/get_product/"+table, //here we are calling our user controller and get_cities method with the country_id

                success: function(cities) //we're calling the response json array 'cities'
                    {
						//alert("dsfdghfgsdhfg");
                        $.each(cities, function(id, city) //here we're doing a foeach loop round each city with id as the key and city as the value
                            {
                                var opt = $('<option />'); // here we're creating a new select option with for each city
                                opt.val(id);
                                opt.text(city);
                                $('#islands').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                            });
                    }

            });

        }); 
			var markers = <?php echo json_encode($array1); ?>;
			//alert(mark);
			var my_calendar = $("#dncalendar-container").dnCalendar({
				
				
				
				monthNames: [ "January", "Febrauray", "March", "April", "May", "June", "July", "Agust", "September", "October", "November", "December" ], 
				monthNamesShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Oct', 'Nov', 'Dec' ],
				dayNames: [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                dayNamesShort: [ 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' ],
                dataTitles: { defaultDate: 'default', today : 'Today' },
                notes: markers,
                showNotes: true,
                startWeek: 'monday',
                dayClick: function(date, view) {
                	alert(date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear());
                }
			});

			// init calendar
			my_calendar.build();

			// update calendar
			// my_calendar.update({
			// 	minDate: "2016-01-05",
			// 	defaultDate: "2016-05-04"
			// });
		});
		</script>
	</div>
</div>
</div>
<!-- /dashboard content -->


<!-- /dashboard content -->