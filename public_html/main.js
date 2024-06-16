function toggle(name) {
    for (let i = 1; i <= 6; i++) {
        if (i == name) {
            var f = document.getElementById(i);

            if (f.style.display == "block") {
                f.style.display = "none";
            }
            else {
                f.style.display = "block";
            }
        }
        else {
            var n = document.getElementById(i);
            n.style.display = "none";
        }
    }
}

function utoggle(name) {
    for (let j = 7; j <= 8; j++) {
        if (j == name) {
            var x = document.getElementById(j);
            x.reset();

            x.style.display = "block";
        }
    }
}

function autoFillM(id, title, year, genre, price, actor) {
    document.getElementById('EditM0').value = id;
    document.getElementById('EditM1').value = title;
    document.getElementById('EditM2').value = year;
    document.getElementById('EditM3').value = genre;
    document.getElementById('EditM4').value = price;
    document.getElementById('EditM5').value = actor;

    document.getElementById('EditM1').placeholder = title;
    document.getElementById('EditM2').placeholder = year;
    document.getElementById('EditM4').placeholder = price;
    document.getElementById('EditM5').placeholder = actor;

    return true;
}

function autoFillA(id, actor) {
    document.getElementById('EditA0').value = id;
    document.getElementById('EditA1').value = actor;

    document.getElementById('EditA1').placeholder = actor;

    return true;
}

function validate(form) {
    var ok = 1;
    var msg = "";

    /* Main validation loop */
    for (var i = 0; i < form.length; i++) {
        /* Checks for empty forms, or just spaces */
        if (form.elements[i].value.trim() == "") 
        {
            msg += "The field '" + form.elements[i].name + "' cannot be left empty.\n";
            ok = 0;
        }
        /* Checks for forms with illegal characters in movie name */
        if(form.elements[i].name == 'movie')
        {
            if (/[^A-Za-z0-9-.,#:!? ]/.test(form.movie.value))
            {
                msg += "The field '" + form.movie.name + "' can only contain letters, numbers, and certain punctuation.\n";
                ok = 0;
            } 
        }
        /* Checks for forms with illegal characters in actor name, only in movie forms that contain an actor field */
        if(form.elements[i].name == 'actor'){
            if (/[^A-Za-z-., ]/.test(form.actor.value))
            {
                msg += "The field '" + form.actor.name + "' can only contain letters, hyphens, periods and commas.\n";
                ok = 0;
            }
        }
    }

    for (var i = 0; i < form.length; i++) {
        
    }

    if (ok) {
        return true;
    }
    else {
        alert(msg);
        return false;
    }
}

function updateMsgM(name) {
    x = confirm("Update Movie: '" + name + "'?");
    if (x) {
        utoggle(7);
    }
    return x;
}

function updateMsgA(name) {
    x = confirm("Update Actor/Actress: '" + name + "' ?");
    if (x) {
        utoggle(8);
    }
    return x;
}

function deleteMsgM(name) {
    return confirm("Delete Movie: '" + name + "' ?" +
        "\nThis action cannot be undone!");
}

function deleteMsgA(name) {
    return confirm("Delete Actor/Actress: '" + name + "' ?" +
        "\nThis will also delete all Movie associated with '" + name + "'." +
        "\nThis action cannot be undone!");
}

function movieE(id, title, year, genre, price, actor) {
    updateMsgM(title);
    autoFillM(id, title, year, genre, price, actor);
    return false; //return false, to avoid url from being changed
}

function actorE(id, actor) {
    updateMsgA(actor);
    autoFillA(id, actor);
    return false; //return false, to avoid url from being changed
}