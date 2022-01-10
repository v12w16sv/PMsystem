
function sbmit(){  
    var regno=document.stmp.regno.value;  
    var srno=document.stmp.srno.value;  
      
    if (srno==null || srno==""){  
      alert("SrNo can't be blank");  
      return false;  
    }else if(regno.length<9||regno.length>9){  
      alert("Your Registration number must be 9 characters long.");  
      return false;  
      }  
      else{
        alert ("Slot booked succefully");
      }
    }  