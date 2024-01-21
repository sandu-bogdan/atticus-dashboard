document.addEventListener('DOMContentLoaded', () => {
    const apiKey = '1b7ef1ef899531eea03bf06de411906b';
    const latitude = '44.064890';
    const longitude = '28.234550';

    const locationElement = document.getElementById('location');
    const temperatureElement = document.getElementById('temperature');
    const descriptionElement = document.getElementById('description');
    const iconElement = document.getElementById('icon');
    const forecastElement = document.getElementById('forecast');

    function fetchCurrentWeather() {
        const apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}&units=metric`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                locationElement.textContent = data.name;
                temperatureElement.textContent = `${Math.round(data.main.temp)}°C`;
                descriptionElement.textContent = data.weather[0].description;
                iconElement.src = `https://openweathermap.org/img/w/${data.weather[0].icon}.png`;
            })
            .catch(error => console.error('Error fetching current weather data:', error));
    }

    function fetchWeatherForecast() {
        const forecastUrl = `https://api.openweathermap.org/data/2.5/forecast?lat=${latitude}&lon=${longitude}&appid=${apiKey}&units=metric`;

        fetch(forecastUrl)
            .then(response => response.json())
            .then(data => {
                const dailyForecasts = data.list.filter(item => item.dt_txt.includes('12:00:00'));

                forecastElement.innerHTML = ''; // Clear previous forecasts

                dailyForecasts.forEach((forecast, index) => {
                    const forecastDate = new Date(forecast.dt * 1000);
                    const dayOfWeek = new Intl.DateTimeFormat('en-US', { weekday: 'short' }).format(forecastDate);

                    const forecastItem = document.createElement('div');
                    forecastItem.classList.add('forecast-item');
                    forecastItem.innerHTML = `
                        <p>${dayOfWeek}</p>
                        <img src="https://openweathermap.org/img/w/${forecast.weather[0].icon}.png" alt="Weather Icon">
                        <p>${Math.round(forecast.main.temp)}°C</p>
                    `;

                    forecastElement.appendChild(forecastItem);
                });
            })
            .catch(error => console.error('Error fetching forecast data:', error));
    }

    // Initial fetch
    fetchCurrentWeather();
    fetchWeatherForecast();

    // Set interval to update every 10 seconds
    setInterval(() => {
        fetchCurrentWeather();
        fetchWeatherForecast();
    }, 10000);
});
