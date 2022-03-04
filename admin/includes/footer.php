<footer class="dark-footer skin-dark-footer admin-footer">
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <?php
                $database = new Database();
                $conn     = $database->connection;
                $data     = array(
                    'phone', 
                    'email', 
                    'facebook', 
                    'twitter', 
                    'linkedin', 
                    'instagram', 
                    'logo', 
                    'address', 
                    'copyright', 
                    'banner_title', 
                    'banner_desc', 
                    'banner_img'
                );
                
                $query    = $database->getData("setting", $data);
                $numrows  = $database->numRows($query);
                $row      = mysqli_fetch_array($query);

                $facebook  = $row['facebook'];
                $twitter   = $row['twitter'];
                $linkedin  = $row['linkedin'];
                $instagram = $row['instagram'];
                $copyright = $row['copyright'];

                ?>

                <div class="col-lg-6 col-md-6">
                    <p class="mb-0"><?php echo $copyright; ?>.</p>
                </div>

                <div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer-bottom-social">
                        <li><a href="<?php echo $facebook; ?>"><i class="ti-facebook"></i></a></li>
                        <li><a href="<?php echo $twitter; ?>"><i class="ti-twitter"></i></a></li>
                        <li><a href="<?php echo $instagram; ?>"><i class="ti-instagram"></i></a></li>
                        <li><a href="<?php echo $linkedin; ?>"><i class="ti-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>