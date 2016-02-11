function encyclopedieMenuView(element,paramsArray)
{
    var innerString = "<table>";
    for(var i = 0; i < paramsArray.rows; i++)
    {
        innerString += "<tr>";
        for(var j = 0; j < paramsArray.columns; j++)
        {
            var id = i*paramsArray.columns + j;
            innerString += "<td" + paramsArray.onClick[id] + ">";
            innerString += paramsArray.content[id];
            innerString += "</td>";
        }
        innerString += "</tr>";
    }
    element.innerHTML = innerString + "</table>";
}