<script src="js/jquery.js"></script>

<?php 

if (isset($_POST["string"])&&isset($_POST['handle'])) {
	# code...

    $usrstring=htmlspecialchars($_POST['string']);
    #$hval=$_POST['handle'];
    #mysql_connect();
    require_once ('../mysqli_connect.php');

    if ($_POST['handle']==1) {
        $result=htmlspecialchars(md5($_POST['string']));//Extra level security
        $format='string <strong>'.$usrstring.'</strong> to md5';

        #$query='SELECT * FROM tmd5';
        #$response= mysqli_query($dbc,$query);
        #echo '<script>alert("'.$response.'")</script>';
        $query='INSERT INTO tmd5 (string,hashed)
                VALUES ("'.$usrstring.'","'.$result.'")';
        $response= mysqli_query($dbc,$query);

        echo '
            <script type="text/javascript">
                $(function(){
                    $("#result").html("The result for '.$format.' is <strong>'.$result.'</strong>");
                });
            </script>
            ';
    }
    if ($_POST['handle']==2) {
        $format='string <strong>'.$usrstring.'</strong> to sha1';
        $result=htmlspecialchars(sha1($_POST['string']));
        $query='INSERT INTO tsha1 (string,hashed)
                VALUES ("'.$usrstring.'","'.$result.'")';
        $response= mysqli_query($dbc,$query);
        echo '
            <script type="text/javascript">
                $(function(){
                    $("#result").html("The result for '.$format.' is <strong>'.$result.'</strong>");
                    
                });
            </script>
            ';
    }
    if ($_POST['handle']==3) {
        $format='string <strong>'.$usrstring.'</strong> to sha256';
        $result=htmlspecialchars(sha256($_POST['string']));
        $query='INSERT INTO tsha256 (string,hashed)
                VALUES ("'.$usrstring.'","'.$result.'")';
        $response= mysqli_query($dbc,$query);
        echo '
            <script type="text/javascript">

                $(function(){
                    $("#result").html("The result for '.$format.' is <strong>'.$result.'</strong>");
                    
                });
            </script>
            ';
    }
    if ($_POST['handle']==4) {
        $format='md5 '.$usrstring.' to string';
        $query='SELECT string FROM tmd5 WHERE hashed="'.$usrstring.'"';
        $response= mysqli_query($dbc,$query);
        $result= 'not available';
        //$result_pre= mysqli_fetch_object($response);
        
        if (mysqli_num_rows($response) > 0) 
        {

            // output data of each row
            while($row = mysqli_fetch_assoc($response)) {
               $result =  $row["string"];
            }
        }
        else 
        {
               $result =  "not available in the database right now";

        }
        echo '
            <script type="text/javascript">
                $(function(){
                    $("#result").html("The result for '.$format.' is <strong>'.$result.'</strong>");
                    
                });
            </script>
            ';
    }

    if ($_POST['handle']==5) {
        $format='sha1 '.$usrstring.' to string';
        $query='SELECT string FROM tsha1 WHERE hashed="'.$usrstring.'" limit 1';
        $response= mysqli_query($dbc,$query);

        if (mysqli_num_rows($response) > 0) 
        {

            // output data of each row
            while($row = mysqli_fetch_assoc($response)) {
               $result =  $row["string"];
            }
        }
        else 
        {
               $result =  "not available in the database right now";

        }
        echo '
            <script type="text/javascript">
                $(function(){
                    $("#result").html("The result for '.$format.' is <strong>'.$result.'</strong>");
                    
                });
            </script>
            ';
    }
    if ($_POST['handle']==6) {
        $format='sha256 '.$usrstring.' to string';
        $query='SELECT string FROM tsha256 WHERE hashed="'.$usrstring.'" limit 1';
        $response= mysqli_query($dbc,$query);
        if (mysqli_num_rows($response) > 0) 
        {

            // output data of each row
            while($row = mysqli_fetch_assoc($response)) {
               $result =  $row["string"];
            }
        }
        else 
        {
               $result =  "not available in the database right now";

        }
        echo '
            <script type="text/javascript">
                $(function(){
                    $("#result").html("The result for '.$format.' is <strong>'.$result.'</strong>");
                    
                });
            </script>
            ';
    }
    }
    else {

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hash Breacker | Abhipso Ghosh</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Break md5 sha1 and sha256</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="http://abhipso.tk">About</a>
                    </li>

                    <li>
                        <a href="http://abhipso.tk">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">                 <p class="lead">Hash</p>
<div class="list-group">                     <a href="#" data-pid="panel1"
id="btn1" class="list-group-item">String to md5</a>                     <a
href="#" data-pid="panel2" id="btn2" class="list-group-item">String to
sha1</a>                     <a href="#" data-pid="panel3" id="btn3" class
="list-group-item">String to sha256</a>                 </div>
<p class="lead">Break The Hash</p>                 <div class="list-group">
<a href="#" data-pid="panel4" id="btn4" class="list-group-item">Break md5</a>
<a href="#" data-pid="panel5" id="btn5" class="list-group-item">Break sha1</a>
<a href="#" data-pid="panel6" id="btn6" class="list-group-item">Break
sha256</a>                 </div>             </div>

            <div class="col-md-9">

                <div class="thumbnail">
                	<p> This is an open source project by Abhipso Ghosh. To see how it works please <a>click here</a>.</p>
                	<p>To view full source code on Github <a>click here</a>.</p>
                </div>

                <div class="well">
                	<div id="panel1" style="display: none;">
	                	<form action="index.php" method="POST">
	                	  <div class="form-group">
	                	    <label for="heading">Enter String to calculate md5:</label>
                            <input type="text" class="form-control" name="string">
	                	    <input type="hidden" class="form-control" name="handle" value="1">
	                	  </div>
	                	  <button type="submit" class="btn btn-default">Submit</button>
	                	</form>
                	</div>
                	<div id="panel2" style="display: none;">

	                	<form action="index.php" method="POST">
	                	  <div class="form-group">
	                	    <label for="heading">Enter String to calculate sha1:</label>
	                	    <input type="text" class="form-control" name="string">
                            <input type="hidden" class="form-control" name="handle" value="2">
	                	  </div>
	                	  <button type="submit" class="btn btn-default">Submit</button>
	                	</form>
                	</div>
                	<div id="panel3" style="display: none;">
	                
	                	<form action="index.php" method="POST">
	                	  <div class="form-group">
	                	    <label for="heading">Enter String to calculate sha256:</label>
	                	    <input type="text" class="form-control" name="string">
                            <input type="hidden" class="form-control" name="handle" value="3">
	                	  </div>
	                	  <button type="submit" class="btn btn-default">Submit</button>
	                	</form>
                	</div>
                	<div id="panel4" style="display: none;">
	                	<form action="index.php" method="POST">
	                	  <div class="form-group">
	                	    <label for="heading">Enter String to break md5:</label>
	                	    <input type="text" class="form-control" name="string">
                            <input type="hidden" class="form-control" name="handle" value="4">
	                	  </div>
	                	  <button type="submit" class="btn btn-default">Submit</button>
	                	</form>
                	</div>
                	<div id="panel5" style="display: none;">
	                	<form action="index.php" method="POST">
	                	  <div class="form-group">
	                	    <label for="heading">Enter String to break sha1:</label>
	                	    <input type="text" class="form-control" name="string">
                            <input type="hidden" class="form-control" name="handle" value="5">
	                	  </div>
	                	  <button type="submit" class="btn btn-default">Submit</button>
	                	</form>
                	</div>
                	<div id="panel6"  style="display: none;">
	                   	<form action="index.php" method="POST">
	                	  <div class="form-group">
	                	    <label for="heading">Enter String to break sha256:</label>
	                	    <input type="text" class="form-control" name="string">
                            <input type="hidden" class="form-control" name="handle" value="6">
	                	  </div>
	                	  <button type="submit" class="btn btn-default">Submit</button>
	                	</form>
                	</div>

                    <div id="result">
                        
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->

    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$(function () {
            <?php
                if (isset($_POST["handle"]))
                {
                echo '
                    var oldPid="#btn'.$_POST["handle"].'";
                    var oldPanel="#panel'.$_POST["handle"].'";
                ';
                }
                else
                {
                    echo '
                    var oldPid="#btn1";
            		var oldPanel="#panel1";
                    ';
                }
            ?>
    		$(oldPanel).show();
            $(oldPid).addClass('active');
    		$('.list-group-item').on('click', function(){
    			$(oldPid).removeClass('active');
    			var panelId=$(this).attr('data-pid');
    			oldPid=this;
    			$(oldPanel).hide();
    			oldPanel='#'+panelId;
    			$('#'+panelId).show();
    			$(this).addClass('active');
    		});

    	});
    </script>
</body>

</html>