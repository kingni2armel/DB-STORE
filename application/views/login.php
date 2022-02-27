<!DOCTYPE html>
<html>
<head>
  <?php include_once('layout/lien_css.html'); ?>
  <?php include_once('layout/lien_js.html');?>
  <title>Login</title>
</head>
<body> 

          <div class="data">
                          <div class="data_items see">
                                    <img class="image-login"src="<?php  echo base_url('images/login.jpg');?>" alt="">
                          </div>
                          <div class="data_items div-exeption" style="margin-left:15px !important">
                                                                                                
                                                            <h3 class="title-h"><span class="label label-primary"><?= $this->lang->line('login_connexion') ?></span></h3> 
                                                            
                                                            <?php
                                                            if (validation_errors()) {
                                                              echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
                                                            } 
                                                            if(isset($_SESSION['msg']))
                                                            {
                                                              echo '<div class="alert alert-warning" role="alert">'.$_SESSION['msg'].'</div>';
                                                              unset($_SESSION['msg']);
                                                            }
                                                            ?>
                                                                
                                                                                  <form method="post" action=""> 
                                                            
                                                                                                  <input type="text" class="data-input" placeholder="<?= $this->lang->line('login_email') ?>" aria-label="Username"  name="login" value="<?php echo set_value('login'); if(isset($_SESSION['login'])){echo $_SESSION['login']; unset($_SESSION['login']);}?>"><br>
                                                                                                
                                                                                                  <input type="password" class="data-input"  id="myInput" placeholder="<?= $this->lang->line('login_pwd') ?>" aria-label="Username" aria-describedby="basic-addon1" name="pwd"></br>
                                                                                                  <input style="margin-left:15px" type="checkbox" onclick="myFunction()">Show Password
                                                                                            
                                                                                                <!--button type="reset" class="btn btn-danger" style="margin-top: 20px;"><?= $this->lang->line('login_reset') ?></button-->
                                                                                                <button type="submit" name="submit" class="send"><?= $this->lang->line('login_submit') ?></button>
                                                                                                <p style="margin-left:15px">Si vous n'avez pas de compte, <a href="<?= base_url('signin') ?>">veuillez vous inscrire</a> !</p>

                                                            
                                                                                  </form>
                                                              
                   
                          </div>
          </div>

  <style>
            .title-h{
                        margin-left: 10px !important;
                      }
                  @media all  and (min-width:0px) and  (max-width:600px){
                      .title-h{
                        margin-top: 20vw !important;
                      }
                  }
                  @media all and (min-width:0px) and  (max-width:600px){
                                   .title-h{
                                     margin-top: 80px !important;
                                   }
                                    
                        }
                        .data{
                          display:flex;
                          height : 500px !important;
                  
                          border:1px solid red;
                          
                        }
                        .data_items{
                          flex:1;
                        }
                        .image-login{
                          width:100%;
                          height:450px
                        }
                        .data-input{
                          width:40vw;
                          height:50px;
                          margin:15px;
                          border-radius:5px;
                          padding-left:15px;
                          border:none;
                          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                          outline:none;

                          }
                          .send{
                                background-color:#FDB219;
                                width:40vw;
                                height:50px;
                                margin:15px;
                                border-radius:5px;
                                padding-left:15px;
                                border:none;
                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                outline:none;
                                color:white;

                          }
                          .div-exeption{
                            margin-top:55px;
                          }

                          @media all  and (min-width:0px) and (max-width:600px){
                                .see{
                                  display:none;
                                }
                                .data-input{
                                  width:85vw
                                }
                                .send{
                                  width:85vw
                                }
                                .div-exeption{
                            margin-top:0px;
                          }
                          }
           </style> 
           <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
  
<?php
//debug($this->lang->line('jklm')); 
//debug( $this->session->get_userdata('language')); 
?>
  <?php $this->load->view('layout/comment');?> 
   
</body>
</html>