<div class="contenu_encyclo">
    <div class="zone_left">
        <div class="encyclo_slideshow"> 
            <img src="images/oakTree.jpg" alt="" /> 
            <img src="images/oakTree.jpg" alt="" />  
            <img src="images/oakTree.jpg" alt="" /> 
            <!-- end .encyclo_slideshow --></div>   
        <div class="comand_slide_show">
                <span class="btn_prev"></span>
                <span class="num_this_pic"></span>
                <span class="pic_bar">/</span>
                <span class="num_total_pic"></span>
                <span class="btn_next"></span>
        <!--end of comand_slide_show --></div>
        

    
    
    
    <!-- end .zone_img --></div>
    <div class="zone_right">
    	<h2 class="encyclo_tittle">Truffière</h2>
    <div class="container_scroll">
      <div class="container_fond">
        <div class="container_marg">
          <div class="content">       
        
        	<h3 class="encyclo_sousTitle">Le terrain d'un champignon rare au parfum unique</h3>
        <span class="encyclo_intro">Morbi sagittis aliquet leo id sagittis. Proin adipiscing viverra elit, et posuere nunc accumsan vel. Donec eu facilisis sapien. Cum sociis natoque penatibus et magnis montes, nascetur ridiculus mus. </span>
            <p>Etiam volutpat vehicula mauris, ac faucibus risus tincidunt sit amet. Nullam in augue tortor, sit amet pretium urna. Curabitur ut ligula libero. Nulla et odio dui. Maecenas scelerisque, tellus at ultrices auctor. </p>
            <!-- end .content --></div>
          <!-- end .container_marg --></div>
        
        <!-- end .customScrollBox container_fond--> </div>
      <div class="dragger_fond scroll-bar-wrap ui-widget-content">
   <div class="dragger_container">
    </div>
        <!--<div class="dragger"></div> -->
      </div>
      <!-- end .zone_text container_scroll--> </div>
    <!-- end .zone_right --></div>
  <!-- end .contenu_encyclo --></div>
  
  <script>
$(document).ready(function() {
  //scrollpane parts
  var scrollPane = $('.container_marg');
  var scrollContent = $('.content');


  //build slider
  var slide_handler = function(e, ui) {

    if (scrollContent.height() > scrollPane.height()) {
      scrollContent.css('margin-top', Math.round(((100 - ui.value) / 100) * (scrollPane.height() - scrollContent.height())) + 'px');
    }
    else {
      scrollContent.css('margin-top', 0);
    }
  };
  


scrollPane.mousewheel(function(event, delta) {
  var value = scrollbar.slider('option', 'value');

  if (delta > 0) { value += 10; }
  else if (delta < 0) { value -= 10; }

  // Ensure that its limited between 0 and 100
  value = Math.max(0, Math.min(100, value));
  scrollbar.slider('option', 'value', value);
  event.preventDefault();
}); 

  var scrollbar = $(".dragger_container").slider({
    orientation: "vertical",
    value: 100, // Sets the value to the top
    slide: slide_handler,
	change: slide_handler
  });
  
  
	scrollbar.find( ".ui-slider-handle" ).wrap( "<div class='ui-handle-helper-parent'></div>" ).parent(); 
  
}); 

</script>
