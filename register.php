<?php 
include_once('includes/_header.php');
include_once('includes/_top.php');
?>

        <div id="container" class="row-fluid">
            <?php 
            include_once('includes/_sidebar.php');
            ?>
            <!--BEGIN CONTENT-->
            <div id="main-content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="span12">
                            <h3 class="page-title">
                                Register User
                                <small>register for a new user</small>
                            </h3>
                            <ul class="breadcrumb">
                                        <li>
                                            <i class="icon-home"></i><span class="divider">&nbsp;</span>
                                        </li>
                                        <li>
                                            Microhydro Monitoring<span class="divider">&nbsp;</span>
                                        </li>
                                        <li>
                                            Register User<span class="divider-last">&nbsp;</span>
                                        </li>
                                        <li class="pull-right search-wrap"></li>
                                    </ul>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12"> 
                            <div class="widget">
                                <div class="widget-title">
                                    <h4><i class="icon-reorder"></i>Register User</h4>
                                    <span class="tools">
                                    <a href="javascript:;" class="icon-chevron-down"></a>
                                    <a href="javascript:;" class="icon-remove"></a>
                                    </span>
                                </div>
                                <div class="widget-body form">
                                    <ul>
                                        <li>Emails must have a valid email format</li>
                                        <li>Passwords must contain :
                                            <ul>
                                                <li>At least one upper case letter (A..Z)</li>
                                                <li>At least one lower case letter (a..z)</li>
                                                <li>At least one number (0..9)</li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <form method="post" name="registration_form" action="">
                                        <div class="control-group">
                                            <label class="control-label">Nama</label>
                                            <div class="controls">
                                                <input type="text" name='username' id='username' class="span6  popovers" data-trigger="hover" data-content="Input Username" data-original-title="Usernames may contain only digits, upper and lower case letters and underscores" />
                                            </div>
                                        </div>  
                                        <div class="control-group">
                                            <label class="control-label">Email</label>
                                            <div class="controls">
                                                <div class="input-prepend">
                                                    <span class="add-on">@</span><input class=" " type="text" name="email" id="email" placeholder="Email Address" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Password</label>
                                            <div class="controls">
                                                <input type="password" name="password" id="password" class="span6  popovers" data-trigger="hover" data-content="Input Password" data-original-title="Passwords must be at least 6 characters long" />
                                            </div>
                                        </div> 
                                        <div class="control-group">
                                            <label class="control-label">Retype Password</label>
                                            <div class="controls">
                                                <input type="password" name="confirmpwd" id="confirmpwd" class="span6  popovers" data-trigger="hover" data-content="Input Password Again" data-original-title="Your password and confirmation must match exactly" />
                                            </div>
                                        </div> 
                                        <div class="form-actions">
                                            <input type="button" value="Register" 
                                            onclick="return regformhash(this.form,
                                                            this.form.username,
                                                            this.form.email,
                                                            this.form.password,
                                                            this.form.confirmpwd);" />
                                        </div>
                                    </form>        
                            </div>
                        </div>       
                    </div>
                </div>
            </div>
            <!--FINISH CONTENT-->
        </div>

<?php 
include_once('includes/_footer.php');
?>
