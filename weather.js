class Weather {
	constructor(id, description, icon, temp_max, temp_min) 
	{
		this.id = id;
		this.description = description;
		this.icon = icon;
		this.temperature_max = temp_max;
		this.temperature_min = temp_min;		
	}

	display()
	{
		fetch("http://api.openweathermap.org/data/2.5/weather?q=noumea&lang=fr&appid=eea2c52399d4972988c3afb0252aca33")
		.then(response => response.json())
		.then(data => { 

				let id = data.weather[0].id;
				let description = data.weather[0].description;
				let icon = data.weather[0].icon;
				let temperature_max = data.main.temp_max;
				let temperature_min = data.main.temp_min;

				let urlIcon = "http://openweathermap.org/img/wn/" + icon + "@2x.png";
				document.getElementById("icon-weather").src = urlIcon;
		})
	}
}





