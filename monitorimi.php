<!-- <!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Monitori i Zemrës - Laptop</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: linear-gradient(to bottom right, #f4f8ff, #ffffff);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 1rem;
    }

    .container {
      background: #fff;
      border-radius: 20px;
      padding: 20px;
      max-width: 420px;
      width: 100%;
      box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
      text-align: center;
    }

    .logo {
      width: 80px;
      height: 80px;
      margin-bottom: 10px;
    }

    h1 {
      font-size: 1.4rem;
      color: #333;
      margin-bottom: 15px;
    }

    #bpm {
      font-size: 2.2rem;
      font-weight: bold;
      color: #dc3545;
      margin: 10px 0;
    }

    #timer {
      font-size: 1rem;
      color: #007bff;
      margin-bottom: 10px;
    }

    #status {
      font-size: 1rem;
      color: #555;
      margin-bottom: 15px;
    }

    button {
      padding: 12px 20px;
      border: none;
      border-radius: 10px;
      background-color: #007bff;
      color: white;
      font-size: 1rem;
      cursor: pointer;
      margin-top: 10px;
    }

    button:hover {
      background-color: #0056b3;
    }

    canvas {
      margin: 10px 0;
    }

    video,
    canvas#captureCanvas {
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Monitorimi i Rrahjeve të Zemrës</h1>
    <div id="bpm">-- BPM</div>
    <div id="timer">Koha: 30 sek</div>
    <div id="status">Vendos gishtin mbi kamerën e përparme</div>
    <button onclick="startMeasurement()">Fillo Matjen</button>
    <button onclick="stopMeasurement()">Ndalo Matjen</button>
    <canvas id="chartCanvas" height="180"></canvas>
  </div>

  <video id="video" autoplay playsinline></video>
  <canvas id="captureCanvas" width="100" height="100"></canvas>

  <script>
    const video = document.getElementById("video");
    const canvas = document.getElementById("captureCanvas");
    const ctx = canvas.getContext("2d");
    const bpmDisplay = document.getElementById("bpm");
    const timerDisplay = document.getElementById("timer");
    const statusDisplay = document.getElementById("status");

    let measuring = false,
        beats = 0,
        lastPeak = 0,
        startTime,
        timer,
        redValues = [],
        chart,
        bpmHistory = [];

    function initChart() {
      const ctxChart = document.getElementById("chartCanvas").getContext("2d");
      const gradient = ctxChart.createLinearGradient(0, 0, 0, 200);
      gradient.addColorStop(0, "rgba(255,77,77,0.4)");
      gradient.addColorStop(1, "rgba(255,255,255,0)");

      chart = new Chart(ctxChart, {
        type: "line",
        data: {
          labels: [],
          datasets: [
            {
              label: "Rrahje",
              data: [],
              borderColor: "#ff4d4d",
              backgroundColor: gradient,
              fill: true,
              tension: 0.4,
              pointRadius: 0,
            },
          ],
        },
        options: {
          responsive: true,
          animation: false,
          scales: { x: { display: false }, y: { display: false } },
          plugins: { legend: { display: false } },
        },
      });
    }

    async function startCamera() {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({
          video: { facingMode: "user" }
        });
        video.srcObject = stream;
        requestAnimationFrame(readFrame);
      } catch (err) {
        alert("❗ Leja për kamerën nuk u dha ose ndodhi një gabim.");
        statusDisplay.textContent = "❗ Kamera nuk është aktive.";
      }
    }

    function startMeasurement() {
      if (!video.srcObject) {
        alert("Kamera nuk është aktive.");
        return;
      }
      redValues = [];
      beats = 0;
      lastPeak = 0;
      bpmHistory = [];
      measuring = true;
      startTime = Date.now();
      statusDisplay.textContent = "Matja ka filluar...";
      bpmDisplay.textContent = "-- BPM";

      chart.data.labels = [];
      chart.data.datasets[0].data = [];
      chart.update();

      let remaining = 30;
      timerDisplay.textContent = "Koha: 30 sek";
      timer = setInterval(() => {
        remaining--;
        timerDisplay.textContent = `Koha: ${remaining} sek`;
        if (remaining <= 0) {
          clearInterval(timer);
          finishMeasurement();
        }
      }, 1000);
    }

    function stopMeasurement() {
      if (measuring) {
        measuring = false;
        clearInterval(timer);
        bpmDisplay.textContent = "-- BPM";
        statusDisplay.textContent = "Matja u ndal.";
      }
    }

    function readFrame() {
      if (!video.videoWidth) {
        requestAnimationFrame(readFrame);
        return;
      }

      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
      const data = ctx.getImageData(0, 0, canvas.width, canvas.height).data;

      let redSum = 0;
      for (let i = 0; i < data.length; i += 4) redSum += data[i];
      const redAvg = redSum / (data.length / 4);

      if (measuring) {
        const now = Date.now();
        redValues.push(redAvg);
        chart.data.labels.push("");
        chart.data.datasets[0].data.push(redAvg);
        if (chart.data.labels.length > 100) {
          chart.data.labels.shift();
          chart.data.datasets[0].data.shift();
        }
        chart.update();

        if (redValues.length > 30) {
          const recent = redValues.slice(-30);
          const max = Math.max(...recent);
          const min = Math.min(...recent);
          const threshold = min + (max - min) * 0.6;
          const current = recent[recent.length - 1];

          if (current > threshold && now - lastPeak > 500) {
            beats++;
            lastPeak = now;
            const duration = (now - startTime) / 1000;
            const bpm = Math.round((beats / duration) * 60);
            bpmDisplay.textContent = bpm + " BPM";
            bpmHistory.push(bpm);
          }
        }
      }

      if (redAvg < 40 && measuring) {
        measuring = false;
        clearInterval(timer);
        bpmDisplay.textContent = "--";
        statusDisplay.textContent = "❌ Gishti u largua nga kamera.";
      }

      requestAnimationFrame(readFrame);
    }

    function finishMeasurement() {
      measuring = false;
      if (bpmHistory.length === 0) {
        bpmDisplay.textContent = "-- BPM";
        statusDisplay.textContent = "❗ Nuk u mat asnjë rrahje.";
        return;
      }

      const avgBpm = Math.round(bpmHistory.reduce((a, b) => a + b, 0) / bpmHistory.length);
      bpmDisplay.textContent = avgBpm + " BPM";

      if (avgBpm < 60) {
        statusDisplay.textContent = "⚠️ Rrahje të ulëta.";
      } else if (avgBpm <= 80) {
        statusDisplay.textContent = "✅ Rrahje të zakonshme.";
      } else if (avgBpm <= 100) {
        statusDisplay.textContent = "⚠️ Të larta – Shiko aktivitetin fizik.";
      } else {
        statusDisplay.textContent = "🚨 Shumë të larta – Konsultohu me mjek.";
      }
    }

    initChart();
    startCamera();
  </script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="sq">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Monitori i Zemrës</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
      body {
        margin: 0;
        font-family: "Segoe UI", sans-serif;
        background: linear-gradient(to bottom right, #f4f8ff, #ffffff);
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 1rem;
      }

      .container {
        background: #fff;
        border-radius: 20px;
        padding: 20px;
        max-width: 420px;
        width: 100%;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
        text-align: center;
      }

      .logo {
        width: 80px;
        height: 80px;
        margin-bottom: 10px;
      }

      h1 {
        font-size: 1.4rem;
        color: #333;
        margin-bottom: 15px;
      }

      #bpm {
        font-size: 2.2rem;
        font-weight: bold;
        color: #dc3545;
        margin: 10px 0;
      }

      #timer {
        font-size: 1rem;
        color: #007bff;
        margin-bottom: 10px;
      }

      #status {
        font-size: 1rem;
        color: #555;
        margin-bottom: 15px;
      }

      button {
        padding: 12px 20px;
        border: none;
        border-radius: 10px;
        background-color: #007bff;
        color: white;
        font-size: 1rem;
        cursor: pointer;
        margin-top: 10px;
      }

      button:hover {
        background-color: #0056b3;
      }

      canvas {
        margin: 10px 0;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <img src="images/logo.png" alt="Logo" class="logo" />
      <h1>Monitorimi i Rrahjeve të Zemrës</h1>
      <div id="bpm">-- BPM</div>
      <div id="timer">Koha: 30 sek</div>
      <div id="status">Vendos gishtin mbi kamerën me blic</div>
      <button onclick="startMeasurement()">Fillo Matjen</button>
      <button onclick="stopMeasurement()">Ndalo Matjen</button>
      <button id="viewResultsBtn" style="display:none;" onclick="window.location.href='kontrolli.php'">
        Shiko Rezultatet
      </button>

      <canvas id="chartCanvas" height="180"></canvas>
    </div>

    <script>
      let measuring = false,
        beats = 0,
        bpmHistory = [],
        chart,
        timer;

      function initChart() {
        const ctxChart = document
          .getElementById("chartCanvas")
          .getContext("2d");
        const gradient = ctxChart.createLinearGradient(0, 0, 0, 200);
        gradient.addColorStop(0, "rgba(255,77,77,0.4)");
        gradient.addColorStop(1, "rgba(255,255,255,0)");

        chart = new Chart(ctxChart, {
          type: "line",
          data: {
            labels: [],
            datasets: [
              {
                label: "Rrahje",
                data: [],
                borderColor: "#ff4d4d",
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointRadius: 0,
              },
            ],
          },
          options: {
            responsive: true,
            animation: false,
            scales: { x: { display: false }, y: { display: false } },
            plugins: { legend: { display: false } },
          },
        });
      }

      function startMeasurement() {
        bpmHistory = [];
        beats = 0;
        measuring = true;
        let seconds = 30;
        document.getElementById("status").textContent = "Matja ka filluar...";
        document.getElementById("bpm").textContent = "-- BPM";
        document.getElementById("viewResultsBtn").style.display = "none";

        if (chart) {
          chart.data.labels = [];
          chart.data.datasets[0].data = [];
          chart.update();
        }

        timer = setInterval(() => {
          seconds--;
          document.getElementById("timer").textContent = `Koha: ${seconds} sek`;
          simulateReading();

          if (seconds <= 0) {
            clearInterval(timer);
            finishMeasurement();
          }
        }, 1000);
      }

      function stopMeasurement() {
        measuring = false;
        clearInterval(timer);
        document.getElementById("bpm").textContent = "-- BPM";
        document.getElementById("status").textContent = "Matja u ndal.";
      }

      function simulateReading() {
        const fakeRedValue = 200 + Math.random() * 50;
        chart.data.labels.push("");
        chart.data.datasets[0].data.push(fakeRedValue);
        if (chart.data.labels.length > 50) {
          chart.data.labels.shift();
          chart.data.datasets[0].data.shift();
        }
        chart.update();

        const bpm = 65 + Math.floor(Math.random() * 35);
        document.getElementById("bpm").textContent = bpm + " BPM";
        bpmHistory.push(bpm);
      }

      function finishMeasurement() {
        measuring = false;
        const avgBpm = Math.round(
          bpmHistory.reduce((a, b) => a + b, 0) / bpmHistory.length
        );

        document.getElementById("bpm").textContent = avgBpm + " BPM";

        if (avgBpm < 60) {
          document.getElementById("status").textContent = "⚠️ Rrahje të ulëta.";
        } else if (avgBpm <= 80) {
          document.getElementById("status").textContent = "✅ Rrahje të zakonshme.";
        } else if (avgBpm <= 100) {
          document.getElementById("status").textContent = "⚠️ Të larta – Shiko aktivitetin fizik.";
        } else {
          document.getElementById("status").textContent = "🚨 Shumë të larta – Konsultohu me mjek.";
        }

        document.getElementById("viewResultsBtn").style.display = "inline-block";

        saveBpm(avgBpm);
      }

      function saveBpm(bpm) {
        fetch('save_bpm.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ bpm: bpm })
        })
        .then(res => res.json())
        .then(data => console.log(data))
        .catch(err => console.error(err));
      }

      initChart();
    </script>
  </body>
</html>
