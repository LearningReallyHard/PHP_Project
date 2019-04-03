<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
 $(() => {
    $('.unactive_options').click(function(){
      $(this).hide();
      $('.active_options').toggle(1000);
    });

    $('.active_options').click(function(){
      $(this).hide();
      $('.unactive_options').toggle();
    });

   $('.active_options').find('input[type=radio]').click(function(e){
     e.stopPropagation();
   }).end().find('label').click(function(e){
     e.stopPropagation();
   });

   $('#prev').click(function(){
     let url = new URL(location.href);
     let current = (url.searchParams.get('current')*1 || 1);
     let start = (url.searchParams.get('start')*1 || 0);
     let end = (url.searchParams.get('end')*1 || 10);
     let classification = url.searchParams.get('classification');
     let value = url.searchParams.get('value');
     let s = start , e = end;

     if(current == 1) return alert('No Page');
     if(current % 10 == 1){
       s = start - 10;
       e = end - 10;
     }
     current -= 1;
     location.href = `./index.php?start=${s}&end=${e}&current=${current}&classification=${classification}&value=${value}`;
   })

   $('#next').click(function(){
     let lastPage = $(this).attr('lastPage');
     let url = new URL(location.href);
     let current = (url.searchParams.get('current')*1 || 1);
     let start = (url.searchParams.get('start')*1 || 0);
     let end = (url.searchParams.get('end')*1 || 10);
     let classification = url.searchParams.get('classification');
     let value = url.searchParams.get('value');
     let s = start , e = end;

     if(current == lastPage) return alert('No Page');
     if(current % 10 == 0 ){
       s = start + 10;
       e = end + 10;
     }
     current += 1;
     location.href = `./index.php?start=${s}&end=${e}&current=${current}&classification=${classification}&value=${value}`;
   })

   $('#classification_form').submit(function(e){
     e.preventDefault();
     let classification = $('[name=classification]').val();
     let value = $('#classification_form').find('[name=value]').val();
     location.href = `./index.php?start=0&end=10&current=1&classification=${classification}&value=${value}`;
   })

   $('#delete_post').click(function(){
     $('#delete_post_form').trigger('submit');
   })

   $('#update_post').click(function(){
     $('.make_book form').attr('action','./php/update.php');
     $('.write li:nth-child(1) p').text('글수정');
     $('.make_book input[name=title]').val($('.read_book .title').text());
     $('.make_book textarea[name=description]').val($.trim($('.read_book .description').text()));
     $('.make_book button').text('글수정');
   })
 })
</script>
