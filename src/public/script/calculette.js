/* In the editor this pen don't work, because i have some problem with the "eval" function *

// Obtenir les touches du documents
var touches = document.querySelectorAll('#calculette span');

// Initialisation d'un tableau d'opérateurs.
var operateurs = ['/', 'x', '-', '+'];

// Flag : Une décimale a été ajoutée?
var decimaleAjoute = false;

/* 
 * Ajout dynamique d'une fonction sur les touches : 
 * - Un évênement on click sur toutes les touches qui permettra d'éfféctuer les opérations. 
 */
/*for(var i = 0; i < touches.length; i++) {
	touches[i].onclick = function(e) {
	
		// 1) Obtenir les valeurs des boutons et de l'écran.
		var ecran = document.querySelector('.ecran');
		var valeurEcran = ecran.innerHTML;
		var valeurBouton = this.innerHTML;
    
		// 2) Traitement des différents boutons et évaluation finale.
		
		// Touche "reset".
		if(valeurBouton == 'C') {
			
			// Reset écran et reset flag decimale.
			ecran.innerHTML = '';
			decimaleAjoute = false;
		
		// Touche "=".
		} else	if(valeurBouton == '=') {
      			
			// Initialisation de la variable de calcul par rapport
			// à l'affichage à l'écran.
			var calcul = valeurEcran;
			
			// Obtention du dernier caractère.
			var dernierCaractere = valeurEcran[valeurEcran.length - 1];
			
			// Dans notre variable de calcul : Remplacement de "x" par "*".
			calcul = calcul.replace(/x/g, '*');
			
			// Si le calcul se termine par un "." ou un opérateur, on enlève 
			// cet opérateur.
			if(operateurs.indexOf(dernierCaractere) > -1 
			|| dernierCaractere == '.') {
				calcul = calcul.replace(/.$/, '');
			}
			// Si il y a un calcul : utilisation de Eval pour que l'écran 
			// change de valeur.
      
			if(calcul) {
				ecran.innerHTML = eval(calcul);
			}
			decimaleAjoute = false;

		} else if (operateurs.indexOf(valeurBouton) > -1) {		 
			
			/* 
			 * Il reste quelques problèmes : 
			 * 1. Le calcul avec deux opérateurs successifs doivent être 
			 * interdits.
			 * 2. Le calcul ne peut pas commencer par un opérateur, mis
			 * à part un "-".
			 * 3. Le calcul avec plus d'une décimale doit être interdit.
			 *
			
			// Obtention du dernier caractère de l'écran.
			var dernierCaractere = valeurEcran[valeurEcran.length - 1];
			
			// Ajout de l'opérateur seulement si l'écran n'a pas d'opérateur
			// comme dernier caractère.
			
			// Reset l'écran si l'écran vaut "-" et qu'on presse "+".
			if (valeurEcran == '-' 
			&& valeurBouton == '+') {
				ecran.innerHTML = '';
			} 
			// Ajout "-" si l'écran est vide et qu'on presse "-".
			else if (valeurEcran == ''
			&& valeurBouton == '-') {				
				ecran.innerHTML = valeurBouton;
			} 
			// Si il y a quelque chose dans l'écran et que ce n'est pas -
			else if (valeurEcran != '' 
			&& operateurs.indexOf(dernierCaractere) == -1) {
				ecran.innerHTML += valeurBouton;
			}
			
			// Si un opérateur existait déja à la fin, alors on le remplace
			// par le nouveau.
			if (operateurs.indexOf(dernierCaractere) > -1 
			&& valeurEcran.length > 1) {
			
				// Ici, '.$' signifie la fin de  la chaine de caractère,
				// donc n'importe quel caractère (qui sera un opérateur)
				// a la fin de l'écran vas être remplacé par le nouveau 
				// opérateur.
				ecran.innerHTML = valeurEcran.replace(/.$/, valeurBouton);
			}
			
			decimaleAjoute =false;
		
		} else if (valeurBouton == '.') {
		
			// maintenant, seulement le problème de décimale est restant. Nous
			// le resolvons en utilisant un flag quand la décimale est déja 
			// ajouté. Il sera reset quand un "=" or reset sera préssé.
			if(!decimaleAjoute) {
				ecran.innerHTML += valeurBouton;
				decimaleAjoute = true;
			}
		} else {
      
			// Si c'est une autre touche que égal, ajout à la suite de l'écran.		
			ecran.innerHTML += valeurBouton;
		}
		
		// Prevent page jumps
		e.preventDefault();
	} 
}
*/





calc_array = new Array();
var calcul=0;
var pas_ch=0;
function $id(id)
{
        return document.getElementById(id);
}
function f_calc(id,n)
{
        if(n=='ce')
        {
                initialiser_calc(id);
        }
        else if(n=='=')
        {
                if(calc_array[id][0]!='=' && calc_array[id][1]!=1)
                {
                        eval('calcul='+calc_array[id][2]+calc_array[id][0]+calc_array[id][3]+';');
                        calc_array[id][0] = '=';
                        $id(id+'_resultat').value=calcul;
                        calc_array[id][2]=calcul;
                        calc_array[id][3]=0;
                }
        }
        else if(n=='+-')
        {
                $id(id+'_resultat').value=$id(id+'_resultat').value*(-1);
                if(calc_array[id][0]=='=')
                {
                        calc_array[id][2] = $id(id+'_resultat').value;
                        calc_array[id][3] = 0;
                }
                else
                {
                        calc_array[id][3] = $id(id+'_resultat').value;
                }
                pas_ch = 1;
        }
        else if(n=='nbs')
        {
                if($id(id+'_resultat').value<10 && $id(id+'_resultat').value>-10)
                {
                        $id(id+'_resultat').value=0;
                }
                else
                {
                        $id(id+'_resultat').value=$id(id+'_resultat').value.slice(0,$id(id+'_resultat').value.length-1);
                }
                if(calc_array[id][0]=='=')
                {
                        calc_array[id][2] = $id(id+'_resultat').value;
                        calc_array[id][3] = 0;
                }
                else
                {
                        calc_array[id][3] = $id(id+'_resultat').value;
                }
        }
        else
        {
                        if(calc_array[id][0]!='=' && calc_array[id][1]!=1)
                        {
                                eval('calcul='+calc_array[id][2]+calc_array[id][0]+calc_array[id][3]+';');
                                $id(id+'_resultat').value=calcul;
                                calc_array[id][2]=calcul;
                                calc_array[id][3]=0;
                        }
                        calc_array[id][0] = n;
        }
        if(pas_ch==0)
        {
                calc_array[id][1] = 1;
        }
        else
        {
                pas_ch=0;
        }
        document.getElementById(id+'_resultat').focus();
        return true;
}
function add_calc(id,n)
{
        if(calc_array[id][1]==1)
        {
                $id(id+'_resultat').value=n;
        }
        else
        {
                $id(id+'_resultat').value+=n;
        }
        if(calc_array[id][0]=='=')
        {
                calc_array[id][2] = $id(id+'_resultat').value;
                calc_array[id][3] = 0;
        }
        else
        {
                calc_array[id][3] = $id(id+'_resultat').value;
        }
        calc_array[id][1] = 0;
        document.getElementById(id+'_resultat').focus();
        return true;
}
function initialiser_calc(id)
{
        $id(id+'_resultat').value=0;
        calc_array[id] = new Array('=',1,'0','0',0);
        document.getElementById(id+'_resultat').focus();
        return true;
}
function key_detect_calc(id,evt)
{
        if((evt.keyCode>95) && (evt.keyCode<106))
        {
                var nbr = evt.keyCode-96;
                add_calc(id,nbr);
        }
        else if((evt.keyCode>47) && (evt.keyCode<58))
        {
                var nbr = evt.keyCode-48;
                add_calc(id,nbr);
        }
        else if(evt.keyCode==107)
        {
                f_calc(id,'+');
        }
        else if(evt.keyCode==109)
        {
                f_calc(id,'-');
        }
        else if(evt.keyCode==106)
        {
                f_calc(id,'*');
        }
        else if(evt.keyCode==111)
        {
                f_calc(id,'');
        }
        else if(evt.keyCode==110)
        {
                add_calc(id,'.');
        }
        else if(evt.keyCode==190)
        {
                add_calc(id,'.');
        }
        else if(evt.keyCode==188)
        {
                add_calc(id,'.');
        }
        else if(evt.keyCode==13)
        {
                f_calc(id,'=');
        }
        else if(evt.keyCode==46)
        {
                f_calc(id,'ce');
        }
        else if(evt.keyCode==8)
        {
                f_calc(id,'nbs');
        }
        else if(evt.keyCode==27)
        {
                f_calc(id,'ce');
        }
        return true;
}

