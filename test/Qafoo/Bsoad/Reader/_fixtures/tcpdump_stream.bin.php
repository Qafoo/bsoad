<?php

return array (
  0 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/templates/start.tpl',
       'curlCommand' => 'curl -i -X \'GET\' \'http://glamster/templates/start.tpl\' -H \'Connection: keep-alive\' -H \'X-Requested-With: XMLHttpRequest\' -H \'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19\' -H \'Accept: */*\' -H \'Referer: http://glamster/\' -H \'Accept-Encoding: gzip,deflate,sdch\' -H \'Accept-Language: en-US,en;q=0.8\' -H \'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /templates/start.tpl HTTP/1.1',
        1 => 'Host: glamster',
        2 => 'Connection: keep-alive',
        3 => 'X-Requested-With: XMLHttpRequest',
        4 => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        5 => 'Accept: */*',
        6 => 'Referer: http://glamster/',
        7 => 'Accept-Encoding: gzip,deflate,sdch',
        8 => 'Accept-Language: en-US,en;q=0.8',
        9 => 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'headers' => 
      array (
        'Host' => 'glamster',
        'Connection' => 'keep-alive',
        'X-Requested-With' => 'XMLHttpRequest',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        'Accept' => '*/*',
        'Referer' => 'http://glamster/',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'en-US,en;q=0.8',
        'Accept-Charset' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'Content-Type: application/octet-stream',
        2 => 'Accept-Ranges: bytes',
        3 => 'Content-Length: 2182',
        4 => 'Date: Mon, 23 Apr 2012 08:04:57 GMT',
        5 => 'Server: lighttpd/1.4.28',
      ),
       'headers' => 
      array (
        'Content-Type' => 'application/octet-stream',
        'Accept-Ranges' => 'bytes',
        'Content-Length' => '2182',
        'Date' => 'Mon, 23 Apr 2012 08:04:57 GMT',
        'Server' => 'lighttpd/1.4.28',
      ),
       'body' => '<div class="row">
    <div class="five columns">
        <h2>Über 10.000 Beauty-Produkte im Preisvergleich.</h2>
        <form class="nice" id="search" action="/s/" method="GET">
            <fieldset>
                <div class="row">
                    <div class="nine phone-three columns">
                        <input class="input-text phrase" type="text" name="phrase" placeholder="Suchbegriff eingeben…" />
                    </div>
                    <div class="three phone-one columns">
                        <button class="small black button radius" type="submit">
                            Search
                        </button>
                    </div>
                </div>
            </fieldset>
            <p class="searches">
                Suche zum Beispiel nach
                <a href="/s/Gucci">Gucci</a>,
                <a href="/s/Jil Sander">Jil Sander</a>,
                <a href="/s/Marc Jacobs">Marc Jacobs</a> oder
                <a href="/s/BOSS">BOSS</a>.
            </p>
            <p>Diese Onlineshops durchsuchen:</p>
            <ul class="block-grid mobile four-up incomplete">
                <li><input type="checkbox" checked="checked" name="bgsearch[]" value="all">Alle</input></li>
                <li><input type="checkbox" name="bgsearch[]" value="jalea">Jalea</input></li>
                <li><input type="checkbox" name="bgsearch[]" value="douglas">Douglas</input></li>
                <li><input type="checkbox" name="bgsearch[]" value="amazon">Amazon</input></li>
                <li><input type="checkbox" name="bgsearch[]" value="jalea">Jalea</input></li>
                <li><input type="checkbox" name="bgsearch[]" value="douglas">Douglas</input></li>
                <li><input type="checkbox" name="bgsearch[]" value="amazon">Amazon</input></li>
                <li><input type="checkbox" name="bgsearch[]" value="jalea">Jalea</input></li>
            </ul>
        </form>
    </div>
    <div class="seven columns hide-on-phones">
        <img src="/images/image-frontpage.png" alt="70% sparen" />
    </div>
</div>
<hr />
<div class="row">
    <div class="twelve columns" id="topsellers"></div>
</div>
',
    )),
  )),
  1 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/top/seller?count=50',
       'curlCommand' => 'curl -i -X \'GET\' \'http://api.session.glamster/top/seller?count=50\' -H \'Connection: keep-alive\' -H \'Origin: http://glamster\' -H \'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19\' -H \'Accept: application/json, text/javascript, */*; q=0.01\' -H \'Referer: http://glamster/\' -H \'Accept-Encoding: gzip,deflate,sdch\' -H \'Accept-Language: en-US,en;q=0.8\' -H \'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /top/seller?count=50 HTTP/1.1',
        1 => 'Host: api.session.glamster',
        2 => 'Connection: keep-alive',
        3 => 'Origin: http://glamster',
        4 => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        5 => 'Accept: application/json, text/javascript, */*; q=0.01',
        6 => 'Referer: http://glamster/',
        7 => 'Accept-Encoding: gzip,deflate,sdch',
        8 => 'Accept-Language: en-US,en;q=0.8',
        9 => 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'headers' => 
      array (
        'Host' => 'api.session.glamster',
        'Connection' => 'keep-alive',
        'Origin' => 'http://glamster',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        'Accept' => 'application/json, text/javascript, */*; q=0.01',
        'Referer' => 'http://glamster/',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'en-US,en;q=0.8',
        'Accept-Charset' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'X-Powered-By: PHP/5.4.0',
        2 => 'Access-Control-Allow-Origin: *',
        3 => 'Access-Control-Allow-Methods: POST, GET',
        4 => 'Content-Type: application/json',
        5 => 'Transfer-Encoding: chunked',
        6 => 'Date: Mon, 23 Apr 2012 08:04:57 GMT',
        7 => 'Server: lighttpd/1.4.28',
      ),
       'headers' => 
      array (
        'X-Powered-By' => 'PHP/5.4.0',
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'POST, GET',
        'Content-Type' => 'application/json',
        'Transfer-Encoding' => 'chunked',
        'Date' => 'Mon, 23 Apr 2012 08:04:57 GMT',
        'Server' => 'lighttpd/1.4.28',
      ),
       'body' => '[101,96,92,100,86,75,95,71,77,90,63,93,72,97,83,85,76,73,68,57,64,70,82,67,61,102,104,74,98,37,51,59,39,60,49,91,88,78,84,58,81,55,36,62,65,56,38,45,42,48]',
    )),
  )),
  2 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/product?productID%5B%5D=101&productID%5B%5D=38&productID%5B%5D=36&productID%5B%5D=61&productID%5B%5D=68',
       'curlCommand' => 'curl -i -X \'GET\' \'http://api.storage.glamster/product?productID%5B%5D=101&productID%5B%5D=38&productID%5B%5D=36&productID%5B%5D=61&productID%5B%5D=68\' -H \'Connection: keep-alive\' -H \'Origin: http://glamster\' -H \'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19\' -H \'Accept: application/json, text/javascript, */*; q=0.01\' -H \'Referer: http://glamster/\' -H \'Accept-Encoding: gzip,deflate,sdch\' -H \'Accept-Language: en-US,en;q=0.8\' -H \'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /product?productID%5B%5D=101&productID%5B%5D=38&productID%5B%5D=36&productID%5B%5D=61&productID%5B%5D=68 HTTP/1.1',
        1 => 'Host: api.storage.glamster',
        2 => 'Connection: keep-alive',
        3 => 'Origin: http://glamster',
        4 => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        5 => 'Accept: application/json, text/javascript, */*; q=0.01',
        6 => 'Referer: http://glamster/',
        7 => 'Accept-Encoding: gzip,deflate,sdch',
        8 => 'Accept-Language: en-US,en;q=0.8',
        9 => 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'headers' => 
      array (
        'Host' => 'api.storage.glamster',
        'Connection' => 'keep-alive',
        'Origin' => 'http://glamster',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        'Accept' => 'application/json, text/javascript, */*; q=0.01',
        'Referer' => 'http://glamster/',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'en-US,en;q=0.8',
        'Accept-Charset' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'X-Powered-By: PHP/5.4.0',
        2 => 'Access-Control-Allow-Origin: *',
        3 => 'Access-Control-Allow-Methods: PUT, GET',
        4 => 'Content-Type: application/json',
        5 => 'Transfer-Encoding: chunked',
        6 => 'Date: Mon, 23 Apr 2012 08:04:57 GMT',
        7 => 'Server: lighttpd/1.4.28',
      ),
       'headers' => 
      array (
        'X-Powered-By' => 'PHP/5.4.0',
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'PUT, GET',
        'Content-Type' => 'application/json',
        'Transfer-Encoding' => 'chunked',
        'Date' => 'Mon, 23 Apr 2012 08:04:57 GMT',
        'Server' => 'lighttpd/1.4.28',
      ),
       'body' => '{"total":"7834","products":[{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"36","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8803516579870.image.jpg","pictures":[],"title":"24h Solution hypoallergen Medilan Creme","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span>Hautpflege an der Grenze zur Medizin \\u2013  Medilan Skin Repair ist eine hochintensive, feuchtigkeitsspendende Therapiepflege zur Behandlung sehr trockener und gesch\\u00e4digter Haut. Die reichhaltige Pflege wurde speziell zur unterst\\u00fctzenden Behandlung von Ekzemen, Schuppenflechten, schmerzhaften Hauteinrissen und Hautjucken, tiefen Hautspalten an Lidwinkeln, Lippen, Fingern und F\\u00fc\\u00dfen sowie zur Narbenbehandlung entwickelt. Ebenfalls geeignet ist Medilan Skin Repair zur Pflege der typischen Hautirritationen bei Allergikern, Neurodermitikern, Diabetikern und Menschen, die berufsbedingt h\\u00e4ufigem Kontakt mit Wasser, entfettenden Duschzus\\u00e4tzen und K\\u00e4lte ausgesetzt sind oder sich einer Chemotherapie unterziehen m\\u00fcssen. Die Spezialpflege mit 24-Stunden-Wirkung legt sich wie ein heilendes Wundpflaster auf die zu behandelnden Hautstellen, wirkt entz\\u00fcndungshemmend und unterst\\u00fctzt die Wundheilung. Das Resultat: eine sichtbar ges\\u00fcndere, widerstandsf\\u00e4higere Haut. Frei von Konservierungsmitteln. F\\u00fcr M\\u00e4nner und Frauen geeignet.<\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            <div>\\n\\t\\t\\t\\t<h4>Anwendung<\\/h4>\\n\\t\\t\\t\\t<di>\\n\\t\\t\\t\\t\\t<p>\\n\\t\\t\\t\\t\\t\\tSpezielle Anwendung: Lokal und partiell bei \\u00e4u\\u00dferst trockenen oder strapazierten Hauterscheinungen und als unterst\\u00fctzende Therapiepflege. \\n\\t\\t\\t\\t\\t<\\/p>\\n\\t\\t\\t\\t<\\/div>\\n\\t\\t\\t<\\/div>\\n\\t\\t\\t<div>\\n\\t\\t\\t\\t<h4>Inhaltsstoffe<\\/h4>\\n\\t\\t\\t\\t<di>\\n\\t\\t\\t\\t\\t<p>\\n\\t\\t\\t\\t\\tAQUA (WATER), LANOLIN, CETEARYL ETHYLHEXANOATE, SQUALANE, CERA ALBA (BEESWAX), GLYCERIN, PANTHENOL, DECYL OLEATE, OCTYLDODECANOL, CERA MICROCRISTALLINA, ISOSTEARYL DIGLYCERYL SUCCINATE, MAGNESIUM STEARATE, POLYGLYCERYL-3 POLYRICINOLEATE, SORBITAN ISOSTEARATE, PARFUM (FRAGRANCE), ISOPROPYL MYRISTATE, MAGNESIUM SULFATE, BISABOLOL, ECHIUM PLANTAGINEUM SEED OIL, ALLANTOIN, CARDIOSPERMUM HALICACABUM EXTRACT, HELIANTHUS ANNUUS (SUNFLOWER) SEED OIL UNSAPONIFIABLES, BENZYL SALICYLATE, LIMONENE, ALPHA-ISOMETHYL IONONE, LINALOOL, COUMARIN\\n\\t\\t\\t\\t\\t<\\/p>\\n\\t\\t\\t\\t<\\/div>\\n\\t\\t\\t<\\/div>","vendor":"Hildegard Braukmann","categories":["Pflege","Gesicht","Tagespflege"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"25.95","availability":"100"}],"variantID":"40","variant":{"amount":"50 ml"},"ean":"","price":null,"availability":100}],"info":{"Series":"24h Solution hypoallergen","__units":[]},"rating":null},{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"38","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8803530670110.image.jpg","pictures":[],"title":"24h Solution hypoallergen Optimum 24h Creme","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span>Optimale 24h-Pflege f\\u00fcr sensible Haut \\u2013 Die wohltuende Rund-um-die-Uhr-Gesichtspflege verw\\u00f6hnt die Haut mit haut\\u00e4hnlichen Membranlipiden und multiaktiven Extrakten aus Chlorella-Algen, Plankton und Seefenchel. Die hautverwandten pflanzlichen Lipide sind die Basis dieses besonderen Pflegepr\\u00e4parates. Durch ihre lamellare Struktur, die der nat\\u00fcrlichen Barriereschicht der Haut sehr \\u00e4hnlich ist, werden sie von der Haut optimal akzeptiert und integriert. Die Creme unterst\\u00fctzt daher gezielt die nat\\u00fcrliche Schutzfunktion der Haut, reduziert Rauheit und steigert signifikant die Elastizit\\u00e4t und den Feuchtigkeitsgehalt der Haut. Frei von Konservierungsstoffen, Duftstoffen und Emulgatoren.<\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            <u><li>Eigenschaft:\\n                            feuchtigkeitsspendend,\\n                            beruhigend\\n                    <\\/li>\\n                    <li>Hauttyp:\\n                            Trockene Haut,\\n                            Sehr trockene Haut,\\n                            Empfindliche Haut\\n                    <\\/li>\\n            <\\/ul>","vendor":"Hildegard Braukmann","categories":["Pflege","Gesicht","Tagespflege"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"25.95","availability":"100"}],"variantID":"42","variant":{"amount":"50 ml"},"ean":"","price":null,"availability":100}],"info":{"Series":"24h Solution hypoallergen","__units":[]},"rating":null},{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"61","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8451908883594656.image.jpg","pictures":[],"title":"A Perfect World Antioxidant moisturizer with White Tea","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span>Neue Forschungsergebnisse verschiedener Universit\\u00e4ten zeigen, dass der inzwischen weltbekannte Wei\\u00dfe Tee einer der effektivsten Wirkstoffe ist, um die Haut vor den t\\u00e4glichen Belastungen durch Stress und Umweltbelastungen zu sch\\u00fctzen. Diese Gesichtspflege kombiniert die Kraft des Wei\\u00dfen Tees mit Zuckerrohr-Ferment, der die sch\\u00fctzende Wirkung des wei\\u00dfen Tees zus\\u00e4tzlich unterst\\u00fctzt. F\\u00fcr einen optimalen Feuchtigkeitshaushalt sorgen zudem Hagebutten\\u00f6l und Murumuru-Butter. Das Ergebnis: eine ideale Anti-Stress Creme, die die Haut st\\u00e4rkt und vor den Belastungen des Alltags sch\\u00fctzt.<\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            <u><li>Eigenschaft:\\n                            anti-aging,\\n                            sch\\u00fctzend\\n                    <\\/li>\\n                    <li>Hauttyp:\\n                            Normale Haut\\n                    <\\/li>\\n            <\\/ul>","vendor":"Origins","categories":["Pflege","Gesicht","Tagespflege"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"44.95","availability":"100"}],"variantID":"67","variant":{"amount":"50 ml"},"ean":"","price":null,"availability":100}],"info":{"Series":"A Perfect World","__units":[]},"rating":null},{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"68","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8809775071262.image.jpg","pictures":[],"title":"A Perfect World Moisturizer Age-Defence SPF 25","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span><\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            ","vendor":"Origins","categories":["Pflege","Gesicht","Tagespflege"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"44.95","availability":"100"}],"variantID":"74","variant":{"amount":"50 ml"},"ean":"","price":null,"availability":100}],"info":{"Series":"A Perfect World","__units":[]},"rating":null},{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"101","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8835551297566.image.jpg","pictures":[],"title":"Accessoires","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span><\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            <u><li>Farbe:\\n                            Puder-Gold\\n                    <\\/li>\\n                    <li>Ma\\u00dfe:\\n                            18 x 13 cm\\n                    <\\/li>\\n                    <li>Details:\\n                            Gl\\u00e4nzendes Design mit Schleife\\n                    <\\/li>\\n            <\\/ul>","vendor":"Lisbeth Dahl","categories":["Mode","Kosmetiktaschen"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"21.95","availability":"100"}],"variantID":"113","variant":{"amount":"1 St\\u00fcck"},"ean":"","price":null,"availability":100}],"info":{"__units":["180mm \\/ 130mm"]},"rating":null}]}',
    )),
  )),
  3 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/templates/footer_topseller.tpl',
       'curlCommand' => 'curl -i -X \'GET\' \'http://glamster/templates/footer_topseller.tpl\' -H \'Connection: keep-alive\' -H \'X-Requested-With: XMLHttpRequest\' -H \'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19\' -H \'Accept: */*\' -H \'Referer: http://glamster/\' -H \'Accept-Encoding: gzip,deflate,sdch\' -H \'Accept-Language: en-US,en;q=0.8\' -H \'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /templates/footer_topseller.tpl HTTP/1.1',
        1 => 'Host: glamster',
        2 => 'Connection: keep-alive',
        3 => 'X-Requested-With: XMLHttpRequest',
        4 => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        5 => 'Accept: */*',
        6 => 'Referer: http://glamster/',
        7 => 'Accept-Encoding: gzip,deflate,sdch',
        8 => 'Accept-Language: en-US,en;q=0.8',
        9 => 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'headers' => 
      array (
        'Host' => 'glamster',
        'Connection' => 'keep-alive',
        'X-Requested-With' => 'XMLHttpRequest',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        'Accept' => '*/*',
        'Referer' => 'http://glamster/',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'en-US,en;q=0.8',
        'Accept-Charset' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'Content-Type: application/octet-stream',
        2 => 'Accept-Ranges: bytes',
        3 => 'Content-Length: 148',
        4 => 'Date: Mon, 23 Apr 2012 08:04:57 GMT',
        5 => 'Server: lighttpd/1.4.28',
      ),
       'headers' => 
      array (
        'Content-Type' => 'application/octet-stream',
        'Accept-Ranges' => 'bytes',
        'Content-Length' => '148',
        'Date' => 'Mon, 23 Apr 2012 08:04:57 GMT',
        'Server' => 'lighttpd/1.4.28',
      ),
       'body' => '<h4>Top Seller</h4>
<ul>
{{#products}}
    <li><a href="/p/{{productID}}/{{vendor}}/{{title}}">{{title}}</a> by {{vendor}}</li>
{{/products}}
</ul>
',
    )),
  )),
  4 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/templates/topsellers.tpl',
       'curlCommand' => 'curl -i -X \'GET\' \'http://glamster/templates/topsellers.tpl\' -H \'Connection: keep-alive\' -H \'X-Requested-With: XMLHttpRequest\' -H \'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19\' -H \'Accept: */*\' -H \'Referer: http://glamster/\' -H \'Accept-Encoding: gzip,deflate,sdch\' -H \'Accept-Language: en-US,en;q=0.8\' -H \'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /templates/topsellers.tpl HTTP/1.1',
        1 => 'Host: glamster',
        2 => 'Connection: keep-alive',
        3 => 'X-Requested-With: XMLHttpRequest',
        4 => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        5 => 'Accept: */*',
        6 => 'Referer: http://glamster/',
        7 => 'Accept-Encoding: gzip,deflate,sdch',
        8 => 'Accept-Language: en-US,en;q=0.8',
        9 => 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'headers' => 
      array (
        'Host' => 'glamster',
        'Connection' => 'keep-alive',
        'X-Requested-With' => 'XMLHttpRequest',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        'Accept' => '*/*',
        'Referer' => 'http://glamster/',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'en-US,en;q=0.8',
        'Accept-Charset' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'Content-Type: application/octet-stream',
        2 => 'Accept-Ranges: bytes',
        3 => 'Content-Length: 814',
        4 => 'Date: Mon, 23 Apr 2012 08:04:57 GMT',
        5 => 'Server: lighttpd/1.4.28',
      ),
       'headers' => 
      array (
        'Content-Type' => 'application/octet-stream',
        'Accept-Ranges' => 'bytes',
        'Content-Length' => '814',
        'Date' => 'Mon, 23 Apr 2012 08:04:57 GMT',
        'Server' => 'lighttpd/1.4.28',
      ),
       'body' => '<h3>Meistgekaufte Produkte</h3>
<ul class="products block-grid mobile five-up">
{{#products}}
    <li class="product">
        <div class="row">
            <div class="twelve phone-two columns image">
                <div class="thumbnail">
                    <a href="/p/{{productID}}/{{vendor}}/{{title}}/"><img alt="{{vendor}} {{title}}" src="{{thumbnail}}" /></a>
                </div>
            </div>
            <div class="twelve phone-two columns info">
                <h4><a href="/p/{{productID}}/{{vendor}}/{{title}}">{{vendor}} {{title}}</a></h4>
                <ul class="tags">
                {{#categories}}
                    <li><a href="">{{.}}</a></li>
                {{/categories}}
                </ul>
            </div>
        </div>
    </li>
{{/products}}
    <li></li>
</ul>
',
    )),
  )),
  5 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/top/vendor?count=50',
       'curlCommand' => 'curl -i -X \'GET\' \'http://api.session.glamster/top/vendor?count=50\' -H \'Connection: keep-alive\' -H \'Origin: http://glamster\' -H \'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19\' -H \'Accept: application/json, text/javascript, */*; q=0.01\' -H \'Referer: http://glamster/\' -H \'Accept-Encoding: gzip,deflate,sdch\' -H \'Accept-Language: en-US,en;q=0.8\' -H \'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /top/vendor?count=50 HTTP/1.1',
        1 => 'Host: api.session.glamster',
        2 => 'Connection: keep-alive',
        3 => 'Origin: http://glamster',
        4 => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        5 => 'Accept: application/json, text/javascript, */*; q=0.01',
        6 => 'Referer: http://glamster/',
        7 => 'Accept-Encoding: gzip,deflate,sdch',
        8 => 'Accept-Language: en-US,en;q=0.8',
        9 => 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'headers' => 
      array (
        'Host' => 'api.session.glamster',
        'Connection' => 'keep-alive',
        'Origin' => 'http://glamster',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        'Accept' => 'application/json, text/javascript, */*; q=0.01',
        'Referer' => 'http://glamster/',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'en-US,en;q=0.8',
        'Accept-Charset' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'X-Powered-By: PHP/5.4.0',
        2 => 'Access-Control-Allow-Origin: *',
        3 => 'Access-Control-Allow-Methods: POST, GET',
        4 => 'Content-Type: application/json',
        5 => 'Transfer-Encoding: chunked',
        6 => 'Date: Mon, 23 Apr 2012 08:04:57 GMT',
        7 => 'Server: lighttpd/1.4.28',
      ),
       'headers' => 
      array (
        'X-Powered-By' => 'PHP/5.4.0',
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'POST, GET',
        'Content-Type' => 'application/json',
        'Transfer-Encoding' => 'chunked',
        'Date' => 'Mon, 23 Apr 2012 08:04:57 GMT',
        'Server' => 'lighttpd/1.4.28',
      ),
       'body' => '["Absolute Douglas","Origins","Thierry Mugler","Lanc\\u00f4me","Douglas","Clinique","K\\u00f6lnisch Wasser 4711","Lisbeth Dahl","Issey Miyake","Guerlain","Hildegard Braukmann","Escada","Paco Rabanne","Bruno Banani","Trussardi","Acad\\u00e9mie","D&amp;G","Clarins","Elizabeth Arden","Pilgrim","Carolina Herrera","Herm\\u00e8s","Givenchy","Da Vinci","Jil Sander"]',
    )),
  )),
  6 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/templates/footer_vendor.tpl',
       'curlCommand' => 'curl -i -X \'GET\' \'http://glamster/templates/footer_vendor.tpl\' -H \'Connection: keep-alive\' -H \'X-Requested-With: XMLHttpRequest\' -H \'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19\' -H \'Accept: */*\' -H \'Referer: http://glamster/\' -H \'Accept-Encoding: gzip,deflate,sdch\' -H \'Accept-Language: en-US,en;q=0.8\' -H \'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /templates/footer_vendor.tpl HTTP/1.1',
        1 => 'Host: glamster',
        2 => 'Connection: keep-alive',
        3 => 'X-Requested-With: XMLHttpRequest',
        4 => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        5 => 'Accept: */*',
        6 => 'Referer: http://glamster/',
        7 => 'Accept-Encoding: gzip,deflate,sdch',
        8 => 'Accept-Language: en-US,en;q=0.8',
        9 => 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'headers' => 
      array (
        'Host' => 'glamster',
        'Connection' => 'keep-alive',
        'X-Requested-With' => 'XMLHttpRequest',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        'Accept' => '*/*',
        'Referer' => 'http://glamster/',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'en-US,en;q=0.8',
        'Accept-Charset' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'Content-Type: application/octet-stream',
        2 => 'Accept-Ranges: bytes',
        3 => 'Content-Length: 99',
        4 => 'Date: Mon, 23 Apr 2012 08:04:57 GMT',
        5 => 'Server: lighttpd/1.4.28',
      ),
       'headers' => 
      array (
        'Content-Type' => 'application/octet-stream',
        'Accept-Ranges' => 'bytes',
        'Content-Length' => '99',
        'Date' => 'Mon, 23 Apr 2012 08:04:57 GMT',
        'Server' => 'lighttpd/1.4.28',
      ),
       'body' => '<h4>Top Marken</h4>
<ul>
{{#vendors}}
    <li><a href="/s/{{.}}">{{.}}</a></li>
{{/vendors}}
</ul>
',
    )),
  )),
  7 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/top/seller?count=50',
       'curlCommand' => 'curl -i -X \'GET\' \'http://api.session.glamster/top/seller?count=50\' -H \'Connection: keep-alive\' -H \'Origin: http://glamster\' -H \'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19\' -H \'Accept: application/json, text/javascript, */*; q=0.01\' -H \'Referer: http://glamster/\' -H \'Accept-Encoding: gzip,deflate,sdch\' -H \'Accept-Language: en-US,en;q=0.8\' -H \'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /top/seller?count=50 HTTP/1.1',
        1 => 'Host: api.session.glamster',
        2 => 'Connection: keep-alive',
        3 => 'Origin: http://glamster',
        4 => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        5 => 'Accept: application/json, text/javascript, */*; q=0.01',
        6 => 'Referer: http://glamster/',
        7 => 'Accept-Encoding: gzip,deflate,sdch',
        8 => 'Accept-Language: en-US,en;q=0.8',
        9 => 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'headers' => 
      array (
        'Host' => 'api.session.glamster',
        'Connection' => 'keep-alive',
        'Origin' => 'http://glamster',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        'Accept' => 'application/json, text/javascript, */*; q=0.01',
        'Referer' => 'http://glamster/',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'en-US,en;q=0.8',
        'Accept-Charset' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'X-Powered-By: PHP/5.4.0',
        2 => 'Access-Control-Allow-Origin: *',
        3 => 'Access-Control-Allow-Methods: POST, GET',
        4 => 'Content-Type: application/json',
        5 => 'Transfer-Encoding: chunked',
        6 => 'Date: Mon, 23 Apr 2012 08:04:57 GMT',
        7 => 'Server: lighttpd/1.4.28',
      ),
       'headers' => 
      array (
        'X-Powered-By' => 'PHP/5.4.0',
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'POST, GET',
        'Content-Type' => 'application/json',
        'Transfer-Encoding' => 'chunked',
        'Date' => 'Mon, 23 Apr 2012 08:04:57 GMT',
        'Server' => 'lighttpd/1.4.28',
      ),
       'body' => '[101,96,92,100,86,75,95,71,77,90,63,93,72,97,83,85,76,73,68,57,64,70,82,67,61,102,104,74,98,37,51,59,39,60,49,91,88,78,84,58,81,55,36,62,65,56,38,42,45,48]',
    )),
  )),
  8 => 
  Qafoo\Bsoad\Struct\Interaction::__set_state(array(
     'request' => 
    Qafoo\Bsoad\Struct\Message\Request::__set_state(array(
       'method' => 'GET',
       'path' => '/product?productID%5B%5D=51&productID%5B%5D=104&productID%5B%5D=36&productID%5B%5D=74&productID%5B%5D=56',
       'curlCommand' => 'curl -i -X \'GET\' \'http://api.storage.glamster/product?productID%5B%5D=51&productID%5B%5D=104&productID%5B%5D=36&productID%5B%5D=74&productID%5B%5D=56\' -H \'Connection: keep-alive\' -H \'Origin: http://glamster\' -H \'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19\' -H \'Accept: application/json, text/javascript, */*; q=0.01\' -H \'Referer: http://glamster/\' -H \'Accept-Encoding: gzip,deflate,sdch\' -H \'Accept-Language: en-US,en;q=0.8\' -H \'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3\'',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'GET /product?productID%5B%5D=51&productID%5B%5D=104&productID%5B%5D=36&productID%5B%5D=74&productID%5B%5D=56 HTTP/1.1',
        1 => 'Host: api.storage.glamster',
        2 => 'Connection: keep-alive',
        3 => 'Origin: http://glamster',
        4 => 'User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        5 => 'Accept: application/json, text/javascript, */*; q=0.01',
        6 => 'Referer: http://glamster/',
        7 => 'Accept-Encoding: gzip,deflate,sdch',
        8 => 'Accept-Language: en-US,en;q=0.8',
        9 => 'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'headers' => 
      array (
        'Host' => 'api.storage.glamster',
        'Connection' => 'keep-alive',
        'Origin' => 'http://glamster',
        'User-Agent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/535.19 (KHTML, like Gecko) Ubuntu/11.10 Chromium/18.0.1025.151 Chrome/18.0.1025.151 Safari/535.19',
        'Accept' => 'application/json, text/javascript, */*; q=0.01',
        'Referer' => 'http://glamster/',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'en-US,en;q=0.8',
        'Accept-Charset' => 'ISO-8859-1,utf-8;q=0.7,*;q=0.3',
      ),
       'body' => '',
    )),
     'response' => 
    Qafoo\Bsoad\Struct\Message\Response::__set_state(array(
       'code' => '200',
       'message' => 'OK',
       'version' => 'HTTP/1.1',
       'rawHeaders' => 
      array (
        0 => 'HTTP/1.1 200 OK',
        1 => 'X-Powered-By: PHP/5.4.0',
        2 => 'Access-Control-Allow-Origin: *',
        3 => 'Access-Control-Allow-Methods: PUT, GET',
        4 => 'Content-Type: application/json',
        5 => 'Transfer-Encoding: chunked',
        6 => 'Date: Mon, 23 Apr 2012 08:04:57 GMT',
        7 => 'Server: lighttpd/1.4.28',
      ),
       'headers' => 
      array (
        'X-Powered-By' => 'PHP/5.4.0',
        'Access-Control-Allow-Origin' => '*',
        'Access-Control-Allow-Methods' => 'PUT, GET',
        'Content-Type' => 'application/json',
        'Transfer-Encoding' => 'chunked',
        'Date' => 'Mon, 23 Apr 2012 08:04:57 GMT',
        'Server' => 'lighttpd/1.4.28',
      ),
       'body' => '{"total":"7834","products":[{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"36","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8803516579870.image.jpg","pictures":[],"title":"24h Solution hypoallergen Medilan Creme","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span>Hautpflege an der Grenze zur Medizin \\u2013  Medilan Skin Repair ist eine hochintensive, feuchtigkeitsspendende Therapiepflege zur Behandlung sehr trockener und gesch\\u00e4digter Haut. Die reichhaltige Pflege wurde speziell zur unterst\\u00fctzenden Behandlung von Ekzemen, Schuppenflechten, schmerzhaften Hauteinrissen und Hautjucken, tiefen Hautspalten an Lidwinkeln, Lippen, Fingern und F\\u00fc\\u00dfen sowie zur Narbenbehandlung entwickelt. Ebenfalls geeignet ist Medilan Skin Repair zur Pflege der typischen Hautirritationen bei Allergikern, Neurodermitikern, Diabetikern und Menschen, die berufsbedingt h\\u00e4ufigem Kontakt mit Wasser, entfettenden Duschzus\\u00e4tzen und K\\u00e4lte ausgesetzt sind oder sich einer Chemotherapie unterziehen m\\u00fcssen. Die Spezialpflege mit 24-Stunden-Wirkung legt sich wie ein heilendes Wundpflaster auf die zu behandelnden Hautstellen, wirkt entz\\u00fcndungshemmend und unterst\\u00fctzt die Wundheilung. Das Resultat: eine sichtbar ges\\u00fcndere, widerstandsf\\u00e4higere Haut. Frei von Konservierungsmitteln. F\\u00fcr M\\u00e4nner und Frauen geeignet.<\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            <div>\\n\\t\\t\\t\\t<h4>Anwendung<\\/h4>\\n\\t\\t\\t\\t<di>\\n\\t\\t\\t\\t\\t<p>\\n\\t\\t\\t\\t\\t\\tSpezielle Anwendung: Lokal und partiell bei \\u00e4u\\u00dferst trockenen oder strapazierten Hauterscheinungen und als unterst\\u00fctzende Therapiepflege. \\n\\t\\t\\t\\t\\t<\\/p>\\n\\t\\t\\t\\t<\\/div>\\n\\t\\t\\t<\\/div>\\n\\t\\t\\t<div>\\n\\t\\t\\t\\t<h4>Inhaltsstoffe<\\/h4>\\n\\t\\t\\t\\t<di>\\n\\t\\t\\t\\t\\t<p>\\n\\t\\t\\t\\t\\tAQUA (WATER), LANOLIN, CETEARYL ETHYLHEXANOATE, SQUALANE, CERA ALBA (BEESWAX), GLYCERIN, PANTHENOL, DECYL OLEATE, OCTYLDODECANOL, CERA MICROCRISTALLINA, ISOSTEARYL DIGLYCERYL SUCCINATE, MAGNESIUM STEARATE, POLYGLYCERYL-3 POLYRICINOLEATE, SORBITAN ISOSTEARATE, PARFUM (FRAGRANCE), ISOPROPYL MYRISTATE, MAGNESIUM SULFATE, BISABOLOL, ECHIUM PLANTAGINEUM SEED OIL, ALLANTOIN, CARDIOSPERMUM HALICACABUM EXTRACT, HELIANTHUS ANNUUS (SUNFLOWER) SEED OIL UNSAPONIFIABLES, BENZYL SALICYLATE, LIMONENE, ALPHA-ISOMETHYL IONONE, LINALOOL, COUMARIN\\n\\t\\t\\t\\t\\t<\\/p>\\n\\t\\t\\t\\t<\\/div>\\n\\t\\t\\t<\\/div>","vendor":"Hildegard Braukmann","categories":["Pflege","Gesicht","Tagespflege"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"25.95","availability":"100"}],"variantID":"40","variant":{"amount":"50 ml"},"ean":"","price":null,"availability":100}],"info":{"Series":"24h Solution hypoallergen","__units":[]},"rating":null},{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"51","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8814696595486.image.jpg","pictures":[],"title":"4711","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span>\\u201e4711 Echt K\\u00f6lnisch Wasser\\u201c ist eine der \\u00e4ltesten K\\u00f6lner Marken mit weltweitem Bekanntheitsgrad. Die Anwendung der einzigartigen Komposition wirkt wohltuend auf K\\u00f6rper, Geist und Seele. Noch heute wird die genaue Rezeptur von \\u201e4711 Echt K\\u00f6lnisch Wasser\\u201c streng geheim gehalten. Die bewusste Betonung der belebenden, leichten Kopfnote verleiht der Kreation ihren charakteristischen Duft. \\u00c4therische \\u00d6le, die f\\u00fcr ihre aromatherapeutische Wirkung bekannt sind, z\\u00e4hlen zu den ausgew\\u00e4hlten Inhaltsstoffen. Zitrone und Orange etwa sorgen f\\u00fcr die unverwechselbare, revitalisierende Wirkung. Lavendel und Rosmarin wirken beruhigend, entspannend und st\\u00e4rken die Nerven. Neroli, gewonnen aus der Bl\\u00fcte der Bitterorange, wirkt beruhigend und sorgt f\\u00fcr positive Stimmung.<\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            ","vendor":"K\\u00f6lnisch Wasser 4711","categories":["D\\u00fcfte","Damend\\u00fcfte","Seife"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"3.95","availability":"100"}],"variantID":"56","variant":{"amount":"100 g"},"ean":"","price":null,"availability":100}],"info":{"__units":[]},"rating":null},{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"56","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8451454006546320.image.jpg","pictures":[],"title":"4711 Molanusflasche","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span>Zeitlos klassisch - Vertrauen Sie einem Duft, der Ihnen pure Erfrischung und Wohlbefinden schenkt. Der Klassiker 4711 Echt K\\u00f6lnisch Wasser belebt K\\u00f6rper und Sinne seit \\u00fcber 200 Jahren und das ausschlie\\u00dflich mit nat\\u00fcrlichen Inhaltsstoffen. Verteilen Sie Ihren pers\\u00f6nlichen Quell der Frische gro\\u00dfz\\u00fcgig mit den Handfl\\u00e4chen auf Hals, Nacken und Gesicht und sp\\u00fcren Sie die vitalisierende Wirkung.<\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            <u><li>Duftnote:\\n                            frisch\\n                    <\\/li>\\n                    <li>Geschlecht:\\n                            unisex\\n                    <\\/li>\\n            <\\/ul>","vendor":"K\\u00f6lnisch Wasser 4711","categories":["D\\u00fcfte","Damend\\u00fcfte"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"100","availability":"100"}],"variantID":"61","variant":{"identifier":"Molanusflasche","amount":"800 ml"},"ean":"","price":null,"availability":100}],"info":{"Series":"4711","__units":[]},"rating":null},{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"74","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8452012509019008.image.jpg","pictures":[],"title":"A*Men Deodorant Stick","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span>Frisch und rein wie Morgenluft - So sollte ein Deodorant sein! Genie\\u00dfen Sie den herrlichen Duft von Thierry Muglers A Men mit Bergamotte, Lavendel, Pfefferminze, holzigen Noten und Kaffeearoma. Dieser Deodorant Stift gibt Frische und lang anhaltende Sicherheit f\\u00fcr den ganzen Tag und rundet damit die K\\u00f6rperpflege des aktiven Mannes ab. Die Formulierung des alkoholfreien Deos wirkt antibakteriell und gew\\u00e4hrleistet eine sehr gute Hautvertr\\u00e4glichkeit.<\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            <u><li>Duftnote:\\n                            orientalisch\\n                    <\\/li>\\n                    <li>Eigenschaft:\\n                            erfrischend\\n                    <\\/li>\\n            <\\/ul>","vendor":"Thierry Mugler","categories":["D\\u00fcfte","Herrend\\u00fcfte","Deodorants"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"26.95","availability":"100"}],"variantID":"83","variant":{"amount":"75 g"},"ean":"","price":null,"availability":100}],"info":{"Series":"A*Men","__units":[]},"rating":null},{"minPrice":null,"maxPrice":null,"autocomplete":[],"productID":"104","provider":null,"sourceID":null,"url":null,"language":"de_DE","thumbnail":"http:\\/\\/media.douglas.de\\/medias\\/sys_master\\/8835551952926.image.jpg","pictures":[],"title":"Accessoires","shortDesc":"","longDesc":"<h3>Informationen<\\/h3>\\n\\t\\t<p>\\n\\t\\t\\t<span><\\/span>\\n\\t\\t<\\/p>\\n\\t\\t\\n            <u><li>Farbe:\\n                            Rosa\\n                    <\\/li>\\n                    <li>Ma\\u00dfe:\\n                            14 x 22 x 6 cm\\n                    <\\/li>\\n                    <li>Details:\\n                            Design mit Spitze\\n                    <\\/li>\\n            <\\/ul>","vendor":"Lisbeth Dahl","categories":["Mode","Kosmetiktaschen"],"cowids":[],"variants":[{"providerVariants":[{"provider":"douglas","variantID":null,"variant":[],"ean":"","price":"29.95","availability":"100"}],"variantID":"116","variant":{"amount":"1 St\\u00fcck"},"ean":"","price":null,"availability":100}],"info":{"__units":["140mm \\/ 220mm \\/ 60mm"]},"rating":null}]}',
    )),
  )),
);

