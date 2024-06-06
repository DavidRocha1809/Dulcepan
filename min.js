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

btn.onclick = function() {
    var buscar = document.getElementById("buscar").value;
    if (buscar == 'hola'){
        panel.innerHTML = "es una palabra española";
    }
}

const fabars = document.querySelector(".navbar container")