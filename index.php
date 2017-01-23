<?php
session_start();
require_once 'header.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <nav class="navbar navbar-inverse navbar-default navbar-fixed-top">
        <div class="container-fluid" style = "padding: 0 15px 0 15px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><i class = "icon-feather"></i>Notatki</a>
            </div>
            <ul class="nav navbar-nav navbar-right">

                <?php
                if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
                    require_once 'logout.php';
                } else {
                    require 'login.php';
                }
                ?>

            </ul>
        </div>
    </nav>
    <?php
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) 
        {
            require_once 'wszystko.php';
        } 
        else
        {
            require_once 'main.php';
        }
    ?>
</body>


<!-- login -->
<div class="modal fade loginmod" id="login" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="logowanie.php" method="post">
                    <div class="form-group">
                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Login</label>
                        <input type="text" class="form-control" id="login" name ="login" placeholder="Wprowadź email">
                    </div>
                    <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Hasło</label>
                        <input type="password" class="form-control" id="haslo" name ="haslo" placeholder="Wprowadź hasło">
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="" checked>Zapamiętaj mnie</label>
                    </div>
                    <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>
                <p>Nie masz konta? <a href="#" data-toggle="modal" data-target="#register">Zarejestruj się</a></p>
                <p>Zapomniałeś <a href="#">Hasła?</a></p>
            </div>
        </div>
    </div>
</div> 

<!-- register -->
<div class="modal fade loginmod" id="register" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Rejestracja</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="rejestrowanie.php" method="post">


                    <div class="form-group">
                        <label for="usrnameReg"><span class="glyphicon glyphicon-user"></span> Login</label>
                        <input type="text" class="form-control" id="usrnameReg" name="usrnameReg" placeholder="Wprowadź swój login">
                        <div id ="RegLogin" class = "error"></div>
                    </div>
                    <div class="form-group">
                        <label for="emailReg"><span class="glyphicon glyphicon-user"></span> E-mail</label>
                        <input type="text" class="form-control" id="emailReg" name="emailReg" placeholder="Wpisz swój E-mail">
                        <div id ="RegEmail" class = "error"></div>
                    </div>
                    <div class="form-group">
                        <label for="pswReg"><span class="glyphicon glyphicon-eye-open"></span> Hasło</label>
                        <input type="text" class="form-control" id="pswReg" name="pswReg" placeholder="Wpisz hasło">
                        <div id ="RegPass" class = "error"></div>
                    </div>
                    <div class="form-group">
                        <label for="repswReg"><span class="glyphicon glyphicon-user"></span> Powtórz hasło</label>
                        <input type="text" class="form-control" id="repswReg" placeholder="Powtórz hasło">
                        <div id ="RegPass2" class = "error"></div>
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LcprRIUAAAAAAmqlJIG00HhUr-Q5x8Iue6p_e8k"></div>
                    <br>
                    
                    <button type="button" class="btn btn-default btn-success btn-block" id="regSubmit" ><span class="glyphicon glyphicon-off"></span> Zarejestruj</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>

            </div>
        </div>
    </div>
</div>

<!-- add -->
<div class="modal fade loginmod" id="createNote" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span style = "font-size: 30px">&#9998;</span>  Utwórz</h4>
            </div>
            <div class="modal-body">
                <form role="form"  action="dodaj.php" method="post">

                    <p id="type" onclick="dodaj()">notatki<p>

                        <input type="hidden" name="Itype" id ="Itype" value="">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name ="title" placeholder="Tytuł" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="text" name ="text" style ="min-height: 100px; text-align: left " placeholder="Wpisz notatkę" autocomplete="off"></textarea>
                    </div>

                    <button id="dodaj" type="submit" class="btn btn-default btn-success btn-block"><span class="">&#10004;</span> Dodaj</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>

            </div>
        </div>
    </div>
</div>

<!-- send -->
<div class="modal fade loginmod" id="sendNote" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span style = "font-size: 30px">&#9998;</span>  Wyślij</h4>
            </div>
            <div class="modal-body">
                <form role="form"  action="wysylanie.php" method="post">

                    <input type="hidden" name="receiver" id ="receiver" value="">
                    <input type="hidden" name="noteIdSend" id ="noteIdSend" value="">
                    
                    <div class="form-group">
                      <div class="dropdown selectUser">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="userLabel">Wybierz znajomego...</span>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                        </ul>
                      </div>
                    </div>

                    <button id="dodaj" type="submit" class="btn btn-default btn-success btn-block"><span class="">&#10004;</span> Wyślij</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>

            </div>
        </div>
    </div>

</div>

<div class="modal fade loginmod" id="addFriend" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span style = "font-size: 30px">&#9998;</span>  Wyszukaj znajomego</h4>
            </div>
            <div class="modal-body">
                <form role="form"  action="dodaj.php" method="post">

                   

                        <input type="hidden" name="Itype" id ="Itype" value="">
                    <div class="form-group">
                        <input type="text" class="form-control" style="float:left;margin-right:5px;width:80%" id="email" name ="email" placeholder="E-mail" autocomplete="off"><button id="szukaj" type="button" class="btn btn-default btn-success "><span class="">&#10004;</span> Szukaj</button>
                    </div>
                    <div class="form-group">
                        <p id="result"></p>
                       
                    </div>

                    <button id="AddFriend" type="button" class="btn btn-default btn-success btn-block AddFriend" disabled="disabled"><span class="">&#10004;</span> Wyślij zaproszenie</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Zamknij</button>

            </div>
        </div>
    </div>
</div>


<script>
        $(document).ready(function () {
            function isEmail(email) {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return regex.test(email);
            }
            
            $("#regSubmit").click(function() {
                var error = false;
                 $('#RegLogin').empty();
                 $('#RegEmail').empty();
                 $('#RegPass').empty();
                 $('#RegPass2').empty();
                if($('#usrnameReg').val().length<3 || $('#usrnameReg').val().length>20)
                {
                    $('#RegLogin').html('Login musi posiadać od 3 do 20 znaków!');
                    error = true;
                }
                if(!isEmail($('#emailReg').val()))
                {
                    $('#RegEmail').html('E-mail jest nieprawidłowy');
                     error = true;
                }
                if($("#pswReg").val().length<8 || $("#pswReg").val().length>30 )
                {
                    $('#RegPass').html('Hasło musi miec od 8 do 30 znaków.');
                     error = true;
                    
                }
                if($("#repswReg").val()!=$("#pswReg").val())
                {
                    $('#RegPass2').html('Hasła muszą być takie same');
                     error = true;
                }
                $.post( "ValidateRegister.php", { user: $('#usrnameReg').val(), email: $('#emailReg').val() })
                    .done(function( data ) {
                      if(data[0].email==1 ){
                      $('#RegEmail').html('E-mail już istnieje');
                        error = true;  
                          
                          
                      }
                      if(data[0].user==1 ){
                      $('#RegLogin').html('Użytkownik już istnieje');
                        error = true;  
                          
                          
                      }
                    });
                if(error===false){
                    $.post("rejestrowanie.php", {login: $('#usrnameReg').val(), email: $('#emailReg').val(), pass: $("#pswReg").val(), captcha: $("#g-recaptcha-response")});
                    $("#register .close").click();
                    var IndexCt=$('.row').find('p');
                    var oldCt = $(IndexCt).html();
                    $(IndexCt).html('<br> Twoje konto zostało założone. Zaloguj się.');
                   setTimeout(function() { $(IndexCt).fadeOut(1500);
                        setTimeout(function() { $(IndexCt).html(oldCt);
                    $(IndexCt).fadeIn(500); }, 1500); }, 1500);
                    return false;
            }
            });
            
              jQuery.getJSON('friends.php', function( data ) {
                $.each( data, function( key, val ) {
                    $(".dropdown").find('.dropdown-menu').append('<li><span style="display:none" class="userID">'+val.id+'</span><a href="#">'+val.user+' ['+val.email+']</a></li>');      
                });
                  });
            
            // Add smooth scrolling to all links in navbar + footer link
            $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function () {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });

            $(window).scroll(function () {
                $(".slideanim").each(function () {
                    var pos = $(this).offset().top;

                    var winTop = $(window).scrollTop();
                    if (pos < winTop + 600) {
                        $(this).addClass("slide");
                    }
                });
            });
        });
    $("#AddFriend").click(function() {
        var owner = $(".userid").html();
        
        if( $("#friendsBox").find('div[userid='+owner+']').length>0)
            alert('Ta osoba juz jest twoim znajomym');
        else {
            $.post('dodaj.php', { owner: owner, Itype: 'zaproszenie'});
            $("#AddFriend").after('<span class="invitationSent">Zaproszenie wysłane</span>');
            $("#AddFriend").attr('disabled', 'disabled');
            setTimeout(function() {$(".invitationSent").fadeOut(500).remove()}, 1000);
          
            
        }
    });
    $("#szukaj").click(function() {
       var i = false;
       $("#result").empty();
       
         jQuery.getJSON('friendsAdd.php?e='+$("#email").val(), function( data ) {
         $.each( data, function( key, val ) {
             i=true;
             
                    $("#result").html('<ul><li><span style="display:none" class="userid">'+val.id+'</span><a href="#">'+val.user+' ['+val.email+']</a></li></ul>');      
                    if(val.user !== '<?php echo (isset($_SESSION['user'])? $_SESSION['user'] : ''); ?>')
                    {
                        $("#AddFriend").removeAttr('disabled');
                        $("#AddFriend").removeClass('AddFriend');
                    }
                    
          });
    
       });
       if(i==false) { 
        $("#result").html('Nie znaleziono osoby o podanym adresie');
        $("#AddFriend").attr('disabled', 'disabled');
        if(!$("#AddFriend").hasClass('AddFriend'))
        {
            $("#AddFriend").addClass('AddFriend');
        }
       }
  
     // setTimeout(function() {console.log('2-'+new Date().getTime());}, 100);
  
        
    });
    $('.selectUser').on('click', 'a', function(event) {
        event.preventDefault();
        $('.userLabel').text($(this).text());     
        $("#receiver").val($(this).parent().find('.userID').text());
       // console.log(($(this).parent().find('.userID').html()));
    });
    function setUserId(noteId) { 
        $("#noteIdSend").val(noteId); 
    }
    $("#Itype").val($("#type").html());

    function dodaj() {
        if ($("#type").html() === 'zakupy')
            $("#type").html('notatki');
        else
            $("#type").html('zakupy');

        $("#Itype").val($("#type").html());
        var x = document.getElementById("Itype").value;

    }
</script>
</html>
