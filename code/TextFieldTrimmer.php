<?php

/**
 * mysite/code/TextFieldTrimmer.php
 *
 * Trim whitespace from HTMLText, Text, and VarChar  fields
 *
 * @author Quinn Interactive, Inc.
 * @package Marketo
 */
class TextFieldTrimmer extends DataExtension {

	/**
	 * Trim HTMLText, Text, and VarChar fields before
	 * saving
	 * 
	 */
	function onBeforeWrite() {
		$owner = $this->owner;
		# get all the DataObject's fields,  including inherited fields
		# note: 'Content' and 'ID' fields are not included
		$doFields = $owner->inheritedDatabaseFields();
		$doArray = array(); # for debug only
		$debugStr = ''; # for debug only
		foreach ($doFields as $fieldName => $fieldType) {
			$doArray[$fieldName] = $fieldType; # for debug only
			if (preg_match('@^(HTMLText|Text|VarChar)@i', $fieldType)) {
				$debugStr .= "$fieldName: [" . $owner->getField($fieldName) . "]\n"; # for debug only
				$owner->$fieldName = trim($owner->getField($fieldName));
			}
		}
		//Debug::log(var_export($doArray,true));
		//Debug::log("*** Before ***\n{$debugStr}");
		parent::onBeforeWrite();
	}
	
	/**
	 * For debugging; display the fields after data is saved
	 *  
	 */
	/*
	function onAfterWrite() {
		$owner = $this->owner;
		$doFields = $owner->inheritedDatabaseFields();
		$debugStr = '';
		foreach ($doFields as $fieldName => $fieldType) {
			if (preg_match('@^(HTMLText|Text|VarChar)@i', $fieldType)) {
				$owner->$fieldName = trim($owner->getField($fieldName));
				$debugStr .= "$fieldName: [" . $owner->getField($fieldName) . "]\n";
			}
		}
		Debug::log("*** After ***\n{$debugStr}");
		parent::onAfterWrite();
	}
	*/
	
}
