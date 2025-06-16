<!DOCTYPE html>
<html lang="sq">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ZemraIme – Kujdesu për Zemrën tënde</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <style>
    body { {
    background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1050&q=80') no-repeat center center fixed;
    background-size: cover;
    filter: brightness(0.85);
    font-family: 'Segoe UI', sans-serif;
  }

    font-family: 'Segoe UI', sans-serif;
    }
      .container {
      max-width: 900px; /* më i gjerë për kartat */
      margin-top: 60px;
    }

    .card {
      border-radius: 20px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      padding: 30px; /* më shumë hapësirë brenda */
      font-size: 1.1rem; /* tekst pak më i madh për lexueshmëri */
    }

    h1, h3 {
      text-align: center;
    }
    .card ul li::before {
      margin-right: 8px;
      color: #2d8659;
    }
    .btn-option {
      min-width: 130px;
      margin: 5px;
    }
    #btnNextQuestion {
      display: none;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="mb-4">❤️ ZemraIme</h1>

    <div class="card p-4 mb-4">
      <h3>🧠 Fakti i Ditës për Zemrën</h3>
      <div id="fakti" class="alert alert-info mt-3"></div>
      <button class="btn btn-dark" onclick="shfaqFaktRandom()">Shfaq fakt tjetër</button>
    </div>

    <div class="card p-4 mb-4">
      <h3>🏋️‍♂️ Ushtrimet më të Mira për Zemrën</h3>
      <ul>
        <li>Ecje e shpejtë për 30-45 minuta çdo ditë, që rrit kapacitetin e mushkërive dhe përmirëson qarkullimin.</li>
        <li>Vrap i lehtë apo jogging, i cili forcon muskujt e zemrës dhe ul rrezikun nga sëmundjet kardiovaskulare.</li>
        <li>Noti, që përmirëson funksionin e zemrës dhe muskujve pa stres në nyje.</li>
        <li>Ciklizmi, një aktivitet kardio që ndihmon në uljen e presionit të gjakut.</li>
        <li>Yoga dhe ushtrime të frymëmarrjes për uljen e stresit dhe tensionit të zemrës.</li>
      </ul>
    </div>

    <div class="card p-4 mb-4">
      <h3>🥑 Ushqimet më të Mira për Zemrën</h3>
      <ul>
        <li>Avokado – një burim i shkëlqyer i yndyrnave të shëndetshme që ndihmojnë në uljen e kolesterolit të keq.</li>
        <li>Arrat, bajamet dhe farat – të pasura me omega-3 dhe antioksidantë që mbrojnë enët e gjakut.</li>
        <li>Salmoni dhe peshqit e tjerë yndyrorë – kontribuojnë në uljen e inflamacionit dhe përmirësimin e funksionit të zemrës.</li>
        <li>Frutat e pyllit (boronica, mjedra) – ndihmojnë në reduktimin e presionit të gjakut.</li>
        <li>Perimet jeshile si spinaqi dhe kale – të pasura me fibra dhe vitamina që përmirësojnë qarkullimin.</li>
        <li>Vaji i ullirit ekstra i virgjër – një yndyrë e shëndetshme që nxit funksionin kardiovaskular.</li>
      </ul>
    </div>

    <div class="card p-4">
      <h3>❓ Kuizi i Zemrës</h3>
      <div id="kuizi" class="mt-3"></div>
      <div id="pergjigja" class="mt-3"></div>
      <button id="btnNextQuestion" class="btn btn-primary" onclick="pyetjaAktuale++; shfaqPyetjen();">Pyetja tjetër</button>
    </div>

  </div>

  <script>
    const faktet = [
      "Zemra rreh mesatarisht 100,000 herë në ditë.",
      "Qeshja ul tensionin dhe është e mirë për zemrën.",
      "Ushtrimet e përditshme e forcojnë zemrën.",
      "Gjumi i mirë ndihmon në shëndetin kardiovaskular.",
      "Zemra fillon të rrahë që në javën e 4-të të shtatzënisë.",
      "Stresi afatgjatë e dëmton funksionin e zemrës.",
      "Dieta me shumë perime e fruta mbron zemrën.",
      "Për të pasur zemër të shëndetshme, shmangni duhanin.",
      "Uji ndihmon në funksionimin e mirë të zemrës.",
      "Aktiviteti fizik i rregullt ul rrezikun e sëmundjeve të zemrës."
    ];

    function shfaqFaktRandom() {
      const index = Math.floor(Math.random() * faktet.length);
      document.getElementById("fakti").innerText = faktet[index];
    }

    const pyetjet = [
      {
        pyetje: "Sa herë rreh zemra mesatarisht në ditë?",
        opsione: [
          { tekst: "100,000", vlera: true },
          { tekst: "50,000", vlera: false },
          { tekst: "200,000", vlera: false }
        ]
      },
      {
        pyetje: "Cili ushtrim është i mirë për zemrën?",
        opsione: [
          { tekst: "Vrap i lehtë", vlera: true },
          { tekst: "Ngjitje në kodër pa pushim", vlera: false },
          { tekst: "Qëndrim i gjatë ulur", vlera: false }
        ]
      },
      {
        pyetje: "Cili prej këtyre ushqimeve është i mirë për zemrën?",
        opsione: [
          { tekst: "Salmoni", vlera: true },
          { tekst: "Ushqim i skuqur", vlera: false },
          { tekst: "Pijet me sheqer", vlera: false }
        ]
      },
      {
        pyetje: "Çfarë ndikon negativisht në shëndetin e zemrës?",
        opsione: [
          { tekst: "Stresi kronik", vlera: true },
          { tekst: "Yoga", vlera: false },
          { tekst: "Ecja", vlera: false }
        ]
      },
      {
        pyetje: "Cila perime është veçanërisht e mirë për zemrën?",
        opsione: [
          { tekst: "Spinaqi", vlera: true },
          { tekst: "Patatet e skuqura", vlera: false },
          { tekst: "Mish i përpunuar", vlera: false }
        ]
      }
    ];

    let pyetjaAktuale = 0;

    function shfaqPyetjen() {
      const kuiziDiv = document.getElementById("kuizi");
      kuiziDiv.innerHTML = "";

      if (pyetjaAktuale >= pyetjet.length) {
        kuiziDiv.innerHTML = `<div class="alert alert-success text-center">🎉 Ke përfunduar kuizin! Faleminderit për pjesëmarrjen.</div>`;
        document.getElementById("pergjigja").innerHTML = "";
        document.getElementById("btnNextQuestion").style.display = "none";
        return;
      }

      const p = document.createElement("p");
      p.innerText = pyetjet[pyetjaAktuale].pyetje;
      kuiziDiv.appendChild(p);

      pyetjet[pyetjaAktuale].opsione.forEach((opsion, idx) => {
        const btn = document.createElement("button");
        btn.className = "btn btn-outline-primary btn-option";
        btn.innerText = opsion.tekst;
        btn.onclick = function() {
          kontrolloPergjigjen(opsion.vlera);
        };
        kuiziDiv.appendChild(btn);
      });

      document.getElementById("pergjigja").innerHTML = "";
      document.getElementById("btnNextQuestion").style.display = "none";
    }

    function kontrolloPergjigjen(eshteSakte) {
      const divPërgjigja = document.getElementById("pergjigja");
      if (eshteSakte) {
        divPërgjigja.innerHTML = '<div class="alert alert-success">Saktë! 👍</div>';
        document.getElementById("btnNextQuestion").style.display = "inline-block";
      } else {
        divPërgjigja.innerHTML = '<div class="alert alert-danger">Gabim! Provoni përsëri.</div>';
        document.getElementById("btnNextQuestion").style.display = "none";
      }
    }

    window.onload = function () {
      shfaqFaktRandom();
      shfaqPyetjen();
    };
  </script>
</body>
</html>