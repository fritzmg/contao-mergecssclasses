<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


if( version_compare( VERSION, '3.3', '<' ) )
{
	ClassLoader::addClasses(array
	(
		'ContentModuleMerged' => 'system/modules/mergecssclasses/elements/ContentModuleMerged_C32.php',
		'ContentAliasMerged'  => 'system/modules/mergecssclasses/elements/ContentAliasMerged_C32.php'
	));	
}
else
{
	ClassLoader::addClasses(array
	(
		'ContentModuleMerged' => 'system/modules/mergecssclasses/elements/ContentModuleMerged_C35.php',
		'ContentAliasMerged'  => 'system/modules/mergecssclasses/elements/ContentAliasMerged_C35.php'
	));	
}
