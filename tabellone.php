<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LTWtrain - Tabellone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/flapper.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="transform/dist/jquery.transform-0.9.3.min.js"></script>
    <script src="src/jquery.flapper.js"></script>
    <script src="src/flapdemo.js"></script>

    <style type="text/css">
            body {
                font-family: Roboto Condensed;
                color: #333;
            }

            .page {
                width: 1000px;
                margin: 30px auto 0;
            }

            h1 {
                text-align: center;
                font-size: 24px;
            }

            .displays {
                padding: 30px;
                border: 10px solid #ccc;
                background-color: #222;
                border-radius: 30px;
                box-shadow: 0 0 12px 4px #000 inset;
            }

            .flapper {
                margin-bottom: 2px;
                text-align: center;
            }

            .inputarea {
                margin: 24px 0;
            }

            #typesomething,
            #showme {
                font-family: Roboto Condensed;
                font-size: 18px;
                padding: 14px;
                background-color: #EEE;
                color: #333;
                border: 0;
                height: 170px;
            }

            #typesomething {
                width: 300px;
            }

            #showme:hover {
                background-color: #DDD;
            }

            #showme:active {
                background-color: #CCC;
            }

            div.inline {
                display: inline-block;
                vertical-align: bottom;
            }

            div.activity {
                width: 12px;
                height: 12px;
                border-radius: 6px;
                background-color: #250000;
                position: relative;
                top: 33px;
                left: -15px;
            }

            div.activity.active {
                background-color: #f00;
            }

            /* Greetz @deadlyicon
             * https://gist.github.com/2191622
             */
            #fork-me {
                width: 180px;
                height: 150px;
                position: absolute;
                top: 0px;
                right: 0px;
                overflow: hidden;
            }

            #fork-me a {
                display: block;
                position: absolute;
                top: 35px;
                right: -75px;
                padding: 0.75em 4em;
                background: #881c15;
                -webkit-transform: rotate(40deg);
                -moz-transform:rotate(40deg);
                -o-transform:rotate(40deg);
                -ms-transform:rotate(40deg);
                color: white !important;
                font-weight: bold;
                font-family: helvetica;
                text-decoration: none;
                border: 1px solid white;
                box-shadow: 0 0 10px black;
                text-shadow: 0 0 10px black;
                white-space: nowrap;
            }

        </style>

</head>
<body>
    <h1>Ci dispiace, questa pagina &egrave; ancora in fase di realizzazione.</h1>
    <strong><a href="javascript: history.go(-1)">Torna indietro</a></strong>

    <h1 id="hours">22</h1>
    <h1 id="minutes">30</h1>
    <h1 id="seconds">55</h1>

    <input id="display" />



</body>

<script language="JavaScript">
    $('#display').flapper(options).val(12345).change();
<script>

<script type="text/javascript">
    var getTime = function(){
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        h = this.checkTime(h);
        m = this.checkTime(m);
        s = this.checkTime(s);
        document.getElementById('hours').innerText = h;
        document.getElementById('minutes').innerText = m;
        document.getElementById('seconds').innerText = s;
        var t = setTimeout(this.getTime, 1000);
        }
        var checkTime = function(i) {
        if (i < 10) {i = "0" + i};
        return i;
    }
    getTime();
</script>

</html>