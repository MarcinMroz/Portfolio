<script>
$(document).ready(function(){
   jQuery.getJSON('friends.php', function( data ) {
 $.each( data, function( key, val ) {
     
     
     
     $("#friendsBox").append('<li>'+val.user+'</li>');
     $("#dd").append(val.user+'<br>');
 });
   });
});
</script>