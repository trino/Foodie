<ul class="scroller orders" style="height: 300px;">
<?php
if(isset($order)){
    $menu_ids = $order->menu_ids;
    $arr_menu = explode(',', $menu_ids);
    $arr_qty = explode(',', $order->qtys);
    $arr_prs = explode(',', $order->prs);
    $arr_extras = explode(',', $order->extras);
    
    
    foreach ($arr_menu as $k => $me) {
        if ($order->extras != "") {
            $extz = str_replace(array("% ", ':'), array(" ", ': '), $arr_extras[$k]);
            $extz = str_replace("%", ",", $extz);
        } else
            $extz = "";
        if (is_numeric($me)) {
            $m = $manager->get_entry('Menus',$me);
            $tt = $m->menu_item;
        }
        ?>
        <li id="list2" class="infolist" >
          <span class="receipt_image">
          <img src="<?php echo $this->request->webroot;?>/img/products/<?php echo $m->image;?>" alt="Rolex Classic Watch" width="37" height="34">
          <span class="count">x <?php echo $arr_qty[$k];?></span><input type="hidden" class="count" name="qtys[]" value="1" />
          </span>
          <strong><?php echo "<span class='menu_bold'>".  $tt . "</span>:" . str_replace('<br/>','',$extz);?></strong>
          <em class="total">$ <?php echo number_format(($arr_qty[$k] * $arr_prs[$k]), 2);?></em>
          <span class="amount" style="display:none;"> <?php echo number_format($arr_prs[$k], 2);?></span>
          <input type="hidden" class="menu_ids" name="menu_ids[]" value="1" />
          <input type="hidden" name="extras[]" value="Watch Rolex Classic "/>
          <input type="hidden" name="listid[]" value="2" />
          <input type="hidden" class="prs" name="prs[]" value="<?php echo number_format(($arr_qty[$k] * $arr_prs[$k]), 2);?>" />
          <a href="javascript:void(0);" class="del-goods" onclick="">&nbsp;</a>
        </li>
        
    <?php
    }
    } ?>
  <!--li id="list1" class="infolist" >
    <span class="receipt_image">
      <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
      <a id="dec1" style="width:18px;padding: 6px;height: 18px;line-height: 6px" class="decrease small btn btn-primary" href="javascript:void(0);">
      <strong>-</strong></a><span class="count">x 1</span><input type="hidden" class="count" name="qtys[]" value="1" />
      <a id="inc1"  class="increase btn btn-primary small " href="javascript:void(0);" style="width:18px;padding: 6px;height: 18px;line-height: 6px">
      <strong>+</strong></a>
      </span>
      <strong><a href="shop-item.html">Watch Rolex Classic Rolex Classic Watch Rolex Classic Watch Rolex Classic </a></strong>
      <em class="total">$1230</em>
      <span class="amount" style="display:none;">1230</span>
      <input type="hidden" class="menu_ids" name="menu_ids[]" value="1" />
      <input type="hidden" name="extras[]" value="Watch Rolex Classic Rolex Classic Watch Rolex Classic Watch Rolex Classic "/>
      <input type="hidden" name="listid[]" value="1" />
      <input type="hidden" class="prs" name="prs[]" value="1230" />
      <a href="javascript:void(0);" class="del-goods" onclick="$(this).parent().remove()">&nbsp;</a>
    </li>
    
    <li id="list2" class="infolist" >
    <span class="receipt_image">
      <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
      <a id="dec2" style="width:18px;padding: 6px;height: 18px;line-height: 6px" class="decrease small btn btn-primary" href="javascript:void(0);">
      <strong>-</strong></a><span class="count">x 1</span><input type="hidden" class="count" name="qtys[]" value="1" />
      <a id="inc2"  class="increase btn btn-primary small " href="javascript:void(0);" style="width:18px;padding: 6px;height: 18px;line-height: 6px">
      <strong>+</strong></a>
      </span>
      <strong><a href="shop-item.html">Watch Rolex Classic </a></strong>
      <em class="total">$120</em>
      <span class="amount" style="display:none;">120</span>
      <input type="hidden" class="menu_ids" name="menu_ids[]" value="1" />
      <input type="hidden" name="extras[]" value="Watch Rolex Classic "/>
      <input type="hidden" name="listid[]" value="2" />
      <input type="hidden" class="prs" name="prs[]" value="120" />
      <a href="javascript:void(0);" class="del-goods" onclick="$(this).parent().remove()">&nbsp;</a>
    </li>
    <li id="list3" class="infolist" >
    <span class="receipt_image">
      <a href="shop-item.html"><img src="<?php echo $this->request->webroot;?>/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
      <a id="dec3" style="width:18px;padding: 6px;height: 18px;line-height: 6px" class="decrease small btn btn-primary" href="javascript:void(0);">
      <strong>-</strong></a><span class="count">x 1</span><input type="hidden" class="count" name="qtys[]" value="1" />
      <a id="inc3"  class="increase btn btn-primary small " href="javascript:void(0);" style="width:18px;padding: 6px;height: 18px;line-height: 6px">
      <strong>+</strong></a>
      </span>
      <strong><a href="shop-item.html">Watch Rolex Classic </a></strong>
      <em class="total">$123</em>
      <span class="amount" style="display:none;">123</span>
      <input type="hidden" class="menu_ids" name="menu_ids[]" value="1" />
      <input type="hidden" name="extras[]" value="Watch Rolex Classic "/>
      <input type="hidden" name="listid[]" value="3" />
      <input type="hidden" class="prs" name="prs[]" value="123" />
      <a href="javascript:void(0);" class="del-goods" onclick="$(this).parent().remove()">&nbsp;</a>
    </li-->
    
  </ul>