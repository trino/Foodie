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
        <h3 class="sidebar__title"><?php echo (isset($type)=='history')?'Order History':'Pending Order';?></h3>
        <hr class="shop__divider">
        <div class="dashboard">
          
           <table class="table table-theme table-striped">
           <thead>
                <tr><th>Ordered By</th><th style="width: 250px;">Date/Time</th><th style="width: 200px;">Action</th><th style="width: 100px;">Status</th></tr>
           </thead>
           <tbody>
                           <tr><td>Asviny</td><td>2015-07-27 12:12:02</td>
                <td><a href="/charlies/orders/view/229" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/229?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
                <?php echo (isset($type)=='history')?'Approved':'Pending';?>
								
				
				</td></tr>
                                <tr><td>Tellier</td><td>2015-07-25 16:57:23</td>
                <td><a href="/charlies/orders/view/226" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/226?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php echo (isset($type)=='history')?'Approved':'Pending';?>				
				
				</td></tr>
                                <tr><td>Minh</td><td>2015-07-24 20:15:12</td>
                <td><a href="/charlies/orders/view/225" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/225?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php echo (isset($type)=='history')?'Approved':'Pending';?>				
				
				</td></tr>
                                <tr><td>Todd</td><td>2015-07-23 19:59:04</td>
                <td><a href="/charlies/orders/view/224" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/224?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php echo (isset($type)=='history')?'Approved':'Pending';?>				
				
				</td></tr>
                                <tr><td>Sarah oconnor</td><td>2015-07-22 17:49:48</td>
                <td><a href="/charlies/orders/view/221" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/221?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php echo (isset($type)=='history')?'Approved':'Pending';?>				
				
				</td></tr>
                                <tr><td>alyssa ritchie</td><td>2015-07-22 14:30:30</td>
                <td><a href="/charlies/orders/view/219" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/219?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php echo (isset($type)=='history')?'Approved':'Pending';?>				
				
				</td></tr>
                                <tr><td>madison </td><td>2015-07-20 17:50:46</td>
                <td><a href="/charlies/orders/view/216" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/216?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php echo (isset($type)=='history')?'Approved':'Pending';?>				
				
				</td></tr>
                                <tr><td>dennie</td><td>2015-07-20 12:01:36</td>
                <td><a href="/charlies/orders/view/215" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/215?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php echo (isset($type)=='history')?'Approved':'Pending';?>				
				
				</td></tr>
                                <tr><td>jennifer tanner</td><td>2015-07-20 11:17:54</td>
                <td><a href="/charlies/orders/view/214" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/214?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php echo (isset($type)=='history')?'Approved':'Pending';?>				
				
				</td></tr>
                                <tr><td>Brendan Thompson</td><td>2015-07-19 16:42:16</td>
                <td><a href="/charlies/orders/view/213" class="btn btn-success">View</a>
                <a href="/charlies/orders/delete/213?history" class="btn btn-danger" onclick="return confirm('Confirm Delete?');">Delete</a>
				</td><td>
				<?php echo (isset($type)=='history')?'Approved':'Pending';?>				
				
				</td></tr>
                           </tbody>
           </table>
                      <!--div class="pagination2" style="margin:5px auto;width:300px">
            <ul>
            <li class="prev">«</li>            <li class="current">1</li><li><a href="/charlies/orders/history/page:2">2</a></li><li><a href="/charlies/orders/history/page:3">3</a></li>            <li class="next"><a href="/charlies/orders/history/page:2" rel="next">»</a></li>            </ul>
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
  