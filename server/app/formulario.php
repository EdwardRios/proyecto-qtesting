<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
</head>
<body>
    <h2>Billetera </h2>
    <h3>Saldo : <span id="funds"></span></h3>
        
        <input id="value" type="number" name="nombre" min=1>        
        <button id="button-add" value="Enviar">Adicionar</button>               
        <button id="button-reduce" value="Enviar">Sustraer</button>
        <h3 id="message"></h3>
    <script>
        fetch('http://localhost:8000')
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);
                document.getElementById("funds").innerHTML = data.funds
            });
            
            //     document.getElementById("button-add").addEventListener('click',postRequest('http://localhost:8000/add.php', {funds: valueAdd})
            //     .then(data => console.log(data)) // Result from the `response.json()` call
            //   );
            //console.log(valueAdd);
                document.getElementById("button-add").addEventListener('click' , function(){
                    var valueAdd = document.getElementById("value").value
                    postAddRequest('http://localhost:8000/add.php',{ funds: valueAdd})
                })
                document.getElementById("button-reduce").addEventListener('click' , function(){
                    var valueAdd = document.getElementById("value").value
                    postReduceRequest('http://localhost:8000/reduce.php',{ funds: valueAdd})
                })
              
            
                    
            
                function postAddRequest(url, data) {
                    const searchParams = Object.keys(data).map((key) => {
                    return encodeURIComponent(key) + '=' + encodeURIComponent(data[key]);
                    }).join('&');
                    return fetch(url, {
                    //credentials: 'same-origin', // 'include', default: 'omit'                   
                    method: 'POST', // 'GET', 'PUT', 'DELETE', etc.
                    //body: JSON.stringify(data), // Coordinate the body type with 'Content-Type'
                    headers: {
                        //'Accept' : 'application/json',
                        'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
                    },
                    body: searchParams,
                })
                .then((resp)=> resp.json())
                .then(function(data){
                    document.getElementById("message").innerHTML = data.mensaje
                    document.getElementById("funds").innerHTML = data.actualFunds
                    console.log(data.mensaje)
                    console.log(data.actualFunds)
                })            
                }   
                function postReduceRequest(url, data) {
                    const searchParams = Object.keys(data).map((key) => {
                    return encodeURIComponent(key) + '=' + encodeURIComponent(data[key]);
                    }).join('&');
                    return fetch(url, {
                    //credentials: 'same-origin', // 'include', default: 'omit'                   
                    method: 'POST', // 'GET', 'PUT', 'DELETE', etc.
                    //body: JSON.stringify(data), // Coordinate the body type with 'Content-Type'
                    headers: {
                        //'Accept' : 'application/json',
                        'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
                    },
                    body: searchParams,
                })
                .then((resp)=> resp.json())
                .then(function(data){
                    document.getElementById("message").innerHTML = data.mensaje
                    document.getElementById("funds").innerHTML = data.actualFunds
                    console.log(data.mensaje)
                    console.log(data.actualFunds)
                })            
                }   

        
              
    </script>    
</body>
</html>

