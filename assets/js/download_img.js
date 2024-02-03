setUpDownloadPageAsImage('month-before', '.month-before');
setUpDownloadPageAsImage('month-now', '.month-now');
setUpDownloadPageAsImage('date-before', '.date-before');
setUpDownloadPageAsImage('date-now', '.date-now');

function setUpDownloadPageAsImage(buttonId, targetSelector) {
    document.getElementById(buttonId).addEventListener("click", function () {
        // Get the data-id attribute value from the target element
        var dataId = document.querySelector(targetSelector).getAttribute('data-id');

        // Pass the target element to html2canvas
        html2canvas(document.querySelector(targetSelector)).then(function (canvas) {
            console.log(canvas);
            simulateDownloadImageClick(canvas.toDataURL(),  dataId + '.png');
        });
    });
}

function simulateDownloadImageClick(uri, filename) {
    var link = document.createElement('a');
    if (typeof link.download !== 'string') {
        window.open(uri);
    } else {
        link.href = uri;
        link.download = filename;
        accountForFirefox(clickLink, link);
    }
}

function clickLink(link) {
    link.click();
}

function accountForFirefox(click) { // wrapper function
    let link = arguments[1];
    document.body.appendChild(link);
    click(link);
    document.body.removeChild(link);
}
