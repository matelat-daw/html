function myColor()
{
    console.log(color.value);
    option.style.visibility = "hidden";
}

function show()
{
    option.style.visibility = "visible";
}

function table(size)
{
    html = "<table><tr>";
    for (var j = 0; j < size; j++)
    {
        for (var i = 0; i < size; i++)
        {
            html += blucle(html);
        }
        if (j < size - 1)
            html += "</tr><tr>";
    }
    html += "</tr></table>";
    container.innerHTML = html;
}

function blucle(html)
{
    return "<td></td>";
}