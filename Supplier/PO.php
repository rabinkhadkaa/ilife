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
    <link rel="stylesheet" href="../custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>
  <body>
    <?php 
    require '../_nav_afterLogin.php';
    ?>

    <?php 
    require '../_vnav.php';
    ?>
    <div class ="main-content">
    <div class = "container my-4">
        <table class="table table-bordered table-striped" color="white;" id = "myTable">
          <thead>
            <tr>
              <th scope="col">SN</th>
              <th scope="col">Request ID</th>
              <th scope="col">Supplier Name</th>
              <th scope="col">Service Type</th>
              <th scope="col">Start Date</th>
              <th scope="col">End Date</th>
              <th scope="col">Description</th>
              <th scope="col">Status</th>
              <th scope="col">Submitted Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $username = $_SESSION['username'];
              
              $sql = "SELECT * FROM `Purchase_Order` WHERE SupplierName = '$username'";
              $result = mysqli_query ($conn, $sql);
                
              if($result){
                $num = mysqli_num_rows($result);
              }
              
              $SNo = 0;
              while ($row = mysqli_fetch_assoc($result)){
                $SNo=$SNo+1;
                switch ($row['Status']){
                  case 'Pending':
                    $bgColor = 'yellow';
                    break;
                  case 'Accepted':
                    $bgColor = 'green';
                    break;
                  case 'Rejected':
                    $bgColor = 'red';
                }
                echo " <tr>
                          <td scope='row'>".$SNo."</td>
                          <td> <a href = 'notesDetails.php?requestID=".$row['RequestID']."'> ".$row['RequestID']." </a></td>
                          <td>".$row['SupplierName']."</td>
                          <td>".$row['ServiceType']."</td>
                          <td>".$row['StartDate']."</td>
                          <td>".$row['EndDate']."</td>
                          <td>".$row['Description']."</td>
                          <td style='background-color: " . $bgColor . ";'>".$row['Status']."</td>
                          <td>".$row['SubmittedDate']."</td>
                        </tr>";
              }
            ?> 
          </tbody>
        </table>
      </div>
    </div>
    <hr>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src = "//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src = "../vnavdropdown.js"></script>
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