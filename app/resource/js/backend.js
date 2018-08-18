$(function() {
    $('select').selectBoxIt({
        autoWidth: false
    });
    $('[placeholder]').focus(function() {
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    })
    $('[placeholder]').blur(function() {
        $(this).attr('placeholder', $(this).attr('data-text'));
        $(this).attr('data-text', '');
    })

    $('input').each(function() {
        if ($(this).attr('required') == 'required') {
            console.log('hello')
            $(this).after("<span class='asterisk'>*</span>")
        }
    });
    field = $('.pass')
    $('.show-pass').hover(function() {
        field.attr('type', 'text')
    }, function() {
        field.attr('type', 'password')
    })

    $('.confirm').click(function() {
        return confirm('Are You Sure ?');
    })
    $('.head-view').css('cursor', 'pointer');

    $('.head-view').click(function() {
        $(this).next('.ful-view').fadeToggle(500);

    })
    $('.view-mode').click(function() {
        $(this).addClass('active').siblings('.view-mode').removeClass('active');
    })
    $('.view-mode:first').click(function() {
        $('.ful-view').fadeOut(500);
    })
    $('.view-mode:last-of-type').click(function() {

        $('.ful-view').fadeIn(500);
    })

    $('.plus-info').click(function() {

        $(this).toggleClass('selected').parents('.card').children('.card-body').slideToggle(500);
        if ($(this).hasClass('selected')) {
            $(this).find('i').removeClass('fa-plus').addClass('fa-minus')
        } else {
            $(this).find('i').removeClass('fa-minus').addClass('fa-plus')
        }
    })
    $('.show-hideSub').hover(function() {
        $(this).find('.sub-delete').fadeIn(500);
    }, function() {
        $(this).find('.sub-delete').fadeOut(500);;
    })


    function readURL(input, seleector) {

        if (input.files && input.files[0] && input.files[0].type.indexOf('image') != -1) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(seleector).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }

    }
    $("input[type='file']").change(function() {
        readURL(this, '.preview');
    });

})