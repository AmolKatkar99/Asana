<div class="top_nav">
	<div class="nav_menu">
		<nav class="" role="navigation">
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="pull-left">				
					<a href="mytasck.php" class="user-profile">MY TASK</a>
				
				</li>	
				<li class="pull-left">				
					<a href="" class="user-profile">MY INBOX</a>
				
				</li>					
				<li>	
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">			
						Welcome <strong></strong>&nbsp;&#124;&nbsp;<?php echo $_SESSION['user_name']; ?> <span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
						<li><a href="changepassword.php"><i class="fa fa-edit"></i> Change Password</a></li>
						<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
					</ul>
				</li>
				
			</ul>
		</nav>
	</div>
	<div>
	
	</div>
</div>













