<?php
$mt=0;
if(isset($_POST['action'])){
    $action=$_POST['action'];
    if($action=="Convertir"){
        $mt=$_POST['montant'];
        $client=new SoapClient("http://localhost:1717/BanqueWS?wsdl");
        $param=new stdClass();
        $param->montant=$mt;
        $rep=$client->__soapCall("Convert",array($param));
        $res=$rep->return;
    }
    elseif($action=="Afficher les comptes"){
        $client=new SoapClient("http://localhost:1717/BanqueWS?wsdl");
        $res2=$client->__soapCall("GetAllComptes",array());
    }
}
?>
<html>
<body>
<form method="post" action="clientPHP.php">
Montant:<input type="text" name="montant" value="<?php echo($mt)?>">
<input type="submit" value="Convertir" name="action">
<input type="submit" value="Afficher les comptes" name="action">
</form>

<?php if (isset($res)){?>
<?php echo($mt);?>
 Euros =
<?php echo($res); echo(" DH."); }?>
<?php if(isset($res2)){?>
<table border="1" width="20%">
<tr>
<th>CODE</th><th>SOLDE</th>
</tr>
<?php foreach($res2->return as $cp) {?>
<tr>
<td><?php echo($cp->code)?></td>
<td><?php echo($cp->solde)?></td>
</tr>
<?php }?>
</table>
<?php }?>
</body>
</html>