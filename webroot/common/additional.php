    <div class="menuwrapper">
    <p>&nbsp;</p>
    <div class="col-md-6">
        <div class="col-sm-3 nopadd">
            <div class="menuimg"></div>
            <br />
            <a href="javascript:void(0)" class="btn btn-success newbrowse">Image</a>
        </div>
        <div class="col-sm-9 lowheight">
            <input class="form-control newtitle" type="text" placeholder="Title" /><br />
            <input class="form-control newprice" type="text" placeholder="$" /><br />
            <textarea class="form-control newdesc" placeholder="Description"></textarea>
                
        </div> 
        <div class="clearfix"></div>   
    </div>
    <div class="col-md-6">
        <div class="col-md-8">
            
            <div class="newaction">
            <a href="javascript:void(0)" class="btn btn-info" onclick="add_additional(0);">Add Additional Item</a><br />
            OR<br />
            <a href="javascript:void(0)" class="btn btn-info">Save</a><br />
            OR<br />
            <a href="javascript:void(0)" class="btn btn-danger removelast" onclick="removelast($(this))">Remove</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>    
    </div>
