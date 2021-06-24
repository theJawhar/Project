<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fetch with Basic Access Authentication</title>
    <meta name="viewport" content="width=device-width">
    <!--    <link rel="stylesheet" href="main.css" />-->
    <style>
        p {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <header>
        <h1>Fetch with Basic Access Authentication</h1>
    </header>
    <main>
        <p>Response will appear here after you click.</p>
    </main>
    <script>
        let p;

        document.addEventListener('DOMContentLoaded',
            function() {
                p = document.querySelector('main>p');
                p.addEventListener('click', doFetch);
            });

        function doFetch(ev) {
            let uri = "http://api.relaisexpress.ma/v1/getconsigne";

            let h = new Headers();
            h.append('Accept', 'application/json');
            let encoded = window.btoa('lve:kC525bmT');
            let auth = 'Basic ' + encoded;
            h.append('Authorization', auth);
            console.log(auth);

            let req = new Request(uri, {
                method: 'GET',
                headers: h,
                data: {
                    "id-gc": 34004,
                    "statut": 0
                },
                credentials: 'include'
                //credentials: 'same-origin'
            });
            //credentials: 'same-origin'

            fetch(req)
                .then((response) => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('BAD HTTP stuff');
                    }
                })
                .then((jsonData) => {
                    console.log(jsonData);
                    p.textContent = JSON.stringify(jsonData, null, 4);
                })
                .catch((err) => {
                    console.log('ERROR:', err.message);
                });
        }

        /********************************
        Server can send headers
        WWW-Authenticate: Basic realm="Realm Description" charset="UTF-8"
        HTTP/1.1: 401 Unauthorized
        HTTP/1.1: 403 Forbidden
        
        Client sends header
        Authorization: Basic QWxhZGRpbjpPcGVuU2VzYW1l
        The string is username:password base-64 encoded
        MUST BE OVER HTTPS
        ********************************/
    </script>
</body>

</html>