let costList=document.querySelectorAll("#cost input");




let getCost =() =>{
   let gross=costList[0].value;
   let tax=costList[1].value;
   let bonus=costList[2].value;
   let net=costList[3];
  
   let totalTax=+gross * (+tax/100);
   let salaryAfterTaxes=gross - totalTax;
   let Net=+salaryAfterTaxes + +bonus;

   net.value=Net;

}

for(let i=0 ; i<costList.length;i++){
     costList[i].addEventListener("keyup",getCost);
}