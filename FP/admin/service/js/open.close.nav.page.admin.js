var status = 0;
function openNav() {
if(status == 0){
document.getElementById("mySidenav").style.width = "300px";


    status++;
}else
{ 
document.getElementById("mySidenav").style.width = "0";


status = 0;
}
}	

function closeNav() {
document.getElementById("mySidenav").style.width = "0";


}