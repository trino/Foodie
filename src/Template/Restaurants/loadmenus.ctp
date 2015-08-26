<?php   
    $cnt=0;
    $menu_count = count($menus);
    foreach($menus as $menu)
    {
        if($cnt== '0'){
        ?>
        <div class="margin-bottom-10">
        <?php }?>
            <div class="col-md-3">
                <div class="product-item">
                    <div class="pi-img-wrapper">
                        <img src="<?php echo $this->request->webroot; ?>/img/products/<?php echo $menu->image;?>"
                             class="img-responsive" alt="<?php echo $menu->menu_item;?>"/>
        
                        <div>
                            <a href="<?php echo $this->request->webroot; ?>/img/products/<?php echo $menu->image;?>"
                               class="btn btn-default fancybox-button">Zoom</a>
                            <a href="#product-pop-up_<?php echo $menu->ID;?>" class="btn btn-default fancybox-fast-view">View</a>
                        </div>
                    </div>
                    <h3><a href="#"><?php echo $menu->menu_item;?></a></h3>
        
                    <div class="pi-price">$<?php echo $menu->price;?></div>
                    <!--<a href="#" class="btn btn-default add2cart">Add to cart</a-->
        
                    <div class="sticker sticker-new"></div>
                </div>
            </div>
            
            <!-- BEGIN fast view of a product -->
            <?php 
             
            echo $this->element('popup',['menu'=>$menu,'manager'=>$manager]);?>
         <?php $cnt++;
         if($cnt%4 =='0'&& $menu_count>4 )
                {?>  
                </div>
        <?php
                    echo '<div class="margin-bottom-10">';
                   
                 }
                 elseif($cnt == $menu_count)
                 echo "</div>";
    
    }
   

 ?>
 <div style="display: none;" class="nxtpage">
  <?php echo $this->Paginator->next();?>
  </div>