const listeProduit = document.getElementById("liste-produit")
let produits = listeProduit.children
let boutonRetirer = []
let boutonAugmenter = []
let boutonAjouter = []
let buyer = document.getElementById("id_compte") ? document.getElementById("id_compte").textContent : "Random"+ Math.random()*10000
/* Liste des produits */
let panier = {
    owner : buyer,
    produits: []
}

function checkProduit(produit, tableau){
    for(let obj of tableau){
        if(obj.nomProduit === produit){
            return true
        }
    }
    return false
}

for(let i = 0; i < produits.length; i++){
    let produit = document.getElementById("nom_produit"+i).textContent
    let prixParKilo = document.getElementById("prix"+i).textContent
    let lienImage = document.getElementById("img"+i).getAttribute("src")
    boutonRetirer.push(document.getElementById("retirer"+i))
    boutonAugmenter.push( document.getElementById("augmenter"+i))
    boutonAjouter.push(document.getElementById("ajouter"+i))
    let quantiteTotaleProduit = document.getElementById("quantite_totale_produit"+i)
    let quantiteProduit = document.getElementById("quantite_produit"+i)
    quantiteProduit.value = 0

    boutonRetirer[i].addEventListener("click",()=>{
        
        if (parseInt(quantiteProduit.value, 10) > 0) {
            quantiteProduit.value = parseInt(quantiteProduit.value,10) - 1 
        }
    })

    
    boutonAugmenter[i].addEventListener("click",()=>{
        if (parseInt(quantiteTotaleProduit.textContent,10) > parseInt(quantiteProduit.value, 10)) {
            quantiteProduit.value = parseInt(quantiteProduit.value, 10)+  1
        }
    })

    boutonAjouter[i].addEventListener("click", ()=>{
        if (parseInt(quantiteTotaleProduit.textContent,10) >= parseInt(quantiteProduit.value, 10)) {
            quantiteTotaleProduit.textContent = parseInt(quantiteTotaleProduit.textContent,10) - parseInt(quantiteProduit.value, 10)
            

            if (checkProduit(produit, panier.produits)) {
                panier.produits[produit] += parseInt(quantiteProduit.value, 10)
                console.log(produit+": augmenté")
            }else{
                panier.produits.push({
                    nomProduit: produit,
                    quantite: parseInt(quantiteProduit.value, 10), 
                    prix : parseInt(prixParKilo, 10),
                    prixTotale: prixParKilo*parseInt(quantiteProduit.value, 10),
                    image: lienImage
                })
                    localStorage.setItem("commande",JSON.stringify(panier))
            }
            /* panier.produitsEtQuantite[produit].prixParKilo = parseInt(document.getElementById("prix"+i).textContent,10)
            panier.produitsEtQuantite[produit].prixTotale = panier.produitsEtQuantite[produit].prixParKilo * panier.produitsEtQuantite[produit] */
            
            quantiteProduit.value = 0
            
        }
        console.log(panier)
    })
}

export {panier, checkProduit};