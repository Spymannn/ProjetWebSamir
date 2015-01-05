<script type="text/javascript">
    //<![CDATA[

    function valider(){
      if(document.form_auth.login.value ==""){
          alert("Login manquant !");
          return false;
      }
      else if(document.form_auth.password.value =="" ) {
          alert("Mot de passe manquant !");
          return false;
      }
      else if(document.form_auth.password.value =="" && document.form_auth.login.value ==""){
          alert("Mot de passe et login manquant !");
          return false;
      }
      else {
        return true;
      }
    }

    //]]>
    </script>
<?php
if(isset($_POST['submit_login'])) {
    $mg = new UserManager($db);
    $retour=$mg->isUser($_POST['login'],md5($_POST['password']));
    if($retour==1) {
        $user = $mg->getUser($_POST['login']);
        $_SESSION['user']=$user[0]->iduser;
        $message="Authentifié!".$user[0]->pseudouser;
        print $client[0]->pseudouser;
        /*ici on fait redirection*/
        header('Location: http://localhost/MovieShow/index.php?page=accueil');
    } 
    else {
        $message="Données incorrectes";
    }
}
?>

<section id="logage">
<fieldset id="fieldset_login">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" onsubmit="return valider()"method='post' id="form_auth" name="form_auth">
        <table>
            <tr>
                <td>Login</td>
                <td><input type="text" id="login" name="login" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="password" name="password" /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit_login" id="submit_login" value="Login"  class="btn btn-default"/>
                    <input type="reset" id="annuler" value="Annuler" class="btn btn-default"/>
                </td>	
            </tr>
        </table>	
    </form>
</fieldset>
</section>
<div id="shadow" class="popup"></div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="margin:0 auto; ">
  Informations
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="text-align:center;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Informations</h4>
      </div>
      <div class="modal-body">
        Si vous avez un compte, vous pouvez vous y connecter afin de rajouter dans vos favoris
        les films que vous aimez le plus.
        Si vous n'avez pas de compte, inscrivez-vous vite !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary">S'inscrire</button>
      </div>
    </div>
  </div>
</div>
