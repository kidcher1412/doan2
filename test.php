<?php
    //Initiate the keys
    $result = openssl_pkey_new(array('private_key_bits' => 4096));
    //Export private key to $privateKey
    openssl_pkey_export($result, $privateKey);
    //Get the public key
    $publicKey = openssl_pkey_get_details($result)['key'];
    //Prepare your plain text to encrypt
    $plaintext = 'Welcome To Blogdesire';
    //Encrypt and export encrypted value to $encrypted_text
    openssl_public_encrypt($plaintext,$encrypted_text,$publicKey);
    //Print encrypted text 
    echo $encrypted_text;
    //Decrypt the encrypted message using the private key
    openssl_private_decrypt($encrypted_text, $plaintext, $privateKey);
    //Print the decrypted message
    echo $plaintext;
?>