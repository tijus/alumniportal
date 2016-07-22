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
use yii\helpers\Url;
use yii\widgets\ActiveForm;
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
                $menuItems[] = ['label' => 'Home' , 'url' => ['/site/home']];
                $menuItems[] = ['label' => 'Gallery' , 'url' => ['/site/gallery']];
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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$data=[];
$sql = "SELECT  user.username, basic_info.*
        FROM user
         LEFT JOIN (SELECT *
      FROM basic_info
      GROUP BY basic_info_id) basic_info
ON basic_info.basic_info_id = user.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["status"] ==  null)
        {
            $data[]=$row["username"];
        }
        else
        {
        $relationship = "(".$row["status"].")";
        $data[]=$row["username"]." ".$relationship;
        }

    }
} else {
    echo "0 results";
}
$conn->close();

                    

                   $menuItems[] = ['label' => 'Home' , 'url' => ['/site/home']];
                   $menuItems[] = ['label' => 'Gallery' , 'url' => ['/site/gallery']];
                  $menuItems[] = [
                    'label' => Icon::show('user', [], Icon::BSG) .'Hello  ' . Yii::$app->user->identity->username ,
                    'url' => ['/form/members-area'],
                    'items' => [
                    ['label' => 'View Profile', 'url' => Yii::$app->request->baseUrl.'/index.php?r=form/view-profile&id='.Yii::$app->user->getId()],
                    ['label' => 'Edit your profile', 'url' => Yii::$app->request->baseUrl.'/index.php?r=form/index'],
                 
                 ['label' => 'Discussion',
                    'url' => ['/discussion']],
                 
                 '<li class="divider"></li>',
                 ['label' => Icon::show('log-out', [], Icon::BSG) .'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']]],
            
                ];
               

?>
<div class="col-lg-8" style="margin-top: 10px;">
<?php
echo '<form action ="">';
?>
<div class="col-lg-6" >
<?php






                echo Typeahead::widget([
    'name' =>'id',  
    'attribute' => 'state_4',
    'options' => ['placeholder' => 'Find Friends...'],
    'pluginOptions' => ['highlight'=>true],
    'dataset' => [
        [
            'local' => $data,
            'limit' => 10,
            'remote' => Url::to(['site/index'])  ,                
            
            'templates' => [
                'notFound' => '<div class="text-danger" style="padding:0 8px">Unable to find Friends.</div>',

                ]

        ]
    ]
]);
                
                echo '<input type="hidden" value="site/check" name="r">';
   
                ?>
                
                </div>
                <?php
   

                echo '<button class="btn btn-info" style="visibility:hidden" type="submit"><span class="glyphicon glyphicon-search"></span></button>';
                echo '</form>';
                ?>
                </div>
                <?php
                echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels'=>FALSE
            ]);

                
            } 
           
        
           
            NavBar::end();
        ?>
       <?php
       if(Yii::$app->user->isGuest)
       {
           ?>
           <div class="container">
            <div class="col-lg-2">
                
            </div>
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
                
 <h2>News</h2>
    <hr>
      <marquee direction="up" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
                    <?php
        
require($_SERVER['DOCUMENT_ROOT']. '/portal/common/config/config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

        $sql = "SELECT * FROM Notifications";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        ?>
    
                   <a href="<?php echo 'http://'.$row['Description']?>"> <p><?php echo $row["Title"];?></p></a>
                    
               
        
                <?php
                }
}else {
    echo "No Notifications";
}
$conn->close();?>
</marquee>
      
                   <hr>

                <h4>Complete your profile</h4>                
                <div class="progress">
  <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?= Notifications::widget() ?>%">
      <a href="<?php echo Yii::$app->request->baseUrl.'/index.php?r=form-sync/index'?>">  <?= Notifications::widget()?>%</a>
  </div>
</div>
                    <br>
   
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
