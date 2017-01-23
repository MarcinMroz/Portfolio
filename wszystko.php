<?php
require 'Odebrane.php';
?>

<div class="container-fluid">


    <div class="row">
        <div class="col-sm-2 menu">

            <ol>
                <li class ="dodaj"><a href="#" data-toggle="modal" data-target="#createNote" class = "dodaj" style = "text-decoration:none;">Dodaj</a></li>
                <li style = "border-top-width: 20px" onclick="loadNotes('0'); ">Odebrane</li>
                <li onclick="loadNotes('1'); ">Ulubione</li>
                <li onclick="loadNotes('2'); ">Kosz</li>
                <li class ="dodaj" style = "border-top-width: 20px"><a class ="dodaj" href="#" data-toggle="modal" data-target="#addFriend">Znajomi</a></li>
            </ol>

            
        </div>

        <div class="col-sm-8 content">     
            <div id = "NotesTable" class="container" style = "margin-right: 0px">



                <ul class="nav nav-tabs" style = "background-clip: padding-box; border: none;">
                    <li class="active button" ><a class="button" data-toggle="tab" href="#home">Wszystko</a></li>
                    <li><a class="button" data-toggle="tab" href="#menu1">Zakupy</a></li>
                    <li><a class="button" data-toggle="tab" href="#menu2">Notatki</a></li>
                </ul>



                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                    </div>
                    <div id="menu1" class="tab-pane fade">
                    </div>
                    <div id="menu2" class="tab-pane fade">
                    </div>
                    <div id="menu3" class="tab-pane fade">
                    </div>
                </div>
            </div>



        </div>
        
        <div class="col-sm-2 content" style = "border-width:0 0 0 0; ">
            <div id="friendsBox" class="text-center">
                <img src="drag.png" style ="width: 100%; height: auto;"</img>
            <?php
            require 'friendsView.php';
            ?>
            </div>
        </div>

    </div>


    <script>
        function PokazUlubione() {
            $("#NotesTable").load("NoteContainer.php");
        }
    </script>

    <div class="row">
        <div id="friendsBox" class="container-fluid text-center">

        </div>  
    </div>   
</div>

