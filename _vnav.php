<div class="navbar-vertical">
  <?php 
  // Ensure session is started
  //session_start();

  // Compare the role correctly
  if($_SESSION['role'] == 'Buyer'){
  ?>
    <a href="./dashboard.php">Dashboard</a>
    <a class="dropdown-btn">Purchase Order 
      <i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-container">
      <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/createPO.php">Create PO</a>
      <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/submittedPO.php">Submitted PO</a>
    </div>
    <a href="#timesheet.php">Timesheet</a>
    <a href="#invoice.php">Invoice</a>
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/notesDetails.php">Note Details</a>
  <?php
  }
  ?>
  <?php
    if($_SESSION['role'] == 'Supplier'){
  ?>
    <a href="./dashboard.php">Dashboard</a>
    <a class="dropdown-btn">Purchase Order 
      <i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-container">
      <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/PO.php">Submitted PO</a>
    </div>
    <a href="#timesheet.php">Timesheet</a>
    <a href="#invoice.php">Invoice</a>
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/notesDetails.php">Note Details</a>
  <?php
  }
  ?>
</div>
