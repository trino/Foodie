<?php
      function listitem($webroot, $URL, $Name){
            $isme = $URL && strpos($_SERVER["REQUEST_URI"], $URL) !== false && strpos($URL, "/") < strlen($URL) - 1;
            if($isme){ Echo "<B>";}
            echo '<li class="list-group-item clearfix"><a href="' . $webroot . $URL . '"><i class="fa fa-angle-right"></i> ' . $Name . '</a></li>';
            if($isme){ Echo "</B>";}
      }
      function listitems($webroot, $Name, $Controller, $Items){
            echo '<H4>' . $Name . '</H4><ul class="list-group margin-bottom-25 sidebar-menu">';
            foreach($Items as $Name => $URL){
                  if($Controller){
                        $URL = $Controller . "/" . $URL;
                  }
                  listitem($webroot, $URL, $Name);
            }
            echo '</ul>';
      }
?>

<div class="sidebar col-md-2 col-sm-4">
      <aside class="sidebar  sidebar--shop">
            <div class="shop-filter">
                  <?php
                        if($userID) {
                              $ProfileType = $Manager->get_profile_type($userID);
                              if($ProfileType->CanEditGlobalSettings){
                                    listitems($this->request->webroot, "Administrator", "", array(
                                          "Users" => "restaurants/employees",
                                          "Restaurants" => "restaurants/restaurants",
                                          "Newsletter" => "restaurants/newsletter"
                                    ));
                                    echo '<hr class="shop__divider">';
                              }
                              if ($Profile->RestaurantID) {
                                    listitems($this->request->webroot, "Restaurant", "restaurants", array(
                                        "Restaurant Info" => "dashboard",
                                        "Menu Manager" => "menu_manager",
                                        "Pending Orders <span class='notification'>(10)</span>" => "orders/pending",
                                        "Order History" => "orders",
                                        "Event Log" => "eventlog",
                                        "Employee Manager" => "employees",
                                        "Print Report" => "report"
                                    ));
                                    echo '<hr class="shop__divider">';
                              }

                              listitems($this->request->webroot, "User", "users", array(
                                  "User Info" => "dashboard",
                                  "Addresses" => "addresses",
                                  "View Orders" => "orders",
                                  "Logout" => "logout"
                              ));
                        }
                  ?>
            <hr class="shop__divider">
            </div>
      </aside>
</div>