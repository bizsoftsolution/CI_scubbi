<div class="content-wrapper">

  <!-- Content area -->
  <div class="content">
    <div class="breadcrumb-line breadcrumb-line-component"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
			 <ul class="breadcrumb">
					<li><a href=""><i class="icon-home2 position-left"></i> Home</a></li>
					<li class="active"><a href="">Dashboard</a></li>
					<!--li class="active">Basic inputs</li-->
				</ul>
    	</div>
      <br>
    <!-- Main charts -->
    <div class="row">
      <div class="col-lg-12">
		
        <!-- Traffic sources -->
	<?php 
	if($this->session->userdata('user_type') == 'DCADMIN')
	{
	?>
		<div class="panel panel-flat">
          <div class="panel-heading" style="margin: 0px 0 -39px 0;">
            <h6 class="panel-title">Dive Center Dashboard</h6>
			<hr style="width:100%">
          </div>
		  
        <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
					<div class="panel-body" >
					<h5>Welcome to Dive Center Profile Page</h5>
					<h5>Please Use the Left Side Menu to Navigate Between Sections</h5>
					<h5>If You Need Any Assistance, Please Do Not Hesitate to Contact our Team at DCSUPPOR@SCUBBI.COM</h5>
					<p>To View Our Terms & Conditions Please <a href="<?php echo base_url('Dashboard/termsCondition'); ?>">Click Here</a></p>
					</div>
				</div> 
			</div>
        </div>
        <!-- /traffic sources -->

      </div>
		<div class="panel panel-flat">
          <div class="panel-heading">
            <h6 class="panel-title">Booking Details</h6>
          </div>
          <div class="container-fluid">

<!-- content Starts Here-->

                <!-- Quick stats boxes -->
              <div class="row">
                <div class="col-lg-4">
                  <div class="panel bg-pink">
                    <div class="panel-body">
                        <div class="col-md-12">
                           <h1 class="">Today Booking</h1><hr>
                        </div>
                        <div class="col-md-2" >
						</div>
                        <div class="col-md-6" >
                        <i class="icon-calendar22" style="font-size: 66px;"></i>
                        </div>
                        <div class="col-md-4" >
							<?php 
								$tdate = date("Y-m-d");
								$this->db->select('*');
								//$this->db->where('checkin',$tdate);
								//$this->db->where("DATE_FORMAT(created,'%Y-%m-%d')",$tdate);
								$this->db->where('dive_id',$this->session->userdata('user_id'));
								$this->db->where('status','PENDING');
								//$this->db->group_by('checkin'); 
								$resultval = $this->db->get('tbl_booking');
								$result3 = $resultval->result();
								$var="";
								foreach($result3 as $result3row)
								{
									if($result3row->pg_status != "" || $result3row->pg_signature != "" )
									{
										
										$var = $rowcount = $resultval->num_rows();
										
									}
								}
								echo '<span style="font-size: 43px;">';
								echo $var;
								echo'</span>';
							?>
						</div>
                        <div class="col-md-12">
                            <hr>
                            <a href="<?php echo base_url('DCBooking/bookingList/' . $this->session->userdata('user_id'));?>"><h5 style="color:#fff;">View Details&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-arrow-right7" style="font-size: 25px;"></i></h5></a>
                        </div>

                    <div class="container-fluid">
                      <div id="members-online"></div>
                    </div>
                  </div>
                </div>
              </div>
                <div class="col-lg-4">
                  <div class="panel bg-orange">
                    <div class="panel-body">
                        <div class="col-md-12">
                           <h1 class="">Today Review</h1><hr>
                        </div>
						 <div class="col-md-2">
                         
                        </div>
                        <div class="col-md-6" >
                        <i class="icon-medal-star" style="font-size: 66px;"></i>
                        </div>
                        <div class="col-md-4">
							<?php
								$tdate = date("Y-m-d");
								//$rval = $this->db->get('tbl_review')->row();
								//$out_date = date("Y-m-d",strtotime($rval->date));
								//if($out_date == $tdate)
								//{
									$this->db->select('*');
									
									$this->db->where("DATE_FORMAT(date,'%Y-%m-%d')",$tdate);
									$this->db->where('divecenter_id',$this->session->userdata('user_id'));
									//$this->db->group_by('checkin'); 
									$resultval = $this->db->get('tbl_review');
									echo '<span style="font-size: 43px;">';
									echo $rowcount = $resultval->num_rows();
									echo'</span>';
								//}
								
							
								
							?>
                        </div>
                        <div class="col-md-12">
                            <hr>
                             <a href="<?php echo base_url('DCreview');?>"><h5 style="color:#fff;">View Details&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-arrow-right7" style="font-size: 25px;"></i></h5></a>
                        </div>

                    <div class="container-fluid">
                      <div id="members-online"></div>
                    </div>
                  </div>
                </div>
              </div>
                                           
              <div class="col-lg-4">
                  <div class="panel bg-violet">
                    <div class="panel-body">
                        <div class="col-md-12">
                           <h1 class="">New Messages</h1><hr>
                        </div>
						 <div class="col-md-2">
                        
                        </div>
                        <div class="col-md-6" >
                        <i class="icon-comment-discussion" style="font-size: 66px;"></i>
                        </div>
                        <div class="col-md-4">
							<?php
									$tdate = date("Y-m-d");
									$this->db->select('*');
									$this->db->where("DATE_FORMAT(time,'%Y-%m-%d')",$tdate);
									//$this->db->where('from',$this->session->userdata('user_id'));
									//$this->db->or_where('to',$this->session->userdata('user_id'));
									$this->db->where('to',$this->session->userdata('user_id'));
									//$this->db->group_by('checkin'); 
									$resultval = $this->db->get('messages');
									echo '<span style="font-size: 43px;">';
									echo $rowcount = $resultval->num_rows();
									echo'</span>';
							?>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <a href="<?php echo base_url('Chat/inbox');?>"><h5 style="color:#fff;">View Details&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-arrow-right7" style="font-size: 25px;"></i></h5>
                        </div>

                    <div class="container-fluid">
                      <div id="members-online"></div>
                    </div>
                  </div>
                </div>
              </div>
              
          </div>

          <!-- Simple line chart -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Dive Center & Visiting Reports</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>
			
            <div class="panel-body">
            <script>
				// Initialize chart
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawLineChart);


// Chart settings
function drawLineChart() {
	<?php 
	$get_profile = $this->db->get_where('tbl_dcprofile', array('user_id'=>$this->session->userdata('user_id')))->row();
        $this->db->select('*');
        $data = $this->db->get_where('tbl_dive_click', array('dive_id'=>$get_profile->id))->row();
	?>
    var data = google.visualization.arrayToDataTable([
				['Month','Visiting'],
				['Jan',<?php echo $data->month1; ?>],
				['Feb',<?php echo $data->month2;  ?>],
				['Mar',<?php echo $data->month3; ?>],
				['Apr',<?php echo $data->month4; ?>],
				['May',<?php echo $data->month5; ?>],
				['Jun',<?php echo $data->month6; ?>],
				['Jul',<?php echo $data->month7; ?>],
				['Aug',<?php echo $data->month8; ?>],
				['Sep',<?php echo $data->month9; ?>],
				['Oct',<?php echo $data->month10; ?>],
				['Nov',<?php echo $data->month11; ?>],
				['Dec',<?php echo $data->month12; ?>]
				]);

    // Options
    var options = {
        fontName: 'Roboto',
        height: 400,
        curveType: 'function',
        fontSize: 12,
        chartArea: {
            left: '5%',
            width: '90%',
            height: 350
        },
        pointSize: 4,
        tooltip: {
            textStyle: {
                fontName: 'Roboto',
                fontSize: 13
            }
        },
        vAxis: {
            title: 'DC Visting Report',
            titleTextStyle: {
                fontSize: 13,
                italic: false
            },
            gridlines:{
                color: '#e5e5e5',
                count: 10
            },
            minValue: 0
        },
        legend: {
            position: 'top',
            alignment: 'center',
            textStyle: {
                fontSize: 12
            }
        }
    };

    // Draw chart
    var line_chart = new google.visualization.LineChart($('#google-line1')[0]);
    line_chart.draw(data, options);
}


// Resize chart
// ------------------------------

$(function () {

    // Resize chart on sidebar width change and window resize
    $(window).on('resize', resize);
    $(".sidebar-control").on('click', resize);

    // Resize function
    function resize() {
        drawLineChart();
    }
});

			</script>
              <div class="chart-container">
                <div class="chart" id="google-line1"></div>
              </div>
            </div>
          </div>
          <!-- /simple line chart -->
  

        </div>
        <!-- /traffic sources -->

      </div>
        
	  <?php 
	}
	elseif($this->session->userdata('user_type') == 'SUPERADMIN')
	{
	?>
	<div class="panel panel-flat">
          <!--div class="panel-heading">
            <h6 class="panel-title">Visiting Details</h6>
          </div-->
          <div class="container-fluid">

          <!-- Simple line chart -->
          <div class="panel panel-flat">
            <div class="panel-heading">
              <h5 class="panel-title">Dive Center & Visiting Reports</h5>
              <div class="heading-elements">
                <ul class="icons-list">
                          <li><a data-action="collapse"></a></li>
                          <li><a data-action="reload"></a></li>
                          <li><a data-action="close"></a></li>
                        </ul>
                      </div>
            </div>
			
            <div class="panel-body">
						<?php 
							$this->db->select('*');
							$this->db->from('tbl_dive_click');
							$this->db->join('tbl_dcprofile', 'tbl_dcprofile.id = tbl_dive_click.dive_id');
							$query = $this->db->get();
							$data2 = $query->result();
							//$data2 = $this->db->get('tbl_dive_click')->result();
							foreach($data2 as $data1)
							{
								//echo "['".$data1->dcname."', ".$data1->month1."],";
								/* $data3 = $this->db->get_where('tbl_dcprofile', array('id'=>$data1->dive_id))->result();
								foreach($data3 as $data4)
								{
									//echo "['".$data4->dcname."', ".$data1->month1."],";
									//var_dump($data4->dcname);
								} */
							}
						?>
				<script>
					// Initialize chart
					google.load("visualization", "1", {packages:["corechart"]});
					google.setOnLoadCallback(drawLineChart);


					// Chart settings
					function drawLineChart() {
						
						// Data
						var data = google.visualization.arrayToDataTable([
							['Month', 'Jan', 'Feb', 'Mar'],
							/* ['dive1', 100, 200, 300],
							['dive2', 150, 290, 310],
							['dive3', 160, 230, 390],
							['dive4', 190, 250, 320], */
							<?php 
							$this->db->select('*');
							$this->db->from('tbl_dive_click');
							$this->db->join('tbl_dcprofile', 'tbl_dcprofile.id = tbl_dive_click.dive_id');
							$query = $this->db->get();
							$data2 = $query->result();
							foreach($data2 as $data1)
							{
									//echo "['".$data1->dcname."', ".$data1->month1.", ".$data1->month2.", ".$data1->month3."],";
									//var_dump($data4->dcname);
							}
							?>
						]);

						// Options
						var options = {
							fontName: 'Roboto',
							height: 400,
							curveType: 'function',
							fontSize: 12,
							chartArea: {
								left: '5%',
								width: '90%',
								height: 350
							},
							pointSize: 4,
							tooltip: {
								textStyle: {
									fontName: 'Roboto',
									fontSize: 13
								}
							},
							vAxis: {
								title: 'BooKing & Cancellation Report',
								titleTextStyle: {
									fontSize: 13,
									italic: false
								},
								gridlines:{
									color: '#e5e5e5',
									count: 10
								},
								minValue: 0
							},
							legend: {
								position: 'top',
								alignment: 'center',
								textStyle: {
									fontSize: 12
								}
							}
						};

						// Draw chart
						var line_chart = new google.visualization.LineChart($('#google-line2')[0]);
						line_chart.draw(data, options);
					}


					// Resize chart
					// ------------------------------

					$(function () {

						// Resize chart on sidebar width change and window resize
						$(window).on('resize', resize);
						$(".sidebar-control").on('click', resize);

						// Resize function
						function resize() {
							drawLineChart();
						}
					});

				</script>
              <!--div class="chart-container">
                <div class="chart" id="google-line2"></div>
              </div-->
            </div>
          </div>
          <!-- /simple line chart -->
  

        </div>
        <!-- /traffic sources -->

      </div>
	<?php
	}
	elseif($this->session->userdata('user_type') == 'BUGSDEVELOPER')
	{
	  ?>
	  <div class="panel panel-flat">
          <div class="panel-heading" style="margin: 0px 0 -39px 0;">
            <h6 class="panel-title">Bugs</h6>
			<hr style="width:100%">
          </div>
		  
          <div class="container-fluid">

<!-- content Starts Here-->

                <!-- Quick stats boxes -->
              <div class="row">
                <div class="col-lg-12">
					<div class="panel-body" >
					
					</div>

              </div> 
          </div>
        </div>
        <!-- /traffic sources -->

      </div>
	  
	  <?php 
	}
	elseif($this->session->userdata('user_type') == 'BUGVIEWER')
	{
		echo'<div class="panel panel-flat">
          <div class="panel-heading" style="margin: 0px 0 -39px 0;">
            <h6 class="panel-title">Bugs</h6>
			<hr style="width:100%">
          </div>
		  
          <div class="container-fluid">

<!-- content Starts Here-->

                <!-- Quick stats boxes -->
              <div class="row">
                <div class="col-lg-12">
					<div class="panel-body" >
					
					</div>

              </div> 
          </div>
        </div>
        <!-- /traffic sources -->

      </div>';
	}
	elseif($this->session->userdata('user_type') == 'CUSTOM')
	{
	  ?>
	  <div class="panel panel-flat">
          <div class="panel-heading" style="margin: 0px 0 -39px 0;">
            <h6 class="panel-title">Custom</h6>
			<hr style="width:100%">
          </div>
		  
          <div class="container-fluid">

<!-- content Starts Here-->

                <!-- Quick stats boxes -->
              <div class="row">
                <div class="col-lg-12">
					<div class="panel-body" >
					
					</div>

              </div> 
          </div>
        </div>
        <!-- /traffic sources -->

      </div>
	 <?php 
	}
	 ?>
    </div>
    <!-- /dashboard content -->
