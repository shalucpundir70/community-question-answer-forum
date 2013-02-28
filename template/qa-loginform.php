<ul class="tabs_login">
    <li class="active_login"><a href="#tab1_login"><?php _e('Login', 'qaf-forum'); ?></a></li>
    <li><a href="#tab2_login"><?php _e('Register', 'qaf-forum'); ?></a></li>
    <li><a href="#tab3_login"><?php _e('Forgot?', 'qaf-forum'); ?></a></li>
</ul>
<div class="tab_container_login">
    <div id="tab1_login" class="tab_content_login">

        <?php
        $register = $_GET['register'];
        $reset = $_GET['reset'];
        if ($register == true) {
            ?>

            <h3><?php _e('Success!', 'qaf-forum'); ?></h3>
            <p><?php _e('Check your email for the password and then return to log in.', 'qaf-forum'); ?></p>

        <?php } elseif ($reset == true) { ?>

            <h3><?php _e('Success!', 'qaf-forum'); ?></h3>
            <p><?php _e('Check your email to reset your password.', 'qaf-forum'); ?></p>

        <?php } else { ?>

            <h3><?php _e('Have an account?', 'qaf-forum'); ?></h3>
            <p>Log in or sign up! It&rsquo;s fast &amp; <em>free!</em></p>

        <?php } ?>

        <form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
            <div class="username">
                <label for="user_login"><?php _e('Username'); ?>: </label>
                <input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
            </div>
            <div class="password">
                <label for="user_pass"><?php _e('Password'); ?>: </label>
                <input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
            </div>
            <div class="login_fields">
                <div class="rememberme">
                    <label for="rememberme">
                        <input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> Remember me
                    </label>
                </div>
                <?php do_action('login_form'); ?>
                <input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />
                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <input type="hidden" name="user-cookie" value="1" />
            </div>
        </form>
    </div>
    <div id="tab2_login" class="tab_content_login" style="display:none;">
        <h3><?php _e('Register for this site!', 'qaf-forum'); ?></h3>
        <p><?php _e('Sign up now for the good stuff.', 'qaf-forum'); ?></p>
        <form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
            <div class="username">
                <label for="user_login"><?php _e('Username'); ?>: </label>
                <input type="text" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="101" />
            </div>
            <div class="password">
                <label for="user_email"><?php _e('Your Email'); ?>: </label>
                <input type="text" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102" />
            </div>
            <div class="login_fields">
                <?php do_action('register_form'); ?>
                <input type="submit" name="user-submit" value="<?php _e('Sign up!'); ?>" class="user-submit" tabindex="103" />
                <?php
                $register = $_GET['register'];
                if ($register == true) {
                    echo '<p>Check your email for the password!</p>';
                }
                ?>
                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
                <input type="hidden" name="user-cookie" value="1" />
            </div>
        </form>
    </div>
    <div id="tab3_login" class="tab_content_login" style="display:none;">
        <h3><?php _e('Lose something?', 'qaf-forum'); ?></h3>
        <p><?php _e('Enter your username or email to reset your password.', 'qaf-forum'); ?></p>
        <form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
            <div class="username">
                <label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
                <input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
            </div>
            <div class="login_fields">
                <?php do_action('login_form', 'resetpass'); ?>
                <input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit" tabindex="1002" />
                <?php
                $reset = $_GET['reset'];
                if ($reset == true) {
                    echo '<p>A message will be sent to your email address.</p>';
                }
                ?>
                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
                <input type="hidden" name="user-cookie" value="1" />
            </div>
        </form>
    </div>
</div>
