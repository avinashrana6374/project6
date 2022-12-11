<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3"><br>
              <a href="https://www.findagrijobs.com/about.php#aboutus" button type="button" class="btn btn-primary .btn-sm">About us</button></a></div>
            <div class="col-md-3"><br>
                 <a href = "https://www.findagrijobs.com/contact.php" button type="button" class="btn btn-primary .btn-sm">Contact us</button></a></div>
            <div class="col-md-3"><br>
                 <a href="https://www.findagrijobs.com/about.php#Privacy%20Policies"button type="button" class="btn btn-primary .btn-sm">Privacy</button></a></div>
            <div class="col-md-3"><br>
                <a href="https://www.findagrijobs.com/about.php#Terms%20&%20Conditions" button type="button" class="btn btn-primary .btn-sm">Terms & Conditions</button></a></div>
                
            <div class="col-md-12">
                <br>
              <?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
              ?>
                <span><?php echo $row['footerdesc']; ?></span>
              <?php
                }
              }
              ?>
            </div>
            
            
        </div>
    </div>
</div>
</body>
</html>
