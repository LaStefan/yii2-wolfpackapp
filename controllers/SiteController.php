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

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //fetch wolves from db
        $wolves = Wolves::find()->all();

        return $this->render('home', ['wolves' => $wolves]);
    }

    //Creates and loads data 
    public function actionCreate()
    {
        $wolf = new Wolves();

        $formData = Yii::$app->request;

        
        if ($formData->isPost) {
           
            if ($wolf->load($formData->post()) && $wolf->validate()) {
                if ($wolf->save()) {
                    Yii::$app->getSession()->setFlash('message', 'Wolf Added Successfully');
                    //$wolf->birthdate=Yii::$app->formatter->asDate($wolf->birthdate, "yyyy-mm-dd");
                    return $this->redirect(['index']);
                } else {
                    Yii::$app->getSession()->setFlash('failed', 'Wolf Adding Failed');
                    return $this->redirect(['index']);
                }
            }
            else
            {
                Yii::$app->getSession()->setFlash('failed', 'Wolf Adding Failed: Wrong format was used in form fields!');
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', ['wolf' => $wolf]);
        }
    }
    public function actionEdit($id)
    {      
        $wolf = Wolves::findOne($id);
        if($wolf->load(Yii::$app->request->post())&& $wolf->save())
        {
            
                Yii::$app->getSession()->setFlash('message', 'Wolf Edited Successfully');
                return $this->redirect(['index','id'=>$wolf->id]);
           
        }
        else
        {
            return $this->render('edit',['wolf'=>$wolf]);
        }

        
    }
    public function actionDelete($id)
    {
        $wolf = Wolves::findOne($id)->delete();
            if($wolf)
            {
                Yii::$app->getSession()->setFlash('message', 'Wolf Deleted Successfully');
                return $this->redirect(['index']);  
            }
        
       

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

  /**
     * Displays packs page.
     *
     * @return string
     */
    public function actionPacks()
    { 
        //fetch packs from db
        $packs = Packs::find()->all();

        
        return $this->render('packs',['packs' => $packs]);
    }
    
}
