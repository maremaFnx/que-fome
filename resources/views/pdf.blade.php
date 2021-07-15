<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
</head>

<body>
    SEUS PRODUTOS:
    @foreach($productAsCustomer as $productAsCustomer)
    <h3>========================================================</h3>
    <h4>NOME: {{$productAsCustomer->name}}</h4>
    <h4>PREÇO: R${{$productAsCustomer->price}}</h4>
    <h4>MINUTOS: {{$productAsCustomer->minutes}}m</h4>
    <h3>========================================================</h3>
    @endforeach
    <h3>Enviaremos o seu produto para a localização encontrada no seu IP assim que efetuar o pagamento.</h3>
    <img style="width: 40%;" src="https://www.pngkey.com/png/detail/115-1151094_cdigo-de-barras-boleto-e-carto-de-credito.png" alt="">
</body>

</html>
