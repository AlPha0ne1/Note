<?php 

$plaintext = 'abcdef';
$key = "8b362e210615e66b3bf7f69f6c819056";
$cipher = "aes-256-ctr";
$iv = "ABCDEFGHIJKLMNOP";

$auth = "Ti8ra1RvUVBHd25HV3hydGFpZW1OQlExeFo0dW5zNnlVa1dSV244NmI4K1J1ZThkdmZHaUVWNy9ENnZHYzlFelpQMlpRUjRBSDFDamRyVXMwWS95Sm9mWk9RNmdKTE09";
$val = base64_decode($auth);


$encrypt_data = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv);

echo "ENCrypted: ".$encrypt_data;

$decrypted_data = openssl_decrypt($val, $cipher, $key, $options=0, $iv);
echo "\nDecrypted: ".$decrypted_data;

?>