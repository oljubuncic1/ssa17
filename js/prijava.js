
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




