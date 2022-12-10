const fForm = document.getElementById('f_Form');

function isValid(fForm){
    const acNo = fForm.accNo.value;

    document.getElementById('f_accErr').innerHTML = "";
    
    let isValid = true;
    
    if(acNo == "" || acNo == null){
        document.getElementById('f_accErr').innerHTML = "Please enter an Account Number!";
        isValid = false;
    }
    if (!isValid) return false;

	return true;
}