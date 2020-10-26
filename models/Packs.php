<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "packs".
 *
 * @property int $id
 * @property string $pack_name
 *
 */
class Packs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pack_name'], 'required'],
            [['pack_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pack_name' => 'Pack Name',
            
        ];
    }

    //rest of code below
    /*public function relations()
    {
        return array(
            'wolves'=>array(self::HAS_MANY, 'Wolves', 'pack_id'),
            
        );
    }*/
    public function getWolves()
    {
        return $this->hasMany(Wolves::class, ['pack_id' => 'id']);
    }
    
}
