<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sign in</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../public/css/signIO/signIOlayout.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../public/css/signIO/signIOanimation.css'>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src='main.js'></script>
</head>
<script>
    $( document ).ready( function() {
        // code ...
        $('#submitButton').on('click', function () {

            var customerId = $('#customerId').val();
            var customerPassword = $('#customerPassword').val();

            // ajax --start
            $.ajax({
                url : '/login'
            
                , type : 'post'
                , data : {
                    customerId : customerId,
                    customerPassword : customerPassword
                }
                , datetype : 'JSON'
                , success : function(res){
                    console.log(res)    
                    if(res == "0") {
                        alert("nono");
                    }else {
                        location.href = "/product";
                    }
                }
                , error : function(){
                    alert('Error');
                }
            });
        })
    });
</script>
<body>
    <script type="text/javascript" src="../public/script/signIO/signin.js"></script>
    <center>
        <div class="jello-vertical">
                <div class="site-wrapper">
                    <div class="signup-form-container">
                        
                        <header class="signup-form-header">
                        <h1>Signin</h1>
                        <p>It just takes 10 seconds!</p>
                        </header>
                        
                        <main class="signup-form-body">
                            <div id="signup-form">
                                <p>
                                <label for="fullname">Your Id</label>
                                <input type="text" id="customerId" name="customerId" placeholder="入力してください" required />
                                </p>
                                
                                <p>
                                <label for="password">Your Password</label>
                                <input type="password" id="customerPassword" name="customerPassword" placeholder="at least 4 characters" minlength="4" required/>
                                </p>
                                
                                <p>
                                <input id="submitButton" type="submit"/ value="Sign In">
                                </p>
                            </div>
                        </main>
                        
                        <footer class="signup-form-footer">
                            <p>Already Have an Account?&nbsp;&nbsp;&nbsp;<a href="#">Login</a></p>
                        </footer>
                        
                    </div>
                </div>
        </div>
    </center>
</body>
</html>