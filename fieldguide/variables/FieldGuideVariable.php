<?php
namespace Craft;

class FieldGuideVariable {

	public function getBlockTypes($matrixFieldId) 
	{
		$blockTypes = craft()->matrix->getBlockTypesByFieldId($matrixFieldId);
		
		$blockTypesList = array();

		foreach($blockTypes as $blockType) {

			array_push($blockTypesList, array(
				'name' => $blockType->getAttribute('name'),
				'handle' => $blockType->getAttribute('handle'),
				'fields' => $blockType->getFields()
			));
		}

		return $blockTypesList;
	}

	public function getUnusedFieldIds() 
	{
		// all field ids
		$query = craft()->db->createCommand();
		$allFieldIds = $query
			->select('id')
			->from('fields')
			->order('id')
			->queryAll();
		$allFieldIds = self::array_flatten($allFieldIds);
		
		// used field ids
		$query = craft()->db->createCommand();
		$query->distinct = true;
		$usedFieldIds = $query
			->select('fieldId')
			->from('fieldlayoutfields')
			->order('fieldId')
			->queryAll();
		$usedFieldIds = self::array_flatten($usedFieldIds);
		
		// unused field ids
		$unusedFieldIds = array_diff($allFieldIds, $usedFieldIds);
		
		return $unusedFieldIds;
	}
	
	private function array_flatten($arr) {
		$arr = array_values($arr);
		while (list($k,$v)=each($arr)) {
			if (is_array($v)) {
				array_splice($arr,$k,1,$v);
				next($arr);
			}
		}
		return $arr;
	}

}