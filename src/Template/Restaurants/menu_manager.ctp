<div class="col-md-12 col-sm-12 col-xs-12">
    
<div class="content-page">
    <?php echo $this->element('user_menu'); ?>
    <div class="col-md-9 col-sm-8 col-xs-12 no-padding">
    
        <div class="dashboard">
            <div class="menu-manager">
                <h1>Menu Manager</h1>
                <hr />
                <a href="javascript:void(0);" id="add_item0" class="btn btn-primary add_item">Add New Menu Item</a>
                <div class="addnew" style="display: none;"></div>
                <hr />
                <ul class="parentinfo" id="sortable">
                <?php
                if($menus){
                    foreach($menus as $menu) {
                        ?>
                        <li class="infolistwhite row marbot newmenus" id="parent<?php echo $menu->ID;?>">

                            <div class="col-md-4 menu_item col-sm-4 col-xs-12">

                                <div class="col-sm-4 col-xs-12" style="padding: 0;">
                                    <img class="itemimg4 itemimg" src="<?= $this->request->webroot;?>/img/products/<?= $menu->image;?>"  />
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <h4 ><?= $menu->menu_item;?></h4>
                                </div>
                                <div class="clearfix"></div>

                            </div>

                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <a href="javascript:void(0)" id="add_item<?= $menu->ID;?>" class="btn btn-success add_item">Edit Item</a>
                                <a href="<?= $this->request->webroot;?>menus/delete/<?= $menu->ID;?>" onclick="return confirm('Are you sure you want to delete this item?');" id="deleteitem<?= $menu->ID;?>" class="deletecat btn btn-danger">Delete</a>
                                <a href="javascript:void(0)" class="expandbtn expand1"><span class="expand"></span></a>


                                <div style="clear: both;"></div>
                            </div>
                            <div class="clearfix"></div>
                     </li>
                     <hr class="blog-post-sep">
                    <?php
                    }
                } else {
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
</div>

<script>
$(function() {
    $( "#sortable" ).sortable({
        update : function (event,ui) {
                var order='';// array to hold the id of all the child li of the selected parent
                $('.parentinfo li').each(function(index) {
                        var val=$(this).attr('id').replace('parent','');
                        //var val=item[1];
                        if(order=='') {
                            order = val;
                        }else {
                            order = order + ',' + val;
                        }
                    });
               $.ajax({
                url:'<?= $this->request->webroot;?>menus/orderCat/',
                    data:'ids='+order,
                    type:'post',
                    success:function(){
                        //
                    }
               });
         }
    });
    //$( "#sortable" ).disableSelection();
});
  
function clear_all(cat_id) {
    $('#addopt'+cat_id+' .addopt').each(function(){
        $(this).remove();
    });
    $('#addopt'+cat_id).hide();
    $('.hasopt'+cat_id).val(0);
}
</script>