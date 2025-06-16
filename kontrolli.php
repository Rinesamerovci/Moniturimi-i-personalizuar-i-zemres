<!DOCTYPE html>
<html lang="sq">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Monitorimi i Personalizuar i Zemrës</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f9fafb;
    margin: 20px;
    color: #222;
  }
  h1 {
    text-align: center;
    margin-bottom: 20px;
  }
  form {
    background: white;
    max-width: 400px;
    margin: 0 auto 30px auto;
    padding: 20px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.12);
  }
  label {
    display: block;
    margin-bottom: 10px;
    font-weight: 600;
    font-size: 1.1rem;
    color: #444;
  }
input[type=number] {
  width: 100%;
  padding: 14px 18px;
  font-size: 1.1rem;
  border: 2px solid #ddd;
  border-radius: 10px;
  box-sizing: border-box;
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

/* Shtojmë box-shadow në fokus, por pa ndryshuar madhësinë */
input[type=number]:focus {
  outline: none;
  border-color: #dc3545;
  box-shadow: 0 0 8px rgba(220, 53, 69, 0.5);
  /* Mbajmë padding dhe border konstant */
  padding: 14px 18px;
  border-width: 2px;
  box-sizing: border-box;
}

  button {
    margin-top: 20px;
    width: 100%;
    padding: 14px;
    font-weight: 700;
    font-size: 1.2rem;
    background-color: #dc3545;
    border: none;
    border-radius: 12px;
    color: white;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(220, 53, 69, 0.4);
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
  }
  button:hover {
    background-color: #a71d2a;
    box-shadow: 0 6px 15px rgba(167, 29, 42, 0.6);
  }
  table {
    width: 100%;
    max-width: 500px;
    margin: 0 auto 30px auto;
    border-collapse: collapse;
    box-shadow: 0 2px 7px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
    background: white;
  }
  th, td {
    text-align: center;
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
  }
  th {
    background-color: #dc3545;
    color: white;
  }
  .low {
    background-color: #fff3cd;
    color: #856404;
  }
  .normal {
    background-color: #d1e7dd;
    color: #0f5132;
  }
  .high {
    background-color: #f8d7da;
    color: #842029;
  }
  .error {
    color: #b00020;
    text-align: center;
    font-weight: 600;
    margin-top: 10px;
  }
  .actions {
    max-width: 500px;
    margin: 15px auto 0 auto;
    display: flex;
    justify-content: center;
    gap: 12px;
  }
  .actions button {
    padding: 12px 25px;
    width: auto;
    font-weight: 600;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
  }
  #exportCSV {
    background-color: #0d6efd;
    color: white;
    border: none;
    transition: background-color 0.3s ease;
  }
  #exportCSV:hover {
    background-color: #0b5ed7;
  }
  #exportPDF {
    background-color: #198754;
    color: white;
    border: none;
    transition: background-color 0.3s ease;
  }
  #exportPDF:hover {
    background-color: #146c43;
  }
  #clearData {
    background-color: #dc3545;
    color: white;
    border: none;
    transition: background-color 0.3s ease;
  }
  #clearData:hover {
    background-color: #a71d2a;
  }
  #chartContainer {
    max-width: 600px;
    margin: 0 auto 40px auto;
    background: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 7px rgba(0,0,0,0.1);
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h1>Monitorimi i Personalizuar i Zemrës</h1>

<form id="pulseForm" autocomplete="off">
  <label for="rrahjet">Rrahjet e Zemrës (bpm):</label>
  <input type="number" id="rrahjet" min="30" max="200" placeholder="p.sh. 80" required />
  <button type="submit">Shto Matje</button>
  <div id="errorMsg" class="error"></div>
</form>

<table id="resultsTable" style="display:none;">
  <thead>
    <tr>
      <th>#</th>
      <th>Rrahjet (bpm)</th>
      <th>Statusi</th>
    </tr>
  </thead>
  <tbody></tbody>
</table>

<div id="chartContainer" style="display:none;">
  <canvas id="pulseChart" height="200"></canvas>
</div>

<div class="actions" style="display:none;" id="actionButtons">
  <button id="exportCSV">Eksporto CSV</button>
  <button id="exportPDF">Eksporto PDF</button>
  <button id="clearData">Fshij Të Dhënat</button>
</div>

<script>
  const form = document.getElementById('pulseForm');
  const errorMsg = document.getElementById('errorMsg');
  const resultsTable = document.getElementById('resultsTable');
  const tbody = resultsTable.querySelector('tbody');
  const actionButtons = document.getElementById('actionButtons');
  const chartContainer = document.getElementById('chartContainer');
  const ctx = document.getElementById('pulseChart').getContext('2d');

  let data = [];
  let chart;

  function vleresoRrahjet(v) {
    if (v < 60) return 'low';
    if (v <= 80) return 'normal';
    return 'high';
  }

  function statusiTekst(status) {
    if (status === 'low') return 'I Ulët';
    if (status === 'normal') return 'Normal';
    if (status === 'high') return 'I Lartë';
    return '';
  }

  function shtoRresht(vlera) {
    const status = vleresoRrahjet(vlera);
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${tbody.children.length + 1}</td>
      <td class="${status}">${vlera}</td>
      <td class="${status}">${statusiTekst(status)}</td>
    `;
    tbody.appendChild(row);
    resultsTable.style.display = 'table';
    actionButtons.style.display = 'flex';
    chartContainer.style.display = 'block';
  }

  function updateChart() {
    const labels = data.map((_, i) => i + 1);
    if (chart) chart.destroy();
    chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Rrahjet e Zemrës (bpm)',
          data: data,
          borderColor: 'rgba(220, 53, 69, 0.8)',
          backgroundColor: 'rgba(220, 53, 69, 0.3)',
          fill: true,
          tension: 0.3,
          pointRadius: 5,
          pointHoverRadius: 7,
          borderWidth: 2,
        }]
      },
      options: {
        scales: {
          y: {
            min: 30,
            max: 200,
            title: {
              display: true,
              text: 'Rrahjet (bpm)'
            }
          },
          x: {
            title: {
              display: true,
              text: 'Matja Nr.'
            }
          }
        },
        plugins: {
          legend: {
            display: true,
            position: 'top',
          }
        },
        responsive: true,
        maintainAspectRatio: false,
      }
    });
  }

  form.addEventListener('submit', e => {
    e.preventDefault();
    errorMsg.textContent = '';
    const vlera = parseInt(document.getElementById('rrahjet').value);

    if (isNaN(vlera) || vlera < 30 || vlera > 200) {
      errorMsg.textContent = 'Ju lutem vendosni një numër të vlefshëm për rrahjet (30-200).';
      return;
    }

    data.push(vlera);
    shtoRresht(vlera);
    updateChart();
    form.reset();
  });

 document.getElementById('exportPDF').addEventListener('click', () => {
  if (data.length === 0) return alert('Nuk ka të dhëna për eksport.');
  const { jsPDF } = window.jspdf;
  const pdf = new jsPDF();

  pdf.setFontSize(18);
  pdf.text('Matjet e Rrahjeve të Zemrës', 14, 22);
  pdf.setFontSize(12);

  let startY = 30;
  pdf.text('Nr', 14, startY);
  pdf.text('Rrahjet (bpm)', 40, startY);
  pdf.text('Statusi', 100, startY);

  startY += 10;

  data.forEach((vlera, idx) => {
    const status = statusiTekst(vleresoRrahjet(vlera));
    pdf.text(`${idx + 1}`, 14, startY);
    pdf.text(`${vlera}`, 40, startY);
    pdf.text(`${status}`, 100, startY);
    startY += 10;
  });

  // Hapësira për komentet poshtë tabelës
  startY += 10;
  pdf.setFontSize(14);
  pdf.text('Komentet dhe rekomandimet mjekësore:', 14, startY);
  startY += 10;
  pdf.setFontSize(12);

  const kaRrahjeTeUlta = data.some(v => v < 60);
  const kaRrahjeNormale = data.some(v => v >= 60 && v <= 100);
  const kaRrahjeTeLarta = data.some(v => v > 100);

  if (kaRrahjeTeUlta) {
    pdf.text('- Rrahjet e ulëta të zemrës mund të tregojnë probleme të ndryshme. Ju rekomandojmë të vizitoni këta mjekë specialistë:', 14, startY);
    startY += 8;
    pdf.text('  • Kardiologu Dr. Arben Krasniqi', 20, startY);
    startY += 8;
    pdf.text('  • Mjeku i përgjithshëm Dr. Elira Berisha', 20, startY);
    startY += 12;
  }

  if (kaRrahjeNormale) {
    pdf.text('- Rrahjet e zemrës janë brenda intervalit normal dhe nuk kërkojnë ndërhyrje të menjëhershme.', 14, startY);
    startY += 12;
  }

  if (kaRrahjeTeLarta) {
    pdf.text('- Rrahjet e larta të zemrës mund të jenë shenjë stresi, ankthi ose probleme të tjera. Konsultohuni me:', 14, startY);
    startY += 8;
    pdf.text('  • Kardiologu Dr. Lulzim Gashi', 20, startY);
    startY += 8;
    pdf.text('  • Specialist i mjekësisë sportive Dr. Flutura Dema', 20, startY);
    startY += 12;
  }

  pdf.save('matjet_e_zemres_me_komente_ne_nje_faqe.pdf');
});

</script>

</body>
</html>
