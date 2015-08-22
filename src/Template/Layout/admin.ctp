<?php
  include("common/header.php");
  echo $this->Flash->render();
  ?>
  <div class="margin-bottom-40">
    <?php
  echo $this->fetch('content');

    ?>
      </div>
    <?php
  include("common/footer.php");
?>
