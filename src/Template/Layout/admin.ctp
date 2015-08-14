<?php
  include("common/header.php");
  echo $this->Flash->render();
  echo $this->fetch('content');
  include("common/footer.php");
?>
