$(function() {						
	/*    */		
$(".side-menu a").each(function () {
	if (this.href == location.href) 
	$(this).addClass("active");
});	


$(".del-cat").click(function(){
        var CatId = $(this).attr("data-id-cat");
     $('#overlay').fadeIn(300);
     $(".popup-delete-category.item-" + CatId).fadeIn(500);

});

    $('.close-popup').click(function(){

        $('#overlay').fadeOut(200);
        $(".popup-delete-category").fadeOut(200);
    });



});
