class Weather {
	constructor(id, description, icon) 
	{
		this.id = id;
		this.description = description;
		this.urlThundertsorm = "http://openweathermap.org/img/wn/11d.png";
		this.urlDrizzle = "http://openweathermap.org/img/wn/09d.png";
		this.urlRain = "http://openweathermap.org/img/wn/10d.png";
		this.urlSnow = "http://openweathermap.org/img/wn/13d.png";
		this.urlAtmosphere = "http://openweathermap.org/img/wn/50d.png";

		this.urlClear = new Icon({ // icon jour + icon nuit
			urlClearDay = "http://openweathermap.org/img/wn/01d.png", 
			urlClearNight = "http://openweathermap.org/img/wn/01n.png"
		});
		
		this.urlFewClouds = new Icon({ // quelques nuages
			urlFewDay = "http://openweathermap.org/img/wn/02d.png", 
			urlFewNight = "http://openweathermap.org/img/wn/02n.png"
		});

		this.urlScatteredClouds = new Icon({ // nuages éparpillés
			urlScatteredDay = "http://openweathermap.org/img/wn/03d.png", 
			urlScatteredNight = "http://openweathermap.org/img/wn/03n.png"
		});		

		this.urlClouds = new Icon({ // nuages brisés et nuageux
			urlCloudsDay = "http://openweathermap.org/img/wn/04d.png", 
			urlCloudsNight = "http://openweathermap.org/img/wn/04n.png"
		});

		/*
		this.urlClear = "http://openweathermap.org/img/wn/01d.png"; this.urlClear = "http://openweathermap.org/img/wn/01n.png";
		this.urlFewClouds = "http://openweathermap.org/img/wn/02d.png"; this.urlFewClouds = "http://openweathermap.org/img/wn/02n.png"; // quelques nuages 
		this.urlScatteredClouds = "http://openweathermap.org/img/wn/03d.png"; this.urlScatteredClouds = "http://openweathermap.org/img/wn/03n.png"; // nuages éparpillés
		this.urlClouds = "http://openweathermap.org/img/wn/04d.png"; this.urlClouds = "http://openweathermap.org/img/wn/04n.png"; // nuages brisés et nuageux
		*/
	}
	display()
	{
		fetch('http://api.openweathermap.org/data/2.5/weather?q=noumea&lang=fr&appid=eea2c52399d4972988c3afb0252aca33')
		.then(response => response.json())
		.then(data => { 

			for (var i = 0; i < data.length; i++) {
				let id = data[i].weather[0].id;
				let description = data[i].weather[0].description;
				let icon = data[i].weather[0].icon;

				if (data[i].weather[0].id == 800) { // SI l'id est égal à 800 ALORS on affiche la description de la météo et l'icon du soleil 
					description = this.description;
					icon = this.urlClear;
				}
				if (data[i].weather[0].id === 801) { // SI l'id est supérieur à 800 ALORS on affiche la description et l'icon des nuages 
					description = this.description;
					icon = this.urlFewClouds;
				}


				// var iconurl = "http://openweathermap.org/img/w/" + iconcode + ".png";
			}
		}
	}
}