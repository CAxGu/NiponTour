<body>
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Logo -->
						<h1><a href="index.php" id="logo">NiponTour <em>Low Price Travels</em></a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class=<?php if($_GET['module']==="main") echo "current"?>><a href="index.php?module=main">Home</a></li>
								<li>
									<a href="#">Alta</a>
									<ul>
										<li><a href="#">Users</a></li>
										<li>
											<a href="#">Products</a>
											<ul>
												<li><a href="#">Travel</a></li>
												<li><a href="#">Visit</a></li>
												<li><a href="#">More</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class=<?php if($_GET['module']==="left_sidebar") echo "current"?>><a href="index.php?module=left_sidebar">Left Sidebar</a></li>
								<li class=<?php if($_GET['module']==="right_sidebar") echo "current"?>><a href="index.php?module=right_sidebar">Right Sidebar</a></li>
								<li class=<?php if($_GET['module']==="two_sidebar") echo "current"?>><a href="index.php?module=two_sidebar">Two Sidebar</a></li>
								<li class=<?php if($_GET['module']==="no_sidebar") echo "current"?>><a href="index.php?module=no_sidebar">No Sidebar</a></li>
							</ul>
						</nav>

				</div>