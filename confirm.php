<?php 
$title='confirm';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'db/conn.php';
  require_once 'sendemail.php';


  if(isset($_POST['submit']))
  {
    //extract values from the $_POST array
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $treat=$_POST['treat'];


    $original_file_name = $_FILES['image']['tmp_name'];
    $ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    $target_dir = 'upload/';
  //  $destination = $target_dir.basename($_FILES['avatar']['name']);
    $destination = "$target_dir$phone.$ext";
    move_uploaded_file($original_file_name,$destination);



   
    $issuccess=$crud->insertPatient($fname,$lname,$dob,$gender,$phone,$email,$treat,$imgpath);
    $TypeOfTreatment = $crud->getTreatmentByID($treat);
    if($issuccess)
    {
      sendemail::sendmail($email,' Thank you for Choosing Acure Treatments','We\'re Happy to serve you');
    
      echo 'includes/successmsg.php';
    }
    else
      {

        echo 'includes/errormsg.php';
      }
  
  }

?>

<!--print values that were passed from the action using 'post'-->
 <div class="card" style="width: 18rem;">
  <img src="<?php echo $destination ?>" class="card-img-top" alt="img/person.jpg">
  <div class="card-body">
    <h5 class="card-title"> 
    <?php echo  $_POST['firstname'].' '.$_POST['lastname']; ?> 
    </h5>
    <p class="card-text">
        Type of Treatment:<?php echo  $TypeOfTreatment['TypeOfTreatment']; ?>
    </p>
    <p class="card-text">
        Date of Birth:<?php echo  $_POST['dob']; ?>
    </p>
    <p class="card-text">
        Gender:<?php echo  $_POST['gender']; ?>
    </p>
    <p class="card-text">
        Login Email:<?php echo  $_POST['email']; ?>
    </p>
    <p class="card-text">
        Contact Number<?php echo  $_POST['phone']; ?>
    </p>
    <a href="records.php" class="btn btn-primary">Confirm</a>
  </div>
</div> 


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php 

  require_once 'includes/footer.php';
?>