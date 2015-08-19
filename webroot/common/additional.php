    
    <div class="menuwrapper">
    <div class="col-md-7">
        
        <div class="col-sm-12 lowheight">
            <input class="form-control ctitle" type="text" placeholder="Title" value="<?php if(isset($child->menu_item)){echo $child->menu_item;}?>" /><br />
            <textarea class="form-control cdescription" placeholder="description"><?php if(isset($child->description)){echo $child->description;}?></textarea>    
        </div> 
        <div class="col-sm-12 additionalitems">
        <div class="aitems">
            
            
            <div class="addmore">
            <?php
            if(isset($child->ID)){
            $more = $this->requestAction('menus/getMore/'.$child->ID);
            if($more)
            {
                $i=0;
                foreach($more as $cc)
                {
                    $i++;
                    ?>
                    <div class="cmore">
                    <?php if($i!=1){?>
                    	<p style="margin-bottom:0;height:7px;">&nbsp;</p>
                    <?php }?>
                        <div class="col-md-10 nopadd">
                        	<input class="form-control cctitle" type="text" placeholder="Item" value="<?php echo $cc->menu_item;?>" />
                        	<input class="form-control ccprice" type="text" placeholder="Price" value="<?php echo $cc->price;?>" style="margin-left:10px;" />  
                        </div>
                    <div class="col-md-2" <?php if($i==1){?>style="display: none;"<?php }?>>
                        <a href="javascript:void(0);" class="btn btn-danger btn-small" onclick="$(this).parent().parent().remove();"><span class="fa fa-close"></span></a> 
                    </div>
                    <div class="clearfix"></div>
                    </div>
                    <?php
                }
            }
            }
            else
            {
                ?>
                
                <div class="cmore">
                <div class="col-md-10 nopadd">
                    <input class="form-control cctitle" type="text" placeholder="Item" />
                    <input class="form-control ccprice" type="text" placeholder="Price" style="margin-left:10px;" />   
                </div> 
                <div class="col-md-2" style="display: none;">
                    <a href="javascript:void(0);" class="btn btn-danger btn-small"><span class="fa fa-close"></span></a>  
                </div>
                 
                <div class="clearfix"></div> 
                </div>
            <?php
            }
            ?>
            </div>
            
            <div class="col-md-12 nopadd">
                <br />
                <a href="javascript:void(0);" class="btn btn-success btn-small addmorebtn">Add more</a>  
            </div>
            <div class="clearfix"></div> 
            <br />
            <div class="radios">
                <strong>These items are:</strong>
                <div class="infolist">
                    <input type="radio" class="is_required" value="0" name="r2_131951805" checked="checked"> Optional&nbsp; &nbsp; OR&nbsp; &nbsp; <input type="radio" value="1" class="is_required" name="r2_131951805"> Required
                </div>
                <br />
                <strong>Customer can select:</strong>
                <div class="infolist">
                    <input type="radio" class="is_multiple" value="1" name="r1_131951805" checked="checked"> Single&nbsp; &nbsp; OR&nbsp; &nbsp; <input type="radio" value="0" class="is_multiple" name="r1_131951805"> Multiple
                </div>    
                <div style="display: none;" class="infolist exact">
                <br />
                    <div>
                        <div style="padding-left:0;" class="col-xs-12 col-sm-4"><strong>Enter # of items</strong></div>
                        <div class="col-xs-12 col-sm-8">
                            <input type="radio" checked="checked" class="up_to up_to_selected" value="0" name="394273622"> Up to &nbsp; <input type="radio" class="up_to" value="1" name="394273622"> Exactly</div><div style="clear:both;">
                        </div>
                        <div class="clearfix"></div> 
                        
                    </div>
                    
                    
                    <input type="text" id="itemno131951805" class="itemno form-control">
                </div>
    
            </div>
            
            <div class="clearfix"></div> 
        </div>
        </div>
        <div class="clearfix"></div>   
    </div>
    <div class="col-md-5">
        <div class="col-md-12">
            
            <div class="newaction">
            <?php if(!isset($cmodel) || (isset($ccount) && $ccount==$k)){?>
            <a href="javascript:void(0)" class="btn btn-info add_additional" id="add_additional0;">Add Addons</a> <a href="javascript:void(0)" class="btn btn-info savebtn">Save</a> <?php if(isset($k) && $k!=1){?><a href="javascript:void(0)" class="btn btn-danger removelast" onclick="">Remove</a><?php }?>
            <?php }?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>    
    </div>
