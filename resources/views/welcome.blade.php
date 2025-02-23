<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lesson</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-900 text-white">

        <div class="flex items-center justify-center h-screen">
            <form id="form" method="POST" action="/form">
                @csrf
                <button id="button" type="submit" class="rounded-full bg-blue-500 text-white p-2 hover:bg-blue-600">Событие JS</button>
            </form>

            <p class="p-5">Напишите на почту <a class="mail text-blue-500" href="mailto:timofeev.d@roistat.com">timofeev.d@roistat.com</a>, чтобы связаться с нами</p>

            <a id="number" href="tel:+76662406605" class="text-blue-500">+7 (666) 240-66-05</a>
        </div>

        <script>
            (function(w, d, s, h, id) {
                w.roistatProjectId = id; w.roistatHost = h;
                var p = d.location.protocol == "https:" ? "https://" : "http://";
                var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
                var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);


            })(window, document, 'script', 'cloud.roistat.com', 'f28b872e9db440f81b0b1706ccec03a2');

            document.getElementById("button").onclick = function() {
                window.roistat.event.send("1", {"value": "4804"});
            };
        </script>
    </body>
</html>
