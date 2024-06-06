<?php
        require_once ("../../controller/admin/authentification.php"); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../Public/css/dist/style.css">
    <link rel="stylesheet" href="../Public/css/font-awesome-4.7.0/css/all.min.css">
    <link rel="stylesheet" href="../Public/css/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../Public/css/style.css">
    <link rel="stylesheet" href="../Public/css/login.css">
    <link rel="stylesheet" href="../Public/css/style-switcher.css">

    <link rel="stylesheet" href="../Public/css/theme/bleu.css" class="alternate-style" title="bleu" disabled>
    <link rel="stylesheet" href="../Public/css/theme/emit.css" class="alternate-style" title="emit" enable>
    <link rel="stylesheet" href="../Public/css/theme/orange.css" class="alternate-style" title="orange" disabled>
    <link rel="stylesheet" href="../Public/css/theme/rose.css" class="alternate-style" title="rose" disabled>
    <link rel="stylesheet" href="../Public/css/theme/rouge.css" class="alternate-style" title="rouge" disabled>
    <link rel="stylesheet" href="../Public/css/theme/vert.css" class="alternate-style" title="vert" disabled>


    <!-- app JS -->
    <script src="../Public/js/applogin.js" defer></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body class="logbody">
    <div class="h-full md:relative md:w-full md:min-h-screen overflow-hidden loginform ">
        <div class="absolute w-full h-full top-0 left-0 forms-container">
            <div
                class="absolute w-full w left-1/2 -translate-x-1/2 -translate-y-full md:top-1/2 md:left-3/4 md:-translate-x-1/2 md:-translate-y-1/2 md:w-1/2 md:grid md:grid-cols-1 signin-signup">
                <form action="" method="POST" class="flex items-center justify-center flex-col  sign-in-form">
                    <h2 class="text-4xl mb-3 title">Se connecter</h2>
                    <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                        <i class="text-center text-base pt-5 fa fa-user"></i>
                        <input type="text" placeholder="Nom d'utilisateur"
                            class="bg-transparent outline-none border-none font-semibold text-lg" name="nomuser">
                    </div>
                    <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                        <i class="text-center text-base pt-5 fa fa-envelope"></i>
                        <input type="email" placeholder="Email"
                            class="bg-transparent outline-none border-none font-semibold text-lg" name="mailuser">
                    </div>
                    <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                        <i class="text-center text-base  pt-5 fa fa-lock"></i>
                        <input type="password" placeholder="Mot de passe"
                            class="bg-transparent outline-none border-none font-semibold text-lg" name="mdpuser">
                    </div>
                    <button type="submit" value="login" name="connectbtn" class=" text-white rounded-xl p-5">
                        Se connecter
                    </button>
                </form>


                <form action="" class="flex items-center justify-center flex-col  sign-up-form">
                    <h2 class="text-4xl mb-3 title">S'enregistrer</h2>
                    <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                        <i class="text-center text-base pt-5 fa fa-user"></i>
                        <input type="text" placeholder="Nom d'utilisateur"
                            class="bg-transparent outline-none border-none font-semibold text-lg">
                    </div>
                    <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                        <i class="text-center text-base pt-5 fa fa-envelope"></i>
                        <input type="email" placeholder="Email"
                            class="bg-transparent outline-none border-none font-semibold text-lg">
                    </div>
                    <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                        <i class="text-center text-base  pt-5 fa fa-lock"></i>
                        <input type="password" placeholder="Mot de passe"
                            class="bg-transparent outline-none border-none font-semibold text-lg">
                    </div>
                    <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                        <i class="text-center text-base  pt-5 fa fa-lock"></i>
                        <input type="password" placeholder="Confirmer mot de passe"
                            class="bg-transparent outline-none border-none font-semibold text-lg">
                    </div>
                    <button type="submit" value="enregistrer" class="text-white rounded-xl p-4">
                        Se connecter
                    </button>
                </form>
            </div>
        </div>





























        <div class="absolute w-full h-full top-0 left-0 grid grid-cols-2  panels-container">
            <div
                class="flex flex-row items-center md:flex-col md:items-end justify-around md:text-center  panel left-panel">
                <div class="content">
                    <h3 class="font-semibold text-2xl">
                        Vous etes nouveau?
                    </h3>
                    <p class="text-sm py-2">
                        Ici a l'Emit tout commence a etre automatiser,
                        <br> rejoignez nous .
                    </p>

                    <button class="bg-transparent font-semibold text-sm p-4 signbtn"
                        id="signupbtn">s'enregistrer</button>
                </div>
                <img src="../Public/picture/svg/undraw_sign_up_n6im.svg" class=" w-52 md:w-full image" alt="">
            </div>

            <div
                class="flex flex-row items-center md:flex-col md:items-end justify-around md:text-center panel right-panel">
                <div class="ml-52 content">
                    <h3 class="font-semibold text-2xl">
                        Deja parmi nous?
                    </h3>
                    <p class="text-sm py-2">
                        reconnecter vous
                    </p>

                    <button class="bg-transparent  font-semibold text-sm p-4 signbtn" id="signinbtn">se
                        connecter</button>
                </div>
                <img src="../Public/picture/svg/undraw_sign_in_re_o58h.svg" class="w-52 md:w-full image" alt="">
            </div>
        </div>
    </div>







</body>

</html>