// bordures rouges si incorrectes sinon vertes
function surligne(champ, erreur) {
    if (erreur)
    { champ.style.border = '2px solid red'; } 
    else
    {
        champ.style.border = "2px solid #76c38f";
    }
}

// champ name ok si nb de caracteres compris entre 2 et 25
function verifFirstName(champ)
{
    if(champ.value.length < 2 || champ.value.lenght > 25)
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}

// champ subject ok si nb de caracteres compris entre 2 et 25
function verifLastname(champ)
{
    if(champ.value.length < 2 || champ.value.lenght > 25)
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}


// champ mail ok si lettres @ et . présents
function verifMail(champ)
{
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value))
    {
        surligne(champ, true);
        return false;
    }
    else{
        surligne(champ, false);
        return true;
    }
}



// champ message ok si nb de caracteres compris entre 2 et 25
function verifMessage(champ)
{
if(champ.value.length < 2 || champ.value.lenght > 300)
    {
        surligne(champ, true);
        return false;
    }
    else
    {
        surligne(champ, false);
        return true;
    }
}

//formulaire ok si verif nom mail subject et message ok
function verifForm(f)
{
    var nameOk = verifName(f.name);
    var mailOk = verifMail(f.mail);
    var subjectOk = verifSubject(f.subject);
    var messageOk = verifMessage(f.message);

    if(nameOk && mailOk && subjectOk && messageOk)
        return true;
    else
    {
        alert("Please fill the fields correctly.");
        return false;
    }
}