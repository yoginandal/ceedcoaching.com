document.addEventListener("DOMContentLoaded", function () {
    var splide = new Splide(".splide", {
      perPage: 2,
      type: 'loop',
      autoplay: true,
      pagination: false,
      arrows: false,
      gap: "5rem",
  
      breakpoints: {
        991: {
          perPage: 1,
          gap: ".7rem",
         
        },
        480: {
          perPage: 1,
          gap: ".7rem",
        
        },
      },
    });
  
    splide.mount();})

