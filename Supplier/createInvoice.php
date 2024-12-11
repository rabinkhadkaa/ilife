<?php 
    include '../_dbconnect.php';
    
    // error_reporting(-1);
    // ini_set("display_errors", 1);
    // ini_set('error_reporting', E_ALL);

    //include './nocatche.php';
    session_start();
    if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] != true){
        header("location: index.php");
        exit;
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>

        .form-container {
            max-width: 600px;

            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 20px;
        }
        textarea{
            width: -webkit-fill-available;
        }
        ::placeholder {
            opacity: 0.5;
        }
        
         /* Style for the dropdown container */
         .dropdown-container {
            position: relative;
            width: 300px;
            font-family: Arial, sans-serif;
        }

        /* Style for the input field */
        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Style for the dropdown list */
        .dropdown-list {
            position: relative;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            display: none;
        }

        /* Style for each dropdown item */
        .dropdown-item {
            padding: 10px;
            font-size: 14px;
            color: #333;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Last item should not have bottom border */
        .dropdown-item:last-child {
            border-bottom: none;
        }

        /* Hover effect for dropdown items */
        .dropdown-item:hover {
            background-color: #f0f0f0;
            color: #007BFF;
        }

        /* Scrollbar styling for dropdown */
        .dropdown-list::-webkit-scrollbar {
            width: 8px;
        }

        .dropdown-list::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .dropdown-list::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 5px;
        }

        .dropdown-list::-webkit-scrollbar-thumb:hover {
            background: #aaa;
        }

    
    </style>
</head>
<body>
    <?php 
        //include './nocatche.php';
        include 'createTS_function.php';
        require '../_nav_afterLogin.php';
        require '../_vnav.php';
        include 'functions.php';
        
        $tableName = 'Invoice';
        $prefix = 'INV';
        $invoiceID = generateNewId($conn, $tableName, $prefix);
        //q: why I'm getting generate
    ?>
    <div class = "main-content">
        <?php
            if($submitted){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success! </strong>your request has been submitted successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        ?>
        <div class="form-container">
            <h1>Create Invoice Form</h1>
            <form action="createInvoice.php" method="POST">
                <div class="form-group">
                    <label for="invoiceID">Invoice ID</label>
                    <input type="text" id="invoiceID" name="invoiceID" value = '<?php echo htmlspecialchars($invoiceID) ?>'readonly>
                </div>
                <div class="form-group" id="dropdown-container">
                    <label for="buyer_name">Buyer Name</label>
                    <input type="text" id="buyer_name" name="buyer_name" placeholder = "Buyer Name" autocomplete="off" required>
                    
                    <div class="dropdown-list" id="dropdown_list"></div>
                </div>
                <div class="form-group">
                    <label for="serviceType">Service Type</label>
                    <select id="serviceType" name="serviceType" required>
                        <option value="">Select a product</option>
                        <option value="Design and Consulting">Design and Consulting</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fromDate">From Date:</label>
                    <input type="date" id="fromDate" name="fromDate" required>
                <!-- </div>
                <div class="form-group"> -->
                    <label for="toDate">To Date:</label>
                    <input type="date" id="toDate" name="toDate" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>                    
                    <textarea id="description" name="description" rows="4" class="form-control" placeholder="Descriptions will appear here..." hidden readonly></textarea>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#descriptionModal">
                    <i class="fas fa-plus"></i> 
                    </button> Click here to add description
                </div>
                <div class="form-group">
                    <label for="hours">Hours</label>
                    <input type="text" id="hours" name="hours" placeholder = "Claimed Hours" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit">Submit Order</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Add Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="descriptionFields">
                        
                    </div>
                    <button type="button" class="btn btn-secondary" id="addRowBtn">+</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveDescriptions">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script src = "../vnavdropdown.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const addRowBtn = document.getElementById('addRowBtn');
        const descriptionFields = document.getElementById('descriptionFields');
        const descriptionTextarea = document.getElementById('description');
        let currentSN = 1; // Initialize the serial number

        // Function to create a new row
        function createRow() {
            const newRow = document.createElement('div');
            newRow.className = 'row mb-3';
            newRow.innerHTML = `
                <div class="col-2">
                    <input type="number" class="form-control" name="number[]" value="${currentSN++}" required readonly>
                </div>
                <div class="col-4">
                    <input type="date" class="form-control" name="descriptionDate[]" required>
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="descriptionText[]" placeholder="Description" required>
                </div>
            `;
            descriptionFields.appendChild(newRow);
        }

        // Add the first row when the modal is opened
        createRow();

        // Event listener for the button to add a new row
        addRowBtn.addEventListener('click', function () {
            createRow();
        });

        // Event listener for saving descriptions
        document.getElementById('saveDescriptions').addEventListener('click', function () {
            console.log("Save button clicked");

            // Clear any existing descriptions before appending
            descriptionTextarea.value = '';
            let descriptions = '';

            // Loop through the description fields and add them to the main form
            const rows = descriptionFields.getElementsByClassName('row mb-3');
            //console.log(rows);
            for (let row of rows) {
                const numInput = row.querySelector('input[name="number[]"]').value;
                const dateInput = row.querySelector('input[name="descriptionDate[]"]').value;
                const textInput = row.querySelector('input[name="descriptionText[]"]').value;
                
                 // Format the description and add to the string
                descriptions += `${numInput}. ${dateInput}- ${textInput}\n`;

                    // Append the new description to the main description container
                    //mainDescriptionContainer.appendChild(descriptionDiv);
               
            }
            // Set the textarea value to the concatenated descriptions
            descriptionTextarea.value = descriptions.trim(); // Remove trailing newline

            // Show the textarea after saving
            descriptionTextarea.removeAttribute('hidden');

            $('#descriptionModal').modal('hide');
        });

    });
</script>
<script>
        $(document).ready(function () {
            // When the user types in the input field
            $("#buyer_name").on("keyup", function () {
                let query = $(this).val();

                if (query.length >= 1) {
                    // AJAX request to fetch buyer list
                    $.ajax({
                        url: "ajax/getbuyerlist.php", // Backend script to fetch buyer names
                        method: "GET",
                        data: { query: query },
                        success: function (response) {
                            let buyers = JSON.parse(response);
                            let dropdownList = $("#dropdown_list");
                            dropdownList.empty(); // Clear previous results

                            if (buyers.length > 0) {
                                // Populate dropdown with buyer names
                                buyers.forEach(function (buyer) {
                                    dropdownList.append(
                                        `<div class="dropdown-item" data-name="${buyer.username}">${buyer.username}</div>`
                                    );
                                });

                                // Show the dropdown list
                                dropdownList.show();
                            } else {
                                // Hide the dropdown if no results
                                dropdownList.hide();
                            }
                        },
                        error: function () {
                            console.error("Error fetching buyer list");
                        }
                    });
                } else {
                    // Hide dropdown if input is less than 3 characters
                    $("#dropdown_list").hide();
                }
            });

            // Event to select a buyer from the dropdown
            $(document).on("click", ".dropdown-item", function () {
                let selectedName = $(this).data("name");
                $("#buyer_name").val(selectedName); // Set selected value to input field
                $("#dropdown_list").hide(); // Hide the dropdown list
            });

            // Close the dropdown when clicking outside the dropdown
            $(document).on("click", function (e) {
                if (!$(e.target).closest("#buyer_name, #dropdown_list").length) {
                    $("#dropdown_list").hide(); // Hide dropdown if clicked outside
                }
            });
        });
    </script>
</body>
</html>
