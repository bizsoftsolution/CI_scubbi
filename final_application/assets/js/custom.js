


function showModal(modalType, title, alertText)
{
	if(modalType=='SUCCESS')
	{
		$('#globalModalAlert').addClass('modal-success');
		$('#globalModalAlert .modal-header').html('<i class="fa fa-check-circle"></i>');
		$('#globalModalAlert .modal-title').html(title);
		$('#globalModalAlert .modal-body').html(alertText);
		$('#globalModalAlert').modal('show');
	}
	else if(modalType=="FAILED" || modalType=="ERROR")
	{
		$('#globalModalAlert').addClass('modal-danger');
		$('#globalModalAlert .modal-header').html('<i class="fa fa-times-circle"></i>');
		$('#globalModalAlert .modal-title').html(title);
		$('#globalModalAlert .modal-body').html(alertText);
		$('#globalModalAlert').modal('show');
	}
	else if(modalType=="WARNING")
	{
		$('#globalModalAlert').addClass('modal-warning');
		$('#globalModalAlert .modal-header').html('<i class="fa fa-warning"></i>');
		$('#globalModalAlert .modal-title').html(title);
		$('#globalModalAlert .modal-body').html(alertText);
		$('#globalModalAlert').modal('show');
	}
	else
	{
		$('#globalModalAlert').addClass('modal-warning');
		$('#globalModalAlert .modal-header').html('<<i class="fa fa-info-circle"></i></i>');
		$('#globalModalAlert .modal-title').html(title);
		$('#globalModalAlert .modal-body').html(alertText);
		$('#globalModalAlert').modal('show');
	}
}
/*inline editing */


function inlineEditCall(id)
    {

        $('#'+id).find('.inlineEdit_input').removeClass('hidden');
        $('#'+id).find('.inlineEdit_output').addClass('hidden');
        $('#'+id).find('.inlineEdit_link').addClass('hidden');
        $('#'+id).find('.inlineSave_link').removeClass('hidden');
        return false;
    }
    function inlineSaveCall(id, url)
    {

        $('#'+id).find('.inlineEdit_input').addClass('hidden');
        $('#'+id).find('.inlineEdit_output').removeClass('hidden');

        var data = $('#'+id+ " :input").serialize();

                $.ajax({
                    url:url,
                    type:'POST',
                    data:data

                });

                $('#'+id +'  .inlineEdit_input').each(function(){
                $(this).closest('td').find('.inlineEdit_output').html($(this).val());

                });

                $('#'+id).find('.inlineEdit_link').removeClass('hidden');
                $('#'+id).find('.inlineSave_link').addClass('hidden');

			return false;

    }
	/* inline editing ends here */

// deleteFunction  start

	function deleteAction(url,callback)
	{
		
		bootbox.confirm({
			message: "Are you sure?",
			title: "<i class='fa fa-trash'> </i> &nbsp;&nbsp; Confirm Delete",
			callback: function(result) {
				// alert("Confirm result: " + result);
				if(result)
				{
					// ajax call starts
					$.ajax({
						url:url,
						success: function(data){ 
								callback.call("SUCCESS"); // return "SUCCESS";
							},
						error: function(){ 
								callback.call("ERROR"); // return "ERROR";
							},
						statusCode: {
								404: function() {
								  alert( "page not found" );
								}
							}				
					}); 
					// ajax call ends					
				}
				else{
					callback.call("CANCEL"); // return ERROR";
				}
			},
			className: "bootbox-sm bootbox-danger"
		});		

	}

	function updateStatusAction(url,callback)
	{
		
		bootbox.confirm({
			message: "Are you sure?",
			title: "<i class='fa fa-retweet'> </i> &nbsp;&nbsp; Change Status",
			callback: function(result) {
				if(result)
				{
					// ajax call starts
					$.ajax({
						url:url,
						success: function(data){ 
								callback.call("SUCCESS"); // return "SUCCESS";
							},
						error: function(){ 
								callback.call("ERROR"); // return "ERROR";
							},
						statusCode: {
								404: function() {
								  alert( "page not found" );
								}
							}				
					}); 
					// ajax call ends					
				}
				else{
					callback.call("CANCEL"); // return ERROR";
				}
			},
			className: "bootbox-sm bootbox-danger"
		});		

	}	
// deleteFunction ends 	
// ajaxActionFunction  start
/*
	function ajaxAction(url,submitData='null',handleData='null')
	{
		var ajaxActionResult;
		$.ajax({
				url:url,
				data: submitData,
				async:false,
				success: function(data){ 
						ajaxActionResult = "SUCCESS";
					},
				error: function(){ 
						ajaxActionResult = "ERROR";
					},
				statusCode: {
						404: function() {
						  ajaxActionResult =  "404";
						}
					}				
					
			}); 
		return ajaxActionResult;
	}
	*/
// ajaxActionFunction ends 	




