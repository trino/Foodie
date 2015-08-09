<script src="<?php echo $this->request->webroot;?>assets/global/scripts/additional.js"></script>
<div class="newmenu">
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
            <select class="form-control newday">
                <option>Choose Deal Day</option>
                <option>Sunday</option>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
            </select>
            <br />
            <div class="newaction">
            <a href="javascript:void(0)" class="btn btn-info" onclick="add_additional(0);">Add Additional Item</a><br />
            OR<br />
            <a href="javascript:void(0)" class="btn btn-info">Save</a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>    
    <div class="additional<?php echo $_GET['menu_id'];?>"></div>   
    <div class="clearfix"></div>
</div>