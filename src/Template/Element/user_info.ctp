      <form action="" class="form-horizontal" method="post">
                <INPUT TYPE="hidden" name="action" value="signup">
                    <fieldset>
                      <legend>Your personal details</legend>
                      <div class="form-group">
                        <label class="col-lg-4 control-label" for="Name">Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="Name" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-4 control-label" for="Email">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="Email" class="form-control">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-4 control-label" for="Phone">Phone<span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="Phone" class="form-control">
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
                          <div class="checker"><span><input type="checkbox" name="newsletter" id="newsletter" class="form-control"></span></div>
                        </div>
                      </div>
                    </fieldset>

                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <button class="btn btn-primary" type="submit">Create an account</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>