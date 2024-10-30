window.addEvent('domready', function()
{
	var $j = jQuery.noConflict();
	
	if($j('#tree').length>0)
    {
		new Tree('tree');
    
		// open the corresponding link with enter key
		$j('#tree span').bind('keypress', function(e)
		{
			if(!($j(this).attr('href')==undefined) && e.which==13)
			{
				window.location = $j(this).attr('href');
			}
		});
	}
});
