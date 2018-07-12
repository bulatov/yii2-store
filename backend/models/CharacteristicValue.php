<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "characteristic_value".
 *
 * @property int $id
 * @property int $characteristic_id
 * @property string $value
 *
 * @property Characteristic $characteristic
 * @property ProductCharacteristic[] $productCharacteristics
 */
class CharacteristicValue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'characteristic_value';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['characteristic_id', 'value'], 'required'],
            [['characteristic_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['characteristic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Characteristic::className(), 'targetAttribute' => ['characteristic_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'characteristic_id' => 'Характеристика',
            'value' => 'Значение',
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
    public function getProductCharacteristics()
    {
        return $this->hasMany(ProductCharacteristic::className(), ['characteristic_value_id' => 'id']);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getCharacteristicValues() {
        return CharacteristicValue::find()->all();
    }
}
