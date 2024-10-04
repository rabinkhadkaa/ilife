<?php

 include '../../_dbconnect.php'; 
 session_start();

 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);

 $username = $_SESSION['username'];
 //why I'm getting $username null



 $sql = "SELECT * FROM `Timesheet` WHERE user = '$username'";
 
 //check if data was sent via POST method
 if ($_SERVER['REQUEST_METHOD']=='POST'){
    //Get the requestID and supplierName from the POST request
    $timesheetID = isset($_POST['timesheetID']) ? $_POST['timesheetID'] : '';
    $buyerName = isset($_POST['buyerName']) ? $_POST['buyerName']: '';
    $fromDate = isset($_POST['fromDate']) ? $_POST['fromDate']: '';
    $toDate = isset($_POST['toDate']) ? $_POST['toDate']: '';

    $conditions = [];
    if(!empty($timesheetID)){
        $conditions[]= "requestID = '" . $conn->real_escape_string($timesheetID) . "'";

    }
    if(!empty($buyerName)){
        $conditions[]= "supplierName ='" . $conn->real_escape_string($buyerName) . "'";
    }
    if(!empty($fromDate)){
        $conditions[]= "startDate >= '" . $conn->real_escape_string($fromDate) . "'";
    }
    if(!empty($toDate)){
        $conditions[]= "endDate <= '" . $conn->real_escape_string($toDate) . "'";
    }
    

    $sql = "SELECT * FROM `Purchase_Order` WHERE user = '$username'";
    //Append conditions if exist
    if(count($conditions)>0){
        $sql .= " AND " . implode(" AND ", $conditions);
    }

    $result = mysqli_query ($conn, $sql);
        
    if($result){
        $num = mysqli_num_rows($result);
    }
                
     // Count the number of rows in the result set
     $num = 0;
     if ($result) {
         $num = mysqli_num_rows($result);
     }

    echo '<div class="container">
            <div class="row"> 
                <div class="col-md-4 d-flex align-items-center">
                    <label for="total" class="form-label mb-0 me-4">Total records:</label>
                    <input type="number" name="total" id="total" class="form-control" style="flex-grow: 1;" value = ' . $num . ' readonly>
                </div>
            </div>
        </div>';

    echo "<table class='table table-bordered table-striped' color='white;' id = 'myTable'>
        <thead>
            <tr>
            <th scope='col'>SN</th>
            <th scope='col'>Timesheet ID</th>
            <th scope='col'>Buyer Name</th>
            <th scope='col'>Service Type</th>
            <th scope='col'>From Date</th>
            <th scope='col'>To Date</th>
            <th scope='col'>Status</th>
            <th scope='col'>Hours</th>
            <th scope='col'>Description</th>
            <th scope='col'>Submitted Date</th>
            </tr>
        </thead>";
        echo "<tbody>";
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
                
            
             echo "<tr>
                    <td scope='row'>".$SNo."</td>
                    <td> <a href = 'notesDetails.php?timesheetID=".$row['TimesheetID']."'> ".$row['TimesheetID']." </a></td>
                    <td>".$row['BuyerName']."</td>
                    <td>".$row['ServiceType']."</td>
                    <td>".$row['FromDate']."</td>
                    <td>".$row['ToDate']."</td>
                    <td>".$row['Description']."</td>
                    <td style='background-color: " . $bgColor . ";'>".$row['Status']."</td>
                    <td>".$row['Hours']."</td>
                    <td>".$row['SubmittedDate']."</td>
                </tr>";
        }
        echo " </tbody>";
        echo "</table>";

    }

    ?> 