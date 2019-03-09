function bellaction() {
    var x = document.getElementById("bellnoti");
    var displayValue = window.getComputedStyle(x).display;
    if (displayValue === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}