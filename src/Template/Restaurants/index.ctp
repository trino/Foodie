<div class="col-md-8 col-sm-4">    
    <h2 class="col-md-12"><a href="#"><?= $restaurant->Name;?></a> Menus</h2>
    <?php 
    
    $menus = $manager->enum_all('Menus',array('res_id'=>$restaurant->ID,'parent'=>'0'));
    echo $this->element('menus',['menus'=>$menus,'manager'=>$manager]);?>
</div>
 <!-- BEGIN CART -->
        <div class="top-cart-block col-md-2 col-sm-4">
            <?php echo $this->element('receipt');?>           
        </div>
        <!--END CART -->