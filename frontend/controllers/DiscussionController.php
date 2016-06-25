<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Discussion;
use frontend\models\DiscussionSearch;
use frontend\models\Message;
use frontend\models\Reply;
//use frontend\models\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\db\Connection;
use yii\db\Exception;

/**
 * DiscussionController implements the CRUD actions for Discussion model.
 */
class DiscussionController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['index','create','view','create-message','update','delete'],
            'rules' => [
                
                // allow authenticated users
               [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                // everything else is denied
            ],
        ],
        ];
    }

    /**
     * Lists all Discussion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiscussionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Discussion model.
     * @param integer $id
     * @return mixed
     */

    /*
    *Delete message
    *GET method used
    *The values will have trash info so extract from that. 
    */

    public function actionDeleteMessage()
    {
        $d_id=$_GET['d_id'];
        $m_id=$_GET['m_id'];
        $this->findModelMessage($m_id)->delete();

        return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=discussion/create-message&id='.$d_id);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**xattr_get(filename, name)
     * Creates a new Discussion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Discussion();

        $model->created_by=Yii::$app->user->getId();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=discussion/index');
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreateMessage($id)
    {
        $model = new Message();
        $var = $this->findModel($id);
        
        $model->discussion_id=$var->discussion_id;
        $model->username=Yii::$app->user->identity->username;
        $model->message_creater_id=Yii::$app->user->getId();
        $model->date_time=date("d-m-y");
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create-message', 'id' => $var->discussion_id]);
        }else{
            return $this->render('create-message',[
                'model'=>$model,
                'var'=>$var,
            ]);
        }
    }

    /**
     * Updates an existing Discussion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->discussion_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Discussion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $sql = "DELETE FROM message WHERE discussion_id=:id";
        $connection = \Yii::$app->db;
        $command = $connection->createCommand($sql);
        $command->bindValue(':id',$id);
        $command->execute();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Discussion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Discussion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Discussion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function findModelMessage($id)
    {
        if (($model = Message::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEditMessage()
    {         
        $d_id=$_GET['d_id'];
        $m_id=$_GET['m_id'];
       //$model->message_contents=$_POST['message_contents']
        $message=$_POST['message_contents'];
        $connection = \Yii::$app->db;
       
        $sql = "UPDATE message SET message_contents='$message' WHERE id=:id";

        $command = $connection->createCommand($sql);
        $command->bindValue(':id',$m_id);
        $command->execute();

        
        return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=discussion/create-message&id='.$d_id);
    }

    
    public function actionReplyMessage($id)
    {   
       $model=new Reply();
       $username=Yii::$app->user->identity->username;
       $date=date("d-m-y");
       $d_id=$_GET['id'];
       $m_id=$_GET['m_id'];
       $message=$_POST['reply_contents'];
       $connection = \Yii::$app->db;
       $sql="INSERT INTO reply(discussion_id,message_id,username,reply_contents,date_time) VALUES ('$d_id','$m_id','$username','$message','$date')";
       $command = $connection->createCommand($sql);
       $command->execute();
         

       return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=discussion/create-message&id='.$d_id);  
      
    }
}
