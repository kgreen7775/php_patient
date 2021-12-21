<?php 
$title='View Record';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'includes/check.php';
  require_once 'db/conn.php';

  // Get attendee by ID
  
  if(!isset($_GET['id'])) 
  {
    
    echo 'includes/errormsg.php';

  }
  else
  {
    $getid=$_GET['id'];
    $results=$crud->getPatientDetails($getid);

?>

 <!--THE VARIABLE POST IS BEIGN USED TO ISSUE THE VALUE TO THE USER INTERFACE -->
<div class="card" style="width: 18rem;">
<img src="<?php echo empty($results['imgpath']) ? "img/person.jpg" : $results['imgpath']; ?>" class="card-img-top" alt="img/person.jpg">
  <div class="card-body">
    <h5 class="card-title"> 
    <?php echo  $results['FirstName'].' '.$results['LastName']; ?> 
    </h5>
    <p class="card-text">
        Type of Treatment:<?php echo  $results['TypeOfTreatment']; ?>
    </p>
    <p class="card-text">
        Date of Birth:<?php echo  $results['DateOfBirth']; ?>
    </p>

    <p class="card-text">
        Gender:<?php echo  $results['Gender']; ?>
    </p>
  
    <p class="card-text">
        Login Email:<?php echo  $results['Email']; ?>
    </p>
  
    <p class="card-text">
        Contact Number<?php echo  $results['Contact']; ?>
    </p>
    <a href="records.php" class="btn btn-success">Confirm</a>
  </div>
</div> 


<td><a href="records.php?id" class="btn btn-primary"> BACK TO LIST </a></td>
<td><a href="edit.php?id=<?php echo $results['Patient_id']?>" class="btn btn-warning"> EDIT </a></td>
<td><a onclick="return confirm('ARE YOU SURE ABOUT DELETING THIS RECORD? ONCE DONE CAN NEVER GO BACK');" href="delete.php?id=<?php echo $results['Patient_id']?>" class="btn btn-danger"> DELETE </a></td>
<?php  } ?><!-- END of the Else statement -->


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php 

  require_once 'includes/footer.php';
?>







