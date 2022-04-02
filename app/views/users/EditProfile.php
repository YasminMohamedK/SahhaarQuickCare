<link rel="stylesheet" href="<?php echo URLROOT; ?>css/styleLoginReg.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/deleteConfirm.css">

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<?php

class EditProfile extends view
{
  public function output()
  {
    $title = $this->model->title;

    require APPROOT . '/views/inc/header.php';
    $text = <<<EOT
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4"> <center>$title</center></h1>
    </div>
  </div>

  </div>
  </div>
  </div>
EOT;
    echo $text;
    $this->printForm();
    require APPROOT . '/views/inc/footer.php';
  }

  private function printForm()
  {
    $action = URLROOT . 'users/editprofile';
    $loginUrl = URLROOT . 'users/login';

    $text = <<<EOT
    <div class="Regform">
    <div class="row">
    <div class="col-md-12 mx-auto">
    <div class="card card-body bg-light mt-6">
    <h2>Edit Profile</h2>
    <form action="$action" method="post" >
EOT;
    echo $text;
    $this->printFName();
    $this->printLName();
    $this->printEmail();
    $this->printPassword();
    $this->printConfirmPassword();
    $this->printAddress();
    $this->printMobile();
   ?>
    <div class="container">
      <div class="row mt-4">
        <div class="col">
          <input type="submit" value="Edit Profile" class="form-control btn btn-warning btn-block">
        </div>
        <div class="col">
        <input type="button" value="Delete Profile" class="form-control btn btn-danger btn-block"  onclick="document.getElementById('id01').style.display='block'">
        <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" action="<?php $action ?>">
    <div class="container">
      <h1>Delete Account</h1>
      <p>Are you sure you want to delete your account?</p>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
      </div>
    </div>
  </form>
</div>
        </div>
      </div>
      </div>
    </form>
    </div>
    </div>
    </div>
<?php
  }

  private function printFName()
  {
    $val = "yasmin";
    $err = $this->model->getFNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'first_name', $val, $err, $valid,'bi bi-person-circle');
  }
  private function printLName()
  {
    $val = "kandil";
    $err = $this->model->getLNameErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'last_name', $val, $err, $valid,'bi bi-person-circle');
  }
  private function printEmail()
  {
    $val = "kandil@gmail.com";
    $err = $this->model->getEmailErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('email', 'email', $val, $err, $valid,'bi bi-envelope-fill');
  }

  private function printPassword()
  {
    $val = ".........";
    $err = $this->model->getPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('password', 'password', $val, $err, $valid,'bi bi-lock-fill');
  }
  private function printConfirmPassword()
  {
    $val = ".........";
    $err = $this->model->getConfirmPasswordErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('password', 'confirm_password', $val, $err, $valid,'bi bi-lock-fill');
  }
  private function printAddress()
  {
    $val ="new cairo";
    $err = $this->model->getAddressErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'address', $val, $err, $valid,'bi bi-geo-alt-fill');
  }
  private function printMobile()
  {
    $val = "010000000";
    $err = $this->model->getMobileErr();
    $valid = (!empty($err) ? 'is-invalid' : '');

    $this->printInput('text', 'mobile', $val, $err, $valid,'bi bi-phone-fill');
  }
  private function printInput($type, $fieldName, $val, $err, $valid,$icon)
  {
    $label = str_replace("_", " ", $fieldName);
    $label = ucwords($label);
    $text = <<<EOT
    <div class="form-group">
      <label for="$fieldName"> <i class="$icon"></i> $label: <sup>*</sup> </label>
      <input type="$type" name="$fieldName" class="form-control form-control-lg $valid" id="$fieldName" value="$val">
      <span class="invalid-feedback">$err</span>
    </div>
    
EOT;
    echo $text;
  }
}
