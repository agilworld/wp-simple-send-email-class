# WP Simple Send Email Class #
Simple Send Email Library Class for WordPress

Just do like these :

/* Init email class */
    $sendmail = new Sendmail();
    $sendmail->_from_name = 'Agil';
    $sendmail->_from_address = 'helloworld@mail.com';
    
    // Let's go send email
    $sendmail->send( 'email_destination', 'subject_email', 'emal_content' );
