(function( $ ){

  $.fn.fileonefilemanager = function(type, options , elem , max_length = 1) {
    type = type || 'file';


    this.addClass("upload_div_fm");
    var parents = this.parents(".div_image_upload");
    if(parents.find("." + elem).length >= max_length){
      parents.find(".upload_div_fm").addClass("hidden");
    }

    this.on('click', function(e) {

      if($("." + elem).length >= max_length){
        return;
      }

      var parents = $(this).parents('.div_image_upload');

      var iMyWidth;
      var iMyHeight;
      //half the screen width minus half the new window width (plus 5 pixel borders).
      iMyWidth = (window.screen.width / 2)  ;
      //half the screen height minus half the new window height (plus title and status bars).
      iMyHeight = (window.screen.height / 2) ;
      console.log(FindLeftWindowBoundry(), FindTopWindowBoundry());
      var x = screen.width/2 - 700/2 + FindLeftWindowBoundry();
      var y = screen.height/2 - 550/2 + FindTopWindowBoundry();


      var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
      

      var target_input = $(parents).find('.target_input');
      var target_preview = $(parents).find('.target_preview');



      window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600 ,left=' + x + ',top=' + y + '');
      window.SetUrl = function (items) {
        var file_path = items.map(function (item) {
          return item.url;
        }).join(',');

        // set the value of the desired input to image url 
        target_input.val('').val(file_path).trigger('change');

        // clear previous preview
        //target_preview.html('');

        // set or change the preview image src
        items.forEach(function (item) {
          var thumb_url = item.thumb_url; 
          var html = '<div class="col-md-4 col-sm-4 col-xs-6 img-upload-preview image_view_multi_upload">' +
                      '<img src="'+thumb_url+'" alt="" class="img-responsive '+elem+'">'+
                      '<input type="hidden" class="upload_image_fm" name="'+elem+'" value="' +file_path+ '">'+
                      '<input type="hidden" class="upload_image_fm" name="'+elem+'_thumbs" value="' +thumb_url+ '">'+
                      '<button type="button" class="btn btn-danger close-btn remove-files-upload"><i class="fa fa-times"></i></button>'+
                  '</div>'  ;
          target_preview.append( html         );
        });

        if($("." + elem).length >= max_length){
          $(parents).find(".upload_div_fm").addClass("hidden");
        }

        // trigger change event
        target_preview.trigger('change');
      };
      return false;
    });
  }

  function FindLeftWindowBoundry()
  {
    // In Internet Explorer window.screenLeft is the window's left boundry
    if (window.screenLeft)
    {
      return window.screenLeft;
    }
    
    // In Firefox window.screenX is the window's left boundry
    if (window.screenX)
      return window.screenX;
      
    return 0;
  }
  // Find Left Boundry of current Window
  function FindTopWindowBoundry()
  {
    // In Internet Explorer window.screenLeft is the window's left boundry
    if (window.screenTop)
    {
      return window.screenTop;
    }
    
    // In Firefox window.screenY is the window's left boundry
    if (window.screenY)
      return window.screenY;
      
    return 0;
  }


})(jQuery);
