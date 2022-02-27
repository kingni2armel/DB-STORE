<!DOCTYPE html>
<html lang="en">
<head>
  <?php include_once('layout/lien_css.html'); ?>
  <?php include_once('layout/lien_js.html');?> 
  <title>Document</title>
</head>
<body>
 <?php $this->load->view('layout/header.php');?> 
</body>
<body>

 <div class="container" style="padding-bottom: 50px;"> 


  <div class="row"> 
    <div class="col-sm-8" style="">
      <h1 class="title-h"><?= $this->lang->line('signin_inscription') ?></h1>
      <form method="post">
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

        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="nom" placeholder="<?= $this->lang->line('signin_nom') ?>" value="<?= set_value('nom')?>">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="prenom" placeholder="<?= $this->lang->line('signin_prenom') ?>"  value="<?= set_value('prenom')?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="text" class="form-control" name="email" placeholder="<?= $this->lang->line('signin_email') ?>" value="<?= set_value('email')?>">
          </div>
          <div class="col">
            <input type="number" class="form-control" name="phone" placeholder="<?= $this->lang->line('signin_phone') ?>" value="<?= set_value('phone')?>">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="password" id="myInput" class="form-control" name="password" placeholder="<?= $this->lang->line('signin_pwd') ?>">
          </div>
          <div class="col">
            <input type="password" id="myInputs" class="form-control" name="password_confirme" placeholder="<?= $this->lang->line('signin_rpwd') ?>">
          </div>
        </div>
        <input type="checkbox" onclick="myFunction()">Show Password
        <input type="checkbox" onclick="myFunctions()">Show Password Confirm
        <p>Si vous avez déjà un compte, <a style="color:#FBD218 !important" href="<?= base_url('login') ?>">veuillez vous connecter</a> !</p>
        <button type="submit" name="signin" class="sing" style="">
            <?= $this->lang->line('signin_submit') ?>
        </button>
        <!--button type="reset" class="btn btn-danger" style="margin-top: 20px;">
          <?= $this->lang->line('signin_reset') ?>
        </button--> 
      </form>  
    </div>
    <div class="col-sm-4" style="margin-top: 50px;">
      <h5>
        <?= $this->lang->line('signin_social') ?>
      </h5>
    </div>
  </div>
</div> 

</form>

<?php
$this->load->view('/layout/footer.php'); 
?>

          <style>
            .form-control{
              /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); */

            }
            .form-control:focus{
                  box-shadow:none;
                  border:2px solid #FDB219;
            }
            .sing{
                  background-color:#FDB219 !important;
                  border:1px solid #FDB219;
                  border-radius:5px;
                  outline:none;
                  color:#FFF;
                  width:26vw;
            }
                  @media all  and (min-width:0px) and  (max-width:600px){
                      .title-h{
                        margin-top: 20vw !important;
                      }
                      .sing{
                            width:44vw;
                      }
                 

                  }
                  @media all and (min-width:0px) and  (max-width:500px){
                                    .title-h{
                                        margin-top:12vh !important;
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
function myFunctions() {
  var y = document.getElementById("myInputs");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}

</script>
</body>
</html>