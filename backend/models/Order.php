<?php

namespace backend\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use backend\models\OrderProduct;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $created_at
 * @property string $pay_type
 * @property string $status
 * @property string $address
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pay_type', 'status', 'address'], 'required'],
            [['created_at'], 'integer'],
            [['pay_type', 'status', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'pay_type' => 'Pay Type',
            'status' => 'Status',
            'address' => 'Address',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ]
            ]
        ];
    }

    public static function getFormattedCreatedAt() {
        return function ($model) {
            return date("j M Y H:m:s", $model->created_at);
        };
    }

    public function getItems() {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
            ->viaTable('order_product', ['order_id' => 'id']);
    }
}
