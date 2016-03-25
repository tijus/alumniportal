<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Enter into the discusson: ' . ' ' . $var->discussion_name;

/* @var $this yii\web\View */
/* @var $model frontend\models\Message */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discussion-messages">
<h1><?= Html::encode($this->title) ?></h1>
    
    <div class="container">
<div class="row " style="padding-top:20px;">
   
    <br /><br />
    <div class="col-md-8" style="margin-left: -40px;">
        <div class="panel panel-info">
            <div class="panel-heading">
                DISCUSSIONS:
            </div>
            <div class="panel-body">
<ul class="media-list">

                                    <li class="media">

                                        <div class="media-body">

                                            <div class="media">
                                                <!--<a class="pull-left" href="#">
                                                    <img class="media-object img-circle " src="assets/img/user.png" />
                                                </a>-->
                                                <div class="media-body" >
                                                  <?php $servername = "localhost";
                                                        $username = "root";
                                                        $password = "";
                                                        $dbname = "portal";

                                                        // Create connection
                                                        $conn = new mysqli($servername, $username, $password, $dbname);
                                                        // Check connection
                                                        if ($conn->connect_error) {
                                                            die("Connection failed: " . $conn->connect_error);
                                                        } 

                                                        $sql = "SELECT * FROM message where message_id=".$_GET['id'];
                                                        $result = $conn->query($sql);

                                                        if (($result->num_rows >=1)) {
                                                            while($row = $result->fetch_assoc()) {
                                                                echo $row["message_contents"];?>
                                                            

                                                    <br />
                                                    <small class="text-muted"><?php echo $row["username"];?> | <?php echo $row["date_time"];?></small>
                                                    
                                                    <hr />
                                                    <?php
                                                    }
                                                            
                                                        } else {
                                                            echo "No post on this topic available";
                                                        }
                                                        $conn->close();?>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                </ul>
            </div>
            <div class="panel-footer">
                
                    <div class="message-form">

                    <?php $form = ActiveForm::begin(); ?>
                    
                    <?= $form->field($model, 'message_contents', ['inputOptions'=>['placeholder'=>'Type your message...']])->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Send' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

</div>
                </div>
            </div>
        </div>
    </div>
    
</div>
  </div>





