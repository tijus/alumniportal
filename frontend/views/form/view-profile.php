
            <?php
            $this->title = 'View Profile';   
            ?>

            <h2>Profile Information</h2>
            

            <hr>
            <?php
            //require("\edexworld\config.php");
            
            $document_root=$_SERVER['DOCUMENT_ROOT'];
            include($document_root."/portal/common/config/config.php");

            $sql="Select * from basic_info where basic_info_id =".$_GET['id']."";
            
            $result = $conn->query($sql);

            if ($result->num_rows >0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                        <div class="row">
                            <div class="col-lg-3">

                                <?php
                                    //echo $row["image"];
                                echo '<div class="row">';
                                if (empty($row["profile_pic_path"]) || is_null($row["profile_pic_path"]))
                                {
                                    print '<tr>
                        <td>
                                   <img name="avatar" src="/portal/frontend/web/uploads/avatar.png" class="img-thumbnail" height="80%" width="80%"/>

                           
                        </td>
                      </tr>';   
                      
                      if($row["status"]=="alumni" || $row["status"]=="admin" || Yii::$app->user->getId()!=$_GET["id"])
                                    {}
                                else
                                {
                      echo '<div class="imgbtnadjust">';
                      /*print '<tr><td> <a href="/portal/frontend/web/index.php?r=profile_pic/index&id=<?php echo Yii::$app->user->getId();?>" class="btn btn-primary">Upload Profile Picture</a></td></tr>';*/

                      print '
                      <div class="container">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Upload Images</button>

                     
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                     
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Upload your image here</h4>
                            </div>
                            <div class="modal-body">
                            <div class="imageUploadedOrNot">
                            <h2>Please validate your image</h2>
                            <img src="#" id="blankImg">
                            </div>
                                <form action="/portal/frontend/web/php/process_image.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="uploadBtn"><input type="file" name="file" id="file" />
                                    <input type="hidden" value="'.Yii::$app->user->getId().'" name="redirectid" /></div>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Confirm Upload</button>
                                </form>
                                
                            </div>  
                            
                            
                          </div>
                          
                        </div>
                      </div>
                      
                    </div>';
                      echo '</div>';
                      ?>
                      

                      <?php

                      
                  }
                                }
                                else
                                {
                                	
                                       print '<tr>
                        <td>
                                   <img name="'.$row["profile_pic_path"].'" src="/portal/frontend/web/uploads/'.$row["profile_pic_path"].'" class="img-thumbnail"   height="160" width="160"/>
                           
                        </td>
                      </tr>';
                      echo '<div class="imgbtnadjust">';
                      /*print '<tr><td> <a href="/portal/frontend/web/index.php?r=profile_pic/index&id=<?php echo Yii::$app->user->getId();?>" class="btn btn-primary">Upload Profile Picture</a></td></tr>';*/

                      print '
                      <div class="container">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Upload Images</button>

                     
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                        
                     
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Upload your image here</h4>
                            </div>
                            <div class="modal-body">
                            <div class="imageUploadedOrNot">
                            <h2>Please validate your image</h2>
                            <img src="#" id="blankImg">
                            </div>
                                <form action="/portal/frontend/web/php/process_image.php?sessid=" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <div class="uploadBtn"><input type="file" name="file" id="file" />
                                     
                                    </div>
                                    </div>
                                      <input type="hidden" value="'.Yii::$app->user->getId().'" name="redirectid" />
                                    <button class="btn btn-primary" type="submit">Confirm Upload</button>
                                </form>
                                
                            </div>  
                            
                            
                          </div>
                          
                        </div>
                      </div>
                      
                    </div>';
                      echo '</div>';


                                }
                                echo '</div>';  
                                 
                                 
                                ?>
                            </div>
                             <div class="col-sm-6">
                                
                                    <tr>
                                        <th>
                                           <b> Name:</b>&nbsp;
                                        </th>
                                        <td>
                                            <?php echo ucwords($row["first_name"])." ".ucwords($row["last_name"]);?> 
                                        </td>
                                    </tr>
                                    
                                    <hr style="margin-top:10px; margin-bottom:10px;">
                                    <tr>
                                        <th>
                                           <b> Sex:</b>&nbsp;
                                        </th>
                                        <td>
                                            <?php echo $row["gender"];?> 
                                        </td>
                                    </tr>

                                    <hr style="margin-top:10px; margin-bottom:10px;">
                                    <tr>
                                        <th>
                                           <b> Date of Birth:</b>&nbsp;
                                        </th>
                                        <td>
                                            <?php echo $row["DOB"];?> 
                                        </td>
                                    </tr>
                                    <hr style="margin-top:10px; margin-bottom:10px;">
                                    <tr>
                                        <th>
                                           <b> Relationship with KJSIEIT:</b>&nbsp;
                                        </th>
                                        <td>
                                            <?php echo $row["status"];?> 
                                        </td>
                                    </tr>
                                    <?php 
                                    if($row["status"]=="alumni" || $row["status"]=="admin" || Yii::$app->user->getId()!=$_GET["id"])
                                    {}
                                else
                                {

                                        ?>
                                 
                                    <hr style="margin-top:10px; margin-bottom:10px;">
                                    <tr>
                                        <a href="/portal/frontend/resume/index.php?id=<?php echo Yii::$app->user->getId();?>" class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> Generate your Resume</a>

                                    </tr>
                                    <?php
                                }
                                ?>
                                    </div>
            </div>
                                    

                        <?php

                }
            } else {
            	?> 

            	<?php
                echo "<span style='color:Red'>Please fill your complete profile</span>";
            }?> 
            <?php
            $conn->close();

                        ?>
                        

