<?php
namespace app\models;
use yii\db\ActiveRecord;


class Wolves extends ActiveRecord{

    private $id;
    private $pack_id;
    private $name;
    private $gender;
    private $birthdate;
    private $location;

    public function rules(){
        return [
            [['name','gender','birthdate','location'],'required'],

            [['birthdate'],'date'],
           
            
        ];
    }
   /* public function relations()
    {
        return array(
            'pack'=>array(self::BELONGS_TO, 'Packs', 'pack_id'),
            
        );
    }*/
    public function getPack()
    {
        return $this->hasOne(Packs::class, ['id' => 'pack_id']);
    }
  
    
}


?>