
<div id="product-pop-up_<?php echo $menu->ID;?>" style="display: none; width: 500px;">

    <div class="product-page product-pop-up">
        <!--div class="modal-header">
            <button id="clear_<?php echo $menu->ID;?>" aria-hidden="true" data-dismiss="modal" class="close close<?php echo $menu->ID;?>" type="button">x
            </button>

        </div-->
        <div style=" font-family:mainfont;" class="modal-body">
            <div style="text-align: left;padding:0px;" class="col-sm-12 col-xs-12 title">
                <h2 style="color:white;"><?php echo $menu->menu_item;?>: $ <?php echo $menu->price;?></h2>

            </div>
            <div class="col-sm-12 col-xs-12">
                <img class="popimage_<?php echo $menu->ID;?>" width="150"
                     src="<?php echo $this->request->webroot; ?>/img/products/<?php echo $menu->image;?>"/>
            </div>
            <div class="clearfix"></div>

            <div class="product-titles">
                <h2><?php echo $menu->description;?></h2>
            </div>

            <div class="subitems_<?php echo $menu->ID;?> optionals">
                <!--<span class="topright"><a href="javascript:void(0)" onclick="$('#Modal<?php echo $menu->ID;?>').toggle();"><strong class="btn btn-danger">x</strong></a></span>-->

                <div class="clearfix space10"></div>
                <div style="display:none;"><input type="checkbox" style="display: none;" checked="checked" title="<?php echo $menu->ID;?>_<?php echo $menu->menu_item;?>-_<?php echo $menu->price;?>_" value="" class="chk">
                </div>
                <div style="overflow: hidden;" class="banner bannerz">
                    <table width="100%">
                        <tbody>
                        <?php
                            $submenus = $manager->enum_all('Menus',['parent'=>$menu->ID]);
                            foreach($submenus as $sub){
                        ?>
                        <tr class="zxcx">
                            <td width="100%" id="td_<?php echo $sub->ID;?>" style="vertical-align: top;">
                                <input type="hidden" value="<?php echo $sub->exact_upto_qty;?>" id="extra_no_<?php echo $sub->ID;?>">
                                <input type="hidden" value="<?php echo $sub->req_opt;?>" id="required_<?php echo $sub->ID;?>">
                                <input type="hidden" value="<?php echo $sub->sing_mul;?>" id="multiple_<?php echo $sub->ID;?>">
                                <input type="hidden" value="<?php echo $sub->exact_upto;?>" id="upto_<?php echo $sub->ID;?>">

                                <div style="" class="infolist col-xs-12">
                                    <div style="display: none;">
                                        <input type="checkbox" value="<?php echo $sub->menu_item;?>" title="___" id="<?php echo $sub->ID;?>"
                                               style="display: none;" checked="checked" class="chk">
                                    </div>
                                    <a href="javascript:void(0);"><strong><?php echo $sub->menu_item;?></strong></a>
                                    <span><em> </em></span>

                                  
                                    <span class="limit-options" style="float: right;">
                                    <?php
                                    if ($sub->exact_upto == 0)
                                        $upto = "up to ";
                                    else
                                        $upto = "exactly ";
                                    if ($sub->req_opt == '0') {
                                        if ($sub->exact_upto_qty > 0 && $sub->sing_mul == '0')
                                            echo "(Select " . $upto . $sub->exact_upto_qty . " Items) ";
                                        echo "(Optional)";
                                
                                    } elseif ($sub->req_opt == '1') {
                                        if ($sub->exact_upto_qty > 0 && $sub->sing_mul == '0')
                                            echo "Select " . $upto . $sub->exact_upto_qty . " Items ";
                                
                                        echo "(Mandatory)";
                                        }?>
                                    </span>

                                    <div class="clearfix"></div>
                                    <span class="error_<?php echo $sub->ID;?>" style="color: red; font-weight: bold;"></span>

                                    <div class="list clearfix">
                                    <?php
                                        $mini_menus = $manager->enum_all('Menus',['parent'=>$sub->ID]);
                                        foreach($mini_menus as $mm):
                                    ?>
                                        <div class="col-xs-6 col-md-6"  style="padding: 0px;border-radius: 17px 0 0 17px !important;"
                                             class="subin btn default btnxx">
                                            <div style="padding:0px;border-radius: 17px 0 0 17px !important;">
                                                <a style="text-decoration: none;display:inline-block; padding-right: 15px;"
                                                   title="A" id="buttons_<?php echo $mm->ID;?>" class="buttons "
                                                   href="javascript:void(0);">
                                                    <button style="border-radius: 17px!important;"
                                                            class="btn btn-primary">A
                                                    </button>
                                                    
                                                    <input type="<?php echo ($sub->sing_mul=='1')?'radio':'checkbox';?>" id="extra_<?php echo $mm->ID;?>" title="<?php echo $mm->ID;?>_<br/> <?php echo $mm->menu_item;?>_<?php echo $mm->price;?>_<?php echo $sub->menu_item;?>"
                                                           class="extra-<?php echo $sub->ID;?>" name="extra_<?php echo $sub->ID;?>" value="post"/>
                                                    &nbsp;&nbsp;<?php echo $mm->menu_item;?>
                                                    &nbsp;&nbsp;<?php if ($mm->price) echo "(+ $" . number_format(str_replace('$', '', $mm->price), 2) . ")"; ?>
                                                     <b style="display:none;">
                                                    </b></a><b style="display:none;"><a onclick=""
                                                                                        style="text-decoration: none; color: #000;"
                                                                                        id="remspan_<?php echo $mm->ID;?>"
                                                                                        class="remspan"
                                                                                        href="javascript:;"><b>
                                                            &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                    <span id="sprice_0" class="span_<?php echo $mm->ID;?> allspan">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                    <a style="text-decoration: none; color: #000;" onclick=""
                                                       id="addspan_<?php echo $mm->ID;?>" class="addspan" href="javascript:;"><b>
                                                            &nbsp;&nbsp;+&nbsp;&nbsp;</b></a>
                                                </b>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <?php endforeach;?>
                                        <!--div style="padding: 0px;border-radius: 17px 0 0 17px !important;"
                                             class="subin btn default btnxx">
                                            <div class="col-xs-12 col-md-6"  style="padding:0px;border-radius: 17px 0 0 17px !important;"
                                                >
                                                <a style="text-decoration: none;display:inline-block; padding-right: 15px;"
                                                   title="B" id="buttons_5051" class="buttons "
                                                   href="javascript:void(0);">
                                                    <button style="border-radius: 17px!important;"
                                                            class="btn btn-primary">B
                                                    </button>
                                                    <input type="radio" id="extra_5051"
                                                           title="5051_<br/> Milk Tea_0_Choose Type"
                                                           class="extra-<?php echo $sub->ID;?>" name="extra_<?php echo $sub->ID;?>" value=""
                                                          />
                                                    &nbsp;&nbsp;Milk Tea <b style="display:none;">
                                                    </b></a><b style="display:none;"><a onclick=""
                                                                                        style="text-decoration: none; color: #000;"
                                                                                        id="remspan_5051"
                                                                                        class="remspan"
                                                                                        href="javascript:;"><b>
                                                            &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                    <span id="sprice_0" class="span_5051 allspan">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                    <a style="text-decoration: none; color: #000;" onclick=""
                                                       id="addspan_5051" class="addspan" href="javascript:;"><b>
                                                            &nbsp;&nbsp;+&nbsp;&nbsp;</b></a>
                                                </b>

                                            </div>
                                            <div class="clearfix"></div>
                                        </div-->
                                        <input type="hidden" value="A,B," class="chars_<?php echo $sub->ID;?>">
                                    </div>
                                </div>
                            </td>
                            </tr>
                            <?php }?>
                            <!--tr class="zxcx">
                            <td width="100%" id="td_159" style="vertical-align: top;">
                                <input type="hidden" value="3" id="extra_no_159">
                                <input type="hidden" value="0" id="required_159">
                                <input type="hidden" value="1" id="multiple_159">
                                <input type="hidden" value="1" id="upto_159">

                                <div style="" class="infolist col-xs-12">
                                    <div style="display: none;">
                                        <input type="checkbox" value="<br/> Add Toppings" title="___" id="159"
                                               style="display: none;" checked="checked" class="chk">
                                    </div>
                                    <a href="javascript:void(0);"><strong>Add Toppings</strong></a>
                                    <span><em> </em></span>

                                    
                                                <span  class="limit-options" style="float: right;">
                                                Select up to 3 Items (Optional)</span>

                                    <div class="clearfix"></div>
                                    <span class="error_159" style="color: red; font-weight: bold;"></span>

                                    <div class="list clearfix">
                                        <div class="col-xs-12 col-md-6"  style="padding: 0px;border-radius: 17px 0 0 17px !important;"
                                             class="subin btn default btnxx">
                                            <div style="padding:0px; ">

                                                <a style="text-decoration: none; display:inline-block; padding-right: 15px;"
                                                   title="A" id="buttons_5066" class="buttons"
                                                   href="javascript:void(0);">
                                                    <button style="border-radius: 17px!important;"
                                                            class="btn btn-primary">A
                                                    </button>
                                                    <input type="checkbox" id="extra_5066"
                                                           title="5066_<br/> Lychee Jelly_0.48_Add Toppings"
                                                           class="extra-159 spanextra_5066" style=""
                                                           name="extra" value="">
                                                    &nbsp;&nbsp;Lychee Jelly (+ $0.48)
                                                    <b style="display:none;">
                                                    </b></a><b style="display:none;"><a onclick=""
                                                                                        style="text-decoration: none; color: #000;"
                                                                                        id="remspan_5066"
                                                                                        class="remspan"
                                                                                        href="javascript:;"><b>
                                                            &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                    <span id="sprice_0.48" class="span_5066 allspan">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                    <a style="text-decoration: none; color: #000;" onclick=""
                                                       id="addspan_5066" class="addspan" href="javascript:;"><b>
                                                            &nbsp;&nbsp;+&nbsp;&nbsp;</b></a>
                                                </b>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-xs-12 col-md-6"  style="padding: 0px;border-radius: 17px 0 0 17px !important;"
                                             class="subin btn default btnxx">
                                            <div style="padding:0px; ">

                                                <a style="text-decoration: none; display:inline-block; padding-right: 15px;"
                                                   title="B" id="buttons_5067" class="buttons"
                                                   href="javascript:void(0);">
                                                    <button style="border-radius: 17px!important;"
                                                            class="btn btn-primary">B
                                                    </button>
                                                    <input type="checkbox" id="extra_5067"
                                                           title="5067_<br/> Aloe Vera Jelly_0.48_Add Toppings"
                                                           class="extra-159 spanextra_5067" style=""
                                                           name="extra" value="">
                                                    &nbsp;&nbsp;Aloe Vera Jelly (+ $0.48)
                                                    <b style="display:none;">
                                                    </b></a><b style="display:none;"><a onclick=""
                                                                                        style="text-decoration: none; color: #000;"
                                                                                        id="remspan_5067"
                                                                                        class="remspan"
                                                                                        href="javascript:;"><b>
                                                            &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                    <span id="sprice_0.48" class="span_5067 allspan">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                    <a style="text-decoration: none; color: #000;" onclick=""
                                                       id="addspan_5067" class="addspan" href="javascript:;"><b>
                                                            &nbsp;&nbsp;+&nbsp;&nbsp;</b></a>
                                                </b>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="col-xs-12 col-md-6" style="padding: 0px;border-radius: 17px 0 0 17px !important;"
                                             class="subin btn default btnxx">
                                            <div style="padding:0px; " >

                                                <a style="text-decoration: none; display:inline-block; padding-right: 15px;"
                                                   title="C" id="buttons_5068" class="buttons"
                                                   href="javascript:void(0);">
                                                    <button style="border-radius: 17px!important;"
                                                            class="btn btn-primary">C
                                                    </button>
                                                    <input type="checkbox" id="extra_5068"
                                                           title="5068_<br/> Green Apple Jelly_0.48_Add Toppings"
                                                           class="extra-159 spanextra_5068" style=""
                                                           name="extra" value="">
                                                    &nbsp;&nbsp;Green Apple Jelly (+ $0.48)
                                                    <b style="display:none;">
                                                    </b></a><b style="display:none;"><a onclick=""
                                                                                        style="text-decoration: none; color: #000;"
                                                                                        id="remspan_5068"
                                                                                        class="remspan"
                                                                                        href="javascript:;"><b>
                                                            &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                    <span id="sprice_0.48" class="span_5068 allspan">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                    <a style="text-decoration: none; color: #000;" onclick=""
                                                       id="addspan_5068" class="addspan" href="javascript:;"><b>
                                                            &nbsp;&nbsp;+&nbsp;&nbsp;</b></a>
                                                </b>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class=" col-md-6 col-xs-12 " style="padding: 0px;border-radius: 17px 0 0 17px !important;"
                                             class="subin btn default btnxx">
                                            <div style="padding:0px; " >

                                                <a style="text-decoration: none; display:inline-block; padding-right: 15px;"
                                                   title="D" id="buttons_5069" class="buttons"
                                                   href="javascript:void(0);">
                                                    <button style="border-radius: 17px!important;"
                                                            class="btn btn-primary">D
                                                    </button>
                                                    <input type="checkbox" id="extra_5069"
                                                           title="5069_<br/> Strawberry Jelly_0.48_Add Toppings"
                                                           class="extra-159 spanextra_5069" style=""
                                                           name="extra" value="">
                                                    &nbsp;&nbsp;Strawberry Jelly (+ $0.48)
                                                    <b style="display:none;">
                                                    </b></a><b style="display:none;"><a onclick=""
                                                                                        style="text-decoration: none; color: #000;"
                                                                                        id="remspan_5069"
                                                                                        class="remspan"
                                                                                        href="javascript:;"><b>
                                                            &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                    <span id="sprice_0.48" class="span_5069 allspan">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                    <a style="text-decoration: none; color: #000;" onclick=""
                                                       id="addspan_5069" class="addspan" href="javascript:;"><b>
                                                            &nbsp;&nbsp;+&nbsp;&nbsp;</b></a>
                                                </b>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div style="padding: 0px;border-radius: 17px 0 0 17px !important;"
                                             class="subin btn default btnxx col-md-6 col-xs-12 ">
                                            <div style="padding:0px;">

                                                <a style="text-decoration: none; display:inline-block; padding-right: 15px;"
                                                   title="E" id="buttons_5070" class="buttons"
                                                   href="javascript:void(0);">
                                                    <button style="border-radius: 17px!important;"
                                                            class="btn btn-primary">E
                                                    </button>
                                                    <input type="checkbox" id="extra_5070"
                                                           title="5070_<br/> Tapioca_0.48_Add Toppings"
                                                           class="extra-159 spanextra_5070" style=""
                                                           name="extra" value="">
                                                    &nbsp;&nbsp;Tapioca (+ $0.48)
                                                    <b style="display:none;">
                                                    </b></a><b style="display:none;"><a onclick=""
                                                                                        style="text-decoration: none; color: #000;"
                                                                                        id="remspan_5070"
                                                                                        class="remspan"
                                                                                        href="javascript:;"><b>
                                                            &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                    <span id="sprice_0.48" class="span_5070 allspan">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                    <a style="text-decoration: none; color: #000;" onclick=""
                                                       id="addspan_5070" class="addspan" href="javascript:;"><b>
                                                            &nbsp;&nbsp;+&nbsp;&nbsp;</b></a>
                                                </b>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div style="padding: 0px;border-radius: 17px 0 0 17px !important;"
                                             class="subin btn default btnxx col-md-6 col-xs-12 ">
                                            <div style="padding:0px;">

                                                <a style="text-decoration: none; display:inline-block; padding-right: 15px;"
                                                   title="F" id="buttons_5071" class="buttons"
                                                   href="javascript:void(0);">
                                                    <button style="border-radius: 17px!important;"
                                                            class="btn btn-primary">F
                                                    </button>
                                                    <input type="checkbox" id="extra_5071"
                                                           title="5071_<br/> Mango Jelly_0.48_Add Toppings"
                                                           class="extra-159 spanextra_5071" style=""
                                                           name="extra" value="">
                                                    &nbsp;&nbsp;Mango Jelly (+ $0.48)
                                                    <b style="display:none;">
                                                    </b></a><b style="display:none;"><a onclick=""
                                                                                        style="text-decoration: none; color: #000;"
                                                                                        id="remspan_5071"
                                                                                        class="remspan"
                                                                                        href="javascript:;"><b>
                                                            &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                    <span id="sprice_0.48" class="span_5071 allspan">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                    <a style="text-decoration: none; color: #000;" onclick=""
                                                       id="addspan_5071" class="addspan" href="javascript:;"><b>
                                                            &nbsp;&nbsp;+&nbsp;&nbsp;</b></a>
                                                </b>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div style="padding: 0px;border-radius: 17px 0 0 17px !important;"
                                             class="subin btn default btnxx col-xs-12 col-md-6">
                                            <div style="padding:0px; ">

                                                <a style="text-decoration: none; display:inline-block; padding-right: 15px;"
                                                   title="G" id="buttons_5072" class="buttons"
                                                   href="javascript:void(0);">
                                                    <button style="border-radius: 17px!important;"
                                                            class="btn btn-primary">G
                                                    </button>
                                                    <input type="checkbox" id="extra_5072"
                                                           title="5072_<br/> Grass Jelly_0.48_Add Toppings"
                                                           class="extra-159 spanextra_5072" style=""
                                                           name="extra" value="">
                                                    &nbsp;&nbsp;Grass Jelly (+ $0.48)
                                                    <b style="display:none;">
                                                    </b></a><b style="display:none;"><a onclick=""
                                                                                        style="text-decoration: none; color: #000;"
                                                                                        id="remspan_5072"
                                                                                        class="remspan"
                                                                                        href="javascript:;"><b>
                                                            &nbsp;&nbsp;-&nbsp;&nbsp;</b></a>
                                                    <span id="sprice_0.48" class="span_5072 allspan">&nbsp;&nbsp;1&nbsp;&nbsp;</span>
                                                    <a style="text-decoration: none; color: #000;" onclick=""
                                                       id="addspan_5072" class="addspan" href="javascript:;"><b>
                                                            &nbsp;&nbsp;+&nbsp;&nbsp;</b></a>
                                                </b>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <input type="hidden" value="A,B,C,D,E,F,G," class="chars_159">
                                    </div>
                                </div>
                            </td>
                        </tr-->
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"></div>
                <div style="line-height:45px;" class="col-xs-12 add-btn">
                <div class="add-minus-btn" style="float:left;">
                   <a class="btn btn-primary minus" href="javascript:void(0);" onclick="changeqty('<?php echo $menu->ID;?>','minus')">-</a>
                   <div class="number<?php echo $menu->ID;?>">1</div>
                   <a class="btn btn-primary add" href="javascript:void(0);" onclick="changeqty('<?php echo $menu->ID;?>','plus')">+</a>

                    
                </div>

                    <a style="float: right; margin-left: 10px;" id="profilemenu<?php echo $menu->ID;?>"
                       class="btn btn-primary add_menu_profile add_end" href="javascript:void(0);">Add</a>
                     <button id="clear_<?php echo $menu->ID;?>"
                            style="opacity: 1; text-shadow:none;margin-left: 10px;float: right;margin-left: 10px;display:none;"
                            data-dismiss="modal" class="btn btn-warning resetslider" type="button">
                        RESET
                    </button>
                   <!-- &nbsp;<a style="float: right;margin-left:10px;" id="clear_<?php echo $menu->ID;?>" class="btn btn-danger  clearall"
                             href="javascript:void(0);">CLOSE</a>&nbsp; &nbsp;
                    
                    &nbsp;
                    <a title="1" class="nxt_button btn btn-primary" href="javascript:void(0);"
                       style="float: right; display: block;">Next</a>
                    <a title="1" class="prv_button btn btn-primary" href="javascript:void(0);"
                       style="float: right; margin-right: 10px; display: none;">Previous</a> -->

                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script>
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