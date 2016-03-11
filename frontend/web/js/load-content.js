var status_animation = "hidden"
$(document).ready(function () {
    remove_score_link();
    remove_league_link();
    add_class_border_menu();
});


// menu mobile
$(function(){
    $( window ).resize(function() {
      var width = $(window).width();

      if(width > 1024)
      {
        status_animation = "hidden";
            
            
            $('.nav-mobile').css("left" , "-300px")
            $("body").animate({left: 0},{duration: 0,step: function(value, properties) {
                    }
                }
            )
            
      }
    });

    $(".wrap-content").click(function(){
        if(status_animation == "show"){
            status_animation = "hidden";
            $("body").animate(
                {
                    left: 0,

                },
                {
                    duration: 150,
                    step: function(value, properties) {
                    }
                }
            )

        }
    })
    $("#menu-animation").click(function(){
        if(status_animation == "hidden"){
            status_animation = "show";
            $("body").animate(
                {
                    left: 200,
                },
                {
                    duration: 150,
                    step: function(value, properties) {
                        $('.nav-mobile').css("left" , "0")

                    }
                }
            )
            
        }else{
            status_animation = "hidden";
            
            $('.nav-mobile').css("left" , "-300")
            $("body").animate(
                {
                    left: 0,
                },
                {
                    duration: 700,
                    step: function(value, properties) {
                        
                    }
                }
            )
        }
    });
    
})

function add_class_border_menu(){
    $('a.active_border_1').click(function(){
        $('a.active_border_1').removeClass('active_border')
        if ( $(this).parent().hasClass('open') ){
            $(this).addClass('active_border');
        }
      
    });
}

function remove_score_link() {
    var href;
    var data_link;
    $('.sco a').each(function () {
        href = $(this).attr('href');
        $(this).removeAttr('href');
        data_link = href;
        $(this).attr('data_link', data_link);
        $(this).attr('data-toggle', 'modal');
        // $(this).attr('data-target', '#score-modal');

    })
}

function remove_league_link() {
    var href;
    var data_link;
    $('.row-tall .left a').each(function () {
        href = $(this).attr('href');
        $(this).removeAttr('href');
        data_link = href;
        $(this).attr('data_link', data_link);
    })
}

function waitting() {
    $.blockUI({
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }
    });
}

function scoreDetail() {
    $('.modal-body .cal-wrap a').click(function () {

        if (!$(this).hasClass('selected')) {
            $('.modal-body .cal-wrap a').removeClass('selected');
            $(this).addClass('selected');

            var tab_data_id = $(this).attr('data-id');

            $('.modal-body div').each(function () {
                var list_data_id = $(this).attr('data-id');
                if (typeof list_data_id !== typeof undefined && list_data_id !== false) {
                    if (tab_data_id == list_data_id && $(this).hasClass('hidden')) {
                        $(this).removeClass('hidden')
                    } else {
                        $(this).addClass('hidden');
                    }
                }
            })

        }
    })
}

function removeFooter() {
    $('.modal-body .tright').remove();
}