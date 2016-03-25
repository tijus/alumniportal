<?php

namespace frontend\controllers;
use Yii;
use yii\data\Pagination;

use frontend\models\BasicInfo;
use frontend\models\EducationalDetails;
use frontend\models\Projects;
use frontend\models\TechnicalProficiency;
use frontend\models\WorkExperience;
use frontend\models\BasicInfoSearch;
use frontend\models\EducationalDetailsSearch;
use frontend\models\ProjectsSearch;
use frontend\models\TechnicalProficiencySearch;
use frontend\models\WorkExperienceSearch;
use frontend\models\ProfilePics;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPDF;
use yii\db\Query;
use yii\db\Command;
use yii\web\UploadedFile;
use yii\web\ForbiddenException;

class FormController extends Controller
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
            'only' => ['memebers-area','projects','basic-info','educational-details','technical-proficiency','work-experience','index'],
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
    public function actionMembersArea()
    {
        if(Yii::$app->user->isGuest)
        {
                return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=site/login',302);
        }
        else
        {
            return $this->render('membersarea');
        }
        
    }
    public function actionIndex()
    {
        $connection = \Yii::$app->db;

       $users = $connection->createCommand("SELECT user.*, basic_info.*, educational_details.*, 
                   projects.*, technical_proficiency.*,work_experience.* FROM user
LEFT JOIN (SELECT *
      FROM basic_info
      GROUP BY basic_info_id) basic_info
ON basic_info.basic_info_id = user.id
LEFT JOIN (SELECT *
      FROM educational_details
      GROUP BY edu_det_id) educational_details
ON educational_details.edu_det_id = user.id
LEFT JOIN (SELECT *
      FROM projects
      GROUP BY proj_id) projects
ON projects.proj_id = user.id
LEFT JOIN (SELECT *
      FROM technical_proficiency
      GROUP BY tech_prof_id) technical_proficiency
ON technical_proficiency.tech_prof_id = user.id
LEFT JOIN (SELECT *
      FROM work_experience
      GROUP BY work_exp_id) work_experience
ON work_experience.work_exp_id = user.id where user.id=".Yii::$app->user->getId());
       //$users = $connection->createCommand("SELECT * FROM basic_info where basic_info_id=".Yii::$app->user->getId());
       $model = $users->queryOne();


        return $this->render('index', [
            'model' => $model,
          
        ]);
       
    }
    public function actionBasicInfo()
    {   

            


            $model = new BasicInfo();

            if ($model->load(Yii::$app->request->post()) ) {
                $imageName=$model->first_name;
            $model->file=UploadedFile::getInstance($model,'file');
            $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);

            //save the path
            $model->profile_pic_path='uploads/'.$imageName.'.'.$model->file->extension;
            $model->basic_info_id = Yii::$app->user->getId();
            $model->first_login_date=date_create()->format('Y-m-d M:1:m');
            $model->last_profile_update_date=date_create()->format('Y-m-d M:1:m');
            $model->save();
                return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form-sync/index',302);
            } else {
                return $this->render('basicinfo', [
                    'model' => $model,
                ]);
            }
        
    }
    public function actionViewProfile()
    {
        if(Yii::$app->user->isGuest)
        {

            throw new ForbiddenException;
            
        }
        else
        {
            return $this->render('view-profile');
        }
    }
    public function actionBasicInfoUpdate($id)
    {
        $model = $this->findModelB($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->getPrimaryKey()]);
        } else {
            return $this->render('basic-info-update', [
                'model' => $model,
            ]);
        }
    }
     protected function findModelB($id)
    {
        if (($model = BasicInfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
      public function actionEducationalDetailsUpdate($id)
    {
        $model = $this->findModelE($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->getPrimaryKey()]);
        } else {
            return $this->render('educational-details-update', [
                'model' => $model,
            ]);
        }
    }
     protected function findModelE($id)
    {
        if (($model = EducationalDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
      public function actionProjectsUpdate($id)
    {
        $model = $this->findModelP($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->getPrimaryKey()]);
        } else {
            return $this->render('projects-update', [
                'model' => $model,
            ]);
        }
    }
     protected function findModelP($id)
    {
        if (($model = Projects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionTechnicalProficiencyUpdate($id)
    {
        $model = $this->findModelT($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->getPrimaryKey()]);
        } else {
            return $this->render('technical-proficiency-update', [
                'model' => $model,
            ]);
        }
    }
     protected function findModelT($id)
    {
        if (($model = TechnicalProficiency::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionWorkExperienceUpdate($id)
    {
        $model = $this->findModelW($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->getPrimaryKey()]);
        } else {
            return $this->render('work-experience-update', [
                'model' => $model,
            ]);
        }
    }
     protected function findModelW($id)
    {
        if (($model = WorkExperience::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionEducationalDetails()
    {
        $model = new EducationalDetails();
        $model->edu_det_id=Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form-sync/index',302);
        } else {
            return $this->render('educationaldetails', [
                'model' => $model,
            ]);
        }
    }
     public function actionProjects()
    {
        $model = new Projects();
        $model->proj_id=Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form-sync/index',302);
        } else {
            return $this->render('projects', [
                'model' => $model,
            ]);
        }
    }
    public function actionTechnicalProficiency()
    {
        $model = new TechnicalProficiency();
        $model->tech_prof_id=Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form-sync/index',302);
        } else {
            return $this->render('technicalproficiency', [
                'model' => $model,
            ]);
        }
    }
    public function actionWorkExperience()
    {
        $model = new WorkExperience();
         $model->work_exp_id=Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form-sync/index',302);
        } else {
            return $this->render('workexperience', [
                'model' => $model,
            ]);
    
        }
    }
    public function actionProfilePics()
    {
        $model = new ProfilePics();
        $model->profile_pic_id=Yii::$app->user->getId();
        if($model->load(Yii::$app->request->post())){
    $model->file = UploadedFile::getInstance($model, 'file');
    $save_file = '';
    if($model->file){
        $imagepath = 'uploads/profilepics/'; // Create folder under web/uploads/logo
        $model->image_path = $imagepath .rand(10,100).'-'.$model->file->name;
        $save_file = 1;
                }
     if ($model->load(Yii::$app->request->post()) && $model->save()) {
         if($save_file){
                $model->file->saveAs($model->image_path);
            }
            return $this->redirect(Yii::$app->request->baseUrl.'/index.php?r=form-sync/index',302);
        } else {
            return $this->render('profilepics', [
                'model' => $model,
            ]);
    
        }
    }
}}
   /*public function actionPdf() {
$connection = Yii::$app->db;
$query = new Query;
// compose the query
$query->select('basic_info_id')
    ->from('basic_info')
    ->limit(10);
// build and execute the query
$rows = $query->all();
// alternatively, you can create DB command and execute it
$command = $query->createCommand();
// $command->sql returns the actual SQL
$rows = $command->queryAll();
//$str=implode(" ",$rows);
print_r($rows);
        //$row=$command->queryRow(); 
        $mpdf = new mPDF;
        
        for($i=0;$i<10;$i++)
        {
            $mpdf->WriteHTML('namespace');
            $mpdf->WriteHTML('Hello');
        }
        
        $mpdf->Output();
        exit;
    }
   }
*/
