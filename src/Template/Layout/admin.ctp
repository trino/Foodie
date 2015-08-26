<?php
  include("common/header.php");
  //echo $this->Flash->render();
  ?>
  <div class="margin-bottom-40 main">
    <?php
     echo $this->Flash->render();
    echo $this->fetch('content');

    ?>
    <div class="clearfix"></div>
      </div>
    <?php
  include("common/footer.php");
?>
