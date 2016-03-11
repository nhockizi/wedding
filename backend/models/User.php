<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $user_name
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $status
 * @property integer $employee_id
 * @property integer $is_admin
 * @property string $token
 * @property integer $expired_date
 * @property integer $created_date
 *
 * @property Employee $employee
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password_hash'], 'string'],
            [['status', 'employee_id', 'is_admin', 'expired_date', 'created_date'], 'integer'],
            [['user_name'], 'string', 'max' => 200],
            [['auth_key'], 'string', 'max' => 500],
            [['token'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'employee_id' => 'Employee ID',
            'is_admin' => 'Is Admin',
            'token' => 'Token',
            'expired_date' => 'Expired Date',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }
}
