<?php 
    require_once "header.php";
 ?>
    <!-- Start page Title Section -->
    <div class="page-ttl">
        <div class="layer-stretch">
            <div class="page-ttl-container">
                <h1>Login</h1>
                <p><a href="#">Home</a> &#8594; <span>Login</span></p>
            </div>
        </div>
    </div><!-- End page Title Section -->
    <!-- Start Login Section -->
    <div id="login-page" class="layer-stretch">
        <div class="layer-wrapper"> 
            <div class="form-container">    
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-envelope-o"></i>
                    <input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="login-email">
                    <label class="mdl-textfield__label" for="login-email">Email <em> *</em></label>
                    <span class="mdl-textfield__error">Please Enter Valid Email!</span>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon">
                    <i class="fa fa-key"></i>
                    <input class="mdl-textfield__input" type="password" id="login-password">
                    <label class="mdl-textfield__label" for="login-password">Password <em> *</em></label>
                    <span class="mdl-textfield__error">Please Enter Valid Password!</span>
                    <div class="forgot-pass">Forgot Password?</div>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-input-icon form-bot-check">
                    <i class="fa fa-question"></i>
                    <input class="mdl-textfield__input" type="number" id="login-bot">
                    <label class="mdl-textfield__label" for="login-bot">What is 7 plus 1 = <em>* </em></label>
                    <span class="mdl-textfield__error">Please Enter Correct Value!</span>
                </div>
                <div class="form-submit">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect button button-primary">Login Now</button>
                </div>
                <div class="or-using">Or Using</div>
                <div class="social-login">
                    <a href="#" class="social-facebook"><i class="fa fa-facebook"></i>Facebook</a>
                    <a href="#" class="social-google"><i class="fa fa-google"></i>Google</a>
                </div>
                <div class="login-link">
                    <span class="paragraph-small">Don't have an account?</span>
                    <a href="#" class="">Register as New User</a>
                </div>
            </div>
        </div>
    </div><!-- End Login Section -->
<?php 
    require_once "footer.php";
 ?>
