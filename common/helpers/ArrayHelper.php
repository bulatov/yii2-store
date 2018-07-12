<?php

namespace common\helpers;

class ArrayHelper extends \yii\helpers\ArrayHelper {

    /**
     * @param $array array of objects
     * @param array $keys are used to filter object properties
     * @return array array of arrays
     */
    public static function mapArrayOfObjectToArrayOfArrays($array, $keys) {
        return array_reduce($array, function($result, $item) use ($keys) {
            $arrayToPush = [];

            foreach($keys as $key) {
                $arrayToPush[$key] = $item->{$key};
            }

            $result[] = $arrayToPush;

            return $result;
        }, []);
    }
}