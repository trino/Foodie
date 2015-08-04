 <div class="row " style="padding-top: 20px;">
        <div class="col-xs-12">
            <div class="">
                <!--div class="banners--big">
Welcome, test
</div-->
            </div>
        </div>
    </div>
  <div class="col-md-12">
<?php echo $this->element('restaurant_menus');?>
<div class="col-xs-12  col-sm-9">
<div class="grid">
<h3 class="sidebar__title">Menu Manager</h3>
<hr class="shop__divider">
<div class="dashboard">

<div class="">



<div class="banners--big  banners--big-left clearfix">
<div class="row">
<div class="col-xs-12  col-md-6">

Start by adding a Category

</div>
<div class="col-xs-12  col-md-6">
<div class="banners--big__form">
<form action="" method="post" class="addcat">
<div class="form-group  form-group--form">

      <input required class="form-control  form-control--form"  type="text" placeholder="Category Title" name="cattitle" />

<input type="submit" value="Add" class="btn btn-darker" />

</div>
</form>
</div>
</div>
</div>
</div>



<div class="col-xs-12 col-sm-12">
<form action="" method="post" class="addcat">
</form>
</div>




<div class="clearfix"></div>
<div class="col-xs-12 col-sm-12">
<ul class="parentinfo">

    <li class="infolistwhite row" id="catid" style="padding-bottom:0px;">
        
        <div class="col-xs-12 col-sm-4 cattitle" style="padding-top:7px;">
        <div class="col-sm-4" style="padding: 0;"><img style="max-width: 100%;" src="<?php echo $this->request->webroot;?>images/608760_802485.png"  /></div>
        <div class="col-sm-8"><h4  class="sidebar__title" >Rolls</h4></div>

        <div class="clearfix"></div>

        </div>

        <div class="col-xs-12 col-sm-8 marbot icon-move">
         <a href="javascript:void(0)" id="editcat" onclick="$('.cattitle').html('<input class=\'myinputs catetitle\' type=\'text\' value = \'rolls\'/><a href\'javascript:void(0);\' class=\'btn btn-success changeme\' id=\'change\'>Save</a>');$('#item').hide();" class="btn btn-success">Edit Category</a>
        <a href="javascript:void(0)" id="addmenucat" class="btn btn-darker" onclick="$('#item').show();$('.cattitle').html('<h3 class=\'sidebar__title\'>Rolls</h3>');clear_all('');">Add Item</a>
        <a href="javascript:void(0)" id="addimgcat" class="btn btn-info addimgcat">Add Image</a>
        <a href="javascript:void(0)" id="deletecat" class="deletecat btn btn-danger">Delete</a>

        

        <div style="clear: both;"></div>
        </div>

        <div class="clearfix"></div>
          <div class="col-xs-12 col-sm-8 addmenu" style="display: none;margin-bottom:10px;" id="item">
            <div class="menu_item">
                <div class="col-xs-12 col-sm-4"><strong>Item Name</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="menu_item" class="menu_item_name" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Item Price</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="price" class="price" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Description</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="description" class="description" placeholder="" /></div>
                <div class="clearfix"></div>
                <input type="hidden" name="cat_id" class="cat_id" value="<?php $cats['MenuCategory']['id'];?>" />
                <input type="button" class="opt btn btn-info" onclick="$(this).parent().find('.radios').show();$('.hasopt').val(1);if($('#addopt').attr('style')=='display: none;'){$('#addopt').show();}else{$('#addopt').attr('style','display: none;');}$('#addopt').load('<?php echo $this->request->webroot;?>restaurants/optional/');" value="Has additional Items" />
                <input type="hidden" name="has_opt" value="0" class="hasopt" />
                
                 
                <div class="optional" id="addopt" style="display: none;">
                </div>
                
                <a href="javascript:void(0);" id="itemadd" class="btn btn-primary addmenubtn">Add</a>
                
            </div>
            
        </div>
        <div class="clearfix">
</div>
 </li>
 <li class="infolistwhite row" id="catid" style="padding-bottom:0px;">
        
        <div class="col-xs-12 col-sm-4 cattitle" style="padding-top:7px;">
        <div class="col-sm-4" style="padding: 0;"><img style="max-width: 100%;" src="<?php echo $this->request->webroot;?>images/713930_422295.png"  /></div>
        <div class="col-sm-8"><h4  class="sidebar__title" >Drinks</h4></div>

        <div class="clearfix"></div>

        </div>

        <div class="col-xs-12 col-sm-8 marbot icon-move">
         <a href="javascript:void(0)" id="editcat" onclick="$('.cattitle').html('<input class=\'myinputs catetitle\' type=\'text\' value = \'rolls\'/><a href\'javascript:void(0);\' class=\'btn btn-success changeme\' id=\'change\'>Save</a>');$('#item').hide();" class="btn btn-success">Edit Category</a>
        <a href="javascript:void(0)" id="addmenucat" class="btn btn-darker" onclick="$('#item').show();$('.cattitle').html('<h3 class=\'sidebar__title\'>Drinks</h3>');clear_all('');">Add Item</a>
        <a href="javascript:void(0)" id="addimgcat" class="btn btn-info addimgcat">Add Image</a>
        <a href="javascript:void(0)" id="deletecat" class="deletecat btn btn-danger">Delete</a>

        

        <div style="clear: both;"></div>
        </div>

        <div class="clearfix"></div>
          <div class="col-xs-12 col-sm-8 addmenu" style="display: none;margin-bottom:10px;" id="item">
            <div class="menu_item">
                <div class="col-xs-12 col-sm-4"><strong>Item Name</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="menu_item" class="menu_item_name" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Item Price</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="price" class="price" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Description</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="description" class="description" placeholder="" /></div>
                <div class="clearfix"></div>
                <input type="hidden" name="cat_id" class="cat_id" value="<?php $cats['MenuCategory']['id'];?>" />
                <input type="button" class="opt btn btn-info" onclick="$(this).parent().find('.radios').show();$('.hasopt').val(1);if($('#addopt').attr('style')=='display: none;'){$('#addopt').show();}else{$('#addopt').attr('style','display: none;');}$('#addopt').load('<?php echo $this->request->webroot;?>restaurants/optional/');" value="Has additional Items" />
                <input type="hidden" name="has_opt" value="0" class="hasopt" />
                
                 
                <div class="optional" id="addopt" style="display: none;">
                </div>
                
                <a href="javascript:void(0);" id="itemadd" class="btn btn-primary addmenubtn">Add</a>
                
            </div>
            
        </div>
        <div class="clearfix">
</div>
 </li>
 <li class="infolistwhite row" id="catid" style="padding-bottom:0px;">
        
        <div class="col-xs-12 col-sm-4 cattitle" style="padding-top:7px;">
        <div class="col-sm-4" style="padding: 0;"><img style="max-width: 100%;" src="<?php echo $this->request->webroot;?>images/795950_413229.png"  /></div>
        <div class="col-sm-8"><h4  class="sidebar__title" >Rice</h4></div>

        <div class="clearfix"></div>

        </div>

        <div class="col-xs-12 col-sm-8 marbot icon-move">
         <a href="javascript:void(0)" id="editcat" onclick="$('.cattitle').html('<input class=\'myinputs catetitle\' type=\'text\' value = \'rolls\'/><a href\'javascript:void(0);\' class=\'btn btn-success changeme\' id=\'change\'>Save</a>');$('#item').hide();" class="btn btn-success">Edit Category</a>
        <a href="javascript:void(0)" id="addmenucat" class="btn btn-darker" onclick="$('#item').show();$('.cattitle').html('<h3 class=\'sidebar__title\'>Rolls</h3>');clear_all('');">Add Item</a>
        <a href="javascript:void(0)" id="addimgcat" class="btn btn-info addimgcat">Add Image</a>
        <a href="javascript:void(0)" id="deletecat" class="deletecat btn btn-danger">Delete</a>

        

        <div style="clear: both;"></div>
        </div>

        <div class="clearfix"></div>
          <div class="col-xs-12 col-sm-8 addmenu" style="display: none;margin-bottom:10px;" id="item">
            <div class="menu_item">
                <div class="col-xs-12 col-sm-4"><strong>Item Name</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="menu_item" class="menu_item_name" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Item Price</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="price" class="price" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Description</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="description" class="description" placeholder="" /></div>
                <div class="clearfix"></div>
                <input type="hidden" name="cat_id" class="cat_id" value="<?php $cats['MenuCategory']['id'];?>" />
                <input type="button" class="opt btn btn-info" onclick="$(this).parent().find('.radios').show();$('.hasopt').val(1);if($('#addopt').attr('style')=='display: none;'){$('#addopt').show();}else{$('#addopt').attr('style','display: none;');}$('#addopt').load('<?php echo $this->request->webroot;?>restaurants/optional/');" value="Has additional Items" />
                <input type="hidden" name="has_opt" value="0" class="hasopt" />
                
                 
                <div class="optional" id="addopt" style="display: none;">
                </div>
                
                <a href="javascript:void(0);" id="itemadd" class="btn btn-primary addmenubtn">Add</a>
                
            </div>
            
        </div>
        <div class="clearfix">
</div>
 </li>
 <li class="infolistwhite row" id="catid" style="padding-bottom:0px;">
        
        <div class="col-xs-12 col-sm-4 cattitle" style="padding-top:7px;">
        <div class="col-sm-4" style="padding: 0;"><img style="max-width: 100%;" src="<?php echo $this->request->webroot;?>images/807424_788210.jpg"  /></div>
        <div class="col-sm-8"><h4  class="sidebar__title" >Rolls</h4></div>

        <div class="clearfix"></div>

        </div>

        <div class="col-xs-12 col-sm-8 marbot icon-move">
         <a href="javascript:void(0)" id="editcat" onclick="$('.cattitle').html('<input class=\'myinputs catetitle\' type=\'text\' value = \'rolls\'/><a href\'javascript:void(0);\' class=\'btn btn-success changeme\' id=\'change\'>Save</a>');$('#item').hide();" class="btn btn-success">Edit Category</a>
        <a href="javascript:void(0)" id="addmenucat" class="btn btn-darker" onclick="$('#item').show();$('.cattitle').html('<h3 class=\'sidebar__title\'>Rolls</h3>');clear_all('');">Add Item</a>
        <a href="javascript:void(0)" id="addimgcat" class="btn btn-info addimgcat">Add Image</a>
        <a href="javascript:void(0)" id="deletecat" class="deletecat btn btn-danger">Delete</a>

        

        <div style="clear: both;"></div>
        </div>

        <div class="clearfix"></div>
          <div class="col-xs-12 col-sm-8 addmenu" style="display: none;margin-bottom:10px;" id="item">
            <div class="menu_item">
                <div class="col-xs-12 col-sm-4"><strong>Item Name</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="menu_item" class="menu_item_name" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Item Price</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="price" class="price" placeholder="" /></div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-4"><strong>Description</strong></div><div class="col-xs-12 col-sm-8"><input type="text" name="description" class="description" placeholder="" /></div>
                <div class="clearfix"></div>
                <input type="hidden" name="cat_id" class="cat_id" value="<?php $cats['MenuCategory']['id'];?>" />
                <input type="button" class="opt btn btn-info" onclick="$(this).parent().find('.radios').show();$('.hasopt').val(1);if($('#addopt').attr('style')=='display: none;'){$('#addopt').show();}else{$('#addopt').attr('style','display: none;');}$('#addopt').load('<?php echo $this->request->webroot;?>restaurants/optional/');" value="Has additional Items" />
                <input type="hidden" name="has_opt" value="0" class="hasopt" />
                
                 
                <div class="optional" id="addopt" style="display: none;">
                </div>
                
                <a href="javascript:void(0);" id="itemadd" class="btn btn-primary addmenubtn">Add</a>
                
            </div>
            
        </div>
        <div class="clearfix">
</div>
 </li>

</ul>
</div>
</div>

</div>
<div class="clearfix  hidden-xs"></div>
</div>
<hr class="shop__divider">

</div>
</div>


<script>
function clear_all(cat_id)
{
$('#addopt'+cat_id+' .addopt').each(function(){
$(this).remove();
});
$('#addopt'+cat_id).hide();
$('.hasopt'+cat_id).val(0);
}
</script>