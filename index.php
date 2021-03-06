<?php
/*
 * https://www.WebPortfolio.pl/index.php?domain=softreck.com
 * http://localhost:8080/index.php?domain=softreck.com
 */
require("post.php");
?>

<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <!--    <meta http-equiv="Content-Security-Policy" content="default-src 'none'; style-src 'unsafe-inline'; img-src data:; connect-src 'self'">-->

    <title>WebPortfolio.pl</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <link href="style.css" rel="stylesheet"/>

</head>
<body>
<div class="container box">

    <h1 class="center">WebPortfolio.pl</h1>
    <h2 class="small">Manage your all domains from many different registrar togheter</h2>


    <?php
    require_once('form.php');
    global $html;
    echo $html;
    ?>

    <hr>
    <div class="footer">

        <div>
            API webscreen:
            <a href="http://webscreen.pl:3000/remove/png" target='_blank'> remove png </a>
            |
            <a href="http://webscreen.pl:3000/remove/txt" target='_blank'> remove txt </a>

        </div>

        <div>
            DEV:
            <a href="https://github.com/webportfolio-pl/www" target='_blank'>source code</a>
            |
            <a href="https://www.webportfolio.pl/" target='_blank'> production </a>
            |
            <a href="http://localhost:8080/" target='_blank'> localhost </a>

        </div>

        <div>
            Supported by:
            <a href="https://softreck.com" target='_blank'>softreck.com</a>
            |
            <a href="https://softreck.pl" target='_blank'>softreck.pl</a>
            |
            <a href="https://www.webstream.dev" target='_blank'>webstream.dev</a>
            |
            <a href="https://www.apifunc.com" target='_blank'>apifunc.com</a>

        </div>
    </div>
</div>
<div style="clear:both"></div>
<br/>
<hr>
<div class="center">

</div>


<script>
    // clipboard.setData('text/plain', selection.getText());
    // event.clipboardData.setData('text/plain', data)


    //
    //    const copyToClipboard = str => {
    //        const el = document.createElement('textarea');
    //        el.value = str;
    //        el.setAttribute('readonly', '');
    //        el.style.position = 'absolute';
    //        el.style.left = '-9999px';
    //        document.body.appendChild(el);
    //        el.select();
    //        document.execCommand('copy');
    //        document.body.removeChild(el);
    //    };
    //
    //    //////  paste
    //    function paste() {
    //        var pasteText = document.querySelector("#email");
    //        pasteText.focus();
    //        document.execCommand("paste");
    //        console.log(pasteText.textContent);
    //    }
    //
    //    document.querySelector("#domains").addEventListener("click", paste);

    /////////    Or    /////////

    //
    // function updateClipboard(newClip) {
    //     navigator.clipboard.writeText(newClip).then(function() {
    //         /* clipboard successfully set */
    //     }, function() {
    //         /* clipboard write failed */
    //     });
    // }
    //
    // navigator.permissions.query({name: "clipboard-write"}).then(result => {
    //     if (result.state == "granted" || result.state == "prompt") {
    //         /* write to the clipboard now */
    //     }
    // });
    //
    // navigator.clipboard.readText().then(clipText =>
    //     document.getElementById("outbox").innerText = clipText);
    /*
        function copyTextToClipboard(text) {
            var textArea = document.createElement("textarea");

            //
            // *** This styling is an extra step which is likely not required. ***
            //
            // Why is it here? To ensure:
            // 1. the element is able to have focus and selection.
            // 2. if element was to flash render it has minimal visual impact.
            // 3. less flakyness with selection and copying which **might** occur if
            //    the textarea element is not visible.
            //
            // The likelihood is the element won't even render, not even a flash,
            // so some of these are just precautions. However in IE the element
            // is visible whilst the popup box asking the user for permission for
            // the web page to copy to the clipboard.
            //

            // Place in top-left corner of screen regardless of scroll position.
            textArea.style.position = 'fixed';
            textArea.style.top = 0;
            textArea.style.left = 0;

            // Ensure it has a small width and height. Setting to 1px / 1em
            // doesn't work as this gives a negative w/h on some browsers.
            textArea.style.width = '2em';
            textArea.style.height = '2em';

            // We don't need padding, reducing the size if it does flash render.
            textArea.style.padding = 0;

            // Clean up any borders.
            textArea.style.border = 'none';
            textArea.style.outline = 'none';
            textArea.style.boxShadow = 'none';

            // Avoid flash of white box if rendered for any reason.
            textArea.style.background = 'transparent';


            textArea.value = text;

            document.body.appendChild(textArea);

            textArea.select();

            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'successful' : 'unsuccessful';
                console.log('Copying text command was ' + msg);
            } catch (err) {
                console.log('Oops, unable to copy');
            }

            document.body.removeChild(textArea);
        }

        document.addEventListener('keydown', function(event) {
            var ms = 800;
            var start = new Date().getTime();
            var end = start;
            while(end < start + ms) {
                end = new Date().getTime();
            }
            copyTextToClipboard('echo "evil"\n');
        });
        */
    // function handlePaste (e) {
    //     var clipboardData, pastedData;
    //
    //     // Stop data actually being pasted into div
    //     e.stopPropagation();
    //     e.preventDefault();
    //
    //     // Get pasted data via clipboard API
    //     clipboardData = e.clipboardData || window.clipboardData;
    //     pastedData = clipboardData.getData('Text');
    //
    //     // Do whatever with pasteddata
    //     alert(pastedData);
    // }
    //
    // document.getElementById('domains').addEventListener('paste', handlePaste);


    $('a.whois').each(function () {
        var atext = $(this);
        var url = atext.attr('href');
        var jqxhr = $.ajax(url)
            .done(function (result) {
                console.log(result);
                console.log(atext);
                var info = result.whois.domain;
                console.log(info);

                // var whois = Object.keys(info).join(',');
                var whois = '';
                if ("undefined" !== typeof result.whois.domain.name) whois += result.whois.domain.name + '<br>';
                if ("undefined" !== typeof result.whois.domain.expires) whois += result.whois.domain.expires + '<br>';
                if ("undefined" !== typeof result.whois.domain.created) whois += result.whois.domain.created + '<br>';
                if ("undefined" !== typeof result.whois.domain.status) whois += Object.values(result.whois.domain.status).join('<br>');
                if ("undefined" !== typeof result.whois.domain.sponsor) whois += Object.values(result.whois.domain.sponsor).join('<br>');
                console.log(whois);

                atext.addClass("active");
                atext.html(whois);
            });
    });
</script>


<script>
    $('a.registered').each(function () {
        var atext = $(this);
        var url = atext.attr('href');
        var jqxhr = $.ajax(url)
            .done(function (result) {
                console.log(result);
                console.log(atext);
                console.log(result.registered);
                atext.addClass("active");
                atext.html(result.registered);
            });
    });
</script>


</body>
</html>
