<div class="navbar-vertical">
    <a href="./dashboard.php">Dasboard</a>
    <a class="dropdown-btn">Purchase Order 
    <i class="fa fa-caret-down"></i>
    </a>
    <div class="dropdown-container">
      <a href="../<?php echo $_SESSION['role'] ?>/createPO.php">Create PO</a>
      <a href="../<?php echo $_SESSION['role'] ?>/submittedPO.php">Submitted PO</a>
    </div>
    <a href="#timesheet.php">Timesheet</a>
    <a href="#invoice.php">Invoice</a>
    <a href="../<?php echo $_SESSION['role'] ?>/notesDetails.php">NoteDetails</a>
</div>
