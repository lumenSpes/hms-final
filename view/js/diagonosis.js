const dForm = document.getElementById('d_form');

function isValid(dForm){
    const pid = dForm.patientId.value;

    document.getElementById('d_pidErr').innerHTML = "";
    
    let isValid = true;
    
    if(pid == "" || pid == null){
        document.getElementById('d_pidErr').innerHTML = "Please enter patient ID!";
        isValid = false;
    }
    if (!isValid) return false;

	return true;
}