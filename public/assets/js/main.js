// Maintain the label at top when textfield is filled
var input100= document.getElementsByClassName('input100');
    for(let i=0; i<input100.length; i++){
        input100[i].onblur= function(){
            if(this.value.trim() != ""){
                this.classList.add('has-val');
            }
        }
        if(input100[i].getAttribute('name')== 'email' || input100[i].getAttribute('name')== 'password'){
            input100[i].onkeyup= function(){
                    var rx = new RegExp;
                        rx = /[" "]/gi;
                    input100[i].value = input100[i].value.replace(rx, "");
                }
            }
    }
//checkAndShow funcion to check validation and show validation message 
function checkAndShow(e){
  e.preventDefault();
  let check= true;
  for(let i= 0; i< input100.length; i++){
      if(validation(input100[i])== false){
          showValidation(input100[i]);
          check= false;
      }
  }
  return check;
}
// call hide validation function to show message when focused
for(let i= 0; i< input100.length; i++){
  input100[i].onfocus= function(){hideValidation(this)};
}

//show validation function
function showValidation(input){
  let thisAlert= input.parentElement;
  
  thisAlert.classList.add('alert-validate');
}
//hide validation function
function hideValidation(input){
  let thisAlert= input.parentElement;
  thisAlert.classList.remove('alert-validate');
}