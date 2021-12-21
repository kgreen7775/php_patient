
<?php 
$title='index';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  $results=$crud->getTreatment();
  {

  }
?>

    <h1 class="text-center">Registration for Patient Treatment</h1>

    <form method="post" action="confirm.php">
      <div class="mb-3"> <!-- FIRST NAME DIV-->
        <label for="firstname" class="form-label">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstname">
       <div class="form-text">Your First Name is your identity 
       </div>
      </div>

      <div class="mb-3"> <!-- LAST NAME DIV-->
        <label for="lastname" class="form-label">Last Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastname">
       <div class="form-text">Your Last Name is your hertiage 
       </div>
      </div>

      <div class="mb-3"> <!-- DATE OF BIRTH DIV-->
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" class="form-control" id="dob" name="dob" aria-describedby="dob">
       <div class="form-text">Your D.O.B is life marker 
       </div>
      </div>

      <div class="mb-3"> <!-- GENDER DIV-->
        <label for="gender" class="form-label">Gender</label>
        <input required type="text" class="form-control" id="gender" name="gender" maxlength="1" aria-describedby="gender">
       <div class="form-text">'M for Male' or 'F for Female' 
       </div>
      </div>

      <div class="mb-3"> <!-- TREATMENT DIV-->
      <select class="form-control" aria-label="treatment" id="treat" name="treat">
       
      <?php while($r=$results->fetch(PDO::FETCH_ASSOC)) {?>

        <option value="<?php echo $r['Treatment_id']?>"> <?php echo $r['TypeOfTreatment'];?></option>

      <?php }?> 
      </select>
      </div>

      <div class="mb-3"> <!-- EMAIL DIV-->
        <label for="email" class="form-label">Email address</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
       <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
       </div>
      </div>

      
      <div class="mb-3"> <!-- PHONE NUM DIV-->
        <label for="phone" class="form-label">Contact number</label>
        <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phonehelp">
       <div id="phonehelp" class="form-text">We'll never share your contact with anyone else.
       </div>
      </div>

      <br/>
      <br/> 
      <!-- PICK UPLOAD DIV-->
      <div class="mb-3"> 
        <!--<label for="avatar" class="form-label">Upload Image (Optional)</label> -->
        <input type="file" accept="image/*" class="custom-file-input" id="image" name="image"></input>
        <label class="custom-file-input" for="image"></label>
        <small id="image" class="form-text text-danger">Image Upload is Optional</small>
      </div>

      <br/>
      <br/>  

      <div class="mb-3 form-check"> <!-- CHECK BOX DIV-->
        <input type="checkbox" class="form-check-input" id="submit" name="submit">
        <label class="form-check-label" for="check">I Agree to the Terms and Condition of this application process</label>
      </div> <!-- SUBMIT BUTTION DIV-->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
 


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php 

  require_once 'includes/footer.php';
?>