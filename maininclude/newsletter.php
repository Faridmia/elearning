<!-- ============================== Start Newsletter ================================== -->
<section class="bg-cover newsletter inverse-theme" style="background:url(assets/img/banner-2.jpg);" data-overlay="9">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12">
                <?php
                $database = new Database();
                $conn     = $database->connection;
                $data     = array('newsletter_heading', 'newsletter_content');
                $query    = $database->getData("setting", $data);
                $numrows  = $database->numRows($query);
                $row      = mysqli_fetch_array($query);

                $newsletter_heading = $row['newsletter_heading'];
                $newsletter_content = $row['newsletter_content'];

                ?>
                <div class="text-center">
                    <h2><?php echo $newsletter_heading; ?></h2>
                    <p><?php echo $newsletter_content; ?></p>
                    <?php

                    $user_email = "";
                    if (isset($_POST['subscription'])) {

                        $user_email = $_POST['sub_email'];

                        if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                            $subject = "Thanks for subscribing us.";
                            $message = "Thanks for subscribing to our blog. You'll always recive latest updates form us. And we won't share or sell you.";

                            $sender = "From: faridcse7800@gmail.com" . "\r\n";

                            if (mail($user_email, $subject, $message, $sender)) { ?>
                                <div class="alert alert-success"> Thanks for your subscribing us.</div>
                            <?php } else { ?>
                                <div class="alert alert-danger"> Failed while sending your email</div>
                            <?php }
                        } else { ?>
                            <div class="alert alert-danger"> <?php echo "$sub_email - Invalid Email"; ?></div>
                    <?php }
                    }
                    ?>
                    <form class="sup-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="email" class="form-control sigmup-me" name="sub_email" placeholder="Your Email Address" value="<?php echo $user_email; ?>" required="required">
                        <input type="submit" class="btn btn-theme" name="subscription" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>