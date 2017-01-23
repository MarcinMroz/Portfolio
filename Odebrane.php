<script>
function likeUnlike(form) {

var likeOrUnlike = ($(form).find('span').css('color')=="rgb(255, 0, 0)") ? 'nie' : '';

$.post( likeOrUnlike+"ulubione.php", { noteId: $(form).find('input[name="noteId"]').val()} );
if(likeOrUnlike=='nie') {
		$(form).find('span').css('color', '');
	}
	else
	$(form).find('span').css('color', 'red');
}
function allowDrop(ev) {
    ev.preventDefault();
	var data = ev.dataTransfer.getData("text");
	console.log(ev.dataTransfer.getData("text").length);
	
		$('.friend').css('border', '0');
		$('.friend').find('i').css('border', '0');
		$(ev.target).css('border', '3px solid white');
		
}

function drag(ev) {

$('.friend').css('border', '0');
    ev.dataTransfer.setData("text", $(ev.target).attr('noteid'));
	//console.log(ev.dataTransfer.getData("text"));
}
function dragLeave(event){
$('.friend').css('border', '0');
$(ev.target).css('border', '0');
}

function drop(ev) {
    ev.preventDefault();
	
	$('.friend').css('border', '0');
    var data = ev.dataTransfer.getData("text");
	if(!isNaN(data)) {
	var nazwa_kontaktu = $(ev.target).html();
	$(ev.target).html('<span class="sendNoteInform">Wysłano -> '+nazwa_kontaktu+'</span>');
	
	setTimeout(function() { $('.sendNoteInform').fadeOut(1000).remove(); $(ev.target).html(nazwa_kontaktu); }, 1000);
	$.get('wysylanie.php', { id: data, receiver: $(ev.target).attr('userid'), mode: 'ajaxSendNote'});
	}
}
function acceptInvite(autor, id_zaproszenia){
    $.post('friendsAccept.php', { autor: autor, noteId: id_zaproszenia, mode: 'addFriendship'});
 location.reload();
}
  function loadNotes(label) {
$("#home").empty();
$("#menu1").empty();
$("#menu2").empty();
   jQuery.getJSON('notatki.php?label='+label, function( data ) {
 $.each( data, function( key, val ) {
     
             if(val.type===1)
             {
                 var typ = '<i class = "icon-quote-right"></i>'; 
				 var div_id = '#menu2';
                    var content= val.content;
                    var button = 'draggable="true"';
             }
             else if(val.type===0)
             {
                 var typ = '<i class = "icon-basket"></i>';
				 var div_id = '#menu1';
				var content= val.content;
                                var button = 'draggable="true"';
             }
             else if(val.type===2)
             {
                 var typ = '<i class = "icon-user-plus"></i>';
                 var content= val.content + '<button class="btn btn-default acceptFriend" style="display:block;" onclick="acceptInvite('+val.autor+', '+val.id+');return false;">Zaakceptuj</button>';
                 var button = 'draggable="false"';
             }
            var kolor = (val.label===1) ? 'red' : '';
       
            if(val.owner === val.autor) val.autor = "";
            else val.autor = "Od: "+val.NazwaAutora;
            
            
             $("#home").append('<table class = "note" id = "tabela-'+val.id+'" style="font-size:18px; background-color:#fff;margin: 10px 0;border-radius:5px"><tr style="cursor:pointer;" class="rozwin">'+
                        '<td style = "width:5%; font-size:20px; color: #247BA0">'+typ+'</td>'+
                        '<td style = "width:50%;">'+val.title+'</td>'+
                        '<td style = "width:20%;">'+val.autor+'</td>'+
                        '<td style = "width:20%; font-size: 14px;">'+val.data+'</td>'+
                        '<td style = "text-float:right; padding: 0 10px 0 0;"><p><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-chevron-down"></span></button></p></td>'+
                    '</tr>'+
                    '<tr class="noteContent" style="margin-top:5px;display:none;"><td style="font-size:14px; background-color:#eee; border-radius:5px; padding: 15px;" colspan="5">'+content+'</td></tr>'+            
                    '<tr>'+
                         '<td colspan = "5" style = "width:3%; font-size:15px; background-color:#eee; text-align: right">'+
                         '<form action="usun.php" method="post" style = "display: inline-block;">   <input type = "hidden" id = "noteId" name = "noteId" value = "'+val.id+'"><button type="submit" name="name" title = "usuń" value="value" class="btn-link"><span class="glyphicon glyphicon-trash"></span></button></input></form>'+
                         '&nbsp; &nbsp; <form action="#" method="post"  style = "display: inline-block;" onsubmit="likeUnlike(this);return false;"><input type = "hidden" id = "noteId" name = "noteId" value = "'+val.id+'"><button type="submit" name="name" title = "dodaj do ulubionych" value="value" class="btn-link"><span class="glyphicon glyphicon-heart" style = "color:'+kolor+'"></span></button></form>'+
                         '&nbsp; &nbsp; <form action="your_url" method="post"  style = "display: inline-block;"><button '+button+' noteid="'+val.id+'" ondragstart="drag(event)" type="button" name="name" title = "wyślij" value="value" data-toggle="modal" data-target="#sendNote" class="btn-link" onclick="setUserId('+val.id+')"><span class="glyphicon glyphicon-send"></span></button></form>'+'</td></tr>'+
                '</table>');


            //if(val.type===0)
            // {
                  $(div_id).append('<table class = "note" id = "tabela-'+val.id+'" style="font-size:18px; background-color:#fff;margin: 10px 0;border-radius:5px"><tr style="cursor:pointer;" class="rozwin">'+
                        '<td style = "width:5%; font-size:20px; color: #247BA0">'+typ+'</td>'+
                        '<td style = "width:50%;">'+val.title+'</td>'+
                        '<td style = "width:20%;">'+val.autor+'</td>'+
                        '<td style = "width:20%; font-size: 14px;">'+val.data+'</td>'+
                        '<td style = "text-float:right; padding: 0 10px 0 0;"><p><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-chevron-down"></span></button></p></td>'+
                    '</tr>'+
                    '<tr class="noteContent" style="margin-top:5px;display:none;"><td style="font-size:14px; background-color:#eee; border-radius:5px; padding: 15px;" colspan="5">'+content+'</td></tr>'+            
                    '<tr>'+
                         '<td colspan = "5" style = "width:3%; font-size:15px; background-color:#eee; text-align: right">'+
                         '<form action="usun.php" method="post" style = "display: inline-block;">   <input type = "hidden" id = "noteId" name = "noteId" value = "'+val.id+'"><button type="submit" name="name" title = "usuń" value="value" class="btn-link"><span class="glyphicon glyphicon-trash"></span></button></input></form>'+
                         '&nbsp; &nbsp; <form action="#" method="post"  style = "display: inline-block;" onsubmit="likeUnlike(this);return false;"><input type = "hidden" id = "noteId" name = "noteId" value = "'+val.id+'"><button type="submit" name="name" title = "dodaj do ulubionych" value="value" class="btn-link"><span class="glyphicon glyphicon-heart" style = "color:'+kolor+'"></span></button></form>'+
                         '&nbsp; &nbsp; <form action="your_url" method="post"  style = "display: inline-block;"><button draggable="true" noteid="'+val.id+'" ondragstart="drag(event)" type="button" name="name" title = "wyślij" value="value" data-toggle="modal" data-target="#sendNote" class="btn-link" onclick="setUserId('+val.id+')"><span class="glyphicon glyphicon-send"></span></button></form>'+'</td></tr>'+
                '</table>');
            // }
            // else if (val.type===1)
            // {
                /* $("#menu2").append('<table class = "note" id = "tabela-'+val.id+'" style="font-size:18px; background-color:#fff;margin: 10px 0;border-radius:5px"><tr style="cursor:pointer;" class="rozwin">'+
                        '<td style = "width:5%; font-size:20px; color: #247BA0">'+typ+'</td>'+
                        '<td style = "width:50%;">'+val.title+'</td>'+
                        '<td style = "width:20%;">'+val.autor+'</td>'+
                        '<td style = "width:20%; font-size: 14px;">'+val.data+'</td>'+
                        '<td style = "text-float:right; padding: 0 10px 0 0;"><p><button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-chevron-down"></span></button></p></td>'+
                    '</tr>'+
                    '<tr class="noteContent" style="margin-top:5px;display:none;"><td style="font-size:14px; background-color:#eee; border-radius:5px; padding: 15px;" colspan="5">'+val.content+'</td></tr>'+            
                    '<tr>'+
                         '<td colspan = "5" style = "width:3%; font-size:15px; background-color:#eee; text-align: right">'+
                         '<form action="usun.php" method="post" style = "display: inline-block;">   <input type = "hidden" id = "noteId" name = "noteId" value = "'+val.id+'"><button type="submit" name="name" title = "usuń" value="value" class="btn-link"><span class="glyphicon glyphicon-trash"></span></button></input></form>'+
                         '&nbsp; &nbsp; <form action="'+ulubione+'" method="post"  style = "display: inline-block;"><input type = "hidden" id = "noteId" name = "noteId" value = "'+val.id+'"><button type="submit" name="name" title = "dodaj do ulubionych" value="value" class="btn-link"><span class="glyphicon glyphicon-heart" style = "color:'+kolor+'"></span></button></form>'+
                         '&nbsp; &nbsp; <form action="your_url" method="post"  style = "display: inline-block;"><button draggable="true" type="button" name="name" title = "wyślij" value="value" data-toggle="modal" data-target="#sendNote" class="btn-link" onclick="setUserId('+val.id+')"><span class="glyphicon glyphicon-send"></span></button></form>'+'</td></tr>'+
                '</table>');
             }*/
      
 });
   });
   }
   function rozwin() {
        $(this).parent().find('.noteContent').show();
        $("#NotesTable").off('click', '.rozwin', rozwin);
        $("#NotesTable").on('click', '.rozwin', zwin);
    }
    function zwin() {
         $(this).parent().find('.noteContent').hide();
         $("#NotesTable").on('click', '.rozwin', rozwin);
    }
$(document).ready(function(){
    $("#NotesTable").on('click', '.rozwin', rozwin);
   loadNotes('0'); 
});
</script>