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
  $('a.link').each(function(){
    var name = $(this).text();
    var tip = "";
    switch ($(this).attr('class')) {
      case 'link talent':
        talentstest.find("talents talent").each(function(){
          //comapres the text in the a tag with the titles returned by the xml search
          if (name == $(this).find("title").text()) {
            tip = "<h3>" + $(this).find("title").text() + "</h3><table border='1'><tbody><tr><th><p>Step</p></th><th><p>Action</p></th><th><p>Karma</p></th><th><p>Strain</p></th></tr><tr><td>" + $(this).find("step").text() + "</td><td>" + $(this).find("action").text() + "</td><td>" + $(this).find("karma").text() + "</td><td>" + $(this).find("strain").text() + "</td></tr></tbody><p>" + $(this).find("description").text() + "</p>";
          }
        });
        break;
    }
    Tipped.create(this, tip, {
      skin: 'light',
      containment: 'viewport',
      hook: 'topleft',
      showOn: 'click',
      hideOn: false,
      closeButton: true
    });
  });
}