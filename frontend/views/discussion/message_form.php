<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Enter into the discusson: ' . ' ' . $var->discussion_name;
$replyModel= new frontend\models\Reply;

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
          <div class="media-body" id="message-box">
            <?php 
                  $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "portal";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "SELECT * FROM message where discussion_id=".$_GET['id'];

                $result = $conn->query($sql);
             

                if (($result->num_rows >=1)) 
                  {
                  
                  while($row = $result->fetch_assoc())
                   {
                     ?>
                     <div class="message" id=<?php echo $row["id"]*50;?>>
                          <?php 
                             $d_id=$row["discussion_id"];
                             $m_id=$row["id"];
                             $m_c_id=$row["message_creater_id"];
                             $sql1="SELECT created_by FROM discussion WHERE discussion_id=".$d_id;
                             $result1 = $conn->query($sql1);
                             $row1 = $result1->fetch_assoc();
                             $d_c_id=$row1["created_by"];
                             $message=$row["message_contents"];
                             echo $row["message_contents"];
                             
                          ?>
                     
                     
             </br>
             <small class="text-muted"><?php echo $row["username"];?> | <?php echo $row["date_time"];?></small></br>
             
                <?php              
              
                            //Report Button   
                              
                             echo Html::a
                                (   ''.'Report',
                                  ['discussion/report'], 
                                  ['class'=>'']
                                ); 
                                                
                //Checks if logged in user is the message creater or admin or discussion creater

                                if(Yii::$app->user->getid() == $m_c_id || Yii::$app->user->getid()== '1' ||  Yii::$app->user->getid()==$d_c_id )
                             {
                                echo ' | '.Html::a
                                (   'Delete',  
                                  ['delete-message','d_id'=>$d_id,'m_id'=>$m_id],
                                   ['class' => '',
                                     'data' => [
                                     'confirm' => 'Are you sure you want to delete this item?',
                                     'method' => 'post',
                                  ],
                                ]
                                );
                          
                              }  
                              //Edit Message
                              //START

                             if (Yii::$app->user->getId() == $m_c_id)
                            {       
                                
                               echo ' | '.Html::a
                                (   'Edit',
                                  [''], 
                                  ['class'=>'edit-message-button', 'value'=>$m_id]                                                               
                                );
                            }
                                                
                             ?>
                             

                            <?php 
                                  $reply_query="SELECT * FROM reply WHERE discussion_id=$d_id AND message_id=$m_id";

                                  $reply_result=$conn->query($reply_query);
                             echo Html::a
                                (   ' | '.'Reply('.$reply_result->num_rows.')',
                                  [''], 
                                  ['class'=>'reply-message-button', 'value'=>$m_id]
                                );
                                  

                                  if($reply_result->num_rows >= 1)
                                  {
                                    ?>
                                    <div id= reply<?php echo $m_id ?> class="message-form reply" style="margin-left:2em" hidden>
                                    <?php
                                       while($reply_row=$reply_result->fetch_assoc())
                                       { 
                                        ?>
                                        <hr />
                                          <div class="message-form reply-message"> 
                                            <?php echo $reply_row['reply_contents'].'</br>' ?>
                                            <small class="text-muted">
                                              <?php echo ''.$reply_row['username']?>
                                              <?php echo ' | '.$reply_row['date_time']?>
                                            </small>
                                          </div>
                                          </hr>

                                       <?php                                                  
                                       }

                                    }
                                    ?>
                            
                                    <div id= reply-message<?php echo $m_id ?> class="message-form reply-message" hidden>

                                           <?php $form = ActiveForm::begin([
                                              'id'=>'reply-message-from',
                                            'action' => ['reply-message','id'=>$d_id,'m_id'=>$m_id],
                                            'enableClientValidation' => true,
                                              'options' => [
                                                  'validateOnSubmit' => true,
                                                  'class' => 'form'
                                                  ],
                                            'method' => 'post',
                                              ]); ?>
                                          
                                            <?= $form->field($replyModel, 'reply_contents', ['inputOptions'=>['placeholder'=>'Type your message...']])->textInput(['maxlength' => false,'name'=>'reply_contents']) ?>

                                            <div class="form-group">
                                            <?= Html::submitButton($replyModel->isNewRecord ? 'Send' : 'Update', ['class' => $replyModel->isNewRecord ? 'btn btn-info btn-sm' : 'btn btn-info btn-sm']) ?>
                                              <?php echo Html::resetButton('Cancel', ['class' => 'btn btn-info btn-sm cancel-reply-button', 'value'=>$m_id]) ?>
                                              </div>

                                              <?php ActiveForm::end(); ?>

                                          </div>  
                                      <?php               


                                        
                                        ?>
                                    </div>
                            

                             <?php 

                             
                            ?>          
                                  <!--  EDIT DIV -->
                            <div id= edit-message<?php echo $m_id ?> class="message-form edit-message" hidden>
                               <?php $form = ActiveForm::begin([
                                  'id'=>'edit-message-from',
                                  'action' => ['edit-message','d_id'=>$d_id,'m_id'=>$m_id],
                                  'enableClientValidation' => true,
                                              'options' => [
                                                  'validateOnSubmit' => true,
                                                  'class' => 'form'
                                                  ],
                                  'method' => 'post',
                                ]); ?>


                                <?php echo $form->field($model, 'message_contents' )->textInput(['value'=>$row['message_contents'],'name'=>'message_contents','maxlength'=>false])?>

                                  <?php echo Html::submitButton('Save', ['class' => 'btn btn-info btn-sm ']) ?>
                                  <?php echo Html::resetButton('Cancel', ['class' => 'btn btn-info btn-sm edit-cancel', 'value'=>$m_id]) ?>
                                <?php ActiveForm::end(); ?>

                            </div>
             <hr />
             <?php
             
                  
             }
              } 
                else {
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
                
                <?= $form->field($model,'message_contents', ['inputOptions'=>['placeholder'=>'Type your message...']])->textInput(['maxlength' => false]) ?>

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





