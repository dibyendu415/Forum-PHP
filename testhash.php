<?php
$pass = "admin2";
$hash = password_hash($pass, PASSWORD_DEFAULT);
echo $hash;
echo "<br>";
$s=password_verify($pass,$hash);
echo $s;
if($s)
{
    echo "valid";
}
else{
    echo "error";
}
?>