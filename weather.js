class Weather {
	constructor(id, icon) 
	{
		this.id = id;
		this.icon = icon;		
	}

	display()
	{
		fetch("http://api.openweathermap.org/data/2.5/weather?q=noumea&lang=fr&appid=eea2c52399d4972988c3afb0252aca33")
		.then(response => response.json())
		.then(data => { 

				let id = data.weather[0].id;
				let icon = data.weather[0].icon;

				let urlIcon = "http://openweathermap.org/img/wn/" + icon + "@2x.png";
				document.getElementById("icon-weather").src = urlIcon;
		})
	}
}





