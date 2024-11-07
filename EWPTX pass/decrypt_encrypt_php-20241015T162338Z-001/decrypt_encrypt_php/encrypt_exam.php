<?php 

$plaintext = 'abcdef';
$key = "8b362e210615e66b3bf7f69f6c819056";
$cipher = "aes-256-ctr";
$iv = "ABCDEFGHIJKLMNOP";

$auth = "Ti8ra1RvUVBHd25HV3hydGFpZW1OQlExeFo0dW5zNnlVa1dSV244NmI4K1J1ZThkdmZHaUVWNy9ENnZHYzlFelpQMlpRUjRBSDFDamRyVXMwWS95Sm9mWk9RNmdKTE09";
$real_auth = base64_decode($auth);


$encrypt_data = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv);

$decrypted_data = openssl_decrypt($real_auth, $cipher, $key, $options=0, $iv);
echo "\nDecrytped Serialized Data : ".$decrypted_data;

?>