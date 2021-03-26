<div>



<form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">

    <table class="table table-light" id="tablaPasarela">
    <thead class="thead-light">
        <tr  class="img_columna">
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    <?php 
        //4021601424254581
        $total=$_POST['verificar'];

        $apikey="4Vj8eK4rloUd272L48hsrarnUA";   //A9d5Q7kGem9rh4csC34wHAG1m6
        $merchantId="508029";   //921260
        $referencia="VENTAS EN LINEA oks";
        $accountId="512321"; // 928459 
        $valor="$total";
        $moneda="COP";
        
        
        $resultadoHash= $apikey ."~". $merchantId ."~". $referencia ."~". $valor ."~". $moneda;
        $signature = md5($resultadoHash);
    ?>
    </table>


  <input name="merchantId"    type="hidden"  value="<?php  echo $merchantId; ?>"   >
  <input name="accountId"     type="hidden"  value="<?php  echo $accountId; ?>" >
  <input name="description"   type="hidden"  value="Test 123***"  >
  <input name="referenceCode" type="hidden"  value="<?php  echo $referencia; ?>" >
  <input name="amount"        type="hidden"  value="<?php  echo $valor; ?>"   >
  <input name="tax"           type="hidden"  value="0"  >
  <input name="taxReturnBase" type="hidden"  value="0" >
  <input name="currency"      type="hidden"  value="<?php  echo $moneda; ?>" >
  <input name="signature"     type="hidden"  value="<?php  echo $signature; ?>">
  <input name="test"          type="hidden"  value="1" >
  <input name="buyerEmail"    type="hidden"  value="testejemplo@mail.com" >
  <input name="responseUrl"    type="hidden"  value="http://localhost/T_OnlinePHP/web/index.php?modulo=agradecimiento" >
  <input name="confirmationUrl"    type="hidden"  value="http://localhost/T_OnlinePHP/web/index.php?modulo=agradecimiento" >
  
  <div class="terminos">
        <h4 class="tittle_terminos">Terminos y condiciones</h4>
        <p class="txt_terminos">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Numquam recusandae, tempore ipsum quas expedita nemo earum esse excepturi dicta vel praesentium ipsa aut deserunt eligendi, nam impedit quidem, velit ut?
        </p>
        <div class="form-check check_prop">
            <label>
                <input type="checkbox" checked> Acepto los Terminos y condiciones
            </label>
        </div>
  </div>
  
  <div class="conte_carrito_btn">
    <div class="div conte_carrito_btn_inf">
        <a href="index.php?modulo=envio" class="btn btn-warning" role="button">Ir a envio</a>
    </div>
    <div class="div conte_carrito_btn_inf">
        <!-- <a class="btn btn-success" type="submit"  name="Submit" role="button">Pagar</a> -->
        <input class="btn btn-success" name="Submit" type="submit"  value="Pagar" >

    </div>
    </div>

  <!-- <a href="index.php?modulo=envio" class="btn btn-warning">Ir a envio</a> -->
  <!-- <input class="btn btn-success" name="Submit"        type="submit"  value="Pagar" > -->
</form>
</div>