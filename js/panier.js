
console.log("Nous sommes dans le pannier")
const commandeEtFormulaire = document.getElementById("commande-et-formulaire")
try {
    const commande = document.getElementById("commande")
} catch (e) {
    console.log(e)
    const commande = document.createElement("div")
    commande.setAttribute("id","commande")
}


const sousTitreResumeCommande = document.getElementById("titre-formulaire")
sousTitreResumeCommande.textContent = "Résumé de la commande"
const nombreArticle = document.getElementById("nombre-articles")
let contenuCommande = JSON.parse(localStorage.getItem("commande"))
let formulaire = document.getElementById("formulaire")
let resumeCommande = document.getElementById("resume-commande")
let totalCommande = document.getElementById("total-commande")
let retirer = []
let produit = ""
let total = 0

let i = 0
if (contenuCommande) {
    console.log(contenuCommande)
    
    contenuCommande.produits.forEach(element => {
        let article = `<div class="article" id="article${i}">
            <div class="article-produit">
                <img class="img-article" src="${element.image}">
                <div class="info-article">
                    <div class="nom-produit" id="nom-article${i}">${element.nomProduit}</div>
                    <div class="prix">${element.prix} FCFA / KG</div>
                    <div class="quantite">Quantité : ${element.quantite} kg</div>
                </div>

            </div>
            <div class="total">
                <div class="prix-total-article">${element.prixTotale} FCFA</div>
                <button id="retirer${i}">retirer</button>
            </div>
        </div>`
        
        
        resumeCommande.innerHTML += `<p class="details" id="details${i}"><span class="details-quantite">${element.nomProduit} x ${element.quantite}  kg</span><span id="details-prix-total${i}" class="details-prix-total">${element.prixTotale}</span></p>`
        commande.innerHTML += article
        
        i++
    });

    for (let j = 0; j < contenuCommande.produits.length; j++) {
            retirer[j] = document.getElementById("retirer"+j)
            let article = document.getElementById("article"+j)
            let aRetirer = document.getElementById("nom-article"+j).textContent
            let detailsARetirer = document.getElementById("details"+j)
            retirer[j].addEventListener("click", ()=>{
                article.remove()
                detailsARetirer.remove()
                contenuCommande.produits = contenuCommande.produits.filter(produit => produit.nomProduit !== aRetirer)
                console.log(aRetirer)
                console.log(contenuCommande)
                i--
                nombreArticle.textContent = i <= 1 ? `${i} article` : `${i} articles`
                
                if (contenuCommande.produits.length === 0) {
                    commandeEtFormulaire.innerHTML = `<div><h3>Votre panier est vide</h3></div>`
                }
            totalCommande.textContent = renderTotal()
        })  
    }

    function renderTotal(){
        for (let i = 0; i < contenuCommande.produits.length; i++) {
            total += contenuCommande.produits[i].prixTotale 
        }
        return total
    }
    totalCommande.textContent = renderTotal()
    

}else{
    commandeEtFormulaire.innerHTML = `<div><h3>Votre panier est vide</h3></div>`
}

nombreArticle.textContent = i <= 1 ? `${i} article` : `${i} articles`
