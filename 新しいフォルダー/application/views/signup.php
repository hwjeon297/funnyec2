<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign in</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../public/css/signIO/signIOlayout.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../public/css/signIO/signIOanimation.css'>
</head>
<script>
    
</script>
<body>
    <center>
        <div class="jello-vertical-signup">
                <div class="site-wrapper">
                    <div class="signup-form-container">
                        
                        <header class="signup-form-header">
                        <h1>Signup</h1>
                        <p>It just takes 30 seconds!</p>
                        </header>
                        
                        <main class="signup-form-body">
                        
                        <form action="#" id="signup-form">
                            <p>
                            <label for="fullname">Your Name</label>
                            <input type="text"  id="fullname" name="fullname" placeholder="Srithan Savela" required /> 
                            </p>

                            <p>
                            <label for="password">Your New Password</label>
                            <input type="password" id="password" name="password" placeholder="at least 8 characters" minlength="8" required/>
                            </p>
                            
                            <p>
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" placeholder="iamsrithan@gmail.com" required /> 
                            </p>

                            <p>
                            <label for="phoneNumber">Your PhoneNumber</label>
                            <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="XXX-XXXX-...." pattern="[0-9]-[0-9]-[0-9]"required /> 
                            </p>

                            <p>
                            <label for="address">Your Address</label>
                            <input type="tel" id="address" name="address" placeholder="" required /> 
                            </p>
                            
                            <p>
                            <input type="submit" name="submit" value="Create Account"/>
                            </p>
                            
                        </form>
                        
                        </main>
                        
                        <footer class="signup-form-footer">
                            <p>Already Have an Account?&nbsp;&nbsp;&nbsp;<a href="#">Login</a></p>
                        </footer>
                        
                    </div>
                </div>
        </div>
    </center>
</body>
