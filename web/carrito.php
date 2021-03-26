<form method="post" action="index.php?modulo=envio">
<table class="table table-light" id="tablaCarrito">
    <thead class="thead-light">
        <tr  class="img_columna">
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<div class="conte_carrito_btn">
<div class="div conte_carrito_btn_inf">
    <a href="index.php?modulo=productos" class="btn btn-warning" role="button">Ir a productos</a>
</div>
<div class="div conte_carrito_btn_inf">
    <a href="index.php?modulo=envio" type="submit" class="btn btn-success" role="button">Ir a datos de envio</a>
    <button class="btn btn-primary" type="submit" >Ir a Pagar TEST</button>
</div>
</div>
</form>
<?php
// http://localhost/T_OnlinePHP/web/index.php?modulo=agradecimiento
// &merchantId=508029
// &merchant_name=Test+PayU+Test+comercio
// &merchant_address=Av+123+Calle+12
// &telephone=7512354
// &merchant_url=http%3A%2F%2Fpruebaslapv.xtrweb.com
// &transactionState=6
// &lapTransactionState=DECLINED
// &message=DECLINED
// &referenceCode=VENTAS+EN+LINEA+ok
// &reference_pol=857531567
// &transactionId=47545473-0ebe-4d7b-8e3c-47ab88e499e4
// &description=Test+123***
// &trazabilityCode=&cus=&orderLanguage=es&extra1=&extra2=&extra3=&polTransactionState=6
// &signature=c6dd660eae5f508d42abc2098fa7b6a7
// &polResponseCode=5&lapResponseCode=DECLINED_TEST_MODE_NOT_ALLOWED&risk=&polPaymentMethod=36&lapPaymentMethod=BANK_REFERENCED&polPaymentMethodType=10&lapPaymentMethodType=BANK_REFERENCED&installmentsNumber=1&TX_VALUE=16501.54&TX_TAX=.00&currency=COP&lng=es&pseCycle=&buyerEmail=testejemplo%40mail.com&pseBank=&pseReference1=&pseReference2=&pseReference3=&authorizationCode=