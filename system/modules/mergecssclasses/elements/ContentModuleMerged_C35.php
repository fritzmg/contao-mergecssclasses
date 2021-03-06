<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


class ContentModuleMerged extends \ContentModule
{

	/**
	 * Parse the template
	 *
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'FE' && !BE_USER_LOGGED_IN && ($this->invisible || ($this->start != '' && $this->start > time()) || ($this->stop != '' && $this->stop < time())))
		{
			return '';
		}

		$objModule = \ModuleModel::findByPk($this->module);

		if ($objModule === null)
		{
			return '';
		}

		$strClass = \Module::findClass($objModule->type);

		if (!class_exists($strClass))
		{
			return '';
		}

		$objModule->typePrefix = 'ce_';

		/** @var \Module $objModule */
		$objModule = new $strClass($objModule, $this->strColumn);

		// create new cssID array
		$cssID = array();

		// set the ID
		$cssID[0] = $this->cssID[0]?: $objModule->cssID[0];

		// merge the classes
		$arrElementClasses = explode( ' ', $this->cssID[1] );
		$arrModuleClasses = explode( ' ', $objModule->cssID[1] ); 
		$cssID[1] = implode( ' ', array_unique( array_merge( $arrModuleClasses, $arrElementClasses ) ) );

		// Overwrite spacing and CSS ID
		$objModule->origSpace = $objModule->space;
		$objModule->space = $this->space;
		$objModule->origCssID = $objModule->cssID;
		$objModule->cssID = $cssID;

		return $objModule->generate();
	}
}
