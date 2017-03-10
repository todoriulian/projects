== Weather in your laction == 

In this app, i use a geo location API which works with user device`s IP.
After i have your IP, with that info. i create a dynamic link with weather API witch 
proide me the weather in my location.

In the bottom of my code you can find a return in JSON. I make it with SESSION because the weather API
have a numer of request so i save it in session. After 600 s i request again the data from weather API.

Weather API from: https://www.wunderground.com/weather/api

@Todor Iulian
#Cluj-Napoca, RO
2017
====================================