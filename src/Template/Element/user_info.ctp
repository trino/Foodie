<?php
  $isset = isset($Profile);
?>
<form action="" class="form-horizontal" method="post">
    <INPUT TYPE="hidden" name="action" value="<?php if($isset) { echo 'editprofile'; } else { echo 'signup'; } ?>">
    <fieldset>
        <legend>Your personal details</legend>
        <div class="form-group">
            <label class="col-lg-4 control-label" for="Name">Name <span class="require">*</span></label>
            <div class="col-lg-8">
              <input type="text" name="Name" class="form-control" value="<?php if($isset) {echo $Profile->Name; } ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Email">Email <span class="require">*</span></label>
            <div class="col-lg-8">
              <input type="text" name="Email" class="form-control" value="<?php if($isset) {echo $Profile->Email; } ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-4 control-label" for="Phone">Phone<span class="require">*</span></label>
            <div class="col-lg-8">
              <input type="text" name="Phone" class="form-control" value="<?php if($isset) {echo $Profile->Phone; } ?>">
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Your password</legend>
        <div class="form-group">
            <label class="col-lg-4 control-label" for="Password">Password <span class="require">*</span></label>
            <div class="col-lg-8">
              <input type="text" name="Password" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4 control-label" for="Confirm-Password">Confirm password <span class="require">*</span></label>
            <div class="col-lg-8">
              <input type="text" name="Confirm-Password" class="form-control">
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Newsletter</legend>
        <div class="checkbox form-group">
            <label class="col-lg-4 control-label" for="newsletter">Sign up for our Newsletter</label>
            <div class="col-lg-8">
                <div class="checker"><span>
                    <input type="checkbox" name="newsletter" id="newsletter" class="form-control" <?php if($isset && $Profile->Subscribed){ echo " checked";} ?>>
                </span></div>
            </div>
        </div>
    </fieldset>

    <div class="row">
        <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
            <button class="btn btn-primary" type="submit"><?php if($isset) {echo 'Save';} else {echo 'Create an account';} ?></button>
            <button class="btn btn-default" type="button">Cancel</button>
        </div>
    </div>
</form>