jQuery(function(){
  var overlay = jQuery('<div id="overlay"></div>');
  jQuery('.close').click(function(){
  jQuery('.popup').hide();
  overlay.appendTo(document.body).remove();
  return false;
  });
jQuery('.x').click(function(){
  jQuery('.popup').hide();
  overlay.appendTo(document.body).remove();
  return false;
  });
  
  jQuery('.click').click(function(){
  overlay.show();
  overlay.appendTo(document.body);
  jQuery('.popup').show();
  return false;
  });
  });