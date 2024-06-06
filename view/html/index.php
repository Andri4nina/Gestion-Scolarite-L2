<?php
     @session_start();
   if(!isset($_SESSION["username"])){
        header("Location: login.php");
        exit();
    }   
    
    require_once ("../../controller/admin/countall.php");
    require_once ("../../controller/admin/affichage.php");
    require_once ("../../controller/admin/suppression.php");
    require_once ("../../controller/admin/modification.php");
    require_once ("../../controller/admin/affichage.php");
    require_once ("../../controller/admin/inscription.php");
    /* require_once ("deconnexion.php"); */
    
/*     
    require_once ("../controller/admin/affichage.php");
  
    require_once ("../controller/admin/modif_etu.php");
    require_once ("../controller/admin/inscrit_etu.php");
    require_once ("../controller/admin/supprimer_etu.php"); */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../Public/css/dist/style.css">
    <link rel="stylesheet" href="../Public/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Public/css/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../Public/css/style.css">
    <link rel="stylesheet" href="../Public/css/style-switcher.css">
    <link rel="stylesheet" href="../public/css/popupstyle.css">

    <link rel="stylesheet" href="../Public/css/theme/bleu.css" class="alternate-style" title="bleu" disabled>
    <link rel="stylesheet" href="../Public/css/theme/emit.css" class="alternate-style" title="emit" enable>
    <link rel="stylesheet" href="../Public/css/theme/orange.css" class="alternate-style" title="orange" disabled>
    <link rel="stylesheet" href="../Public/css/theme/rose.css" class="alternate-style" title="rose" disabled>
    <link rel="stylesheet" href="../Public/css/theme/rouge.css" class="alternate-style" title="rouge" disabled>
    <link rel="stylesheet" href="../Public/css/theme/vert.css" class="alternate-style" title="vert" disabled>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="../Public/js/app.js" defer></script>
    <script src="../Public/js/scriptswitcher.js" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <nav class="sidebar">
            <header>
                <div class="py-2 imagelogo">
                    <span class="image">
                        <img src="../Public/picture/emit logo.jpg" alt="logo">
                    </span>
                    <div class="txtheader navtxt">
                        <span>
                            Emit
                        </span>
                        <span>
                            Scolarite
                        </span>
                    </div>
                </div>
                <div class="mt-5 menu_bar">
                    <div class="text-center mt-5 mb-5" onclick="searchbtn()">
                        <label for="" class="searchstyle"><input type="search" placeholder="..."> <i
                                class="fa fa-search"></i></label>
                    </div>
                    <div class="menu">
                        <ul class=" menulist">
                            <li class="nav_link  activemenu">
                                <a href="#tableaudebord">
                                    <i class="fa fa-dashboard"></i>
                                    <span class="navtxt">Tableau de bord</span>
                                </a>
                            </li>
                            <li class="nav_link">
                                <a href="#etudiant">
                                    <i class="fa fa-users"></i>
                                    <span class="navtxt">Étudiants</span>
                                </a>
                            </li>
                            <li class="nav_link">
                                <a href="#fraisscolarite">
                                    <i class="fa fa-money"></i>
                                    <span class="navtxt">Frais de scolarité</span>
                                </a>
                            </li>
                            <li class="nav_link">
                                <a href="#paiement">
                                    <i class="fa fa-credit-card"></i>
                                    <span class="navtxt">Paiements</span>
                                </a>
                            </li>
                            <!--      <li class="nav_link">
                                <a href="#professeur">
                                    <i class="fa fa-user"></i>
                                    <span class="navtxt">Professeurs</span>
                                </a>
                            </li> -->
                            <hr class="container">
                            <li class="pl-3 mode">
                                <button class="flex day-night"><i class="fa fa-moon"></i><span
                                        class="navtxt">Mode</span></button>

                            </li>
                            <li class="nav_pallette " id="menupallette">
                                <a href="#theme" onclick="showpallette()">
                                    <i class="fa fa-palette"></i>
                                    <span class="navtxt">Theme</span>
                                </a><br>

                                <div class="colors" id="activecolor">
                                    <span class="emit" onclick="activestyle('emit')"></span>
                                    <span class="bleu" onclick="activestyle('bleu')"></span>
                                    <span class="orange" onclick="activestyle('orange')"></span>
                                    <span class="rose" onclick="activestyle('rose')"></span>
                                    <span class="rouge" onclick="activestyle('rouge')"></span>
                                    <span class="vert" onclick="activestyle('vert')"></span>
                                </div>
                            </li>
                            <li class="nav_langue">
                                <a href="#parametre">
                                    <i class="fa fa-language"></i>
                                    <span class="navtxt">Langues</span>
                                </a>
                            </li>
                            <li class="nav_link">
                                <a href="#parametre">
                                    <i class="fa fa-cog"></i>
                                    <span class="navtxt">Parametres</span>
                                </a>
                            </li>
                            <hr>
                            <li class=' bottom_content'>
                                <a href="#deco" onclick="decopopup()" id="decobtn">
                                    <i class="fa fa-sign-out"></i><span class="navtxt">Deconnexion</span>
                                </a>
                            </li>
                        </ul>
                        <br><br><br>
                    </div>
                    <i class="cursor-pointer px-1 py-1 fa fa-angle-right navshower" onclick="navhideshow()"></i>
                </div>
            </header>
        </nav>

        <section class="mainbody" id="tableaudebord">
            <div class="grid my-0 mx-auto gap-7 tabcontent">
                <div>
                    <h2 class="titlesection text-3xl font-semibold">Tableau de bord</h2>
                    <div class="grid gap-60 insights">
                        <div class="soldes">
                            <i class="fa fa-group"></i>
                            <div class="flex items-center justify-between midlle">
                                <div class="left">
                                    <h3 class="text-white font-bold">SOLDE DE L'ECOLE D'INSCRIPTION </h3>
                                    <h2 class="text-white">
                                        <?php echo $solde?>
                                    </h2>
                                    <h4 class="text-red-600">
                                        <?php echo $solderest?>
                                    </h4>
                                </div>
                                <div class="progress">
                                    <div class="number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="countstudent">
                            <i class="fa fa-group"></i>
                            <div class="flex items-center justify-between midlle">
                                <div class="left">
                                    <h3 class="text-white font-bold">ETUDIANT</h3>
                                    <h2 class="text-white">
                                        <?php echo $nb_etudiants?>
                                    </h2>
                                </div>
                                <div class="progress">
                                    <div class="number">
                                    </div>
                                </div>
                            </div>
                            <small class="text-muted">dans les 24h</small>
                        </div>
                        <div class="countstudentpaye">
                            <i class="fa fa-group"></i>
                            <div class="flex items-center justify-between midlle">
                                <div class="left">
                                    <h3 class="text-white font-bold">ETUDIANT PAYEMENT TOTAL</h3>
                                    <h2 class="text-white">
                                        <?php echo $nb_etudiantspaye;?>
                                    </h2>

                                    <span class="hidden"> <?php echo $impayepourcent?></span>
                                </div>
                                <div class=" progress">
                                    <canvas class="w-full h-full" id="graph1">

                                    </canvas>
                                    <script>
                                    var ctx = document.getElementById("graph1").getContext('2d');
                                    const data = {
                                        datasets: [{
                                            data: [<?php echo $impayepourcent ?>,
                                                <?php echo $payepourcent ?>
                                            ],
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    };

                                    var options = {
                                        responsive: true
                                    };

                                    const config = {
                                        type: 'doughnut',
                                        data: data,
                                        options: options
                                    };

                                    var graph1 = new Chart(ctx, config);
                                    </script>

                                    <div
                                        class="absolute top-0 left-0 h-full w-full flex justify-center items-center number">
                                        <p class="mt-2 text-white"> <?php echo $payepourcent?>%</p>
                                    </div>

                                </div>
                            </div>
                            <small class="text-muted">Depuis les ouverture de l'inscription</small>
                        </div>
                    </div>
                    <div class="mt-8 mb-8 h-96">
                        <h2 class="text-xl font-semibold mb-3">Repartition des inscriptions</h2>
                        <canvas class="ml-28 w-full h-full" id='graph2'></canvas>
                        <script>
                        var ctx = document.getElementById("graph2").getContext('2d');
                        const datae = {
                            labels: [' DA2I', 'RPM', 'AES'],
                            datasets: [{
                                    label: 'Hommes',
                                    data: [<?php echo $nb_etudiantsmaleDA2I ?>,
                                        <?php echo $nb_etudiantsmaleRPM ?>,
                                        <?php echo $nb_etudiantsmaleAES ?>

                                    ],
                                    backgroundColor: 'rgb(54, 162, 235)',
                                    hoverBackgroundColor: 'rgb(54, 162, 235)',
                                    stack: 'stack1'
                                },
                                {
                                    label: 'Femmes',
                                    data: [<?php echo $nb_etudiantsfemaleDA2I ?>,
                                        <?php echo $nb_etudiantsfemaleRPM ?>,
                                        <?php echo $nb_etudiantsfemaleAES ?>
                                    ],
                                    backgroundColor: 'rgb(255, 99, 132)',
                                    hoverBackgroundColor: 'rgb(255, 99, 132)',
                                    stack: 'stack1'
                                }
                            ]
                        };
                        var options = {
                            responsive: true,
                            scales: {
                                x: {
                                    stacked: true
                                },
                                y: {
                                    stacked: true
                                }
                            }
                        };
                        const confige = {
                            type: 'bar',
                            data: datae,
                            options: options
                        };
                        var graph2 = new Chart(ctx, confige);
                        </script>
                    </div>
                    <div class="mt-20 recent-order">
                        <h2 class="text-xl font-semibold mb-3">Inscription recente</h2>
                        <div class="etudiantlist">
                            <table class="w-full">
                                <thead class="z-0">
                                    <tr>
                                        <th>
                                            id
                                        </th>
                                        <th>
                                            profil
                                        </th>
                                        <th>
                                            sexe
                                        </th>
                                        <th>
                                            Telephone
                                        </th>
                                        <th>
                                            Parcour scolaire
                                        </th>
                                        <th>
                                            Date d'inscription
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($studentlast as $studentlast ): ?>
                                    <form action="" method="POST" name="forminitlast">
                                        <tr>
                                            <td> <?=$studentlast['id_etu']?></td>
                                            <td>
                                                <div>
                                                    <img class=" w-9 h-9 mr-2 align-middle"
                                                        src=" <?=$studentlast['photo_etu']?>" p alt="">
                                                    <p class="font-medium"><span class="font-semibold">
                                                            <?=$studentlast['nom_etu']?></span>
                                                        <br> <?=$studentlast['prenom_etu']?>
                                                    </p>
                                                    <p class="font-extralight"> <?=$studentlast['email_etu']?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <?=$studentlast['sexe_etu']?>
                                            </td>
                                            <td>
                                                <?=$studentlast['tel_etu']?>
                                            </td>
                                            <td>
                                                <?=$studentlast['niveau_etu']?>
                                                <br>
                                                <?=$studentlast['parcours_etu']?>
                                            </td>
                                            <td>
                                                <?=$studentlast['date_naiss_etu']?>
                                            </td>
                                            <td>
                                                <strong
                                                    class="status <?php echo ($studentlast['statut_paiement_etu'] == 'paye') ? 'paye' : 'encours'; ?>">
                                                    <?=$studentlast['statut_paiement_etu']?>
                                                </strong>
                                            </td>
                                            <td>
                                                <div class="flex space-x-2">
                                                    <div>
                                                        <button class="text-blue-600" type="button"
                                                            onclick="modifystudent(<?=$studentlast['id_etu']?>)"><i
                                                                class="fa fa-pen-square"></i></button>
                                                    </div>
                                                    <div>
                                                        <button class="text-red-600" type="button"
                                                            onclick="deletestudent(<?=$studentlast['id_etu']?>)"><i
                                                                class=" fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="z-30 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 popup hidden "
                                            id="delconfirmed-<?=$studentlast['id_etu']?>">
                                            <input type="text" name="idlast_etu" value="<?=$studentlast['id_etu']?>"
                                                class="hidden">
                                            <i class="fa fa-trash"></i>
                                            <h2>Vous voulez vraiment supprimer <?=$studentlast['nom_etu']?> et tout ce
                                                qui lui concerne ?</h2>
                                            <button class="w-32 bg-green-500 p-4 rounded-xl text-white" type="submit"
                                                name="Supprimerlast_etu">Confirmer</button>
                                            <button class="w-32 bg-red-600 p-4 rounded-xl text-white"
                                                onclick="nodeletestudent(<?=$studentlast['id_etu']?>)"
                                                type="button">Annuler</button>
                                        </div>
                                        <div class=" absolute top-1/2 left-1/2  -translate-x-1/2 -translate-y-1/3 z-50 rounded-lg p-6 popup hidden "
                                            id="formmodif-<?=$studentlast['id_etu']?>">
                                            <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                                <span class="text-center text-base pt-5">Nom</span>
                                                <input type="text"
                                                    class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                                    name="modiflast_nom_etu" value="<?=$studentlast['nom_etu']?>"
                                                    onkeyup="upmodiflastname() ">
                                            </div>

                                            <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                                <span class="text-center text-base pt-5">Prenom</span>
                                                <input type="text"
                                                    class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                                    name="modiflast_prenom_etu" value="<?=$studentlast['prenom_etu']?>">
                                            </div>

                                            <div class=" max-w-sm w-full h-19 my-3 mx-0 py-0 px-1 grid input-fieldform">
                                                <span class="text-center text-base py-2">Date de
                                                    Naissance</span>
                                                <input type="date"
                                                    class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd pt-3"
                                                    name="modiflast_date_naissance_etu"
                                                    value="<?=$studentlast['date_naiss_etu']?>">
                                            </div>



                                            <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform"
                                                id="radioform">
                                                <span class="text-center text-base pt-5">Genre</span>
                                                <div class="flex justify-between mt-5 ml-3">
                                                    <label for="homme">
                                                        <input type="radio" name="modifisexe" id="modifhomme"
                                                            value="homme"
                                                            <?php echo ($studentlast['sexe_etu'] === 'homme') ? 'checked' : ''; ?>>
                                                        Homme
                                                    </label>
                                                    <label for="femme">
                                                        <input type="radio" name="modifisexe" id="modiffemme"
                                                            value="femme"
                                                            <?php echo ($studentlast['sexe_etu'] === 'femme') ? 'checked' : ''; ?>>
                                                        Femme
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                                <span class="text-center text-base pt-5">Adresse</span>
                                                <input type="text"
                                                    class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                                    name="modiflast_adresse_etu"
                                                    value="<?=$studentlast['adresse_etu']?>" required>
                                            </div>

                                            <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                                <span class="text-center text-base pt-5">Email</span>
                                                <input type="email"
                                                    class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                                    name="modiflast_email_etu" value="<?=$studentlast['email_etu']?>"
                                                    required>
                                            </div>

                                            <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                                <span class="text-center text-base pt-5">Telephone</span>
                                                <input type="tel"
                                                    class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                                    name="modiflast_tel_etu" value="<?=$studentlast['tel_etu']?>"
                                                    required>
                                            </div>
                                            <div class="w-full flex flex-row justify-between ">
                                                <button class="bg-green-400 p-3 w-32 rounded-xl text-white"
                                                    type="submit" name="modiflaststudent">Enregistrer</button>
                                                <button class=" bg-red-600 p-3 w-32 rounded-xl text-white"
                                                    onclick="nomodifystudent(<?=$studentlast['id_etu']?>)"
                                                    type="button">Annuler</button>
                                            </div>

                                        </div>
                                    </form>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                        <a href="#">regarder tous</a>
                    </div>

                </div>
                <div class="w-10/12 mt-6 right">
                    <div>
                        <div class=" rounded-xl h-auto flex flex-col p-5 ">
                            <div class="w-32 h-32 justify-center items-center  watch">
                                <div class="timer" id="second">
                                </div>
                                <div class="timer" id="minute">
                                </div>
                                <div class="timer" id="hour">
                                </div>
                                <span style="--i:1;"><b>1</b></span>
                                <span style="--i:2;"><b>2</b></span>
                                <span style="--i:3;"><b>3</b></span>
                                <span style="--i:4;"><b>4</b></span>
                                <span style="--i:5;"><b>5</b></span>
                                <span style="--i:6;"><b>6</b></span>
                                <span style="--i:7;"><b>7</b></span>
                                <span style="--i:8;"><b>8</b></span>
                                <span style="--i:9;"><b>9</b></span>
                                <span style="--i:10;"><b>10</b></span>
                                <span style="--i:11;"><b>11</b></span>
                                <span style="--i:12;"><b>12</b></span>
                            </div>
                            <script>
                            let sc = document.querySelector("#second")
                            let mn = document.querySelector("#minute")
                            let hr = document.querySelector("#hour")
                            setInterval(() => {
                                let day = new Date();
                                let hh = day.getHours() * 30;
                                let mm = day.getMinutes() * 6;
                                let ss = day.getSeconds() * 6;
                                hr.style.transform = `rotateZ(${hh + (mm / 12)}deg)`;
                                mn.style.transform = `rotateZ(${mm}deg)`;
                                sc.style.transform = `rotateZ(${ss}deg)`;
                            });
                            </script>
                            <div class="flex w-32 h-44 justify-center items-center  lg:w-64 lg:h-64 week">
                                <ul class="flex gap-1">
                                    <li>L</li>
                                    <li>M</li>
                                    <li>M</li>
                                    <li>J</li>
                                    <li>V</li>
                                    <li>S</li>
                                    <li>D</li>
                                </ul>
                                <script>
                                let date = new Date();
                                let daynum = date.getDay();
                                let day = date.getDate();
                                let dayactive = document.querySelector(".week ul li:nth-child(" + daynum + ")");
                                dayactive.classList.add("today")
                                let h5 = document.createElement('h5');
                                h5.innerHTML = day;
                                dayactive.appendChild(h5);
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="w-full task">
                        <h2 class=" text-xl font-semibold mb-3">
                            Tache
                        </h2>
                        <div class="flex items-center gap-4 mb-3 py-6 px-7 itemonline">
                            <div class="p-2 flex icon">
                                <span class="text-white fa fa-tasks"></span>
                            </div>
                            <div class="flex  justify-between items-start m-0 w-full right">
                                <div class="text">
                                    <p>Verifier les comptes</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mb-3 py-6 px-7 itemonline">
                            <div class="p-2 flex icon">
                                <span class="text-white fa fa-tasks"></span>
                            </div>
                            <div class="flex  justify-between items-start m-0 w-full right">
                                <div class="text">
                                    <p>Verifier les etudiant en double filiere pour les bourses</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mb-3 py-6 px-7 itemonline">
                            <div class="p-2 flex icon">
                                <span class="text-white fa fa-tasks"></span>
                            </div>
                            <div class="flex  justify-between items-start m-0 w-full right">
                                <div class="text">
                                    <p>Verifier les impayers</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mb-3 py-6 px-7 addtask">
                            <div class="p-2 flex icon">
                                <h3><span>+</span> Ajouter une nouvelle tache</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mainbody hidden" id="etudiant">
            <h2 class="titlesection text-3xl font-semibold">Etudiant</h2>
            <div id="listetu">
                <div class="w-full groupsearch">
                    <div
                        class="mt-4 grid grid-cols-1 justify-center items-center  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 etudiantsearch">
                        <div class="text-center mt-5 mb-5">
                            <label for="" class="serchi searchstyle"><input type="search" placeholder="..."> <i
                                    class="fa fa-search"></i></label>
                        </div>
                        <!--     <div class="flex justify-center items-center">
                            <label for="" class="block">Niveau</label>
                            <select name="select" id="selectNiveau" class="w-4/5 h-9">
                                <option name=""></option>
                                <option name="M2">Master 2</option>
                                <option name="M1">Master 1</option>
                                <option name="L3">License 3</option>
                                <option name="L2">License 2</option>
                                <option name="L1">License 1</option>
                            </select>
                        </div>
                        <div class="flex justify-center items-center">
                            <label for="" class="block">Classe</label>
                            <select name="select" id="selectClasse" class="w-4/5 h-9">
                                <option name=""></option>
                                <option name="">DA2I</option>
                                <option name="">RPM</option>
                                <option name="">AES</option>
                            </select>
                        </div> -->
                        <div class="block m-auto rounded-xl">
                            <button class="p-2 bg-green-500 text-white" onclick="addstudent()">
                                <i class="fa fa-plus"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </div>
                <div class="etudiantlist">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>
                                    id
                                </th>
                                <th>
                                    profil
                                </th>
                                <th>
                                    sexe
                                </th>
                                <th>
                                    Telephone
                                </th>
                                <th>
                                    Parcour scolaire
                                </th>
                                <th>
                                    Niveau
                                </th>
                                <th>
                                    Date d'inscription
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($student as $student ):?>
                            <form action="" method="POST" name="formmodif">
                                <tr>
                                    <td> <?=$student['id_etu']?></td>
                                    <td>
                                        <div>
                                            <img class=" w-9 h-9 mr-2 align-middle" src=" <?=$student['photo_etu']?>"
                                                alt="">
                                            <p class="font-medium"><span class="font-semibold">
                                                    <?=$student['nom_etu']?></span>
                                                <br> <?=$student['prenom_etu']?>
                                            </p>
                                            <p class="font-extralight"> <?=$student['email_etu']?></p>
                                        </div>
                                    </td>
                                    <td>
                                        <?=$student['sexe_etu']?>
                                    </td>
                                    <td>
                                        <?=$student['tel_etu']?>
                                    </td>
                                    <td>


                                        <?=$student['parcours_etu']?>
                                    </td>
                                    <td>
                                        <?=$student['niveau_etu']?>
                                    </td>
                                    <td>
                                        <?=$student['date_naiss_etu']?>
                                    </td>
                                    <td>
                                        <strong
                                            class="status <?php echo ($student['statut_paiement_etu'] == 'paye') ? 'paye' : 'encours'; ?>">
                                            <?=$student['statut_paiement_etu']?>
                                        </strong>
                                    </td>
                                    <td>
                                        <div class="flex space-x-2">
                                            <div>
                                                <button class="text-blue-600" type="button"
                                                    onclick="modifyystudent(<?=$student['id_etu']?>)"><i
                                                        class="fa fa-pen-square"></i></button>
                                            </div>
                                            <div>
                                                <button class="text-red-600" type="button"
                                                    onclick="deleteestudent(<?=$student['id_etu']?>)"><i
                                                        class=" fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <div class="z-30 fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 popup hidden "
                                    id="deleconfirmed-<?=$student['id_etu']?>">
                                    <input type="text" name="id_etu" value="<?=$student['id_etu']?>" class="hidden">
                                    <i class="fa fa-trash"></i>
                                    <h2>Vous voulez vraiment supprimer <?=$student['nom_etu']?> et tout ce
                                        qui lui concerne ?</h2>
                                    <button class="w-32 bg-green-500 p-4 rounded-xl text-white" type="submit"
                                        name="Supprimer_etu">Confirmer</button>
                                    <button class="w-32 bg-red-600 p-4 rounded-xl text-white"
                                        onclick="nodeleteestudent(<?=$student['id_etu']?>)"
                                        type="button">Annuler</button>

                                </div>



                                <div class=" absolute top-1/2 left-1/2  -translate-x-1/2 -translate-y-1/3 z-50 rounded-lg p-6 popup hidden "
                                    id="formmodiff-<?=$student['id_etu']?>">
                                    <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                        <span class="text-center text-base pt-5">Nom</span>
                                        <input type="text"
                                            class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd modif_nom_etu"
                                            name="modif_nom_etu" value="<?=$student['nom_etu']?>">
                                    </div>

                                    <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                        <span class="text-center text-base pt-5">Prenom</span>
                                        <input type="text"
                                            class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                            name="modif_prenom_etu" value="<?=$student['prenom_etu']?>">
                                    </div>

                                    <div class=" max-w-sm w-full h-19 my-3 mx-0 py-0 px-1 grid input-fieldform">
                                        <span class="text-center text-base py-2">Date de
                                            Naissance</span>
                                        <input type="date"
                                            class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd pt-3"
                                            name="modif_date_naissance_etu" value="<?=$student['date_naiss_etu']?>">
                                    </div>



                                    <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform"
                                        id="radioform">
                                        <span class="text-center text-base pt-5">Genre</span>
                                        <div class="flex justify-between mt-5 ml-3">
                                            <label for="homme">
                                                <input type="radio" name="modifsexe" id="modifhomme" value="homme"
                                                    <?php echo ($student['sexe_etu'] === 'homme') ? 'checked' : ''; ?>>
                                                Homme
                                            </label>
                                            <label for="femme">
                                                <input type="radio" name="modifsexe" id="modiffemme" value="femme"
                                                    <?php echo ($student['sexe_etu'] === 'femme') ? 'checked' : ''; ?>>
                                                Femme
                                            </label>
                                        </div>
                                    </div>
                                    <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                        <span class="text-center text-base pt-5">Adresse</span>
                                        <input type="text"
                                            class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                            name="modif_adresse_etu" value="<?=$student['adresse_etu']?>" required>
                                    </div>

                                    <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                        <span class="text-center text-base pt-5">Email</span>
                                        <input type="email"
                                            class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                            name="modif_email_etu" value="<?=$student['email_etu']?>" required>
                                    </div>

                                    <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                        <span class="text-center text-base pt-5">Telephone</span>
                                        <input type="tel"
                                            class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                            name="modif_tel_etu" value="<?=$student['tel_etu']?>" required>
                                    </div>
                                    <div class="w-full flex flex-row justify-between ">
                                        <button class="bg-green-400 p-3 w-32 rounded-xl text-white" type="submit"
                                            name="modifstudent">Enregistrer</button>
                                        <button class=" bg-red-600 p-3 w-32 rounded-xl text-white"
                                            onclick="nomodifyystudent(<?=$student['id_etu']?>)"
                                            type="button">Annuler</button>
                                    </div>

                                </div>
                            </form>
                            <?php endforeach;?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div id="pageinscri" class="relative inscrietu hidden">
                <div class="my-0 mx-auto py-0  inscricontainer">
                    <div class="flex flex-row form-box">
                        <div class="relative p-8 progress">
                            <div class="text-3xl font-extrabold title">
                                <p><span>Inscrire</span> Etudiant</p>
                            </div>
                            <ul class="flex flex-col items-center justify-center  progress-steps">
                                <li class="step active">
                                    <span>1</span>
                                    <p>Information personnel de l'etudiant</p>
                                </li>
                                <li class="step ">
                                    <span>2</span>
                                    <p>Contact ,Classe & Mention</p>
                                </li>
                                <li class="step ">
                                    <span>3</span>
                                    <p>Payement des frais de scolarite</p>
                                </li>
                            </ul>

                        </div>
                        <form action="" method="POST" enctype="multipart/form-data" name="formisncription">
                            <div class="form-one form-step active">
                                <h2>Information personnel de l'etudiant</h2>

                                <div class="upload">
                                    <img src="../Public/picture/emit logo.jpg " width="100" height="100" alt="pdp">
                                    <div class="round">
                                        <input type="file" name="photo_etu">
                                        <i class="text-white fa fa-camera"></i>
                                    </div>
                                </div>

                                <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base pt-5">Nom</span>
                                    <input type="text"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                        name="nom_etu" onkeyup="upname()" required>
                                </div>

                                <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base pt-5">Prenom</span>
                                    <input type="text"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                        name="prenom_etu" onkeyup="capname()">
                                </div>

                                <div class="max-w-sm w-full h-19 my-3 mx-0 py-0 px-1 grid input-fieldform">
                                    <span class="text-center text-base py-2">Date de
                                        Naissance</span>
                                    <input type="date"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd pt-3"
                                        name="date_naissance_etu">
                                </div>

                                <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform "
                                    id="radioform">
                                    <span class="text-center text-base pt-5">Genre</span>
                                    <div class="flex justify-between mt-5 ml-3 ">
                                        <label for="homme">
                                            <input type="radio" name="sexe_etu" id="homme" value="Homme">
                                            Homme
                                        </label>
                                        <label for="femme">
                                            <input type="radio" name="sexe_etu" id="femme" value="Femme">
                                            Femme
                                        </label>
                                    </div>
                                </div>

                                <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base pt-5">Adresse</span>
                                    <input type="text"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                        name="adresse_etu">
                                </div>
                            </div>

                            <div class="form-two form-step">
                                <h2>Contact ,Mention et classe</h2>
                                <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base pt-5">Email</span>
                                    <input type="email"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                        name="email_etu">
                                </div>

                                <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base pt-5">Telephone</span>
                                    <input type="tel"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                        name="tel_etu">
                                </div>

                                <div class="block m-auto">
                                    <label for="">Mention</label> <br><select class="cursor-pointer"
                                        name="parcours_etu">
                                        <option class="cursor-pointer" name="">
                                        </option>
                                        <option class="cursor-pointer" name="" value="DA2I">DA2I
                                        </option>
                                        <option class="cursor-pointer" name="" value="RPM">RPM
                                        </option>
                                        <option class="cursor-pointer" name="" value="AES">AES
                                        </option>
                                    </select>
                                </div>
                                <div class="block m-auto">
                                    <label for="">Niveau <br> </label><select class="cursor-pointer" name="niveau_etu"
                                        onclick="choiceniv()" id="niveau_etu">
                                        <option class="cursor-pointer" name="">
                                        </option>
                                        <option class="cursor-pointer" name="M2" value="Master 2">Master
                                            2
                                        </option>
                                        <option class="cursor-pointer" name="M1" value="Master 1">Master
                                            1
                                        </option>
                                        <option class="cursor-pointer" name="L3" value="License 3">
                                            License 3
                                        </option>
                                        <option class="cursor-pointer" name="L2" value="License 2">
                                            License 2
                                        </option>
                                        <option class="cursor-pointer" name="L1" value="License 1">
                                            License 1
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-three form-step">
                                <h2>Payement</h2>
                                <div class=" max-w-sm w-full h-19 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base py-3">Date
                                        d'inscription</span>
                                    <input type="date"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg pt-3"
                                        name="date_inscription_etu"">
                                        </div>
                
                                        <div class=" max-w-sm w-full h-19 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base py-3">Type de
                                        payement</span>
                                    <input type="text"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg"
                                        name="type_paiement">
                                </div>

                                <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base pt-3">Montant
                                        total</span>
                                    <input type="text"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg"
                                        name="montant_total" id="montant_total">
                                </div>

                                <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base pt-5">Montant
                                        payer</span>
                                    <input type="text"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg"
                                        name="montant_paye" id="montant_paye" onkeyup="showrest()">
                                </div>

                                <div class=" max-w-sm w-full h-19 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base py-3">Date de
                                        payement</span>
                                    <input type="date"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg pt-3"
                                        name="date_paiement">
                                </div>

                                <div class=" max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base pt-5">Reste a
                                        payer</span>
                                    <input type="text"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg"
                                        name="reste_a_payer" id="reste_a_payer">
                                </div>
                                <div class="max-w-sm w-full h-19 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base py-3">Date limite de
                                        payement</span>
                                    <input type="date"
                                        class=" bg-transparent outline-none border-none font-semibold text-lg pt-3"
                                        name="date_limite_paiement">
                                </div>

                                <div class=" max-w-sm w-full h-19 my-3 mx-0 py-0 px-2 grid input-fieldform">
                                    <span class="text-center text-base py-3">Statue</span>
                                    <input class=" bg-transparent outline-none border-none font-semibold text-lg"
                                        name="statut_paiement_etu">
                                </div>
                            </div>


                            <div class="btngroup">
                                <button type="button" class="btn-prev" disabled>Precedent</button>
                                <button type="button" class="btn-next">Suivant</button>
                                <button type="submit" name="inscriptionbtn" class="btn-submit">Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class=" absolute left-12 top-0 cursor-pointer text-3xl" onclick="returnaddstudent()">
                    <i class="  fa fa-angle-left"></i>
                </div>
            </div>
        </section>

        <section class="mainbody hidden" id="fraisscolarite">
            <h2 class="titlesection text-3xl font-semibold">Frais de scolarite</h2>
            <div class="grid grid-cols-3 gap-2">
                <?php foreach($fraissco as $fraissco ): ?>
                <div class=" bg-slate-200 rounded-lg shadow-lg w-11/12 p-4 mb-5 relative">
                    <i class="fa fa-pen absolute top-2 right-2 cursor-pointer" onclick="modiffrais()"></i>
                    <h2 class="text-xl font-bold mb-2">
                        <?=$fraissco['Niveau']?>
                    </h2>
                    <h3 class="text-lg font-medium">
                        <?=$fraissco['montant_total']?> <span> Ar</span>
                    </h3>
                    <form class="hidden">
                        <div class="max-w-sm w-full h-14 my-3 mx-0 py-0 px-2 grid input-fieldform ">
                            <span class="text-center text-base pt-5">Montant</span>
                            <input type="text"
                                class="bg-transparent outline-none border-none font-semibold text-lg firspageadd"
                                name="Montant_total">
                            <div>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Enregistrer</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4
                                        rounded">Annuler
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php endforeach;?>
            </div>
        </section>

        <section class="mainbody hidden" id="paiement">
            <h2 class="titlesection text-3xl font-semibold">Paiement</h2>
            <div class="etudiantlist">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>
                                Profil
                            </th>
                            <th>
                                Telephone
                            </th>
                            <th>
                                Parcour scolaire
                            </th>
                            <th>
                                Date limite de paiement
                            </th>
                            <th>
                                Reste a payer
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach($paiement as $paiement ): ?>
                        <tr>
                            <td>
                                <div>
                                    <img class=" w-9 h-9 mr-2 align-middle" src=" <?=$paiement['photo_etu']?>" alt="">
                                    <p class="font-medium"><span class="font-semibold">
                                            <?=$paiement['nom_etu']?></span>
                                        <br> <?=$paiement['prenom_etu']?>
                                    </p>
                                    <p class="font-extralight"> <?=$paiement['email_etu']?></p>
                                </div>
                            </td>
                            <td>
                                <?=$paiement['tel_etu']?>
                            </td>
                            <td>
                                <?=$paiement['niveau_etu']?>
                                <br>
                                <?=$paiement['parcours_etu']?>
                            </td>

                            <td> <?=$paiement['date_limite_paiement']?></td>

                            <td>
                                <?=$paiement['reste_a_payer']?>
                            </td>

                            <td>
                                <div class="flex space-x-2">
                                    <div>
                                        <button class="text-blue-600" type="button"><i
                                                class="fa fa-pen-square"></i></button>
                                    </div>
                                    <div>
                                        <button class="text-red-600" type="button" "><i class=" fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <form action="">
                            <div class="grid grid-cols-2">
                                <div>

                                </div>
                                <div>

                                </div>
                            </div>


                        </form>

                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </section>
    </main>




    <!-- Popup deconnection -->

    <div class="hidden popup" id="discoconfirmed">

        <i class="fa fa-sign-out"></i>
        <h2>Vous voulez vraiment vous deconnecter?</h2>
        <a href="deconnexion.php">
            <button class="w-32 bg-green-500 p-4 rounded-xl text-white">Confirmer
            </button>
        </a>
        <button class="w-32 bg-red-600 p-4 rounded-xl text-white" onclick="decopopupclose()"
            type="button">Annuler</button>

    </div>





















</body>