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

// NAV IMG SINGLE PAGE PREV AND NEXT  
jQuery(document).ready(function(){
  jQuery('.left-arrow').hover(function(){
    jQuery('.wpb-posts-nav__prev').show();
    jQuery('.wpb-posts-nav__next').hide();
  });
});
  

jQuery(document).ready(function(){
  jQuery('.right-arrow').hover(function(){
    jQuery('.wpb-posts-nav__next').show();
    jQuery('.wpb-posts-nav__prev').hide();
  });
});

// REF INSIDE FORM CONTACT
jQuery(document).ready(function(){
var refValue = document.querySelector('.reference').textContent;
var refField = document.querySelector('.ref-field');
refField.setAttribute('value', refValue);
});  


function lightboxInit() {
// BTN LIGHTBOX_CLOSE MODAL
jQuery(function(){
  var box = jQuery('<div id="box"></div>');
  jQuery('.lightbox_close').click(function() {
      jQuery('.lightbox').hide("slow");
      return false;
  });

  


// DISPLAY IMAGES LIGHTBOX
jQuery('.ecran' ).click(function(event){   

  var ecran = jQuery(this); 

  // RECUPERATION IMAGE CLIQUEE
  var parentImg = ecran.parents('.cxc-inner-wrapper');
  var thumbnailContainer = parentImg.find('.thumbnail-container');
  var imgSrcLightbox = thumbnailContainer.attr('data-full-screen-image');
  // INSERTION DE L'IMG DANS LA LIGHTBOX
  lightboxImg = jQuery('#lightbox-img');
  lightboxImg.attr('src', imgSrcLightbox );

  // TABLEAU DE TOUTES LES IMG
  var allImg = jQuery(".thumbnail-container img").toArray();
  //RECUPERE POSITION IMG CLIQUE
  var imgClickedPosition = parentImg.index('.cxc-inner-wrapper');
  var currentImgIndex = imgClickedPosition;
 
  // FUNCTION PREV IMG
  var prevImg = null;
  var prevImgContainer = null;
  var prevImgClicked = null;
  var displayPrevImg = null;

  function prevImg_init() {
    prevImg = allImg[currentImgIndex-1];
    prevImgContainer = jQuery(prevImg).parent();
    prevImgClicked = prevImgContainer.attr('data-full-screen-image');
    displayPrevImg = jQuery('#lightbox-img');
  }
  prevImg_init();

  // FUNCTION NEXT IMG
  var nextImg = null;
  var nextImgContainer = null;
  var nextImgClicked = null;
  var displayNextImg = null;

  function nextImg_init() {
    nextImg = allImg[currentImgIndex+1];
    nextImgContainer = jQuery(nextImg).parent();
    nextImgClicked = nextImgContainer.attr('data-full-screen-image');
    displayNextImg = jQuery('#lightbox-img');
 }
 nextImg_init();

  // DISPLAY NEXT IMG
  jQuery('.lightbox_next').on("click", function() {
    nextImg_init();
    displayNextImg.attr('src', nextImgClicked)
    currentImgIndex++;
     
  });

  // DISPLAY PREV IMG
  jQuery('.lightbox_prev').on("click", function() {
    prevImg_init();
    displayPrevImg.attr('src', prevImgClicked);
    currentImgIndex--;
  });

  
  // DISPLAY LIGHTBOX  
  box.show();
  box.appendTo(document.body);
    jQuery('.lightbox').show();
    return false; 

  });
 
});

}
lightboxInit();

// HAMBURGER MENU

jQuery(document).ready(function(){
  jQuery('#nav-icon').click(function(){
    jQuery('.menu-header-menu-container').fadeToggle();
    jQuery('#nav-icon').toggleClass('open');
   });
  });   


