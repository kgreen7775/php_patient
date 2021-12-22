
<?php 
$title='edit';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'includes/check.php';
  require_once 'db/conn.php';

  $results=$crud->getTreatment();
  if(!isset($_GET['id']))
  {
    //echo"<h1 class='text-danger'> THERE'S AN ISSUE WITH  IF FUNCTION IN EDIT<h1/>";
    echo 'includes/errormsg.php';
    header('Location: records.php');
  }
  else
  {
      $id=$_GET['id'];
      $patients=$crud->getPatientDetails($id);
?>

    <h1 class="text-center">Edit Record</h1>
    
    <form method="post" action="editpost.php"> 
    <input type="hidden" name="id" value="<?php echo $patients['Patient_id']?>"/> 
      <div class="mb-3"> <!-- FIRST NAME DIV-->
        <label for="firstname" class="form-label">First Name</label> <!-- NOTE THAT THE VALUES INSIDE THE PHP BLOCK IS REF FROM THE DATQBASE VARIABLES -->                                   
        <input type="text" class="form-control" value="<?php echo $patients['FirstName']; ?>" id="firstname" name="firstname" aria-describedby="firstname">
       <div class="form-text">Your First Name is your identity 
       </div>
      </div>

      <div class="mb-3"> <!-- LAST NAME DIV-->
        <label for="lastname" class="form-label">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $patients['LastName']; ?>" id="lastname" name="lastname" aria-describedby="lastname">
       <div class="form-text">Your Last Name is your hertiage 
       </div>
      </div>

      <div class="mb-3"> <!-- DATE OF BIRTH DIV-->
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" value="<?php echo $patients['DateOfBirth']; ?>" id="dob" name="dob" aria-describedby="dob">
       <div class="form-text">Your D.O.B is life marker 
       </div>
      </div>

      <div class="mb-3"> <!-- GENDER DIV-->
        <label for="gender" class="form-label">Gender</label>
        <input type="text" class="form-control" value="<?php echo $patients['Gender']; ?>" id="gender" name="gender" aria-describedby="gender">
       <div class="form-text">Gender is Your Biological Identity 
       </div>
      </div>

      <div class="mb-3"> <!-- ADDRESS DIV-->
        <label for="gender" class="form-label">Gender</label>
        <input type="text" class="form-control" value="<?php echo $patients['Home']; ?>" id="home" name="home" aria-describedby="home">
       <div class="form-text">Your Address 
       </div>
      </div>

      <div class="mb-3"> <!-- TREATMENT DIV-->
      <select class="form-control" aria-label="treat" id="treat" name="treat">
       
      <?php while($r=$results->fetch(PDO::FETCH_ASSOC)) {?>

        <option value="<?php echo $r['Treatment_id']?>" <?php if($r['Treatment_id']==$attendee['Treatment_id']) echo 'selected'?>> 
        <?php echo $r['TypeOfTreatment'];?></option>

      <?php }?> 
      </select>
      </div>

      <div class="mb-3"> <!-- EMAIL DIV-->
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" value="<?php echo $patients['Email']; ?>" id="email" name="email" aria-describedby="emailHelp">
       <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
       </div>
      </div>

      <div class="mb-3"> <!-- PHONE NUM DIV-->
        <label for="phone" class="form-label">Contact number</label>
        <input type="text" class="form-control" value="<?php echo $patients['Contact']; ?>" id="phone" name="phone" aria-describedby="phonehelp">
       <div id="phonehelp" class="form-text">We'll never share your contact with anyone else.
       </div>
      </div>



    <div class="mb-3 form-check">  <!--CHECK BOX DIV -->
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label" for="check">CHECK THE BOX</label>
      </div>
      
      <!-- SUBMIT BUTTION DIV-->
        <button type="submit" name="submit" id="submit"class="btn btn-success">Save Changes</button>
        <td><a href="records.php?id" class="btn btn-primary"> BACK TO LIST </a></td>
    </form>
<?php } ?><!-- END OF ELSE STATEMENT -->


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php 

  require_once 'includes/footer.php';
?>