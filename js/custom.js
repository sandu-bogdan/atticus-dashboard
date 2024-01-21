        // Function to update system information
        function updateSystemInfo() {
            fetch('./api/uptimerobot.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('upMonitors').innerText = data.upMonitors;
                    document.getElementById('downMonitors').innerText = data.downMonitors;
                })
                .catch(error => console.error('Error fetching system info:', error));
            fetch('./api/transmission.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('downloadedGB').innerText = data.downloadedGB;
                    document.getElementById('uploadedGB').innerText = data.uploadedGB;
                    document.getElementById('torrentCount').innerText = data.torrentCount;
                    document.getElementById('downloadSpeed').innerText = data.downloadSpeed;
                    document.getElementById('uploadSpeed').innerText = data.uploadSpeed;
                })
                .catch(error => console.error('Error fetching system info:', error));
            fetch('./api/adguard.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('numDnsQueries').innerText = data.numDnsQueries;
                    document.getElementById('numBlockedFiltering').innerText = data.numBlockedFiltering;
                    document.getElementById('avgProcessingTime').innerText = data.avgProcessingTime;
                })
                .catch(error => console.error('Error fetching system info:', error));
            fetch('./api/glances-1.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cpu').innerText = data.cpu;
                    document.getElementById('mem').innerText = data.mem;
                    document.getElementById('totalSpace').innerText = data.totalSpace;
                    document.getElementById('usedSpace').innerText = data.usedSpace;
                    document.getElementById('freeSpace').innerText = data.freeSpace;
                    document.getElementById('uptime').innerText = data.uptime;
                    document.getElementById('memory').innerText = data.memory;
                    document.getElementById('memAvailable').innerText = data.memAvailable;
                    document.getElementById('memUsed').innerText = data.memUsed;
                    document.getElementById('cpuTemp').innerText = data.cpuTemp;
                    document.getElementById('glancesUrl').innerText = data.glancesUrl;
                    document.getElementById('glancesName').innerText = data.glancesName;
                })
                .catch(error => console.error('Error fetching system info:', error));
            fetch('./api/glances-2.php')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('cpu-2').innerText = data.cpu;
                    document.getElementById('mem-2').innerText = data.mem;
                    document.getElementById('totalSpace-2').innerText = data.totalSpace;
                    document.getElementById('usedSpace-2').innerText = data.usedSpace;
                    document.getElementById('freeSpace-2').innerText = data.freeSpace;
                    document.getElementById('uptime-2').innerText = data.uptime;
                    document.getElementById('memory-2').innerText = data.memory;
                    document.getElementById('memAvailable-2').innerText = data.memAvailable;
                    document.getElementById('memUsed-2').innerText = data.memUsed;
                    document.getElementById('cpuTemp-2').innerText = data.cpuTemp;
                    document.getElementById('glancesUrl-2').innerText = data.glancesUrl;
                    document.getElementById('glancesName-2').innerText = data.glancesName;
                })
                .catch(error => console.error('Error fetching system info:', error));
            fetch('https://blockchain.info/ticker')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('btc').innerText = data.USD.last;
                })
                .catch(error => console.error('Error fetching system info:', error));

            fetch('https://api.exchangerate-api.com/v4/latest/USD')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('usd').innerText = data.rates.RON;
                })
                .catch(error => console.error('Error fetching system info:', error));
            fetch('https://api.exchangerate-api.com/v4/latest/EUR')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('euro').innerText = data.rates.RON;
                })
                .catch(error => console.error('Error fetching system info:', error));
        }


        // Update system information every 10 seconds
        setInterval(updateSystemInfo, 10000);

        // Initial update
        updateSystemInfo();




        function updateClock() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
    
            // Pad single digit hours, minutes, and seconds with a leading zero
            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;
    
            var timeString = hours + ":" + minutes + ":" + seconds;
    
            document.getElementById("clock").innerHTML = timeString;
    
            var month = now.getMonth() + 1; // months are zero-based
            var day = now.getDate();
            var year = now.getFullYear();
    
            var dateString = month + "/" + day + "/" + year;
    
            document.getElementById("date").innerHTML = dateString;
        }
    
        // Update the clock every second
        setInterval(updateClock, 1000);
    
        // Initial update
        updateClock();


