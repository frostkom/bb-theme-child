jQuery(function($)
{
	$(".pp-infolist-title .pp-infolist-title-text").each(function()
	{
		var dom_obj = $(this),
			dom_text = dom_obj.text();

		if(dom_text.match(/\/\//))
		{
			dom_text = dom_text.replace(/^https?\:\/\//i, '');
			dom_text = dom_text.replace(/^\/\//i, '');
			/*dom_text = dom_text.replace(/^www\./i, '');*/

			dom_obj.text(dom_text);
		}

		else if(dom_text.match(/\@/))
		{
			dom_obj.parents(".pp-infolist-title").html('<a class="pp-more-link" href="mailto:' + dom_text + '"><h3 class="pp-infolist-title-text">' + dom_text + '</h3></a>');
		}

		else if(dom_text.match(/^0/))
		{
			var dom_text_orig = dom_text;

			dom_text = dom_text.replace(/(\s|-)/i, '');

			dom_obj.parents(".pp-infolist-title").html('<a class="pp-more-link" href="tel:' + dom_text + '"><h3 class="pp-infolist-title-text">' + dom_text_orig + '</h3></a>');
		}
	});

	$(".fl-node-hvi4ls8tmb67, .fl-node-8aiyv1pb0kqr").each(function()
	{
		var dom_obj = $(this),
			dom_obj_tag = dom_obj.find(".fl-node-content .fl-rich-text p"),
			dom_obj_text = dom_obj_tag.text();

		if(dom_obj_tag.length == 0 || dom_obj_text.length < 2)
		{
			dom_obj.addClass('hide');
		}
	});
});