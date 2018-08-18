$(function() {

    $('select').selectBoxIt({
        autoWidth: false
    });

    $(".login-page span:not(.asterisk)").click(function() {
        $(this).addClass('activeform').siblings('span').removeClass('activeform')
        $('.login-page form').hide();
        $("." + $(this).data('class')).slideDown(600);
    })
    $('.live-price').keyup(function() {
        f = "<i class='fa fa-1x text-danger pr-1'> $</i> " + $(this).val()
        $('.items-price').html(f);
    })
    $('.live-desc').keyup(function() {
        f = $(this).val() + " ."
        $('.item-desc').html(f);
    })
    $('.live-name').keyup(function() {
        f = $(this).val()
        $('.item-title').html(f);
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