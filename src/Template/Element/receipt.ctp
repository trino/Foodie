   <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count">3 items</a>
            <a href="javascript:void(0);" class="top-cart-info-value">$1260</a>
              <i class="fa fa-shopping-cart clickable" onclick="$('.itemsz').slideToggle('swing');"></i>
          </div>
        
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content " >
              <?php echo $this->element('_items');?>
         
              <div class="totals col-md-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <td><label class="radio-inline"><input type="radio" name="delevery_type" checked='checked' onclick="delivery('hide');">Pickup</label></td>
                        <td><label class="radio-inline"><input type="radio" name="delevery_type" onclick="delivery('show');">Delivery</label></td>
                    </tr>
                    <tr>
                        <td><strong>Subtotal&nbsp;</strong></td><td>&nbsp;$<div class="subtotal" style="display: inline-block;">1473</div>
                        <input type="hidden" name="subtotal" class="subtotal" value="1473"></td>
                    </tr>
                    <tr>
                        <td><strong>Tax&nbsp;</strong></td><td>&nbsp;$<div class="tax" style="display: inline-block;">191.49</div>&nbsp;(<div id="tax" style="display: inline-block;">13</div>%)
                        <input type="hidden" value="191.49" name="tax" class="tax"></td>
                    </tr>

                    <tr style="display: none;" id="df">
                        <td><strong>Delivery
                            Fee&nbsp;</strong></td><td>&nbsp;$3.50
                            <input type="hidden" value="3.50" class="df" name="delivery_fee" />
                            <input type="hidden" value="0" id="delivery_flag" name="order_type"  />
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong>&nbsp;</td><td>&nbsp;$<div style="display: inline-block;" class="grandtotal">1664.49</div>
                        <input type="hidden" name="g_total" class="grandtotal" value="1664.49"/>
                        <input type="hidden" name="res_id"  value="1"/>
                        </td>
                    </tr>
                </tbody></table>
            </div>
              <div class="text-right">
               
                <a href="javascript:void(0)" class="btn btn-default">Clear</a>
                <a href="javascript:void(0)" class="btn btn-primary" onclick="checkout();">Checkout</a>
              </div>
            </div>
          </div>
<script>
    function checkout()
    {
        var del = $('#delivery_flag').val();
        var datas = $('.top-cart-content input').serialize();
        $.ajax({
            type:'post',
            url:'<?php echo $this->request->webroot;?>restaurants/order_ajax',
            data: datas,
            success:function(id){
                if(del == '0')
                {
                    
                    $('.top-cart-content').load('<?php echo $this->request->webroot."common/profile.php?order_id=";?>'+id);
                }
                else
                {
        
                    $('.top-cart-content').load('<?php echo $this->request->webroot."common/profile.php?delivery&order_id=";?>'+id);
        
                }
            }
            
        })
        
        
    }
    function delivery(t)
    {
        var df =$('input.df').val();
        if(t=='show')
        {
            $('#df').show();
            
            var tax = $('.tax').text();
            var grandtotal = 0;
            var subtotal = $('input.subtotal').val();
            grandtotal = Number(grandtotal)+Number(df)+Number(subtotal)+Number(tax);
            $('.df').val(df);
            $('.grandtotal').text(grandtotal.toFixed(2));
            $('.grandtotal').val(grandtotal.toFixed(2));
            $('#delivery_flag').val('1');
        }
        else
        {
            var grandtotal = $('input.grandtotal').val();
            grandtotal = Number(grandtotal)-Number(df);
            $('.grandtotal').text(grandtotal.toFixed(2));
            $('.grandtotal').val(grandtotal.toFixed(2));
            $('#df').hide();
            $('#delivery_flag').val('0');
        }
            
    }
    
    $(function(){
        
        
        $(window).scroll(function(){
            $('.top-cart-block').css({'top':0});
            if($(window).scrollTop()== 0)
            $('.top-cart-block').css({'top':'110px'});
        });
        var wd = $(window).width();
        if(wd<='767')
        {
             $('.top-cart-info').show();
            $('.top-cart-content-wrapper').addClass('itemsz');
            $('.top-cart-content-wrapper').hide();
        }   
        else{
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
            }
        else{
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

        var subtotal = "";
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

        var del_fee = $('.df').val();
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
        }
        else {
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
        var del_fee = $('.df').val();
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
        
    })
    
</script>