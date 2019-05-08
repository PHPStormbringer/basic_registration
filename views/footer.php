<script>
$(document).ready(function(e) {
   showViewportSize();    
});
$(window).resize(function(e) {
   showViewportSize();
});
function showViewportSize() {
   var the_width = $(window).width();
   var the_height = $(window).height();                   
   $('#width').text(the_width+'px');
   $('#height').text(the_height+'px');
}
</script>
Viewport Width:&nbsp;&nbsp;<span id="width">Resize to find out!</span><br />
Viewport Height:&nbsp;&nbsp;<span id="height">Resize to find out!</span>

</body>
</html>