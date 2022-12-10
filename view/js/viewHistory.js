const viewhistoryForm = document.getElementById('vh_form');

function isValid(viewhistoryForm){
    const pID = viewhistoryForm.pID.value;

    document.getElementById('vh_fnameErr').innerHTML = "";
    
    let isValid = true;
    if(pID == "" || pID == null){
        document.getElementById('vh_fnameErr').innerHTML = "<br>yoo.. Enter patient's ID!";
        isValid = false;
    }

    if (!isValid) return false;

	return true;
}


function search(viewhistoryForm) {

	const method = viewhistoryForm.method;
	const key = viewhistoryForm.pID.value;
	const url = viewhistoryForm.action + "?pID=" + key;

	let xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
        let response = JSON.parse(xhttp.responseText);
		document.getElementById("patientDetails").innerHTML = response.responseText;
	}
	xhttp.open(method, url);
	xhttp.send();

	return false;

}
