
<!DOCTYPE html>
<html>
<head><title> caricamento </title></head>
<body>

<form method="POST" action="#">
<input type="file" name="file" />
<input type="submit" value="Invia">
</form>

<?php

echo $_POST['file'];

?>

</body>
</html>

