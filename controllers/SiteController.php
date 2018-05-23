<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\user;
use app\models\Book;
use app\models\BookSearch;
use app\models\Paragraph;
use app\models\Save;
use app\models\PlayerList;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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


    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['hiden' => 1]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    
    public function actionOnebook($id) 
    {
        return $this->render('onebook', ['model' => $this->findBookModel($id)]);
    }
    
    public function actionPage($id) 
    {
        $playerList = PlayerList::findOne(['book_id' => $id]);
        if (!($save = save::findone(['book_id' => $id, 'user_id' => yii::$app->user->identity->id]))) {
            $save = $this->initGame($playerList);
        }
        if (Yii::$app->request->isAjax) {
            //проверки для изменений характеристик при переходе
           $save->current_paragraph = Yii::$app->request->post('number');
           if ($featureChange = Yii::$app->request->post('feature')) {
               $save->changeFeature($featureChange);
           }
           if ($ItemChange = Yii::$app->request->post('item')) {
               $save->changeItems($ItemChange);
           }
           $save->save();
           $paragraph = Paragraph::findOne(['book_id' => $id, 'number' => $save->current_paragraph]);
           return $this->renderAjax('page', compact('save', 'playerList', 'paragraph'));
        }
        $paragraph = Paragraph::findOne(['book_id' => $id, 'number' => $save->current_paragraph]);
        
        return $this->render('page', compact('save', 'playerList', 'paragraph'));
    }
    
    protected function initGame($playerList) {
        $save = new Save();
            $gameList = $playerList->generateList();
            $save->attributes = $gameList;
            $save->current_paragraph = 1;
            $save->book_id = yii::$app->request->get('id');
            $save->user_id = yii::$app->user->identity->id;
            $save->save();
            return $save;
    }
    
    
    public function actionNewgame($id){
        $save = save::findone(['book_id' => $id, 'user_id' => yii::$app->user->identity->id]);
        $id = $save->book_id;
        $save->delete();
        return $this->redirect(['page', 'id' => $id]);
    }

    
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


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
    public function actionSignup(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
            }
        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new User();
            $user->username = $model->username;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            $user->email = $model->email;
                if($user->save()){
                return $this->goHome();
                }
            }
        return $this->render('signup', compact('model'));
    } 
    
    protected function findBookModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findParModel($id)
    {
        if (($model = Paragraph::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    
    
    
    
    
    
}


