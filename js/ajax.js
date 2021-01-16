window.addEventListener('DOMContentLoaded', (e) => {
    if (document.getElementById('count_artikelen')) {
        totaalWinkelwagen();
    }

    if (document.getElementById('kassaBody')) {
        LaadWinkelwagen();
    }
});

function InitAJAX()
{
    var objxml;
    var IEtypes = ["Msxml2.XMLHTTP.6.0", "Msxml2.XMLHTTP.3.0", "Microsoft.XMLHTTP"];

    try
    {
        // Probeer het eerst op de "moderne" standaardmanier
        objxml = new XMLHttpRequest();
    }
    catch (e)
    {
        // De standaardmanier werkte niet, probeer oude IE manieren
        for (var i = 0; i < IEtypes.length; i++)
        {
            try
            {
                objxml = new ActiveXObject(IEtypes[i]);
            }
            catch (e)
            {
                continue;
            }
        }
    }

    // Lever het XHR object op
    return objxml;
}

function Zoeken(myID){

    var xmlHTTP = InitAJAX();

    var url = "backend/controllers/uitlees.php?artikelnr=" + myID;

    xmlHTTP.onreadystatechange = function (){

        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200){

            var result = xmlHTTP.responseText;

            document.getElementById('resultaat').innerHTML = result;
        }
    }
    http = new XMLHttpRequest();
    xmlHTTP.open ("GET", url, true);
    xmlHTTP.send(null);

    return false;

}

function Informatiezoeken(){

    let xmlHTTP = InitAJAX();

    let a = document.getElementById('a');

    let imagezoeken = $a.getElementsByTagName("img")[0];

    console.log(imagezoeken);

    let url = "uitlees.php?imageid=" + imagezoeken;

    xmlHTTP.onreadystatechange = function (){

        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200){

            var result = xmlHTTP.responseText;

            document.getElementsByClassName('resultaat').innerHTML = result;
        }
    }

    xmlHTTP.open ("GET", url, true);
    xmlHTTP.send(null);

}

function InWinkelwagen(artikelnr) {
    var xmlHTTP = InitAJAX();
    var data = "artikelnr=" + artikelnr;
    var url = "backend/controllers/manage_winkelwagen.php";
    // var xmlHTTP = new XMLHttpRequest();

    xmlHTTP.withCredentials = true;

    xmlHTTP.onreadystatechange = function (){

        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200){

            var result = JSON.parse(xmlHTTP.responseText);

            document.getElementById('count_artikelen').innerHTML = result.artikelen;
        }
    }

    xmlHTTP.open("POST", url, true);
    xmlHTTP.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHTTP.send(data);
}

function totaalWinkelwagen() {
    var xmlHTTP = InitAJAX();
    var url = "backend/controllers/aantal_winkelwagen.php";

    xmlHTTP.withCredentials = true;

    xmlHTTP.onreadystatechange = function (){

        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200){

            var result = JSON.parse(xmlHTTP.responseText);

            document.getElementById('count_artikelen').innerHTML = result.artikelen;
        }
    }

    xmlHTTP.open("GET", url, true);
    xmlHTTP.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHTTP.send();    
}

function LaadWinkelwagen() {
    // document.getElementById('kassaBody').innerHTML = "test";
    var xmlHTTP = InitAJAX();
    var url = "backend/controllers/loading_winkelwagen.php";

    xmlHTTP.withCredentials = true;

    xmlHTTP.onreadystatechange = function (){

        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200){

            var result = xmlHTTP.responseText;

            // document.getElementById('loading').innerHTML = '';
            document.getElementById('kassaBody').innerHTML = result;
        }
    }
    document.getElementById('kassaBody').innerHTML = `
    <div class="text-center m-5" id='loading'>
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>`;
    LaadWinkelwagenPrijze()
    xmlHTTP.open("GET", url, true);
    xmlHTTP.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHTTP.send();

}

function LaadWinkelwagenPrijze() {
    var xmlHTTP = InitAJAX();
    var url = "backend/controllers/loading_prices.php";

    xmlHTTP.withCredentials = true;

    xmlHTTP.onreadystatechange = function (){

        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200){

            var result = xmlHTTP.responseText;

            // document.getElementById('loading').innerHTML = '';
            document.getElementById('artikel-prijzen').innerHTML = result;
        }
    }
    document.getElementById('artikel-prijzen').innerHTML = `
    <div class="text-center m-5 w-100" id='loading'>
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>`;
    xmlHTTP.open("GET", url, true);
    xmlHTTP.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHTTP.send();
}

function VerwijderArtikel(artikelnr, artikelNaam) {
    var xmlHTTP = InitAJAX();
    var data = "artikelnr=" + artikelnr;
    var url = "backend/controllers/verwijder_winkelwagen.php";
    // var xmlHTTP = new XMLHttpRequest();

    xmlHTTP.withCredentials = true;

    xmlHTTP.onreadystatechange = function (){

        if (xmlHTTP.readyState == 4 && xmlHTTP.status == 200){

            // var result = xmlHTTP.responseText;

            document.getElementById('artikel_verwijderd').innerHTML = artikelNaam + " # " + artikelnr + " successvol verwijderd!";
            LaadWinkelwagen();
            totaalWinkelwagen();
        } else {
            document.getElementById('artikel_verwijderd').innerHTML = artikelNaam + " # " + artikelnr + " is niet successvol verwijderd!";
        }
    }

    xmlHTTP.open("POST", url, true);
    xmlHTTP.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHTTP.send(data);
}
