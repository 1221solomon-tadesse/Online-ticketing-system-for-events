<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'ots';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
            <head>
                <meta charset="utf-8">
                <title>$title</title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
            </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>OTS</h1>
                <h2></h2>
                <div class="w3-bar w3-light-grey w3-border">
                
               
                <form action="search.php" method="post" class="search"><input type="text" placeholder="search anything" name="query" ><a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a></form>
                
                </div>
                <a href="login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
                <a href="signup.php"><i class="fas fa-user-plus"></i>Signup</a>
            </div>
        </nav>
    EOT;
    }
    function template_header_user($title,$user) {
        echo <<<EOT
        <!DOCTYPE html>
        <html>
                <head>
                    <meta charset="utf-8">
                    <title>$title</title>
                    <link href="style.css" rel="stylesheet" type="text/css">
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                </head>
            <body>
            <nav class="navtop">
                <div id="myTopnav" class="nav">                    
                    <h1 >Welcome Back! </h1>      
                    <h2></h2>
                    <div class="w3-bar w3-light-grey w3-border">
                    <form action="search.php" method="post" class="search"><input type="text" placeholder="" name="query" ><a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a></form>  
                    </div>
                    <a href="user.php" class="active"><i class="fas fa-home"></i></a>
                    <a href="profile.php"><i class="fas fa-user"></i></a>
                    <a href="tickets.php"><i class="fas fa-ticket-alt"></i></a>
                    
                    <a href="info.php"><i class="fas fa-info"></i></a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i></a>
                  </div>
            </nav>
        EOT;
        }
        function template_header_pro($title,$user) {
            echo <<<EOT
            <!DOCTYPE html>
            <html>
                    <head>
                        <meta charset="utf-8">
                        <title>$title</title>
                        <link href="style.css" rel="stylesheet" type="text/css">
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    </head>
                <body>
                <nav class="navtop">
                    <div id="myTopnav" class="nav">                    
                        <h1 >Welcome Back! </h1>      
                        <h2></h2>
                        <div class="w3-bar w3-light-grey w3-border">
                        <form action="search.php" method="post" class="search"><input type="text" placeholder="" name="query" ><a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a></form>  
                        </div>
                        <a href="user.php" ><i class="fas fa-home"></i></a>
                        <a href="profile.php"class="active"><i class="fas fa-user"></i></a>
                        <a href="tickets.php"><i class="fas fa-ticket-alt"></i></a>
                       
                        <a href="info.php"><i class="fas fa-info"></i></a>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i></a>
                      </div>
                </nav>
            EOT;
            }
            function template_header_in($title,$user) {
                echo <<<EOT
                <!DOCTYPE html>
                <html>
                        <head>
                            <meta charset="utf-8">
                            <title>$title</title>
                            <link href="style.css" rel="stylesheet" type="text/css">
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        </head>
                    <body>
                    <nav class="navtop">
                        <div id="myTopnav" class="nav">                    
                            <h1 >Welcome Back! </h1>      
                            <h2></h2>
                            <div class="w3-bar w3-light-grey w3-border">
                            <form action="search.php" method="post" class="search"><input type="text" placeholder="" name="query" ><a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a></form>  
                            </div>
                            <a href="user.php" ><i class="fas fa-home"></i></a>
                            <a href="profile.php"><i class="fas fa-user"></i></a>
                            <a href="tickets.php"><i class="fas fa-ticket-alt"></i></a>
                           
                            <a href="info.php" class="active"><i class="fas fa-info"></i></a>
                            <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa fa-bars"></i></a>
                          </div>
                    </nav>
                EOT;
                }
            function template_header_ti($title,$user) {
                echo <<<EOT
                <!DOCTYPE html>
                <html>
                        <head>
                            <meta charset="utf-8">
                            <title>$title</title>
                            <link href="style.css" rel="stylesheet" type="text/css">
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        </head>
                    <body>
                    <nav class="navtop">
                        <div id="myTopnav" class="nav">                    
                            <h1 >Welcome Back! </h1>      
                            <h2></h2>
                            <div class="w3-bar w3-light-grey w3-border">
                            <form action="search.php" method="post" class="search"><input type="text" placeholder="" name="query" ><a href="#" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a></form>  
                            </div>
                            <a href="user.php" ><i class="fas fa-home"></i></a>
                            <a href="profile.php"><i class="fas fa-user"></i></a>
                            <a href="tickets.php"class="active"><i class="fas fa-ticket-alt"></i></a>
                           
                            <a href="info.php"><i class="fas fa-info"></i></a>
                            <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa fa-bars"></i></a>
                          </div>
                    </nav>
                EOT;
                }
                function template_header_org($title,$t) {
                    echo <<<EOT
                    <!DOCTYPE html>
                    <html>
                            <head>
                                <meta charset="utf-8">
                                <title>$title</title>
                                <link href="style.css" rel="stylesheet" type="text/css">
                                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                            </head>
                        <body class="org">
                        <nav class="navtop" id="orgs">
                            <div>
                                <h1>OTS</h1>
        
                                <h1>$t</h1>
                                <a href="org.php"class="active" ><i class="fa fa-user"></i></a>
                                <a href="report.php"><i class="fas fa-plus-square"></i></a>
                                <a href="settings.php"><i class="fas fa-cog"></i></a>
                                <a href="infol.php"><i class="fas fa-info"></i></a>
                                <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                            </div>
                        </nav>
                    EOT;
                    }
        function template_header_orgr($title,$t) {
            echo <<<EOT
            <!DOCTYPE html>
            <html>
                    <head>
                        <meta charset="utf-8">
                        <title>$title</title>
                        <link href="style.css" rel="stylesheet" type="text/css">
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                    </head>
                <body class="org">
                <nav class="navtop">
                    <div>
                        <h1>OTS</h1>

                        <h1>$t</h1>
                        <a href="org.php" ><i class="fa fa-user"></i></a>
                        <a href="report.php"class="active"><i class="fas fa-plus-square"></i></a>
                        <a href="settings.php"><i class="fas fa-cog"></i></a>
                        <a href="infol.php"><i class="fas fa-info"></i></a>
                        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </nav>
            EOT;
            }
            function template_header_orgss($title,$t) {
                echo <<<EOT
                <!DOCTYPE html>
                <html>
                        <head>
                            <meta charset="utf-8">
                            <title>$title</title>
                            <link href="style.css" rel="stylesheet" type="text/css">
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                        </head>
                    <body  class="org">
                    <nav class="navtop">
                        <div>
                            <h1>OTS</h1>
    
                            <h1>$t</h1>
                            <a href="org.php" ><i class="fa fa-user"></i></a>
                            <a href="report.php"><i class="fas fa-plus-square"></i></a>
                            <a href="settings.php" class="active"><i class="fas fa-cog"></i></a>
                            <a href="infol.php"><i class="fas fa-info"></i></a>
                            <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </nav>
                EOT;
                }
        
            function template_header_orgi($title,$t) {
                echo <<<EOT
                <!DOCTYPE html>
                <html>
                        <head>
                            <meta charset="utf-8">
                            <title>$title</title>
                            <link href="style.css" rel="stylesheet" type="text/css">
                            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                        </head>
                    <body  class="org">
                    <nav class="navtop">
                        <div>
                            <h1>OTS</h1>
    
                            <h1>$t</h1>
                            <a href="org.php" ><i class="fa fa-user"></i></a>
                            <a href="report.php"><i class="fas fa-plus-square"></i></a>
                            <a href="settings.php"><i class="fas fa-cog"></i></a>
                            <a href="infol.php"class="active"><i class="fas fa-info"></i></a>
                            <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </nav>
                EOT;
                }
        
    

// Template footer
function template_footer() {
    echo <<<EOT
         <footer>
          <div class="btns">
          		<a href="create.php" class="btn">Create Ticket</a>
                	</div>
         </footer>
        </body>
    </html>
    EOT;
    }
    ?>