<script>
$(document).ready(function(){
   jQuery.getJSON('friends.php', function( data ) {
 $.each( data, function( key, val ) {
 
     $("#friendsBox").append('<div userid="'+val.id+'" class = "friend" ondragleave="dragLeave(event)" ondrop="drop(event)" ondragover="allowDrop(event)" style = "padding-left:10%; text-float:left;"><i class = "icon-user" style = "border:none"></i>'+val.user+'</div>');      
 });
   });
});
</script>