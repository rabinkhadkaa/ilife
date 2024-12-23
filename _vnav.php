<div class="navbar-vertical">
  <?php 
//    error_reporting(E_ALL);
//  ini_set('display_errors', 1);
  // Ensure session is started
  //session_start();
  include_once 'view_as_buyer.php';

  // Compare the role correctly
  if($_SESSION['role'] == 'Buyer'||$vpab->isImpersonating()){
  ?>
    <a href="./dashboard.php">Dashboard</a>
    <a class="dropdown-btn">Purchase Order 
      <i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-container">
      <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/createPO.php">Create PO</a>
      <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/submittedPO.php">Submitted PO</a>
    </div>
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/timeSheet.php">Timesheet</a>
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/receivedInvoice.php">Invoice</a>
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/notesDetails.php">Note Details</a>
  <?php
  }
  ?>
  <?php
    if($_SESSION['role'] == 'Supplier'){
  ?>
    <a href="./dashboard.php">Dashboard</a>
    <a class="dropdown-btn">Timesheet 
      <i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-container">
      <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/createTS.php">Create Timesheet</a>
      <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/submittedTS.php">Submitted TS</a>
    </div>
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/PO.php">Received PO</a>
    <a class="dropdown-btn">Invoice 
      <i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-container">
      <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/createInvoice.php">Create Invoice</a>
      <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/submittedInvoice.php">Submitted Invoice</a>
    </div>
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/notesDetails.php">Note Details</a>
  <?php
  }
  ?>
   <?php
    if($_SESSION['role'] == 'Admin'){
  ?>
    <a href="./dashboard.php">Dashboard</a>
    <a class="dropdown-btn">Timesheet 
      <i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-container">    
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/submittedTS.php">Submitted TS</a>
    </div>
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/PO.php">Received PO</a>
    <a href="#invoice.php">Invoice</a>
    <a href="../<?php echo htmlspecialchars($_SESSION['role']) ?>/notesDetails.php">Note Details</a>
  <?php
  }
  ?>
</div>
