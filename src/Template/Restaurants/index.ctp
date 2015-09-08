<div class="col-md-2 col-sm-4 col-xs-12">

    <div class="well add-sidebar">
        <img class="img-responsive margin-bottom-10" alt="" src="/Foodie//img/works/img4.jpg">

        <address>
            <strong>Loop, Inc.</strong><br>
            795 Park Ave, Suite 120<br>
            San Francisco, CA 94107<br>
            <abbr title="Phone">P:</abbr> (234) 145-1810 
        </address>
        <address>
            <strong>Full Name</strong><br>
            <a href="mailto:#">
                first.last@email.com
            </a>
        </address>
    </div>
</div>

<div class="col-md-7 col-sm-4 col-xs-12 menu_div">
    <?php
        echo $this->element('menus',['menus'=>$menus,'manager'=>$Manager]);?>
</div>
<!-- BEGIN CART -->
<div class="top-cart-block col-md-3 col-sm-4" id="printableArea">
    
    <?php echo $this->element('receipt');?>
    
   
</div>

<!--END CART -->