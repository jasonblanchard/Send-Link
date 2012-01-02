<html>
<head></head>
<body>

<!-- Put this in your apache document root to access it over your local network.
You may need to change some information below to make it link to the correct 
files and directories in ~/linkapp -->

Enter link URL here to view on the TV:
<br />

<form action="link.php" method="post">
<input type="text" name="url" />
<input type="submit" value="Watch on TV" />
</form>

<?php
$url=$_POST['url'];

# Change {username} to your username without curly brackets
$username= {username};

$linkfile="/home/$username/linkapp/link.txt";
$fh=fopen($linkfile,'w') or die("Can't open file");

if (isset($url)) {
        #writes it to a file so you can execute it with the linkff.sh script
        fwrite($fh,$url);
        fclose($fh);

        #Safely executes in firefox. Make sure you have changed the settings for www-data user. See README for more info.
        $escaped_command=escapeshellcmd("sudo -u $username firefox");
        exec("$escaped_command --display :0.0 $url > /dev/null 2>/dev/null &");
}

?>

</body>
</html>


