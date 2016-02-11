function encyclopedieArticleView(element,paramsArray)
{
    element.innerHTML = 
          "<h3>" + paramsArray.title        + "</h3>" 
        + "<em>" + paramsArray.description  + "</em>"
        + "<p>"  + paramsArray.text         + "</p>";
}