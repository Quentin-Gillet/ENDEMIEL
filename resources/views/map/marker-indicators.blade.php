{{--    Gestion des notification a success en vert    --}}
@if ($message = Session::get('success'))
   <div class="border_message">
        <span class="icon_success"><i class="fas fa-check-circle"></i></span>
        <div class="title_bar"><span class="title_2">Terminé !</span></div>
        <div class="message_success">
            {{ $message }}
        </div>
        <div class="close">
            <span title="Fermer" class="iconQuit" onclick="icon_close()"><i class="fas fa-times-circle"></i></span>
        </div>
   </div>
   <script>
       function icon_close() {
           document.querySelector(".border_message").style.display="none";
       }

       setTimeout(function (){
            document.querySelector(".icon_success").style.opacity = "0%";
            document.querySelector(".message_success").style.opacity = "100%";
            setTimeout(function() {
                document.querySelector(".close").style.opacity = "100%";
                document.querySelector(".close").style.cursor = "pointer";
            },500);
    }, 1500)
   </script>

@endif

{{--    Gestion des notifications avec erreurs en rouge    --}}
@if($errors->any())
    <div class="border_message">
        <span class="icon_error"><i class="fas fa-window-close"></i></span>
        <div class="title_bar"><span class="title_2">Erreur !</span></div>
        <div class="message_success">
            <li class="message_li">{{ $errors->first() }}</li>
        </div>
        <div class="close">
            <span title="Fermer" class="iconQuit" onclick="icon_close()"><i class="fas fa-times-circle"></i></span>
        </div>
    </div>
    <script>
        function icon_close() {
            document.querySelector(".border_message").style.display="none";
        }

        setTimeout(function (){
            document.querySelector(".icon_error").style.opacity = "0%";
            document.querySelector(".message_success").style.opacity = "100%";
            setTimeout(function() {
                document.querySelector(".close").style.opacity = "100%";
                document.querySelector(".close").style.cursor = "pointer";
            },500);

        }, 1500);
    </script>
@endif
