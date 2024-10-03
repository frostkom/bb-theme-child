jQuery(function($)
{
	var dom_checkout_description = $(".checkout_description"),
		dom_dibs_iframe = $("#dibs-iframe");

	if(dom_checkout_description.length > 0 && dom_dibs_iframe.length > 0)
	{
		dom_dibs_iframe.prepend(dom_checkout_description.clone());
	}

	$(document).on('keyup', ".woocommerce-additional-fields .mf_form_field", function()
	{
		$(".woocommerce-error, .blockUI.blockOverlay").addClass('hide');
	});

	/* Hide shipping if empty */
	/* ############################# */
	function hide_shipping_if_empty()
	{
		$(".woocommerce-shipping-totals:not(.hide)").each(function()
		{
			var dom_obj = $(this),
				dom_obj_ul = dom_obj.find("#shipping_method");

			if(dom_obj_ul.children("li").length == 1)
			{
				var dom_obj_label = dom_obj_ul.children("li").children("label").html();

				if(dom_obj_label.length == 0)
				{
					dom_obj.addClass('hide');
				}
			}
		});
	}

	hide_shipping_if_empty();

	setInterval(function()
	{
		hide_shipping_if_empty();
	}, 2000);
	/* ############################# */
});