    <!-- HOME SLIDER -->
	
    <section class="slider-container" >
        <div class="" id="masterslider">
            <!-- slide 1 -->
			
         <div class="container">

	
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
			
            

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
				<?php 
			$i=1;
			
			foreach($slider as $rowslider)
			{
			$item_class = ($i== 1) ? 'item active' : 'item';	
			?>
                <div class="<?php echo $item_class; ?>">
					<img src="<?php echo base_url(); ?>upload/slider/<?php echo $rowslider->slider; ?>" alt="Scubbi Diving Portal">
                </div>
				<?php 
				$i++;
			}
			?>
            </div>
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
		
            <!-- Left and right controls -->
            
        </div>

		</div>
        <br>
        <div class="clearfix"></div>
    </section>