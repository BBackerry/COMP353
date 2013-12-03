    <script language="JavaScript" src="../assets/js/ts_picker.js">
    //Script by Denis Gritcyuk: tspicker@yahoo.com
    //Submitted to JavaScript Kit (http://javascriptkit.com)
    //Visit http://javascriptkit.com for this script
    </script>    
     <div class="container">
          <h3>Edit User:</h3>  
      <div class="panel-body">
        
        
    <form name="newsForm" action="<?php echo site_url('Admin/updateUser');?>" method="post">
        <?php foreach ($users as $user) { ?>
             <div class="form-group">
                <label for="username">Username: </label>
                <input type="Text" name="username" value="<?php echo $user->idUser;?>" readonly/>
             </div>
             <div class="form-group">
                <label for="password">Password: </label>
                <input type="Text" name="password" value="<?php echo $user->password?>"/>
             </div>
            <br/>
            <div class="form-group">
                <label for="firstname">First Name: </label>
                <input type="Text" name="firstname" value="<?php echo $user->firstName; ?>"/>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name: </label>
                <input type="Text" name="lastname" value="<?php echo $user->lastName; ?>"/>
            </div>
            <br/>
             <div class="form-group">
                <label for="email">Email: </label>
                <input type="Text" name="email" value="<?php echo $user->email; ?>"/>
            </div>
            <br/>
            <div class="form-group">
                <label for="country">Country: </label>
                <select name="country">
                    <?php foreach($country as $c){ ?>
                    <option value="<?php echo $c->idCountry; ?>" <?php if($c->idCountry == $user->country) echo "selected"; ?>><?php echo $c->countryName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="organization">Organization: </label>
                <select name="organization">
                    <?php foreach($organization as $o){ ?>
                    <option value="<?php echo $o->idOrganization; ?>" <?php if($o->idOrganization == $user->organization) echo "selected"; ?>><?php echo $o->organizationName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="department">Department: </label>
                <select name="department">
                    <?php foreach($department as $d){ ?>
                    <option value="<?php echo $d->idDepartment; ?>" <?php if($d->idDepartment == $user->department) echo "selected"; ?>><?php echo $d->departmentName; ?></option>
                    <?php } ?>
                </select>
            </div>
            <br/>
            <div class="form-group">
                <label for="interest[]">Interest In Topic: </label>
                <br/>
                <select name="interest[]" size="10" multiple>
                    <?php 
                        $parents = explode("&", substr($hierarchy, 1));
                        foreach($parents as $parent){
                            $strlen = strlen( $str );
                            $tab = "";
                            $idTopic = "";
                            for( $i = 0; $i <= strlen($parent); $i++ ) {
                                $char = substr( $parent, $i, 1 );
                                if($char === "["){ 
                                    if($idTopic !== ""){ 
                                        foreach($topic as $t){
                                            if($t->idTopic == $idTopic){ 
                                                $selected = false;
                                                foreach($interest as $topicInterest){
                                                    if($topicInterest->idTopic == $idTopic){
                                                        $selected = true;
                                                    }
                                                } 
                    ?>
                                                <option value="<?php echo $idTopic;?>" <?php echo $selected ? 'selected' : '';?>><?php echo $tab.$t->topicName;?></option>
                    <?php                       $idTopic ="";
                                            }
                                        }
                                    }
                                    $tab = $tab."&nbsp;&nbsp;";    
                                }
                                else if ($char === "]"){
                                    if($idTopic !== ""){ 
                                        foreach($topic as $t){
                                            if($t->idTopic == $idTopic){ 
                                                $selected = false;
                                                foreach($interest as $topicInterest){
                                                    if($topicInterest->idTopic == $idTopic){
                                                        $selected = true;
                                                    }
                                                } 
                    ?>
                                                <option value="<?php echo $idTopic;?>" <?php echo $selected ? 'selected' : '';?>><?php echo $tab.$t->topicName;?></option>
                    <?php                       $idTopic ="";
                                            }
                                        }
                                    }
                                    $tab = substr($tab,0, -12);
                                }
                                else{
                                    $idTopic = $idTopic.$char;
                                }
                            }
                            if($idTopic !== ""){ 
                                foreach($topic as $t){
                                    if($t->idTopic == $idTopic){ 
                                        $selected = false;
                                        foreach($interest as $topicInterest){
                                            if($topicInterest->idTopic == $idTopic){
                                                $selected = true;
                                            }
                                        } 
                    ?>
                                        <option value="<?php echo $idTopic;?>" <?php echo $selected ? 'selected' : '';?>><?php echo $tab.$t->topicName;?></option>
                    <?php               $idTopic ="";
                                    }
                                }
                            }
                        }?>
                </select>
            </div>
            <br/>
            <div class="form-group">
                <label for="expert[]">Expert In Topic: </label>
                <br/>
                <select name="expert[]" size="10" multiple>
                    <?php 
                        $parents = explode("&", substr($hierarchy, 1));
                        foreach($parents as $parent){
                            $strlen = strlen( $str );
                            $tab = "";
                            $idTopic = "";
                            for( $i = 0; $i <= strlen($parent); $i++ ) {
                                $char = substr( $parent, $i, 1 );
                                if($char === "["){ 
                                    if($idTopic !== ""){ 
                                        foreach($topic as $t){
                                            if($t->idTopic == $idTopic){ 
                                                $selected = false;
                                                foreach($expert as $topicExpert){
                                                    if($topicExpert->idTopic == $idTopic){
                                                        $selected = true;
                                                    }
                                                } 
                    ?>
                                                <option value="<?php echo $idTopic;?>" <?php echo $selected ? 'selected' : '';?>><?php echo $tab.$t->topicName;?></option>
                    <?php                       $idTopic ="";
                                            }
                                        }
                                    }
                                    $tab = $tab."&nbsp;&nbsp;";    
                                }
                                else if ($char === "]"){
                                    if($idTopic !== ""){ 
                                        foreach($topic as $t){
                                            if($t->idTopic == $idTopic){ 
                                                $selected = false;
                                                foreach($expert as $topicExpert){
                                                    if($topicExpert->idTopic == $idTopic){
                                                        $selected = true;
                                                    }
                                                } 
                    ?>
                                                <option value="<?php echo $idTopic;?>" <?php echo $selected ? 'selected' : '';?>><?php echo $tab.$t->topicName;?></option>
                    <?php                       $idTopic ="";
                                            }
                                        }
                                    }
                                    $tab = substr($tab,0, -12);
                                }
                                else{
                                    $idTopic = $idTopic.$char;
                                }
                            }
                            if($idTopic !== ""){ 
                                foreach($topic as $t){
                                    if($t->idTopic == $idTopic){ 
                                        $selected = false;
                                        foreach($expert as $topicExpert){
                                            if($topicExpert->idTopic == $idTopic){
                                                $selected = true;
                                            }
                                        } 
                    ?>
                                        <option value="<?php echo $idTopic;?>" <?php echo $selected ? 'selected' : '';?>><?php echo $tab.$t->topicName;?></option>
                    <?php               $idTopic ="";
                                    }
                                }
                            }
                        }?>
                </select>
            </div>
         
        <?php } ?>
        <button type="submit" class="btn btn-success">Save User</button>
    </form>  
       
    </div>
    <!-- Example row of columns -->

    <footer>
        <p>&copy; Best Concordia Team</p>
    </footer>
    </div> <!-- /container -->
		<script src="../assets/js/vendor/jquery-1.10.1.min.js"></script>
		<script src="../assets/js/vendor/bootstrap.min.js"></script>
		<script src="../assets/js/plugins.js"></script>
		<script src="../assets/js/main.js"></script>
    </body>
</html>
