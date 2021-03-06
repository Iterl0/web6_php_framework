<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Posts;
use yii\web\ForbiddenHttpException;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
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
        return $this->render('login', [
            'model' => $model,
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


    public function actionPost()
    {
        if (!\Yii::$app->user->can('post')) {
            return $this->render('accessdenied');
        }
        $model=\app\models\Posts::findOne(Yii::$app->request->get('id'));
//        echo ('<pre>');
//        var_dump($model->attributes);
//        exit;
//        $author = \app\models\User::findIdentity($model->author);
        return $this->render('post', [
            'model' => $model,
//            'author' => $author,
        ]);
    }

    public function actionPosts()
    {
        if (!\Yii::$app->user->can('posts')) {
            return $this->render('accessdenied');
        }
        $model=\app\models\Posts::find()->all();
        var_dump($model);
        return $this->render('posts', [
            'model' => $model
        ]);

    }

//    public function beforeAction($action)
//    {
//        if (parent::beforeAction($action)) {
////            if (!\Yii::$app->user->can($action->id)) {
////                return $this->render('accessdenied');
//////                throw new ForbiddenHttpException('Access denied');
////            }
//            return true;
//        } else {
//            return false;
//        }
//    }

}