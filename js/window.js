function OpenWindow(text) {
    var myWindow = window.open("", "myWindow", "width=640,height=320");
    myWindow.document.write("<p>" + text + "</p>");
}
