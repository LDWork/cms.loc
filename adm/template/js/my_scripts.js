$(function() {						
	/*    */		
$(".side-menu a").each(function () {
	if (this.href == location.href) 
	$(this).addClass("active");
});	

});
