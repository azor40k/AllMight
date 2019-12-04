$(document).ready(function () {

    //MENU APPARITION 
    $(window).scroll(function () {
        var top = $(window).scrollTop();
        if (top >= 60) { //si la postion du header est supérieur/egale à 60
            $("header").addClass('afterscroll'); // ajout de la classe 'afterscroll'
        } else if ($("header").hasClass('afterscroll')) { //sinon si ya deja on enleve
            $("header").removeClass('afterscroll');
        }
    });

    // MENU BOUTON RESPONSIVE
    $('#toggle-burger').click(function () {
        $('nav ul').fadeToggle('active'); //apparition&disparition en fade
    });



    //BTN ADMIN
    $('.btn-membre').click(function (e) {
        $('.adminMembre').show(500); //montrer div membre
        $('.adminMenuMembre').show(500); //montrer menu membre
        $('.adminContact').hide(500); //cacher div contact
        $('.adminMenuContact').hide();//montrer menu contact
        $('.adminImg').hide(500); //cacher div image
        $('.adminArticle').hide(500);//cacher div article
        $('.adminMembreAll').show(500);//montrer div tous les membres
    });
    
    $('.btn-contact').click(function (e) {
        $('.adminMembre').hide(500);
        $('.adminMenuMembre').hide();
        $('.adminContact').show(500);
        $('.adminMenuContact').show(500);
        $('.adminImg').hide(500);
        $('.adminArticle').hide(500);
        $('.adminContactRecent').show(500);

    });
    $('.btn-img').click(function (e) {
        $('.adminMembre').hide(500);
        $('.adminMenuMembre').hide(500);
        $('.adminContact').hide(500);
        $('.adminMenuContact').hide(500);
        $('.adminImg').show(500);
        $('.adminArticle').hide(500);

    });
    $('.btn-article').click(function (e) {
        $('.adminMembre').hide(500);
        $('.adminMenuMembre').hide(500);
        $('.adminContact').hide(500);
        $('.adminMenuContact').hide(500);
        $('.adminImg').hide(500);
        $('.adminArticle').show(500);

    });
    
    
    $('.btn-membreAll').click(function (e) {
        $('.adminMembreAd').hide(500);
        $('.adminMembreAll').show(500);
        $('.adminMembreMem').hide(500);
        
        

    });
    $('.btn-membreAdmin').click(function (e) {
        $('.adminMembreAd').show(500);
        $('.adminMembreAll').hide(500);
        $('.adminMembreMem').hide(500);
        
        

    });
    $('.btn-membreMembre').click(function (e) {
        $('.adminMembreAd').hide(500);
        $('.adminMembreAll').hide(500);
        $('.adminMembreMem').show(500);
        
        

    });
    
    $('.btn-contactNew').click(function (e) {
        $('.adminContactAncient').hide(500);
        $('.adminContactRecent').show(500);
        $('.adminContactMail').hide(500);
        
        

    });
    $('.btn-contactOld').click(function (e) {
        $('.adminContactAncient').show(500);
        $('.adminContactRecent').hide(500);
        $('.adminContactMail').hide(500);
        
        

    });
    $('.btn-contactMail').click(function (e) {
        $('.adminContactAncient').hide(500);
        $('.adminContactRecent').hide(500);
        $('.adminContactMail').show(500);
        
        

    });
    
     $('.btn-blogArticle').click(function (e) {
        $('.blogImg').hide(500);
        $('.blogArticle').show(500);
        
        

    });
     $('.btn-blogImg').click(function (e) {
        $('.blogArticle').hide(500);
        $('.blogImg').show(500);
        
        

    });
    
});


//JS
//preview image
function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('prev_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
function preview_article(event) {
            var reader = new FileReader(); //image récupérer
            reader.onload = function() {
                var output = document.getElementById('prev_article'); //affiche la preview de l'image
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }




//Boutton BackTop
const backToTopButton = document.querySelector("#backtop"); //déclaration

window.addEventListener("scroll", scrollFunction); //ajout event scroll a la fenetre

function scrollFunction() {
    if (window.pageYOffset > 300) { // montre boutton
        if (!backToTopButton.classList.contains("btnEntrance")) { // montre bouton si ya pas la class 'btnentrance'
            backToTopButton.classList.remove("btnExit"); //enleve la class 'btnexit'
            backToTopButton.classList.add("btnEntrance"); //ajoute la class 'btnentrance'
            backToTopButton.style.display = "block"; //modifie le display en block
        }
    } else { // Cacher Button
        if (backToTopButton.classList.contains("btnEntrance")) { // cache le bouton si ya la class 'btnentrance'
            backToTopButton.classList.remove("btnEntrance"); //enleve la class 'btnentrance'
            backToTopButton.classList.add("btnExit");//ajoute la class 'btnexit'
            setTimeout(function () {
                backToTopButton.style.display = "none"; 
            }, 250);//modifie le display en none en 250ms
        }
    }
}

backToTopButton.addEventListener("click", smoothScrollBackToTop); //ajout event click au bouton

function smoothScrollBackToTop() {
    const targetPosition = 0; //déclaration de position de fin scrollTop
    const startPosition = window.pageYOffset;   //déclaration de ébut de scrollTop
    const distance = targetPosition - startPosition; //Calcul différence de la distance de destination
    const duration = 750; //duré de la distance à parcourir
    let start = null; //déclaration 'start

    window.requestAnimationFrame(step); //method permettant d'appeler une animation spécifique 'step'

    function step(timestamp) {
        if (!start) start = timestamp;
        const progress = timestamp - start; //calcul temps / départ
        window.scrollTo(0, easeInOutCubic(progress, startPosition, distance, duration)); //animation 
        if (progress < duration) window.requestAnimationFrame(step);
    }
}

function easeInOutCubic(t, b, c, d) { //Effet d'Animation d'accélération de l'animation 
    t /= d / 2;
    if (t < 1) return c / 2 * t * t * t + b;
    t -= 2;
    return c / 2 * (t * t * t + 2) + b;
};
