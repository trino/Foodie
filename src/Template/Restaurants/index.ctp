<div class="col-md-8 col-sm-4">    
    <h2 class="col-md-12"><a href="#"><?php echo ucfirst(str_replace('-',' ',$restaurant));?></a> Menus</h2>
    <?php echo $this->element('menus');?>
</div>
 <!-- BEGIN CART -->
        <div class="top-cart-block col-md-2 col-sm-4">
            <?php echo $this->element('receipt');?>           
        </div>
        <!--END CART -->