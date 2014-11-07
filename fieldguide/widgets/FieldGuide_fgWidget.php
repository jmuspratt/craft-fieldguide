<?php
namespace Craft;

class FieldGuide_fgWidget extends BaseWidget
{
	
	 protected $colspan = 1;
	
    public function getName()
    {
        return Craft::t('Field Guide Widget');
    }

    public function getBodyHtml()
    {
		
		return ('<a href="/admin/fieldguide">Field Guide Window</a>' );
        // return craft()->templates->render('fieldguide/_content');
		// return ("testing");
		 
    }
}