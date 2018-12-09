function viewAll(){
	
	$.ajax({
    url: 'morController.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewAll"},
    success: function(data) {
	$("#mholder").html(data);
	
	}
		   });
}




function deleteMortgage(id){
if (!window.confirm("Do you really want to delete? Operation can't be undone")) { 
 return;
}	
$.ajax({
    url: 'morController.php',
    method: 'post',
	dataType:"text",
    data: {action:"delete",mortgage:id},
    success: function(data) {
	
	alert("record deleted");
	location.reload();
	}
		   });



}

function approveMortgage(mid){
	
	var send=mid;
	$.ajax({
    url: 'morController.php',
    method: 'post',
	dataType:"text",
    data: {action:"approve",mortgage:send},
    success: function(data) {
	alert(data);
	location.reload();
	}
		   });
}

function viewmortgages(event,pn){
	event.preventDefault();
	if (pn === undefined) {
          var page = 1;
    } 
	else{
	var page=pn;
	}
	$.ajax({
    url: 'morController.php',
    method: 'post',
	dataType:"text",
    data: {action:"viewAll",pagenum:page},
    success: function(data) {
	$("#mholder").html(data);
	
	}
		   });
}

