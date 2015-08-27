   <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count" id="cart-items">3 items</a>
            <a href="javascript:void(0);" class="top-cart-info-value" id="cart-total">$1260</a>
            <a href="#cartsz" class="fancybox-fast-view" ><i class="fa fa-shopping-cart" onclick="#cartsz" ></i></a>
   </div>
   
  <div class="row  resturant-logo-desc">
   <div class="col-md-12 col-sm-12 col-xs-12">
   <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12 no-padding">
        <img src="<?php echo $this->request->webroot."img/restaurants/".$restaurant->Logo;?>" class='img-responsive' />
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 resturant-desc">
        <span><?php echo $restaurant->Address.",". $restaurant->City;?></span>
        <span><?php echo $restaurant->Phone;?></span>
      </div>
   </div>  
   </div> 
   </div>  
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content " id="cartsz" >
                <div class="receipt_main">
                  <?php echo $this->element('_items');?>
                    <div class="totals col-md-12">
                    <table class="table">
                        <tbody>
                        <?php if(!isset($order)){?>
                        <tr>
                            <td><label class="radio-inline"><input type="radio" name="delevery_type" checked='checked' onclick="delivery('hide');">Pickup</label></td>
                            <td><label class="radio-inline"><input type="radio" name="delevery_type" onclick="delivery('show');">Delivery</label></td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td><strong>Subtotal&nbsp;</strong></td><td>&nbsp;$<div class="subtotal" style="display: inline-block;"><?php echo (isset($order))?$order->subtotal:'0';?></div>
                            <input type="hidden" name="subtotal" class="subtotal" value="<?php echo (isset($order))?$order->subtotal:'0';?>"></td>
                        </tr>
                        <tr>
                            <td><strong>Tax&nbsp;</strong></td><td>&nbsp;$<div class="tax" style="display: inline-block;"><?php echo (isset($order))?$order->tax:'0';?></div>&nbsp;(<div id="tax" style="display: inline-block;">13</div>%)
                            <input type="hidden" value="<?php echo (isset($order))?$order->tax:'0';?>" name="tax" class="tax"/></td>
                        </tr>
    
                        <tr <?php echo (isset($order)&& $order->order_type == '1')?'style="display: block;"':'style="display: none;"';?> id="df">
                            <td><strong>Delivery Fee&nbsp;</strong></td><td>&nbsp;$<?php echo (isset($order))?$order->delivery_fee:$restaurant->DeliveryFee;?>
                                <input type="hidden" value="<?php echo (isset($order))?$order->delivery_fee:$restaurant->DeliveryFee;?>" class="df" name="delivery_fee" />
                                <input type="hidden" value="0" id="delivery_flag" name="order_type"  />
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong>&nbsp;</td><td>&nbsp;$<div style="display: inline-block;" class="grandtotal"><?php echo (isset($order))?$order->g_total:'0';?></div>
                            <input type="hidden" name="g_total" class="grandtotal" value="<?php echo (isset($order))?$order->g_total:'0';?>"/>
                            <input type="hidden" name="res_id"  value="<?php if(isset($restaurant))echo $restaurant->ID;?>"/>
                            </td>
                        </tr>
                    </tbody></table>
                </div>
            <?php if(!isset($order)){?>
              <div class="text-right">
           
                <a href="javascript:void(0)" class="btn btn-default">Clear</a>
                <a href="javascript:void(0)" class="btn btn-primary" onclick="checkout();">Checkout</a>
              </div>
              <?php }?>
              </div>
               <div class="profiles" style="display: none;">
                    <?php include('common/profile.php');?>
               </div>
            </div>
            
          </div>
<script>
    function checkout() {
        var del = $('#delivery_flag').val();
        $('.receipt_main').hide();
        $('.profiles').show();
        /*var datas = $('.top-cart-content input').serialize();
        $.ajax({
            type:'post',
            url:'<?php echo $this->request->webroot;?>restaurants/order_ajax',
            data: datas,
            success:function(id){
                if(del == '0') {
                    $('.top-cart-content').load('<?php echo $this->request->webroot."common/profile.php?order_id=";?>'+id);
                } else {
                    $('.top-cart-content').load('<?php echo $this->request->webroot."common/profile.php?delivery&order_id=";?>'+id);
                }
            }
        })*/
    }

    function delivery(t) {
        var df =$('input.df').val();
        if(t=='show') 
        {
            $('#df').show();
            $('.profile_delevery_type').text('Delivery Detail');
            $('.profile_delivery_detail').show();
            $('.profile_delivery_detail input').each(function(){
                $(this).attr('required','required');    
            });
            var tax = $('.tax').text();
            var grandtotal = 0;
            var subtotal = $('input.subtotal').val();
            grandtotal = Number(grandtotal)+Number(df)+Number(subtotal)+Number(tax);
            $('.df').val(df);
            $('.grandtotal').text(grandtotal.toFixed(2));
            $('.grandtotal').val(grandtotal.toFixed(2));
            $('#delivery_flag').val('1');
            $('#cart-total').text('$'+grandtotal.toFixed(2));
        } 
        else 
        {
            $('.profile_delevery_type').text('Pickup Detail');
             $('.profile_delivery_detail').hide();
            var grandtotal = $('input.grandtotal').val();
            grandtotal = Number(grandtotal)-Number(df);
            $('.grandtotal').text(grandtotal.toFixed(2));
            $('.grandtotal').val(grandtotal.toFixed(2));
            $('#df').hide();
            $('#delivery_flag').val('0');
            $('#cart-total').text('$'+grandtotal.toFixed(2));
        }
    }
    
    $(function(){
        var wd = $(window).width();
        var ht = $(window).height();
        
        var headr_ht = $('.container-fluid').height();
       var htt = Number(ht)-Number(headr_ht);
            $('.top-cart-block').css({'height':htt}); 
        //$(window).scroll(function(){
            // if(wd>='767')
            //{
            //$('.top-cart-block').css({'top':0});
            //if($(window).scrollTop()== 0)
            //$('.top-cart-block').css({'top':'110px'});
            //}
        //});
        
        if(wd<='767') {
            $('.top-cart-info').show();
            $('.top-cart-content-wrapper').addClass('itemsz');
            $('.top-cart-content-wrapper').hide();
        } else{
             $('.top-cart-info').hide();
            $('.top-cart-content-wrapper').show();
            $('.top-cart-content-wrapper').removeClass('itemsz');
        }

        $( window ).resize(function() {
            var wd = $(window).width();
            if(wd<='767'){
                $('.top-cart-info').show();
                $('.top-cart-content-wrapper').addClass('itemsz');
                $('.top-cart-content-wrapper').hide();
            } else{
                $('.top-cart-info').hide();
                $('.top-cart-content-wrapper').show();
                $('.top-cart-content-wrapper').removeClass('itemsz');

            }
        });

        $('.decrease').live('click', function () {
        //alert('test');
        var menuid = $(this).attr('id');
        var numid = menuid.replace('dec', '');

        var quant = $('#list' + numid + ' span.count').text();
        quant = quant.replace('x ','');
        
        var amount = $('#list' + numid + ' .amount').text();
        amount = parseFloat(amount);

        var subtotal =0;
        $('.total').each(function () {
            var sub = $(this).text().replace('$','');
            subtotal = Number(subtotal) + Number(sub);
        })
        subtotal = parseFloat(subtotal);
        subtotal = Number(subtotal) - Number(amount);
        subtotal = subtotal.toFixed(2);
        $('div.subtotal').text(subtotal);
        $('input.subtotal').val(subtotal);

        var tax = $('#tax').text();
        tax = parseFloat(tax);
        tax = (tax / 100) * subtotal;
        tax = tax.toFixed(2);
        $('div.tax').text(tax);
        $('input.tax').val(tax);

        var del_fee = 0;
        if($('#delivery_flag').val()=='1') {
            del_fee = $('.df').val();
        }

        del_fee = parseFloat(del_fee);

        var gtotal = Number(subtotal) + Number(tax) + Number(del_fee);
        gtotal = gtotal.toFixed(2);
        $('div.grandtotal').text(gtotal);
        $('input.grandtotal').val(gtotal);

        var total = $('#list' + numid + ' .total').text();
        total = total.replace("$","");
        total = parseFloat(total);
        total = Number(total) - Number(amount);
        total = total.toFixed(2);
        $('#list' + numid + ' .total').text('$'+total);

        quant = parseFloat(quant);
        //alert(quant);
        if (quant == 1) {
            $('#list' + numid).remove();
            $('#profilemenu' + numid).text('Add');
            $('#profilemenu' + numid).attr('style', '');
            $('#profilemenu' + numid).addClass('add_menu_profile');
            $('#profilemenu' + numid).removeAttr('disabled');
            var ccc = 0;
            $('.total').each(function () {
                ccc++;
            });
            if (ccc < 4)
                $('.orders').removeAttr('style');
            $('.orders').show();
        } else {
            quant--;
            $('#list' + numid + ' span.count').text('x '+quant);
            $('#list' + numid + ' input.count').val(quant);
            //$('#list'+numid+' .count').val(quant-1);
        }
    });

    $('.increase').live('click', function () {
        var menuid = $(this).attr('id');
        var numid = menuid.replace('inc', '');
        var quant = '';
        quant = $('#list' + numid + ' span.count').text();
        quant = quant.replace('x ','');
        quant = parseFloat(quant);
        var amount = $('#list' + numid + ' .amount').text();
        amount = parseFloat(amount);
        var subtotal = $('.subtotal').text();
        subtotal = parseFloat(subtotal);
        subtotal = Number(subtotal) + Number(amount);
        subtotal = subtotal.toFixed(2);
        $('div.subtotal').text(subtotal);
        $('input.subtotal').val(subtotal);
        var tax = $('#tax').text();
        tax = parseFloat(tax);
        tax = (tax / 100) * subtotal;
        tax = tax.toFixed(2);
        $('div.tax').text(tax);
        $('input.tax').val(tax);
        if($('#delivery_flag').val()=='1')
            var del_fee = $('.df').val();
        else
            var del_fee = 0;
        del_fee = parseFloat(del_fee);
        var gtotal = Number(subtotal) + Number(tax) + Number(del_fee);
        gtotal = gtotal.toFixed(2);
        $('div.grandtotal').text(gtotal);
        $('input.grandtotal').val(gtotal);
        var total = $('#list' + numid + ' .total').text();
        total = total.replace("$","");
        total = parseFloat(total);
        total = Number(total) + Number(amount);
        total = total.toFixed(2);
        $('#list' + numid + ' .total').text('$'+total);
        quant++;
        $('#list' + numid + ' span.count').text('x '+quant);
        $('#list' + numid + ' input.count').val(quant);
    });
    
    $('.del-goods').live('click',function(){
        $(this).parent().remove();
        var subtotal = 0;
        $('.total').each(function () {
            var sub = $(this).text().replace('$','');
            subtotal = Number(subtotal) + Number(sub);
        })
        subtotal = parseFloat(subtotal);
        //subtotal = Number(subtotal) - Number(amount);
        subtotal = subtotal.toFixed(2);
        $('div.subtotal').text(subtotal);
        $('input.subtotal').val(subtotal);

        var tax = $('#tax').text();
        tax = parseFloat(tax);
        tax = (tax / 100) * subtotal;
        tax = tax.toFixed(2);
        $('div.tax').text(tax);
        $('input.tax').val(tax);
        var del_fee = 0;
        if($('#delivery_flag').val()=='1') {
            del_fee = $('.df').val();
        }
        del_fee = parseFloat(del_fee);
        var gtotal = Number(subtotal) + Number(tax) + Number(del_fee);
        gtotal = gtotal.toFixed(2);
        $('div.grandtotal').text(gtotal);
        $('input.grandtotal').val(gtotal);
    });
        
    })


    
</script>