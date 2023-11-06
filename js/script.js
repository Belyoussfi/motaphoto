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


// // LIGHTBOX
//   class Lightbox {
    
//     static init() {
//        const links = document.querySelectorAll('a[href$=".png"], a[href$=".jpg"], a[href$=".jpeg"]')
//       .forEach(link => link.addEventListener('click', e => {
//         e.preventDefault()
//          new Lightbox(e.currentTarget.getAttribute('href')) 
// 		 console.log(links);
//       }))
//    }


//     constructor (url) {
//       const element = this.buildDom(url)
//       document.body.appendChild(element)
//     }



//     buildDom (url) {
//       const dom = document.createElement('div')
//       dom.classList.add('lightbox')
//       dom.innerHTML = `<button class="lightbox_close">X</button>
//        <button class="lightbox_next"></button>
//        <button class="lightbox_prev"></button>
//        <div class="lightbox_container">
//          <img src="<?php echo get_template_directory_uri(); ?>/img/Header.png">
//        </div>`
//        return dom
//     }
//   }
 
//   Lightbox.init();
  
  


// BTN LIGHTBOX_CLOSE MODAL
  jQuery(function(){
      var box = jQuery('<div id="box"></div>');
    jQuery('.lightbox_close').click(function(){
      jQuery('.lightbox').hide("slow");
    return false;
 });

jQuery('.ecran').click(function(){
      box.show();
        box.appendTo(document.body);
        jQuery('.lightbox').show("slow");
      return false;
    });
  });





