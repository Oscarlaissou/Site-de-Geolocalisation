
function validate() {
    var name = document.getElementById('name').value;
        var regex = /^[a-zA-Z]{1,18}$/; 
    
        if (regex.test(name)) {
        } else {
            alert('Les données ne correspondent pas au format attendu.');
        }
    
    var number = document.getElementById('number').value;
    var regexFormat = /^\d{4}-\d{4}-\d{4}-\d{4}$/; 
    var regexLength = /^\d{1,18}$/; 

    if (regexFormat.test(number) && regexLength.test(number)) {
    } else {
        alert('Les données ne correspondent pas au format attendu.');
    }

    var number1 = document.getElementById('number1').value;
    var regex = /^\d{3}$/; 
    var regexLength = /^\d{1,3}$/; 

    if (regex.test(number1)  && regexLength.test(number1)) {
    } else {
        alert('Les données ne correspondent pas au format attendu.');
    }
}

