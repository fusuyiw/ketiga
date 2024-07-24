L.Control.Weather = L.Control.extend({
    options: {
        position: "topleft",
        units: "metric",
        lang: "en",
        event: "moveend",
        cssClass: "leaflet-control-weather",
        iconUrlTemplate: "https://openweathermap.org/img/w/:icon",
        template:
            '<div class="weatherIcon"><img src=":iconurl" alt="Ikon Cuaca"></div><div class="temperature">:temperature°C</div>',
        fullTemplate:
            '<div class="weatherIcon"><img src=":iconurl" alt="Ikon Cuaca"></div><div class="weather-info"><div class="location">Lokasi: :location</div><div class="description">Deskripsi: :description</div><div class="temperature">Suhu: :temperature°C</div><div class="humidity">Kelembapan: :humidity%</div><div class="pressure">Tekanan Udara: :pressure hPa</div><div class="windspeed">Kecepatan Angin: :windspeed m/s</div><div class="winddirection">Arah Angin: :winddirection</div><div class="windegrees">Derajat Angin: :windegrees°</div><div class="cloudiness">Awan: :cloudiness%</div><div class="sunrise">Matahari Terbit: :sunrise</div><div class="sunset">Matahari Terbenam: :sunset</div></div>',
        translateWindDirection: function (text) {
            return text;
        },
        updateWidget: undefined,
        htmlElementId: null,
        weatherData: null, // Simpan data cuaca di sini
    },
    onAdd: function (map) {
        this._div = L.DomUtil.create("div", this.options.cssClass);
        this.onMoveEnd = onMoveEnd.bind(this);
        if (!this.options.updateWidget) {
            this.options.updateWidget = this._updateWidget.bind(this);
        }
        this.refresh(this.options.updateWidget.bind(this));
        this._map.on(this.options.event, this.onMoveEnd);

        L.DomEvent.on(this._div, "click", this._showModal.bind(this));

        function onMoveEnd() {
            var _this = this;
            this.refresh(function (weather) {
                _this.options.weatherData = weather; // Simpan data cuaca
                _this.options.updateWidget(weather);
                if (_this.options.htmlElementId) {
                    _this.updateHtmlElement(weather);
                }
            });
        }
        return this._div;
    },
    onRemove: function (map) {
        this._map.off(this.options.event, this.onMoveEnd);
    },
    refresh: function (callback) {
        var _this = this,
            center = this._map.getCenter(),
            url =
                "https://api.openweathermap.org/data/2.5/weather?lat=:lat&lon=:lng&lang=:lang&units=:units&appid=:appkey";
        var apiKey = this.options.apiKey;

        url = url.replace(":lang", this.options.lang);
        url = url.replace(":units", this.options.units);
        url = url.replace(":lat", center.lat);
        url = url.replace(":lng", center.lng);
        url = url.replace(":appkey", apiKey);
        $.getJSON(url, function (weather) {
            callback(weather);
        });
    },
    _updateWidget: function (weather) {
        var iconUrl = this.options.iconUrlTemplate.replace(
            ":icon",
            weather.weather[0].icon + ".png"
        );

        // Kamus terjemahan deskripsi cuaca (sebagai contoh)
        var translationDictionary = {
            "clear sky": "cerah",
            "few clouds": "sedikit berawan",
            "scattered clouds": "cerah berawan",
            "broken clouds": "berawan",
            "shower rain": "gerimis",
            rain: "hujan",
            thunderstorm: "badai petir",
            snow: "salju",
            mist: "kabut",
        };

        var description = weather.weather[0].description;
        var translatedDescription =
            translationDictionary[description] || description;

        var tpl = this.options.template;
        tpl = tpl.replace(":iconurl", iconUrl);
        tpl = tpl.replace(":location", weather.name);
        tpl = tpl.replace(":description", translatedDescription); // Menggunakan deskripsi yang diterjemahkan
        tpl = tpl.replace(":temperature", weather.main.temp);
        $(this._div).html(tpl);

        // Simpan data cuaca dalam variabel global
        window.weatherData = {
            icon: iconUrl,
            location: weather.name,
            description: translatedDescription, // Menggunakan deskripsi yang diterjemahkan
            temperature: weather.main.temp,
            humidity: weather.main.humidity,
            pressure: weather.main.pressure,
            visibility: weather.visibility,
            windspeed: weather.wind.speed,
            winddirection: this.mapWindDirection(weather.wind.deg),
            windegrees: weather.wind.deg,
            cloudiness: weather.clouds.all,
            sunrise: new Date(weather.sys.sunrise * 1000).toLocaleTimeString(),
            sunset: new Date(weather.sys.sunset * 1000).toLocaleTimeString(),
        };
    },
    mapWindDirection: function (degrees) {
        var text = "";
        if (inRange(degrees, 11.25, 33.75)) {
            text = "Utara";
        } else if (inRange(degrees, 33.75, 56.25)) {
            text = "Timur Laut";
        } else if (inRange(degrees, 56.25, 78.75)) {
            text = "Timur";
        } else if (inRange(degrees, 78.75, 101.25)) {
            text = "Timur";
        } else if (inRange(degrees, 101.25, 123.75)) {
            text = "Timur Laut Selatan";
        } else if (inRange(degrees, 123.75, 146.25)) {
            text = "Tenggara";
        } else if (inRange(degrees, 146.25, 168.75)) {
            text = "Selatan";
        } else if (inRange(degrees, 168.75, 191.25)) {
            text = "Selatan";
        } else if (inRange(degrees, 191.25, 213.75)) {
            text = "Selatan Barat Daya";
        } else if (inRange(degrees, 213.75, 236.25)) {
            text = "Barat Daya";
        } else if (inRange(degrees, 236.25, 258.75)) {
            text = "Barat";
        } else if (inRange(degrees, 258.75, 281.25)) {
            text = "Barat";
        } else if (inRange(degrees, 281.25, 303.75)) {
            text = "Barat Laut";
        } else if (inRange(degrees, 303.75, 326.25)) {
            text = "Utara";
        } else if (inRange(degrees, 326.25, 348.75)) {
            text = "Utara";
        } else if (inRange(degrees, 348.75, 11.25)) {
            text = "Utara";
        }

        return this.options.translateWindDirection(text);

        function inRange(val, min, max) {
            if (max < min) {
                if (val >= min && val < 360) {
                    return true;
                }
                if (val > 0 && val < max) {
                    return true;
                }
                return false;
            }
            if (val >= min && val <= max) {
                return true;
            }
            return false;
        }
    },
    _showModal: function () {
        var weather = this.options.weatherData; // Ambil data cuaca dari variabel global
        if (weather) {
            var weatherDetails = document.getElementById("weatherDetails");
            var weatherData = {
                icon: this.options.iconUrlTemplate.replace(
                    ":icon",
                    weather.weather[0].icon + ".png"
                ),
                location: weather.name,
                description: weather.description, // Menggunakan deskripsi yang diterjemahkan
                temperature: weather.main.temp,
                humidity: weather.main.humidity,
                pressure: weather.main.pressure,
                visibility: weather.visibility,
                windspeed: weather.wind.speed,
                winddirection: this.mapWindDirection(weather.wind.deg),
                windegrees: weather.wind.deg,
                cloudiness: weather.clouds.all,
                sunrise: new Date(
                    weather.sys.sunrise * 1000
                ).toLocaleTimeString(),
                sunset: new Date(
                    weather.sys.sunset * 1000
                ).toLocaleTimeString(),
            };
            weatherDetails.innerHTML = `
                <div class="weatherIcon"><img src="${weatherData.icon}" alt="Ikon Cuaca"></div>
                <div class="weather-info">
                    <div class="location">Lokasi: ${weatherData.location}</div>
                    <div class="description">Deskripsi: ${weatherData.description}</div>
                    <div class="temperature">Suhu: ${weatherData.temperature}°C</div>
                    <div class="humidity">Kelembapan: ${weatherData.humidity}%</div>
                    <div class="pressure">Tekanan Udara: ${weatherData.pressure} hPa</div>
                    <div class="windspeed">Kecepatan Angin: ${weatherData.windspeed} m/s</div>
                    <div class="winddirection">Arah Angin: ${weatherData.winddirection}</div>
                    <div class="windegrees">Derajat Angin: ${weatherData.windegrees}°</div>
                    <div class="cloudiness">Awan: ${weatherData.cloudiness}%</div>
                    <div class="sunrise">Matahari Terbit: ${weatherData.sunrise}</div>
                    <div class="sunset">Matahari Terbenam: ${weatherData.sunset}</div>
                </div>
            `;
            var weatherModal = new bootstrap.Modal(
                document.getElementById("weatherModal")
            );
            weatherModal.show();
        } else {
            console.error("Data cuaca tidak tersedia untuk ditampilkan.");
        }
    },
});

L.control.weather = function (options) {
    if (!options.apiKey) {
        console.warn(
            "Leaflet.Weather: You must provide an OpenWeather API key.\nPlease see https://openweathermap.org/faq#error401 for more info"
        );
    }
    return new L.Control.Weather(options);
};

document.addEventListener("click", function (e) {
    if (e.target && e.target.closest(".leaflet-control-weather")) {
        var weatherDetails = document.getElementById("weatherDetails");

        if (window.weatherData) {
            var weatherData = window.weatherData;
            weatherDetails.innerHTML = `
                <div class="weather-info">
                    <p>Cuaca saat ini di <strong>${weatherData.location}</strong> adalah <em>${weatherData.description}</em> dengan suhu sekitar <strong>${weatherData.temperature}°C</strong>. Kelembapan udara saat ini mencapai <strong>${weatherData.humidity}%</strong>, sementara tekanan udara adalah <strong>${weatherData.pressure} hPa</strong>. Kecepatan angin tercatat pada <strong>${weatherData.windspeed} m/s</strong>, dan arahnya adalah <strong>${weatherData.winddirection}</strong>. Sejauh ini, awan menutupi langit sebanyak <strong>${weatherData.cloudiness}%</strong>. Matahari terbit pada <strong>${weatherData.sunrise}</strong> dan akan terbenam pada <strong>${weatherData.sunset}</strong>.</p>
                </div>

            `;
            var weatherModal = new bootstrap.Modal(
                document.getElementById("weatherModal")
            );
            weatherModal.show();
        } else {
            console.error("Data cuaca tidak tersedia untuk ditampilkan.");
        }
    }
});
