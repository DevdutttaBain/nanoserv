function setFooterBoxToggler(toggler) {
	$(toggler).toggle(function(){
		 $("#newswrapper").animate({ height: 'show', opacity: 'show' }, 'slow');
	   },function(){
		 $("#newswrapper").animate({ height: 'hide', opacity: 'hide' }, 'slow');
	});
}

$(function() {
	setFooterBoxToggler("#footbar");
	$("#footer").hover(function() {
		$("#footbar #license").hide();
		$("#footbar #statusbar").show();
	},function(){
		$("#footbar #license").show();
		$("#footbar #statusbar").hide();
	});
});