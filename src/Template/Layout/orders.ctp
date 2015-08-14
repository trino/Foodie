<?php
    include("common/header.php");
    echo $this->Flash->render();

    function count2($var){
        if (is_array($var)){
            return count($var);
        } else if ($var instanceof Traversable) {
            return iterator_count($var);
        }
        return 0;
    }
?>
<div class="row " style="padding-top: 20px;">
    <div class="col-xs-12">
        <div class="">
            <!--div class="banners--big">
Welcome, test
</div-->
        </div>
    </div>
</div>
<div class="col-md-12">
    <?php echo $this->element('user_menu');?>
    <div class="col-xs-12  col-sm-9">
        <div class="grid">
            <h3 class="sidebar__title">Order History</h3>
            <hr class="shop__divider">
            <div class="dashboard">

                <table class="table table-theme table-striped">
                    <thead>
                    <tr><th>Ordered By</th><th style="width: 250px;">Date/Time</th><th style="width: 200px;">Action</th><th style="width: 100px;">Status</th></tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count2($Orders)) {
                        foreach($Orders as $Order){
                            $Profile = $Manager->get_profile($Order->UserID);
                            echo '<tr><td>' . $Profile->Name . '</td><td>' . $Order->Date . '</td>';
                            echo '<td><a href="?ID=' . $Order->ID . '" class="btn btn-success">View</a>';
                            echo '<a href="?action=delete&ID=' . $Order->ID . '" class="btn btn-danger" ';
                            echo 'onclick="return confirm(' . "'Are you sure you want to delete order " . $Order->ID . "?'" . ');">Delete</a>';
                            echo '</td><td>' . $Order->Status . '</TD></TR>';
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

            </div>



            <div class="clearfix  hidden-xs"></div>
        </div>
        <hr class="shop__divider">
        <?php /*<div class="shop__pagination">
          <ul class="pagination">
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
            <li><a href="#">1</a></li>
            <li><a class="active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
          </ul>
        </div><?php */?>
    </div>
</div>
<?php
    include("common/footer.php");
?>