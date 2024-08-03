<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bars</title>
    <link rel="stylesheet" href="custom.css"> <!-- Path to the CSS file -->
</head>
<body>
    <!-- Horizontal Navigation Bar -->
<div> 
    <div class="navbar-horizontal">
        <div class="company-name">Company Name</div>
        <div class="user-dropdown">
            <select name="user-options" id="user-options">
                <option value="profile">Profile</option>
                <option value="settings">Settings</option>
                <option value="logout">Logout</option>
            </select>
        </div>
    </div>

    <!-- Vertical Navigation Bar -->
    <div class="navbar-vertical">
        <a href="#home">Home</a>
        <a href="#profile">Profile</a>
        <a href="#gallery">Gallery</a>
        <a href="#link">Hyperlink Button</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome to the Website</h1>
        <p>This is where the main content goes. The horizontal and vertical nav bars are set up above.</p>
        <p>This is where the main content goes. The horizontal and vertical nav bars are set up above.</p>
    </div>
</div>
</body>
</html>
