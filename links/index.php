<!DOCTYPE html>
<html>
<head>
    <title>links</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="popup-container" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999; display: flex; align-items: center; justify-content: center;">
        <div id="popup" class="popup">
            <section class="content">
                <h2 style="text-align: left; text-shadow: 0 0 10px blue;">Notice</h2>
                
                <p id="popup-message"></p>
                <button id="popup-close-button" onclick="hidePopup()">Close</button>
            </section>
        </div>
    </div>
    <div class="container">
        <header>
            <h1>isaqathe.eu.org</h1>
        </header>
        <nav>
            <ul>
                <li><a href="/index.html">home</a></li>
                <li><a href="/board">board</a></li>
                <li><a href="/links.txt">links</a></li>
                <li><a href="/chat">chat</a></li>
            </ul>
        </nav>
        <main>
            <section class="content">
                <div id="link-container">
                    <?php
                    $linksFile = "links.txt";
                    $links = file($linksFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    foreach ($links as $link) {
                        list($url, $explanation) = explode(' ', $link, 2);
                        $urlWithExplanation = "<section class=\"content\"><h2 style='text-align: left;'>$explanation</h2><p onclick='copyToClipboard(\"$url\", \"$explanation\");'>$url</p></section>";
                        echo "<div class='link-container'>$urlWithExplanation</div>";
                    }
                    ?>
                </div>
            </section>
        </main>
    </div>
    <script>
        hidePopup();
        function copyToClipboard(text, explanation) {
            const textarea = document.createElement("textarea");
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand("copy");
            document.body.removeChild(textarea);
            
            const popupMessage = document.getElementById("popup-message");
            popupMessage.textContent = `Link copied to clipboard: ${explanation}`;
            showPopup();
        }

        function showPopup() {
            const popupContainer = document.getElementById("popup-container");
            popupContainer.style.display = "flex"; // Display as flex to center vertically
        }

        function hidePopup() {
            const popupContainer = document.getElementById("popup-container");
            popupContainer.style.display = "none";
        }
    </script>
    <style> img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] { display: none;} </style> 
</body>
</html>
