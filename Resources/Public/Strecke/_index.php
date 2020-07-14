<!DOCTYPE html>
<html>
<body>
<form action="" method="post">
<label>Местоположение:</label> <input type="text" name="o" placeholder="Введите местоположение" required> <br><br>
<label>Место назначения:</label> <input type="text" name="d" placeholder="EВведите место назначения" required> <br><br>
<input type="submit" value="Вычисить расстояние и время" name="submit"> <br><br>
</form>
<?php
if(isset($_POST['submit'])){
$origin = $_POST['o']; $destination = $_POST['d'];
$api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&language=ru&origins=".$origin."&destinations=".$destination."&key=AIzaSyCvvm7iXZibbQaPtMTrGwCaBXYtcTQKjYY");
$data = json_decode($api);
?>
<label><b>Расстояние: </b></label> <span><?php echo ((int)$data->rows[0]->elements[0]->distance->value / 1000).' км'; ?></span> <br><br>
<label><b>Время в пути: </b></label> <span><?php echo $data->rows[0]->elements[0]->duration->text; ?></span>
<?php } ?>
</body>
</html>