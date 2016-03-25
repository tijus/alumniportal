<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\ButtonDropdown;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use kartik\icons\Icon;
use kartik\widgets\SideNav;
use kartik\widgets\Typeahead;
use frontend\widgets\Notifications;
Icon::map($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'somaiya.edu',
                'brandUrl' => '/portal/frontend/pages/index.php',
                'options' => [
                    'class' => 'navbar navbar-inverse navbar-fixed-top',
                ],
            ]);
            
            if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' =>Icon::show('user', [], Icon::BSG) . 'Signup' , 'url' => ['/site/signup']];
                $menuItems[] = ['label' =>Icon::show('log-in', [], Icon::BSG) . 'Login', 'url' => ['/site/login']];
        
                
                 echo Nav::widget([
                'options' => ['class' => 'nav navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels'=>FALSE
            ]);
         
                
          
            }
            else {

 require($_SERVER['DOCUMENT_ROOT']. '/portal/common/config/config.php');
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);*/
// Check connection
                
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$data=[];
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $data[]=$row["username"];
    }
} else {
    echo "0 results";
}
$conn->close();

 

                $menuItems[]=['label' => Icon::show('cog', [], Icon::BSG) .'Settings',
                    'items' => [
                 ['label' => 'Edit your profile', 'url' => Yii::$app->request->baseUrl.'/index.php?r=form/index'],
                 '<li class="divider"></li>',
                 ['label' => Icon::show('log-out', [], Icon::BSG) .'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']]],];
                  $menuItems[] = [
                    'label' => Icon::show('user', [], Icon::BSG) .'Hello  ' . Yii::$app->user->identity->username ,
                    'url' => ['/form/members-area'],
                    'items' => [
                 ['label' => 'View Profile', 'url' => Yii::$app->request->baseUrl.'/index.php?r=form/view-profile&id='.Yii::$app->user->getId()],
                 '<li class="divider"></li>',
                 ['label' => Icon::show('log-out', [], Icon::BSG) .'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']],
            ],
                ];
                /*$menuItemsr[]=['label'=>"Discussion Forum",'url'=>['discussion/index']];
                $menuItemsr[]=['label'=>"View members detail",'url'=>['admin-panel/index']];
                $menuItemsr[]=['label'=>"Edit Pages",'url'=>['notifications/index']];*/

?>
<div class="col-lg-4" style="margin-top: 10px;">
<?php

                echo Typeahead::widget([
    'name' =>'test',  
    'attribute' => 'state_4',
    'options' => ['placeholder' => 'Find Friends...'],
    'pluginOptions' => ['highlight'=>true],
    'dataset' => [
        [
            'local' => $data,
            'limit' => 10
        ]
    ]
]);
                
                ?>
                </div>
                <?php
                echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels'=>FALSE
            ]);
              /*  echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItemsr,
                'encodeLabels'=>FALSE
            ]);
*/
                
            } 
            
            /*else {
                
                $menuItems[] = [
                    'label' => Icon::show('user', [], Icon::BSG) .'Hello  ' . Yii::$app->user->identity->username ,
                    'url' => ['/form/members-area'],
                ];
               
                $menuItems[]=['label' => Icon::show('cog', [], Icon::BSG) .'Account Settings',
                    'url' => ['/form/index'],];
                 $menuItems[] = [
                    'label' => Icon::show('log-out', [], Icon::BSG) .'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post'],
                ];
                $menuItemsr[]=['label'=>"Discussion Forum",'url'=>['discussion/index']];
                $menuItemsr[]=['label'=>"View other members",'url'=>['other-members/members']];

                echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels'=>FALSE
            ]);
                echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'items' => $menuItemsr,
                'encodeLabels'=>FALSE
            ]);
                
            }*/
           
            NavBar::end();
        ?>
       <?php
       if(Yii::$app->user->isGuest)
       {
           ?>
           <div class="container">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                
                <?= $content ?>
            </div>
            <div class="col-lg-2">
                
                </div>
        </div>
    </div>
        
    <?php
       }
       elseif (Yii::$app->user->getId()==0){
      
       
       ?>
       <div class="container">
            <div class="col-lg-3">
            <div class="row">
            
                <?php

                echo SideNav::widget([
    'type' => SideNav::TYPE_INFO,
    'heading' => 'Edit Pages',
    'items' => [
        [
            'url' => Yii::$app->request->baseURl.'/index.php?r=notifications/index',
            'label' => 'Home',
            'icon' => 'home'
        ],
        [
            'label' => 'Edit pages',
            'icon' => 'question-sign',
            'items' => [
                ['label' => 'Edit Notifications', 'icon'=>'info-sign', 'url'=>'/index.php?r=notifications/index'],
                ['label' => 'Image Gallery', 'icon'=>'phone', 'url'=>'#'],
            ],
        ],
    ],
]);?></div>
            </div>
            <div class="col-lg-8">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
           
  
    </div>    
       <?php
         }
       else
       {
           ?>
       
        <div class="container">
        
            <div class="col-lg-1"></div>
            <div class="col-lg-7">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
           <div class="col-lg-1"></div><div style="border-right: 1px solid white; "></div>
            <div class="col-lg-3">
                
                <h2>Notifications</h2>
                <table><hr></hr></table>    
                <h4>Complete your profile</h4>                
                <div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?= Notifications::widget() ?>%">
      <a href="<?php echo Yii::$app->request->baseUrl.'/index.php?r=form-sync/index'?>">  <?= Notifications::widget()?>%</a>
  </div>
</div>
                    <br>
    <h2>News</h2>
    <table><hr></hr></table>    
    <p>Currently no news and updates</p>
</div>

            </div>

        </div>
    </div>
    <?php
       }
    ?>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; Somaiya <?= date('Y') ?></p>
        <!--<p class="pull-right"><?= Yii::powered() ?></p>-->
        
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
