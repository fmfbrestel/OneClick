<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title></title>
    <link rel="stylesheet" type="text/css"
          href="./Style.css">
</head>
<body>
        
        <div id="wrapper">

            <header>
                <h1>Mississippi</h1>
                <div id="user">
                    
                <?php if (isset($_SESSION['userInfo'])): ?>
                    <a href="?action=profile"><?php echo htmlspecialchars($_SESSION['userInfo']['userName']); ?></a>
                  
                <?php else:?>
                    
                    <a href="?action=login">Log In</a>
                    
              <?php endif ?>
               
                          
                </div> 
            </header>