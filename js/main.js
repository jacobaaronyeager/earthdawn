function preloadLibrary () {
  var dir = "library";
  var extension = ".xml";
  $.ajax({
    url: dir,
    async: false,
    error: function () {console.log("Failed to load library files!");},
    success: function (data) {
      $(data).find("a:contains(" + extension + ")").each(function () {
        var filename = dir + "/" + this.text;
        var name = this.text.slice(0, -4);
        $.ajax({
          url: filename,
          async: false,
          error: function () {console.log("Failed to load file at " + filename);},
          success: function (data) {
            window[name] = $(data);
          }
        });
      });
    }
  });
}

function setTooltips () {
  $(".link").click(function () {
    var item = this;
    var name = $(this).text();
    switch ($(item).attr('class')) {
      case 'link talent':
        talentstest.find("talents talent title").each(function(){
          if (name == $(this).text()) {
            
          }  
        });
        break;
    }
  });
}