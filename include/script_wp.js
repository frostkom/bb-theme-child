jQuery(function($)
{
	function run_ajax(obj)
	{
		obj.button.addClass('is_disabled');
		obj.selector.html("<i class='fa fa-spinner fa-spin fa-2x'></i>");

		$.ajax(
		{
			url: script_theme_child.ajax_url,
			type: 'post',
			dataType: 'json',
			data: {
				action: obj.action
			},
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

	$(document).on('click', "button[name='btnDebugRun']:not(.is_disabled)", function(e)
	{
		run_ajax(
		{
			'button': $(e.currentTarget),
			'action': 'debug_run',
			'selector': $("#debug_run")
		});
	});

	$(document).on('change blur', "#setting_theme_child_company, #setting_theme_child_type", function()
	{
		$("button[name='btnDebugRun']").addClass('is_disabled');
	});
});