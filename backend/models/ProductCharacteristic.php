<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_characteristic".
 *
 * @property int $id
 * @property int $product_id
 * @property int $characteristic_id
 * @property int $characteristic_value_id
 *
 * @property Characteristic $characteristic
 * @property CharacteristicValue $characteristicValue
 * @property Product $product
 */
class ProductCharacteristic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_characteristic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'characteristic_id', 'characteristic_value_id'], 'required'],
            [['product_id', 'characteristic_id', 'characteristic_value_id'], 'integer'],
            [['characteristic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Characteristic::className(), 'targetAttribute' => ['characteristic_id' => 'id']],
            [['characteristic_value_id'], 'exist', 'skipOnError' => true, 'targetClass' => CharacteristicValue::className(), 'targetAttribute' => ['characteristic_value_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Название товара',
            'characteristic_id' => 'Характеристика',
            'characteristic_value_id' => 'Значение характеристики',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristic()
    {
        return $this->hasOne(Characteristic::className(), ['id' => 'characteristic_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristicValue()
    {
        return $this->hasOne(CharacteristicValue::className(), ['id' => 'characteristic_value_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
