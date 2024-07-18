<?php
/* 
if(isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] == true){
    if($_SESSION['role'] == "Admin"){
        define('ROUTE', './Admin/');
    }elseif($_SESSION['role'] == "Buyer"){
        define('ROUTE', '../Buyer/');
    } else {
        define('ROUTE', './Supplier/');
    }
    $invoicehome = include(ROUTE."invoices.php"); */

$vnav = ' <div class="d-flex align-items-start h-100 px-0" >
  <div class="nav flex-column nav-pills py-3 h-100" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="background-color: #03e8fc; width: 128px">
    <button class="nav-link active my-2 text-white" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
    <button class="nav-link my-2  text-white" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Invoices</button>
    <button class="nav-link my-2" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false" disabled>Disabled</button>
    <button class="nav-link my-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
    <button class="nav-link my-2" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
  </div>
  
</div>';

?>