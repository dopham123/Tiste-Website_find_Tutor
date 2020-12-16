function loadFile(className, url) {
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
        success: function (strData) {
            var x = document.getElementsByClassName(className);
            x[0].innerHTML = strData;
        }
    });
};