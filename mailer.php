<?php
// only process post request
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    // get the form field and remove the whitespace

    $contact_name    = text_input( $_POST['contact_name'] );
    $contact_subject = text_input( $_POST['contact_subject'] );
    $contact_message = text_input( $_POST['contact_message'] );
    $contact_email   = filter_var( trim( $_POST['contact_email'] ), FILTER_SANITIZE_EMAIL );

    // check the data was sent to the mailer

    if ( empty( $contact_email ) || empty( $contact_subject ) || empty( $contact_message ) || !filter_var( $contact_email, FILTER_VALIDATE_EMAIL ) ) {

        http_response_code( 400 );

        print json_encode( ['error' => 1, 'msg' => 'Opos there was a  problem with your submission. Please complete the form and try again!'] );

        exit();
    }

    // set the recipent  email address

    $recipient = $contact_email;

    // set the email subject

    $subject = $contact_subject;

    // build the email content

    $email_content = "Name: $contact_name\n";
    $email_content .= "Email: $contact_email\n\n";
    $email_content .= "Message: $contact_message\n\n\n";

    // build the email header

    $email = 'mdfarid7830@gmail.com';

    $email_headers = "From: $contact_name <$email>";

    // send the email

    // mail($recipient, $subject , $email_content, $email_headers);

    if ( mail( $recipient, $subject, $email_content, $email_headers ) ) {

        // set a 200 okay response code

        http_response_code( 200 );

        print json_encode( ['error' => 0, 'msg' => "Thanks you! Your Message has been sent"] );
    } else {

        // set 500 internal server error

        http_response_code( 500 );

        print json_encode( ['error' => 1, 'msg' => "Opos! something went wrong we couldn,t sent your message"] );
    }
} else {

    // not a post request

    http_response_code( 403 );

    print json_encode( ['error' => 1, 'msg' => "There was a  problem with your submission. Please try again!"] );
}

function text_input( $data ) {

    $data = trim( $data );
    $data = filter_var( $data, FILTER_SANITIZE_STRING );
    $data = str_replace( array( "\r", "\n" ), array( " ", " " ), $data );
    $data = stripslashes( $data );
    $data = htmlspecialchars( $data );

    return $data;
}
