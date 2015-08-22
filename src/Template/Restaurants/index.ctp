<div class="col-md-2 col-sm-4">

    <div class="well">
        <img class="img-responsive" alt="" src="/Foodie//img/works/img4.jpg">

        <address>
            <strong>Loop, Inc.</strong><br>
            795 Park Ave, Suite 120<br>
            San Francisco, CA 94107<br>
            <abbr title="Phone">P:</abbr> (234) 145-1810 </address>
        <address>
            <strong>Full Name</strong><br>
            <a href="mailto:#">
                first.last@email.com
            </a>
        </address>
    </div>
</div>

<div class="col-md-8 col-sm-4 menu_div">
    <?php

        $menus = $manager->enum_all('Menus',array('res_id'=>$restaurant->ID,'parent'=>'0'));
        echo $this->element('menus',['menus'=>$menus,'manager'=>$manager]);?>
</div>
<!-- BEGIN CART -->
<div class="top-cart-block col-md-2 col-sm-4">
    <?php echo $this->element('receipt');?>
</div>
<!--END CART -->