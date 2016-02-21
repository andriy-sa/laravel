$(document).ready(function(){
   $('body').on('click','#ShowMessageModal',function(){
      var photo = $(this).prev().val();
      var name = $(this).prev().prev().val();
      var id = $(this).prev().prev().prev().val();

       $('#MessageModal #Mphoto').attr('src',photo);
       $('#MessageModal #Mname').html(name);
       $('#MessageModal #Mto').val(id);

       $('#MessageModal').modal('show');
   });

    $('#a1-baner,#b1-baner,#b2-baner').slick({
        infinite: true,
        fade: true,
        accessibility: false,
        autoplay: true,
        arrows:false,
        draggable: false,
        pauseOnHover: false,
        swipe: false,
        touchMove: false,
        autoplaySpeed: 5000,
    });
});