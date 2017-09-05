<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
    <title></title>
    <link rel="stylesheet" type="text/css"
          href="/websitei-team2/Style.css">
</head>
<body>
        
        <div id="wrapper">

            <header>
                <h1>Mississippi</h1><br><br>
                <div id="user">
                    
                <?php if ($_SESSION['user'] != 'unk'): ?>
                    <a href="?action=profile"><?php echo htmlspecialchars($_SESSION['userName']); ?></a>
                  
                <?php else:?>
                    
                    <a href="?action=login">Log In</a>
                    
              <?php endif ?>
               
                          
                </div> 
            </header>