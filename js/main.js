function preloadLibrary () {
  var dir = "library";
  var extension = ".xml";
  $.ajax({
    url: dir,
    async: false,
    error: function () {console.log("Failed to load library! " + e);},
    success: function (data) {
      $(data).find("a:contains(" + extension + ")").each(function () {
        var filename = dir + "/" + this.text;
        var name = this.text.slice(0, -4);
        //files.loadFile({id: name, src: filename});
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
  
  
  $(document).tooltip({
    items:'a.link',
    tooltipClass: 'tooltip',
    position: {my: "left+15 top", at: "right center"},
    content: function (callback) {
      //Get content here
    }
  });
}