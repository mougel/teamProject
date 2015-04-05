<?php session_start(); 
require_once("db_config.php");
// Connect to the Database and Select the tts database.

date_default_timezone_set('UTC');
// set the default timezone to use.

var_dump($_POST);

$priority = $_POST['priority'];
if ($priority == 1)
{$checked = 'checked';}
else{$checked = "";}
$discount = $_POST['discount'];
$discouted = 0;
$total = $_POST['total'];

if (isset($_POST['card'])){
	$pType = "card";
else{
	$pType = "bank";
}

$question="INSERT INTO `payment` (`idCustomer`, `idOrder`, `idDiscounts`, `paymentType`, `sucessful`, `ammount`, `ammountDiscounted`) VALUES(:idCustomer,:orderPriority,:etc)";
$add = $db->prepare($question, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$add->execute(array(':idCustomer' => $_SESSION['id'], ':idOrder' => 0, ':idDiscounts' => $idDiscounts, ':paymentType' => $pType, ':sucessful' => 1, ':ammount' => $total, ':ammountDiscounted' => $discouted));
//this will create a new payment.

$question2="SELECT `idPayment` FROM `payment` WHERE idCustomer = :idCustomer AND idOrder = 0";
$sth->execute(array(':idCustomer' => $_SESSION['id']);
$fetch2 = $sth->fetchAll();
if (is_array($fetch2)) {var_dump($fetch2); echo "error, several payments match!"}
else{$idPayment = $fetch2;}



if (isset($_POST['card'])){
	
	$name = $_POST['cardname'];
	$number = $_POST['cardnumber'];
	$card4 = substr($number, -4, 4);
	$ccv = $_POST['ccv'];
	$expirydate = substr($POST['yyyy'],2,2) . "-" . $POST['mm'] . "-" .  $POST['dd'];

	$question3="INSERT INTO `card` (`idPayment`, `card4`, `cardExp`, `cardName`) VALUES(:idPayment,:card4, :exp ,:cardName)";
	$add3 = $db->prepare($question3, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$add3->execute(array(':idPayment' => $idPayment, ':card4' => $card4, ':exp' => $expirydate, ':cardName' => $name));

}
else{

	$name = $_POST['bankname'];
	$number = $_POST['banknumber'];
	$sortcode = $_POST['sortcode'];

	$question3="INSERT INTO `bank` (`idPayment`, `bankAccount`, `bankSortCode`, `bankAccountName`) VALUES(:idPayment,:account, :sortcode ,:name)";
	$add3 = $db->prepare($question3, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$add3->execute(array(':idPayment' => $idPayment, ':account' => $number, ':sortcode' => $sortcode, ':Name' => $name));

}

echo "<form action=new_order.php method=POST id='ORDER'>
                <input type='hidden' value='".$idPayment."' name='idPayment' />
                <input type='checkbox' ".$checked." name='priority' />
                <input type=submit name=ORDER '/>
                </form>";
        ?>
        <script type="text/javascript">
            document.getElementById("ORDER").submit();
        </script>