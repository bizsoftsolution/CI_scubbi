<html>
<title>Product search filtering using php and ajax - Mostlikers</title>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '529670250723692'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=529670250723692&ev=PageView
&noscript=1"/>
</noscript>
</head>
<body>

<div class="container">
     <div class="row">      
        <div class="col-sm-3 col-md-3">
          <form id="search_form">
            <div class="well">
                <h4 class="text-info">Search by Size</h4>
                <input value="3" class="sort_rang" name="size[]" value="New" type="checkbox"> 3
                <input value="2" class="sort_rang" name="size[]" value="fashion" type="checkbox"> 2
                <input value="1" class="sort_rang" name="size[]" value="New" type="checkbox"> 1
            </div>
          </form>
        </div>

    </div>
	
    <div class="row">
      <div class="ajax_result">
        <?php 
		//$all_row=$this->db->get('dive_center')->result_array();
		foreach ($divecenter as $product) { ?>		
        <div class="col-sm-3 col-md-3">
        	<div class="well">
        		<h2 class="text-info"><?php echo $product->center_name; ?></h2>
        		<p><span class="label label-info">Size : <?php echo $product->country_id; ?></span></p>        		         
        		<p><?php echo $product->address1; ?></p>
        		<hr>
        		<h3><?php echo $product->email_id; ?></h3>
             
        	</div>
        </div>        
        <?php } ?>

     </div>
	</div>
	
</div>
</body>
</html>
<script type="text/javascript">
$(document).on('change','.sort_rang',function(){
	var formData = new FormData($('#search_form')[0]);
	//alert('hiiiiiii');
   var url = "<?php echo base_url(); ?>Filter/filter1";
   $.ajax({
     type: "POST",
     url: url,
     data: formData,
	  dataType: "JSON",
     success: function(data)
     {                  
        //$('.ajax_result').html(data);
		alert('hiiiiiii');
     }               
   });
  return false;
});
</script>