	 <div class="header-top">
		 <!--container-->
		  <div class="container">
			 <div class="top-nav">
						<div class="logo">
						<a href="../home.php"><img src="../images/san dias1.png" id="section-1" class="img-responsive" alt=""/></a>
						</div>
						<div class="menu">
						<ul id="nav">
						<?php if($_SESSION["usertype"]=="Admin")
                        {?>
							 <li><a href="sndmsg.php">Send Messages</a></li>
							 <?php }?>
							 <li><a href="viewmessages.php">My Messages</a></li>
							 <li><a href="../index.php" target="_blank">Preview Website</a></li>
							 <li><a href="logout.php">Log Out</a></li>
						     <div class="clearfix"></div>
						 </ul>
						 </div>
			 </div>
			  <div class="clearfix"> </div>
			

		 </div>
		 <!--/container-->
	 </div>