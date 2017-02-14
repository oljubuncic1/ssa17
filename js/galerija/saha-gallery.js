$(window).on("load", function(){

    // Get modal
    var modal = $("#myModal");

    window.showDays = function(param){
        $.post('./partials/modalDays.php', {'godina': param});
        //console.log(godina);
        modal.modal();
    }
})