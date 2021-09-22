<!-- <?php
include 'header.php';
?>
<?php
include 'footerTest.php';
?> -->




<html>
  <head>
    <meta HTTP-EQUIV="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="https://unpkg.com/tesseract.js@v2.0.0-beta.1/dist/tesseract.min.js"></script>
  </head>
  <body>
    <video id="player" controls></video>
    <button id="capture">Capture</button>
    <canvas id="snapshot" width="320" height="240"></canvas>
    <textarea id="result" style="width:640px;height:240px;"></textarea>
  </body>
</html>


<style>

body {
  color: #ccc;
  background: #080808;
  font-family: 'Century Gothic';
}

  button {
    border: none;
    height: 24px;
    font-size: 14px;
    color: #eee;
    background-color: #88f;
    border-radius: 8px;
    margin: 0 8px;
    padding: 0 16px;
  }
  
</style>

<script>
    const player = document.getElementById('player')
const snapshotZone = document.getElementById('snapshot')
const captureButton = document.getElementById('capture')
const result = document.getElementById('result')

navigator.mediaDevices.getUserMedia({ video: true }).then(stream => {
  player.srcObject = stream
})

captureButton.addEventListener('click', function() {
  const context = snapshot.getContext('2d')
  context.drawImage(player, 0, 0, snapshotZone.width, snapshotZone.height)
  // Tesseract.recognize(snapshotZone, 'jpn', { logger: m => console.log(m) }) // 日本語
  Tesseract.recognize(snapshotZone, 'eng', { logger: m => console.log(m) }) // 英語
    .then(({ data: { text } }) => {
    result.value = text
  })
})

</script>