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
		<script type="text/javascript">
                var nav = new DayPilot.Navigator("navigator");
                nav.onTimeRangeSelected = function(args) {
                    var day = args.day;
                    
                    if (dp.visibleStart() <= day && day < dp.visibleEnd()) {
                        dp.scrollTo(day, "fast");
                    }
                    else {
                        var start = day.firstDayOfMonth();
                        var days = day.daysInMonth();
                        dp.startDate = start;
                        dp.days = days;
                        dp.update();
                        dp.scrollTo(day, "fast");
                        loadEvents();
                    }
                };
                nav.init();
               
                
                var dp = new DayPilot.Scheduler("scheduler");

                dp.treeEnabled = true;
                
                dp.heightSpec = "Max";
                dp.height = 300;
                
                dp.scale = "Day";
                dp.startDate = DayPilot.Date.today().firstDayOfMonth();
                dp.days = DayPilot.Date.today().daysInMonth();
                dp.cellWidth = 40;
                
                dp.eventHeight = 40;
                dp.durationBarVisible = false;
                
                dp.treePreventParentUsage = true;
                
                dp.onBeforeEventRender = function(args) {
                };
                
                
                dp.onBeforeCellRender = function(args) {
                    
                    if (args.cell.isParent) {
                        return;
                    }
                    
                    if (args.cell.start < new DayPilot.Date()) {  // past
                        return;
                    }
                    
                    if (args.cell.utilization() > 0) {
                        return;
                    }
                    
                    var color = "green";
                    var text = "AVL" ;
					
                    args.cell.html = "<div style='cursor: default; position: absolute; left: 0px; top:0px; right: 0px; bottom: 0px; padding-left: 3px; text-align: center; background-color: " + color + "; color:white;'>" + text + "</div>";
                };

                dp.timeHeaders = [
                    { groupBy: "Month", format: "MMMM yyyy" }, 
                    { groupBy: "Day", format: "d"},
					{ groupBy: "Day", format: "ddd"}
                ];
                
            
                dp.businessWeekends = true;
                dp.showNonBusiness = false;
                
                dp.allowEventOverlap = false;

                //dp.cellWidthSpec = "Auto";
                dp.bubble = new DayPilot.Bubble();
                
                dp.onTimeRangeSelecting = function(args) {
                   
                };                

                // event creating
                // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
             

                dp.init();
                
                var scrollTo = DayPilot.Date.today();
                if (new DayPilot.Date().getHours() > 12) {
                    scrollTo = scrollTo.addHours(12);
                }
                dp.scrollTo(scrollTo);

                loadResources();
                loadEvents();

                function loadResources() {
                    dp.rows.load("<?php echo base_url('DCavailabiltycalendar/datavalue'); ?>");
                }
                
                function loadEvents() {
                    dp.events.load("backend_events_busy.php");  // POST request with "start" and "end" JSON parameters
                }
                
            </script>
	</div>
</div>
</div>
<!-- /dashboard content -->


<!-- /dashboard content -->