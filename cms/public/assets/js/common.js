function replace_error_img(data) {
    var default_img = sitepath + "public/assets/Users/selected.jpg";
    $(data).attr("src", default_img);
}
function icon_Format(icon) {
    var originalOption = icon.element;
    if (!icon.id) { return icon.text; }
    replace_error_img();

    var $icon = "<img class='selectimage' onerror='replace_error_img(this)' src='" + $(icon.element).data('thumbnail') + "'></i>" + icon.text;
    return $icon;
}
function isNumberKey1(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31
        && (charCode < 48 || charCode > 57))
        return false;

    return true;
}
function isAlfa(e) {
    var regex = new RegExp("^[a-zA-Z]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }
    else {
        e.preventDefault();
        alert('Please Enter Alphabate');
        return false;
    }
}
function priceCheck(evt, id) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 45 || charCode > 57 || charCode == 47)) {
        return false;
    }
    else {
        var myval = document.getElementById(id).value;
        if (charCode == 46) {
            var fi = myval.indexOf(".");
            if (fi === -1) {
                return true;
            }
            else {
                return false;
            }
        }
        return true;
    }
}  