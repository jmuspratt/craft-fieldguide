<?php
namespace Craft;

class FieldGuideVariable
{
    public function getBlockTypes($matrixFieldId) {
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
}