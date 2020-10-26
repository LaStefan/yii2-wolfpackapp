<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Wolves;
use app\models\Packs;

class PackController extends \yii\web\Controller
{


    public function actionIndex()
    {
        //fetch packs from db
        $packs = Packs::find()->all();


        return $this->render('packs', ['packs' => $packs]);
    }
    //this method gets all the wolves without the pack 
    public function actionEdit($id)
    {  
        $packModel = Packs::findOne($id);
        $model = Wolves::find()
        ->where(['pack_id' => 0])->all();
    

        return $this->render('edit', ['packModel' => $packModel,'model'=>$model]);

       /* $packModel = Packs::findOne($id);
        $model = Wolves::find()
            ->where(['pack_id' => null])->all();


        return $this->render('edit', ['model' => $model],['packModel' => $packModel]);*/
    }
    //this method adds wolf to a specific pack
    public function actionAdd($id,$packid)
    {
       // echo 'This is wolf id:'.$id.' This is pack id:'.$packid;
        
        $wolf = Wolves::findOne($id);
        $wolf->updateCounters(['pack_id' => $packid]);
        $wolf->save();

        Yii::$app->getSession()->setFlash('message', 'Wolf Added to pack!');
        return $this->redirect(['pack/view', 'id' => $packid]);



    }

    //Creates and loads data for packs
    public function actionCreate()
    {

        $pack = new Packs();

        $formData = Yii::$app->request;


        if ($formData->isPost) {

            if ($pack->load($formData->post()) && $pack->validate()) {
                if ($pack->save()) {
                    Yii::$app->getSession()->setFlash('message', 'Pack Added Successfully');

                    return $this->redirect(['site/packs']);
                } else {
                    Yii::$app->getSession()->setFlash('failed', 'Pack Adding Failed');
                    return $this->redirect(['site/packs']);
                }
            } else {
                Yii::$app->getSession()->setFlash('failed', 'Pack Adding Failed: Wrong format was used in form fields!');
                return $this->redirect(['site/packs']);
            }
        } else {
            return $this->render('create', ['pack' => $pack]);
        }
    }
    //this function shows the specific pack 
    public function actionView($id)
    {
        $models = Packs::findOne($id);

        /*if($packs->load(Yii::$app->request->post())&& $packs->save())
        {
            
                Yii::$app->getSession()->setFlash('message', 'Pack Edited Successfully');
                return $this->redirect(['site/packs','id'=>$packs->id]);
           
        }
        else
        {
            return $this->render('view',['pack'=>$packs]);
        }*/

        return $this->render('view', ['models' => $models]);
    }
    //this function deletes pack from db
    public function actionDelete($id)
    {
        $pack = Packs::findOne($id)->delete();
        if ($pack) {
            Yii::$app->getSession()->setFlash('message', 'Pack Deleted Successfully');
            return $this->redirect(['site/packs']);
        }
    }

    public function actionDel($id)
    {
        $wolf = Wolves::findOne($id);
        $wolf->updateCounters(['pack_id' => null]);

        Yii::$app->getSession()->setFlash('message', 'Wolf Deleted from the Pack Successfully');
        return $this->redirect(['pack/view', 'id' => $wolf->pack_id]);
    }
}
