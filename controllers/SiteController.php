<?php

namespace app\controllers;

use app\models\Task;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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
        $item4lang1 = Yii::$app->request->get('item4lang1');
        $session = Yii::$app->session;
        $session->set('item4lang1', $item4lang1);
//        $arraytaskreader = Task::getTaskReader();
        return $this->render('index',['item4lang1' => $item4lang1,]);
    }
    public function actionReader(){
        $model = new Task();
        $model->language;
        $model->lvl;

        return $this->render('reader', [
            'model' => $model,
            'item4lang1' => Yii::$app->session->get('item4lang1'),
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $item4lang1 = Yii::$app->request->get('item4lang1');
        $session = Yii::$app->session;
        $session->set('item4lang1', $item4lang1);
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        if (!Yii::$app->user->isGuest) {
            return $this->render('index',[ 'item4lang1' => Yii::$app->session->get('item4lang1'),]);
        }

            return $this->render('login', [
                'model' => $model,
                'item4lang1' => Yii::$app->session->get('item4lang1'),
            ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
