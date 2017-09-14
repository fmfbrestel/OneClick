<?php include ('header.php');?>
    
<main>

                <form id="loginForm" action="./index.php" method="post" name="Login!">
                    <fieldset>
                        <input type="hidden" name="action" value="login-validation">
                        
                        <div id="loginHeader">
                            <h2>Login</h2>
                        </div>
                        <div id="loginFormMain">
                        <div id="loginName">
                            <label for="userName">User Name:</label>
                            <input type="text" name="login_username" value="<?php echo htmlspecialchars($userName); ?>">
                            <?php if (!empty($username_error_message)) { ?>
                                <p class="error-message"><?php echo htmlspecialchars($username_error_message); ?></p>
                            <?php } // end if ?> 
                        </div><br>
                        <div id="loginPassword">
                            <label for="password">Password:</label>
                            <input type="password" name="login_password" value="<?php echo htmlspecialchars($password); ?>"> 
                            <?php if (!empty($password_error_message)) { ?>
                                <p class="error-message"><?php echo htmlspecialchars($password_error_message); ?></p>
                            <?php } // end if ?> 
                        </div> <br>
                        <div class="form-submit">
                            <input id="loginButton" type="submit" value="Submit">
                        </div>
                        </div>
                        
                    </fieldset>

                </form>
      

            </main>

<?php include ('footer.php');?>