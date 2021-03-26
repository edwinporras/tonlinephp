<form action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/" method="post">

    <?php 
        $apikey="4Vj8eK4rloUd272L48hsrarnUA";   //A9d5Q7kGem9rh4csC34wHAG1m6
        $merchantId="508029";   //921260
        $referencia="PAGOS TEST001";
        $accountId="512321"; // 928459 
        $valor="190.99";
        $moneda="COP";

        $resultadoHash= $apikey ."~". $merchantId ."~". $referencia ."~". $valor ."~". $moneda;
        $signature = md5($resultadoHash);
    ?>
    

  <input name="merchantId"    type="hidden"  value="<?php  echo $merchantId; ?>"   >
  <input name="accountId"     type="hidden"  value="<?php  echo $accountId; ?>" >
  <input name="description"   type="hidden"  value="VENTAS EN LINEA"  >
  <input name="referenceCode" type="hidden"  value="<?php  echo $referencia; ?>" >
  <input name="amount"        type="hidden"  value="<?php  echo $valor; ?>"   >
  <input name="tax"           type="hidden"  value="0"  >
  <input name="taxReturnBase" type="hidden"  value="0" >
  <input name="currency"      type="hidden"  value="<?php  echo $moneda; ?>" >
  <input name="signature"     type="hidden"  value="<?php  echo $signature; ?>">
  <input name="test"          type="hidden"  value="1" >
  <input name="buyerEmail"    type="hidden"  value="testejemplo@mail.com" >
  <input name="responseUrl"    type="hidden"  value="http://localhost/T_OnlinePHP/web/index.php" >
  <input name="confirmationUrl"    type="hidden"  value="http://localhost/T_OnlinePHP/web/index.php" >
  
</form>