<link rel="stylesheet" href="<?php echo $this->request->webroot;?>css/popstyle.css"/>

<?php if ($this->request->params['controller'] == 'Restaurants') { ?>
    <div class="margin-bottom-10">
        <div class="col-md-3">
            <div class="product-item">
                <div class="pi-img-wrapper">
                    <img src="<?php echo $this->request->webroot; ?>/img/products/k1.jpg"
                         class="img-responsive" alt="Chow Fun">

                    <div>
                        <a href="<?php echo $this->request->webroot; ?>/img/products/k1.jpg"
                           class="btn btn-default fancybox-button">Zoom</a>
                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                </div>


                <div class="sticker sticker-new"></div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="product-item">
                <h3><a href="#">Chow Fun</a> <span class="right"><a href="#">[Chinese]</a></span></h3>
                <hr/>
                It is a long established fact that a reader will be distracted by the readable content of
                a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                normal distribution of letters, as opposed to using 'Content here, content here', making it
                look like readable English. Many desktop publishing packages and web page editors now use
                Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many
                web sites still in their infancy. Various versions have evolved over the years, sometimes
                by accident, sometimes on purpose (injected humour and the like).
                <hr/>
                <div class="pi-price">$29.00</div>
                <a href="#" class="btn btn-default add2cart">Add to cart</a>
            </div>
        </div>


    </div>
<?php }
    
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

<!-- BEGIN CART -->
<script>
    $(function () {
        $('.modal').on('shown.bs.modal', function () {
            $('input:text:visible:first', this).focus();
        });
        /*
        $('.buttons').click(function () {

            var tit = $(this).attr('title');
            var box = $(this).parent().parent().parent().parent().find('.inp');
            var id = $(this).attr('id').replace('buttons_', '');
            var mn = box.val();
            var max = box.attr('maxlength');
            var cnt = 0;
            var qty = Number($(this).parent().find('.span_' + id).text());
            var price = Number($('.span_' + id).attr('id').replace('sprice_', ""));
            var tit1 = $(this).parent().parent().find('#extra_' + id).attr('title');
            //var title = tit1.split("_");
            // title[1]= title[1].replace(' x('+qty+")","");
            var nxt = box.parent().parent().parent().parent().parent().parent().parent().find('.nxt_button');

            if (mn.length >= max) {

                alert('Cannot select more than ' + max);

            }
            else {
                $(this).parent().find('#extra_' + id).attr('checked', 'checked');
                var tis = $(this);
                mtit = mn + tit;
                box.val(mtit);
                var mnt = mtit.split('');
                mnt.forEach(function (t, i) {
                    if (t == tit)
                        cnt++;

                });

                var title = tit1.split("_");
                var qty = Number(tis.parent().find('.span_' + id).text());
                tnn = title[1].split(' x(');
                title[1] = tnn[0];

                tis.parent().children().find('.span_' + id).text(cnt);

                var price = Number($('.span_' + id).attr('id').replace('sprice_', ""));


                newtitle = title[1] + " x(" + cnt + ")";
                newprice = Number(price) * Number(cnt);


                newtitle = title[0] + "_" + newtitle + "_" + newprice + "_" + title[3];
                newtitle = newtitle.replace(" x(1)", "");
                //alert(newtitle);
                tis.parent().parent().find('.spanextra_' + id).attr('title', newtitle);


            }
            var total_td = box.parent().parent().parent().find('td').length;
            var td = Number(nxt.attr('title'));
            if (isNaN(td))
                td = 1;
            if (mn.length + 1 == max)
                if (td == total_td)
                    box.parent().parent().parent().parent().parent().parent().parent().find('.add_end').click();
                else
                    nxt.click();
            $(this).parent().parent().parent().parent().find('.inp').focus();


        });

        $('.inp').keyup(function (e) {

            var thi = $(this);
            var banner = thi.parent().parent().parent().find('zxcx');
            var nxt = thi.parent().parent().parent().parent().parent().parent().parent().find('.nxt_button');
            var total_td = thi.parent().parent().parent().find('td').length;
            var td = Number(nxt.attr('title'));
            if (isNaN(td))
                td = 1;

            if (e.keyCode == 13) {

                if (td == total_td)
                    thi.parent().parent().parent().parent().parent().parent().parent().find('.add_end').click();
                else
                    nxt.click();
            }
            var max = $(this).attr('maxlength');
            var l = $(this).val().length;
            var f = 0;
            var id = $(this).attr('id').replace('boxes_', '');

            var chr = $('.chars_' + id).val();

            var txt = $(this).val().toUpperCase();
            tx = txt.split("");
            ch = chr.split(",");
            nt = txt;

            tx.forEach(function (t, i) {

                if (inArray(t, ch)) {
                    f = 0;
                }
                else {

                    alert('invalid character ' + t);

                    nt = nt.replace(t, '');
                    $('#boxes_' + id).val(nt);
                    $('#boxes_' + id).focus();
                    f++;
                }
            });
            thi.parent().parent().find('.buttons').each(function () {
                var tis = $(this);

                var ids = $(this).attr('id').replace('buttons_', '');
                var tit = tis.parent().parent().find('#extra_' + ids).attr('title');
                $(this).parent().children().find('.span_' + ids).text('1');
                $(this).parent().find('#extra_' + ids).removeAttr('checked');
                var cnt = 0;

                tx.forEach(function (t, i) {
                    if (tis.attr('title') == t) {
                        tis.parent().find('#extra_' + ids).attr('checked', 'checked');
                        var title = tit.split("_");
                        var qty = Number(tis.parent().find('.span_' + ids).text());
                        tnn = title[1].split(' x(');
                        title[1] = tnn[0];
                        cnt++;
                        tis.parent().children().find('.span_' + ids).text(cnt);

                        var price = Number($('.span_' + ids).attr('id').replace('sprice_', ""));


                        newtitle = title[1] + " x(" + cnt + ")";
                        newprice = Number(price) * Number(cnt);


                        newtitle = title[0] + "_" + newtitle + "_" + newprice + "_" + title[3];
                        newtitle = newtitle.replace(" x(1)", "");
                        //alert(newtitle);
                        tis.parent().parent().find('.spanextra_' + ids).attr('title', newtitle)

                    }
                });


            });
            if (l == max && f == 0)
                if (td == total_td)
                    thi.parent().parent().parent().parent().parent().parent().parent().find('.add_end').click();
                else
                    nxt.click();

        });
        $('.prv_button').hide();
        $('.resetslider').live('click', function () {
            $(this).parent().parent().find('.nxt_button').show();
            $(this).parent().parent().find('.nxt_button').attr('title', '1');
            $(this).parent().parent().find('.prv_button').hide();
            var banner = $(this).parent().parent().parent().find('.bannerz');
            banner.animate({scrollLeft: 0}, 1);
        })
        $('.nxt_button').live('click', function () {

            $(this).attr('disabled', 'disabled');
            var td = Number($(this).attr('title'));
            td++;
            var id = '';
            //var l = $(this).parent().find('.banner'+id+' td').width();
            var banner = $(this).parent().parent().parent().find('.bannerz');
            var l = banner.width();
            var main_width = banner.children('table').width();

            var leftPos = banner.scrollLeft();
            banner.animate({scrollLeft: leftPos + l}, 800, function () {
                $('.nxt_button').removeAttr('disabled');

            });

            var total_td = banner.find('td').length;
            var id = banner.find('td:nth-child(' + td + ')').attr('id').replace('td_', '');
            $('#boxes_' + id).focus();
            $(this).attr('title', td)
            $(this).parent().parent().find('.prv_button').show();
            if (td == total_td) {

                $(this).parent().parent().find('.add_end').show();
                $(this).hide();
            }

        });

        $('.prv_button').click(function () {

            $(this).attr('disabled', 'disabled');
            var thi = $(this);
            var td = Number($(this).parent().find('.nxt_button').attr('title'));
            if (td != 1)
                td = td - 1;
            var id = ''
            var banner = $(this).parent().parent().parent().find('.bannerz');
            var l = banner.width();
            var leftPos = banner.scrollLeft();
            var main_width = banner.children('table').width();
            banner.animate({scrollLeft: leftPos - l}, 800, function () {
                $('.prv_button').removeAttr('disabled');

            });
            var id = banner.find('td:nth-child(' + td + ')').attr('id').replace('td_', '');

            $('#boxes_' + id).focus();
            $(this).parent().find('.nxt_button').attr('title', td);
            if (td == '1')
                $(this).hide();
            $(this).parent().parent().find('.nxt_button').show();

        });
   */
    $('.clearall , .close').click(function () {

        var menu = $(this).attr('id');
        menu = menu.replace('clear_', '');
        //alert(menu);
        $('.subitems_' + menu).find('input:checkbox, input:radio').each(function () {
            if (!$(this).hasClass('chk'))
                $(this).removeAttr("checked");
            $('.allspan').html('&nbsp;&nbsp;1&nbsp;&nbsp;');

        });
        $('.inp').val("");
        $('.fancybox-close').click();
    });
    $('.resetslider').live('click', function () {
        var menu = $(this).attr('id');
        menu = menu.replace('clear_', '');
        //alert(menu);
        $('.subitems_' + menu).find('input:checkbox, input:radio').each(function () {
            if (!$(this).hasClass('chk'))
                $(this).removeAttr("checked");
            $('.allspan').html('&nbsp;&nbsp;1&nbsp;&nbsp;');

        });
        $('.inp').val("");
        $(this).parent().parent().find('.nxt_button').show();
        $(this).parent().parent().find('.nxt_button').attr('title', '1');
        $(this).parent().parent().find('.prv_button').hide();
        var banner = $(this).parent().parent().parent().find('.bannerz');
        banner.animate({scrollLeft: 0}, 1000);
    });
    //add items to receipt
    var counter_item = 0;
    $('.add_menu_profile').live('click', function () {

        var menu_id = $(this).attr('id').replace('profilemenu', '');
        var ids = "";
        var app_title = "";
        var price = "";
        var extratitle = "";
        var dbtitle = "";
        var err = 0;
        var catarray = [];
        var td_index = 0;
        var td_temp = 9999;

        $('.subitems_' + menu_id).find('input:checkbox, input:radio').each(function (index) {
            if ($(this).is(':checked') && $(this).attr('title') != "") {

                var tit = $(this).attr('title');

                var title = tit.split("_");
                if (index != 0) {

                    extratitle = extratitle + "," + title[1];
                }
                var su = "";

                if ($(this).val() != "") {

                    var cnn = 0;
                    var catid = $(this).attr('id');
                    catarray.push(catid);

                    var is_required = $('#required_' + catid).val();
                    var extra_no = $('#extra_no_' + catid).val();
                    if (extra_no == 0)
                        extra_no = 1;
                    var multiples = $('#multiple_' + catid).val();
                    var upto = $('#upto_' + catid).val();

                    var ary_qty = "";
                    var ary_price = "";
                    $('.extra-' + catid).each(function () {
                        if ($(this).is(":checked")) {
                            var mid = $(this).attr('id').replace('extra_', '');
                            //alert(mid);
                            var qty = Number($(this).parent().find('.span_' + mid).text().trim());

                            if (qty != "") {
                                cnn += Number(qty);
                                //ary_qty = ary_qty+"_"+qty;
                                //qprice = Number()*Number(qty);
                                //ary_price = ary_price+"_"+qprice;
                            }
                            else
                                cnn++;
                        }
                    });


                    if (is_required == '1') {
                        if (upto == 0) {
                            if (cnn == 0) {
                                err++;
                                td_index = $('#td_' + catid).index();
                                //alert(td_index);
                                if (td_temp >= td_index)
                                    td_temp = td_index;
                                else
                                    td_temp = td_temp;
                                $('.error_' + catid).html("Options are Mandatory");
                            }
                            else if (multiples == 0 && cnn > extra_no) {

                                err++;
                                td_index = $('#td_' + catid).index();
                                //alert(td_index);
                                if (td_temp >= td_index)
                                    td_temp = td_index;
                                else
                                    td_temp = td_temp;
                                $('.error_' + catid).html("Select up to " + extra_no + " Options");
                            }
                            else {
                                $('.error_' + catid).html("");
                            }
                        }
                        else {
                            if (cnn == 0) {
                                err++;
                                td_index = $('#td_' + catid).index();
                                //alert(td_index);
                                if (td_temp >= td_index)
                                    td_temp = td_index;
                                else
                                    td_temp = td_temp;
                                $('.error_' + catid).html("Options are Mandatory");
                            }
                            else if (multiples == 0 && cnn != extra_no) {

                                err++;
                                td_index = $('#td_' + catid).index();
                                //alert(td_index);
                                if (td_temp >= td_index)
                                    td_temp = td_index;
                                else
                                    td_temp = td_temp;
                                $('.error_' + catid).html("Select " + extra_no + " Options");
                            }
                            else {
                                $('.error_' + catid).html("");
                            }
                        }
                    }
                    else {
                        if (upto == 0) {
                            if (multiples == 0 && cnn > 0 && cnn > extra_no) {
                                err++;
                                td_index = $('#td_' + catid).index();
                                //alert(td_index);
                                if (td_temp >= td_index)
                                    td_temp = td_index;
                                else
                                    td_temp = td_temp;
                                $('.error_' + catid).html("Select up to " + extra_no + " Options");
                            }
                            else {
                                $('.error_' + catid).html("");
                            }
                        }
                        else {
                            if (multiples == 0 && cnn > 0 && cnn != extra_no) {
                                err++;
                                td_index = $('#td_' + catid).index();

                                //alert(td_index);
                                if (td_temp >= td_index)
                                    td_temp = td_index;
                                else
                                    td_temp = td_temp;
                                $('.error_' + catid).html("Select " + extra_no + " Options");
                            }
                            else {
                                $('.error_' + catid).html("");
                            }
                        }

                    }
                    if (cnn > 0) {
                        su = $(this).val();
                        extratitle = extratitle + " " + su + ":";
                        app_title = app_title + " " + su + ":";
                    }
                }
                var x = index;
                if (title[0] != "")
                    ids = ids + "_" + title[0];
                //if(app_title!="")
                app_title = app_title + "," + title[1];

                //else
                //app_title = title[1];
                price = Number(price) + Number(title[2]);

            }
        });
        ids = ids.replace("__", "_");

        //app_title =app_title.replace(",,"," ");
        app_title = app_title.split(",,").join("");
        app_title = app_title.substring(1, app_title.length);
        var last = app_title.substring(app_title.length, app_title.length - 1);
        if (last == ",")
            app_title = app_title.substring(0, app_title.length - 1);
        var last = app_title.substring(app_title.length, app_title.length - 1);
        if (last == "-")
            app_title = app_title.substring(0, app_title.length - 1);
        app_title = app_title.split(",(").join("(");
        app_title = app_title.split("-").join(" -");
        app_title = app_title.split("-,").join("-");
        app_title = app_title.split(",").join(", ");
        app_title = app_title.split(":").join(": ");

        app_title = app_title.split("x,").join("x");

        extratitle = extratitle.split(":,").join(":");
        extratitle = extratitle.substring(1, extratitle.length);
        var last1 = extratitle.substring(extratitle.length, extratitle.length - 1);
        if (last1 == ",")
            extratitle = extratitle.substring(0, extratitle.length - 1);
        var last1 = extratitle.substring(extratitle.length, extratitle.length - 1);
        if (last1 == "-")
            extratitle = extratitle.substring(0, extratitle.length - 1);

        dbtitle = extratitle.split(",").join("%");
        dbtitle = dbtitle.split("%%").join("");
        //alert(dbtitle);
        if (err > 0) {
            var banner = $(this).parent().parent().parent().find('.bannerz');
            var l = banner.width();
            var total_td = banner.find('td').length;
            $(".bannerz").animate({scrollLeft: (l * td_temp)}, 800);
            td_temp = td_temp + 1;

            $(this).parent().parent().find('.nxt_button').attr('title', td_temp);
            $(this).parent().parent().find('.nxt_button').show();
            var id = banner.find('td:nth-child(' + td_temp + ')').attr('id').replace('td_', '');
            //alert(id);
            $('#boxes_' + id).focus();
            if (td_temp == 1)
                $(this).parent().parent().find('.prv_button').hide();
            else
                $(this).parent().parent().find('.prv_button').show();
            return false;
        } else {
            var banner = $(this).parent().parent().parent().find('.bannerz');
            $(this).parent().parent().find('.nxt_button').attr('title', '1');
            $(this).parent().parent().find('.prv_button').hide();
            banner.animate({scrollLeft: 0}, 10);
            $(this).parent().parent().find('.nxt_button').show();
            catarray.forEach(function (catid) {
                $('#error_' + catid).html("");
            })
        }

        //alert(ids);
        /*$(this).text('Added');
         $(this).attr('style','background:#DDD');
         $(this).attr('disabled','disabled');
         $(this).removeClass('add_menu_profile');*/


        //alert("price:"+price+"title:"+app_title);
        var pre_cnt = $('#list' + ids).find('.count').text();
        pre_cnt = Number(pre_cnt.replace('x ',''));
        var n= $('.number'+menu_id).text();
        if (pre_cnt != "")
            pre_cnt = Number(pre_cnt) + Number(n);
        else
            pre_cnt = Number(n);
        var img = $('.popimage_' + menu_id).attr('src');
        //price = price*pre_cnt;
        $('#list' + ids).remove();
        $('.orders').prepend('<li id="list' + ids + '" class="infolist" ></li>');
        $('#list' + ids).html('<span class="receipt_image"><img src="' + img + '" width="37" height="34">' +
            '<a style="padding: 6px;height: 18px;line-height: 6px" id="dec' + ids + '" class="decrease small btn btn-danger" href="javascript:void(0);">' +
            '<strong>-</strong></a><span class="count">x ' + pre_cnt + '</span><input type="hidden" class="count" name="qtys[]" value="' + pre_cnt + '" />' + ' &nbsp;<a id="inc' + ids + '" class="increase btn btn-primary small " href="javascript:void(0);" style="padding: 6px;height: 18px;line-height: 6px">' +
            '<strong>+</strong></a></span>' +
                //'<span class="cart-content-count">x '+pre_cnt+'</span>'+
            '<span class="amount" style="display:none;">' + price.toFixed(2) + '</span>' +
            '<strong>' + app_title + '</strong>' +
            '<em class="total">$' + (pre_cnt*price).toFixed(2) + '</em>' +
            '<input type="hidden" class="menu_ids" name="menu_ids[]" value="' + menu_id + '" />' +
            '<input type="hidden" name="extras[]" value="' + dbtitle + '"/><input type="hidden" name="listid[]" value="' + ids + '" />' +
            '<input type="hidden" class="prs" name="prs[]" value="' + (pre_cnt*price).toFixed(2) + '" />' +
            '<a href="javascript:void(0);" class="del-goods" onclick="$(this).parent().remove()">&nbsp;</a>');
        /*$('#list' + ids).html('<div><span class="namemenu">' + app_title + '</span></div>' +
         '<div style="float:left;width:50%;"><a style="padding: 6px;height: 18px;line-height: 6px" id="dec' + ids + '" class="decrease small btn btn-danger" href="javascript:void(0);">' +
         '<strong>-</strong></a><span class="count">' + pre_cnt + '</span><input type="hidden" class="count" name="qtys[]" value="' + pre_cnt + '" />' + ' &nbsp;<a id="inc' + ids + '" class="increase btn btn-primary small " href="javascript:void(0);" style="padding: 6px;height: 18px;line-height: 6px">' +
         '<strong>+</strong></a>' +
         '<input type="hidden" class="menu_ids" name="menu_ids[]" value="' + menu_id + '" />' +
         '<input type="hidden" name="extras[]" value="' + dbtitle + '"/><input type="hidden" name="listid[]" value="' + ids + '" />' +
         '<input type="hidden" class="prs" name="prs[]" value="' + price.toFixed(2) + '" /> X $' +
         '<span class="amount">' + price.toFixed(2) + '</span></div>' +
         '<div style="float:right;width:40%;">' +
         '<strong>$<span class="total">' + (pre_cnt * price).toFixed(2) + '</span>' +
         '</strong></div><div style="padding-top:6px;clear:both;border-bottom:1px solid #dadada;"></div></div>');
         */
        price = parseFloat(price);
        var subtotal = "";
        var ccc = 0;
        $('.total').each(function () {
            ccc++;
            var tt = $(this).text().replace('$','');
            subtotal = Number(subtotal) + Number(tt);
        })
        //alert(subtotal);
        //if (ccc > 3)
        // $('.orders').attr('style', 'display:block;height:260px;overflow-x:hidden;overflow-y:scroll;');
        subtotal = parseFloat(subtotal);
        //subtotal = Number(subtotal)+Number(price);
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
        //alert(del_fee);

        var gtotal = Number(subtotal) + Number(tax) + Number(del_fee);
        gtotal = gtotal.toFixed(2);

        $('div.grandtotal').text(gtotal);
        $('input.grandtotal').val(gtotal);
        $('.subitems_' + menu_id).find('input:checkbox, input:radio').each(function () {
            if (!$(this).hasClass('chk'))
                $(this).removeAttr("checked");
        });
        $('.number'+menu_id).text('1');
        //$('#clear_' + menu_id).click();
        $('.fancybox-close').click();
        //$('.subitems_'+menu_id).hide();
    });
 });

    function inArray(needle, haystack) {
        var length = haystack.length;
        for (var i = 0; i < length; i++) {
            if (haystack[i] == needle) return true;
        }
        return false;
    }

function changeqty(id,opr)
{
        var num = Number($('.number'+id).text());
        if(num=='1')
        {
            if(opr=='plus')
            num++;
            
        }
        else
        {
            (opr == 'plus')?num++:--num;   
        }
        $('.number'+id).text(num);
}
</script>

         
            
