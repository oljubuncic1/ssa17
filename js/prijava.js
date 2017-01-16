// Activate Next Step

$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
   
});


$(document).ready(function() {

var nextButtons = 

$('.sljedeci').click(function(e)
{
    e.preventDefault();
    
    var $activeStep = $(document).find('ul.setup-panel li.active')
    $activeStep.removeClass('active');
    var $nextStep = $activeStep.next();
    $nextStep.addClass('active');
    $($activeStep.find('a').attr('href')).hide();
    $($nextStep.find('a').attr('href')).show();
    

});

$('.prethodni').click(function(e)
{
    e.preventDefault();
    
    var $activeStep = $(document).find('ul.setup-panel li.active')
    $activeStep.removeClass('active');
    var $prevStep = $activeStep.prev();
    $prevStep.addClass('active');
    $($activeStep.find('a').attr('href')).hide();
    $($prevStep.find('a').attr('href')).show();
    

});

});

// kod za listbox

$(document).ready(function () {
    $(".btn-select").each(function (e) {
        var value = $(this).find("ul li.selected").html();
        if (value != undefined) {
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
    });
});

$(document).on('click', '.btn-select', function (e) {
    e.preventDefault();
    var ul = $(this).find("ul");
    if ($(this).hasClass("active")) {
        if (ul.find("li").is(e.target)) {
            var target = $(e.target);
            target.addClass("selected").siblings().removeClass("selected");
            var value = target.html();
            $(this).find(".btn-select-input").val(value);
            $(this).find(".btn-select-value").html(value);
        }
        ul.hide();
        $(this).removeClass("active");
    }
    else {
        $('.btn-select').not(this).each(function () {
            $(this).removeClass("active").find("ul").hide();
        });
        ul.slideDown(300);
        $(this).addClass("active");
    }
});

$(document).on('click', function (e) {
    var target = $(e.target).closest(".btn-select");
    if (!target.length) {
        $(".btn-select").removeClass("active").find("ul").hide();
    }
});

// Add , Delete row dynamically

     $(document).ready(function(){
      var i=1;
     $("#add_row").click(function(){
              $('#addr'+i).html('<div class="form-group col-xs-12 col-md-9">\
                            <label for="fakultet">\
                                Fakultet*</label>\
                                <a class=" listbox btn btn-info btn-select btn-select-light">\
    <input type="hidden" class="btn-select-input" id="" name="fakultet' + i + '" value="" />\
    <span class="btn-select-value">S</span>\
    <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>\
    <ul class="selectLista">\
        <li class="selected">S</li>\
        <li>ETF</li>\
        <li>Medicina</li>\
        <li>Farmacija</li>\
        <li>PPF</li>\
    </ul>\
</a>\
                                  <p class="error"><?php echo $fakultetErr; ?></p>\
                        </div>\
\
                        <div class="form-group col-xs-12 col-md-3">\
                            <label for="godinaStudija">\
                                Godina studija*</label>\
                                <a class=" listbox btn btn-info btn-select btn-select-light">\
    <input type="hidden" class="btn-select-input" id="" name="godina' + i + '" value="" />\
    <span class="btn-select-value">1.</span>\
    <span class="btn-select-arrow glyphicon glyphicon-chevron-down"></span>\
    <ul class="selectLista">\
        <li class="selected">1.</li>\
        <li>2.</li>\
        <li>3.</li>\
        <li>4.</li>\
        <li>5.</li>\
        <li>6.</li>\
    </ul>\
</a>\
                                  <p class="error"><?php echo $godinaStudijaErr; ?></p>\
                        </div>\
\
\
                        <div class="form-group col-xs-12 col-md-6">\
                            <label for="odsjek">\
                                Odsjek</label>\
                            <input type="text" class="form-control" id="odsjek0" name="odsjek' + i + '"  value="<?php echo $odsjek0;?>"/>\
                        </div>\
                          <div class="form-group col-xs-12 col-md-6">\
                            \
                            <input type="button" id= "' + i +'" class="form-control btn btnObrisi delete_row' + i  +'" value="Obriši fakultet"/>\
                        </div>');




      //$('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='name"+i+"' type='text' placeholder='Name' class='form-control input-md'  /> </td><td><input  name='sur"+i+"' type='text' placeholder='Surname'  class='form-control input-md'></td><td><input  name='email"+i+"' type='text' placeholder='Email'  class='form-control input-md'></td><td><select type='text' name='gender"+i+"' class='form-control'><option name='male"+i+"' value='male'>Male</option><option name='Female"+i+"' value='Female'>Female</option><option name='3rdgen"+i+"' value='none'>None</option></select></td>");

      $('#sviFaksovi').append('<div id="addr' + (i+1) +'"></div>');
      
      $(".delete_row" + i).click(function(){
        var Addrid = $(this).attr('id');
         if(i>=1){
         $("#addr"+(Addrid)).html('');
         //i--;
         }
     });
      i++; 
  });
     

});


 $(document).ready(function(){

$('#radioBtn1 a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
});

$('#radioBtn2 a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
});

});