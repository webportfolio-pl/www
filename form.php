
<form method="post" action="request/send_email.php" target="#nameserver_list">
    <fieldset>

        <legend>DNS</legend>

        <label for="domains">
            1. Enter domain names with nameservers at point no. 3
        </label>
        <textarea name="domains" id="domains" cols="75" rows="20"><?php echo $_POST["domains"] ?></textarea>
        <br/>
        <br/>

        <label for="dns_url_list">
            2. Show url to panel where domain is registered:
        </label>
        <br/>
        <input type="submit" name="set_domain_list" id="set_domain_list" value="Show URLs to Change DNS"
               class="btn btn-info btn-lg"/>
        <br/>

        <br/>
    </fieldset>
</form>

<h2>NameServers</h2>
<div id="nameserver_list">
    <ul>
        <li>
            <?php echo $_POST["domains"] ?>
        </li>
    </ul>
</div>

<form method="post" action="query/dns_url_list.php">
    <fieldset>
        <label>
            3. Set NameServers for your domains
        </label>
        <br>
        * after set cursor on this field copy to clipboard will be automatically
        <br/>

        <input type="text" class="nameserver" id="ns1" name="ns1" value="<?php echo $_POST["ns1"]; ?>" readonly/>*
        <input type="text" class="nameserver" id="ns2" name="ns2" value="<?php echo $_POST["ns2"]; ?>" readonly/>*
        <input type="text" class="nameserver" id="ns3" name="ns3" value="<?php echo $_POST["ns3"]; ?>" readonly/>*

        <script>
            // https://javascript.info/events-change-input
            // https://whatwebcando.today/clipboard.html
            // https://www.group-office.com/blog/post?id=6650328555423695690
            // https://developer.mozilla.org/en-US/docs/Web/API/Element/paste_event

            // ['cut', 'copy', 'paste'].forEach(function(event) {
            //     document.addEventListener(event, function(e) {
            //         console.log(event);
            //     });
            // });
            // https://jsfiddle.net/vtjnr6ea/

            // input.oncut = input.oncopy = input.onpaste = function(event) {
            // var input = document.getElementById("ns1");
            var inputs = document.querySelectorAll(".nameserver");
            console.log(inputs);
            inputs.forEach(function (el) {

                el.onclick = function (event) {
                    console.log(event);
                    copyNamesever(el);
                    this.classList.add('green');
                    return false;
                };
            });

            function copyNamesever(el) {
                // var textArea = document.createElement("textarea");
                // var textArea = document.getElementById("domains");
                el.select();
                // textArea.value;
                try {
                    const successful = document.execCommand('copy');
                    const msg = successful ? 'successful' : 'unsuccessful';
                    console.log('Copying text command was ' + msg);
                } catch (err) {
                    console.error('! unable to copy');
                }

            }
        </script>

        <br/>
        <br/>
        <?php
        global $dns_url_list;
        echo $dns_url_list;
        ?>
        <br/>


    </fieldset>
</form>

<form method="post" action="request/send_code_by_email.php">
    <fieldset>
        <legend>Verification</legend>


        <label for="email">
            4. Enter Email:
        </label>
        <br/>
        <input type="email" id="email" name="email" value="<?php echo $_POST["email"]; ?>">
        <br/>
        <br/>


    </fieldset>
</form>

<form method="post" action="command/verify_code.php">
    <fieldset>

        <label for="send_code_by_email">
            5. Receive Email with code:
        </label>
        <br/>
        <input type="submit" name="send_code_by_email" id="send_code_by_email" value="Receive E-Mail"
               class="btn btn-info btn-lg"/>
        <br/>
        <br/>

    </fieldset>
</form>
<form method="post" action="command/verify_code.php">
    <fieldset>
        <label for="code">
            6. Enter Code from Email:
        </label>
        <br/>
        <input type="text" id="code" name="code" value="<?php echo $_POST["code"]; ?>">
        <br/>

        <input type="submit" name="verify_code" value="Verify Code" id="verify_code" class="btn btn-info btn-lg"/>
        <!--            <input type="submit" name="monitoring" value="monitoring" id="monitoring" class="btn btn-info btn-lg"/>-->
        <br/>
        <br/>

    </fieldset>
</form>

<form method="post" action="query/monitoring.php">
    <fieldset>

        <legend>MONITORING</legend>

        <label for="monitoring">
            7. Show status of domains:
        </label>
        <br/>
        <input type="submit" name="monitoring" value="monitoring" id="monitoring" class="btn btn-info btn-lg"/>
        <!--            <input type="submit" name="monitoring" value="monitoring" id="monitoring" class="btn btn-info btn-lg"/>-->
        <br/>
        <br/>

    </fieldset>

</form>