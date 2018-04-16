<?

include_once(dirname(__FILE__) . "\..\..\service\php\userinfo.php");

?>
<div class="container formcontainer usercont" style="display: none;">
    <form class="user_form" action="" method="post">
        <span class="spanabout">Information</span>
        <div id="form">
            <div class="inputs">
                <label for="log">Login</label>
                <input type="text" name="login" id="log" placeholder="" value="<?php echo $result["login"]; ?>" disabled>
            </div>
            <div class="inputs">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="" value="<? echo $result["email"]; ?>" disabled>
            </div>
            <div class="inputs">
                <label for="pass">Password</label>
                <input type="password" name="password" id="pass" placeholder="Password" value="" disabled>
            </div>
            <div class="inputs">
                <input type="submit" value="Edit information" name="edit">
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="post" class="edit_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputLogin" class="col-sm-2 col-form-label">Login</label>
                        <div class="col-sm-10">
                            <input type="text" name="login" class="form-control" id="inputLogin" placeholder="Login" value="<? echo $result["login"]; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<? echo $result["email"]; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirm" class="form-control" id="inputPassword" placeholder="Confirm Password" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save changes" name="saveedit">
                </div>
            </div>
        </form>
    </div>
</div>