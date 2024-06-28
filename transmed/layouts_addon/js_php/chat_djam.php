<script>
    function ajax() {
        var req = new XMLHttpRequest();
        req.onreadystatechange = function () {
            if (req.readyState == 4 && req.status == 200) {
                document.getElementById('chat_djam').innerHTML = req.responseText;
            }
        };


        req.open('GET', 'ajax/ajax_chat_djam.php', 'true');
        req.send();
    }

    //    setInterval(function(ajax(),1000));
    setInterval(function () {
        ajax();
    }, 1000);

    //    ajax();
</script>



