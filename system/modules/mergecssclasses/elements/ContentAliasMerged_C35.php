<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


class ContentAliasMerged extends \ContentAlias
{

	/**
	 * Parse the template
	 *
	 * @return string
	 */
	public function generate()
	{
		$objElement = \ContentModel::findByPk($this->cteAlias);

		if ($objElement === null)
		{
			return '';
		}

		$strClass = static::findClass($objElement->type);

		if (!class_exists($strClass))
		{
			return '';
		}

		$objElement->origId = $objElement->id;
		$objElement->id = $this->id;
		$objElement->typePrefix = 'ce_';

		/** @var \ContentElement $objElement */
		$objElement = new $strClass($objElement);

		// create new cssID array
		$cssID = array();

		// set the ID
		$cssID[0] = $this->cssID[0]?: $objElement->cssID[0];

		// merge the classes
		$arrElementClasses = explode( ' ', $this->cssID[1] );
		$arrIncludeClasses = explode( ' ', $objElement->cssID[1] ); 
		$cssID[1] = implode( ' ', array_unique( array_merge( $arrIncludeClasses, $arrElementClasses ) ) );

		// Overwrite spacing and CSS ID
		$objElement->origSpace = $objElement->space;
		$objElement->space = $this->space;
		$objElement->origCssID = $objElement->cssID;
		$objElement->cssID = $cssID;

		return $objElement->generate();
	}
}
