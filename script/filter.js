$("button").click(function() {
    var show = $(this).attr('class');
    $('.post').each(function(){
        $(this).show();
        var test = $(this).attr('class');
        if (test.indexOf(show) < 0) $(this).hide();
    });
});


// ....
var title = document.getElementsByClassName("card_title");
    for(var i =0; i<title.length ;i++){
        var result = title[i].innerHTML.substring(0,10);
        result+="...";
        title[i].innerHTML = result;
}
