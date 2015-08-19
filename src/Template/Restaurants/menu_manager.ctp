
<div class="col-md-12">
    <?php echo $this->element('user_menu');?>
    <div class="col-md-10">
    
        <div class="dashboard">
            <div class="content-page">
                <h1>Menu Manager</h1>
                <hr />
                <a href="javascript:void(0);" onclick="add_item();" class="btn btn-primary">Add New Menu Item</a>
                <div class="addnew" style="display: none;"></div>
                <hr />
                <ul class="parentinfo">
                <?php
                if($menus){
                foreach($menus as $menu)
                {
                    ?>
                    <li class="infolistwhite row marbot newmenus" id="parent<?php echo $menu->ID;?>">
                        
                        <div class="col-md-4 menu_item">
                            
                            <div class="col-sm-4" style="padding: 0;">
                                <img class="itemimg4 itemimg" src="<?php echo $this->request->webroot;?>/img/products/<?php echo $menu->image;?>"  />
                            </div>
                            <div class="col-sm-8">
                                <h4 ><?php echo $menu->menu_item;?></h4>
                            </div>
                            <div class="clearfix"></div>
                
                        </div>
                
                        <div class="col-md-8">
                        <a href="javascript:void(0)" id="edititem<?php echo $menu->ID;?>" onclick="add_item(<?php echo $menu->ID;?>)" class="btn btn-success">Edit Item</a>
                        <a href="javascript:void(0)" id="addimgitem<?php echo $menu->ID;?>" class="btn btn-info addimgcat">Add Image</a>
                        <a href="<?php echo $this->request->webroot;?>menus/delete/<?php echo $menu->ID;?>" onclick="return confirm('Are you sure you want to delete this item?');" id="deleteitem<?php echo $menu->ID;?>" class="deletecat btn btn-danger">Delete</a>
                        <a href="javascript:void(0)" class="expandbtn expand1"><span class="expand"></span></a>
                        
                
                        <div style="clear: both;"></div>
                        </div>
                
                        <div class="clearfix"></div>
                         
                
                 </li>
                    <?php
                }}
                else
                {
                    ?>
                    <h2 class="nomenu">No item added yet!</h2>
                    <?php
                }
                ?>
                
                    
                
                </ul>
            </div>
        
        
        </div>
        <div class="clearfix  hidden-xs"></div>
    
    
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