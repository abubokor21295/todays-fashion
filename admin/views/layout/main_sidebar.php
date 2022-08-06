<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color:darkslategray">
        <div class="user-profile">
          <div class="user-image">
            <img src="asset/ujjal/images/4.jpg">
          </div>
          <div class="user-name">
              <h5>Today's Fashion</h5>
          </div>
          <div class="user-designation">
            Your Fashion 
          </div>
        </div>
        <ul class="nav">
        <?php
              $folder="views/layout/menus";
              foreach (glob("{$folder}/*_menu.php") as $filename)
              {
                  include $filename;
              }
          
          ?>
         
         
          
          
          
         
        </ul>
</nav>