<?php include("subpages/header.php"); ?>
   <?= $this->Flash->render() ?>
   <div class="main">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <?php //include('common/sidebar.php');
           echo $this->element('sidebar');
          ?>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <?= $this->fetch('content') ?>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
<?php include("subpages/footer.php"); ?>