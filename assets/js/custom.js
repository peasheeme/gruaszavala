 /* --------------------- Tabs!!--------------*/

 $('.tabs').tabslet();

 /* --------------------- backstretch!!--------------*/

  /* --------------------- carousel --------------*/
  var owl = $('.owl-carousel');
		 owl.owlCarousel({
	    loop:true,
	    margin:10,
	    autoplay:true,
	    autoplayTimeout:2000,
	    autoplayHoverPause:true,
      responsiveClass:true,
      responsive : {
        1 : { items: 1,
              nav: true
        },
        600 : { items: 3 ,
                nav: false
        },
        1000 : { items:4,
            nav:true,
            loop:false
        }
      }
	   });
		$('.play').on('click',function(){
		    owl.trigger('play.owl.autoplay',[2000])
		})
		$('.stop').on('click',function(){
		    owl.trigger('stop.owl.autoplay')
		})
 /*$("#owl-gruas").owlCarousel({
   items:5,
            navigation: true,
            navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            slideSpeed : 300,
            paginationSpeed : 400,
            autoPlay: 5000,


        });*/


/* --------------------- Simple text rotator--------------*/
$(".rotate").textrotator({
            animation: "dissolve",
            separator: "|",
            speed: 3000
        });



        /*funciòn de la clase actve */
        $(function(){
            var botones = $('.tabs button');
            botones.click(function(){
                botones.removeClass('activo');
                $(this).addClass('activo');
            });
        });

