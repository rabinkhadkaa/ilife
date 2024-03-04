<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php 
    
    //require  './_nav.php'; 
   
    //$user=$_SESSION['loggedin'];
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
            <div class="container-fluid">
                <a style="color: darkred;" class="navbar-brand" href="#"><h3>ilife</h3></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./loggedinhome.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                       <li class="nav-item">
                            <a class="nav-link" href="./login.php">Login</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
          </nav>';
   
    ?>
    <!-- <div class="container text-center">
        <div class="row">
            <div class="col-sm-3">
            Level 1: .col-sm-3
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit dignissimos nobis, magni repellendus quo officiis accusamus odit sed facere illo, voluptatem, quam hic cum autem maiores eius obcaecati? Velit, nihil.
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-8 col-sm-6">
                    Level 2: .col-8 .col-sm-6
                    </div>
                    <div class="col-4 col-sm-6">
                    Level 2: .col-4 .col-sm-6
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
	<!--Home(start)-->
	<table id="home" border="1" width="100%"
		cellpadding="20" cellspacing="0" style="background-image: linear-gradient(to right, rgb(111, 218, 111, 50%), rgb(115, 117, 115)) ;" bgcolor="green">
		<tr>
			<td>
				<table border="0" cellpadding="15"
					cellspacing="0" width="90%" align="center">
					<tr>
						<td align="center" valign="middle">
							<h3>
								<font face="Times New Roman"
									size="6" color="white">
									Welcome to ilife!
								</font>
							</h3>

							<h2>
								<font face="Verdana" size="6"
									color="#4CAF50">
									<!-- Freelance Programmer -->
								</font>
							</h2>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<!--Home(end)-->


	<!--About(start)-->
	<table id="about" border="0" width="100%"
		cellpadding="0" cellspacing="0" bgcolor="black">
		<tr>
			<td>
				<table border="0" cellpadding="7"
					cellspacing="0" width="80%" align="center">
					<tr>
						<td height="80" align="center"
							valign="middle" colspan="2">
							<font face="Verdana" size="5"
								color="#4CAF50">
								About Us
							</font>
							<hr color="#4CAF50" width="90">
						</td>
					</tr>

					<tr>
						<td  width="40%">
							<img src="ilife_thumb.jpg">
						</td>

						<td width="60%">
							<font face="Verdana" size="4"
								color="white">
								Thanks for your interest, here 
								is a quick story about this 
								ilife. 
								<hr color="black">
								iNotes:
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ipsam eaque repellendus velit nobis optio? Ad magni illum iusto perferendis, quos deleniti esse similique quia officia, nobis voluptate qui voluptatem..
								<hr color="black">

								Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt voluptates harum rem repudiandae! Assumenda iste et consequatur minima soluta sed, fugit harum quaerat nam quo vitae! Ullam possimus optio facilis?
								<hr color="black">

								Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, ipsam! Illum, quisquam alias repudiandae velit, cumque laboriosam ipsum sed similique placeat perspiciatis adipisci, nostrum quibusdam incidunt doloribus tempore odio? Quos.
                                <br>
								Thanks again for reading this, 
								because of people like you, it 
								exists and prospers!
								
								<hr color="black">
								Cheers,
								<br>
								<b>ilife</b>
							</font>
						</td>
					</tr>
					<tr>
						<td height="80" align="center"
							valign="middle" colspan="2">
							<hr color="black">
							<hr color="black">
				
							<font face="Verdana" size="4"
							color="white">
								<a href="./Signup.php">Click here </a> to signup for free on ilife. 
								If already signed up <a href="./login.php">click here </a> to login.
							</font>
							<hr color="black">
							<hr color="#4CAF50" width="90">
						</td>
					</tr>
				</table>
				
			</td>
		</tr>
	</table>
	<!--About(end)-->


	<!--Projects(start)-->
	<table id="projects" border="0" width="100%"
		cellpadding="0" cellspacing="0" bgcolor="#c2c0c3">
		<tr>
			<td>
				<table border="0" cellpadding="15"
					cellspacing="0" width="80%" align="center">
					<tr>
						<td height="180" align="center"
							valign="middle" colspan="2">
							<font face="Verdana" size="7"
								color="black">
								Projects
							</font>
							<hr color="black" width="90">
						</td>
					</tr>

					<tr>
						<td height="10">
							<font face="Times New Roman"
								size="5" color="black">
								<ul>
									<li>
										iNotes
										<a href="./Loggedin.php"
										style="text-decoration:none">
											 ➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iCalculator
										<a href="#"
										style="text-decoration:none"
											color="#c2c0c3">
											 ➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iCalendar
										<a href="#"
										style="text-decoration:none">
											 ➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iChatBot
										<a href="#"
										style="text-decoration:none">
											 ➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iContact Saver
										<a href="#"
										style="text-decoration:none">
											 ➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iDaily Quiz
										<a href="#"
										style="text-decoration:none">
											 ➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iEmplyoyee Record System
										<a href="#"
										style="text-decoration:none">
											 ➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iGuess the Number-Game
										<a href="#"
										style="text-decoration:none">
											 ➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iRandom Password Generator
										<a href="#"
										style="text-decoration:none">
											➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iStone Paper Scissor
										<a href="#"
										style="text-decoration:none">
											➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iTic Tac Toe
										<a href="#"
										style="text-decoration:none">
											➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iTic Tac Toe(GUI)
										<a href="#"
										style="text-decoration:none">
											➲
										</a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iToDo App
										<a href="#"
										style="text-decoration:none">
											➲ </a>
									</li>

									<li>
										<hr color="#c2c0c3">
										iTravel Management System
										<a href="#" style=
											"text-decoration:none"> ➲
										</a>
									</li>
								</ul>
								<hr color="#c2c0c3">
								<hr color="#c2c0c3">
								<hr color="#c2c0c3">
								<hr color="#c2c0c3">
							</font>
						</td>

						<td width="45%">
							<img src="img.png"
								alt="Project" width="75%">
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<!--Projects(end)-->

	<!--Contact(start)-->
	<table id="contact" border="0" width="100%"
		cellpadding="0" cellspacing="0" bgcolor="#c2c0c3">
		<tr>
			<td>
				<table border="0" cellpadding="15"
					cellspacing="0" width="80%" align="center">
					<tr>
						<td height="180" align="center"
							valign="middle" colspan="2">
							<font face="Verdana" size="7"
								color="black">
								Contact
							</font>
							<hr color="black" width="90">
						</td>
					</tr>

					<tr>
						<td align="center" valign="top">
							<table border="0" width="50%" cellpadding="15"
								cellspacing="0" align="center" bgcolor="black">
								<tr>
									<td width="30%">
										<hr color="black">
										<font face="Verdana" size="4"
											color="#ffffff">
											Name
										</font>
									</td>
									<td width="70%">
										<font face="Verdana" size="4"
											color="#ffffff">
											<input type="text" size="40">
										</font>
									</td>
								</tr>
								<tr>
									<td width="30%">
										<font face="Verdana" size="4"
											color="#ffffff">
											Email
										</font>
									</td>
									<td width="70%">
										<font face="Verdana" size="4"
											color="#ffffff">
											<input type="email" size="40">
										</font>
									</td>
								</tr>
								<tr>
									<td width="30%">
										<font face="Verdana" size="4"
											color="#ffffff">
											Number
										</font>
									</td>
									<td width="70%">
										<font face="Verdana" size="4"
											color="#ffffff">
											<input type="number" size="12">
										</font>
									</td>
								</tr>
								<tr>
									<td width="30%">
										<font face="Verdana" size="4"
											color="#ffffff">
											Message
										</font>
									</td>
									<td width="70%">
										<font face="Verdana" size="4"
											color="#ffffff">
											<textarea rows="5"
												cols="37">
											</textarea>
										</font>
									</td>
								</tr>
								<tr>
									<td width="30%">
										
									</td>
									<td width="70%">
										<button type="Submit">
											<font face="Verdana"
												size="4" color="black">
												<b>Submit</b>
											</font>
										</button>
										<hr color="black">
										<hr color="black">
									</td>
								</tr>
							</table>
						</td>

					</tr>
					<tr>
						<td colspan="2">
							
							
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<!--Contact(end)-->


	<!--Footer1(start)-->
	<table id="footer" border="0" width="100%"
		cellpadding="0" cellspacing="0" bgcolor="#4CAF50">
		<tr>
			<td>
				<table border="0" cellpadding="15"
					cellspacing="0" width="90%" align="center">
					<tr>
						<td width="13%" valign="top">
							<b>LinkedIn</b>
							<a href="#" style="text-decoration:none">
								➲
							</a>
						</td>

						<td>
							|
						</td>

						<td width="13%" valign="top">
							<b>GitHub</b>
							<a href="#" style="text-decoration:none">
								➲ 
							</a>
						</td>

						<td>
							|
						</td>

						<td width="13%" valign="top">
							<b>HackerRank</b>
							<a href="#" style="text-decoration:none">
								➲
							</a>
						</td>

						<td>
							|
						</td>

						<td width="13%" valign="top">
							<b>GeeksforGeeks</b>
							<a href="#" style="text-decoration:none">
								➲
							</a>
						</td>

						<td>
							|
						</td>

						<td width="13%" valign="top">
							<b>Twitter</b>
							<a href="#" style="text-decoration:none">
								➲
							</a>
						</td>

						<td>
							|
						</td>

						<td width="13%" valign="top">
							<b>Instagram</b>
							<a href="#" style="text-decoration:none">
								➲
							</a>
						</td>

						<td>
							|
						</td>

						<td width="13%" valign="top">
							<b>Email</b>
							<a href="#" style="text-decoration:none">
								➲
							</a>
						</td>

						<td>
							|
						</td>

						<td width="13%" valign="top">
							<b>Website</b>
							<a href="#" style="text-decoration:none">
								➲
							</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<!--Footer1(end)-->


	<!--Footer2(start)-->
	<table id="footer" border="0" width="100%"
		cellpadding="0" cellspacing="0" bgcolor="black">
		<tr>
			<td>
				<table border="0" cellpadding="15"
					cellspacing="0" width="90%" align="center">
					<tr>
						<td width="80%" valign="top">
							<font face="Verdana"
								color="#4CAF50" size="5">
								©Copyright 2050 by nobody. 
								All rights reserved.
							</font>
						</td>

						<td width="10%">
							<font face="arial" color="black" size="5">
								<a href="#header" style="text-decoration:none">
									<font face="Verdana" color="#4CAF50" size="6">
										<b>TOP</b>
									</font>
								</a>
							</font>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<!--Footer2(end)-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>





