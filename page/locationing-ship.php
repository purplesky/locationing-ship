<?php
include "../common/header.php";
?>
<div id="wrapper">
  <div class="container-fluid container-cus">
    <div class="row-fluid row-fluid-cus">
      <?php
      include "../common/sidebar-left.php";
      ?>
      <div class="span9 span9-cus">
        <!--Body content-->
        <?php
        include "../common/management-info.php";
        ?>
        <div class="content-cus">
          <!-- INSERT TABLE HERE -->
          <div id="htdvtb-map"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="../js/ui/MapControl.js"></script>
<?php
include "../common/footer.php";
?>