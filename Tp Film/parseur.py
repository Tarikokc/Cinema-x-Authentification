import fitz
import re

def extraction_text(doc):
    
    compteur = 0 
    
    # Tableau dans le quel vont apparaître les positions des caractères
    positions_pour = []
    positions_carre = []
    positions_1 = []
    positions_vin = []
    positions_sav = []
    # Tableaux permettant l"'extraction des elements voulu
    tab_extraction = []
    
    tab_etapes =[]
    preparation = []

    # Cherchez la chaîne de caractères dans le document
    chaine = input("Nom de la recette : ")
    

    # Parcourez chaque page du document
    for i in range(len(doc)):
        page = doc[i]
        find = page.search_for(chaine)
        if len(find) > 0:
            # Extraire le texte de la première occurrence de la chaîne de caractères
            text = page.get_text("text")
            break
            
    # Vérifiez si la chaîne de caractères est présente dans le document
    if len(text) > 0:
        # Convertit le texte trouvé en string
        text_str = str(text)
    else:
        print("La chaîne de caractères n'a pas été trouvée dans le document.")
    
    while True :
        
            # Trouve la position du premier caractères
            pour = text_str.find('Pour',compteur)
            # Trouve la position du premier caractères
            debut_recette = text_str.find('■',compteur)
            
            # Trouve la position du premier caractères
            debut_etape = text_str.find("1.")
            
            # Trouve le conseil vin
            vin = text_str.find("Notre conseil vin")
            
            sav = text_str.find("Saveurs")
            
            if debut_recette == -1 : 
                break
            
            # On ajoute l'emplacement des caracteres dans les tableaux
            positions_pour.append(pour)
            positions_carre.append(debut_recette)
            positions_1.append(debut_etape)
            positions_vin.append(vin)
            positions_sav.append(sav)
            
            
            compteur = debut_recette + 1   
            
            # Isoler le texte que l'on veut extraire
            titre = text_str[:pour]
            # Extrait pour combien de personnes, le temps de cuisson etc 
            quantite_personne = text_str[pour:debut_recette]
            quantite_personne = quantite_personne.replace("\n", "")
            

            # Extrait les ingrédients, les quantités et les mesures
            ingredients = text_str[debut_recette:debut_etape]
            # Extrait les etapes à suivre
            etapes = text_str[debut_etape:vin]
            # Extrait le conseil vin 
            conseil_vin = text_str[vin:sav]

            # Remplace les caractères de saut de ligne par un espace vide
            # etapes = etapes.replace("\n", "")
            
            # Decoupe le texte à chaque fois qu'il trouve une nouvelle étape et créer des tableaux de tableaux  et les ajoutent dedans 
            lignes = etapes.splitlines()
            sous_liste = []
            for ligne in lignes:
                if ligne.startswith(('1. ', '2. ', '3. ', '4. ', '5. ', '6. ', '7. ', '8. ', '9. ')):
                    if sous_liste:
                        tab_etapes.append(sous_liste)
                        sous_liste = []
                sous_liste.append(ligne)
            if sous_liste:
                tab_etapes.append(sous_liste)
                
                    
            # sépare les ingrédients en utilisant le caractère "■" comme séparateur
            ingredient_lignes = ingredients.split("■")

            # Crée une liste vide qui va contenir les ingrédients séparés
            ingredients_sep = []

            # Pour chaque ligne d'ingrédient
            for ingredient_ligne in ingredient_lignes:
                # On enlève les espaces inutiles en début et fin de chaque ligne
                ingredient = ingredient_ligne.strip()
                
                # Si la ligne d'ingrédient n'est pas vide
                if ingredient:
                    # On initialise les variables pour la quantité, la mesure et le nom de l'ingrédient
                    quantite, mesure, nom = "", "", ingredient
                    
                    # Pour chaque mot dans la ligne d'ingrédient
                    for mot in ingredient.split(" "):
                        # Si le mot est un nombre
                        if mot.isdigit():
                            # On enregistre le mot comme la quantité de l'ingrédient
                            quantite = mot
                        # Si le mot est une mesure
                        elif mot in ["ml","cl","dl","l","g","kg","cm", "c.","à café","à café rase","à café bombée","à soupe","à soupe rase","à soupe bombée","branches","sachets","feuilles","bouquets","poignées","tiges","tranches","bottes","pincées", "dosettes", "brins", "verres", "gouttes", "le jus","quartier", "filets", "rouleaux", "pots", "grappes", "brins",
                        "branche", "sachet", "feuille", "bouquet", "poignée", "tige", "tranche", "botte", "pincée", "dosette", "brin", "verre", "goutte", "le jus", "quartier", "filet", "rouleau", "pot", "grappe", "brin"]:
                            # On enregistre le mot comme la mesure de l'ingrédient
                            mesure = mot 
                        else:
                            # On concatène tous les autres mots pour obtenir le nom de l'ingrédient               
                            nom = " ".join([nom])
                    
                    # On ajoute l'ingrédient séparé à la liste ingredients_sep
                    
                    ingredients_sep.append({"Ingrédient ": nom.strip(), "Quantité ": quantite, "Mesure ": mesure})
                    preparation.append({"Pour : " })
                
            return ingredients_sep

                    
            # return quantite_personne            
            # return tab_etapes
            # return conseil_vin
             
doc = fitz.open(input("Nom du document(pdf) ? : "))
print(extraction_text(doc))
