$(document).ready(function(){
    $("#sidebarCollapse").click(function() {
        $("#sidebar").toggleClass('active');
        $(this).toggleClass('active');
    })
})