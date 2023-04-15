<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="shortcut icon" href="assets/login.png">
    <link rel="stylesheet" href="login.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script><script  src="./login.js"></script>

</head>
<body>
    <div class="cotn_principal">
            <div class="cont_login">
                <div class="cont_info_log_sign_up">
                  <div class="col_md_login">
                     <div class="cont_ba_opcitiy">
                          <h2>HOME</h2>  
                          <p>Para entrar no sistema é preciso da sua conta, usuário e senha foram enviados a seu email.</p> 
                          <button class="btn_login" onclick="cambiar_login()" style="color: white;">LOGIN</button>
                      </div>
                    </div>
                  </div>
                  <div class="cont_back_info">
                  <div class="cont_img_back_grey">
                  </div>
                </div>
                  <div class="cont_forms" >
                    <div class="cont_img_back_">
                    </div>
                    <div class="cont_form_login" style="display: none; opacity: 0;">
                      <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                      <img src="assets/avatar.png" alt="perfil">
                      <input id="i1" type="text" placeholder="Username"/>
                      <input id="i2" type="password" placeholder="Password"/>
                      <a id="butao" href="http://localhost/youvacinas/index.php"><button class="btn_login" onclick="cambiar_login() ">LOGIN</button></a>
                    </div>
                      <div class="cont_form_sign_up" style="display: none; opacity: 0;">
                        <a href="#" onclick="ocultar_login_sign_up()"></a>
                      </div>
                </div>
            </div>
    </div>
</body>
</html>