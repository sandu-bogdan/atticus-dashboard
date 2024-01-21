<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Atticus Dashboard</title>
  <link rel="shortcut icon" href="./img/favicon.ico" />
  <link rel="canonical" href="https://picocss.com/examples/company/" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <!-- Pico.css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css"/>
  <!-- Custom styles for this example -->
  <link rel="stylesheet" href="custom.css" />
</head>

<body>
  <div class="container">
    <div class="logo"><center>Atticus Dashboard</center></div>
    <section class="services">
      <div class="grid">
        <article>
          <div class="content">
            <div class="clock" id="clock"></div>
            <div class="date" id="date"></div>
            <p id="location"></p>
            <div class="content">
            <div class="grid">
              <div class="service-description">BTC - USD<br>
              <span id="btc"></span>$</div>
              <div class="service-description">EURO - RON<br>
              <span id="euro"></span> RON</div>
              <div class="service-description">USD - RON<br>
              <span id="usd"></span> RON</div>
            </div>
          </div>
          </div>
        </article>
        <article>
          <div class="grid">
            <div class="icon">
              <img id="icon" alt="Weather Icon">
              <p id="temperature"></p>
              <p id="description"></p>
            </div>
            <div class="title"> Weather
              <div class="grid" id="forecast"></div>
            </div>
          </div>
        </article>
      </div>
    </section>
    
    <section class="services">
      <div class="grid">
        <article>
          <div class="grid">
            <div class="icon"><img src="./img/adguard.png" alt="AdGuard Home" width="50" height="50"></div>
            <div class="title"> AdGuard Home <div class="description-header"> The world's most advanced ad blocker!</div></div>
          </div>
          <br>
          <div class="content">
            <div class="grid">
              <div class="service-description">Queries:<br>
              <span id="numDnsQueries"></span></div>
              <div class="service-description">Blocked:<br>
              <span id="numBlockedFiltering"></span></div>
              <div class="service-description">Latency:<br>
              <span id="avgProcessingTime"></span>ms</div>
            </div>
          </div>
        </article>
        
        <article>
          <div class="grid">
            <div class="icon"><img src="./img/transmission.png" alt="AdGuard Home" width="50" height="50"></div>
            <div class="title"> Transmission <div class="description-header"> The world's most advanced torrent client!</div></div>
            </div>
            <br>
            <div class="content">
              <div class="grid">
                <div class="service-description"><i class="fa fa-download" aria-hidden="true"></i><br>
                <span id="downloadedGB"></span> GB</div>
                <div class="service-description"><i class="fa fa-upload" aria-hidden="true"></i><br>
                <span id="uploadedGB"></span> GB</div>
                <div class="service-description">Torrents:<br>
                <span id="torrentCount"></span></div>
                <div class="service-description"><i class="fa fa-download" aria-hidden="true"></i> Speed<br>
                <span id="downloadSpeed"></span> kB/s</div>
                <div class="service-description"><i class="fa fa-upload" aria-hidden="true"></i> Speed<br>
                <span id="uploadSpeed"></span> kB/s</div>
              </div>
            </div>
          </article>
          
          <article>
            <div class="grid">
              <div class="icon"><img src="./img/uptimerobot.png" alt="AdGuard Home" width="50" height="50"></div>
              <div class="title"> UpTimeRobot<div class="description-header"> The world's most advanced monitor </div></div>
            </div>
            <br>
            <div class="content">
              <div class="grid">
                <div class="service-description">Up:<br>
                <span id="upMonitors"></span></div>
                <div class="service-description">Down:<br>
                <span id="downMonitors"></span></div>
              </div>
            </div>
          </article>
        </div>
      </section>
        
      <section class="services">
        <div class="grid">
          <article>
            <div class="grid">
              <div class="icon"><font size="20"><i class="fa fa-server" aria-hidden="true"></i></font></div>
              <div class="title"> <span id="glancesName"></span><div class="description-header"> <span id="glancesUrl"></span> </div></div>
            </div>
            <br>
            <div class="content">
              <div class="grid">
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">Used<br>
                    <span id="memUsed"></span></div>
                    <div class="service-description">Memory<br>
                    <span id="mem"></span>%</div>
                  </article>
                </div>
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">Disk<br>
                    <span id="totalSpace"></span></div>
                    <div class="service-description">Used<br>
                    <span id="usedSpace"></span></div>
                  </article>
                </div>
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">Free<br>
                    <span id="freeSpace"></span></div>
                    <div class="service-description">Uptime<br>
                    <span id="uptime"></span></div>
                  </article>
                </div>
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">Memory<br>
                    <span id="memory"></span></div>
                    <div class="service-description">Available<br>
                    <span id="memAvailable"></span></div>
                  </article>
                </div>
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">CPU Load<br>
                    <span id="cpu"></span>%</div>
                    <div class="service-description">CPU Temp<br>
                    <span id="cpuTemp"></span> C</div>
                  </article>
                </div>
              </div>
            </div>
          </article>
          
          <article>
            <div class="grid">
              <div class="icon"><font size="20"><i class="fa fa-server" aria-hidden="true"></i></font></div>
              <div class="title"> <span id="glancesName-2"></span><div class="description-header"> <span id="glancesUrl-2"></span> </div></div>
            </div>
            <br>
            <div class="content">
              <div class="grid">
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">Used<br>
                    <span id="memUsed-2"></span></div>
                    <div class="service-description">Memory<br>
                    <span id="mem-2"></span>%</div>
                  </article>
                </div>
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">Disk<br>
                    <span id="totalSpace-2"></span></div>
                    <div class="service-description">Used<br>
                    <span id="usedSpace-2"></span></div>
                  </article>
                </div>
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">Free<br>
                    <span id="freeSpace-2"></span></div>
                    <div class="service-description">Uptime<br>
                    <span id="uptime-2"></span></div>
                  </article>
                </div>
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">Memory<br>
                    <span id="memory-2"></span></div>
                    <div class="service-description">Available<br>
                    <span id="memAvailable-2"></span></div>
                  </article>
                </div>
                <div class="grid child">
                  <article class="child">
                    <div class="service-description">CPU Load<br>
                    <span id="cpu-2"></span>%</div>
                    <div class="service-description">CPU Temp<br>
                    <span id="cpuTemp-2"></span> C</div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
    <!-- Footer -->
    <footer class="container">
    </footer>
    <!-- ./ Footer -->
  </body>
  <script src="./js/weather.js"></script>
  <script src="./js/custom.js"></script>
</html>