
function calcualte() {
    var x = parseFloat(document.getElementById("width").value) || 0;
    var y = parseFloat(document.getElementById("height").value) || 0;
    var kvm = parseFloat(document.getElementById("priceKvm").value) || 0;
    var priceAdd = parseFloat(document.getElementById("priceAdd").value) || 0;
    var priceOtkos = parseFloat(document.getElementById("priceOtkos").value) || 0;
    var total = (x * 0.001 + y * 0.001) * kvm;
    document.getElementById("price").value = total + priceOtkos + priceAdd;
}

function onclick(e) {
    language = parseFloat(e.target.id) || 0;
    document.getElementById("priceOtkos").value = language;
    var x = parseFloat(document.getElementById("width").value) || 0;
    var y = parseFloat(document.getElementById("height").value) || 0;
    var kvm = parseFloat(document.getElementById("priceKvm").value) || 0;
    var priceAdd = parseFloat(document.getElementById("priceAdd").value) || 0;
    var total = (x * 0.001 + y * 0.001) * kvm;
    document.getElementById("price").value = total + language + priceAdd;

}
for (var i = 0; i < myForm.otkosId.length; i++) {
    myForm.otkosId[i].addEventListener("click", onclick);
}

function addCalc(d) {
    check = d.target.checked;
    language = parseFloat(d.target.id) || 0;
    var priceAdd = parseFloat(document.getElementById("priceAdd").value) || 0;
    var total = parseFloat(document.getElementById("price").value) || 0;
    if (check) {
        document.getElementById("price").value = total + language;
        document.getElementById("priceAdd").value = priceAdd + language;
    } else {
        document.getElementById("price").value = total - language;
        document.getElementById("priceAdd").value = priceAdd - language;
    }
}
for (var i = 0; i < myForm.workType.length; i++) {
    myForm.workType[i].addEventListener("click", addCalc);
}
