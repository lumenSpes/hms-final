const coForm = document.getElementById('co_form');

function isValid(coForm){
    const pid = coForm.PatientID.value;
    const link = coForm.link.value;
    const co = coForm.instruction.value;

    document.getElementById('co_pidErr').innerHTML = "";
    document.getElementById('co_linkErr').innerHTML = "";
    document.getElementById('co_insErr').innerHTML = "";
    
    let isValid = true;
    
    if(pid == "" || pid == null){
        document.getElementById('co_pidErr').innerHTML = "Please enter a patient ID!";
        isValid = false;
    }
    
    if(link == "" || link == null){
        document.getElementById('co_linkErr').innerHTML = "Please enter a meeting link!";
        isValid = false;
    }
    
    if(co == "" || co == null){
        document.getElementById('co_insErr').innerHTML = "Please Enter instructions to join meeting!";
        isValid = false;
    }
    if (!isValid) return false;

	return true;
}