<?php
  include("subpages/header.php");
  echo $this->Flash->render();
  echo $this->fetch('content');
  include("subpages/footer.php");
?>
