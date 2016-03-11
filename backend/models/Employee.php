<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property integer $id
 * @property string $code
 * @property string $full_name
 * @property integer $birthday
 * @property double $phone
 * @property string $email
 * @property integer $is_official
 * @property integer $is_disable
 * @property integer $is_delete
 *
 * @property User[] $users
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['birthday', 'is_official', 'is_disable', 'is_delete'], 'integer'],
            [['phone'], 'number'],
            [['code', 'full_name'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'full_name' => 'Full Name',
            'birthday' => 'Birthday',
            'phone' => 'Phone',
            'email' => 'Email',
            'is_official' => 'Is Official',
            'is_disable' => 'Is Disable',
            'is_delete' => 'Is Delete',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['employee_id' => 'id']);
    }
}
