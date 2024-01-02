setUpDownloadPageAsImage('top-sales', '.top-sales');
setUpDownloadPageAsImage('download-informasi', '.informasi-data');
setUpDownloadPageAsImage('download-terminasi', '.terminasi-perolehan');
setUpDownloadPageAsImage('download-perbulan', '.terminasi-perbulan');

function setUpDownloadPageAsImage(buttonId, targetSelector) {
    document.getElementById(buttonId).addEventListener("click", function () {
        html2canvas(document.querySelector(targetSelector)).then(function (canvas) {
            console.log(canvas);
            simulateDownloadImageClick(canvas.toDataURL(), 'kinerja-sales.png');
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
