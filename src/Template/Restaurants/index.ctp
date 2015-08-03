<div class="main">
      <div class="container">
        
        

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
          <?php //include('common/sidebar.php');
           echo $this->element('sidebar');
          ?>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-8">
            <h2 ><a href="#"><?php echo ucfirst(str_replace('-',' ',$restaurant));?></a> Menus</h2>
            <?php echo $this->element('menus');?>
            
            
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

        
      </div>
    </div>
