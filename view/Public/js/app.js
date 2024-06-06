    const sidebar=document.querySelector(".sidebar");
    const colorsshow= document.querySelector("#activecolor")
    const maindoc=document.querySelector("main");



function navhideshow(){
    sidebar.classList.toggle("close");
    colorsshow.classList.remove("colorsactive");
}

function searchbtn(){
    sidebar.classList.remove("close"); 
}

function showpallette(){
    sidebar.classList.remove("close"); 
    colorsshow.classList.toggle("colorsactive");
}


//changement de section
const menuLinks = document.querySelectorAll('.nav_link a');
menuLinks.forEach((link) => {
  link.addEventListener('click', (e) => {
    e.preventDefault();
    const menuItem = e.target.closest('li');
    const sectionId = link.getAttribute('href');
    const section = document.querySelector(sectionId);
    const allSections = document.querySelectorAll('.mainbody');
    allSections.forEach((s) => {
      if (s !== section) {
        s.classList.add('hidden');
      }
    });
    section.classList.remove('hidden');
    const allMenuItems = document.querySelectorAll('.nav_link');
    allMenuItems.forEach((item) => {
      item.classList.remove('activemenu');
    });
    menuItem.classList.add('activemenu');
  });
});


//popup deconnection

function decopopup(){
    document.querySelector("#discoconfirmed").classList.remove("hidden");
    maindoc.classList.add("maingray");
}
function decopopupclose(){
    document.querySelector("#discoconfirmed").classList.add("hidden");
    maindoc.classList.remove("maingray");
}







//etudiant
//recherche
const search = document.querySelector('.searchstyle input');
// Sélection de toutes les lignes de tableau
const table_rows = document.querySelectorAll('.etudiantlist tbody tr');

search.addEventListener('input', searchTable);

function searchTable() {
  table_rows.forEach((row, i) => {
    let table_data = row.textContent.toLowerCase();
    let search_data = search.value.toLowerCase();

    // Masquer les lignes qui ne correspondent pas à la recherche
    row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
    row.style.setProperty('--delay', i / 25 + 's');
  });

  // Appliquer un style de couleur alterné aux lignes visibles
  document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
    visible_row.style.backgroundColor = i % 2 == 0 ? 'transparent' : '#0000000b';
  });
}

const searchi = document.querySelector('.serchi input');
// Sélection de toutes les lignes de tableau
const table_rowsi = document.querySelectorAll('.etudiantlist tbody tr');

searchi.addEventListener('input', searchiTable);

function searchiTable() {
  table_rowsi.forEach((row, i) => {
    let table_data = row.textContent.toLowerCase();
    let search_data = searchi.value.toLowerCase();

    // Masquer les lignes qui ne correspondent pas à la recherche
    row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
    row.style.setProperty('--delay', i / 25 + 's');
  });

  // Appliquer un style de couleur alterné aux lignes visibles
  document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
    visible_row.style.backgroundColor = i % 2 == 0 ? 'transparent' : '#0000000b';
  });
}


//filtre

/* const selectNiveau = document.querySelector('#selectNiveau');
const selectClasse = document.querySelector('#selectClasse');

selectNiveau.addEventListener('change', filter1Table);
selectClasse.addEventListener('change', filter2Table);

function filter1Table() {
  const selectedNiveau = selectNiveau.value;
  const selectedClasse = selectClasse.value;

  table_rowsi.for((row) => {
    const niveau = row.dataset.niveau;
    const classe = row.dataset.classe;

    const niveauMatch = selectedNiveau === '' || niveau === selectedNiveau;
    const classeMatch = selectedClasse === '' || classe === selectedClasse;

    row.classList.toggle('hide', !(niveauMatch && classeMatch));
  });
}
function filter2Table() {
  const selectedNiveau = selectNiveau.value;
  const selectedClasse = selectClasse.value;

  table_rowsi.forEach((row) => {
    const niveau = row.dataset.niveau;
    const classe = row.dataset.classe;

    const niveauMatch = selectedNiveau === '' || niveau === selectedNiveau;
    const classeMatch = selectedClasse === '' || classe === selectedClasse;

    row.classList.toggle('hide', !(niveauMatch && classeMatch));
  });
} */


//effacer etudiant

function deletestudent(id){
  document.querySelector("#delconfirmed-"+id).classList.remove("hidden");

}

function nodeletestudent(id){
  document.querySelector("#delconfirmed-"+id).classList.add("hidden");
}



//modifier etudiant
function modifystudent(id){

   document.querySelector("#formmodif-"+id).classList.remove("hidden"); 
    
}

function nomodifystudent(id){
    document.querySelector("#formmodif-"+id).classList.add("hidden");
}

//effacer etudiant

function deleteestudent(id){
  document.querySelector("#deleconfirmed-"+id).classList.remove("hidden");

}

function nodeleteestudent(id){
  document.querySelector("#deleconfirmed-"+id).classList.add("hidden");
}



//modifier etudiant
function modifyystudent(id){
   document.querySelector("#formmodiff-"+id).classList.remove("hidden"); 
    
}

function nomodifyystudent(id){
    document.querySelector("#formmodiff-"+id).classList.add("hidden");
}





//ouvrir le formulaire 
function addstudent(){
  document.querySelector("#listetu").classList.add("hidden");
  document.querySelector("#pageinscri").classList.remove("hidden");

}
function returnaddstudent(){
  document.querySelector("#listetu").classList.remove("hidden");
  document.querySelector("#pageinscri").classList.add("hidden");

}


//inscription 
const nextbtn = document.querySelector('.btn-next');
const prevbtn = document.querySelector('.btn-prev');
const steps = document.querySelectorAll('.step');
const formsteps = document.querySelectorAll('.form-step'); // Sélectionnez les éléments du formulaire

let active = 1;
nextbtn.addEventListener('click', () => {
  active++;
  if (active > steps.length) {
    active = steps.length;
  }
  updateProgress();
});

prevbtn.addEventListener('click', () => {
  active--;
  if (active < 1) {
    active = 1;
  }
  updateProgress();
});

const updateProgress = () => {
/*   console.log('steps.length => ' + steps.length);
  console.log('active => ' + active); */

  steps.forEach((step, i) => {
    if (i === (active - 1)) {
      step.classList.add('active');
      formsteps[i].classList.add('active');
  /*     console.log('i => ' + i); */
    } else {
      step.classList.remove('active');
      formsteps[i].classList.remove('active');
    }
  });

  if (active === 1) {
    prevbtn.disabled = true;
  } else if (active === steps.length) {
    nextbtn.disabled = true;
  } else {
    prevbtn.disabled = false;
    nextbtn.disabled = false;
  }
};

updateProgress();

//formulaire gestion input

function uppername(nom) {  
    return nom.toUpperCase().replace(/[0-9]/g, '');
}

function upname() {
    var nom = document.formisncription.nom_etu;
    nom.value = uppername(nom.value);
}

function capitalisename(prenom) {
  var prenom = prenom.charAt(0).toUpperCase().replace(/[0-9]/g, '') + prenom.slice(1).toLowerCase().replace(/[0-9]/g, '');

  for (var i = 0; i < prenom.length; i++) {
    if (prenom.charAt(i) === " ") {
      prenom = prenom.slice(0, i + 1) + prenom.charAt(i + 1).toUpperCase() + prenom.slice(i + 2).toLowerCase();
    }
  }

  return prenom;
}

function capname() {
  var prenom = document.formisncription.prenom_etu;
  prenom.value = capitalisename(prenom.value);
}


function choiceniv() {
    let montant = 0;
    let niveauEtu = document.getElementById("niveau_etu").value;

    
    if (niveauEtu == "License 1" || niveauEtu == "License 2" || niveauEtu == "License 3") {
        montant = 505000;
    } else if(niveauEtu == "Master 1" || niveauEtu == "Master 2"){
        montant = 605000;
    }
    else {
      montant = 0;
    }
  document.getElementById("montant_total").value=montant;
  
}


function showrest(){
    var x=document.getElementById("montant_paye").value;
    var montant=document.getElementById("montant_total").value;
    var reste=montant-x;
  document.formisncription.reste_a_payer.value=reste;
  if(reste==0){
  document.formisncription.statut_paiement_etu.value="paye";
  }
  else if(reste<0){
    document.formisncription.statut_paiement_etu.value="reverifier votre saisie";
  }
  else{
  document.formisncription.statut_paiement_etu.value="en cours";
  }
}








