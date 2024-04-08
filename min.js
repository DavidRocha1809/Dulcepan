$(document).ready(function(){
    $('.container-options span:first').addClass('active');
    $('.container-products').hide();
    $('.container-products:first').show();

    $('.container-options span').click(function(){
        $('.container-options span').removeClass('active');
        $(this).addClass("active");
        $('.container-products').hide();

        var activeTab = $(this).data('target');
        $(activeTab).show();
        return false;
        
    })
});