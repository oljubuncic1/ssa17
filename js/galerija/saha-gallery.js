$(window).on("load", function(){

    // Get modal
    var modal = $("#myModal");

    window.showDays = function(param){

        $.ajax({
        	//url: './partials/modalDays.php',
        	type: 'POST',
        	dataType: 'html',
        	data: {
        		'godina': 2013
        	},
        	success: function(data){
        		//console.log(data);
        		$('#myModal').replaceWith("<h3> TARIK </h3>");
        		modal.modal();
        	}
        });
    }
});
