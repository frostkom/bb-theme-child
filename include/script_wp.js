jQuery(function($)
{
	function run_ajax(obj)
	{
		obj.button.addClass('is_disabled');
		obj.selector.html("<i class='fa fa-spinner fa-spin fa-2x'></i>");

		$.ajax(
		{
			url: script_bb_theme_child_wp.ajax_url,
			type: 'post',
			dataType: 'json',
			data: obj.data,
			success: function(data)
			{
				obj.button.removeClass('is_disabled');

				if(data.success)
				{
					obj.selector.html(data.message);
				}

				else
				{
					obj.selector.html(data.error);
				}
			}
		});

		return false;
	}

	$(document).on('click', "button[name='btnDebugSSNRun']:not(.is_disabled)", function(e)
	{
		var dom_obj = $(e.currentTarget),
			dom_obj_action = $(e.currentTarget).attr('rel');

		run_ajax(
		{
			'button': dom_obj,
			'data': {
				'action': dom_obj_action,
				'ssn': $("#setting_theme_child_ssn").val(),
			},
			'selector': $("#" + dom_obj_action)
		});
	});

	$(document).on('click', "button[name='btnDebugNetsRun']:not(.is_disabled)", function(e)
	{
		var dom_obj = $(e.currentTarget),
			dom_obj_action = $(e.currentTarget).attr('rel');

		run_ajax(
		{
			'button': dom_obj,
			'data': {
				'action': dom_obj_action,
				'order': $("#setting_theme_child_nets_order_debug").val(),
			},
			'selector': $("#" + dom_obj_action)
		});
	});

	$(document).on('keyup', "#setting_theme_child_company_id", function()
	{
		$("#setting_theme_child_company").val('');
	});

	$(document).on('click', "button[name='btnDebugLimeRun']:not(.is_disabled)", function(e)
	{
		var dom_obj = $(e.currentTarget),
			dom_obj_action = $(e.currentTarget).attr('rel');

		run_ajax(
		{
			'button': dom_obj,
			'data': {
				'action': dom_obj_action,
				'company': $("#setting_theme_child_company").val(),
				'company_id': $("#setting_theme_child_company_id").val(),
				'type': $("#setting_theme_child_type").val(),
			},
			'selector': $("#" + dom_obj_action)
		});
	});
});