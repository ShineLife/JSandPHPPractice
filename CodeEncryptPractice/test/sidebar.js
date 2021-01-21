$(document).ready(function(){
    $("#sidebarCollapse").click(function() {
        $("#sidebar").toggleClass('active');
        $(".wrapper").toggleClass('superUp');
        $(this).toggleClass('active');
    })
})