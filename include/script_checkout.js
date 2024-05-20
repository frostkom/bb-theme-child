jQuery(function($)
{
	var dom_checkout_description = $(".checkout_description"),
		dom_dibs_iframe = $("#dibs-iframe");

	if(dom_checkout_description.length > 0 && dom_dibs_iframe.length > 0)
	{
		dom_dibs_iframe.prepend(dom_checkout_description.clone());
	}

	/*console.log("Init" , dom_checkout_description , dom_dibs_iframe);*/

	$(document).on('keyup', ".woocommerce-additional-fields .mf_form_field", function()
	{
		$(".woocommerce-error, .blockUI.blockOverlay").addClass('hide');
	});
});