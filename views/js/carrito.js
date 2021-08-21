var incrementa = function(){
    let valor = document.getElementById("cantidad");
    
    if(valor.value < 10)valor.value++;

    var txt = document.createTextNode(Math.round(valor));
        document.getElementById("cantidad").appendChild(txt);
}

var decrementa = function(){
    let valor = document.getElementById("cantidad");

    if(valor.value > 1)valor.value--;
 
    var txt = document.createTextNode(Math.round(valor));
        document.getElementById("cantidad").appendChild(txt);
}