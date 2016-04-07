function checkCheckBoxes(theForm) {
    if (
    theForm.terms.checked == false) 
    {
        alert ('You must agree to the terms first!');
	return false;

    } else {    
        return true;
    }
}
