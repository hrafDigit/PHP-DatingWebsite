const basketArticles = []; // Panier
let obj = []; // Tableau qui contiendra le résultat du json
let url = 'js/products.json';

fetch(url, {
    method: 'GET',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'dataType': 'json'
    },
    mode: 'no-cors', // IMPORTANT : Permet d'éviter les erreurs de type 'CORS' au chargement de la page
    cache: 'default'
})
.then(res => res.json())
.then(out => obj = out)
.then(
    () => {
        showInstruments();
        let buttons = document.querySelectorAll('a.addCard');// boutons ajouter au panier
        // on parcours tout les bouttons ajouter au panier pour leur mettre
        // un écouteur d'event
        buttons.forEach(item => {
            item.addEventListener('click', () => {
                let itemId = item.getAttribute('data-id');
                // si l'article existe déjà dans le panier on incrémente la quantité
                if (basketArticles.some(elem => elem.id == itemId)) {
                    let index = basketArticles.findIndex(x => x.id === itemId);
                    basketArticles[index].quantity += 1;
                    displayBasket();                    
                } else {
                    // sinon on l'ajoute
                    let index = obj.findIndex(x => x.id === itemId);
                    addToBasket(obj[index]);
                }
            })
        });
      }
).catch(err => { throw err });

// ajouter un produit au panier  
function addToBasket(item) { 
    item.quantity = 1;
    basketArticles.push(item);
    displayBasket();
}

// supprimer un produit du panier
function removeFromBasket(id) {
    let index = basketArticles.findIndex(x => x.id === id);
    basketArticles.splice(index, 1);
    let elem = document.getElementById(id);
    elem.innerHTML = '';
    elem.remove();
    calcTotal();
}
// somme des prix des produits
function calcTotal(){
  let total = 0;
  if(basketArticles.length > 0){
    basketArticles.forEach(item => {
      total += (item.price * item.quantity);
    });
  }
  document.getElementById('totalPrice').textContent = total;
} 
// mettre à jour la quantité
function updateQuantity(id, number){
  let index = basketArticles.findIndex(x => x.id == id);
  if(number == -1 && basketArticles[index].quantity == 0){
  } else {
    basketArticles[index].quantity += number;
    displayBasket();
  }
}
// fonction qui réaffiche entièrement le panier 
// appelée dès qu'une modification sur panier est effectuée 
function displayBasket() {
    let tbody = document.querySelector('.modal-body table tbody');
    tbody.innerHTML = '';
    basketArticles.forEach(item => {
        let tr = document.createElement('TR');
        let name = document.createElement('TD');
        let price = document.createElement('TD');
        let qt = document.createElement('TD');
        let ref = document.createElement('TD');
        let suppr = document.createElement('TD');
        let cross = document.createElement('I');
        let plus = document.createElement('I');
        let less = document.createElement('I');
        name.classList += 'col-3';
        ref.classList += 'col-2';
        qt.classList += 'col-2';
        price.classList += 'col-2';
        suppr.classList += 'col-1';
        ref.innerText = item.ref;
        price.innerText = item.price + '$';
        name.innerText = item.name;
        tr.setAttribute('id', item.id);
        qt.innerText = item.quantity;
        cross.className += "close bi bi-x-square-fill";
        plus.className += "plus bi bi-plus-square-fill";
        less.className += "less bi bi-dash-square-fill";

        tr.appendChild(name);
        tr.appendChild(ref);
        tr.appendChild(qt);
        tr.appendChild(price);
        suppr.appendChild(less);
        suppr.appendChild(plus);
        suppr.appendChild(cross);
        cross.setAttribute('onClick', `removeFromBasket('${item.id}')`);
        plus.setAttribute('onClick', `updateQuantity(${item.id}, 1)`);
        less.setAttribute('onClick', `updateQuantity(${item.id}, -1)`);
        tr.appendChild(suppr);
        tbody.appendChild(tr);
        tbody.appendChild(tr);
    });
    calcTotal();
}

// code pour filtrer  par categories 
  let blocGuitars = document.getElementById('guitares');
  let navGuitars = document.getElementById('nav-guitares');
  let navBasses = document.getElementById('nav-basses');
  let navUkeleles = document.getElementById('nav-ukeleles');
  let navAll = document.getElementById('nav-all');
  let titleAll = document.getElementById('titleAll');

  navGuitars.addEventListener('click',function(){
    blocGuitars.classList="row onlyGuitars"; 
    titleAll.innerHTML="Les guitares";  
  });
  navBasses.addEventListener('click',function(){
    blocGuitars.classList="row onlyBasses";
    titleAll.innerHTML="Les basses"; 
  });
  navUkeleles.addEventListener('click',function(){
    blocGuitars.classList="row onlyUkeleles"; 
    titleAll.innerHTML="Les Ukélélés";   
  });
  navAll.addEventListener('click',function(){
    blocGuitars.classList="row onlyAll";
    titleAll.innerHTML="Nos instruments";    
  });

// affichages des produits à partir du json
function showInstruments() {
    const products = obj;
    let allGuitares = document.getElementById('guitares');
    let allBasses = document.getElementById('basses');
    let allUkuleles = document.getElementById('ukeleles');

    products.forEach((item) => {
        let card = document.createElement('div');
        let cardImgTop = document.createElement('img');
        let cardBody = document.createElement('div');
        let cardTitle = document.createElement('h5');
        let cardText = document.createElement('p');
        let wrapperPrice = document.createElement('p');
        let price = document.createElement('span');
        let wrapperRef = document.createElement('p');
        let ref = document.createElement('span');
        let addCardBtn = document.createElement('a');

        cardTitle.textContent = item.name;
        cardImgTop.src = ('assets/img/' + item.img);
        cardText.textContent = item.desc;
        price.textContent = item.price;
        ref.textContent = item.ref;
        addCardBtn.textContent = 'Ajouter au panier';
        addCardBtn.setAttribute('data-id', item.id)

        card.classList.add('card', 'col-md-4');
        cardImgTop.classList.add('card-img-top');
        cardTitle.classList.add('card-body');
        cardTitle.classList.add('card-title');
        cardText.classList.add('card-text');
        price.classList.add('price');
        ref.classList.add('ref');
        addCardBtn.classList.add('btn', 'btn-primary', 'addCard');

        card.appendChild(cardImgTop);
        card.appendChild(cardBody);
        card.appendChild(cardTitle);
        card.appendChild(cardText);
        card.appendChild(wrapperPrice);
        card.appendChild(price);
        card.appendChild(wrapperRef);
        card.appendChild(ref);
        card.appendChild(addCardBtn);

        if (products[i].cat == 'guitare') {
            allGuitares.appendChild(card);
        } else if (products[i].cat == 'basse') {
            allBasses.appendChild(card);
        } else {
            allUkuleles.appendChild(card);
        }
    });
}


// Cristina added :
// Add active class to the current button (highlight it)
var navbarList = document.getElementById("main-menu");
var navitems = navbarList.getElementsByClassName("list");
for (var i = 0; i < navitems.length; i++) {
    navitems[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

