<?php
include '_loggedindatabase.php';
//include 'iuploads.php'; 
// session_start();

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
    header("location: ../index.php");
    exit;
}
 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iNotes -<?php echo $_SESSION['username']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    
  </head>
  <body style="background-image: linear-gradient(to bottom right, rgb(0, 238, 255), rgb(184, 22, 220)  );">
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editModalLabel">Edit this notes</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action = "loggedin.php" method = "post" >
            <div class="modal-body">
              <input type="hidden" name="snoEdit" id = "snoEdit">
              <div class="mb-3">
                <label for="title" class="form-label">Note title</label>
                <input type="text" name = "titleEdit" class="form-control" id="titleEdit" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="Desc" class="form-label">Note Description</label>
                <textarea name = "DescEdit" class="form-control" rows = "3" id="DescEdit"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <?php
      require '../_nav.php';
      require '../_vnav.php';
    ?>
<div class ="row">
  <div class = "column">
    <?php 
      echo $vnav;
    ?>
  </div>
  <div class = "column>
    <div class = "container my-3">
      <h2>View Invoices</h2>
    </div>
    <div class = "container my-4">
      <table class="table table-bordered table-striped" color="white;" id = "myTable">
        <thead>
          <tr>
            <th scope="col">SN</th>
            <th scope="col">NoteID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $username = $_SESSION['username'];
            
            $sql = "SELECT * FROM `notes` WHERE username = '$username'";
            $result = mysqli_query ($conn, $sql);
              
            if($result){
              $num = mysqli_num_rows($result);
            }
            
            $SNo = 0;
            while ($row = mysqli_fetch_assoc($result)){
              $SNo=$SNo+1;
              //$url = "test.php?noteID = ".$row['NoteID'];
              echo " <tr>
                        <th scope='row'>".$SNo."</th>
                        <td> <a href = 'notesDetails.php?noteID=".$row['NoteID']."'> ".$row['NoteID']." </a></td>
                        <td>".$row['Title']."</td>
                        <td>".$row['Description']."</td>
                        <td><button type='button' class='edit btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal' id=".$row['SN'].">Edit</button>
                        <button type='button' class='delete btn btn-primary'  id=d".$row['SN'].">Delete</button></td>
                      </tr>";
            }
          ?> 
        </tbody>
      </table>
    </div>
  </div>
</div>




    <hr>
  
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src = "//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>let table = new DataTable('#myTable');</script>
    <script> 
    edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click", (e)=>{
          console.log("edit", );
          tr = e.target.parentNode.parentNode;
          title = tr.getElementsByTagName("td")[1].innerText;
          Desc = tr.getElementsByTagName("td")[2].innerText;
          console.log(title, Desc);
          titleEdit.value = title;
          DescEdit.value = Desc;
          snoEdit.value = e.target.id;
          console.log(e.target.id);
          $('#editModal').modal('toggle');
        })
      }) 

       deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element)=>{
          element.addEventListener("click", (e)=>{
            console.log("edit", );
            //SN.value = e.target.id;
            SN = e.target.id.substr(1,);
            //console.log(SN);
            if(confirm("Are you sure you want to delete this note!")){
              console.log("yes--");
              console.log(SN);
              window.location = `/loggedin.php?delete=${SN}`;
            } else {
              console.log("No");
            }
          }) 
        }) 
    </script>
  </body>
</html>