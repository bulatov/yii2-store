<?php

namespace backend\controllers;

use yii\helpers\Json;
use backend\models\Category;
use common\helpers\ArrayHelper;

class ApiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSubcategories() {
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $category_id = $parents[0];
                /*$out = array_reduce(Category::getSubcategoriesByCategoryId($category_id), function($result, $item) {
                    $result[] = [ 'id' => $item->id, 'name' => $item->name ];
                    return $result;
                }, []);*/
                $out = ArrayHelper::mapArrayOfObjectToArrayOfArrays(
                    Category::getSubcategoriesByCategoryId($category_id),
                    ['id', 'name']
                );
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

}
