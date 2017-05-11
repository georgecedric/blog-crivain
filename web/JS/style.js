function validernewsletter(){
 var Email = document.forms['newsletter'].newsletter_email.value;
if (Email.search(/^[_a-z0-9-]+(.[_a-z0-9-]+)*[^._-]@[a-z0-9-]+(.[a-z0-9]{2,4})*$/) == -1)
    {
    alert ('Entrez une adresse Email valide');
    document.forms['newsletter'].newsletter_email.focus();


    return false;
    }

    if(document.forms['newsletter'].newsletter_name.value == "")
        {
        alert ('Veuillez entrer votre Nom ou Pseudo');
        document.forms['newsletter'].newsletter_name.focus();
        return false;

        }
    else {
    return true;
    }
}



function validermessage(){
  var Email = document.forms['contact'].contact_email.value;
    
if (Email.search(/^[_a-z0-9-]+(.[_a-z0-9-]+)*[^._-]@[a-z0-9-]+(.[a-z0-9]{2,4})*$/) == -1)
    {
    alert ('Entrez une adresse Email valide');
    document.forms['contact'].contact_email.focus();
    return false;
    }

    if(document.forms['contact'].contact_author.value == "")
        {
        alert ('Veuillez entrer votre Nom ou Pseudo');
        document.forms['contact'].contact_author.focus();
        return false;

        }
    if(document.forms['contact'].contact_title.value == "")
        {
        alert ('Veuillez entrer un titre pour votre message');
        document.forms['contact'].contact_title.focus();
        return false;

        }
    if(document.forms['contact'].contact_content.value == "")
        {
        alert ('Veuillez entrer votre message');
        document.forms['contact'].contact_content.focus();
        return false;

        }
    else {
    return true;
    }
}

function validercommentaire(){
 

    if(document.forms['comment'].comment_author.value == "")
        {
        alert ('Veuillez entrer votre Nom ou Pseudo');
        document.forms['comment'].comment_author.focus();
        return false;

        }
    if(document.forms['comment'].comment_content.value == "")
        {
        alert ('Veuillez entrer un message');
        document.forms['comment'].comment_content.focus();
        return false;

        }
    else {
    return true;
    }
    
}
    function validerreponse(){
 

    if(document.forms['reply'].reply_author.value == "")
        {
        alert ('Veuillez entrer votre Nom ou Pseudo');
        document.forms['reply'].reply_author.focus();
        return false;

        }
    if(document.forms['reply'].reply_content.value == "")
        {
        alert ('Veuillez entrer un message');
        document.forms['reply'].reply_content.focus();
        return false;

        }
    else {
    return true;
    }
}