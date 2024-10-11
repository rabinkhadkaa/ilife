<?php
include '../_dbconnect.php'; 
session_start();

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
    header("location: ../index.php");
    exit;
}
error_reporting(-1);
ini_set("display_errors", 1);
ini_set('error_reporting', E_ALL);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submitted TS -<?php echo $_SESSION['username']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
  </head>
  <body>
 
    <div>
      <?php 
        require '../_nav_afterLogin.php';
        require '../_vnav.php';
      ?>
      <div class = "main-content" >
        <div class = "container my-3">
          <h2>View Submitted Time Sheet</h2>
        </div>
        <form id="viewTS" class="mt-4">
            <div class="container">
                <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="fromDate" class="form-label">From Date:</label>
                    <input type="date" name="fromDate" id="fromDate" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="toDate" class="form-label">To Date:</label>
                    <input type="date" name="toDate" id="toDate" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="timesheetID" class="form-label">Timesheet ID:</label>
                    <input type="text" name="timesheetID" id="timesheetID" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="buyerName" class="form-label">Buyer Name:</label>
                    <input type="text" name="buyerName" id="buyerName" class="form-control">
                    </div>
                </div>
                </div>
                <div class="row mt-3">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>
        </form>

        <div id="result"></div> <!-- Container to display the results -->
      </div>
    <div>
    <script>
      $(document).ready(function(){
        console.log("jquery");
        $('#viewTS').on('submit', function(e){
          e.preventDefault(); //Prevent the default form submission

          //Gather form data
          var formData = {
            requestID: $('#timesheetID').val(),
            supplierName: $('#buyerName').val(),
            fromDate: $('#fromDate').val(),
            toDate: $('#toDate').val()
          };
          console.log('Form Data: ', formData); // Debugging the captured form data

          //Ajax call
          $.ajax({
            type: 'POST',
            url: 'ajax/submitted_TS.php',
            data: formData,
            success: function(response){
              console.log('AJAX Response: ', response); // Debugging the response
              //show the server response in the "result" div
              $('#result').html(response);
            },
            error: function(xhr, status, error){
              //Handle errors
              alert('Error: '+ error);
            }
          });
        });
      });
    </script>

  
    <script src = "//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src = "../vnavdropdown.js"></script>
    <script>let table = new DataTable('#myTable');</script>
  </body>
</html>