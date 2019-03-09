function p2(){
st = $("input[name = 'g2']").val();
console.log(st);

switch(st){
    case "ON":
        swvalue = "OFF";
        break;
    case "OFF":
        swvalue = "ON";
        break;
}

console.log(swvalue);
document.getElementById("g1").value = swvalue;
}


