<?php

namespace Craft;

class FieldGuidePlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Field Guide');
	}

	public function getVersion()
	{
		return '1.1.1';
	}

	public function getDeveloper()
	{
		return 'James Muspratt';
	}

	public function getDeveloperUrl()
	{
		return 'http://jamesmuspratt.com';
	}
	
    public function hasCpSection()
    {
        return true;
    }

	
}