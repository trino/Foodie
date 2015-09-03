<?php
include("common/header.php");
echo $this->Flash->render();

function count2($var) {
    if (is_array($var)) {
        return count($var);
    } else if ($var instanceof Traversable) {
        return iterator_count($var);
    }
    return 0;
}
?>
<div class="main">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="content-page row">
            <?php echo $this->element('user_menu'); ?>
            <div class="col-xs-12  col-sm-9 col-md-9">
                <div class="deleteme">
                    <h3 class="sidebar__title">Order <?php (isset($type)) ? ucwords($type) : '' ?></h3>
                    <hr class="shop__divider">
                    <div class="dashboard">
                        <?php if (isset($type) && $type != 'detail') { ?>
                            <table class="table table-theme table-striped">
                                <thead>
                                    <tr><th>Ordered By</th><th>Date/Time</th><th>Action</th><th>Status</th></tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($Orders) && !is_null($Orders) && count($Orders) > 0) {
                                        foreach ($Orders as $Order) {
                                            $status = $Manager->order_status($Order);
                                            //$Profile = $Manager->get_profile($Order->UserID);
                                            echo '<tr><td>' . ucfirst($Order->ordered_by) . '</td><td>' . $Order->order_time . '</td>';
                                            echo '<td><a href="' . $this->request->webroot . 'restaurants/order_detail/' . $Order->id . '" class="btn btn-success">View</a>';
                                            echo '<a href="' . $this->request->webroot . 'restaurants/delete_order/' . $Order->id . '/' . $type . '" class="btn btn-danger" ';
                                            echo 'onclick="return confirm(\' Are you sure you want to delete order\');">Delete</a>';
                                            if ($type != 'pending') {
                                                echo '</td><td>' . $status . '</TD></TR>';
                                            } else {
                                                echo '<a href="' . $this->request->webroot . 'restaurants/approve_order/' . $Order->id . '" class="btn btn-info">Approve</a> <a href="' . $this->request->webroot . 'restaurants/cancel_order/' . $Order->id . '" class="btn btn-warning">Cancel</a></td><td>' . $status . '</TD></TR>';
                                            }
                                        }
                                    } else {
                                        echo '<TR><TD colspan="4"><DIV align="center">No orders found</DIV></TD></TR>';
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <!--div class="pagination2" style="margin:5px auto;width:300px">
                  <ul>
                  <li class="prev">�</li>            <li class="current">1</li><li><a href="/charlies/orders/history/page:2">2</a></li><li><a href="/charlies/orders/history/page:3">3</a></li>            <li class="next"><a href="/charlies/orders/history/page:2" rel="next">�</a></li>            </ul>
                  </div-->
                        <?php
                        } else {
                            $restaurant = (isset($order->res_id))?$Manager->get_restaurant($order->res_id):'';
                            ?>
                            <div class="infolist noprint"><strong>RESTAURANT NAME: </strong><?php echo (isset($restaurant->Name))?$restaurant->Name:'---'; ?></div>
                            <div class="infolist noprint"><strong>ORDERED BY: </strong><?php echo (isset($order->ordered_by))?$order->ordered_by:'---'; ?></div>
                            <div class="infolist noprint"><strong>EMAIL: </strong><?php echo (isset($order->email))?$order->email:'---'; ?></div>
                            <div class="infolist noprint"><strong>CONTACT: </strong><?php echo (isset($order->contact))?$order->contact:'---'; ?></div>
                            <div class="infolist noprint"><strong>ORDER TYPE: </strong><?php echo (isset($order->order_type) && $order->order_type == '1') ? 'Delivery' : 'Pickup' ?></div>
                            <div class="infolist noprint"><strong>ORDERED ON: </strong><?php if(isset($order->order_time)){$date = new DateTime($order->order_time);
                            echo $date->format('l jS \of F Y h:i:s A');} else { echo '---';} ?></div>
                            <div class="infolist noprint"><strong>ORDER READY: </strong><?php (isset($order->order_till))?$order->order_till:'---'; ?></div>
                            <?php
                            if (isset($order->remarks) && $order->remarks != '') {
                                echo '<div class="infolist noprint"><strong>ADDITIONAL NOTES:</strong>' . $order->remarks . '</div>';
                            }
                            echo $this->element('receipt');
                        }
                        ?>
                    </div>



                    <div class="clearfix  hidden-xs"></div>
                </div>
                <hr class="shop__divider">

                <?php /* <div class="shop__pagination">
                  <ul class="pagination">
                  <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                  <li><a href="#">1</a></li>
                  <li><a class="active" href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                  </ul>
                  </div><?php */ ?>
            </div>
        </div>
    </div>
</div>
<?php
include("common/footer.php");
?>
