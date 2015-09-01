<?php
  include("common/header.php");
  echo '<div class="margin-bottom-40 main">';
      echo $this->Flash->render();
      echo $this->fetch('content');
      echo '<div class="clearfix"></div>';
  echo '</div>';
  include("common/footer.php");
?>
