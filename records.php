
<?php 
$title='records';
?>


<?php 
  require_once 'includes/header.php';
  require_once 'includes/check.php';
  require_once 'db/conn.php';

  $results=$crud->getPatients()
?>

<table class="table table-striped">
    <tr> <!-- attendee table headers -->
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>

    <th>Treatment</th>

    <th>Actions</th>
    </tr>

    <tr>
        <td>1</td>
        <td>fname value</td>
        <td>lname value</td>

        <td>Treatment value</td>

        

    </tr>

    <?php while($r=$results->fetch(PDO::FETCH_ASSOC)){?>
    <tr>
    <td><?php echo $r['Treatment_id']?></td>
    <td><?php echo $r['FirstName']?></td>
    <td><?php echo $r['LastName']?></td>

    <td><?php echo $r['TypeOfTreatment']?></td> 


    <td><a href="view.php?id=<?php echo $r['Patient_id']?>" class="btn btn-primary"> VIEW </a></td>
    <td><a href="edit.php?id=<?php echo $r['Patient_id']?>" class="btn btn-warning"> EDIT </a></td>
    <td><a onclick="return confirm('ARE YOU SURE ABOUT DELETING THIS RECORD? ONCE DONE CAN NEVER GO BACK');" href="delete.php?id=<?php echo $r['Patient_id']?>" class="btn btn-danger"> DELETE </a></td>
    
</tr>
        <?php  }?>
            
    

</table>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<?php 

  require_once 'includes/footer.php';
?>