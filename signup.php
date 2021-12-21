<?php 
$title='User Sign Up';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'db/conn.php';

?>


  <div class="col-md-4"> <!-- USERNAME DIV-->
    <label for="validationServerUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend3">@</span>
      <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3 validationServerUsernameFeedback" required>
      <div id="validationServerUsernameFeedback" class="invalid-feedback">
        Please choose a username.
      </div>
    </div>
  </div>


  <div class="col-mb-3"> <!-- PASSWORD DIV-->
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>



  <div class="col-12"> <!-- CHECK BOX DIV--> 
    <div class="form-check">
      <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
      <label class="form-check-label" for="invalidCheck3">
        Agree to terms and conditions
      </label>
      <div id="invalidCheck3Feedback" class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </div>

  <!-- SUBMIT BUTTON-->
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Submit form</button>
  </div>
</form>







<br/><br/><br/>
<?php include_once 'includes/footer.php'?>