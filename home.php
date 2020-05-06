<?php 
	include('functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}

?>
<?php
// Process delete operation after confirmation
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Include config file
    require_once "functions.php";
    
    // Prepare a delete statement
    $sql = "DELETE FROM users WHERE id = ?";
    
    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: home.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($db);
} 
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style/menu.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />
   
    <script src="https://code.jquery.com/jquery-3.4.1.js" type="text/javascript"></script>
    <!-- contact -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
   
   <!-- ovo dvoje bilo zamijenjeno i nije radilo, pa da, i sinoc sa mti govorio, ili kad vec, moras prvo funkciju ubacit pa sve ostalo
  bitan je redoslijed al maloprije ja svee ovako jos kopirala kao u fajlu tamo kako idu i nije islo haj ugl dobro je -->
   <script src="js/validation.js"></script> 
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- css -->
    
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Caveat&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/animatecss/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/gallery/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
    
 
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
  <!-- <link rel="stylesheet" href="./asset/css/style.css">  -->
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" href="style/contact.css">
  <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body onclick="myFunction()">

        <nav class="navbar  navbar-expand-lg fixed-top navbar-light bg-dark">
          
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>  
                    <!-- <a class="navbar-brand" href="#"> <img src="pictures/logo.png" alt=""></a> -->
            
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">MENU</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT US</a>
                          </li>
                          <li class="nav-item">
                                <a class="nav-link" href="#">CONTACT</a>
                              </li>
                          <li class="nav-item">
                                <a class="nav-link" href="#">ORDER ONLINE</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#">
                                <div class="profile_info">

			<div id="panel">
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong><i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
				
						<a href="home.php?logout='1'" style="color: red;">logout</a>
            &nbsp; <a><button id="addbtn" class="btn btn-light  btn-sm" onclick="document.getElementById('allusers').style.display='none';document.getElementById('createUser').style.display='block'">+ add user</button> </a>
            <a><button id="see" class="btn btn-light  btn-sm" onclick="document.getElementById('allusers').style.display='block'; document.getElementById('createUser').style.display='none'">See all user</button> </a>

				

				<?php endif ?>
			</div>
		</div>
                                </a>
                              </li>
                   
                  </ul>
              
                </div> 
            
              </nav>
              <section class="start">

                  <div class="startText" id="startText">
                    <div id="allusers">


                  
                  <?php
                    // Include config file
                    require_once "functions.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM users";
                    if($result = mysqli_query($db, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Password</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['password'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'>Update  </span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'>Delete</span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($db);
                    ?>

  </div>




                    <div id="createUser">
                
                  <form method="post" action="index.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> + Create user</button>
		</div>
	</form>
         </div>            
                   <p class="animated slideInRight"  id="head1" > Mamma mia! </p> 
                  <p class="animated slideInLeft " id="head2">ITALIAN RESTAURANT
                  </p> 
                  
</div>
              </section>

          <section class="section2">
            <div class="container">
              
                <div class="row">  
               <div class="col-sm">
                  <div class="aboutpic" >
                      <img   src="pictures/backgrounds/D1024_76_370_1200.jpg"  class="img-fluid" class="responsive-img animated slideInRight" >
               </div>
              
                </div>
                    <div class="col-sm">
                      <div class="about">OUR STORY</div>
                    <div class="about1">
                      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                      Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
                      in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
      
                    </div>
              
                    </div>
                 
            
      
                </div>
                <div class="row">
                  <div class="col-sm">
                    <div class="about2">

  
                  "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  "
                </div> 
               </div>
                </div>
          
            
      
         </div> </section>

         <section class="mbr-gallery mbr-slider-carousel cid-rzS8CZqtup" id="gallery2-7">

    

            <div>
                <div><!-- Filter -->
                  <div class="mbr-gallery-filter container gallery-filter-active">
                  <ul buttons="0"><li class="mbr-gallery-filter-all">
                    <a class="btn btn-md btn-primary-outline active display-4" href="">All pictures</a>
                  </li></ul></div>
                  
                  <!-- Gallery -->
                  <div class="mbr-gallery-row">
                    <div class="mbr-gallery-layout-default"><div></div>
                    <div><div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Mamma mia">
                      <div href="#lb-gallery2-7" data-slide-to="0" data-toggle="modal">
                        <img src="assets/images/3-5-2000x1333-800x529.jpeg" alt="" title="">
                        <span class="icon-focus"></span></div></div>
  
                        <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Our food"><div href="#lb-gallery2-7" data-slide-to="8" data-toggle="modal">
                                            <img src="assets/images/1-640x425-640x425.jpg" alt="" title="">
                                            <span class="icon-focus"></span></div></div>
                        <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Mamma mia">
                          <div href="#lb-gallery2-7" data-slide-to="1" data-toggle="modal">
                            <img src="assets/images/1-600x390-585x390.jpeg" alt="" title="">
                            <span class="icon-focus"></span></div></div>
  <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Our food"><div href="#lb-gallery2-7" data-slide-to="10" data-toggle="modal">
                                                <img src="assets/images/mbr-2-1920x1280-800x533.jpg" alt="" title="">
                                                <span class="icon-focus"></span></div></div>
                                                
                            <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Mamma mia">
                              <div href="#lb-gallery2-7" data-slide-to="2" data-toggle="modal">
                                <img src="assets/images/2-1195x800-800x536.jpg" alt="" title="">
                                <span class="icon-focus"></span></div></div>
                                
                                <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Mamma mia"><div href="#lb-gallery2-7" data-slide-to="3" data-toggle="modal">
                                  <img src="assets/images/000-hero-870x565-800x532.jpeg" alt="" title="">
                                  <span class="icon-focus"></span></div></div>
   
                                            <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Our food"><div href="#lb-gallery2-7" data-slide-to="9" data-toggle="modal">
                                              <img src="assets/images/2-1000x666-800x533.jpg" alt="" title="">
                                              <span class="icon-focus"></span></div></div>
                                  <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Mamma mia"><div href="#lb-gallery2-7" data-slide-to="4" data-toggle="modal">
                                    <img src="assets/images/inside-restaurant-1600x1067-800x534.jpg" alt="" title="">
                                    <span class="icon-focus"></span></div></div>
                                    
                                    <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Mamma mia"><div href="#lb-gallery2-7" data-slide-to="5" data-toggle="modal">
                                      <img src="assets/images/pasta-live-cooking-550x367-550x367.jpg" alt="" title="">
                                      <span class="icon-focus"></span></div></div>
                                      
                                      <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Mamma mia"><div href="#lb-gallery2-7" data-slide-to="6" data-toggle="modal">
                                        <img src="assets/images/mbr-1-1920x1280-800x533.jpg" alt="" title="">
                                        <span class="icon-focus"></span></div></div>
                                        
                                        <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Mamma mia"><div href="#lb-gallery2-7" data-slide-to="7" data-toggle="modal">
                                          <img src="assets/images/chefs-table-homepage-710x375-568x375.jpeg" alt="" title="">
                                          <span class="icon-focus"></span></div></div>
                                          
                                        
                                         
                                              
                                            
                                                <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Our food"><div href="#lb-gallery2-7" data-slide-to="11" data-toggle="modal">
                                                  <img src="assets/images/bacon-asparagus-frittata-recipe-1-735x980-735x980.jpg" alt="" title="">
                                                  <span class="icon-focus"></span></div></div>
                                                  
                                                  <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Our food"><div href="#lb-gallery2-7" data-slide-to="12" data-toggle="modal">
                                                    <img src="assets/images/4-1011x674-800x533.jpg" alt="" title="">
                                                    <span class="icon-focus"></span></div></div>
                                                    
                                                    <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Our food"><div href="#lb-gallery2-7" data-slide-to="13" data-toggle="modal">
                                                      <img src="assets/images/5-600x400-600x400.jpg" alt="" title="">
                                                      <span class="icon-focus"></span></div></div>
                                                      
                                                      
                                                      <div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Our food"><div href="#lb-gallery2-7" data-slide-to="14" data-toggle="modal">
                                                        <img src="assets/images/6-500x335-500x335.jpg" alt="" title="">
                                                        <span class="icon-focus"></span></div></div>
                                                    </div></div><div class="clearfix"></div></div></div>
                                                                
                                                                
                                                                
                                                                <!-- Lightbox -->
                                                                
                                                                <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery2-7"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="carousel-inner"><div class="carousel-item">
                                                                  <img src="assets/images/3-5-2000x1333.jpeg" alt="" title=""></div>
                                                                  <div class="carousel-item">
                                                                    <img src="assets/images/1-600x390.jpeg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/2-1195x800.jpg" alt="" title="">
                                                                    </div>
                                                                    <div class="carousel-item"><img src="assets/images/000-hero-870x565.jpeg" alt="" title="">
                                                                    </div>
                                                                    <div class="carousel-item"><img src="assets/images/inside-restaurant-1600x1067.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item active"><img src="assets/images/pasta-live-cooking-550x367.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/mbr-1-1920x1280.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/chefs-table-homepage-710x375.jpeg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/1-640x425.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/2-1000x666.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/mbr-2-1920x1280.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/bacon-asparagus-frittata-recipe-1-735x980.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/4-1011x674.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/5-600x400.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/6-500x335.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/mbr-2-1920x1080.jpeg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/mbr-1-1920x1080.jpg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/mbr-4-1920x1280.jpeg" alt="" title=""></div>
                                                                    <div class="carousel-item"><img src="assets/images/mbr-8-1920x1280.jpeg" alt="" title=""></div></div>
                                                                    <a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery2-7">
                                                                      <span class="mbri-left mbr-iconfont" aria-hidden="true">
        
                                                                      </span><span class="sr-only">Previous</span></a><a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery2-7"><span class="mbri-right mbr-iconfont" aria-hidden="true"></span>
                                                                        <span class="sr-only">Next</span></a><a class="close" href="#" role="button" data-dismiss="modal">
                                                                          <span class="sr-only">Close</span></a></div></div></div></div></div>
            </div>
        
        </section>

         <section class="section4">
             <div class="container">
                 <div class="row">
                    <div class="col">
                            <div id="contact">
                                CONTACT 
                            </div>
                            <div id="info">
                                INFORMATION
                            </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="animated fadeInUp" id="workTime">
                            <div id="add">
                                WORK TIME <img src="pictures/icons/location.png" alt="" width="20" height="20">
                            
                            </div>
                            <div id="add1">
                                 Monday-Thursday:08:00-22:00
                            </div>
                        </div>
                 </div>
                 
                 </div>
                 <div class="row">
                     <div class="col-md-6">
                            <div class="animated fadeInUp" id="address">
                                <div id="add">
                                    ADDRESS <img src="pictures/icons/location.png" alt="" width="20" height="20">
                                
                                </div>
                                <div id="add1">
                                     2 Lilac Ln, Wallington, NJ 07057
                                </div>
                            </div>
                     </div>
                     
                        <div class="col-md-6">
                            <div class="animated fadeInUp" id="telephone">
                                <div id="add">
                                    TELEPHONE <img src="pictures/icons/location.png" alt="" width="20" height="20">
                                
                                </div>
                                <div id="add1">
                                    +345697317253
                                </div>
                            </div>
                     </div>
                   

                     </div>

                 </div>


             </div>


         </section>  
       <section class="section5">

         <div class="container5">	
          <div class="row" id="row5">
            <div class="col-md-4">
              <div class="contact-info">
                <h2>Contact Us</h2>

               <h3> Do you have any comments or ideas you would like to share with us? Please feel free to send us a message.</h3>
                <!-- <div><a href=""><img src="pictures/socialNet/facebook.jpg" alt="" width="100" height="100"></a></div>
                <div><a href=""><img src="pictures/socialNet/instagram.png" alt="" width="100" height="100"></a></div>
                <div><a href=""><img src="pictures/socialNet/twitter.png" alt="" width="100" height="100"></a></div> -->
              </div>
            </div>		
            <div class="col-md-8">
             <form action="send_mail.php" method="post" id="contact_form">
              <div class="contact-form">
                <div id="message" class="alert alert-danger alert-dismissible fade"></div>
                <div class="form-group">				  
                  <label class="control-label col-sm-2" for="fname">First Name*:</label>
                  <div class="col-sm-7">          
                  <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="lname">Last Name*:</label>
                  <div class="col-sm-7">          
                  <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="email">Email*:</label>
                  <div class="col-sm-7">
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="comment">Comment*:</label>
                  <div class="col-sm-7">
                  <textarea class="form-control" rows="5" name="comment" id="comment"></textarea>
                  </div>
                </div>
                <div class="form-group">        
                 
                  <button type="submit" class="btn btn-default">Submit</button>
                  
                </div>
              </div>
              </form>
            </div>		
          </div>
        </div>	
        </section>


  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/masonry/masonry.pkgd.min.js"></script>
  <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/slidervideo/script.js"></script>
  <script src="assets/gallery/player.min.js"></script>
  <script src="assets/gallery/script.js"></script>
  

<script>
$(function () {
  $(document).scroll(function () {
    var $nav = $(".bg-dark");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});
</script>

</body>
</html>