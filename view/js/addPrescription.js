const apForm = document.getElementById('ap_form');

function isValid(apForm){
    const medecinename = apForm.medicineName.value;
    const dossage = apForm.dossage.value;

    document.getElementById('ap_mname').innerHTML = "";
    document.getElementById('ap_dossage').innerHTML = "";
    
    let isValid = true;
    
    if(medecinename == "" || medecinename == null){
        document.getElementById('ap_mname').innerHTML = "Please provide a medecine name!";
        isValid = false;
    }
    if(dossage == "" || dossage == null){
        document.getElementById('ap_dossage').innerHTML = "Please provide a dossage!";
        isValid = false;
    }
    if (!isValid) return false;

	return true;
}